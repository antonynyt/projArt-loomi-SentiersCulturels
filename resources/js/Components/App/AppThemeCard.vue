<script setup>
const props = defineProps({
    image: {
        type: String,
        required: true,
    },
    title: {
        type: String,
        required: true,
    },
    href: {
        type: String,
        required: true,
    },
    location: {
        type: String,
        required: true,
    },
    coordinates: {
        type: Array,
        required: false,
    },
    infos: {
        type: Object,
        required: false,
        distance: {
            type: String,
            required: true,
        },
        duration: {
            type: String,
            required: true,
        },
        ascent: {
            type: String,
            required: true,
        },
    },
    type: {
        type: String,
        required: true,
    },
});
</script>
<template>
    <div
        class="
            mt-3
            px-6
            py-4
            border border-midnight-blue
            rounded-lg
            overflow-hidden
        "
    >
        <a :href="props.href">
            <div class="flex flex-row gap-2">
                <img width="18" height="19" :src="props.image" />
                <ImpactText>Sentier Histoire</ImpactText>
            </div>
            <div class="flex flex-row">
                <div class="w-full bg-grey rounded-full h-2 self-center">
                    <div
                        class="bg-green h-2 rounded-full self-center"
                        :style="{ width: progressWidth }"
                    ></div>
                </div>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="29"
                    height="29"
                    viewBox="0 0 29 29"
                    fill="none"
                    class="progress-circle-container"
                >
                    <ellipse
                        cx="14.9131"
                        cy="14.5"
                        rx="14.087"
                        ry="14.5"
                        :class="{
                            'fill-midnight-blue': isComplete,
                            'fill-grey': !isComplete,
                        }"
                    />
                    <path
                        d="M14.911 18.5876L18.7066 20.8129C19.4017 21.2207 20.2522 20.6178 20.0693 19.8554L19.0633 15.6709L22.4198 12.8518C23.0326 12.3376 22.7033 11.3624 21.8985 11.3003L17.481 10.9369L15.7525 6.98291C15.4415 6.26481 14.3806 6.26481 14.0696 6.98291L12.3411 10.928L7.9236 11.2915C7.11876 11.3535 6.78951 12.3287 7.40228 12.8429L10.7588 15.6621L9.75277 19.8465C9.56986 20.6089 10.4204 21.2118 11.1155 20.804L14.911 18.5876Z"
                        fill="white"
                    />
                </svg>
            </div>
            <div class="flex text-sm">
                <ImpactText type="s" class="self-center pr-1">{{
                    finishedPaths.length
                }}</ImpactText>
                complétés sur
                <ImpactText type="s" class="self-center pl-1">{{
                    pathCount
                }}</ImpactText>
            </div>
        </a>
    </div>
</template>
