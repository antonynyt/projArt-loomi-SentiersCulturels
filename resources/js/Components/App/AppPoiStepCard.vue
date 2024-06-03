<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    step: {
        type: Number,
        required: true,
    },
    title: {
        type: String,
        required: true,
    },
    href: {
        type: String,
        required: true,
    },
    coordinates: {
        type: Array,
        required: true,
    }
});

</script>

<template>
    <article class="rounded-2xl bg-white shadow-md w-60 min-w-60 outline-offset-0 outline-1" :data-coordinates=coordinates>
        <Link :href="href" class="flex flex-col gap-2 px-5 py-4" preserve-state>
        <div
            class="step flex align-center justify-center bg-green p-2 text-center font-bold rounded-full w-8 h-8 leading-none">
            {{ step }}</div>
        <div class="grow flex flex-col justify-center">
            <h3 class="text-md font-medium text-midnight-blue">
                {{ title }}
            </h3>
        </div>
        </Link>
    </article>

</template>