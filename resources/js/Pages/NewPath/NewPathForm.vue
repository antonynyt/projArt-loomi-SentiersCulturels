<script setup>
//import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import Headline from "@/Components/App/Text/Headline.vue";
import InformationText from "@/Components/App/Text/InformationText.vue";
import BackLink from "@/Components/App/Button/BackLink.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { router } from '@inertiajs/vue3'
import NewPathLayout from '@/Layouts/NewPathLayout.vue'
import { useForm } from '@inertiajs/vue3'

import TextInput from '@/Components/TextInput.vue'
import InputLabel from '@/Components/InputLabel.vue'
import InputError from '@/Components/InputError.vue'
import Checkbox from '@/Components/Checkbox.vue'
import SelectInput from '@/Components/SelectInput.vue'
import TextAreaInput from '@/Components/TextAreaInput.vue'
import AppPoiSqareCard from '@/Components/App/AppPoiSquareCard.vue'
import ToggleButton from "@/Components/App/Button/ToggleButton.vue";
import { ref, defineProps } from 'vue';
import SecondaryButton from "@/Components/SecondaryButton.vue";
import Toggle from "@/Components/App/Button/Toggle.vue";

const props = defineProps({
    selectedPois: {
        type: Array,
        required: false,
        default: null,
    },
    path: {
        type: Object,
        required: false,
        default: null,
    },
    themes: {
        type: Array,
        required: false,
        default: null,
    },
});

console.warn('Props')
console.log(props.selectedPois)
console.log(props.path)
console.log(props.themes)

const options = props.themes.map(theme => {
    return {
        text: theme.title,
        value: theme.id,
    }
})

const isHandicapAccessible = ref(false);
console.log(props.path);
const form = useForm({
    title: '',
    description: '',
    duration: Math.round(props.path.features[0].properties.summary.duration),
    distance: Math.round(props.path.features[0].properties.summary.distance),
    ascent: Math.round(props.path.features[0].properties.ascent),
    descent: Math.round(props.path.features[0].properties.descent),
    isHandicapAccessible: isHandicapAccessible.value,
    path: props.path ? JSON.stringify(props.path) : null,
    pois: props.selectedPois ? props.selectedPois : null,
    themeId: null,
    isLoop: props.selectedPois ? props.selectedPois[0].id === props.selectedPois[props.selectedPois.length - 1].id : false,
    parkingName_1: null,
    parkingUrl_1: null,
    parkingName_2: null,
    parkingUrl_2: null,
    parkingName_3: null,
    parkingUrl_3: null,
}, { remember: 'new-path-form' })

console.warn('Form');
console.log(form)

const parking2visible = ref(false);
const parking3visible = ref(false);

function submitForm() {
    form.post('/new-path/create')
}

</script>

<template>
    <Head title="New Path Form"></Head>
    <NewPathLayout :hasNavBar="false" class="h-dvh flex flex-col">
        <BackLink class="mb-6"/>
        <Headline rank="h1" type="l">Créer un nouveau sentier</Headline>
        <form class="flex flex-col" @submit.prevent="form.post('/new-path/create')">
            <Headline class="mt-12" rank="h2" type="m">Description</Headline>
            <!-- title -->
            <InputLabel counter :length="255" class="mt-6" required for="title">Titre du sentier</InputLabel>
            <TextInput v-model="form.title" id="title" type="text" />
            <InputError :message="form.errors.title" />
            <!-- theme -->
            <InputLabel class="mt-6" required for="theme">Thème</InputLabel>
            <SelectInput
                v-model="form.themeId"
                id="theme"
                placeholder="Choisissez une thématique"
                :options=options
            />
            <InputError :message="form.errors.themeId" />
            <!-- description -->
            <InputLabel class="mt-6" required for="description">Description</InputLabel>
            <TextAreaInput v-model="form.description" id="descr" />
            <InputError :message="form.errors.description" />
            <!-- pois -->
            <InputLabel class="mt-6" required for="pois">Étapes</InputLabel>
            <div id="pois" class="no-scrollbar flex gap-3 overflow-x-scroll">
                <AppPoiSqareCard
                    v-for="(poi, n) in form.pois"
                    class="shrink-0"
                    :key="poi.id"
                    :img="poi.photos[0].link"
                    :title="poi.title"
                    :number="n+1"
                ></AppPoiSqareCard>
            </div>
            <Headline class="mt-12" rank="h2" type="m">Information pratiques</Headline>
            <!-- Parking -->
            <InformationText class="mt-9" type="m">Parking à proximité</InformationText>
            <!-- parking 1 -->
            <div class="flex gap-4 mt-3">
                <div class="grow">
                    <InputLabel small for="parking-name-1">Nom</InputLabel>
                    <TextInput class="w-full" v-model="form.parkingName_1" id="parking-name-1" type="text" />
                    <InputError :message="form.errors.parkingName_1" />
                </div>
                <div class="grow">
                    <InputLabel small for="parking-url-1">URL</InputLabel>
                    <TextInput class="w-full" v-model="form.parkingUrl_1" id="parking-url-1" type="url" />
                    <InputError :message="form.errors.parkingUrl_1" />
                </div>
            </div>
            <!-- parking 2 -->
            <PrimaryButton
                v-if="!parking2visible"
                type="button"
                size="xs"
                :disabled="form.processing"
                class="flex-row-reverse mt-3"
                style="align-self: end;"
                icon='<svg xmlns="http://www.w3.org/2000/svg" width="11" height="12" viewBox="0 0 11 12" fill="none">
                    <path d="M9.65714 6.74266H5.94286V10.4569C5.94286 10.654 5.86459 10.8429 5.72528 10.9822C5.58597 11.1215 5.39702 11.1998 5.2 11.1998C5.00298 11.1998 4.81403 11.1215 4.67472 10.9822C4.53541 10.8429 4.45714 10.654 4.45714 10.4569V6.74266H0.742857C0.545839 6.74266 0.356891 6.6644 0.217578 6.52508C0.0782652 6.38577 0 6.19682 0 5.9998C0 5.80279 0.0782652 5.61384 0.217578 5.47453C0.356891 5.33521 0.545839 5.25695 0.742857 5.25695H4.45714V1.54266C4.45714 1.34564 4.53541 1.1567 4.67472 1.01738C4.81403 0.87807 5.00298 0.799805 5.2 0.799805C5.39702 0.799805 5.58597 0.87807 5.72528 1.01738C5.86459 1.1567 5.94286 1.34564 5.94286 1.54266V5.25695H9.65714C9.85416 5.25695 10.0431 5.33521 10.1824 5.47453C10.3217 5.61384 10.4 5.80279 10.4 5.9998C10.4 6.19682 10.3217 6.38577 10.1824 6.52508C10.0431 6.6644 9.85416 6.74266 9.65714 6.74266Z" fill="#FAF9F6"/>
                    </svg>'
                @click="parking2visible = true"
            >
                Ajouter
            </PrimaryButton>
            <div v-if="parking2visible" class="flex gap-4 mt-3">
                <div class="grow">
                    <InputLabel small for="parking-name-2">Nom</InputLabel>
                    <TextInput class="w-full" v-model="form.parkingName_2" id="parking-name-2" type="text" />
                    <InputError :message="form.errors.parkingName_2" />
                </div>
                <div class="grow">
                    <InputLabel small for="parking-url-2">URL</InputLabel>
                    <TextInput class="w-full" v-model="form.parkingUrl_2" id="parking-url-2" type="url" />
                    <InputError :message="form.errors.parkingUrl_2" />
                </div>
            </div>
            <!-- parking 3 -->
            <PrimaryButton
                v-if="parking2visible && !parking3visible"
                type="button"
                size="xs"
                :disabled="form.processing"
                class="flex-row-reverse mt-3"
                style="align-self: end;"
                icon='<svg xmlns="http://www.w3.org/2000/svg" width="11" height="12" viewBox="0 0 11 12" fill="none">
                    <path d="M9.65714 6.74266H5.94286V10.4569C5.94286 10.654 5.86459 10.8429 5.72528 10.9822C5.58597 11.1215 5.39702 11.1998 5.2 11.1998C5.00298 11.1998 4.81403 11.1215 4.67472 10.9822C4.53541 10.8429 4.45714 10.654 4.45714 10.4569V6.74266H0.742857C0.545839 6.74266 0.356891 6.6644 0.217578 6.52508C0.0782652 6.38577 0 6.19682 0 5.9998C0 5.80279 0.0782652 5.61384 0.217578 5.47453C0.356891 5.33521 0.545839 5.25695 0.742857 5.25695H4.45714V1.54266C4.45714 1.34564 4.53541 1.1567 4.67472 1.01738C4.81403 0.87807 5.00298 0.799805 5.2 0.799805C5.39702 0.799805 5.58597 0.87807 5.72528 1.01738C5.86459 1.1567 5.94286 1.34564 5.94286 1.54266V5.25695H9.65714C9.85416 5.25695 10.0431 5.33521 10.1824 5.47453C10.3217 5.61384 10.4 5.80279 10.4 5.9998C10.4 6.19682 10.3217 6.38577 10.1824 6.52508C10.0431 6.6644 9.85416 6.74266 9.65714 6.74266Z" fill="#FAF9F6"/>
                    </svg>'
                @click="parking3visible = true"
            >
                Ajouter
            </PrimaryButton>
            <div v-if="parking3visible" class="flex gap-4 mt-3">
                <div class="grow">
                    <InputLabel small for="parking-name-3">Nom</InputLabel>
                    <TextInput class="w-full" v-model="form.parkingName_3" id="parking-name-3" type="text" />
                    <InputError :message="form.errors.parkingName_3" />
                </div>
                <div class="grow">
                    <InputLabel small for="parking-url-3">URL</InputLabel>
                    <TextInput class="w-full" v-model="form.parkingUrl_3" id="parking-url-3" type="url" />
                    <InputError :message="form.errors.parkingUrl_3" />
                </div>
            </div>
            <!-- handicap accessible -->
            <InformationText class="mt-9" type="m">Accessibilité pour tous</InformationText>
            <div class="flex items-center gap-2 mt-3">
                <Checkbox v-show="false" id="is-handicap-accessible" :checked="isHandicapAccessible" v-model="isHandicapAccessible"></Checkbox>
                <InputLabel for="is-handicap-accessible">Ce sentier est-il totalement accessible aux personnes à mobilité réduite ?</InputLabel>
                <Toggle :active="isHandicapAccessible" @toggle="isHandicapAccessible = !isHandicapAccessible" />
            </div>
            <!-- duration -->
            <InputError :message="form.errors.duration" />
            <InputError :message="form.errors.distance" />
            <InputError :message="form.errors.ascent" />
            <InputError :message="form.errors.descent" />
            <InputError :message="form.errors.path" />
            <InputError :message="form.errors.pois" />
            <InputError :message="form.errors.isLoop" />
            <!-- submit -->
            <PrimaryButton @click="submitForm" type="button" :disabled="form.processing" class="mt-9" style="width: 100%;">Créer le sentier</PrimaryButton>
            <SecondaryButton @click="console.warn('save form button clicked')" type="button" :disabled="form.processing" class="mb-8 mt-3 justify-center" style="width: 100%;">Sauvegarder le brouillon</SecondaryButton>
        </form>
    </NewPathLayout>
</template>

<style scoped>

</style>
