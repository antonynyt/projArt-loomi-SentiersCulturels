<script setup>
import { Head } from '@inertiajs/vue3';
import { ref, watch, toRaw, computed } from 'vue';
import MapManager from '@/Components/Map/MapManager.vue';
import NewPathDrawer from '@/Components/NewPath/NewPathDrawer.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import BackButton from '@/Components/App/Button/BackButton.vue';
import ImpactText from '@/Components/App/Text/ImpactText.vue';
import { router } from '@inertiajs/vue3';
import AppNavCard from '@/Components/App/AppNavCard.vue';

const props = defineProps({
    selectedPois: {
        type: Array,
        required: false,
        default: () => [],
    },
    path: {
        type: Object,
        required: false,
        default: null,
    },
});

const options = {
    controls: false,
    hash: false,
};

// watch(selectedPois, (newVal) => {
//     if (newVal) {
//         const json = {
//             type: 'FeatureCollection',
//             features: newVal
//         };
//         poi.value = json;
//         if (map.value && map.value.getSource('POI')) {
//             map.value.getSource('POI').setData(json);
//         }
//     }
// });

// watch(() => props.path, (newVal) => {
//     if (newVal) {
//         const json = toRaw(newVal);
//         path.value = json ? JSON.stringify(json) : null;

//         if (json && json.features && json.features.length > 0) {
//             const bounds = new maplibregl.LngLatBounds();
//             json.features[0].geometry.coordinates.forEach(coord => {
//                 bounds.extend(coord);
//             });
//             if (map.value) {
//                 map.value.fitBounds(bounds, { padding: 50, maxZoom: 16 });
//             }
//         }
//     }
// });

const isOpen = ref(false);
// Handle drawer close event from child
const handleDrawerClose = (value) => {
    isOpen.value = value;
}

// const handleDrawerClose = (value) => {
//     isOpen.value = value;
// }

// const handleClick = (props) => {
//     if (props.type === 'path') {
//         router.visit(`${props.href}`, { preserveState: true});
//     } else {
//         if (map.value) {
//             map.value.flyTo({
//                 center: props.coordinates,
//                 zoom: 16
//             });
//         }
//     }
// };

const extractLocality = (address) => {
    const parts = address.split(',');
    if (parts.length < 3) return address; // Return the whole address if it's not in the expected format
    let locality = parts[parts.length - 2].trim();
    locality = locality.replace(/^\d{4}\s*/, ''); // Remove the 4-digit NPA if present
    return locality;
};
console.log("----- Path -----");
console.log(props.path);
if(props.path) {
    console.log("----- Path features -----");
    console.log(props.path.features);
    console.log("----- Path segments -----");
    console.log(props.path.features[0].properties.segments);
    console.log("----- Path segments distance -----");
    console.log(props.path.features[0].properties.segments[0].distance);
    console.log("----- Path segments duration -----");
    console.log(props.path.features[0].properties.segments[0].duration);
    console.log("----- Path segments ascent -----");
    console.log(props.path.features[0].properties.segments[0].ascent);
}
</script>

<template>
    <Head>
        <title>New Path - Map</title>
    </Head>
    <div class="flex flex-col items-center px-5 fixed left-0 top-0 z-30 w-full">
        <div class="flex flex-wrap max-w-lg w-full mt-6">
            <BackButton size="xs"></BackButton>
        </div>
    </div>
    <div class="w-full h-dvh">
        <div class="map__container h-[calc(100dvh-80px)]">
            <MapManager :options="options" :pois="props.selectedPois" :path="props.path" />
        </div>
        <NewPathDrawer :isOpen @update:drawerIsOpen="handleDrawerClose">
            <div
                id="poi-list"
                class="flex flex-col items-center justify-center"
            >
                <transition-group name="list" tag="div">
                    <AppNavCard
                        v-for="(poi, n) in selectedPois"
                        v-if="props.selectedPois"
                        v-show="isOpen || n == selectedPois.length-1"
                        :key="poi.id"
                        :first="n == 0"
                        :last="n == props.selectedPois.length-1"
                        :thumbnail="poi.photos && poi.photos.length > 0 ? poi.photos[0].link : ''"
                        :title="poi.title"
                        :location="extractLocality(poi.adress_label)"
                        :border="true"
                        :navigationInfos="n > 0 ? {
                            distance: props.path.features[0].properties.segments[n-1].distance,
                            duration: props.path.features[0].properties.segments[n-1].duration,
                            ascent: props.path.features[0].properties.segments[n-1].ascent
                        } : null"
                        :coordinates="[poi.lat, poi.long]"
                        @cardClick="console.log('card click')"
                    >
                        <template v-slot:content>{{ n+1 }}</template>
                        <template v-slot:button>
                            <svg @click.stop="console.log('button click')" class="self-center" xmlns="http://www.w3.org/2000/svg" width="9" height="16" viewBox="0 0 9 16" fill="none">
                                    <rect y="0.5" width="3" height="3" rx="1.5" fill="#C1C9D2"/>
                                    <rect x="6" y="0.5" width="3" height="3" rx="1.5" fill="#C1C9D2"/>
                                    <rect x="6" y="6.5" width="3" height="3" rx="1.5" fill="#C1C9D2"/>
                                    <rect y="6.5" width="3" height="3" rx="1.5" fill="#C1C9D2"/>
                                    <rect y="12.5" width="3" height="3" rx="1.5" fill="#C1C9D2"/>
                                    <rect x="6" y="12.5" width="3" height="3" rx="1.5" fill="#C1C9D2"/>
                            </svg>
                        </template>
                    </AppNavCard>
                </transition-group>
                <ImpactText v-if="!props.selectedPois" class="mt-16" type="m">Définissez un point de départ</ImpactText>
                <PrimaryButton
                    class="mt-4"
                    @click="router.post('/new-path/search')"
                    icon='<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26">
                        <path d="M24.1429 14.8571H14.8571V24.1429C14.8571 24.6354 14.6615 25.1078 14.3132 25.4561C13.9649 25.8043 13.4925 26 13 26C12.5075 26 12.0351 25.8043 11.6868 25.4561C11.3385 25.1078 11.1429 24.6354 11.1429 24.1429V14.8571H1.85714C1.3646 14.8571 0.892227 14.6615 0.543945 14.3132C0.195663 13.9649 0 13.4925 0 13C0 12.5075 0.195663 12.0351 0.543945 11.6868C0.892227 11.3385 1.3646 11.1429 1.85714 11.1429H11.1429V1.85714C11.1429 1.3646 11.3385 0.892226 11.6868 0.543944C12.0351 0.195662 12.5075 0 13 0C13.4925 0 13.9649 0.195662 14.3132 0.543944C14.6615 0.892226 14.8571 1.3646 14.8571 1.85714V11.1429H24.1429C24.6354 11.1429 25.1078 11.3385 25.4561 11.6868C25.8043 12.0351 26 12.5075 26 13C26 13.4925 25.8043 13.9649 25.4561 14.3132C25.1078 14.6615 24.6354 14.8571 24.1429 14.8571Z"/>
                    </svg>'
                ></PrimaryButton>
            </div>
        </NewPathDrawer>
    </div>
</template>

<style scoped>
.v-enter-active,
.v-leave-active {
    transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
    opacity: 0;
}
.list-move, /* apply transition to moving elements */
.list-enter-active,
.list-leave-active {
  transition: all 0.5s ease;
}
.list-enter-from,
.list-leave-to {
  opacity: 0;
  transform: translateX(30px);
}

/* ensure leaving items are taken out of layout flow so that moving
   animations can be calculated correctly. */
.list-leave-active {
  position: absolute;
}
</style>
