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
import Dropdown from '@/Components/Dropdown.vue'
import SelectInput from '@/Components/SelectInput.vue'
import TextAreaInput from '@/Components/TextAreaInput.vue'
import AppPoiSqareCard from '@/Components/App/AppPoiSquareCard.vue'

const props = defineProps({
    selectedPois: {
        type: Array,
        required: true,
    },
    path: {
        type: Object,
        required: true,
    },
    themes: {
        type: Array,
        required: true,
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

const form = useForm({
    title: '',
    descr: '',
    duration: null,
    distance: null,
    ascent: null,
    descent: null,
    difficulty: 'facile',
    isHandicapAccessible: false,
    path: null,
    pois: null,
    theme: null,
    loopPath: false,
})

</script>

<template>
    <Head title="New Path Form"></Head>
    <NewPathLayout class="h-dvh flex flex-col">
        <BackLink class="mb-6"/>
        <Headline rank="h1" type="l">Créer un nouveau sentier</Headline>
        <Headline class="mt-12" rank="h2" type="m">Description</Headline>
        <form class="flex flex-col" @submit.prevent="form.post('/login')">
            <!-- title -->
            <InputLabel class="mt-6" required for="title">Titre du sentier</InputLabel>
            <TextInput v-model="form.title" id="title" type="text" />
            <InputError :message="form.errors.title" />
            <!-- theme -->
            <InputLabel class="mt-6" for="theme">Thème</InputLabel>
            <SelectInput
                v-model="form.theme"
                id="theme"
                placeholder="Choisissez une thématique"
                :options=options
            />
            <InputError :message="form.errors.theme" />
            <!-- description -->
            <InputLabel class="mt-6" required for="descr">Description</InputLabel>
            <TextAreaInput v-model="form.descr" id="descr" />
            <InputError :message="form.errors.descr" />
            <!-- pois -->
            <InputLabel class="mt-6" required for="pois">Étapes</InputLabel>
            <div id="pois" class="no-scrollbar flex gap-3 overflow-x-scroll">
                <AppPoiSqareCard
                    v-for="(poi, n) in props.selectedPois"
                    class="shrink-0"
                    :key="poi.id"
                    :img="poi.photos[0].link"
                    :title="poi.title"
                    :number="n+1"
                ></AppPoiSqareCard>
            </div>
            <!-- handicap accessible -->
            <div class="flex gap-2 mt-6">
                <Checkbox id="is-handicap-accessible" :checked="false" v-model="form.isHandicapAccessible"></Checkbox>
                <InputLabel for="is-handicap-accessible">Accessible aux personnes à mobilité réduite</InputLabel>
            </div>
            <!-- submit -->
            <PrimaryButton type="submit" :disabled="form.processing" class="mb-8 mt-6 justify-center" style="width: 100%;">Créer un nouveau sentier</PrimaryButton>
        </form>
    </NewPathLayout>
</template>

<style scoped>

</style>
