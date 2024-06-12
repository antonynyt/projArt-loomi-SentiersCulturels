<script setup>
import { Head } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
import { router } from "@inertiajs/vue3";
import { ref, watchEffect, computed } from "vue";

import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import ContentLayout from "@/Layouts/ContentLayout.vue";
import AppElementCard from "@/Components/App/AppElementCard.vue";
import AppThemeCard from "@/Components/App/AppThemeCard.vue";
import ImpactText from "@/Components/App/Text/ImpactText.vue";
import Headline from "@/Components/App/Text/Headline.vue";
import TheHeader from "@/Components/App/TheHeader.vue";
import BackLink from "@/Components/App/Button/BackLink.vue";
import SeeAllLink from "@/Components/App/Button/SeeAllLink.vue";
import AchievementOverlay from "@/Pages/Profile/Partials/AchievementOverlay.vue";

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

// Badge thresholds
const badgeThresholds = [1, 5, 10, 20, 35, 50, 0];

// Reactive state for overlay
const selectedBadge = ref(null);
const isOverlayVisible = ref(false);

// Function to handle badge click
const showBadgeOverlay = (badgeImage) => {
    selectedBadge.value = badgeImage;
    isOverlayVisible.value = true;
    console.log(selectedBadge.value);
};

console.log(props.badges.value);

// Computes the badge images to display on the grid
const badgesT = computed(() => {
    return badgeThresholds.map((threshold, index) => {
        const badge = props.badges[index];
        if (
            props.finishedPaths.length >= threshold &&
            props.finishedPaths.length > 0
        ) {
            return badge ? badge : props.badges[6];
        }
        return props.badges[6];
    });
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
                        px-2
                        py-6
                        border-[0.5px] border-grey
                        bg-zinc-300
                        rounded-lg
                        overflow-hidden
                        grid grid-cols-3
                        gap-5
                        justify-items-center
                    "
                >
                    <img
                        v-for="(badge, index) in badgesT.slice(
                            0,
                            badgesT.length - 1
                        )"
                        :key="index"
                        :src="badge.image"
                        @click="showBadgeOverlay(badge)"
                        class="self-center"
                    />
                </div>
            </div>
            <div class="flex flex-col mt-10">
                <Headline type="ms"> par thématique </Headline>

                <AppThemeCard
                    v-for="theme in props.themes"
                    :key="theme.id"
                    @cardClick="
                        router.visit(`accomplissements/theme/${theme.id}`, {
                            preserveState: true,
                        })
                    "
                    :themeFinishedPaths="theme.finishedPaths"
                    :themePaths="theme.allPaths"
                    :image="theme.icon"
                    :title="theme.title"
                />
            </div>
        </div>
        <AchievementOverlay
            v-if="isOverlayVisible"
            :badge="selectedBadge"
            :isVisible="isOverlayVisible"
            @close="isOverlayVisible = false"
        />
    </DefaultLayout>
</template>

<style scoped>
.progress-circle-container {
    margin-left: -5px;
}
</style>
