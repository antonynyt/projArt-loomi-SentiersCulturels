<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import TheHeader from "@/Components/App/TheHeader.vue";

const form = useForm({
    pseudo: "",
    firstname: "",
    lastname: "",
    email: "",
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <TheHeader title="Créer un compte" class="mb-8" />

        <div class="mb-4 text-sm text-gray-600">
            Créer un compte te permettras de gérer tes favoris, voir tes progrès
            et écrire des commentaires.
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="pseudo" value="Nom d'utilisateur" />

                <TextInput
                    id="pseudo"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.pseudo"
                    required
                    autofocus
                    autocomplete="pseudo"
                />

                <InputError class="mt-2" :message="form.errors.pseudo" />
            </div>
            <div class="mt-4">
                <InputLabel for="firstname" value="Prénom" />

                <TextInput
                    id="firstname"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.firstname"
                    required
                    autofocus
                    autocomplete="firstname"
                />

                <InputError class="mt-2" :message="form.errors.firstname" />
            </div>
            <div class="mt-4">
                <InputLabel for="lastname" value="Nom" />

                <TextInput
                    id="lastname"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.lastname"
                    required
                    autofocus
                    autocomplete="lastname"
                />

                <InputError class="mt-2" :message="form.errors.lastname" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Mot de passe" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel
                    for="password_confirmation"
                    value="Confirmer le mot de passe"
                />

                <TextInput
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <InputError
                    class="mt-2"
                    :message="form.errors.password_confirmation"
                />
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link
                    :href="route('login')"
                    class="
                        underline
                        text-sm text-purple
                        hover:text-gray-900
                        rounded-md
                        focus:outline-none
                        focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500
                    "
                >
                    Déjà un compte? Connecte-toi ici.
                </Link>

                <PrimaryButton
                    class="ms-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Créer mon compte
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
