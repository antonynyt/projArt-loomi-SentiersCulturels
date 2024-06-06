<script setup>

import { Head } from '@inertiajs/vue3';
import ContentLayout from '@/Layouts/ContentLayout.vue';
import AppElementCard from '@/Components/App/AppElementCard.vue';
import TheHeader from '@/Components/App/TheHeader.vue';



</script>


<template>
    <Head>
        <title>Favorite</title>
    </Head>

    <ContentLayout>
        <TheHeader title="Favorite" class="mb-8"/>

        <div>
            <AppElementCard
                v-for="(card, index) in cards"
                :key="index"
                @click="toggleDrawer"
                :thumbnail="card.thumbnail"
                :title="card.title"
                :href="card.href"
                :location="card.location"
                :infos="card.infos"
            />
        </div>
    </ContentLayout>
    
</template>
