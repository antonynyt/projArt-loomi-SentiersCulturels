<script setup>

import {ref} from 'vue';
import { Head, usePage } from '@inertiajs/vue3';
import ContentLayout from '@/Layouts/ContentLayout.vue';
import AppElementCard from '@/Components/App/AppElementCard.vue';
import TheHeader from '@/Components/App/TheHeader.vue';

const { props } = usePage();

const etapes = ref(props.path);

console.log("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa");
console.log(etapes.value);
console.log("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa");

</script>

<template>
    <Head>
        <title>Etapes</title>
    </Head>

    <ContentLayout>
        <TheHeader title="Etapes" class="mb-8"/>

        <div>
            <AppElementCard class="mb-3"
                v-for="(etape) in etapes.pois"
                :title="etape.adress_label"
            />
            <div></div>
        </div>
    </ContentLayout>

    <!-- :infos.distance="favorite.path.distance" -->
    
</template>

:thumbnail="etape.thumbnail"
:location="etape.location"
:href="'sentier/' + etape.path_id"
:infos="{
    distance: etape.path.distance,
    duration: etape.path.duration,
    ascent: etape.path.ascent
}"