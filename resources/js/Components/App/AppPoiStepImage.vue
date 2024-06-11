<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    step: {
        type: Number,
        required: true,
    },
    thumbnail: {
        type: String,
        required: true,
    },
    title: {
        type: String,
        required: true,
    },
    href: {
        type: String,
        required: true,
    }
});

</script>

<template>
    <article class="flex flex-col gap-3 w-32 h-auto shrink-0">
        <Link :href="href" class="flex flex-row gap-4 justify-center p-3 rounded-2xl aspect-square bg-cover" :style="'background-image: url('+thumbnail+')'" preserve-state>
            <div class="step bg-green p-4 text-center font-bold rounded-full w-8 h-8 flex items-center justify-center">
                {{ step }}
            </div>
            <div class="grow flex flex-col justify-center">
            </div>
        </Link>
        <h3 class="text-sm font-medium text-midnight-blue leading-4">{{ title }}</h3>
    </article>
</template>