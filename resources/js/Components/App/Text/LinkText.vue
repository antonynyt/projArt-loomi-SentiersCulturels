<template>
    <a class="text-midnight-blue link" :class="['link-' + type.toLowerCase(), { 'underline': underline }]"><slot></slot></a>
</template>

<script setup>
    const props = defineProps({
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
    font-style: normal;
    font-weight: 336;
    line-height: normal;
}
.link.underline{
    text-decoration-line: underline;
}
.link-s {
    font-size: 0.875rem;
}
.link-m {
    font-size: 1.125rem;
}
</style>
