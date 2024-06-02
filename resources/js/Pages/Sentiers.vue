<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
import MapGL from '@/Components/Map/MapPane.vue';
// import SearchBar from '@/Components/SearchBar.vue';
import TheDrawer from '@/Components/App/TheDrawer.vue';
import AppTabSwitch from '@/Components/App/AppTabSwitch.vue';

const props = defineProps({
    pathPoints: {
        type: String,
        required: true,
    },
    path: {
        type: String,
    },
    poi: {
        type: String,
        required: false,
    },
});

const options = ref({
    controls: true
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

//GUIDE: use isOpen.value = false; to close drawer

</script>

<template>
    <Head>
        <title>Home</title>
    </Head>

    <DefaultLayout>
        <!-- <SearchBar/> -->
        <div class="map__container h-[calc(100dvh-80px)]">
            <MapGL :path :poi :pathPoints :options />
        </div>
        <TheDrawer :isOpen @update:isOpen="handleDrawerClose">
            <template #tab>
                <AppTabSwitch @setActiveTab="filterByTab"/>
            </template>
            <!--Liste des sentiers ou lieux avec le filtre-->
            <ul>
                <li>dsada</li>
                <li>dsada</li>
                <!-- <button @click="toggleDrawer">hdskajdlka</button> -->
            </ul>
        </TheDrawer>
    </DefaultLayout>


</template>