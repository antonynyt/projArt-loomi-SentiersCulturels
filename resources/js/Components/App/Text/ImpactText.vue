<template>
    <p class="text-midnight-blue impact" :class="['impact-' + type.toLowerCase(), { 'heavy': heavy }]"><slot></slot></p>
</template>

<script setup>
    const props = defineProps({
        heavy: {
            type: Boolean,
            default: false,
        },
        type: {
            type: String,
            default: 'm',
        },
    });
</script>

<style scoped>
.impact{
    font-size: 1rem;
    font-style: normal;
    font-weight: 617;
    line-height: normal;
}
.impact.heavy{
    font-weight: 767;
}
.impact-xxs {
    font-size: 0.5625rem;
}
.impact-xs {
    font-size: 0.75rem;
}
.impact-s {
    font-size: 0.875rem;
}
.impact-m {
    font-size: 1rem;
}
.impact-l {
    font-size: 1.125rem;
}
.impact-xl {
    font-size: 1.375rem;
}
</style>
