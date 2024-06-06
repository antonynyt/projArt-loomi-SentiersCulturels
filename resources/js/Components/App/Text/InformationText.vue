<template>
    <p class="information" :class="['information-' + type.toLowerCase()]">{{ content }}</p>
</template>

<script setup>
    const props = defineProps({
        content: {
            type: String,
            required: true,
        },
        type: {
            type: String,
            default: 'm',
        },
    });
</script>

<style scoped>
.information{
    font-family: "PP Agrandir Variable";
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
