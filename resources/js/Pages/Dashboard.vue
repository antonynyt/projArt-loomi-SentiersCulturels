<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import TheHeader from "@/Components/App/TheHeader.vue";
import AppElementCard from "@/Components/App/AppElementCard.vue";
import ContentLayout from "@/Layouts/ContentLayout.vue";
import { Link, useForm, usePage } from "@inertiajs/vue3";
import { ref, watchEffect, computed } from "vue";
import Headline from "@/Components/App/Text/Headline.vue";
import ImpactText from "@/Components/App/Text/ImpactText.vue";
import SeeAllLink from "@/Components/App/Button/SeeAllLink.vue";
import DropdownLink from "@/Components/DropdownLink.vue";

//const { props } = usePage();
const user = usePage().props.auth.user;

const props = defineProps({
    finishedPaths: {
        type: Array,
        required: true,
    },
    pathCount: {
        type: Number,
    },
    badges: {
        type: Array,
        required: true,
    },
});
//console.log(props.finishedPaths);

const finishedPaths = ref(props.finishedPaths);
const badges = ref(props.badges);
const pathCount = ref(props.pathCount);
const progressWidth = ref("0");
const fillingColor = ref("grey");

watchEffect(() => {
    if (pathCount.value > 0) {
        const progressPercentage =
            (finishedPaths.value.length * 100) / pathCount.value;
        progressWidth.value = `${progressPercentage}%`;
    } else {
        progressWidth.value = "0%";
    }
});

const isComplete = computed(() => parseFloat(progressWidth.value) >= 100);

//DELETE
// console.log(finishedPaths.value);

// finishedPaths.value.forEach((path) => {
//     console.log(path);
//     console.log(path.thumbnail);
// });

// Define reactive state for sideBarWidth and sideNavWidth
const sideBarWidth = ref("0");
const sideNavWidth = ref("0");

// Function to open the navigation
function openNav() {
    sideBarWidth.value = "100%";
    sideNavWidth.value = "60%";
}

// Function to close the navigation
function exitNav() {
    sideBarWidth.value = "0";
    sideNavWidth.value = "0";
}
</script>

<template>
    <Head title="Dashboard" />
    <DefaultLayout>
        <ContentLayout>
            <div class="flex justify-between">
                <TheHeader title="Profil" class="mb-2 self-center" />
                <!-- Hamburger menu icon svg to trigger the slide-in menu when clicked -->
                <div @click="openNav">
                    <svg
                        class="h-6 w-6"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path
                            :class="{
                                hidden: showingNavigationDropdown,
                                'inline-flex': !showingNavigationDropdown,
                            }"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                        <path
                            :class="{
                                hidden: !showingNavigationDropdown,
                                'inline-flex': showingNavigationDropdown,
                            }"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </div>

                <!-- Background overlay element, will close navbar when clicked -->

                <div
                    :class="{
                        'fixed top-0 right-0 h-full bg-midnight-blue bg-opacity-30 overflow-x-hidden  z-10': true,
                    }"
                    :style="{ width: sideBarWidth }"
                    id="sideBar"
                >
                    <!-- Navigation menu contents -->
                    <div
                        :class="{
                            'fixed top-0 right-0 bg-off-white  h-full flex flex-col pt-20 overflow-x-hidden duration-100 z-50': true,
                        }"
                        :style="{ width: sideNavWidth }"
                        id="sideNav"
                    >
                        <!-- Exit icon -->
                        <div
                            class="text-sm self-center top-6 right-6 absolute"
                            @click="exitNav"
                        >
                            Fermer
                        </div>

                        <!-- Menu links -->

                        <div class="flex flex-col">
                            <div class="px-4 text-[26px] font-medium">
                                {{ user.firstname }}
                            </div>
                            <div class="px-4 pb-4 text-[20px]">
                                @{{ user.pseudo }}
                            </div>
                            <div class="flex flex-row px-4">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="19"
                                    height="19"
                                    viewBox="0 0 19 19"
                                    fill="none"
                                    class="self-center fill-purple"
                                >
                                    <path
                                        d="M8.75 14.25H10.25V8.5H8.75V14.25ZM9.5 6.7885C9.72883 6.7885 9.92067 6.71108 10.0755 6.55625C10.2303 6.40142 10.3077 6.20958 10.3077 5.98075C10.3077 5.75192 10.2303 5.56008 10.0755 5.40525C9.92067 5.25058 9.72883 5.17325 9.5 5.17325C9.27117 5.17325 9.07933 5.25058 8.9245 5.40525C8.76967 5.56008 8.69225 5.75192 8.69225 5.98075C8.69225 6.20958 8.76967 6.40142 8.9245 6.55625C9.07933 6.71108 9.27117 6.7885 9.5 6.7885ZM9.50175 19C8.18775 19 6.95267 18.7507 5.7965 18.252C4.64033 17.7533 3.63467 17.0766 2.7795 16.2218C1.92433 15.3669 1.24725 14.3617 0.74825 13.206C0.249417 12.0503 0 10.8156 0 9.50175C0 8.18775 0.249333 6.95267 0.748 5.7965C1.24667 4.64033 1.92342 3.63467 2.77825 2.7795C3.63308 1.92433 4.63833 1.24725 5.794 0.74825C6.94967 0.249417 8.18442 0 9.49825 0C10.8123 0 12.0473 0.249333 13.2035 0.748C14.3597 1.24667 15.3653 1.92342 16.2205 2.77825C17.0757 3.63308 17.7528 4.63833 18.2518 5.794C18.7506 6.94967 19 8.18442 19 9.49825C19 10.8123 18.7507 12.0473 18.252 13.2035C17.7533 14.3597 17.0766 15.3653 16.2218 16.2205C15.3669 17.0757 14.3617 17.7528 13.206 18.2518C12.0503 18.7506 10.8156 19 9.50175 19ZM9.5 17.5C11.7333 17.5 13.625 16.725 15.175 15.175C16.725 13.625 17.5 11.7333 17.5 9.5C17.5 7.26667 16.725 5.375 15.175 3.825C13.625 2.275 11.7333 1.5 9.5 1.5C7.26667 1.5 5.375 2.275 3.825 3.825C2.275 5.375 1.5 7.26667 1.5 9.5C1.5 11.7333 2.275 13.625 3.825 15.175C5.375 16.725 7.26667 17.5 9.5 17.5Z"
                                    />
                                </svg>
                                <DropdownLink
                                    :href="route('profile.edit')"
                                    class="text-purple"
                                >
                                    Informations du profil
                                </DropdownLink>
                            </div>
                            <div class="flex flex-row px-4">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="20"
                                    height="20"
                                    viewBox="0 0 20 20"
                                    fill="none"
                                    class="self-center"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M1.3335 1.3335H10.6668V2.66683H2.66683V17.3335H10.6668V18.6668H1.3335V1.3335ZM14.4722 5.52816L18.9255 9.9815L14.4895 14.7855L13.5108 13.8815L16.4775 10.6668H5.3335V9.3335H16.3908L13.5282 6.47216L14.4722 5.52816Z"
                                        class="fill-red"
                                    />
                                </svg>
                                <DropdownLink
                                    :href="route('logout')"
                                    method="post"
                                    as="button"
                                    class="text-red"
                                >
                                    Se déconnecter
                                </DropdownLink>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DASHBOARD CONTENT -->

            <div class="mb-10">
                <div class="overflow-hidden sm:rounded-lg">
                    <div class="w-[323px] text-[26px]">
                        Bonjour, {{ user.firstname }} !
                    </div>
                </div>
            </div>

            <!-- accomplissements -->
            <div class="flex flex-col pb-10">
                <div class="flex flex-row justify-between mb-3">
                    <Headline type="ms"> accomplissements </Headline>
                    <SeeAllLink :href="'dashboard/accomplissements'" />
                </div>

                <div class="flex flex-row w-full">
                    <img :src="badges[0].image" class="mr-4" />
                    <div class="flex flex-col w-full">
                        <div class="flex flex-row">
                            <div
                                class="
                                    w-full
                                    bg-grey
                                    rounded-full
                                    h-2.5
                                    self-center
                                "
                            >
                                <div
                                    class="
                                        bg-midnight-blue
                                        h-2.5
                                        rounded-full
                                        self-center
                                    "
                                    :style="{ width: progressWidth }"
                                ></div>
                            </div>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="29"
                                height="29"
                                viewBox="0 0 29 29"
                                fill="none"
                                class="progress-circle-container"
                            >
                                <ellipse
                                    cx="14.9131"
                                    cy="14.5"
                                    rx="14.087"
                                    ry="14.5"
                                    :class="{
                                        'fill-midnight-blue': isComplete,
                                        'fill-grey': !isComplete,
                                    }"
                                />
                                <path
                                    d="M14.911 18.5876L18.7066 20.8129C19.4017 21.2207 20.2522 20.6178 20.0693 19.8554L19.0633 15.6709L22.4198 12.8518C23.0326 12.3376 22.7033 11.3624 21.8985 11.3003L17.481 10.9369L15.7525 6.98291C15.4415 6.26481 14.3806 6.26481 14.0696 6.98291L12.3411 10.928L7.9236 11.2915C7.11876 11.3535 6.78951 12.3287 7.40228 12.8429L10.7588 15.6621L9.75277 19.8465C9.56986 20.6089 10.4204 21.2118 11.1155 20.804L14.911 18.5876Z"
                                    fill="white"
                                />
                            </svg>
                        </div>

                        <div class="flex flex-row">
                            <ImpactText class="self-center pr-1">{{
                                finishedPaths.length
                            }}</ImpactText>
                            sentiers complétés sur
                            <ImpactText class="self-center pl-1">{{
                                pathCount
                            }}</ImpactText>
                        </div>
                    </div>
                </div>
            </div>

            <!-- sentiers terminés -->
            <div class="flex flex-col">
                <div class="flex flex-row justify-between">
                    <Headline type="ms"> Sentiers Terminés </Headline>
                    <SeeAllLink :href="'dashboard/finished-paths'" />
                </div>

                <div class="mt-3 flex overflow-x-scroll pb-10 scrollbar-hide">
                    <div class="flex flex-row">
                        <div
                            class="inline-block pr-3"
                            v-for="pathHistory in finishedPaths.slice(0, 3)"
                            :key="pathHistory.path.id"
                        >
                            <div class="w-80">
                                <AppElementCard
                                    :thumbnail="pathHistory.thumbnail"
                                    :title="pathHistory.path.title"
                                    :type="'path'"
                                    :href="'sentier/' + pathHistory.path_id"
                                    :location="pathHistory.location"
                                    :infos="{
                                        distance: pathHistory.path.distance,
                                        duration: pathHistory.path.duration,
                                        ascent: pathHistory.path.ascent,
                                    }"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- sentiers téléchargés -->
            <div class="flex flex-col">
                <div class="flex flex-row justify-between">
                    <Headline type="ms"> Sentiers Téléchargés </Headline>
                    <SeeAllLink />
                </div>

                <div class="mt-3 flex overflow-x-scroll pb-10 scrollbar-hide">
                    <div class="flex flex-row">
                        <div
                            class="inline-block pr-3"
                            v-for="pathHistory in finishedPaths.slice(0, 3)"
                            :key="pathHistory.path.id"
                        >
                            <div class="w-80">
                                <AppElementCard
                                    :thumbnail="pathHistory.thumbnail"
                                    :title="pathHistory.path.title"
                                    :type="'path'"
                                    :href="'sentier/' + pathHistory.path_id"
                                    :location="pathHistory.location"
                                    :infos="{
                                        distance: pathHistory.path.distance,
                                        duration: pathHistory.path.duration,
                                        ascent: pathHistory.path.ascent,
                                    }"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </ContentLayout>
    </DefaultLayout>
</template>
<style scoped>
/* For Webkit-based browsers (Chrome, Safari and Opera) */
.scrollbar-hide::-webkit-scrollbar {
    display: none;
}

/* For IE, Edge and Firefox */
.scrollbar-hide {
    -ms-overflow-style: none; /* IE and Edge */
    scrollbar-width: none; /* Firefox */
}
.progress-circle-container {
    margin-left: -5px;
}
</style>
