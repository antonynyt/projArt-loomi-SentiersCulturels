<template>
    <p class="information" :class="['information-' + type.toLowerCase()]"><slot></slot></p>
</template>

<script setup>
    const props = defineProps({
        type: {
            type: String,
            default: 'm',
        },
    });
</script>

<style scoped>
.information{
    font-family: PPAvenir, ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    font-size: 18px;
    font-style: normal;
    font-weight: 469;
    line-height: normal;
}
.information-xs {
    font-size: 12px;
}
.information-s {
    font-size: 14px;
}
.information-m {
    font-size: 16px;
}
.information-l {
    font-size: 18px;
}
</style>
