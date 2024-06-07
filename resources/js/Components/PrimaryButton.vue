<script setup>
import InformationText from '@/Components/App/Text/InformationText.vue';
import { useSlots } from 'vue';

const props = defineProps({
        icon: {
            type: String,
            default: null,
        },
        size: {
            type: String,
            default: 's',
        },
});
let height = 11;
let padding = 6;

switch (props.size.toLowerCase()) {
    case "xs":
        height = 7;
        padding = 4;
        break;
}
const slots = useSlots();
console.log(slots.default);
</script>

<template>
    <button
        class="inline-flex shrink-0 gap-3 justify-center items-center bg-midnight-blue border border-transparent rounded-full font-semibold text-sm text-white tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
        :class="[slots.default ? 'px-'+padding+' py-'+padding/2 : 'w-'+ height + ' p-'+padding/2, 'h-' + height]"
        >
        <span class="fill-white shrink-0" v-if="props.icon" v-html="props.icon"></span>
        <InformationText v-if="$slots.default" :type="size" class="text-white">
            <slot></slot>
        </InformationText>
    </button>
</template>
