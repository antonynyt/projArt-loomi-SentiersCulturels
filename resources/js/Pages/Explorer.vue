<script setup>
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import MapPane from '@/Components/Map/MapPane.vue';
import ContentLayout from '@/Layouts/ContentLayout.vue';
import TheHeader from '@/Components/App/TheHeader.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const options = ref({
    flyToUserLocation: true
});

</script>

<template>
    <Head>
        <title>Explore</title>
    </Head>

    <ContentLayout>
            <TheHeader title="Explorer" class="mb-8"/>
            <main>
                <section class="h-60 rounded-lg overflow-hidden">
                    <MapPane :options poi="/storage/renard/poi.geojson"/>
                </section>
            </main>
            <PrimaryButton>Explorer</PrimaryButton>
            <SecondaryButton>Y aller</SecondaryButton>
        
    </ContentLayout>


</template>