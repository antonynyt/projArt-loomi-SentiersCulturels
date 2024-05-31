<script setup>
import { ref } from 'vue';

const activeTab = ref('sentiers');

const setActiveTab = (tab) => {
    activeTab.value = tab;
    emit('setActiveTab', tab);
};

//emit
const emit = defineEmits(['setActiveTab']);

</script>

<template>
    <ul class="flex justify-evenly border border-black rounded-full w-full p-1 text-center font-medium">
        <li :class="{ 'bg-midnight-blue text-white': activeTab === 'sentiers' }" class="w-full rounded-full">
            <a href="#" class="w-full inline-block px-4 py-3" @click="setActiveTab('sentiers')">Sentiers</a>
        </li>
        <li :class="{ 'bg-midnight-blue text-white': activeTab === 'lieux' }" class="w-full rounded-full">
            <a href="#" class="w-full inline-block px-4 py-3" @click="setActiveTab('lieux')">Lieux</a>
        </li>
    </ul>
</template>
