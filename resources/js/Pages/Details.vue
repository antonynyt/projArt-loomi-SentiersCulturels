<script setup>
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import ContentLayout from '@/Layouts/ContentLayout.vue';
import TheHeader from '@/Components/App/TheHeader.vue';

const props = defineProps({
    pathInfos: {
        type: Object,
    }
});

</script>

<template>

    <Head>
        <title>Details</title>
    </Head>

    <ContentLayout>
        <template #img>
            <nav>
                <button @click="back" class="text-white bg-midnight-blue px-4 py-2 rounded-full">Retour</button>
            </nav>
            <img :src="pathInfos.thumbnail" alt="hero" class="w-full h-60 object-cover object-center" />
        </template>
        <TheHeader :title="pathInfos.title" class="mb-8" />
        <main>
            <p>
                {{ pathInfos.description }}
            </p>
        </main>

    </ContentLayout>
</template>