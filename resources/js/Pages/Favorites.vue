<script setup>

import {ref} from 'vue';
import { Head, usePage } from '@inertiajs/vue3';
import ContentLayout from '@/Layouts/ContentLayout.vue';
import AppElementCard from '@/Components/App/AppElementCard.vue';
import TheHeader from '@/Components/App/TheHeader.vue';
import ImpactText from '@/Components/App/Text/ImpactText.vue';

const { props } = usePage();

const favorites = ref(props.paths);

</script>

<template>
    <Head>
        <title>Favorite</title>
    </Head>

    <ContentLayout>
        <TheHeader title="Favoris" class="mb-8"/>

        <div v-if="favorites && favorites.length > 0">
            <AppElementCard class="mb-3"
                v-for="(favorite) in favorites"
                :title="favorite.path.title"
                :thumbnail="favorite.thumbnail"
                :location="favorite.location"
                :href="'sentier/' + favorite.path_id"
                :infos="{
                    distance: favorite.path.distance,
                    duration: favorite.path.duration,
                    ascent: favorite.path.ascent
                }"
            />
        </div>

        <div v-else class="flex flex-col items-center justify-center align-content-center mt-24">
            <ImpactText type="l" class="text-grey-600 text-center mb-12">Vos favoris s'afficheront ici</ImpactText>
            
            <svg class="mb-6" width="100" height="89" viewBox="0 0 100 89" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M49.9998 88.7465L44.2971 83.6199C35.7325 75.8501 28.6499 69.1735 23.0492 63.59C17.4485 58.0057 13.0104 53.0358 9.73471 48.6803C6.45905 44.3257 4.17064 40.353 2.8695 36.7621C1.5675 33.1721 0.916504 29.5292 0.916504 25.8333C0.916504 18.501 3.38875 12.3621 8.33325 7.41675C13.2786 2.47225 19.4175 0 26.7498 0C31.2603 0 35.5228 1.05486 39.5373 3.16458C43.5518 5.27431 47.0393 8.29982 49.9998 12.2411C52.9603 8.29982 56.4478 5.27431 60.4623 3.16458C64.4768 1.05486 68.7393 0 73.2498 0C80.5822 0 86.7211 2.47225 91.6664 7.41675C96.6109 12.3621 99.0832 18.501 99.0832 25.8333C99.0832 29.5292 98.4322 33.1721 97.1302 36.7621C95.829 40.353 93.5406 44.3257 90.265 48.6803C86.9893 53.0358 82.5593 58.0057 76.975 63.59C71.3916 69.1735 64.3007 75.8501 55.7025 83.6199L49.9998 88.7465ZM49.9998 78.275C58.2665 70.8367 65.0693 64.4611 70.4082 59.148C75.7471 53.8358 79.9665 49.2207 83.0665 45.3026C86.1665 41.3846 88.3193 37.9052 89.5248 34.8647C90.7304 31.8249 91.3332 28.8145 91.3332 25.8333C91.3332 20.6667 89.6109 16.3611 86.1665 12.9167C82.7221 9.47222 78.4165 7.75 73.2498 7.75C69.1699 7.75 65.3991 8.90733 61.9374 11.222C58.4766 13.5375 55.7361 16.7585 53.716 20.885L49.9998 27.6417L46.2837 20.885C44.23 16.7249 41.4809 13.4958 38.0364 11.1975C34.592 8.89915 30.8298 7.75 26.7498 7.75C21.6159 7.75 17.3185 9.47222 13.8577 12.9167C10.3969 16.3611 8.6665 20.6667 8.6665 25.8333C8.6665 28.8145 9.26928 31.8249 10.4748 34.8647C11.6804 37.9052 13.8332 41.3846 16.9332 45.3026C20.0332 49.2207 24.2526 53.8276 29.5915 59.1235C34.9304 64.4193 41.7332 70.8031 49.9998 78.275Z" fill="#505050"/>
            </svg>

            <div class="text-center">Appuyez sur l’icône coeur d’un sentier pour l’ajouter à vos favoris.</div>
        </div>
        
    </ContentLayout>

    <!-- :infos.distance="favorite.path.distance" -->
    
</template>
