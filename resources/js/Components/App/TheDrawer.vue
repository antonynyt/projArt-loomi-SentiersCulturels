<script setup>
import { ref } from 'vue';

const isOpen = ref(false);

const toggleDrawer = () => {
    isOpen.value = !isOpen.value
    console.log(isOpen.value)
}
</script>

<template>
    <div class="fixed bottom-20 left-0 w-full h-[70dvh] bg-white transform transition-transform duration-300 ease-in-out z-20 drop-shadow-2xl" :class="isOpen ? 'translate-y-0' : 'translate-y-full'">
        <div class="p-5 overflow-auto h-full">
            <slot></slot>
        </div>
        <div class="fixed top-[-30px] w-full h-[30px] bg-white flex justify-center items-center cursor-pointer rounded-t-3xl"
            @click="toggleDrawer">
            <div class="w-[100px] h-1 bg-gray-300 rounded-full"></div>
        </div>
    </div>
</template>