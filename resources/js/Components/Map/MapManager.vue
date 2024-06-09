<script setup>
import { onMounted, watch, onUnmounted, ref, markRaw, toRaw } from 'vue';
import { Map } from 'maplibre-gl';
import 'maplibre-gl/dist/maplibre-gl.css';
import { addPathLayer, addPOILayer } from '@/Components/Map/utils/addLayer';
import { mapContainer, map, pathPoints, poi, path } from '@/Components/Map/stores/mapStore';
import { addControls } from '@/Components/Map/utils/controlManagment';

const SWITZERLAND_BOUNDS = [
    [5.9, 45.8], // Southwest coordinates
    [10.5, 47.8] // Northeast coordinates
];

const props = defineProps({
    options: {
        type: Object,
        default: () => ({
            controls: false,
            flyToUserLocation: false,
            flyTo: null,
            hash: false,
            attributionControl: true,
        })
    },
    pois: {
        type: [Object, null],
        required: true,
    },
    path: {
        type: [Object, null],
        required: true,
    },
});

function formatPoisGeoJSON(input) {
    return {
        type: "FeatureCollection",
        features: input.features.map(feature => ({
            type: "Feature",
            geometry: {
                type: "Point",
                coordinates: [feature.long, feature.lat]
            },
            properties: {
                id: feature.id,
                name: feature.title,
                description: feature.descr,
                type: "poi",
                thumbnail: null, // ou une autre valeur si vous en avez
                location: feature.adress_label || null,
                infos: {
                    distance: "", // ou une autre valeur si vous en avez
                    duration: "", // ou une autre valeur si vous en avez
                    ascent: "", // ou une autre valeur si vous en avez
                    type: "poi"
                }
            }
        }))
    };
}

const rawPois = toRaw(props.pois);
const jsonPois = {
    type: 'FeatureCollection',
    features: rawPois ? rawPois : [],
};
const formattedJsonPois = formatPoisGeoJSON(jsonPois);
const stringifiedPois = JSON.stringify(formattedJsonPois);
poi.value = stringifiedPois;

const jsonPath = toRaw(props.path);
const stringifiedPath = jsonPath ? JSON.stringify(jsonPath) : null;
path.value = stringifiedPath;

const initializeMap = () => {
    map.value = markRaw(new Map({
        container: mapContainer.value,
        style: 'https://basemaps.cartocdn.com/gl/voyager-gl-style/style.json',
        center: [6.6, 46.6], // centered on Vaud
        minZoom: 8,
        zoom: 10,
        maxBounds: SWITZERLAND_BOUNDS,
        hash: props.options.hash,
        attributionControl: props.options.attributionControl,
    }));
};

const setupMap = async () => {
    initializeMap();

    map.value.on('load', async () => {
        console.log("Map loaded");
        console.log("path");
        console.log(path.value);
        console.log(!path.value);
        console.log("poi");
        console.log(poi.value);
        await addPOILayer();
        addPathLayer();
        map.value.getSource('POI').setData(JSON.parse(poi.value));
    });

    console.log("----- Setup Map -----");
    console.log(path.value);
    if (props.options.flyTo) {
        map.value.flyTo({
            center: props.options.flyTo,
            zoom: 15
        });
    } else if (path.value) {
        console.log("Fly to path");
        const json = JSON.parse(path.value);
        let minLng = Infinity;
        let minLat = Infinity;
        let maxLng = -Infinity;
        let maxLat = -Infinity;
        json.features.forEach(feature => {
            const coordinates = feature.geometry.coordinates;
            coordinates.forEach(coordinate => {
                const [lng, lat] = coordinate;
                minLng = Math.min(minLng, lng);
                minLat = Math.min(minLat, lat);
                maxLng = Math.max(maxLng, lng);
                maxLat = Math.max(maxLat, lat);
            });
        });
        const center = [(minLng + maxLng) / 2, (minLat + maxLat) / 2];
        const zoom = map.value.getZoom();
        map.value.flyTo({ center, zoom });
    } else if (formattedJsonPois.features.length > 0) {
        console.log("Fly to POI");
        const coordinates = formattedJsonPois.features[0].geometry.coordinates;
        map.value.flyTo({ center: coordinates, zoom: 15 });
    }

    if (props.options.controls)
        addControls(map, props.options);
};

onMounted(() => {
    setupMap();

    // watch(() => path.value, (newPath) => {
    //     if (newPath && map.value && map.value.getSource('path')) {
    //         map.value.getSource('path').setData(newPath);
    //     } else if (newPath && !map.value.getSource('path')) {
    //         addPathLayer();
    //     }
    // });

    // watch(() => pathPoints.value, (newPathPoint) => {
    //     if (newPathPoint && map.value && map.value.getSource('pathPoints')) {
    //         map.value.getSource('pathPoints').setData(newPathPoint);
    //     }
    // });

    // watch(() => poi.value, (newPOI) => {
    //     if (newPOI && map.value && map.value.getSource('POI')) {
    //         map.value.getSource('POI').setData(newPOI);
    //     } else if (newPOI && !map.value.getSource('POI')) {
    //         addPOILayer();
    //     }
    // });
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

.maplibregl-marker {
    cursor: pointer;
}

/* Marker tweaks */
.maplibregl-popup {
  font-family: 'PPAvenir', sans-serif;
}

.maplibregl-popup-close-button {
  display: none;
}

.maplibregl-popup-content {
  padding: 0;
  width: 250px;
  border-radius: 0.5rem;
}

.maplibregl-popup-content h3 {
  margin: 0;
  padding: 10px;
  border-radius: 0.5rem 0.5rem 0 0;
  font-weight: 600;
  margin-top: -15px;
}

.maplibregl-popup-content p {
  margin: 0;
  padding: 10px;
  font-weight: 400;
}

.maplibregl-popup-content div {
  padding: 10px;
}

.maplibregl-popup-anchor-top > .maplibregl-popup-content {
  margin-top: 15px;
}

.maplibregl-popup-anchor-top > .maplibregl-popup-tip {
  border-bottom-color: #91c949;
}
</style>
