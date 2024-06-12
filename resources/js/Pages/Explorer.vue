<script setup>
import { Head, usePage } from '@inertiajs/vue3';
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
                    <Headline class="title-m uppercase text-midnight-blue">Autour de toi</Headline>
                    <div class="mt-3 h-48 border border-grey rounded-xl overflow-hidden">
                        <MapPane :options/>
                    </div>
                </section>
                <section class="mt-8">
                    <Headline class="title-m uppercase text-midnight-blue">Quel sentier es-tu?</Headline>
                    <a href="/quizz" class="block mt-3 border border-grey rounded-xl overflow-hidden">
                        <svg width="100%" height="100%" viewBox="0 0 322 113" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <mask id="mask0_279_2545" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="322" height="113">
                            <rect width="322" height="113" rx="12" fill="#D1FFD5"/>
                            </mask>
                            <g mask="url(#mask0_279_2545)">
                            <rect x="-0.75" y="-0.75" width="323.5" height="115.04" rx="11.75" fill="#D1FFD5" stroke="#98A5B6" stroke-width="0.5"/>
                            <path d="M76.0507 53.2772C75.7327 20.5916 115.137 3.67221 134.879 -1H147.599C127.327 5.95861 85.2725 26.0789 96.7202 53.2772C108.168 80.4754 236.902 165.41 299.837 204.478L305.402 268C229.084 210.045 76.3687 85.9628 76.0507 53.2772Z" fill="#FFEED6"/>
                            <path d="M52.5265 27.408C79.5253 10.3632 118.568 1.4857 134.714 -1H150.199C147.155 -1 131.458 2.9061 85.0839 19.9509C38.7095 36.9957 73.1726 39.1263 96.201 38.061C203.402 42.6773 150.596 75.3465 127.17 83.8689C108.43 90.6869 27.2483 100.677 -11 104.82V79.2526C26.8512 75.1098 107.477 65.1197 127.17 58.3017C146.863 51.4838 114.73 47.6487 96.201 46.5834C70.3933 47.2936 25.5277 44.4528 52.5265 27.408Z" fill="#ECC4FF"/>
                            <path d="M192.732 4.55149C198.35 1.72528 172.185 -0.327092 158.401 -1H133.433C141.365 -0.327092 159.805 1.32153 170.105 2.53277C182.979 4.04681 178.688 4.55149 140.455 10.6077C102.222 16.6638 136.554 43.9166 151.379 49.4681C163.239 53.9093 273.36 82.9453 326.938 96.9081L364 78.7396C361.659 79.4125 330.683 74.5003 225.503 49.4681C120.324 24.4359 144.746 13.1311 170.105 10.6077C175.306 9.76653 187.114 7.3777 192.732 4.55149Z" fill="#B5F5F9"/>
                            <path d="M84.2629 71V41.7063H91.2983V64.952H103.477V71H84.2629ZM117.112 71.8229C114.671 71.8229 112.49 71.3429 110.57 70.3829C108.678 69.3954 107.196 68.0377 106.127 66.3097C105.057 64.5543 104.522 62.5657 104.522 60.344C104.522 58.1497 104.988 56.2023 105.921 54.5017C106.881 52.8011 108.225 51.4846 109.953 50.552C111.681 49.592 113.656 49.112 115.878 49.112C118.044 49.112 119.951 49.5646 121.596 50.4697C123.242 51.3749 124.518 52.6366 125.423 54.2549C126.328 55.8457 126.794 57.6971 126.822 59.8091C126.822 60.2206 126.794 60.6457 126.739 61.0846C126.684 61.496 126.616 61.8663 126.534 62.1954H110.982C111.091 63.2103 111.434 64.1017 112.01 64.8697C112.586 65.6103 113.327 66.1863 114.232 66.5977C115.164 67.0091 116.207 67.2149 117.359 67.2149C118.648 67.2149 119.868 66.9543 121.02 66.4331C122.172 65.8846 123.064 65.1851 123.695 64.3349L127.274 67.0914C126.726 68.024 125.93 68.8469 124.888 69.56C123.873 70.2731 122.694 70.8217 121.35 71.2057C120.006 71.6171 118.593 71.8229 117.112 71.8229ZM120.444 58.5749C120.362 57.5326 120.129 56.6411 119.745 55.9006C119.361 55.16 118.826 54.5977 118.14 54.2137C117.482 53.8023 116.728 53.5966 115.878 53.5966C115 53.5966 114.204 53.8023 113.491 54.2137C112.806 54.6251 112.23 55.2149 111.763 55.9829C111.324 56.7234 111.05 57.5874 110.94 58.5749H120.444ZM154.815 79.64V66.968H154.774C154.034 68.4766 153.033 69.6286 151.771 70.424C150.537 71.2194 149.11 71.6171 147.492 71.6171C145.654 71.6171 144.022 71.1646 142.596 70.2594C141.197 69.3269 140.1 68.0103 139.305 66.3097C138.509 64.6091 138.111 62.6617 138.111 60.4674C138.111 58.2731 138.509 56.3394 139.305 54.6663C140.1 52.9657 141.211 51.6491 142.637 50.7166C144.063 49.784 145.682 49.3177 147.492 49.3177C149.138 49.3177 150.591 49.7154 151.853 50.5109C153.115 51.3063 154.116 52.4583 154.857 53.9669H154.898L155.844 49.9349H161.11V79.64H154.815ZM149.714 66.2686C150.756 66.2686 151.675 66.0217 152.47 65.528C153.293 65.0069 153.924 64.3074 154.363 63.4297C154.829 62.552 155.062 61.5646 155.062 60.4674C155.062 59.3703 154.829 58.3829 154.363 57.5051C153.924 56.6 153.293 55.9006 152.47 55.4069C151.675 54.8857 150.756 54.6251 149.714 54.6251C148.699 54.6251 147.78 54.8857 146.957 55.4069C146.162 55.9006 145.531 56.5863 145.065 57.464C144.598 58.3417 144.365 59.3429 144.365 60.4674C144.365 61.5646 144.598 62.552 145.065 63.4297C145.531 64.3074 146.162 65.0069 146.957 65.528C147.78 66.0217 148.699 66.2686 149.714 66.2686ZM171.234 71.6171C169.781 71.6171 168.533 71.3429 167.49 70.7943C166.475 70.2183 165.68 69.3954 165.104 68.3257C164.555 67.2286 164.281 65.9394 164.281 64.4583V49.9349H170.576V62.5246C170.576 63.7314 170.891 64.6777 171.522 65.3634C172.153 66.0491 173.017 66.392 174.114 66.392C175.019 66.392 175.815 66.2 176.501 65.816C177.214 65.4046 177.762 64.8423 178.146 64.1291C178.53 63.3886 178.722 62.5383 178.722 61.5783V49.9349H185.017V71H179.71L178.763 67.1737H178.722C177.954 68.6 176.926 69.6971 175.637 70.4651C174.347 71.2331 172.88 71.6171 171.234 71.6171ZM188.475 71V49.9349H194.729V71H188.475ZM191.602 47.0549C190.505 47.0549 189.614 46.7257 188.928 46.0674C188.242 45.4091 187.899 44.5451 187.899 43.4754C187.899 42.7623 188.05 42.1314 188.352 41.5829C188.681 41.0343 189.12 40.6091 189.669 40.3074C190.217 40.0057 190.862 39.8549 191.602 39.8549C192.727 39.8549 193.632 40.184 194.318 40.8423C195.003 41.5006 195.346 42.3783 195.346 43.4754C195.346 44.1886 195.182 44.8194 194.853 45.368C194.551 45.8891 194.112 46.3006 193.536 46.6023C192.987 46.904 192.343 47.0549 191.602 47.0549ZM197.494 71V65.5691L209.467 54.6251H197.906V49.9349H216.708V55.3657L204.736 66.3097H217.12V71H197.494ZM218.95 71V65.5691L230.922 54.6251H219.361V49.9349H238.164V55.3657L226.191 66.3097H238.575V71H218.95Z" fill="#9747FF"/>
                            </g>
                        </svg>
                    </a>
                </section>
                <section class="mt-8">
                    <Headline class="title-m uppercase text-midnight-blue">Populaire</Headline>
                    <div class="flex w-full flex-row gap-6 overflow-x-scroll pt-1 pb-4 no-scrollbar">
                        <AppElementCard class="mb-3 h-24 w-10/12 shrink-0"
                            v-for="(populaire) in populaires"
                            :title="populaire.title"
                            :thumbnail="populaire.thumbnail"
                            :location="extractLocality(populaire.location)"
                        />
                    </div>
                </section>

                <section class="flex flex-col">
                    <div class="mt-8 w-full aspect-square">
                        <div class="relative w-full h-full">
                            <img src="/assets/fun_facts/gargouille.webp" class="absolute aspect-square object-cover object-right-top transform -scale-x-100 rounded-lg">
                            
                            <Headline rank="h1" type="post" class="absolute top-6 left-6">Fun Fact</Headline>
                            <div class="absolute top-24 left-6 w-1/2">
                                <Text class="text-m">Il est là, suspendu, l'air serein parmi les (rares) gargouilles dantesques de la cathédrale de Lausanne</Text>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <div class="relative w-full aspect-square">
                            <img src="/assets/fun_facts/Nyon.jpeg" class="absolute aspect-square object-cover object-right-top transform -scale-x-100 rounded-lg">
                            <div class="absolute aspect-square object-cover -rotate-90 w-full h-full rounded-lg bg-gradient-to-r from-black opacity-40"></div>
                            <Headline rank="h1" type="post" class="absolute bottom-24 left-12 text-off-white">Sais-tu que..</Headline>
                            <div class="absolute bottom-12 left-12 w-1/2">
                                <Text class="text-m text-off-white">Nyon était une colonie romaine connue sous le nom de Noviodunum</Text>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
    </ContentLayout>


</template>
