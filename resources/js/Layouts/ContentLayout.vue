<script setup>
import DefaultLayout from './DefaultLayout.vue';

</script>

<template>
    <DefaultLayout>
        <div class="w-full max-w-lg grid-cols-4 px-5 mx-auto mt-8">
            <slot />
        </div>
    </DefaultLayout>
</template>