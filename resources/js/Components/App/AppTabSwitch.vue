<script setup>
import { router } from '@inertiajs/vue3';
import { ref } from 'vue';

const activeTab = ref('paths');
//emit
const emit = defineEmits(['setActiveTab']);

const setActiveTab = (tab) => {
    router.visit(
        route('map.index', { tab: tab }), 
        { preserveState: true}
    );
    activeTab.value = tab;
    emit('setActiveTab', tab);
};
</script>

<template>
    <ul class="flex justify-evenly border border-black rounded-full w-full p-1 text-center font-medium">
        <li :class="{ 'bg-midnight-blue text-white': activeTab === 'paths' }" class="w-full rounded-full">
            <a href="#" class="text-sm w-full inline-block px-4 py-3" @click="setActiveTab('paths')">Sentiers</a>
        </li>
        <li :class="{ 'bg-midnight-blue text-white': activeTab === 'poi' }" class="w-full rounded-full">
            <a href="#" class="text-sm w-full inline-block px-4 py-3" @click="setActiveTab('poi')">Lieux</a>
        </li>
    </ul>
</template>
