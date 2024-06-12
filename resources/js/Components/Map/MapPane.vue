<script setup>
import { onMounted, watch, onUnmounted, markRaw } from 'vue';
import { Map } from 'maplibre-gl';
import 'maplibre-gl/dist/maplibre-gl.css';
import { addPathLayer, addPOILayer } from './utils/addLayer';
import { mapContainer, map, poi, path } from './stores/mapStore';
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
        await addPOILayer();
        addPathLayer();
    });

    if (props.options.flyTo) {
        map.value.flyTo({
            center: props.options.flyTo,
            zoom: 15
        });
    }

    if(props.options.controls) {
        addControls(map, props.options);
    }
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

.maplibregl-popup-content p{
  margin: 0;
  padding: 10px 10px 5px;
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
