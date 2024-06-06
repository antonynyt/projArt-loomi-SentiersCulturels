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
    font-family: "PP Agrandir Variable";
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
