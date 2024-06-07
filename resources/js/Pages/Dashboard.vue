<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import TheHeader from "@/Components/App/TheHeader.vue";
import AppElementCard from "@/Components/App/AppElementCard.vue";
import ContentLayout from "@/Layouts/ContentLayout.vue";
import { Link, useForm, usePage } from "@inertiajs/vue3";
import { ref } from "vue";

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
</script>

<template>
    <Head title="Dashboard" />
    <DefaultLayout>
        <ContentLayout>
            <AuthenticatedLayout>
                <TheHeader title="Dashboard" class="mb-4" />

                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
                    <div class="overflow-hidden sm:rounded-lg">
                        <div class="w-[323px] text-[26px]">
                            Bonjour, {{ user.firstname }} !
                        </div>
                    </div>
                </div>

                <div class="flex flex-col">
                    <div class="flex flex-row justify-between">
                        <h2
                            class="
                                text-xl
                                font-medium
                                uppercase
                                text-midnight-blue
                            "
                        >
                            Sentiers Terminés
                        </h2>
                        <Link :href="href" preserve-state>
                            <div class="text-purple text-sm">Voir tout</div>
                        </Link>
                    </div>

                    <div
                        class="
                            mt-3
                            flex
                            overflow-x-scroll
                            pb-10
                            hide-scroll-bar
                        "
                    >
                        <div class="flex flex-nowrap">
                            <div
                                class="inline-block px-3"
                                v-for="(
                                    pathHistory, index
                                ) in finishedPaths.slice(0, 3)"
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
                                            elevation:
                                                pathHistory.path.duration,
                                        }"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </AuthenticatedLayout>
        </ContentLayout>
    </DefaultLayout>
</template>
