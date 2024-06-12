<script setup>
import { Head, usePage } from '@inertiajs/vue3';
import ContentLayout from '@/Layouts/ContentLayout.vue';
import TheHeader from '@/Components/App/TheHeader.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Headline from '@/Components/App/Text/Headline.vue';
import Text from '@/Components/App/Text/Text.vue';
import ImpactText from '@/Components/App/Text/ImpactText.vue';
import InformationText from '@/Components/App/Text/InformationText.vue';
import QuizzButton from '@/Components/App/Button/QuizzButton.vue';
import { router } from "@inertiajs/vue3";
import RadioButton from '@/Components/App/Button/RadioButton.vue';

</script>



<template>
    <Head>
        <title>Quizz</title>
    </Head>
    <ContentLayout>
        <TheHeader title="Quizz" class="mb-8"/>
        <main>
            <section class="flex flex-col mb-8">
                <ImpactText class="impact-l">Quel est ton sentier parfait ? Déterminons-le !</ImpactText>
            </section>
            <div class="mb-12">
                <InformationText class="information-l mb-3.5">Comment te sens-tu aujourd’hui ?</InformationText>
                <div class="flex flex-wrap gap-2 mb-2">
                    <RadioButton id="aventureux" name="feel">Aventureux</RadioButton>
                    <RadioButton id="morose" name="feel">Morose</RadioButton>
                    <RadioButton id="reveur" name="feel">Rêveur</RadioButton>
                    <RadioButton id="nostalgique" name="feel">Nostalgique</RadioButton>
                    <RadioButton id="euphorique" name="feel">Euphorique</RadioButton>
                </div>
            </div>
            <div class="mb-12">
                <InformationText class="information-l mb-3.5">Quel est ton niveau de forme physique ?</InformationText>
                <div class="flex flex-wrap gap-2 mb-2">
                    <RadioButton id="reduite" name="forme">Réduite</RadioButton>
                    <RadioButton id="flemmard" name="forme">Flemmard</RadioButton>
                    <RadioButton id="actif" name="forme">Actif</RadioButton>
                    <RadioButton id="athlete" name="forme">Athlète d'élite</RadioButton>
                </div>
            </div>
            <div class="mb-12">
                <InformationText class="information-l mb-3.5">Quel type de paysage te fais rêver ?</InformationText>
                <div class="flex flex-wrap gap-2 mb-2">
                    <RadioButton id="urbain" name="reve">Urbain</RadioButton>
                    <RadioButton id="nature" name="reve">Nature</RadioButton>
                    <RadioButton id="lac" name="reve">Bord du lac</RadioButton>
                    <RadioButton id="chateau" name="reve">Château</RadioButton>
                    <RadioButton id="interieurs" name="reve">Les intérieurs</RadioButton>
                </div>
            </div>
            <div class="mb-8">
                <InformationText class="information-l mb-3.5">Quelle est la durée idéale d’une escapade selon toi?</InformationText>
                <div class="flex flex-wrap gap-2 mb-2">
                    <RadioButton id="minutes" name="duree">En minutes</RadioButton>
                    <RadioButton id="heures" name="duree">En heures</RadioButton>
                    <RadioButton id="journee" name="duree">Une journée</RadioButton>
                </div>
            </div>
            <div class="flex">
                <PrimaryButton @click="router.visit(`/quizz/reponse`)" class="grow">Découvrir mon sentier</PrimaryButton>
            </div>
        </main>
    </ContentLayout>
</template>