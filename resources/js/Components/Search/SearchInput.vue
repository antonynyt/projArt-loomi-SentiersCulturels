<script setup>
import { onMounted, ref } from 'vue';

const model = defineModel({
    type: String,
    required: true,
});

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        class="py-3 ps-6 pe-14 text-m w-full border-grey placeholder:text-grey focus:border-midnight-blue focus:ring-midnight-blue rounded-full shadow-sm"
        v-model="model"
        ref="input"
    />
</template>

<style scoped>
input{
    background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M18.5065 19.2L11.7865 12.48C11.2531 12.9067 10.6398 13.2444 9.94647 13.4933C9.25314 13.7422 8.51536 13.8667 7.73314 13.8667C5.79536 13.8667 4.15536 13.1956 2.81314 11.8533C1.47092 10.5111 0.799805 8.87111 0.799805 6.93333C0.799805 4.99556 1.47092 3.35556 2.81314 2.01333C4.15536 0.671111 5.79536 0 7.73314 0C9.67092 0 11.3109 0.671111 12.6531 2.01333C13.9954 3.35556 14.6665 4.99556 14.6665 6.93333C14.6665 7.71556 14.542 8.45333 14.2931 9.14667C14.0442 9.84 13.7065 10.4533 13.2798 10.9867L19.9998 17.7067L18.5065 19.2ZM7.73314 11.7333C9.06647 11.7333 10.1998 11.2667 11.1331 10.3333C12.0665 9.4 12.5331 8.26667 12.5331 6.93333C12.5331 5.6 12.0665 4.46667 11.1331 3.53333C10.1998 2.6 9.06647 2.13333 7.73314 2.13333C6.3998 2.13333 5.26647 2.6 4.33314 3.53333C3.3998 4.46667 2.93314 5.6 2.93314 6.93333C2.93314 8.26667 3.3998 9.4 4.33314 10.3333C5.26647 11.2667 6.3998 11.7333 7.73314 11.7333Z" fill="%23101720"/></svg>');
    background-repeat: no-repeat;
    background-position: right 1.5rem center;
    background-size: 1.25rem;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.10);
}
</style>
