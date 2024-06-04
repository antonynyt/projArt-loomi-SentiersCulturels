<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
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
    },
    location: {
        type: String,
        required: true,
    },
    infos: {
        type: Object,
        required: false,
        distance: {
            type: String,
            required: true,
        },
        duration: {
            type: String,
            required: true,
        },
        elevation: {
            type: String,
            required: true,
        },
    }
});

</script>

<template>
    <article class="border border-gray-300 rounded-2xl p-1">
        <Link :href="href" class="flex justify-between" preserve-state>
            <img :src="thumbnail" :alt="title" class="object-cover rounded-lg aspect-square h-24">
            <div class="grow flex flex-col justify-center px-5">
                <h3 class="text-md font-medium text-midnight-blue leading-5">
                    {{ title }}
                </h3>
                <p class="text-sm text-gray-500">{{ location }}</p>
                <div v-if="infos" class="flex flex-row justify-between mt-2">
                    <p class="text-sm text-gray-500">{{ infos.distance }}</p>
                    <p class="text-sm text-gray-500">{{ infos.duration }}</p>
                    <p class="text-sm text-gray-500">{{ infos.elevation }}</p>
                </div>
            </div>
        </Link>
    </article>
</template>