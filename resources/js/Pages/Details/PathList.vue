<script setup>
import { Head, router } from "@inertiajs/vue3";
import { ref } from "vue";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import ContentLayout from "@/Layouts/ContentLayout.vue";
import AppElementCard from "@/Components/App/AppElementCard.vue";
import TheHeader from "@/Components/App/TheHeader.vue";
import BackLink from "@/Components/App/Button/BackLink.vue";

const props = defineProps({
    title: {
        type: String,
        required: true,
    },
    items: {
        type: Array,
        required: true,
    }
});

</script>
<template>

    <Head :title />
    <ContentLayout :hasNavBar=false>
        <nav class="fixed bg-off-white flex flex-row justify-between items-center w-full max-w-lg h-16 py-5">
            <BackLink />
        </nav>
        <main class="mt-20">
            <TheHeader :title class="mb-8" />

            <div class="flex flex-col gap-4">
                <AppElementCard v-for="item in items" :key="item.id" :thumbnail="item.thumbnail" :title="item.title"
                    type="path" @cardClick="router.visit(`/sentier/${item.id}`, { preserveState: true })"
                    :location="item.location" :infos="{
                        distance: item.distance,
                        duration: item.duration,
                        ascent: item.ascent,
                    }" />
            </div>
        </main>
    </ContentLayout>
</template>
