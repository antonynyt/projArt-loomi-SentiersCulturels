<script setup>
import { ref } from "vue";

const props = defineProps({
    badge: {
        type: Object,
        required: true,
    },
    isVisible: {
        type: Boolean,
        required: true,
    },
});

const emits = defineEmits(["close"]);

const closeOverlay = () => {
    emits("close");
};
</script>

<template>
    <div
        v-if="isVisible"
        class="
            fixed
            inset-0
            flex
            items-center
            justify-center
            bg-black bg-opacity-50
        "
    >
        <div class="bg-off-white py-16 px-10 rounded-lg shadow-lg relative">
            <button
                @click="closeOverlay"
                class="text-sm absolute top-4 right-4 flex flex-row"
            >
                <div class="self-center">Fermer</div>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="26"
                    height="24"
                    viewBox="0 0 26 24"
                    fill="none"
                >
                    <path
                        d="M7.54974 6.96888C7.62521 6.89903 7.71487 6.84362 7.81358 6.80581C7.91229 6.768 8.01812 6.74854 8.12499 6.74854C8.23186 6.74854 8.33768 6.768 8.43639 6.80581C8.5351 6.84362 8.62476 6.89903 8.70024 6.96888L13 10.9394L17.2997 6.96888C17.3753 6.89914 17.465 6.84383 17.5637 6.80609C17.6624 6.76835 17.7682 6.74893 17.875 6.74893C17.9818 6.74893 18.0876 6.76835 18.1863 6.80609C18.285 6.84383 18.3747 6.89914 18.4502 6.96888C18.5258 7.03861 18.5857 7.12139 18.6266 7.2125C18.6675 7.30361 18.6885 7.40126 18.6885 7.49988C18.6885 7.59849 18.6675 7.69614 18.6266 7.78725C18.5857 7.87836 18.5258 7.96114 18.4502 8.03088L14.1489 11.9999L18.4502 15.9689C18.5258 16.0386 18.5857 16.1214 18.6266 16.2125C18.6675 16.3036 18.6885 16.4013 18.6885 16.4999C18.6885 16.5985 18.6675 16.6961 18.6266 16.7873C18.5857 16.8784 18.5258 16.9611 18.4502 17.0309C18.3747 17.1006 18.285 17.1559 18.1863 17.1937C18.0876 17.2314 17.9818 17.2508 17.875 17.2508C17.7682 17.2508 17.6624 17.2314 17.5637 17.1937C17.465 17.1559 17.3753 17.1006 17.2997 17.0309L13 13.0604L8.70024 17.0309C8.62469 17.1006 8.53501 17.1559 8.43631 17.1937C8.33761 17.2314 8.23182 17.2508 8.12499 17.2508C8.01815 17.2508 7.91237 17.2314 7.81366 17.1937C7.71496 17.1559 7.62528 17.1006 7.54974 17.0309C7.47419 16.9611 7.41427 16.8784 7.37339 16.7873C7.3325 16.6961 7.31146 16.5985 7.31146 16.4999C7.31146 16.4013 7.3325 16.3036 7.37339 16.2125C7.41427 16.1214 7.47419 16.0386 7.54974 15.9689L11.8511 11.9999L7.54974 8.03088C7.47407 7.96121 7.41404 7.87844 7.37308 7.78733C7.33212 7.69621 7.31104 7.59853 7.31104 7.49988C7.31104 7.40122 7.33212 7.30354 7.37308 7.21243C7.41404 7.12131 7.47407 7.03854 7.54974 6.96888Z"
                        fill="#101720"
                    />
                </svg>
            </button>
            <img
                :src="badge.image"
                alt="Badge Image"
                class="mx-auto mb-8 h-24"
            />
            <div class="flex flex-col">
                <h2 class="text-xl font-semibold mb-4 self-center">
                    {{ badge.title }}
                </h2>
                <p class="self-center">{{ badge.descr }}</p>
            </div>
        </div>
    </div>
</template>
