<script setup>
//import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import Headline from "@/Components/App/Text/Headline.vue";
import ImpactText from "@/Components/App/Text/ImpactText.vue";
import InformationText from "../App/Text/InformationText.vue";
import Text from "../App/Text/Text.vue";
import LinkText from "../App/Text/LinkText.vue";
import TheHeader from "@/Components/App/TheHeader.vue";
import ContentLayout from "@/Layouts/ContentLayout.vue";
import { Link, useForm, usePage } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Dashboard"></Head>
    <ContentLayout>
            <Headline class="mb-4" rank="h2" type="m">Créer un nouveau sentier</Headline>
            <Text class="mb-4" type="m">Génial ! Vous êtes sur le point de rajouter une nouvelle aventure sur la carte des sentiers culturels vaudois.</Text>
            <Text class="mb-4" type="m">Pour cela, ajoutez au moins 2 étapes à votre parcours en vous servant de la barre de recherche pour ajouter un point d’intérêt déjà existant. Ou créer le votre s’il n’y est pas encore.</Text>
            <TheHeader title="Dashboard" class="mb-8"></TheHeader>
    </ContentLayout>
</template>

<style scoped>

</style>
