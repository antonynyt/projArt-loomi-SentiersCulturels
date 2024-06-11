<script setup>
import InformationText from './App/Text/InformationText.vue';
defineProps({
    value: {
        type: String,
    },
    required: {
        type: Boolean,
        default: false,
    },
});
</script>

<template>
    <label class="block mb-2">
        <InformationText type="m" v-if="value">{{required?'* ':''}}{{ value }}</InformationText>
        <InformationText type="m" v-else>{{required?'* ':''}}<slot></slot></InformationText>
    </label>
</template>
