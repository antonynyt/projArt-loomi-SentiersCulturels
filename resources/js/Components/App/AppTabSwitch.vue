<script setup>
import { router } from '@inertiajs/vue3';
import { ref } from 'vue';

const activeTab = ref('path');
//emit
const emit = defineEmits(['setActiveTab']);

const setActiveTab = (tab) => {
    activeTab.value = tab;
    emit('setActiveTab', tab);
};
</script>

<template>
    <ul class="flex justify-evenly border border-black rounded-full w-full p-1 text-center font-medium">
        <li :class="{ 'bg-midnight-blue text-white': activeTab === 'path' }" class="w-full rounded-full">
            <button class="text-sm w-full inline-block px-4 py-3" @click="setActiveTab('path')">Sentiers</button>
        </li>
        <li :class="{ 'bg-midnight-blue text-white': activeTab === 'poi' }" class="w-full rounded-full">
            <button class="text-sm w-full inline-block px-4 py-3" @click="setActiveTab('poi')">Lieux</button>
        </li>
    </ul>
</template>
