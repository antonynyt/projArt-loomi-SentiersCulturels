<script setup>

const props = defineProps({
    title: {
        type: String,
        required: true,
    },
});

</script>

<template>
    <header class="text-3xl font-extrabold mt-14">
        <h1 class="uppercase">{{ title }}</h1>
    </header>
</template>