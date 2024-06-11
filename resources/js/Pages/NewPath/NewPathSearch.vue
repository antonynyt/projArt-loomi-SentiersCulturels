<script setup>
//import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref, computed } from 'vue';
import BackButton from "@/Components/App/Button/BackLink.vue";
import SearchInput from '@/Components/Search/SearchInput.vue'
import AppElementCard from "@/Components/App/AppElementCard.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { router } from "@inertiajs/vue3";
import { toRaw } from 'vue';

const props = defineProps({
    pois: {
        type: Array,
        required: true,
    },
    selectedPois: {
        type: Array,
        required: false,
        default: [],
    }
});
const pois = toRaw(props.pois);
const selectedPois = toRaw(props.selectedPois);
// Remove the last selected POI from the list of POIs so the user can't select it again
if (selectedPois.length > 0) {
    const lastSelectedPoiId = selectedPois[selectedPois.length - 1].id;
    const index = pois.findIndex(poi => poi.id === lastSelectedPoiId);
    if (index !== -1) {
        pois.splice(index, 1);
    }
}
console.log(pois);
console.log(selectedPois);

const searchInput = ref('');

const normalizeString = (str) => {
    return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase();
};

const filteredPois = computed(() => {
    const searchTerm = normalizeString(searchInput.value);
    return pois.filter(poi => {
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

const addPoi = (poiId) => {
    const poi = pois.find(poi => poi.id === poiId);
    if (!poi) return;
    selectedPois.push(poi);
    const jsonSelectedPois = JSON.stringify(selectedPois);
    router.post('/new-path/map', { selectedPois: jsonSelectedPois });
};
</script>

<template>
    <Head title="New Path - Search a POI"></Head>
    <div class="bg-off-white flex flex-col fixed top-0 py-4 z-20 w-full">
        <div class="max-w-lg mx-auto w-full px-5">
            <BackButton class="self-start mb-6"/>
        </div>
        <div class="max-w-lg mx-auto w-full px-5">
            <SearchInput
            v-model="searchInput"
            label="Search input"
            placeholder="Rechercher un point d’intérêt"
            @keydown="handleEnterKey"
            />
        </div>
    </div>
    <section class="flex flex-col w-full max-w-lg gap-4 mx-auto mt-32 mb-6 px-5">
        <AppElementCard v-for="item in filteredPois"
                :key="item.id"
                :thumbnail="item.photos[0].link"
                :title="item.title"
                :location="extractLocality(item.adress_label)"
                :coordinates="[item.lat, item.long]"
                :type="'poi'"
                @cardClick="router.get('/poi/' + item.id)"
        >
            <template v-slot:button>
                <PrimaryButton
                    @click.stop="addPoi(item.id)"
                    icon='<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26">
                        <path d="M24.1429 14.8571H14.8571V24.1429C14.8571 24.6354 14.6615 25.1078 14.3132 25.4561C13.9649 25.8043 13.4925 26 13 26C12.5075 26 12.0351 25.8043 11.6868 25.4561C11.3385 25.1078 11.1429 24.6354 11.1429 24.1429V14.8571H1.85714C1.3646 14.8571 0.892227 14.6615 0.543945 14.3132C0.195663 13.9649 0 13.4925 0 13C0 12.5075 0.195663 12.0351 0.543945 11.6868C0.892227 11.3385 1.3646 11.1429 1.85714 11.1429H11.1429V1.85714C11.1429 1.3646 11.3385 0.892226 11.6868 0.543944C12.0351 0.195662 12.5075 0 13 0C13.4925 0 13.9649 0.195662 14.3132 0.543944C14.6615 0.892226 14.8571 1.3646 14.8571 1.85714V11.1429H24.1429C24.6354 11.1429 25.1078 11.3385 25.4561 11.6868C25.8043 12.0351 26 12.5075 26 13C26 13.4925 25.8043 13.9649 25.4561 14.3132C25.1078 14.6615 24.6354 14.8571 24.1429 14.8571Z"/>
                        </svg>'
                    size="xs"
                ></PrimaryButton>
            </template>
        </AppElementCard>
    </section>
</template>

<style scoped>

</style>
