<script setup>
import { Head, usePage, router } from '@inertiajs/vue3';
import { ref } from 'vue';
import MapPane from '@/Components/Map/MapPane.vue';
import ContentLayout from '@/Layouts/ContentLayout.vue';
import TheHeader from '@/Components/App/TheHeader.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AppDisclamer from '@/Components/App/AppDisclamer.vue';
import AppElementCard from '@/Components/App/AppElementCard.vue';
import Headline from '@/Components/App/Text/Headline.vue';
import Text from '@/Components/App/Text/Text.vue';


const { props } = usePage();

const populaires = ref(props.populaires);
const themes = ref(props.themes);

const options = {
    flyToUserLocation: true
};

const extractLocality = (address) => {
    const parts = address.split(',');
    if (parts.length < 3) return address; // Return the whole address if it's not in the expected format
    let locality = parts[parts.length - 2].trim();
    locality = locality.replace(/^\d{4}\s*/, ''); // Remove the 4-digit NPA if present
    return locality;
};

</script>

<template>
    <Head>
        <title>Explorer</title>
    </Head>

    <AppDisclamer/>

    <ContentLayout>
            <TheHeader title="Explorer" class="mb-8"/>
            <main>
                <section class="flex flex-col">
                    <Headline rank="h2" class="title-m uppercase text-midnight-blue">Autour de toi</Headline>
                    <div class="mt-3 h-48 border border-grey rounded-xl overflow-hidden">
                        <MapPane :options/>
                    </div>
                </section>
                <!-- <section class="mt-8">
                    <Headline rank="h2" class="title-m uppercase text-midnight-blue">Quel sentier es-tu?</Headline>
                    <a href="/quizz" class="block mt-3 border border-grey rounded-xl overflow-hidden relative">
                        <svg width="100%" height="100%" viewBox="0 0 322 113" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <mask id="mask0_279_2545" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="322" height="113">
                            <rect width="322" height="113" rx="12" fill="#D1FFD5"/>
                            </mask>
                            <g mask="url(#mask0_279_2545)">
                            <rect x="-0.75" y="-0.75" width="323.5" height="115.04" rx="11.75" fill="#D1FFD5" stroke="#98A5B6" stroke-width="0.5"/>
                            <path d="M76.0507 53.2772C75.7327 20.5916 115.137 3.67221 134.879 -1H147.599C127.327 5.95861 85.2725 26.0789 96.7202 53.2772C108.168 80.4754 236.902 165.41 299.837 204.478L305.402 268C229.084 210.045 76.3687 85.9628 76.0507 53.2772Z" fill="#FFEED6"/>
                            <path d="M52.5265 27.408C79.5253 10.3632 118.568 1.4857 134.714 -1H150.199C147.155 -1 131.458 2.9061 85.0839 19.9509C38.7095 36.9957 73.1726 39.1263 96.201 38.061C203.402 42.6773 150.596 75.3465 127.17 83.8689C108.43 90.6869 27.2483 100.677 -11 104.82V79.2526C26.8512 75.1098 107.477 65.1197 127.17 58.3017C146.863 51.4838 114.73 47.6487 96.201 46.5834C70.3933 47.2936 25.5277 44.4528 52.5265 27.408Z" fill="#ECC4FF"/>
                            <path d="M192.732 4.55149C198.35 1.72528 172.185 -0.327092 158.401 -1H133.433C141.365 -0.327092 159.805 1.32153 170.105 2.53277C182.979 4.04681 178.688 4.55149 140.455 10.6077C102.222 16.6638 136.554 43.9166 151.379 49.4681C163.239 53.9093 273.36 82.9453 326.938 96.9081L364 78.7396C361.659 79.4125 330.683 74.5003 225.503 49.4681C120.324 24.4359 144.746 13.1311 170.105 10.6077C175.306 9.76653 187.114 7.3777 192.732 4.55149Z" fill="#B5F5F9"/>
                            </g>
                        </svg>
                        <div class="absolute top-0 left-0 bottom-0 right-0 flex justify-center items-center">
                            <Headline rank="h3" type="post" class="text-purple">Le Quiz</Headline>
                        </div>
                    </a>
                </section> -->
                <section class="mt-8">
                    <Headline rank="h2" class="title-m uppercase text-midnight-blue">Populaire</Headline>
                    <div class="flex w-full flex-row gap-6 overflow-x-scroll mt-3 pb-4 no-scrollbar">
                        <AppElementCard class="w-10/12 shrink-0"
                            v-for="(populaire) in populaires"
                            :title="populaire.title"
                            :thumbnail="populaire.thumbnail"
                            :location="extractLocality(populaire.location)"
                            @clickCard="router.visit(`/sentier/${populaire.id}`)"
                        />
                    </div>
                </section>

                <!-- <section class="flex flex-col">
                    <div class="mt-8 w-full aspect-square">
                        <div class="relative w-full h-full">
                            <img src="/assets/fun_facts/gargouille.webp" class="absolute aspect-square object-cover object-right-top transform -scale-x-100 rounded-lg">
                            
                            <Headline rank="h2" type="post" class="absolute top-6 left-6">Fun Fact</Headline>
                            <div class="absolute top-24 left-6 w-1/2">
                                <Text class="text-m">Il est là, suspendu, l'air serein parmi les (rares) gargouilles dantesques de la cathédrale de Lausanne</Text>
                            </div>
                        </div>
                    </div>
                </section> -->
            </main>
    </ContentLayout>


</template>
