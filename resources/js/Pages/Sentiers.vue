<script setup>
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
import MapGL from '@/Components/Map/MapPane.vue';
import SearchBar from '@/Components/SearchBar.vue';

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

</script>

<template>
    <Head>
        <title>Home</title>
    </Head>

    <DefaultLayout>
        <SearchBar/>
        <div class="map__container h-[calc(100dvh-80px)]">
            <MapGL :path :poi :options />
        </div>
    </DefaultLayout>


</template>