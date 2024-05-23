<script setup>
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

const counter = ref(0);

</script>

<template>
    <Head title="Home" />

    <h1>Home</h1>
    <p>Welcome to your Inertia app!</p>
    
    <p>Counter: {{ counter }}</p>
    <button @click="counter++">Increment</button>
</template>