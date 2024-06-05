<script setup>
import { Head } from "@inertiajs/vue3";
import TheHeader from "@/Components/App/TheHeader.vue";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import ContentLayout from "@/Layouts/ContentLayout.vue";
</script>

<template>
    <Head>
        <title>Favoris</title>
    </Head>
    <DefaultLayout>
        <ContentLayout>
            <TheHeader title="Favoris" class="mb-8" />
        </ContentLayout>
    </DefaultLayout>
</template>
