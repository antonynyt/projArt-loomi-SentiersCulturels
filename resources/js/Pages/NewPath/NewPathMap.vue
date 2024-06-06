<script setup>
import { Head } from '@inertiajs/vue3';
import { ref, watch } from 'vue';
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
import MapGL from '@/Components/Map/MapPane.vue';
import TheDrawer from '@/Components/App/TheDrawer.vue';
import { map, poi, path } from '../../Components/Map/stores/mapStore';
import AppDetailsOverlay from '@/Components/App/AppDetailsOverlay.vue';
import NewPathInstructions from '@/Pages/NewPath/NewPathInstructions.vue';

import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import Modal from '@/Components/Modal.vue';
import SearchBar from '@/Components/SearchBar.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import SearchInput from '@/Components/Search/SearchInput.vue';
import Text from '@/Components/App/Text/Text.vue';
import NewPathDrawer from '@/Components/NewPath/NewPathDrawer.vue';

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

const searchInput = ref('');

const options = ref({
    controls: true,
    hash: true,
});

poi.value = props.poi;
path.value = props.path;
const showPath = ref(props.showPath);

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

</script>

<template>
    <Head>
        <title>New Path</title>
    </Head>

    <DefaultLayout>
        <div class="map__container h-[calc(100dvh-80px)]">
            <MapGL :options />
        </div>
        <Transition>
            <AppDetailsOverlay v-if="showPath" :pathInfos/>
        </Transition>
        <NewPathDrawer>
            <template #tab>

            </template>
            <SearchInput v-model="searchInput" label="Search input" placeholder="Rechercher un point d’intérêt"/>
            <Text v-for="n in 20" type="l" class="ms-6 mt-4">{{ searchInput }}</Text>
        </NewPathDrawer>
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
