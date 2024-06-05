<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import TheHeader from "@/Components/App/TheHeader.vue";
import ContentLayout from "@/Layouts/ContentLayout.vue";
import { Link, useForm, usePage } from "@inertiajs/vue3";
const user = usePage().props.auth.user;
</script>

<template>
    <Head title="Dashboard" />
    <DefaultLayout>
        <ContentLayout
            ><TheHeader title="Dashboard" class="mb-8" />
            <AuthenticatedLayout>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="overflow-hidden sm:rounded-lg">
                            <div class="w-[323px] text-[22px]">
                                Bonjour, {{ user.firstname }} !
                            </div>
                        </div>
                    </div>
                </div>
            </AuthenticatedLayout>
        </ContentLayout>
    </DefaultLayout>
</template>
