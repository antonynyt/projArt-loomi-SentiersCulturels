<script setup>
import AppNumberBadge from '@/Components/App/AppNumberBadge.vue';
import AppElementCard from './AppElementCard.vue';

const props = defineProps({
    thumbnail: {
        type: String,
        required: true,
    },
    title: {
        type: String,
        required: true,
    },
    location: {
        type: String,
        required: false,
        default: null,
    },
    navigation: {
        type: Boolean,
        required: false,
        default: true,
    },
    navigationInfos: {
        type: Object,
        required: false,
        default: null,
    },
    coordinates: {
        type: Array,
        required: false,
    },
    border: {
        type: Boolean,
        default: true,
    },
    active: {
        type: Boolean,
        default: false,
    },
    first: {
        type: Boolean,
        default: false,
    },
    last: {
        type: Boolean,
        default: false,
    },
});
</script>

<template>
    <div class="flex flex-row">
        <div class="flex flex-col basis-10 shrink-0 place-items-center">
            <div
                class="h-full border-midnight-blue"
                :class="[first ? 'border-0' : 'border-2']"
            ></div>
            <AppNumberBadge active class="">
                <slot name="content"></slot>
            </AppNumberBadge>
            <div
                class="h-full border-midnight-blue"
                :class="[last ? 'border-0' : 'border-2']"
            ></div>
        </div>
        <AppElementCard
                class="col-span-5 my-2"
                :thumbnail="props.thumbnail"
                :title="props.title"
                :location="props.location"
                :navigation="props.navigation"
                :navigationInfos="props.navigationInfos"
                :coordinates="props.coordinates"
                :border="props.border"
                :active="props.active"
                type="poi"
                @cardClick="$emit('cardClick', props)"
        >
            <template v-slot:button>
                <!-- Slot to add a button -->
                <slot name="button"></slot>
            </template>
        </AppElementCard>
    </div>
</template>
