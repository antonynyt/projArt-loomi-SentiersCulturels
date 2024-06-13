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
import { ref, defineProps, computed, watch } from 'vue';
import SecondaryButton from "@/Components/SecondaryButton.vue";
import Toggle from "@/Components/App/Button/Toggle.vue";
import FileInput from "@/Components/FileInput.vue";
import MapManager from '@/Components/Map/MapManager.vue';
import { map, selectedPoi } from '@/Components/Map/stores/mapStore';
import { createPoiGeoJSON } from '@/Components/Map/utils/addLayer';

const props = defineProps({
    //need to be a tab of pois
    pois: {
        type: Object,
        required: true,
    },
    poiSelected: {
        type: Object,
        required: false,
        default: null,
    }
});


if (props.poiSelected) {
    selectedPoi.value = props.poiSelected;
} else if (selectedPoi.value === null) {
    selectedPoi.value = JSON.stringify(createPoiGeoJSON(0,0));
}

// const lat = ref(JSON.parse(selectedPoi.value).features[0].geometry.coordinates[1]);
// const long = ref(JSON.parse(selectedPoi.value).features[0].geometry.coordinates[0]);
const lat = computed(() => JSON.parse(selectedPoi.value).features[0].geometry.coordinates[1]);
const long = computed(() => JSON.parse(selectedPoi.value).features[0].geometry.coordinates[0]);

const isHandicapAccessible = ref(false);

const form = useForm({
    title: '',
    description: '',
    funFact: '',

    lat: lat,
    long: long,

    linkName_1: null,
    linkUrl_1: null,
    linkName_2: null,
    linkUrl_2: null,
    linkName_3: null,
    linkUrl_3: null,
    linkName_4: null,
    linkUrl_4: null,
    linkName_5: null,
    linkUrl_5: null,

    isHandicapAccessible: isHandicapAccessible.value,

    pictureFile: null,
    pictureTitle: '',
    pictureDescr: '',
    pictureAuthor: '',
    pictureYear: '',

    audioFile: null,
    audioTitle: '',
    audioDescr: '',
    audioAuthor: '',
    audioDate: '',

    question: '',
    answer_1: '',
    answer_2: '',
    answer_3: '',
    answer_4: '',
    correctAnswer: '',
}, { remember: 'new-poi-form' });

const mapOptions = {
    controls: false,
    hash: false,
};
const isMapOpen = ref(false);
const toggleMap = () => {
    isMapOpen.value = !isMapOpen.value;
}
const iconExpandMapButton = computed(() => {
    if (isMapOpen.value) {
        return '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-angle-contract" viewBox="0 0 16 16"><path stroke="white" stroke-width="0.5" fill-rule="evenodd" d="M.172 15.828a.5.5 0 0 0 .707 0l4.096-4.096V14.5a.5.5 0 1 0 1 0v-3.975a.5.5 0 0 0-.5-.5H1.5a.5.5 0 0 0 0 1h2.768L.172 15.121a.5.5 0 0 0 0 .707M15.828.172a.5.5 0 0 0-.707 0l-4.096 4.096V1.5a.5.5 0 1 0-1 0v3.975a.5.5 0 0 0 .5.5H14.5a.5.5 0 0 0 0-1h-2.768L15.828.879a.5.5 0 0 0 0-.707"/></svg>'
    } else {
        return '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-angle-expand" viewBox="0 0 16 16"><path stroke="white" stroke-width="0.5" fill-rule="evenodd" d="M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707m4.344-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707"/></svg>'
    }
});

const showAddLinkButton = ref(true);
const link2visible = ref(false);
const link3visible = ref(false);
const link4visible = ref(false);
const link5visible = ref(false);

const addLink = () => {
    if (!link2visible.value) {
        link2visible.value = true;
    } else if (!link3visible.value) {
        link3visible.value = true;
    } else if (!link4visible.value) {
        link4visible.value = true;
    } else {
        link5visible.value = true;
        showAddLinkButton.value = false;
    }
}

const showAddAnswerButton = ref(true);
const answer3visible = ref(false);
const answer4visible = ref(false);

const addAnswer = () => {
    if (!answer3visible.value) {
        answer3visible.value = true;
    } else {
        answer4visible.value = true;
        showAddAnswerButton.value = false;
    }
}

const quizOptions = computed(() => {
    const options = [
        { text: 'Réponse 1', value: 1},
        { text: 'Réponse 2', value: 2},
    ];
    if (answer3visible.value) {
        options.push({ text: 'Réponse 3', value: 3});
    }
    if (answer4visible.value) {
        options.push({ text: 'Réponse 4', value: 4});
    }
    return options;
});

const d = new Date();
const day = ("0" + d.getDate()).slice(-2);
const month = ("0" + (d.getMonth() + 1)).slice(-2);
const year = d.getFullYear();
const date = year + "-" + month + "-" + day;


</script>

<template>
    <Head title="New Path Form"></Head>
    <NewPathLayout :hasNavBar="false" class="h-dvh flex flex-col">
        <BackLink class="mb-6"/>
        <Headline rank="h1" type="l">Créer un nouveau point d'intérêt</Headline>
        <form class="flex flex-col" @submit.prevent="form.post('/new-poi/create')">
            <!-- Map preview integration -->
            <Headline class="mt-12" rank="h2" type="m">Où se situe votre point?</Headline>
            <TransitionGroup>
                <div v-if="isMapOpen" key="1" class="fixed top-0 left-0 w-dvw h-dvh bg-midnight-blue bg-opacity-30 z-10 cursor-pointer"
                    @click="toggleMap">
                </div>
                <div
                    key="2"
                    class="map__container border border-midnight-blue rounded-2xl overflow-hidden"
                    :class="[isMapOpen ? 'fixed bottom-[calc(20dvh/2)] left-[calc(10dvw/2)] h-[calc(100dvh-20dvh)] w-[calc(100dvw-10dvw)] z-20' : 'relative mt-6 h-48 w-full']"
                >
                    <MapManager
                        :options="mapOptions"
                        :pois="props.pois"
                        :selectionLayer="true"
                        :interactive="true"
                    />
                    <PrimaryButton type="button" class="absolute bottom-4 right-4" size="xs" @click="toggleMap"
                        :icon="iconExpandMapButton"
                    >
                    </PrimaryButton>
                </div>
            </TransitionGroup>
            <p>lat:{{ form.lat }} long:{{ form.long }}</p>
            <!-- Description of the POI -->
            <Headline class="mt-12" rank="h2" type="m">Description</Headline>
            <!-- title -->
            <InputLabel class="mt-6" required for="title">Titre</InputLabel>
            <TextInput v-model="form.title" id="title" type="text" class="self-start w-1/2" />
            <InputError :message="form.errors.title" />
            <!-- description -->
            <InputLabel class="mt-6" required for="description">Description</InputLabel>
            <TextAreaInput v-model="form.description" :rows="4" id="description" />
            <InputError :message="form.errors.description" />
            <!-- Fun fact -->
            <InputLabel class="mt-6" for="fun-fact">Faits amusants pour les curieux·se·s</InputLabel>
            <TextAreaInput v-model="form.funFact" :rows="4" id="fun-fact" />
            <InputError :message="form.errors.funFact" />
            <!-- External links -->
            <InformationText class="mt-9" type="s">Liens</InformationText>
            <!-- Link 1 -->
            <div class="flex gap-4 mt-3">
                <div class="grow">
                    <InputLabel small for="link-name-1">Nom</InputLabel>
                    <TextInput class="w-full" v-model="form.linkName_1" id="link-name-1" type="text" />
                    <InputError :message="form.errors.linkName_1" />
                </div>
                <div class="grow">
                    <InputLabel small for="link-url-1">URL</InputLabel>
                    <TextInput class="w-full" v-model="form.linkUrl_1" id="link-url-1" type="url" />
                    <InputError :message="form.errors.linkUrl_1" />
                </div>
            </div>
            <!-- Link 2 -->
            <div v-if="link2visible" class="flex gap-4 mt-3">
                <div class="grow">
                    <InputLabel small for="link-name-2">Nom</InputLabel>
                    <TextInput class="w-full" v-model="form.linkName_2" id="link-name-2" type="text" />
                    <InputError :message="form.errors.linkName_2" />
                </div>
                <div class="grow">
                    <InputLabel small for="link-url-2">URL</InputLabel>
                    <TextInput class="w-full" v-model="form.linkUrl_2" id="link-url-2" type="url" />
                    <InputError :message="form.errors.linkUrl_2" />
                </div>
            </div>
            <!-- Link 3 -->
            <div v-if="link3visible" class="flex gap-4 mt-3">
                <div class="grow">
                    <InputLabel small for="link-name-3">Nom</InputLabel>
                    <TextInput class="w-full" v-model="form.linkName_3" id="link-name-3" type="text" />
                    <InputError :message="form.errors.linkName_3" />
                </div>
                <div class="grow">
                    <InputLabel small for="link-url-3">URL</InputLabel>
                    <TextInput class="w-full" v-model="form.linkUrl_3" id="link-url-3" type="url" />
                    <InputError :message="form.errors.linkUrl_3" />
                </div>
            </div>
            <!-- Link 4 -->
            <div v-if="link4visible" class="flex gap-4 mt-3">
                <div class="grow">
                    <InputLabel small for="link-name-4">Nom</InputLabel>
                    <TextInput class="w-full" v-model="form.linkName_4" id="link-name-4" type="text" />
                    <InputError :message="form.errors.linkName_4" />
                </div>
                <div class="grow">
                    <InputLabel small for="link-url-4">URL</InputLabel>
                    <TextInput class="w-full" v-model="form.linkUrl_4" id="link-url-4" type="url" />
                    <InputError :message="form.errors.linkUrl_4" />
                </div>
            </div>
            <!-- Link 5 -->
            <div v-if="link5visible" class="flex gap-4 mt-3">
                <div class="grow">
                    <InputLabel small for="link-name-5">Nom</InputLabel>
                    <TextInput class="w-full" v-model="form.linkName_5" id="link-name-5" type="text" />
                    <InputError :message="form.errors.linkName_5" />
                </div>
                <div class="grow">
                    <InputLabel small for="link-url-5">URL</InputLabel>
                    <TextInput class="w-full" v-model="form.linkUrl_5" id="link-url-5" type="url" />
                    <InputError :message="form.errors.linkUrl_5" />
                </div>
            </div>
            <!-- Add link button -->
            <PrimaryButton
                v-if="showAddLinkButton"
                type="button"
                size="xs"
                :disabled="form.processing"
                class="flex-row-reverse mt-3"
                style="align-self: end;"
                icon='<svg xmlns="http://www.w3.org/2000/svg" width="11" height="12" viewBox="0 0 11 12" fill="none">
                    <path d="M9.65714 6.74266H5.94286V10.4569C5.94286 10.654 5.86459 10.8429 5.72528 10.9822C5.58597 11.1215 5.39702 11.1998 5.2 11.1998C5.00298 11.1998 4.81403 11.1215 4.67472 10.9822C4.53541 10.8429 4.45714 10.654 4.45714 10.4569V6.74266H0.742857C0.545839 6.74266 0.356891 6.6644 0.217578 6.52508C0.0782652 6.38577 0 6.19682 0 5.9998C0 5.80279 0.0782652 5.61384 0.217578 5.47453C0.356891 5.33521 0.545839 5.25695 0.742857 5.25695H4.45714V1.54266C4.45714 1.34564 4.53541 1.1567 4.67472 1.01738C4.81403 0.87807 5.00298 0.799805 5.2 0.799805C5.39702 0.799805 5.58597 0.87807 5.72528 1.01738C5.86459 1.1567 5.94286 1.34564 5.94286 1.54266V5.25695H9.65714C9.85416 5.25695 10.0431 5.33521 10.1824 5.47453C10.3217 5.61384 10.4 5.80279 10.4 5.9998C10.4 6.19682 10.3217 6.38577 10.1824 6.52508C10.0431 6.6644 9.85416 6.74266 9.65714 6.74266Z" fill="#FAF9F6"/>
                    </svg>'
                @click="addLink"
            >
                Ajouter
            </PrimaryButton>
            <!-- handicap accessible -->
            <InformationText class="mt-9" type="m">Accessibilité pour tous</InformationText>
            <div class="flex items-center gap-2 mt-3">
                <Checkbox v-show="false" id="is-handicap-accessible" :checked="isHandicapAccessible" v-model="isHandicapAccessible"></Checkbox>
                <InputLabel for="is-handicap-accessible">Ce point d'intérêt est-il totalement accessible aux personnes à mobilité réduite ?</InputLabel>
                <Toggle :active="isHandicapAccessible" @toggle="isHandicapAccessible = !isHandicapAccessible" />
            </div>
            <!-- HORIZONTAL LINE SEPARATOR -->
            <div class="h-3 mt-6 w-dvw bg-grey max-w-lg ms-[-1.25rem]"></div>
            <!-- Picture -->
            <Headline class="mt-12" rank="h2" type="m">Photo</Headline>
            <!-- Picture file -->
            <InputLabel required for="picture-file" class="mt-6">Fichier photo</InputLabel>
            <FileInput id="picture-file" accept="image/jpeg,image/webp" capture="environment" v-model="form.pictureFile" />
            <InputError :message="form.errors.pictureFile" />
            <p>{{ form.pictureFile }}</p>
            <!-- Picture title -->
            <InputLabel class="mt-6" required for="picture-title">Titre de la photo</InputLabel>
            <TextInput v-model="form.pictureTitle" id="picture-title" type="text" class="self-start"/>
            <InputError :message="form.errors.pictureTitle" />
            <!-- Picture short description -->
            <InputLabel class="mt-6" required for="picture-descr">Description courte de la photo</InputLabel>
            <TextInput v-model="form.pictureDescr" id="picture-descr" type="text" />
            <InputError :message="form.errors.pictureDescr" />
            <!-- Picture author -->
            <InputLabel class="mt-6" required for="picture-author">Auteur·e·s de la photo</InputLabel>
            <TextInput v-model="form.pictureAuthor" id="picture-author" type="text" class="self-start" />
            <InputError :message="form.errors.pictureAuthor" />
            <!-- Picture year -->
            <InputLabel class="mt-6" required for="picture-year">Année de la photo</InputLabel>
            <TextInput v-model="form.pictureYear" id="picture-year" class="self-start" type="number" min="1800" :max="year" step="1" />
            <InputError :message="form.errors.pictureYear" />
            <!-- HORIZONTAL LINE SEPARATOR -->
            <div class="h-3 mt-6 w-dvw bg-grey max-w-lg ms-[-1.25rem]"></div>
            <!-- Audio -->
            <Headline class="mt-12" rank="h2" type="m">Audio</Headline>
            <!-- Audio File -->
            <InputLabel for="audio-file" class="mt-6">Audio</InputLabel>
            <FileInput id="audio-file" accept="audio/*" capture="user" v-model="form.audioFile" />
            <InputError :message="form.errors.audioFile" />
            <!-- audio title -->
            <InputLabel class="mt-6" :required="form.audio == null ? false : true" for="audio-title">Titre de l'audio</InputLabel>
            <TextInput v-model="form.audioTitle" id="audio-title" type="text" class="self-start"/>
            <InputError :message="form.errors.audioTitle" />
            <!-- audio short description -->
            <InputLabel class="mt-6" :required="form.audio == null ? false : true" for="audio-descr">Description courte de l'audio</InputLabel>
            <TextInput v-model="form.audioDescr" id="audio-descr" type="text" />
            <InputError :message="form.errors.audioDescr" />
            <!-- audio author -->
            <InputLabel class="mt-6" :required="form.audio == null ? false : true" for="audio-author">Auteur·e·s de l'audio</InputLabel>
            <TextInput v-model="form.audioAuthor" id="audio-author" type="text" class="self-start" />
            <InputError :message="form.errors.audioAuthor" />
            <!-- audio date -->
            <InputLabel class="mt-6" :required="form.audio == null ? false : true" for="audio-date">Date de l'audio</InputLabel>
            <TextInput v-model="form.audioDate" id="audio-date" class="self-start" type="date" :max="date" step="1" />
            <InputError :message="form.errors.audioDate" />
            <!-- HORIZONTAL LINE SEPARATOR -->
            <div class="h-3 mt-6 w-dvw bg-grey max-w-lg ms-[-1.25rem]"></div>
            <!-- Quizz -->
            <Headline class="mt-12" rank="h2" type="m">Quizz</Headline>
            <!-- Question -->
            <InputLabel class="mt-6" :required="form.question !== ''" for="question">Intitulé de la question</InputLabel>
            <TextInput v-model="form.question" id="question" type="text" />
            <InputError :message="form.errors.question" />
            <!-- Answers - Option 1 -->
            <div class="mt-6 flex flex-col">
                <InputLabel :required="form.question !== ''" for="answer-1">Réponse 1</InputLabel>
                <TextInput v-model="form.answer_1" id="answer-1" type="text" />
                <InputError :message="form.errors.answer_1" />
            </div>
            <!-- Answers - Option 2 -->
            <div class="mt-6 flex flex-col">
                <InputLabel :required="form.question !== ''" for="answer-2">Réponse 2</InputLabel>
                <TextInput v-model="form.answer_2" id="answer-2" type="text" />
                <InputError :message="form.errors.answer_2" />
            </div>
            <!-- Answers - Option 3 -->
            <div v-if="answer3visible" class="mt-6 flex flex-col">
                <InputLabel for="answer-3">Réponse 3</InputLabel>
                <TextInput v-model="form.answer_3" id="answer-3" type="text" />
                <InputError :message="form.errors.answer_3" />
            </div>
            <!-- Answers - Option 4 -->
            <div v-if="answer4visible" class="mt-6 flex flex-col">
                <InputLabel for="answer-4">Réponse 4</InputLabel>
                <TextInput v-model="form.answer_4" id="answer-4" type="text" />
                <InputError :message="form.errors.answer_4" />
            </div>
            <!-- Add answer button -->
            <PrimaryButton
                v-if="showAddAnswerButton"
                type="button"
                size="xs"
                :disabled="form.processing"
                class="flex-row-reverse mt-3"
                style="align-self: end;"
                icon='<svg xmlns="http://www.w3.org/2000/svg" width="11" height="12" viewBox="0 0 11 12" fill="none">
                    <path d="M9.65714 6.74266H5.94286V10.4569C5.94286 10.654 5.86459 10.8429 5.72528 10.9822C5.58597 11.1215 5.39702 11.1998 5.2 11.1998C5.00298 11.1998 4.81403 11.1215 4.67472 10.9822C4.53541 10.8429 4.45714 10.654 4.45714 10.4569V6.74266H0.742857C0.545839 6.74266 0.356891 6.6644 0.217578 6.52508C0.0782652 6.38577 0 6.19682 0 5.9998C0 5.80279 0.0782652 5.61384 0.217578 5.47453C0.356891 5.33521 0.545839 5.25695 0.742857 5.25695H4.45714V1.54266C4.45714 1.34564 4.53541 1.1567 4.67472 1.01738C4.81403 0.87807 5.00298 0.799805 5.2 0.799805C5.39702 0.799805 5.58597 0.87807 5.72528 1.01738C5.86459 1.1567 5.94286 1.34564 5.94286 1.54266V5.25695H9.65714C9.85416 5.25695 10.0431 5.33521 10.1824 5.47453C10.3217 5.61384 10.4 5.80279 10.4 5.9998C10.4 6.19682 10.3217 6.38577 10.1824 6.52508C10.0431 6.6644 9.85416 6.74266 9.65714 6.74266Z" fill="#FAF9F6"/>
                    </svg>'
                @click="addAnswer"
            >
                Ajouter
            </PrimaryButton>
            <!-- Correct answer -->
            <InputLabel class="mt-6" :required="form.question !== ''" for="correct-answer">Réponse correcte</InputLabel>
            <SelectInput
                class="self-start"
                v-model="form.correctAnswer"
                id="correct-answer"
                :options="quizOptions"
            ></SelectInput>
            <InputError :message="form.errors.correctAnswer" />

            <!-- Errors messages of hidden variables -->
            <InputError :message="form.errors.isHandicapAccessible" />
            <InputError :message="form.errors.lat" />
            <InputError :message="form.errors.long" />
            <!-- submit -->
            <PrimaryButton @click="console.log('Submit button clicked')" type="submit" :disabled="form.processing" class="mt-16" style="width: 100%;">Créer le point d'intérêt</PrimaryButton>
            <!-- <SecondaryButton @click="console.warn('Save form button clicked')" type="button" :disabled="form.processing" class="mb-8 mt-3 justify-center" style="width: 100%;">Sauvegarder le brouillon</SecondaryButton> -->
        </form>
    </NewPathLayout>
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
