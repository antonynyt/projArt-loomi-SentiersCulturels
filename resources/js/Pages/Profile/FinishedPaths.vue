<script setup>
import { Head } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
import { ref, watchEffect, computed } from "vue";

import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import ContentLayout from "@/Layouts/ContentLayout.vue";
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
const progressWidth = ref("0");
const fillingColor = ref("grey");

watchEffect(() => {
    if (pathCount.value > 0) {
        const progressPercentage =
            (finishedPaths.value.length * 100) / pathCount.value;
        progressWidth.value = `${progressPercentage}%`;
    } else {
        progressWidth.value = "0%";
    }
});

const isComplete = computed(() => parseFloat(progressWidth.value) >= 100);
</script>
<template>
    <Head title="Sentiers terminés" />

    <DefaultLayout>
        <div class="w-full max-w-lg grid-cols-4 px-5 mx-auto mt-4 mb-28">
            <BackLink />

            <Headline type="m" class="mt-4"> Sentiers Terminés </Headline>
            <div class="pb-6 mt-4">
                <!-- progress bar -->
                <div class="flex flex-row">
                    <div class="w-full bg-grey rounded-full h-2.5 self-center">
                        <div
                            class="
                                bg-midnight-blue
                                h-2.5
                                rounded-full
                                self-center
                            "
                            :style="{ width: progressWidth }"
                        ></div>
                    </div>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="29"
                        height="29"
                        viewBox="0 0 29 29"
                        fill="none"
                        class="progress-circle-container"
                    >
                        <ellipse
                            cx="14.9131"
                            cy="14.5"
                            rx="14.087"
                            ry="14.5"
                            :class="{
                                'fill-midnight-blue': isComplete,
                                'fill-grey': !isComplete,
                            }"
                        />
                        <path
                            d="M14.911 18.5876L18.7066 20.8129C19.4017 21.2207 20.2522 20.6178 20.0693 19.8554L19.0633 15.6709L22.4198 12.8518C23.0326 12.3376 22.7033 11.3624 21.8985 11.3003L17.481 10.9369L15.7525 6.98291C15.4415 6.26481 14.3806 6.26481 14.0696 6.98291L12.3411 10.928L7.9236 11.2915C7.11876 11.3535 6.78951 12.3287 7.40228 12.8429L10.7588 15.6621L9.75277 19.8465C9.56986 20.6089 10.4204 21.2118 11.1155 20.804L14.911 18.5876Z"
                            fill="white"
                        />
                    </svg>
                </div>

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
                    :key="pathHistory.path.id"
                    :thumbnail="pathHistory.thumbnail"
                    :title="pathHistory.path.title"
                    type="path"
                    :href="'/sentier/' + pathHistory.path_id"
                    :location="pathHistory.location"
                    :infos="{
                        distance: pathHistory.path.distance,
                        duration: pathHistory.path.duration,
                        ascent: pathHistory.path.ascent,
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
