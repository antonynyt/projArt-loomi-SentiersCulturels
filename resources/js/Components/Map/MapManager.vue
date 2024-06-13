<script setup>
import { onMounted, watch, onUnmounted, ref, markRaw, toRaw } from 'vue';
import { Map, Padding } from 'maplibre-gl';
import 'maplibre-gl/dist/maplibre-gl.css';
import { addPathLayer, addPOILayer, addSelectionPOILayer } from '@/Components/Map/utils/addLayer';
import { mapContainer, map, poi, path, selectedPoi } from '@/Components/Map/stores/mapStore';
import { addControls } from '@/Components/Map/utils/controlManagment';

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
    selectionLayer: {
        type: Boolean,
        default: false,
    },
    pois: {
        type: [Object, null],
        required: false,
        default: null,
    },
    poisColor: {
        type: String,
        default: 'purple',
    },
    path: {
        type: [Object, null],
        required: false,
        default: null,
    },
    maxBounds: {
        type: Array,
        default: () => [
            [5.9, 45.8], // Southwest coordinates
            [7.6, 47.8] // Northeast coordinates
        ],
    },
    center: {
        type: Array,
        default: () => [6.6, 46.6],
    },
    zoom: {
        type: Number,
        default: 10,
    },
    minZoom: {
        type: Number,
        default: 8,
    },
    style: {
        type: String,
        default: 'https://basemaps.cartocdn.com/gl/voyager-gl-style/style.json',
    },
    interactive: {
        type: Boolean,
        default: true,
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
        style: props.style,
        center: props.center,
        minZoom: props.minZoom,
        zoom: props.zoom,
        maxBounds: props.maxBounds,
        hash: props.options.hash,
        attributionControl: props.options.attributionControl,
        interactive: props.interactive,
    }));
};

const setupMap = async () => {
    initializeMap();

    map.value.on('load', async () => {
        if(props.selectionLayer){
            await addPOILayer("green", true);
        } else {
            await addPOILayer(props.poisColor);
        }
        addPathLayer();
        map.value.getSource('POI').setData(JSON.parse(poi.value));
        if (props.selectionLayer) {
            addSelectionPOILayer();
            if(selectedPoi.value){
                const selectedPoiParsed = JSON.parse(selectedPoi.value);
                const coordinates = selectedPoiParsed.features[0].geometry.coordinates;
                if(Array.isArray(coordinates) && coordinates[0] && coordinates[1]) {
                    map.value.getSource('POI-selection-source').setData(new Array(selectedPoiParsed));
                }
            }
        }
    });

    if (props.options.flyTo) {
        map.value.flyTo({
            center: props.options.flyTo,
            zoom: 15
        });
    } else if (path.value) {
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
        const bounds = [[minLng, minLat], [maxLng, maxLat]];
        map.value.fitBounds(bounds, { padding: {top: 100, bottom: 250, left: 40, right: 40} });
    } else if (formattedJsonPois.features.length > 0 && !props.selectionLayer) {
        const coordinates = formattedJsonPois.features[0].geometry.coordinates;
        map.value.flyTo({ center: coordinates, zoom: 15 });
    } else if (props.options.flyToUserLocation) {
        navigator.geolocation.getCurrentPosition((position) => {
            const { latitude, longitude } = position.coords;
            map.value.flyTo({ center: [longitude, latitude], zoom: 15 });
        });
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
