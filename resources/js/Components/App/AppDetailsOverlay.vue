<script setup>
import AppElementCard from '@/Components/App/AppElementCard.vue';
import AppPoiStepCard from '@/Components/App/AppPoiStepCard.vue';
import { onMounted, ref } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { map, poi } from '@/Components/Map/stores/mapStore';

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

// console.log(poi.value);
const pois = ref(JSON.parse(poi.value).features);


</script>

<template>
    <div class="fixed bottom-20 left-0 w-full z-20">
        <div class="flex flex-col py-5 overflow-auto h-full max-w-lg w-full mx-auto">
            <div class="px-5">
                <PrimaryButton @click="back" class="mb-4">Retour</PrimaryButton>
                <AppElementCard class="bg-white border-none shadow-md"
                    thumbnail="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQEfcic7qPkE6RB0WoiQE7Ks4e6TkXa3XethQ&s"
                    title="Sentier des Lutins" href="/sentiers/2" location="ici"
                    :infos="{ distance: '5km', duration: '2h', elevation: '200m' }">
                </AppElementCard>
            </div>
            <div class="flex w-full flex-row gap-4 overflow-x-scroll py-4 px-32 scoll-ps-32 no-scrollbar snap-x snap-mandatory">
                <AppPoiStepCard v-for="(poi, index) in pois" class="snap-center" :step="index+1" :title="poi.properties.Name" href="/sentiers/2/1"
                    :coordinates="poi.geometry.coordinates" />
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