<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, watch, computed } from 'vue';
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
import MapGL from '@/Components/Map/MapPane.vue';
import TheDrawer from '@/Components/App/TheDrawer.vue';
import AppTabSwitch from '@/Components/App/AppTabSwitch.vue';
import { map, poi, path } from '../Components/Map/stores/mapStore';
import AppElementCard from '@/Components/App/AppElementCard.vue';
import AppDetailsOverlay from '@/Components/App/AppDetailsOverlay.vue';

const props = defineProps({
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
        const json = JSON.parse(newVal);
        map.value.easeTo({
            center: json.features[0].geometry.coordinates[0],
            zoom: 16
        });
    }
});

console.log(listItems.value);

</script>

<template>
    <Head>
        <title>Home</title>
    </Head>

    <DefaultLayout>
        <!-- <SearchBar/> -->
        <div class="map__container h-[calc(100dvh-80px)]">
            <MapGL :options />
        </div>
        <Transition>
            <AppDetailsOverlay v-if="showPath" :pathInfos/>
        </Transition>
        <TheDrawer v-if="!showPath">
            <template #tab>
                <AppTabSwitch @setActiveTab="tab = $event"/>
            </template>
            <!--Liste des sentiers ou lieux avec le filtre-->
            <section class="flex flex-col gap-4">
                <AppElementCard v-for="item in listItems"
                    :thumbnail="item.properties.thumbnail"
                    :title="item.properties.name"
                    :href="'map/' + item.properties.id"
                    :location=item.properties.location
                    :options="item.properties.infos">
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