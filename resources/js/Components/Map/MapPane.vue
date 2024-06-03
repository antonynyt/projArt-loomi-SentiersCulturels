<script setup>
import { onMounted, watch, onUnmounted, ref, shallowRef, markRaw } from 'vue';
import { Map, NavigationControl, GeolocateControl } from 'maplibre-gl';
import 'maplibre-gl/dist/maplibre-gl.css';
import { addPathLayer, addPathPointLayer, addPOILayer } from './utils/addLayer';
import { mapContainer, map, pathPoints, poi, path } from './stores/mapStore';
import { addControls } from './utils/controlManagment';

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
    }
});

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
        addPathLayer();
        await addPathPointLayer();
        await addPOILayer();
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
    console.info('Map mounted');
    setupMap();
    
    watch(() => path.value, (newPath) => {
        if (map.value && map.value.getSource('path')) {
            newPath = JSON.parse(newPath);
            map.value.getSource('path').setData(newPath);
        } else if (!map.value.getSource('path')) {
            addPathLayer();
        }
    });

    watch(() => pathPoints.value, (newPathPoint) => {
        if (map.value && map.value.getSource('pathPoints')) {
            newPathPoint = JSON.parse(newPathPoint);
            map.value.getSource('pathPoints').setData(newPathPoint);
        }
    });

    watch(() => poi.value, (newPOI) => {
        if (map.value && map.value.getSource('POI')) {
            newPOI = JSON.parse(newPOI);
            map.value.getSource('POI').setData(newPOI);
        } else if (!map.value.getSource('POI')) {
            addPOILayer();
        }
    });
});

onUnmounted(() => {
    console.info('Map unmounted');
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
