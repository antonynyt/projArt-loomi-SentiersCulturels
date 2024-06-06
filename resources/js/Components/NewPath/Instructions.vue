<script setup>
//import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import TheHeader from "@/Components/App/TheHeader.vue";
import ContentLayout from "@/Layouts/ContentLayout.vue";
import { Link, useForm, usePage } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Dashboard"></Head>
    <ContentLayout>
            <h2>Créer un nouveau sentier</h2>
            <p>Génial ! Vous êtes sur le point de rajouter une nouvelle aventure sur la carte des sentiers culturels vaudois.</p>
            <p>Pour cela, ajoutez au moins 2 étapes à votre parcours en vous servant de la barre de recherche pour ajouter un point d’intérêt déjà existant. Ou créer le votre s’il n’y est pas encore.</p>

            <TheHeader title="Dashboard" class="mb-8"></TheHeader>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="overflow-hidden sm:rounded-lg">
                        <div class="w-[323px] text-[22px]">

                        </div>
                        </div>
                </div>
            </div>
    </ContentLayout>
</template>

<style scoped>
h2 {
    font-family: PP Agrandir Variable;
    font-size: 22px;
    font-weight: 617;
    line-height: 29.04px;
    text-align: left;
}
</style>
