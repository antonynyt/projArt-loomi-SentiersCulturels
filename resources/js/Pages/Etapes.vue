<script setup>

import {ref} from 'vue';
import { Head, usePage } from '@inertiajs/vue3';
import ContentLayout from '@/Layouts/ContentLayout.vue';
import TheHeader from '@/Components/App/TheHeader.vue';
import AppNavCard from '@/Components/App/AppNavCard.vue';
import NewPathDrawer from '@/Components/NewPath/NewPathDrawer.vue';
import InformationText from '@/Components/App/Text/InformationText.vue';
import BackLink from '@/Components/App/Button/BackLink.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Toggle from '@/Components/App/Button/Toggle.vue';

const { props } = usePage();

const etapes = ref(props.pois);

console.log("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa");
console.log(etapes.value);
console.log("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa");

</script>

<template>
    <Head>
        <title>Etapes</title>
    </Head>
    <ContentLayout :hasNavBar=false class="flex flex-col justify-between gap-8 min-h-dvh mb-0 relative content-box">
        <template #header-w-full>
            <nav class="fixed bg-off-white flex flex-row justify-between max-w-lg w-full mx-auto items-center py-5">
                <BackLink />
            </nav>
        </template>
        <div class="flex flex-col">
            <TheHeader title="Etapes" class="mt-24 mb-2"/>
            <InformationText>Chaque étape est un lieu à visiter pour vous cultiver ! Vous pouvez passer une étape spécifique si vous avez déjà visité un lieu.</InformationText>
            <div class="flex flex-wrap mt-12">
                <transition-group name="list" tag="div">
                    <div v-for="(etape, n) in etapes" class="flex flex-row">
                        <AppNavCard
                            :title="etape.title"
                            :key="etape.id"
                            :first="n == 0"
                            :last="n == props.pois.length-1"
                            :thumbnail="etape.thumbnail"
                            :border="true"
                            @cardClick="console.log('card click')"
                        >
                        <template v-slot:content>{{ n+1 }}</template>
                        <template v-slot:button>
                            <svg @click.stop="console.log('button click')" class="self-center" width="10" height="17" viewBox="0 0 10 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.80156 8.50001L0.476562 2.17501L1.92547 0.726105L9.69938 8.50001L1.92547 16.2739L0.476562 14.825L6.80156 8.50001Z" fill="black"/>
                            </svg>
                        </template>
                        </AppNavCard>
                        <div class="self-center mx-2">
                            <Toggle></Toggle>
                        </div>
                    </div>    
                </transition-group>
            </div>
        </div>
        <div class="flex flex-row w-full gap-4 mb-8">
            <PrimaryButton @click="router.visit(`/nav/${infos.id}`, { preserveState: true })" class="grow">C'est parti!</PrimaryButton>
        </div>

    </ContentLayout>
</template>