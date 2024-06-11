<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
const goBack = () => {
    window.history.back()
};
</script>

<template>
    <PrimaryButton
        icon='<svg xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12">
        <path d="M2.46535 6.32925L7.8457 10.7333L6.61319 11.7422L0.000323296 6.32925L6.61319 0.916311L7.8457 1.92518L2.46535 6.32925Z"/>
        </svg>'
        @click="goBack"
        :darkmode="true"
    >
        Retour
    </PrimaryButton>
</template>
