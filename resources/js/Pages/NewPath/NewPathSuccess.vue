<script setup>
//import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import Headline from "@/Components/App/Text/Headline.vue";
import InformationText from "@/Components/App/Text/InformationText.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { router } from '@inertiajs/vue3'
import NewPathLayout from '@/Layouts/NewPathLayout.vue'
import { defineProps } from 'vue';
import SecondaryButton from "@/Components/SecondaryButton.vue";

const props = defineProps({
    pathId: {
        type: Number,
        required: true,
    },
});

</script>

<template>
    <Head title="New Path Form"></Head>
    <NewPathLayout :hasNavBar="false" class="success-frame h-dvh flex flex-col">
        <Headline rank="h1" type="l" style="margin-top: 11rem;">Bravo !</Headline>
        <InformationText class="mt-9">
            Votre sentier viens d’être ajouté à la carte des sentiers culturels vaudois.
        </InformationText>
        <InformationText class="mt-4">
            Merci de votre contribution.
        </InformationText>
        <div class="mt-auto w-full">
            <PrimaryButton class="mt-8" style="width: 100%;" @click="router.get(`/map/${props.pathId}`)">Voir sur la carte</PrimaryButton>
            <SecondaryButton class="mt-4 justify-center w-full" @click="router.get('/dashboard')">Retourner sur mon profil</SecondaryButton>
        </div>
    </NewPathLayout>
</template>

<style scoped>
.success-frame {
    background-image: url('data:image/svg+xml,<svg width="360" height="640" viewBox="0 0 360 640" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M419.449 413.994C459.3 352.045 436.313 292.267 420.198 269.554L406.178 260.646C420.113 288.079 442.153 355.802 396.666 399.519C351.178 443.236 106.636 514.638 -9.94875 544.874L-92.8491 661.803C61.3124 605.012 379.598 475.943 419.449 413.994Z" fill="%23FFEED6"/><path d="M294.299 -40.1397C334.15 -102.089 311.162 -161.867 295.048 -184.58L281.027 -193.488C294.963 -166.055 317.003 -98.3321 271.515 -54.6149C226.028 -10.8977 -18.514 60.504 -135.099 90.7401L-217.999 207.67C-63.838 150.879 254.448 21.8094 294.299 -40.1397Z" fill="%23FFEED6"/><path d="M102.012 169.926C184.892 98.5705 304.743 61.406 354.308 51H401.842C392.498 51 344.314 67.3523 201.955 138.708C59.5966 210.064 165.39 218.983 236.082 214.523C565.164 233.849 403.061 370.614 331.15 406.292C273.622 434.834 24.4133 476.657 -93 494V386.966C23.1945 369.623 270.697 327.801 331.15 299.258C391.604 270.716 292.96 254.661 236.082 250.201C156.859 253.174 19.1316 241.282 102.012 169.926Z" fill="%23B5F9BB"/></svg>');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
</style>
