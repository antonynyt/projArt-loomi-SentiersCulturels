<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, watch } from 'vue';
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
import MapGL from '@/Components/Map/MapPane.vue';

import { mapContainer, map, pathPoints, poi, path } from '../Components/Map/stores/mapStore';
import AppElementCard from '@/Components/App/AppElementCard.vue';
import AppDetailsOverlay from '@/Components/App/AppDetailsOverlay.vue';

import Instructions from '@/Components/NewPath/Instructions.vue';

const props = defineProps({
    pathPoints: {
        type: String,
    },
    path: {
        type: String,
    },
    poi: {
        type: String,
    },
    pathInfos: {
        type: Object,
    },
    showPath: {
        type: Boolean,
        default: false,
    }
});

const showPath = ref(props.showPath);

pathPoints.value = props.pathPoints;
poi.value = props.poi;
path.value = props.path;

watch(() => props.pathPoints, (newVal) => {
    if (newVal) {
        pathPoints.value = newVal;
    }
});

watch(() => props.poi, (newVal) => {
    if (newVal) {
        poi.value = newVal;
    }
});

watch(() => props.path, (newVal) => {
    if (newVal) {
        showPath.value = true;
        path.value = newVal;
        const json = JSON.parse(newVal);
        map.value.easeTo({
            center: json.features[0].geometry.coordinates[0],
            zoom: 16
        });
        map.value.setLayoutProperty('pathPoint', "visibility", "none");
        map.value.setLayoutProperty('point-label', "visibility", "none");
    }
});


const options = ref({
    controls: true,
    hash: true,
});

</script>

<template>
    <Head>
        <title>New Path</title>
    </Head>

    <DefaultLayout>
        <div class="absolute top-0 left-0 h-dvh w-full bg-off-white z-20">
            <Instructions></Instructions>
        </div>
        <!-- <SearchBar/> -->
        <div class="map__container h-[calc(100dvh-80px)]">
            <MapGL :options />
        </div>
        <Transition>
            <AppDetailsOverlay v-if="showPath" :pathInfos/>
        </Transition>

    </DefaultLayout>
</template>

<style scoped>
.v-enter-active,
.v-leave-active {
    transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
    opacity: 0;
}
</style>
