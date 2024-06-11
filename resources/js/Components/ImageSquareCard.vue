<script setup>
import { defineProps, defineEmits } from 'vue';
import { computed } from 'vue';
import ImageSquareCard from '@/Components/ImageSquareCard.vue';

const props = defineProps({
    src: {
        type: String,
        required: true
    },
    alt: {
        type: String,
        default: ''
    },
    size: {
        type: Number,
        default: 8
    }
});

const emit = defineEmits(['click']);

const radiusTable = {
    '1': 'rounded-sm',
    '2': 'rounded',
    '3': 'rounded-md',
    '4': 'rounded-lg',
    '5': 'rounded-lg',
    '6': 'rounded-xl',
    '7': 'rounded-2xl',
    '8': 'rounded-3xl',
    '9': 'rounded-3xl',
    '10': 'rounded-3xl',
};

const rootFontSize = computed(() => {
    return parseFloat(getComputedStyle(document.documentElement).fontSize);
});
</script>

<template>
        <img
        class="grow-0 shrink-0 aspect-square object-cover bg-midnight-blue"
        :class="radiusTable[size]"
        :height="size*rootFontSize"
        :width="size*rootFontSize"
        :src="props.src"
        :alt="props.alt"
        @click="$emit('click')"
    >
</template>
