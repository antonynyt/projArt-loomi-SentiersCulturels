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
    small: {
        type: Boolean,
        default: false,
    },
});
</script>

<template>
    <label class="block" :class="small ? 'mb-1' : 'mb-2'">
        <InformationText :type="small ? 'xs' : 's'" v-if="value">{{required?'* ':''}}{{ value }}</InformationText>
        <InformationText :type="small ? 'xs' : 's'" v-else>{{required?'* ':''}}<slot></slot></InformationText>
    </label>
</template>
