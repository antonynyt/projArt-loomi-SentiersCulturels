<script setup>
//import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import Headline from "@/Components/App/Text/Headline.vue";
import InformationText from "@/Components/App/Text/InformationText.vue";
import BackLink from "@/Components/App/Button/BackLink.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { router } from '@inertiajs/vue3'
import NewPathLayout from '@/Layouts/NewPathLayout.vue'

</script>

<template>
    <Head title="New Path Instructions"></Head>
    <NewPathLayout class="h-dvh flex flex-col justify-between">
        <div>
            <BackLink class="mb-6"/>
            <Headline class="mb-6" rank="h1" type="m">Créer un nouveau sentier</Headline>
            <InformationText class="mb-4" type="m">Génial ! Vous êtes sur le point de rajouter une nouvelle aventure sur la carte des sentiers culturels vaudois.</InformationText>
            <InformationText type="m">Pour cela, ajoutez au moins 2 étapes à votre parcours en vous servant de la barre de recherche pour ajouter un point d’intérêt déjà existant. Ou créer le votre s’il n’y est pas encore.</InformationText>
        </div>
        <PrimaryButton @click="router.post('/new-path/map')" class="mb-8 mt-auto justify-center" style="width: 100%;">Suivant</PrimaryButton>
    </NewPathLayout>
</template>

<style scoped>

</style>
