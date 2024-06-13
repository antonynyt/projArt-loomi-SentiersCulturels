<script setup>
import { ref, defineProps } from 'vue';

const props = defineProps({
    active: {
        type: Boolean,
        default: false,
    },
});
const $emit = defineEmits(['toggle']);
const handleClick = () => {
    props.active = !props.active;
    $emit('toggle', props.active);
};
</script>

<template>
    <Transition>
        <button
            type="button"
            class="shrink-0 duration-1000 flex w-14 items-center justify-items-start p-0.5 border border-grey rounded-full bg-white"
            :class="{'flex-row-reverse': props.active}"
        >
                <div
                    class="w-6 h-6 rounded-full"
                    :class="[props.active ? 'bg-[#41D350]' : 'bg-red']"
                    @click="handleClick"
                ></div>
        </button>
    </Transition>
</template>

<style scoped>
.v-enter-active,
.v-leave-active {
  transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
  opacity: 0;
}
</style>
