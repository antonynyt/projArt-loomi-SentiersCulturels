<script setup>
import { Head } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
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
    finishedPaths: {
        type: Array,
        required: true,
    },
    pathCount: {
        type: Number,
    },
});

const finishedPaths = ref(props.finishedPaths);
const pathCount = ref(props.pathCount);
</script>
<template>
    <Head title="Sentiers terminés" />

    <DefaultLayout>
        <div class="w-full max-w-lg grid-cols-4 px-5 mx-auto mt-4 mb-28">
            <BackLink />

            <Headline type="m" class="mt-4"> Sentiers Terminés </Headline>
            <div class="pb-6 mt-4">
                <!-- progress bar -->
                <ProgressBar
                    :finishedPathsCount="props.finishedPaths.length"
                    :themePathsCount="props.pathCount"
                    :title="'midnight-blue'"
                />

                <div class="flex flex-row">
                    <ImpactText class="self-center pr-1">{{
                        finishedPaths.length
                    }}</ImpactText>
                    sentiers complétés sur
                    <ImpactText class="self-center pl-1">{{
                        pathCount
                    }}</ImpactText>
                </div>
            </div>

            <div class="flex flex-col gap-4">
                <AppElementCard
                    v-for="pathHistory in finishedPaths"
                    :key="pathHistory.id"
                    :thumbnail="pathHistory.thumbnail"
                    :title="pathHistory.title"
                    type="path"
                    @cardClick="router.visit(`/sentier/${pathHistory.id}`, { preserveState: true })"
                    :location="pathHistory.location"
                    :infos="{
                        distance: pathHistory.distance,
                        duration: pathHistory.duration,
                        ascent: pathHistory.ascent,
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
