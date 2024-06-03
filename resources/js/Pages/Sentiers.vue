<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, watch } from 'vue';
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
import MapGL from '@/Components/Map/MapPane.vue';
// import SearchBar from '@/Components/SearchBar.vue';
import TheDrawer from '@/Components/App/TheDrawer.vue';
import AppTabSwitch from '@/Components/App/AppTabSwitch.vue';
import { mapContainer, map, pathPoints, poi, path } from '../Components/Map/stores/mapStore';
import AppElementCard from '@/Components/App/AppElementCard.vue';

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
});

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
        path.value = newVal;
        const json = JSON.parse(newVal);
        console.log(json.features[0].geometry.coordinates[0]);
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

const filterByTab = (tab) => {
    if (tab === 'sentiers') {
        console.log('sentiers');
        //SELECT * FROM POI WHERE POI.ordre = 0 inner join sentiers
    } else {
        console.log('lieux');
        //SELECT * FROM POI
    }
}

//close drawer onclick
const isOpen = ref(false);

// Handle drawer close event from child
const handleDrawerClose = (value) => {
    isOpen.value = value;
}

const toggleDrawer = () => {
    isOpen.value = !isOpen.value;
}

//GUIDE: use isOpen.value = false; to close drawer

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
        <TheDrawer :isOpen @update:isOpen="handleDrawerClose">
            <template #tab>
                <AppTabSwitch @setActiveTab="filterByTab"/>
            </template>
            <!--Liste des sentiers ou lieux avec le filtre-->
            <section class="flex flex-col gap-4">
                <AppElementCard @click="toggleDrawer"
                    thumbnail="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQEfcic7qPkE6RB0WoiQE7Ks4e6TkXa3XethQ&s"
                    title="Sentier du Renard"
                    href="/sentiers/1"
                    location="Saint-Étienne"
                    :infos="{ distance: '5km', duration: '2h', elevation: '200m' }">
                </AppElementCard>

                <AppElementCard @click="toggleDrawer"
                    thumbnail="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQEfcic7qPkE6RB0WoiQE7Ks4e6TkXa3XethQ&s"
                    title="Sentier des Lutins"
                    href="/sentiers/2"
                    location="ici"
                    :infos="{ distance: '5km', duration: '2h', elevation: '200m' }">
                </AppElementCard>
            </section>
        </TheDrawer>
    </DefaultLayout>


</template>