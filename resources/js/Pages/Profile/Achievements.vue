<script setup>
import { Head } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";

import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import ContentLayout from "@/Layouts/ContentLayout.vue";
import AppElementCard from "@/Components/App/AppElementCard.vue";
import AppThemeCard from "@/Components/App/AppThemeCard.vue";
import ImpactText from "@/Components/App/Text/ImpactText.vue";
import Headline from "@/Components/App/Text/Headline.vue";
import TheHeader from "@/Components/App/TheHeader.vue";
import BackLink from "@/Components/App/Button/BackLink.vue";
import SeeAllLink from "@/Components/App/Button/SeeAllLink.vue";

const props = defineProps({
    finishedPaths: {
        type: Array,
        required: true,
    },
    badges: {
        type: Array,
        required: true,
    },
    pathCount: {
        type: Number,
    },
    themes: {
        type: Array,
        required: true,
    },
});
</script>
<template>
    <Head title="Accomplissements" />

    <DefaultLayout>
        <div class="w-full max-w-lg grid-cols-4 px-5 mx-auto mt-4 mb-28">
            <BackLink />
            <Headline type="m" class="mt-4"> Accomplissements </Headline>
            <div class="fle flex-col">
                <div class="flex flex-row justify-between mt-4">
                    <div class="flex flex-row">
                        <ImpactText class="self-center pr-1">{{
                            finishedPaths.length
                        }}</ImpactText>
                        sentiers complétés sur
                        <ImpactText class="self-center pl-1">{{
                            pathCount
                        }}</ImpactText>
                    </div>
                    <SeeAllLink :href="'/dashboard/finished-paths'" />
                </div>

                <div
                    class="
                        mt-3
                        h-48
                        border border-midnight-blue
                        rounded-lg
                        overflow-hidden
                    "
                ></div>
            </div>
            <div class="flex flex-col mt-10">
                <Headline type="ms"> par thèmatiques </Headline>

                <AppThemeCard
                    v-for="theme in props.themes"
                    :key="theme.id"
                    :themeFinishedPaths="theme.finishedPaths"
                    :themePaths="theme.allPaths"
                    :image="theme.icon"
                    :title="theme.title"
                    :href="'hello'"
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
