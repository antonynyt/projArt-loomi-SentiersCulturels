<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, watch } from 'vue';
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

const listItems = ref(JSON.parse(poi.value).features);

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

const filterByTab = (tab) => {
    if (tab === 'paths') {
        console.log('sentiers');
        //SELECT * FROM POI WHERE POI.ordre = 0 inner join sentiers
    } else {
        console.log('lieux');
        //SELECT * FROM POI
    }
}

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
                <AppTabSwitch @setActiveTab="filterByTab"/>
            </template>
            <!--Liste des sentiers ou lieux avec le filtre-->
            <section class="flex flex-col gap-4">
                <AppElementCard v-for="item in listItems" @click="toggleDrawer"
                    thumbnail="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQEfcic7qPkE6RB0WoiQE7Ks4e6TkXa3XethQ&s"
                    :title="item.properties.name"
                    href="/map/1"
                    location="Saint-Étienne"
                    :infos="{ distance: '5km', duration: '2h', elevation: '200m' }">
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