<script setup>
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
import MapPane from '@/Components/Map/MapPane.vue';

const options = ref({
    flyToUserLocation: false
});

const path = ref('/storage/test.geojson');

function toggle(){
    path.value = path.value === '/storage/test.geojson' ? '/storage/renard/path.geojson' : '/storage/test.geojson';
}

</script>

<template>
    <Head>
        <title>Explore</title>
    </Head>

    <DefaultLayout>
            <header class="max-w-lg mx-5">
                <h1>EXPLORER</h1>
            </header>
            <main class="max-w-lg mx-5">
                <p>
                    Salut
                </p>
                <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" @click="toggle">Toggle</button>
                <section class="h-60 rounded-lg overflow-hidden">
                    <MapPane :options :path poi="/storage/renard/poi.geojson"/>
                </section>
            </main>
        
    </DefaultLayout>


</template>