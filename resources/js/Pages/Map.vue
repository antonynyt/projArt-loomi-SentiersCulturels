<script setup>
import { Head } from '@inertiajs/vue3';
import { ref, watch, computed, onMounted } from 'vue';
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
import MapGL from '@/Components/Map/MapPane.vue';
import TheDrawer from '@/Components/App/TheDrawer.vue';
import AppTabSwitch from '@/Components/App/AppTabSwitch.vue';
import { map, poi, path } from '../Components/Map/stores/mapStore';
import AppElementCard from '@/Components/App/AppElementCard.vue';
import AppDetailsOverlay from '@/Components/App/AppDetailsOverlay.vue';
import { router } from "@inertiajs/vue3";

const props = defineProps({
    path: {
        type: String,
    },
    poi: {
        type: String,
        required: true,
    },
    pathInfos: {
        type: Object,
    },
    showPath: {
        type: Boolean,
        default: false,
    }
});

const options = ref({
    controls: true,
    hash: true,
});

poi.value = props.poi;
path.value = props.path;
const showPath = ref(props.showPath);
const tab = ref('path');

const filterByTab = (tab) => {
    return (item) => {
        return item.properties.type === tab;
    }
};

// Computed property to filter items based on the selected tab
const listItems = computed(() => {
    const filteredItems = JSON.parse(poi.value).features.filter(filterByTab(tab.value));
    return filteredItems;
});

// Définir une ref pour stocker les points filtrés.
const filteredPoi = ref(listItems);

// Mettre à jour filteredPoi chaque fois que listItems change.
watch(listItems, (newVal) => {
    filteredPoi.value = newVal;
});

// Mettre à jour la carte chaque fois que filteredPoi change.
watch(filteredPoi, (newVal) => {
    if (newVal) {
        if (map.value && map.value.getSource('POI')) {
            map.value.getSource('POI').setData(
                JSON.parse(JSON.stringify({
                    type: 'FeatureCollection',
                    features: newVal
                }))
            );
        }
    }
});

//pour que les poi soit visible sur la carte quand la props du back est changée
watch(() => props.poi, (newVal) => {
    if (newVal) {
        poi.value = newVal;
    }
});

//pour que le path soit visible sur la carte quand la props du back est changée
watch(() => props.path, (newVal) => {
    if (newVal) {
        showPath.value = true;
        path.value = newVal;
    }
});

//close drawer onclick
const isOpen = ref(false);
// Handle drawer close event from child
const handleDrawerClose = (value) => {
    isOpen.value = value;
}

const handleClick = (item) => {
    if (item.properties.type === 'path') {
        router.visit(`/map/${item.properties.id}`, { preserveState: true });
    } else {
        map.value.flyTo({
            center: item.geometry.coordinates,
            zoom: 16
        });
    }
};
</script>

<template>

    <Head>
        <title>Découvrez le Canton</title>
    </Head>

    <DefaultLayout>
        <div class="map__container h-[calc(100dvh-80px)]">
            <MapGL :options />
        </div>
        <Transition>
            <AppDetailsOverlay v-if="showPath" :pathInfos />
        </Transition>
        <TheDrawer v-if="!showPath" :isOpen @update:isOpen="handleDrawerClose">
            <template #tab>
                <AppTabSwitch @setActiveTab="tab = $event" />
            </template>
            <!--Liste des sentiers ou lieux avec le filtre-->
            <section class="flex flex-col gap-4">
                <AppElementCard v-for="item in listItems" :thumbnail="item.properties.thumbnail"
                    @click="handleDrawerClose(false)" @cardClick="handleClick(item)" :title="item.properties.name"
                    :type="item.properties.type" :location=item.properties.location :infos="item.properties.infos"
                    :coordinates="item.geometry.coordinates">
                </AppElementCard>
            </section>
        </TheDrawer>
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
