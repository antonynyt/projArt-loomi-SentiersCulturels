<script setup>
import InformationText from '@/Components/App/Text/InformationText.vue';
import { ref } from 'vue';

const props = defineProps({
        icon: {
            type: String,
            default: null,
        },
});

const reverse = ref(props.reverse);
</script>

<template>
    <button
        class="inline-flex shrink-0 px-6 py-3 gap-3 justify-center items-center bg-midnight-blue border border-transparent rounded-full font-semibold text-sm text-white tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
        >
        <span class="fill-white w-2 h-3 shrink-0" v-if="props.icon" v-html="props.icon"></span>
        <InformationText type="s" class="text-white">
            <span>{{props.reverse}}</span>
            <slot></slot>
        </InformationText>
    </button>
</template>
