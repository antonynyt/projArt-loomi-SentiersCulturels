<script setup>
import { ref, watch, useSlots } from 'vue';
import InformationText from '../Text/InformationText.vue';
/* import ImpactText from '../Text/ImpactText.vue'; */

const props = defineProps({
    selected: {
        type: Boolean,
        required: false,
    }
});

const isSelected = ref(props.selected);

watch(() => props.selected, (newVal) => {
    isSelected.value = newVal;
});

let height = 11;
let padding = 6;
let circlePadding = 2;

const slots = useSlots();
</script>

<template>
    <button v-if="isSelected" class="self-center shrink-0 px-5 py-2.5 bg-green border rounded-full tracking-widest transition ease-in-out duration-150">
        <InformationText class="information-m">
            <slot></slot>
        </InformationText>
    </button>
    <button v-else class="self-center shrink-0 px-5 py-2.5 border rounded-full tracking-widest transition ease-in-out duration-150">
        <InformationText class="information-m">
            <slot></slot>
        </InformationText>
    </button>
</template>
