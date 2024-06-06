<template>
    <p class="impact" :class="['impact-' + type.toLowerCase(), { 'heavy': heavy }]"><slot></slot></p>
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
    font-size: 16px;
    font-style: normal;
    font-weight: 617;
    line-height: normal;
}
.impact.heavy{
    font-weight: 767;
}
.impact-xxs {
    font-size: 9px;
}
.impact-xs {
    font-size: 12px;
}
.impact-s {
    font-size: 14px;
}
.impact-m {
    font-size: 16px;
}
.impact-l {
    font-size: 18px;
}
.impact-xl {
    font-size: 22px;
}
</style>
