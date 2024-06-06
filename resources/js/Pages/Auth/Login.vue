<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import TheHeader from "@/Components/App/TheHeader.vue";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    pseudo: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Connexion" />

        <TheHeader title="Connexion" class="mb-8" />

        <div class="mb-1 text-sm text-gray-600">
            Connecte toi pour retrouver ton espace personnel.
        </div>

        <Link
            :href="route('register')"
            class="
                underline
                text-sm text-purple
                hover:text-gray-900
                rounded-md
                focus:outline-none
                focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500
            "
        >
            Tu n'a pas de compte? Inscris-toi ici.
        </Link>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="mt-5">
            <div>
                <InputLabel for="pseudo" value="Nom d'utilisateur" />

                <TextInput
                    id="pseudo"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.pseudo"
                    required
                    autofocus
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.pseudo" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Mot de passe" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ms-2 text-sm text-gray-600"
                        >Se souvenir de moi</span
                    >
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="
                        underline
                        text-sm text-gray-600
                        hover:text-gray-900
                        rounded-md
                        focus:outline-none
                        focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500
                    "
                >
                    Mot de passe oublié?
                </Link>

                <PrimaryButton
                    class="ms-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Se connecter
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
