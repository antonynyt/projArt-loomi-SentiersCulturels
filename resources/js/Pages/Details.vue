<script setup>
import { Head } from '@inertiajs/vue3';
import ContentLayout from '@/Layouts/ContentLayout.vue';
import TheHeader from '@/Components/App/TheHeader.vue';
import BackLink from '@/Components/App/Button/BackLink.vue';
import LikeButton from '@/Components/App/Button/LikeButton.vue';
import Gallery from '@/Pages/Details/Gallery.vue';
import AppPoiStepImage from '@/Components/App/AppPoiStepImage.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import { router } from "@inertiajs/vue3";
import ExternalLink from '@/Components/App/Text/ExternalLink.vue';
import { ref, watch } from 'vue';

const props = defineProps({
    infos: {
        type: Object,
    },
    type: {
        type: String,
    },
    auth: {
        type: Object,
    },
    liked: {
        type: Boolean,
    }
});

let images = [];
const isLiked = ref(props.liked);

if (props.infos.pois) {
    images = props.infos.pois.map(poi => {
        return {
            title: poi.photos.title,
            src: poi.photos.link,
        }
    });
}

const toggleLike = (id, type) => {
    const t = type === 'path' ? 'sentier' : 'poi';
    router.post(`/${t}/${id}/like`, {}, {
        preserveScroll: true,
    });
    isLiked.value = !isLiked.value;
}

watch(() => props.liked, (newVal) => {
    isLiked.value = newVal;
});

</script>

<template>

    <Head>
        <title>{{ infos.title }}</title>
    </Head>
    <ContentLayout :hasNavBar=false class="mb-8">
        <template #header-w-full>
            <div class="fixed w-full bg-off-white">
                <nav class="bg-off-white flex flex-row justify-between items-center w-full max-w-lg mx-auto h-16 px-5 py-5">
                    <BackLink />
                    <LikeButton @click="toggleLike(infos.id, type)" :liked="isLiked" v-if="auth.user" />
                </nav>
            </div>

            <Gallery v-if="infos.pois" :images class="mt-16" />
            <img v-else :src="infos.photos[0].link" :alt="infos.photos[0].title"
                class="w-full h-[30vh] object-cover object-center" />
        </template>
        <TheHeader :title="infos.title" class="mb-3 mt-6" />
        <section class="flex mb-6 gap-4">
            <p class="text-midnight-blue">{{ infos.location }}</p>
            <div v-if="infos.theme" class="flex flex-row items-center justify-between gap-2">
                <img class="w-3 h-3" :src="infos.themeIcon" alt="" />
                <p>{{ infos.theme }}</p>
            </div>
        </section>
        <main class="flex flex-col gap-12">
            <section v-if="infos.distance">
                <div class="grid grid-cols-2 gap-4 mt-3">
                    <div v-if="infos.distance">
                        <p class="font-medium text-midnight-blue">Distance</p>
                        <div class="font-bold flex flex-row items-center no-wrap gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="7" viewBox="0 0 18 7"
                                fill="CurrentColor">
                                <path
                                    d="M0.183617 4.05071C0.125413 3.99265 0.0792346 3.92368 0.0477266 3.84775C0.0162185 3.77182 0 3.69042 0 3.60821C0 3.526 0.0162185 3.4446 0.0477266 3.36867C0.0792346 3.29274 0.125413 3.22377 0.183617 3.16571L2.68362 0.665712C2.74173 0.607602 2.81071 0.561506 2.88664 0.530057C2.96256 0.498608 3.04394 0.482422 3.12612 0.482422C3.2083 0.482422 3.28967 0.498608 3.3656 0.530057C3.44152 0.561506 3.51051 0.607602 3.56862 0.665712C3.62673 0.723821 3.67282 0.792808 3.70427 0.868732C3.73572 0.944656 3.75191 1.02603 3.75191 1.10821C3.75191 1.19039 3.73572 1.27177 3.70427 1.34769C3.67282 1.42362 3.62673 1.4926 3.56862 1.55071L2.13487 2.98321H15.3674L13.9336 1.55071C13.8163 1.43335 13.7503 1.27418 13.7503 1.10821C13.7503 0.942242 13.8163 0.78307 13.9336 0.665712C14.051 0.548353 14.2101 0.482422 14.3761 0.482422C14.5421 0.482422 14.7013 0.548353 14.8186 0.665712L17.3186 3.16571C17.3768 3.22377 17.423 3.29274 17.4545 3.36867C17.486 3.4446 17.5022 3.526 17.5022 3.60821C17.5022 3.69042 17.486 3.77182 17.4545 3.84775C17.423 3.92368 17.3768 3.99265 17.3186 4.05071L14.8186 6.55071C14.7013 6.66807 14.5421 6.734 14.3761 6.734C14.2101 6.734 14.051 6.66807 13.9336 6.55071C13.8163 6.43335 13.7503 6.27418 13.7503 6.10821C13.7503 5.94224 13.8163 5.78307 13.9336 5.66571L15.3674 4.23321H2.13487L3.56862 5.66571C3.68598 5.78307 3.75191 5.94224 3.75191 6.10821C3.75191 6.27418 3.68598 6.43335 3.56862 6.55071C3.45126 6.66807 3.29209 6.734 3.12612 6.734C2.96015 6.734 2.80098 6.66807 2.68362 6.55071L0.183617 4.05071Z" />
                            </svg>
                            <p class="whitespace-nowrap">{{ infos.distance }}</p>
                        </div>
                    </div>
                    <div v-if="infos.duration">
                        <p class="font-medium text-midnight-blue">Durée</p>
                        <div class="font-bold flex flex-row items-center no-wrap gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                fill="CurrentColor">
                                <path
                                    d="M2.84595 14.1707C2.72163 14.1707 2.6024 14.1213 2.51449 14.0334C2.42658 13.9455 2.3772 13.8262 2.3772 13.7019C2.3772 13.5776 2.42658 13.4584 2.51449 13.3704C2.6024 13.2825 2.72163 13.2332 2.84595 13.2332H3.78345V12.2957C3.78325 11.4997 4.00825 10.7199 4.43243 10.0464C4.85662 9.37286 5.46269 8.83308 6.18063 8.4894C6.45251 8.35909 6.59595 8.13597 6.59595 7.93628V7.28003C6.59595 7.08034 6.45157 6.85722 6.18063 6.7269C5.46269 6.38322 4.85662 5.84345 4.43243 5.16993C4.00825 4.4964 3.78325 3.71662 3.78345 2.92065V1.98315H2.84595C2.72163 1.98315 2.6024 1.93377 2.51449 1.84586C2.42658 1.75795 2.3772 1.63872 2.3772 1.5144C2.3772 1.39008 2.42658 1.27086 2.51449 1.18295C2.6024 1.09504 2.72163 1.04565 2.84595 1.04565H13.1584C13.2828 1.04565 13.402 1.09504 13.4899 1.18295C13.5778 1.27086 13.6272 1.39008 13.6272 1.5144C13.6272 1.63872 13.5778 1.75795 13.4899 1.84586C13.402 1.93377 13.2828 1.98315 13.1584 1.98315H12.2209V2.92065C12.2211 3.71662 11.9961 4.4964 11.572 5.16993C11.1478 5.84345 10.5417 6.38322 9.82376 6.7269C9.55188 6.85722 9.40845 7.08034 9.40845 7.28003V7.93628C9.40845 8.13597 9.55282 8.35909 9.82376 8.4894C10.5417 8.83308 11.1478 9.37286 11.572 10.0464C11.9961 10.7199 12.2211 11.4997 12.2209 12.2957V13.2332H13.1584C13.2828 13.2332 13.402 13.2825 13.4899 13.3704C13.5778 13.4584 13.6272 13.5776 13.6272 13.7019C13.6272 13.8262 13.5778 13.9455 13.4899 14.0334C13.402 14.1213 13.2828 14.1707 13.1584 14.1707H2.84595ZM4.72095 1.98315V2.92065C4.72095 3.42409 4.83345 3.90034 5.03688 4.3269H10.9675C11.17 3.90034 11.2834 3.42409 11.2834 2.92065V1.98315H4.72095ZM7.53345 7.93628C7.53345 8.59347 7.08532 9.09503 6.58563 9.33503C6.02716 9.60232 5.55571 10.0222 5.22575 10.5461C4.89578 11.07 4.72078 11.6765 4.72095 12.2957C4.72095 12.2957 5.53282 11.0778 7.53345 10.9082V7.93628ZM8.47095 7.93628V10.9082C10.4716 11.0778 11.2834 12.2957 11.2834 12.2957C11.2836 11.6765 11.1086 11.07 10.7786 10.5461C10.4487 10.0222 9.97723 9.60232 9.41876 9.33503C8.91907 9.09503 8.47095 8.59347 8.47095 7.93628Z" />
                            </svg>
                            <p class="whitespace-nowrap">{{ infos.duration }}</p>
                        </div>
                    </div>
                    <div v-if="infos.ascent">
                        <p class="font-medium text-midnight-blue">Dénivelé</p>
                        <div class="font-bold flex flex-row items-center no-wrap gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="13" viewBox="0 0 17 13"
                                fill="CurrentColor">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.97359 0.858786C7.05142 0.568314 7.34999 0.395935 7.64047 0.473767L10.7961 1.31933C10.9356 1.3567 11.0546 1.44796 11.1268 1.57303C11.199 1.69809 11.2185 1.84671 11.1812 1.9862L10.3356 5.14188C10.2578 5.43235 9.9592 5.60473 9.66873 5.5269C9.37826 5.44907 9.20588 5.1505 9.28371 4.86003L9.78048 3.00606L1.79773 7.99528C1.54272 8.15466 1.20679 8.07713 1.04741 7.82212C0.888033 7.56712 0.965555 7.23119 1.22056 7.07181L9.27346 2.03874L7.35861 1.52566C7.06814 1.44783 6.89576 1.14926 6.97359 0.858786ZM15.7916 3.1898C15.9606 3.2869 16.0649 3.46699 16.0649 3.66195V12.132C16.0649 12.4327 15.8211 12.6765 15.5204 12.6765H1.00036C0.754368 12.6765 0.538928 12.5115 0.474729 12.2741C0.410531 12.0366 0.51352 11.7856 0.726002 11.6616L15.246 3.19163C15.4144 3.09339 15.6225 3.09269 15.7916 3.1898ZM3.01442 11.5875H14.9759V4.60995L3.01442 11.5875Z" />
                            </svg>
                            <p class="whitespace-nowrap">{{ infos.ascent }}</p>
                        </div>
                    </div>
                    <div v-if="infos.difficulty">
                        <p class="font-medium text-midnight-blue">Difficulté</p>
                        <p class="font-bold">{{ infos.difficulty }}</p>
                    </div>
                </div>
            </section>
            <section v-if="infos.description">
                <h2 class="text-xl font-bold uppercase text-midnight-blue mb-3">Description</h2>
                <p>{{ infos.description }}</p>
            </section>
            <section v-if="infos.facts">
                <h2 class="text-xl font-bold uppercase text-midnight-blue mb-3">Fun Facts</h2>
                <div class="flex flex-col gap-3">
                    <p v-for="fact in infos.facts">{{ fact.content }}</p>
                </div>
            </section>
            <section v-if="infos.audios">
                <h2 class="text-xl font-bold uppercase text-midnight-blue mb-3">Audio</h2>
                <audio class="w-full" v-for="(audio, index) in infos.audios" controls>
                    <source :src="audio.src_link" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </section>
            <section v-if="infos.pois">
                <h2 class="text-xl font-bold uppercase text-midnight-blue mb-3">Étapes ({{ infos.pois.length }})</h2>
                <div class="flex w-full flex-row gap-6 overflow-x-scroll pt-1 pb-4 no-scrollbar">
                    <AppPoiStepImage v-for="(poi, index) in infos.pois" class="snap-center" :step="index + 1"
                        :title="poi.title" :href="'/poi/' + poi.id" :thumbnail="poi.photos.link" />
                </div>
            </section>
            <section v-if="infos.parkings || infos.is_handicap_accessible || infos.pois" class="flex flex-col">
                <h2 class="text-xl font-bold uppercase text-midnight-blue mb-4">Infos Pratiques</h2>
                <div v-if="infos.parkings" class="mb-8">
                    <h3 class="font-bold text-midnight-blue mb-3">Parkings à proximité</h3>
                    <div class="flex flex-col gap-2">
                        <ExternalLink v-for="link in infos.parkings" :key="link.id" :href="link.url">{{ link.title }}</ExternalLink>
                    </div>
                </div>
                <div v-if="infos.is_handicap_accessible" class="mb-8">
                    <h3 class="font-bold text-midnight-blue mb-3">Accessibilité</h3>
                    <p>Ce sentier est accessible pour les personnes à mobilité réduite.</p>
                </div>
                <div v-if="infos.pois" class="mb-6">
                    <h3 class="font-bold text-midnight-blue mb-3">Accès au point de départ</h3>
                    <div class="flex flex-col gap-2">
                        <ExternalLink
                            :href="'https://www.google.com/maps/dir/?api=1&destination=' + infos.pois[0].lat + ',' + infos.pois[0].long">
                            Ouvrir sur Google Maps</ExternalLink>
                    </div>
                </div>
            </section>
            <section v-if="infos.links" class="flex flex-col">
                <h2 class="text-xl font-bold uppercase text-midnight-blue mb-4">Liens</h2>
                <div class="flex flex-col gap-2">
                    <ExternalLink v-for="link in infos.links" :key="link.id" :href="link.url">
                        {{ link.title }}</ExternalLink>
                </div>
            </section>
            <div class="flex flex-row w-full gap-4">
                <PrimaryButton v-if="type === 'path'" @click="router.visit(`/map/${infos.id}`, { preserveState: true })" class="grow">Lancer le parcours</PrimaryButton>
                <PrimaryButton v-if="type === 'poi'" @click="router.visit(`/related/${infos.id}`, { preserveState: true })" class="grow">Voir les sentiers associés</PrimaryButton>
            </div>
        </main>
    </ContentLayout>
</template>