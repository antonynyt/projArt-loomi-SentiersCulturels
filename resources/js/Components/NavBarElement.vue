<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    label: {
        type: String,
        required: true,
    },
    href: {
        type: String,
        required: true,
    },
});

</script>


<template>
    <Link :href class="inline-flex flex-col font-normal items-center justify-center text-midnight-blue px-5" :aria-label="props.label" > 
        <slot />
        <span class="text-xs mt-1">{{ props.label }}</span>
    </Link>
</template>
<style>

.active svg[data-filled] {
    visibility: visible;
    display: block;
}

.active svg[data-outlined], svg[data-filled] {
    visibility: hidden;
    display: none;
}

</style>