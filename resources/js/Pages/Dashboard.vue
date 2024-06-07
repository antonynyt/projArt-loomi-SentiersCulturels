<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import TheHeader from "@/Components/App/TheHeader.vue";
import AppElementCard from "@/Components/App/AppElementCard.vue";
import ContentLayout from "@/Layouts/ContentLayout.vue";
import { Link, useForm, usePage } from "@inertiajs/vue3";
import { ref } from "vue";
import Headline from "@/Components/App/Text/Headline.vue";
import SeeAllLink from "@/Components/App/Button/SeeAllLink.vue";
import DropdownLink from "@/Components/DropdownLink.vue";

//const { props } = usePage();
const user = usePage().props.auth.user;

const props = defineProps({
    finishedPaths: {
        type: Array,
        required: true,
    },
});
//console.log(props.finishedPaths);

const finishedPaths = ref(props.finishedPaths);

console.log(finishedPaths.value);

finishedPaths.value.forEach((path) => {
    console.log(path);
});

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
                        'fixed top-0 right-0 h-full bg-midnight-blue bg-opacity-30 overflow-x-hidden duration-500 z-10': true,
                    }"
                    :style="{ width: sideBarWidth }"
                    id="sideBar"
                >
                    <!-- Navigation menu contents -->
                    <div
                        :class="{
                            'fixed top-0 right-0 bg-off-white  h-full flex flex-col pt-20 overflow-x-hidden duration-500 z-50': true,
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
                            <DropdownLink
                                :href="route('profile.edit')"
                                class="text-purple"
                            >
                                Informations du profil
                            </DropdownLink>
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

            <!-- DASHBOARD CONTENT -->

            <div class="mb-10">
                <div class="overflow-hidden sm:rounded-lg">
                    <div class="w-[323px] text-[26px]">
                        Bonjour, {{ user.firstname }} !
                    </div>
                </div>
            </div>

            <div class="flex flex-col">
                <div class="flex flex-row justify-between">
                    <Headline type="ms"> Sentiers Terminés </Headline>
                    <SeeAllLink />
                </div>

                <div class="mt-3 flex overflow-x-scroll pb-10 hide-scroll-bar">
                    <div class="flex flex-nowrap">
                        <div
                            class="inline-block px-3"
                            v-for="pathHistory in finishedPaths.slice(0, 3)"
                            :key="pathHistory.path.id"
                        >
                            <div class="w-64 overflow-hidden">
                                <AppElementCard
                                    :thumbnail="pathHistory.thumbnail"
                                    :title="pathHistory.path.title"
                                    :href="'map/' + pathHistory.path.id"
                                    :location="pathHistory.location"
                                    :infos="{
                                        distance: pathHistory.path.distance,
                                        duration: pathHistory.path.duration,
                                        elevation: pathHistory.path.duration,
                                    }"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col">
                <div class="flex flex-row justify-between">
                    <Headline type="ms"> Sentiers Téléchargés </Headline>
                    <SeeAllLink />
                </div>

                <div class="mt-3 flex overflow-x-scroll pb-10 hide-scroll-bar">
                    <div class="flex flex-nowrap">
                        <div
                            class="inline-block px-3"
                            v-for="pathHistory in finishedPaths.slice(0, 3)"
                            :key="pathHistory.path.id"
                        >
                            <div class="w-64 overflow-hidden">
                                <AppElementCard
                                    :thumbnail="pathHistory.thumbnail"
                                    :title="pathHistory.path.title"
                                    :href="'map/' + pathHistory.path.id"
                                    :location="pathHistory.location"
                                    :infos="{
                                        distance: pathHistory.path.distance,
                                        duration: pathHistory.path.duration,
                                        elevation: pathHistory.path.duration,
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
