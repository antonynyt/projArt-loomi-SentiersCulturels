<script setup>
import NavBar from '@/Components/NavBar.vue';
import AppDisclamer from '@/Components/App/AppDisclamer.vue';
</script>

<template>
    <!-- <AppDisclamer/> -->
    <div class="flex flex-col w-full">
        <slot />
        <NavBar/>
    </div>
</template>
