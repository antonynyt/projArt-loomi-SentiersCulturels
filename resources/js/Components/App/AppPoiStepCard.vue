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
    <article class="rounded-2xl bg-white shadow-md min-w-72 outline-offset-0 outline-1" :data-coordinates=coordinates>
        <Link :href="href" class="flex flex-row gap-4 justify-center px-5 py-4" preserve-state>
            <div class="step bg-green p-4 text-center font-bold rounded-full w-8 h-8 flex items-center justify-center">
                {{ step }}
            </div>
            <div class="grow flex flex-col justify-center">
                <h3 class="text-sm font-medium text-midnight-blue leading-4">
                    {{ title }}
                </h3>
            </div>
        </Link>
    </article>
</template>