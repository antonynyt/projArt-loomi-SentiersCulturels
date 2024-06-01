<script setup>
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
import MapGL from '@/Components/Map/MapPane.vue';
// import SearchBar from '@/Components/SearchBar.vue';
import TheDrawer from '@/Components/App/TheDrawer.vue';
import AppTabSwitch from '@/Components/App/AppTabSwitch.vue';

const props = defineProps({
    path: {
        type: String,
    },
    poi: {
        type: String,
        required: true,
    },
});

const options = ref({
    controls: true
});

//emited from AppTab setActiveTab
const activeTab = ref('sentiers');

const filterByTab = (tab) => {
    activeTab.value = tab;
    console.log(activeTab.value);
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
            <MapGL :path :poi :options />
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