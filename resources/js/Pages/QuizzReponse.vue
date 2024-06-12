<script setup>
import { Head, usePage } from '@inertiajs/vue3';
import ContentLayout from '@/Layouts/ContentLayout.vue';
import TheHeader from '@/Components/App/TheHeader.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Headline from '@/Components/App/Text/Headline.vue';
import Text from '@/Components/App/Text/Text.vue';
import ImpactText from '@/Components/App/Text/ImpactText.vue';
import InformationText from '@/Components/App/Text/InformationText.vue';
import QuizzButton from '@/Components/App/Button/QuizzButton.vue';
import { router } from "@inertiajs/vue3";
import AppElementCard from '@/Components/App/AppElementCard.vue';
</script>



<template>
    <Head>
        <title>Quizz</title>
    </Head>
    <ContentLayout>
        <TheHeader title="Tes sentiers sont.." class="flex mb-12 mt-24 justify-center items-center"/>
        <main>
            <div class="flex flex-row gap-2 mb-12 overflow-x-scroll no-scrollbar">
                <div class="flex flex-col w-3/4 shrink-0 items-center">
                    <div class="w-3/4 h-3/4 rounded-lg mb-10">
                        <img class="aspect-square object-cover object-center rounded-lg" src="/assets/photos/gare_lausanne.jpeg"/>
                    </div>
                    <ImpactText class="impact-l">Les chemins de fer</ImpactText>
                </div>
                <div class="flex flex-col w-3/4 shrink-0 items-center">
                    <div class="w-3/4 h-3/4 rounded-lg mb-10">
                        <img class="aspect-square object-cover object-center rounded-lg" src="/assets/photos/montreux_jazz.jpeg"/>
                    </div>
                    <ImpactText class="impact-l">Le Montreux Jazz</ImpactText>
                </div>
                <div class="flex flex-col w-3/4 shrink-0 items-center">
                    <div class="w-3/4 h-3/4 rounded-lg mb-10">
                        <img class="aspect-square object-cover object-center rounded-lg" src="/assets/photos/musee-atelier-audemars-piguet_1080.png"/>
                    </div>
                    <ImpactText class="impact-l">Les horlogeries</ImpactText>
                </div>
            </div>

            <div class="flex items-center">
                <PrimaryButton @click="router.visit(`/`)" class="grow">Découvrir mon sentier</PrimaryButton>
            </div>

        </main>
    </ContentLayout>
</template>