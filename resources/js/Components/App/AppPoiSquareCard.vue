<script setup>
import { defineProps } from 'vue';
import ImageSquareCard from '@/Components/ImageSquareCard.vue';
import InformationText from '@/Components/App/Text/InformationText.vue';
import AppNumberBadge from '@/Components/App/AppNumberBadge.vue';

const props = defineProps({
    img: {
        type: String,
        required: true,
    },
    title: {
        type: String,
        required: true,
    },
    number: {
        type: Number,
        required: true,
    },
});
</script>

<template>
<div class="relative">
    <ImageSquareCard
        :src="props.img"
        :alt="props.title"
        :size="7"
    />
    <AppNumberBadge class="absolute top-2 left-2"
        :active="true"
    >
        {{ props.number }}
    </AppNumberBadge>
    <InformationText type="s" class="mt-2 max-w-28">
        {{ props.title }}
    </InformationText>
</div>
</template>
