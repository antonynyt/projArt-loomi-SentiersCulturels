<template>
    <p class="text-midnight-blue text" :class="['text-' + type.toLowerCase()]"><slot></slot></p>
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
    font-style: normal;
    font-weight: 336;
    line-height: normal;
}
.text-xs {
    font-size: 0.625rem;
}
.text-s {
    font-size: 0.75rem;
}
.text-m {
    font-size: 0.875rem;
}
.text-l {
    font-size: 1.125rem;
}
</style>
