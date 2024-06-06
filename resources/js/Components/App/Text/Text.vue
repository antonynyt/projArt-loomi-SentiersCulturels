<template>
    <p class="text" :class="['text-' + type.toLowerCase()]"><slot></slot></p>
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
.text{
    font-family: PPAvenir, ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    font-style: normal;
    font-weight: 336;
    line-height: normal;
}
.text-xs {
    font-size: 10px;
}
.text-s {
    font-size: 12px;
}
.text-m {
    font-size: 14px;
}
.text-l {
    font-size: 18px;
}
</style>
