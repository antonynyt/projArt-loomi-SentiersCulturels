<script setup>
    const props = defineProps({
        href: {
            type: String,
            required: true,
        },
    });
</script>

<template>
    <a :href rel="noopener noreferrer" target="_blank" class="text-purple underline">
        <slot/>
    </a>
</template>

<style scoped>

a::after {
    content: "↗";
    display: inline-block;
    margin-left: 0.5em;
    text-decoration: none;
    font-size: 1.3rem;
    line-height: 1;
}

</style>