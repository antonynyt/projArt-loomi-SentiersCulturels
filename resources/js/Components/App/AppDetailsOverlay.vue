<script setup>
import AppElementCard from '@/Components/App/AppElementCard.vue';
import AppPoiStepCard from '@/Components/App/AppPoiStepCard.vue';
import { onMounted, ref } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { map, poi } from '@/Components/Map/stores/mapStore';

const props = defineProps({
    pathInfos: {
        type: Object,
    }
});

const pathInfos = ref(props.pathInfos);

const easeTo = (coordinates) => {
    map.value.easeTo({
        center: coordinates,
        zoom: 16
    });
}

const initObserver = () => {
    const options = {
        root: null,
        rootMargin: '0px',
        threshold: 1 // Adjust this to define what "center" means (0.5 means element is 50% visible)
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const coordinates = entry.target.dataset.coordinates.split(',');
                easeTo(coordinates);
                entry.target.classList.add('active');
                entry.target.classList.add('outline', 'outline-purple');
                entry.target.querySelector(".step").classList.add('bg-purple', 'text-white');
            } else {
                entry.target.classList.remove('active');
                entry.target.classList.remove('outline', 'outline-purple');
                entry.target.querySelector(".step").classList.remove('bg-purple', 'text-white');
            }
        });
    }, options);

    document.querySelectorAll('.snap-center').forEach(card => observer.observe(card));
};

onMounted(() => {
    initObserver();
});

const back = () => {
    window.history.back();
}

const pois = ref(JSON.parse(poi.value).features);


</script>

<template>
    <div class="fixed bottom-20 left-0 w-full z-20">
        <div class="flex flex-col overflow-hidden h-full max-w-lg w-full mx-auto">
            <div class="flex w-full flex-row gap-4 overflow-x-scroll pt-1 pb-4 px-6 scoll-ps-6 no-scrollbar snap-x snap-mandatory">
                <AppPoiStepCard v-for="(poi, index) in pois" class="snap-center" :step="index+1" :title="poi.properties.name" href="/poi/2"
                    :coordinates="poi.geometry.coordinates" />
            </div>
            <div class="px-5 pb-4">
                <PrimaryButton @click="back" class="absolute top-[-52px] text-xs border-none shadow-md">Retour</PrimaryButton>
                <AppElementCard class="bg-white shadow-md"
                    :thumbnail="pathInfos.thumbnail"
                    :title="pathInfos.title" type="path" :href="'/sentier/' + pathInfos.id" :location="pathInfos.location"
                    :infos="{ distance: pathInfos.distance, duration: pathInfos.duration, ascent: pathInfos.ascent }">
                </AppElementCard>
            </div>
        </div>
    </div>
</template>

<style scoped>
.no-scrollbar::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
.no-scrollbar {
    -ms-overflow-style: none;
    /* IE and Edge */
    scrollbar-width: none;
    /* Firefox */
}
</style>