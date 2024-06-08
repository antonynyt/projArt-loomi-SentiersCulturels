<script setup>
import DefaultLayout from './DefaultLayout.vue';

</script>

<template>
    <DefaultLayout>
        <slot name="img"/>
        <div v-bind="$attrs" class="w-full max-w-lg grid-cols-4 px-5 mx-auto mt-14 mb-28">
            <slot />
        </div>
    </DefaultLayout>
</template>
