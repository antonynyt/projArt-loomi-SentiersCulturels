<script setup>
//import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import Headline from "@/Components/App/Text/Headline.vue";
import InformationText from "@/Components/App/Text/InformationText.vue";
import ContentLayout from "@/Layouts/ContentLayout.vue";
import BackButton from "@/Components/App/Button/BackLink.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { router } from '@inertiajs/vue3'
import SearchInput from '@/Components/Search/SearchInput.vue'
import { ref } from 'vue'
import NewPathLayout from "@/Layouts/NewPathLayout.vue";

const searchInput = ref('');
</script>

<template>
    <Head title="New Path - Search a POI"></Head>
    <div class="px-5 flex flex-col fixed left-0 top-6 z-20 w-full">
        <BackButton class="self-start mb-6"/>
        <SearchInput class="max-w-lg mx-auto" v-model="searchInput" label="Search input" placeholder="Rechercher un point d’intérêt"/>
    </div>
    <NewPathLayout>

    </NewPathLayout>
</template>

<style scoped>

</style>
