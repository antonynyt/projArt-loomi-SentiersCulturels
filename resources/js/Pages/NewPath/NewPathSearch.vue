<script setup>
//import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref, computed } from 'vue';
import BackButton from "@/Components/App/Button/BackLink.vue";
import SearchInput from '@/Components/Search/SearchInput.vue'
import AppElementCard from "@/Components/App/AppElementCard.vue";

const props = defineProps({ pois: Object });
console.log(props.pois);
console.log(props.pois[0]);
console.log(props.pois[0].title);


const searchInput = ref('');

const normalizeString = (str) => {
    return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase();
};

const filteredPois = computed(() => {
    const searchTerm = normalizeString(searchInput.value);
    return props.pois.filter(poi => {
        const title = normalizeString(poi.title);
        const description = normalizeString(poi.descr);

        return title.includes(searchTerm) || description.includes(searchTerm);
    });
});

const handleEnterKey = (event) => {
    if (event.key === 'Enter') {
        event.preventDefault();
        event.target.blur();
    }
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
    <Head title="New Path - Search a POI"></Head>
    <div class="bg-off-white px-5 flex flex-col fixed left-0 top-0 py-4 z-20 w-full">
        <BackButton class="self-start mb-6"/>
        <SearchInput
            class="max-w-lg mx-auto"
            v-model="searchInput"
            label="Search input"
            placeholder="Rechercher un point d’intérêt"
            @keydown="handleEnterKey"
            />
    </div>
    <section class="flex flex-col w-full max-w-lg gap-4 px-5 mx-auto mt-32 mb-6">
        <AppElementCard v-for="item in filteredPois"
                :key="item.id"
                :thumbnail="item.photos[0].link"
                :title="item.title"
                :href="'map/' + item.id"
                :location="extractLocality(item.adress_label)"
        ></AppElementCard>
    </section>
</template>

<style scoped>

</style>
