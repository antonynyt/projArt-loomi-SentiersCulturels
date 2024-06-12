<script setup>
import DefaultLayout from './DefaultLayout.vue';

const props = defineProps({
    hasNavBar: {
        type: Boolean,
        default: true,
    },
});
</script>

<template>
    <DefaultLayout :hasNavBar="hasNavBar">
        <div v-bind="$attrs" class="w-full max-w-lg grid-cols-4 px-5 mx-auto mt-6 mb-8">
            <slot />
        </div>
    </DefaultLayout>
</template>
