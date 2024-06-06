<template>
    <p class="text-midnight-blue information" :class="['information-' + type.toLowerCase()]"><slot></slot></p>
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
    font-size: 1.125rem;
    font-style: normal;
    font-weight: 469;
    line-height: normal;
}
.information-xs {
    font-size: 0.75rem;
}
.information-s {
    font-size: 0.875rem;
}
.information-m {
    font-size: 1rem;
}
.information-l {
    font-size: 1.125rem;
}
</style>
