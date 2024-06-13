<script setup>
import { ref, watch, useSlots } from 'vue';
import InformationText from '../Text/InformationText.vue';
/* import ImpactText from '../Text/ImpactText.vue'; */

const props = defineProps({
    name: {
        type: String,
        required: true,
    },
    id: {
        type: String,
        required: true,
    }
});

</script>

<template>
    <input type="radio" :id :name class="appearance-none hidden" />
    <label :for="id" class="self-center shrink-0 px-5 py-2.5 bg-off-white border rounded-full tracking-widest transition ease-in-out duration-150"><slot></slot></label>
</template>

<style scoped>

input[type="radio"]:checked + label {
    @apply bg-green;
}

</style>