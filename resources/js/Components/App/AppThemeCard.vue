<script setup>
import { ref, watchEffect, computed } from "vue";
import ImpactText from "@/Components/App/Text/ImpactText.vue";
import ProgressBar from "@/Components/ProgressBar.vue";

const props = defineProps({
    themeFinishedPaths: {
        type: Number,
        required: true,
    },
    themePaths: {
        type: Array,
        required: true,
    },
    image: {
        type: String,
        required: true,
    },
    title: {
        type: String,
        required: true,
    },
    href: {
        type: String,
        required: true,
    },
});
</script>
<template>
    <div
        class="
            mt-3
            px-6
            py-4
            border-[0.5px] border-grey
            rounded-lg
            overflow-hidden
        "
    >
        <a :href="props.href">
            <div class="flex flex-row gap-2">
                <img width="18" height="19" :src="props.image" />
                <ImpactText>{{ props.title }}</ImpactText>
            </div>
            <ProgressBar
                :finishedPathsCount="props.themeFinishedPaths"
                :themePathsCount="props.themePaths.length"
                :title="props.title"
            />
            <div class="flex text-sm">
                <ImpactText type="s" class="self-center pr-1">{{
                    themeFinishedPaths
                }}</ImpactText>
                complétés sur
                <ImpactText type="s" class="self-center pl-1">{{
                    props.themePaths.length
                }}</ImpactText>
            </div>
        </a>
    </div>
</template>
<style scoped>
.progress-circle-container {
    margin-left: -5px;
}
</style>
