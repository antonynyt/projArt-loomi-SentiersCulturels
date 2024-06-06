<template>
    <p class="text" :class="['text-' + type.toLowerCase()]">{{ content }}</p>
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
.text{
    font-family: "PP Agrandir Variable";
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
