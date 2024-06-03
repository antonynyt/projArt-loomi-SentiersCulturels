<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, watch } from 'vue';
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
import MapGL from '@/Components/Map/MapPane.vue';
import TheDrawer from '@/Components/App/TheDrawer.vue';
import AppTabSwitch from '@/Components/App/AppTabSwitch.vue';
import { mapContainer, map, pathPoints, poi, path } from '../Components/Map/stores/mapStore';
import AppElementCard from '@/Components/App/AppElementCard.vue';
import AppDetailsOverlay from '@/Components/App/AppDetailsOverlay.vue';

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
const drawerIsOpen = ref(false);

// Handle drawer close event from child
const handleDrawerClose = (value) => {
    drawerIsOpen.value = value;
}

const toggleDrawer = () => {
    drawerIsOpen.value = !drawerIsOpen.value;
}

//GUIDE: use drawerIsOpen.value = false; to close drawer

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
        <AppDetailsOverlay v-if="showPath"/>
        <TheDrawer v-else :isOpen="drawerIsOpen" @update:drawerIsOpen="handleDrawerClose">
            <template #tab>
                <AppTabSwitch @setActiveTab="filterByTab"/>
            </template>
            <!--Liste des sentiers ou lieux avec le filtre-->
            <section class="flex flex-col gap-4">
                <AppElementCard @click="toggleDrawer"
                    thumbnail="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQEfcic7qPkE6RB0WoiQE7Ks4e6TkXa3XethQ&s"
                    title="Sentier du Renard"
                    href="/map/1"
                    location="Saint-Étienne"
                    :infos="{ distance: '5km', duration: '2h', elevation: '200m' }">
                </AppElementCard>

                <AppElementCard @click="toggleDrawer"
                    thumbnail="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQEfcic7qPkE6RB0WoiQE7Ks4e6TkXa3XethQ&s"
                    title="Sentier des Lutins"
                    href="/map/2"
                    location="ici"
                    :infos="{ distance: '5km', duration: '2h', elevation: '200m' }">
                </AppElementCard>
            </section>
        </TheDrawer>
    </DefaultLayout>


</template>