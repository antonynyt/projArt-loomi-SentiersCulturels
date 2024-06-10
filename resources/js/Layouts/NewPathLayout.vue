<script setup>
import DefaultLayout from './DefaultLayout.vue';

</script>

<template>
    <DefaultLayout>
        <div v-bind="$attrs" class="w-full max-w-lg grid-cols-4 px-5 mx-auto mt-6 mb-24">
            <slot />
        </div>
    </DefaultLayout>
</template>
