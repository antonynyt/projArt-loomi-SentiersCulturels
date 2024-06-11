<template>
        <button class="inline-flex gap-4 items-center back-button text-midnight-blue" @click="goBack">
            <svg class="fill-midnight-blue" xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12"
                fill="none">
                <path
                    d="M2.46535 6.32925L7.8457 10.7333L6.61319 11.7422L0.000323296 6.32925L6.61319 0.916311L7.8457 1.92518L2.46535 6.32925Z"
                    fill="#101720" />
            </svg>
            <p>Retour</p>
        </button>
</template>

<script setup>
const goBack = () => {
    window.history.back()
};
</script>

<style scoped>

.back-button {
    /* font-size: 0.875rem; */
    font-style: normal;
    font-weight: 469;
    line-height: normal;
    position: relative;
}

.back-button::after {
    content: '';
    position: absolute;
    width: calc(100% + 20px);
    height: 100%;
    left: -10px;
    padding: 20px;
}
</style>
