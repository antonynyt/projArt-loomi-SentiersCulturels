<script setup>
//import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import TheHeader from "@/Components/App/TheHeader.vue";
import AppElementCard from "@/Components/App/AppElementCard.vue";
import AppTabSwitch from "@/Components/App/AppTabSwitch.vue";
import InformationText from "@/Components/App/Text/InformationText.vue";

import DropdownLink from "@/Components/DropdownLink.vue";
import ContentLayout from "@/Layouts/ContentLayout.vue";
import { Link, useForm, usePage } from "@inertiajs/vue3";
import { ref, watchEffect, computed } from "vue";
import { defineProps } from "vue";
import { router } from "@inertiajs/vue3";

const props = defineProps({
    createdPaths: {
        type: Array,
        required: true,
    },
    createdPois: {
        type: Array,
        required: true,
    },
});

const tab = ref("path");

// const filterByTab = (tab) => {
//     return (item) => {
//         return item.type === tab;
//     };
// };

// Computed property to filter items based on the selected tab
const listItems = computed(() => {
    return tab.value === "path" ? props.createdPaths : props.createdPois;
});

const isOverlayVisible = ref(false);

// Function to handle + button
const showOverlay = () => {
    isOverlayVisible.value = true;
};
const closeOverlay = () => {
    isOverlayVisible.value = false;
};

const toggleOverlay = () => {
    if (isOverlayVisible.value) {
        closeOverlay();
    } else {
        showOverlay();
    }
};

const user = usePage().props.auth.user;
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

function handleButtonClick(item) {
    if(tab.value === "path"){
        router.delete('/sentier/'+item.id);
    } else {
        router.delete('/poi/'+item.id);
    }
}
</script>

<template>
    <Head title="Dashboard"></Head>
    <DefaultLayout>
        <ContentLayout>
            <div class="flex justify-between">
                <TheHeader title="Profil" class="mb-2 self-center" />
                <!-- Hamburger menu icon svg to trigger the slide-in menu when clicked -->
                <div @click="openNav" class="mt-14">
                    <svg
                        class="h-6 w-6"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                    </svg>
                </div>

                <!-- Background overlay element, will close navbar when clicked -->

                <div
                    :class="{
                        'fixed top-0 right-0 h-full bg-midnight-blue bg-opacity-30 overflow-x-hidden  z-20': true,
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
                            class="
                                text-sm
                                self-center
                                top-4
                                right-4
                                absolute
                                flex flex-crow
                            "
                            @click="exitNav"
                        >
                            <div class="self-center">Fermer</div>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="26"
                                height="24"
                                viewBox="0 0 26 24"
                                fill="none"
                            >
                                <path
                                    d="M7.54974 6.96888C7.62521 6.89903 7.71487 6.84362 7.81358 6.80581C7.91229 6.768 8.01812 6.74854 8.12499 6.74854C8.23186 6.74854 8.33768 6.768 8.43639 6.80581C8.5351 6.84362 8.62476 6.89903 8.70024 6.96888L13 10.9394L17.2997 6.96888C17.3753 6.89914 17.465 6.84383 17.5637 6.80609C17.6624 6.76835 17.7682 6.74893 17.875 6.74893C17.9818 6.74893 18.0876 6.76835 18.1863 6.80609C18.285 6.84383 18.3747 6.89914 18.4502 6.96888C18.5258 7.03861 18.5857 7.12139 18.6266 7.2125C18.6675 7.30361 18.6885 7.40126 18.6885 7.49988C18.6885 7.59849 18.6675 7.69614 18.6266 7.78725C18.5857 7.87836 18.5258 7.96114 18.4502 8.03088L14.1489 11.9999L18.4502 15.9689C18.5258 16.0386 18.5857 16.1214 18.6266 16.2125C18.6675 16.3036 18.6885 16.4013 18.6885 16.4999C18.6885 16.5985 18.6675 16.6961 18.6266 16.7873C18.5857 16.8784 18.5258 16.9611 18.4502 17.0309C18.3747 17.1006 18.285 17.1559 18.1863 17.1937C18.0876 17.2314 17.9818 17.2508 17.875 17.2508C17.7682 17.2508 17.6624 17.2314 17.5637 17.1937C17.465 17.1559 17.3753 17.1006 17.2997 17.0309L13 13.0604L8.70024 17.0309C8.62469 17.1006 8.53501 17.1559 8.43631 17.1937C8.33761 17.2314 8.23182 17.2508 8.12499 17.2508C8.01815 17.2508 7.91237 17.2314 7.81366 17.1937C7.71496 17.1559 7.62528 17.1006 7.54974 17.0309C7.47419 16.9611 7.41427 16.8784 7.37339 16.7873C7.3325 16.6961 7.31146 16.5985 7.31146 16.4999C7.31146 16.4013 7.3325 16.3036 7.37339 16.2125C7.41427 16.1214 7.47419 16.0386 7.54974 15.9689L11.8511 11.9999L7.54974 8.03088C7.47407 7.96121 7.41404 7.87844 7.37308 7.78733C7.33212 7.69621 7.31104 7.59853 7.31104 7.49988C7.31104 7.40122 7.33212 7.30354 7.37308 7.21243C7.41404 7.12131 7.47407 7.03854 7.54974 6.96888Z"
                                    fill="#101720"
                                />
                            </svg>
                        </div>

                        <!-- Menu links -->

                        <div class="flex flex-col">
                            <div class="px-4 text-[26px] font-medium">
                                {{ user.organization }}
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

            <div class="mb-4">
                <div class="overflow-hidden sm:rounded-lg">
                    <div class="w-[323px] text-[26px]">
                        Bonjour, {{ user.organization }} !
                    </div>
                </div>
            </div>

            <InformationText type="m" class="mb-8">
                Vos lieux et sentiers que vous avez créés se trouvent ici.
            </InformationText>

            <AppTabSwitch
                class="mb-8"
                @setActiveTab="(newTab) => (tab = newTab)"
            />

            <!--Liste des sentiers ou lieux avec le filtre-->
            <section class="flex flex-col gap-4">
                <AppElementCard
                    v-for="path in listItems"
                    :key="path.id"
                    :thumbnail="path.thumbnail"
                    :title="path.title"
                    :type="path.type"
                    :location="path.location"
                    :infos="{
                        distance: path.distance,
                        duration: path.duration,
                        ascent: path.ascent,
                    }"
                >
                    <template #button>
                        <button @click="handleButtonClick(path)">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="20"
                                height="20"
                                viewBox="0 0 20 20"
                                fill="none"
                            >
                                <g clip-path="url(#clip0_1128_3828)">
                                    <path
                                        d="M3.125 1.25C2.79348 1.25 2.47554 1.3817 2.24112 1.61612C2.0067 1.85054 1.875 2.16848 1.875 2.5V3.75C1.875 4.08152 2.0067 4.39946 2.24112 4.63388C2.47554 4.8683 2.79348 5 3.125 5H3.75V16.25C3.75 16.913 4.01339 17.5489 4.48223 18.0178C4.95107 18.4866 5.58696 18.75 6.25 18.75H13.75C14.413 18.75 15.0489 18.4866 15.5178 18.0178C15.9866 17.5489 16.25 16.913 16.25 16.25V5H16.875C17.2065 5 17.5245 4.8683 17.7589 4.63388C17.9933 4.39946 18.125 4.08152 18.125 3.75V2.5C18.125 2.16848 17.9933 1.85054 17.7589 1.61612C17.5245 1.3817 17.2065 1.25 16.875 1.25H12.5C12.5 0.918479 12.3683 0.600537 12.1339 0.366117C11.8995 0.131696 11.5815 0 11.25 0L8.75 0C8.41848 0 8.10054 0.131696 7.86612 0.366117C7.6317 0.600537 7.5 0.918479 7.5 1.25H3.125ZM6.875 6.25C7.04076 6.25 7.19973 6.31585 7.31694 6.43306C7.43415 6.55027 7.5 6.70924 7.5 6.875V15.625C7.5 15.7908 7.43415 15.9497 7.31694 16.0669C7.19973 16.1842 7.04076 16.25 6.875 16.25C6.70924 16.25 6.55027 16.1842 6.43306 16.0669C6.31585 15.9497 6.25 15.7908 6.25 15.625V6.875C6.25 6.70924 6.31585 6.55027 6.43306 6.43306C6.55027 6.31585 6.70924 6.25 6.875 6.25ZM10 6.25C10.1658 6.25 10.3247 6.31585 10.4419 6.43306C10.5592 6.55027 10.625 6.70924 10.625 6.875V15.625C10.625 15.7908 10.5592 15.9497 10.4419 16.0669C10.3247 16.1842 10.1658 16.25 10 16.25C9.83424 16.25 9.67527 16.1842 9.55806 16.0669C9.44085 15.9497 9.375 15.7908 9.375 15.625V6.875C9.375 6.70924 9.44085 6.55027 9.55806 6.43306C9.67527 6.31585 9.83424 6.25 10 6.25ZM13.75 6.875V15.625C13.75 15.7908 13.6842 15.9497 13.5669 16.0669C13.4497 16.1842 13.2908 16.25 13.125 16.25C12.9592 16.25 12.8003 16.1842 12.6831 16.0669C12.5658 15.9497 12.5 15.7908 12.5 15.625V6.875C12.5 6.70924 12.5658 6.55027 12.6831 6.43306C12.8003 6.31585 12.9592 6.25 13.125 6.25C13.2908 6.25 13.4497 6.31585 13.5669 6.43306C13.6842 6.55027 13.75 6.70924 13.75 6.875Z"
                                        fill="#E95D5D"
                                    />
                                </g>
                                <defs>
                                    <clipPath id="clip0_1128_3828">
                                        <rect
                                            width="20"
                                            height="20"
                                            fill="white"
                                        />
                                    </clipPath>
                                </defs>
                            </svg>
                        </button>
                    </template>
                </AppElementCard>
            </section>
            <!-- Create new paths button -->
            <div class="fixed right-4 bottom-24 z-10">
                <div class="w-12 h-12 z-10">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="48"
                        height="48"
                        viewBox="0 0 48 48"
                        fill="none"
                        @click="toggleOverlay()"
                    >
                        <circle cx="24" cy="24" r="24" fill="#101720" />
                        <path
                            d="M35.1429 25.8571H25.8571V35.1429C25.8571 35.6354 25.6615 36.1078 25.3132 36.4561C24.9649 36.8043 24.4925 37 24 37C23.5075 37 23.0351 36.8043 22.6868 36.4561C22.3385 36.1078 22.1429 35.6354 22.1429 35.1429V25.8571H12.8571C12.3646 25.8571 11.8922 25.6615 11.5439 25.3132C11.1957 24.9649 11 24.4925 11 24C11 23.5075 11.1957 23.0351 11.5439 22.6868C11.8922 22.3385 12.3646 22.1429 12.8571 22.1429H22.1429V12.8571C22.1429 12.3646 22.3385 11.8922 22.6868 11.5439C23.0351 11.1957 23.5075 11 24 11C24.4925 11 24.9649 11.1957 25.3132 11.5439C25.6615 11.8922 25.8571 12.3646 25.8571 12.8571V22.1429H35.1429C35.6354 22.1429 36.1078 22.3385 36.4561 22.6868C36.8043 23.0351 37 23.5075 37 24C37 24.4925 36.8043 24.9649 36.4561 25.3132C36.1078 25.6615 35.6354 25.8571 35.1429 25.8571Z"
                            fill="#FAF9F6"
                        />
                    </svg>
                </div>
            </div>

            <!-- Create new paths overlay -->
            <div
                v-if="isOverlayVisible"
                @click="toggleOverlay()"
                class="
                    fixed
                    inset-0
                    flex
                    items-center
                    justify-center
                    bg-black bg-opacity-50
                "
            >
                <div
                    class="
                        absolute
                        right-4
                        bottom-40
                        px-8
                        py-6
                        bg-stone-50
                        rounded-xl
                        flex-col
                        justify-start
                        items-start
                        gap-2.5
                        inline-flex
                    "
                >
                    <div class="w-[222px] h-[60px] relative">
                        <div class="w-[222px] h-[21px] left-0 top-0 absolute">
                            <a
                                :href="'/new-path'"
                                class="flex flex-row justify-between"
                            >
                                Nouveau sentier
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="6"
                                    height="11"
                                    viewBox="0 0 6 11"
                                    fill="none"
                                    class="self-center"
                                >
                                    <path
                                        d="M4.1148 5.0574L0 0.942602L0.942601 0L6 5.0574L0.942601 10.1148L0 9.1722L4.1148 5.0574Z"
                                        fill="black"
                                        class="self-center"
                                    />
                                </svg>
                            </a>
                        </div>
                        <div
                            class="
                                w-[222px]
                                h-[21px]
                                left-0
                                top-[37px]
                                absolute
                            "
                        >
                            <div class="flex flex-row justify-between">
                                Nouveau point d’intérêt
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="6"
                                    height="11"
                                    viewBox="0 0 6 11"
                                    fill="none"
                                    class="self-center"
                                >
                                    <path
                                        d="M4.1148 5.0574L0 0.942602L0.942601 0L6 5.0574L0.942601 10.1148L0 9.1722L4.1148 5.0574Z"
                                        fill="black"
                                        class="self-center"
                                    />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </ContentLayout>
    </DefaultLayout>
</template>
