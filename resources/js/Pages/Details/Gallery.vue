<script setup>
const props = defineProps({
    images: {
        type: Array,
        required: true,
    },
});
</script>

<template>
    <div v-if="images.length > 2" class="flex flex-row overflow-x-scroll h-[30vh] min-h-60 gap-2 m-auto no-scrollbar pr-5 w-full">
        <img :src="images[0].src" :alt="images[0].title" class="rounded-r-xl shrink-0 grow-0 h-full w-10/12 object-cover object-center" />
        <div class="grid grid-rows-2 grid-flow-col gap-2">
            <img v-for="(img, index) in images.slice(1)" :key="index" :src="img.src" :alt="img.title" class="rounded-xl min-w-36 h-full object-cover object-center" />
        </div>
    </div>
    <div v-else>
        <img :src="images[0]" alt="" class="w-full h-[30vh] object-cover object-center" />
    </div>
</template>
