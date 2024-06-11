<script setup>
import { useSlots } from 'vue';
import ImpactText from './App/Text/ImpactText.vue';

const props = defineProps({
        icon: {
            type: String,
            default: null,
        },
        size: {
            type: String,
            default: 's',
        },
        darkmode: {
            type: Boolean,
            default: false,
        },
});
let height = 11;
let padding = 6;
let circlePadding = 2;

switch (props.size.toLowerCase()) {
    case "xs":
        height = 8;
        padding = 4;
        break;
}
const slots = useSlots();
// console.log(slots.default);
</script>

<template>
    <button
        class="self-center shrink-0 bg-midnight-blue border border-transparent rounded-full font-semibold text-sm text-white tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
        :class="[slots.default ? 'inline-flex gap-3 justify-center items-center px-'+padding+' py-'+padding/2 : 'p-'+circlePadding, darkmode ? 'bg-white text-midnight-blue' : '']"
        :style="{ width: slots.default ? 'auto' : height/4 + 'rem', height: height/4 + 'rem'}"
        >
        <span
            class="h-full flex justify-center items-center shrink-0"
            :class="[darkmode ? 'fill-midnight-blue' : 'fill-white']"
            v-if="props.icon"
            v-html="props.icon">
        </span>
        <ImpactText
            v-if="$slots.default"
            :type="size"
            :class="[darkmode ? 'text-midnight-blue' : 'text-white']"
            class="m"
            >
            <slot></slot>
        </ImpactText>
    </button>
</template>
