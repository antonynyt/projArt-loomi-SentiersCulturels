<script setup>
import { onMounted, watch, onUnmounted, ref, shallowRef, markRaw } from 'vue';
import { Map, NavigationControl, GeolocateControl } from 'maplibre-gl';
import 'maplibre-gl/dist/maplibre-gl.css';
import { addPathLayer, addPathPointLayer, addPOILayer } from './utils/addLayer';
import { addControls } from './utils/controlManagment';

const SWITZERLAND_BOUNDS = [
    [5.9, 45.8], // Southwest coordinates
    [10.5, 47.8] // Northeast coordinates
];

const props = defineProps({
    pathPoints: {
        type: String,
        required: true,
    },
    poi: {
        type: String,
        required: null,
    },
    path: {
        type: String,
        default: null
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

const mapContainer = ref(null);
const map = ref(null);

const pathPoints = ref(props.pathPoints);
const poi = ref(props.poi);
const path = ref(props.path);

const initializeMap = () => {
    map.value = new Map({
        container: mapContainer.value,
        style: 'https://basemaps.cartocdn.com/gl/voyager-gl-style/style.json',
        center: [6.6, 46.6], // centered on Vaud
        minZoom: 8,
        zoom: 10,
        maxBounds: SWITZERLAND_BOUNDS,
    });
};

const setupMap = async () => {
    initializeMap();

    map.value.on('load', async () => {
        addPathLayer(map, path);
        await addPathPointLayer(map, pathPoints, path, poi);
        await addPOILayer(map, poi);
    });

    if (props.options.flyTo) {
        map.value.flyTo({
            center: props.options.flyTo,
            zoom: 15
        });
    }

    addControls(map, props.options);
};

onMounted(() => {
    setupMap();

    watch(() => path.value, (newPath) => {
        console.log(newPath);
        if (map.value && map.value.getSource('path')) {
            map.value.getSource('path').setData(newPath);
        } else if (!map.value.getSource('path')) {
            addPathLayer(map, path);
        }
    });

    watch(() => pathPoints.value, (newPathPoint) => {
        if (map.value && map.value.getSource('pathPoints')) {
            map.value.getSource('pathPoints').setData(newPathPoint);
        }
    });

    watch(() => poi.value, (newPOI) => {
        if (map.value && map.value.getSource('POI')) {
            map.value.getSource('POI').setData(newPOI);
        } else if (!map.value.getSource('POI')) {
            addPOILayer(map, poi);
        }
    });
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
