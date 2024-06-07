<script setup>
//import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import Headline from "@/Components/App/Text/Headline.vue";
import InformationText from "@/Components/App/Text/InformationText.vue";
import ContentLayout from "@/Layouts/ContentLayout.vue";
import BackButton from "@/Components/App/Button/BackButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { router } from '@inertiajs/vue3'
</script>

<template>
    <Head title="New Path Instructions"></Head>
    <ContentLayout class="h-dvh flex flex-col justify-between">
        <div class="h-full">
            <BackButton class="mb-6"/>
            <Headline class="mb-6" rank="h2" type="m">Créer un nouveau sentier</Headline>
            <InformationText class="mb-4" type="m">Génial ! Vous êtes sur le point de rajouter une nouvelle aventure sur la carte des sentiers culturels vaudois.</InformationText>
            <InformationText type="m">Pour cela, ajoutez au moins 2 étapes à votre parcours en vous servant de la barre de recherche pour ajouter un point d’intérêt déjà existant. Ou créer le votre s’il n’y est pas encore.</InformationText>
        </div>
        <PrimaryButton @click="router.get('/new-path/map')" class="mt-auto w-full justify-center mt-auto">Suivant</PrimaryButton>
    </ContentLayout>
</template>

<style scoped>

</style>
