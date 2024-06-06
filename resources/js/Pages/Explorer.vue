<script setup>
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import MapPane from '@/Components/Map/MapPane.vue';
import ContentLayout from '@/Layouts/ContentLayout.vue';
import TheHeader from '@/Components/App/TheHeader.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    pathPoints: {
        type: String,
    },
});

const options = ref({
    flyToUserLocation: true
});

</script>

<template>
    <Head>
        <title>Explorer</title>
    </Head>

    <ContentLayout>
            <TheHeader title="Explorer" class="mb-8"/>
            <main>
                <section class="flex flex-col">
                    <h2 class="text-xl font-medium uppercase text-midnight-blue">Autour de toi</h2>
                    <div class="mt-3 h-48 border border-midnight-blue rounded-lg overflow-hidden">
                        <MapPane :options/>
                    </div>
                </section>
                <!-- <section class="mt-8">
                    <h2 class="text-xl font-medium uppercase text-midnight-blue">Quel Sentier es-tu ?</h2>
                    <a href="#" class="block mt-3 h-48 border border-midnight-blue rounded-lg overflow-hidden">
                        
                    </a>
                </section> -->
                <section class="mt-8">
                    <h2 class="text-xl font-medium uppercase text-midnight-blue">Découvrir</h2>
                    <div class="mt-3 grid grid-cols-2 gap-4">
                        <a href="/sentiers">Sentiers</a>
                        <a href="/lieux">Lieux</a>
                    </div>
                </section>
            </main>
        
    </ContentLayout>


</template>