<script setup>
import { onMounted, watch } from 'vue';
import { Map, NavigationControl, GeolocateControl } from 'maplibre-gl';
import 'maplibre-gl/dist/maplibre-gl.css';
import { onUnmounted } from 'vue';
import { ref, shallowRef, markRaw } from 'vue';

const props = defineProps({
    path: {
        type: String,
        default: null
    },
    poi: {
        type: String,
        required: true,
    },
    options: {
        type: Object,
        default: () => ({
            controls: false,
            flyToUserLocation: false,
            flyTo: null,
        })
    }
});

const path = ref(props.path)

const switzerlandBounds = [
    [5.9, 45.8], // Southwest coordinates
    [10.5, 47.8] // Northeast coordinates
];

const mapContainer = shallowRef(null);
const map = shallowRef(null);

onMounted(() => {
    map.value = markRaw(new Map({
        container: mapContainer.value,
        style: 'https://basemaps.cartocdn.com/gl/voyager-gl-style/style.json',
        // style: 'https://vectortiles.geo.admin.ch/styles/ch.swisstopo.lightbasemap.vt/style.json',
        center: [6.6, 46.6], //centrer sur Vaud
        minZoom: 8,
        zoom: 10,
        maxBounds: switzerlandBounds,
    }));

    watch(() => path.value, (newPath) => {
        console.log(newPath)
        map.value.getSource('path').setData(newPath);
    });

    watch(() => props.poi, (newPOI) => {
        map.value.getSource('POI').setData(newPOI);
    });

    map.value.on('load', async () => {

        // if path add path on the map
        
        map.value.addSource('path', {
            type: 'geojson',
            data: path,
        });
    
        map.value.addLayer({
            'id': 'path',
            'type': 'line',
            'source': 'path',
            'layout': {
                'line-join': 'round',
                'line-cap': 'round'
            },
            'paint': {
                'line-color': '#ff2222',
                'line-width': 8,
            }
        });

        //Source: https://www.jawg.io/docs/integration/maplibre-gl-js/cluster/#11.08/48.8686/2.2959
        //TODO: Changer les icones
        const treeCluster = await map.value.loadImage("https://jawg.github.io/maplibre-gl-js-examples/icons/cluster/tree-cluster.png")
        map.value.addImage("tree-cluster", treeCluster.data);

        const tree = await map.value.loadImage("https://jawg.github.io/maplibre-gl-js-examples/icons/cluster/tree.png")
        map.value.addImage("tree", tree.data);

        // add path POIs on the map
        map.value.addSource('pathPoints', {
            type: 'geojson',
            data: props.poi,
            cluster: true,
            clusterRadius: 50
        });

        map.value.addLayer({
            id: "point-label",
            type: "symbol",
            source: "pathPoints",
            filter: ["!", ["has", "point_count"]],
            layout: {
                "text-field": ["get", "Name"], //TODO: changer le champ en fonction de la DB
                "text-padding": 0,
                "text-allow-overlap": false,
                "text-size": 11,
                "text-font": ["Roboto Regular", "Noto Regular"],
                "text-offset": [0, 1.75],
                "text-anchor": "top",
            },
            paint: {
                "text-color": "#5C5C5C",
                "text-halo-color": "#FFFFFF",
                "text-halo-width": 1,
            },
        });

        map.value.addLayer({
            id: "pathPoint",
            type: "symbol",
            source: "pathPoints",
            layout: {
                "icon-image": ["case", ["has", "point_count"], "tree-cluster", "tree"],
                // Display the cluster point count if >= 2
                "text-field": [
                    "step",
                    ["get", "point_count"],
                    "",
                    // If the point_count is < 99 then display as "99+"
                    2,
                    ["step", ["get", "point_count"], ["get", "point_count"], 99, "99+"],
                ],
                "icon-padding": 0,
                "text-padding": 0,
                "text-overlap": "always",
                "icon-overlap": "always",
                "text-size": 12,
                "text-font": ["Roboto Bold", "Noto Bold"],
                "text-anchor": "center",
            },
            paint: {
                "text-color": "#5C5C5C",
                "text-translate": [13, -14],
                "text-translate-anchor": "viewport",
            },
        });

        map.value.on("click", "pathPoint", async (e) => {
            const feature = e.features[0];
            const clusterId = feature.properties.cluster_id;
            if (clusterId) {
                const zoom = await map.value.getSource("pathPoints").getClusterExpansionZoom(clusterId)
                map.value.easeTo({
                    center: feature.geometry.coordinates,
                    zoom: zoom + 0.5,
                });
            } else {
                console.log(feature.properties.Name)
                //TODO: changer le style du POPUP ? + on garde un POPUP ?
                //TODO: afficher le chemin correspondant

                path.value = '/storage/renard/path.geojson';
            }
        });
    });

    // Fly to specific location
    if (props.options.flyTo) {
        map.value.flyTo({
            center: props.options.flyTo,
            zoom: 15
        });
    }

    //Navigation options
    if (props.options.controls) {
        map.value.addControl(new NavigationControl(), 'bottom-right')
    }

    const geoLocation = new GeolocateControl({
        positionOptions: {
            enableHighAccuracy: true
        },
        trackUserLocation: true
    })

    map.value.addControl(geoLocation, 'bottom-right')

    // Fly to user location
    if (props.options.flyToUserLocation) {
        setTimeout(() => {
            geoLocation.trigger();
        }, 200);
    }
});

onUnmounted(() => {
    map.value?.remove();
});

</script>

<template>
    <div ref="mapContainer" class="w-full h-full"></div>
</template>

<style>
.maplibregl-canvas:focus {
    outline: none;
}

.maplibregl-popup {
    max-width: 200px;
}

.maplibregl-marker {
    cursor: pointer;
}
</style>