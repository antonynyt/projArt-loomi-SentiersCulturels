<script setup>
import { Head } from '@inertiajs/vue3';
import { ref, watch } from 'vue';
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
import MapGL from '@/Components/Map/MapPane.vue';
import TheDrawer from '@/Components/App/TheDrawer.vue';
import { map, poi, path } from '../../Components/Map/stores/mapStore';
import AppDetailsOverlay from '@/Components/App/AppDetailsOverlay.vue';
import NewPathInstructions from '@/Pages/NewPath/NewPathInstructions.vue';
import { router } from '@inertiajs/vue3'
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import Modal from '@/Components/Modal.vue';
import SearchBar from '@/Components/SearchBar.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import SearchInput from '@/Components/Search/SearchInput.vue';
import Text from '@/Components/App/Text/Text.vue';
import NewPathDrawer from '@/Components/NewPath/NewPathDrawer.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import BackButton from '@/Components/App/Button/BackButton.vue';
import ImpactText from '@/Components/App/Text/ImpactText.vue';

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
    controls: false,
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
    <div class="flex flex-col items-center px-5 fixed left-0 top-0 z-30 w-full">
        <div class="flex flex-wrap max-w-lg w-full mt-6">
            <BackButton size="xs"></BackButton>
        </div>
    </div>
    <div class="w-full h-dvh">
        <div class="map__container h-[calc(100dvh-80px)]">
            <MapGL :options />
        </div>
        <Transition>
            <AppDetailsOverlay v-if="showPath" :pathInfos/>
        </Transition>
        <NewPathDrawer>
            <div class="flex flex-col gap-3 items-center justify-center h-60">
                <ImpactText type="m">Définissez un point de départ</ImpactText>
                <PrimaryButton
                    @click="router.get('/new-path/search')"
                    icon='<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26">
                        <path d="M24.1429 14.8571H14.8571V24.1429C14.8571 24.6354 14.6615 25.1078 14.3132 25.4561C13.9649 25.8043 13.4925 26 13 26C12.5075 26 12.0351 25.8043 11.6868 25.4561C11.3385 25.1078 11.1429 24.6354 11.1429 24.1429V14.8571H1.85714C1.3646 14.8571 0.892227 14.6615 0.543945 14.3132C0.195663 13.9649 0 13.4925 0 13C0 12.5075 0.195663 12.0351 0.543945 11.6868C0.892227 11.3385 1.3646 11.1429 1.85714 11.1429H11.1429V1.85714C11.1429 1.3646 11.3385 0.892226 11.6868 0.543944C12.0351 0.195662 12.5075 0 13 0C13.4925 0 13.9649 0.195662 14.3132 0.543944C14.6615 0.892226 14.8571 1.3646 14.8571 1.85714V11.1429H24.1429C24.6354 11.1429 25.1078 11.3385 25.4561 11.6868C25.8043 12.0351 26 12.5075 26 13C26 13.4925 25.8043 13.9649 25.4561 14.3132C25.1078 14.6615 24.6354 14.8571 24.1429 14.8571Z"/>
                        </svg>'
                ></PrimaryButton>
            </div>
        </NewPathDrawer>
    </div>
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
