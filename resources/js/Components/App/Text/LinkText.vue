<template>
    <a class="link" :class="['link-' + type.toLowerCase(), { 'underline': underline }]">{{ content }}</a>
</template>

<script setup>
    const props = defineProps({
        content: {
            type: String,
            required: true,
        },
        underline: {
            type: Boolean,
            default: true,
        },
        type: {
            type: String,
            default: 'm',
        },
    });
</script>

<style scoped>
.link{
    font-family: PPAvenir, ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    font-style: normal;
    font-weight: 336;
    line-height: normal;
}
.link.underline{
    text-decoration-line: underline;
}
.link-s {
    font-size: 14px;
}
.link-m {
    font-size: 18px;
}
</style>
