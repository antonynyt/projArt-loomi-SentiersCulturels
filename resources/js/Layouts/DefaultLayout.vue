<script setup>
import NavBar from '@/Components/NavBar.vue';
import SearchBar from '@/Components/SearchBar.vue';
</script>

<template>
    <div class="flex flex-col w-full">
        <slot />
        <NavBar/>
    </div>
</template>