<script setup>
import { Link } from '@inertiajs/vue3';
import { ref, watch } from 'vue';

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

const active = ref(false);

</script>

<template>
    <Link :href class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group" :aria-label="props.label"> 
        <slot />
        <span class="text-sm mt-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500">{{ props.label }}</span>
    </Link>
</template>