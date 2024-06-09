<script setup>
import NavBar from '@/Components/NavBar.vue';

const props = defineProps({
    hasNavBar: {
        type: Boolean,
        default: true,
    },
});

</script>

<template>
    <div class="flex flex-col w-full">
        <slot />
        <NavBar v-if="hasNavBar"/>
    </div>
</template>
