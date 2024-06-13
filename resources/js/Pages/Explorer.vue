<script setup>
import { Head, usePage, router } from '@inertiajs/vue3';
import { ref } from 'vue';
import MapPane from '@/Components/Map/MapPane.vue';
import ContentLayout from '@/Layouts/ContentLayout.vue';
import TheHeader from '@/Components/App/TheHeader.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AppDisclamer from '@/Components/App/AppDisclamer.vue';
import AppElementCard from '@/Components/App/AppElementCard.vue';
import Headline from '@/Components/App/Text/Headline.vue';
import Text from '@/Components/App/Text/Text.vue';
import SeeAllLink from "@/Components/App/Button/SeeAllLink.vue";
import { poi } from '@/Components/Map/stores/mapStore';

const { props } = usePage();

const paths = ref(props.paths);
const themes = ref(props.themes);
const populaires = ref(props.populaires);
const facts = ref(props.facts);
poi.value = props.poi;
console.log(poi.value);

const options = {
    flyToUserLocation: true,
    controls: false,
    nomove: true,
};

const extractLocality = (address) => {
    const parts = address.split(',');
    if (parts.length < 3) return address; // Return the whole address if it's not in the expected format
    let locality = parts[parts.length - 2].trim();
    locality = locality.replace(/^\d{4}\s*/, ''); // Remove the 4-digit NPA if present
    return locality;
};

</script>

<template>

    <Head>
        <title>Explorer</title>
    </Head>

    <AppDisclamer />

    <ContentLayout>
        <TheHeader title="Explorer" class="mb-8" />
        <main class="flex flex-col gap-4">
            <section>
                <Headline rank="h2" type="ms" class="mb-3">Sentiers</Headline>
                <div class="flex w-full flex-row gap-3 overflow-x-scroll mt-3 pb-4 no-scrollbar">
                    <a @click.prevent="router.visit('/sentiers')" href="/sentiers"
                        class="shrink-0 block py-2 px-5 border border-1 rounded-2xl">
                        <p>Tous</p>
                    </a>
                    <a v-for="theme in themes" @click.prevent="router.visit(`/sentiers/${theme.title.toLowerCase()}`)" :href="'/sentiers/' + theme.title.toLowerCase()"
                        class="shrink-0 block py-2 px-3 border border-1 rounded-2xl">
                        <div class="flex flex-row items-center justify-between gap-2">
                            <img class="w-3 h-3" :src="theme.icon" alt="" />
                            <p>{{ theme.title }}</p>
                        </div>
                    </a>
                </div>
            </section>
            <section class="flex flex-col">
                <Headline rank="h2" type="ms" class="mb-3">Autour de toi</Headline>
                <div class="h-48 border border-grey rounded-xl overflow-hidden">
                    <MapPane :options />
                </div>
            </section>
            <section class="mt-8">
                <div class="flex flex-row justify-between mb-3">
                    <Headline rank="h2" type="ms">Sentiers populaires</Headline>
                </div>
                <div class="flex w-full flex-row gap-6 overflow-x-scroll mt-3 pb-4 no-scrollbar">
                    <AppElementCard class="w-10/12 shrink-0" v-for="(populaire) in populaires" :title="populaire.title"
                        :thumbnail="populaire.thumbnail" :location="extractLocality(populaire.location)"
                        :type="populaire.type"
                        :infos="{ duration: populaire.duration, ascent: populaire.ascent, distance: populaire.distance }"
                        @cardClick="router.visit(`/sentier/${populaire.id}`)" />
                </div>
            </section>

            <section v-if="facts" v-for="fact in facts" class="flex flex-col mt-8">
                <a :href="'/poi/'+fact.id+''" class="relative w-full h-96 aspect-square bg-cover rounded-2xl" :style="'background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0)), url('+fact.thumbnail+')'">
                    <Headline rank="h2" type="post" class="absolute top-6 left-6 text-white">Fun Fact</Headline>
                    <div class="absolute top-24 left-6 w-4/6">
                        <Text class="text-m text-white">{{ fact.factContent }}</Text>
                    </div>
                </a>
            </section>
        </main>
    </ContentLayout>


</template>

<style scoped>
.maplibregl-canvas:hover,
.maplibregl-canvas:focus {
    cursor: inherit;
}
</style>