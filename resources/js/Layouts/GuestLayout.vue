<script setup>
import NavBar from '@/Components/NavBar.vue';
</script>

<template>
    <div class="flex flex-col w-full mb-24 justify-center">
        <div class="w-full max-w-lg mt-24 grid-cols-4 px-5 mx-auto">
            <slot />
        </div>
        <NavBar/>
    </div>
</template>
