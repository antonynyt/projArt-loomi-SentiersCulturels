<script setup>
const props = defineProps({
    active: {
        type: Boolean,
        required: false,
        default: false,
    },
});

</script>

<template>
        <div
            class="inline-flex items-center justify-center p-1 min-w-6 text-xs font-bold rounded-full"
            :class="[active ? 'bg-purple text-white' : 'bg-green text-midnight-blue']"
            >
            <slot></slot>
        </div>
</template>
