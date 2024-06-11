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
    <DefaultLayout :hasNavBar="props.hasNavBar">
        <slot name="header-w-full"/>
        <div v-bind="$attrs" class="w-full max-w-lg grid-cols-4 px-5 mx-auto mb-28">
            <slot />
        </div>
    </DefaultLayout>
</template>
