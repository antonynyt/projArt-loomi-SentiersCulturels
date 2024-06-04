<script setup>
import Map  from '@/Pages/Map.vue';
import AppDetailsOverlay from '@/Components/App/AppDetailsOverlay.vue';
import { path, poi } from '@/Components/Map/stores/mapStore';

const props = defineProps({
    path: {
        type: String,
    },
    poi: {
        type: String,
    },
});

path.value = props.path;
poi.value = props.poi;

</script>

<template>
    <Map :path :poi>
        <AppDetailsOverlay/>
    </Map>
</template>