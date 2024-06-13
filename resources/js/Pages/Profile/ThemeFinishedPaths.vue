<script setup>
import { Head } from "@inertiajs/vue3";
import { usePage, router } from "@inertiajs/vue3";
import { ref, watchEffect, computed } from "vue";

import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import ContentLayout from "@/Layouts/ContentLayout.vue";
import ProgressBar from "@/Components/ProgressBar.vue";

import AppElementCard from "@/Components/App/AppElementCard.vue";
import ImpactText from "@/Components/App/Text/ImpactText.vue";
import Headline from "@/Components/App/Text/Headline.vue";
import TheHeader from "@/Components/App/TheHeader.vue";
import BackLink from "@/Components/App/Button/BackLink.vue";

const props = defineProps({
    title: {
        type: String,
        required: true,
    },
    finishedPaths: {
        type: Array,
        required: true,
    },
    finishedCount: {
        type: Number,
    },
    pathCount: {
        type: Number,
    },
});
</script>
<template>
    <Head title="Sentiers terminés" />

    <DefaultLayout>
        <div class="w-full max-w-lg grid-cols-4 px-5 mx-auto mt-4 mb-28">
            <BackLink />

            <Headline type="m" class="mt-4">
                Sentiers {{ title }} Terminés
            </Headline>
            <div class="pb-6 mt-4">
                <!-- progress bar -->
                <ProgressBar
                    :finishedPathsCount="props.finishedCount"
                    :themePathsCount="props.pathCount"
                    :title="props.title"
                />

                <div class="flex flex-row">
                    <ImpactText class="self-center pr-1">{{
                        props.finishedCount
                    }}</ImpactText>
                    sentiers complétés sur
                    <ImpactText class="self-center pl-1">{{
                        pathCount
                    }}</ImpactText>
                </div>
            </div>

            <div class="flex flex-col gap-4">
                <AppElementCard
                    v-for="path in finishedPaths"
                    :key="path.id"
                    @cardClick="
                        router.visit(`/sentier/${path.id}`, {
                            preserveState: true,
                        })
                    "
                    :thumbnail="path.thumbnail"
                    :title="path.title"
                    type="path"
                    :location="path.location"
                    :infos="{
                        distance: path.distance,
                        duration: path.duration,
                        ascent: path.ascent,
                    }"
                />
            </div>
        </div>
    </DefaultLayout>
</template>

<style scoped>
.progress-circle-container {
    margin-left: -5px;
}
</style>
