<template>
    <h1 v-if="rank.toLowerCase()==='h1'" class="title" :class="`title-${type.toLowerCase()}`">{{ content }}</h1>
    <h2 v-if="rank.toLowerCase()==='h2'" class="title" :class="`title-${type.toLowerCase()}`">{{ content }}</h2>
    <h3 v-if="rank.toLowerCase()==='h3'" class="title" :class="`title-${type.toLowerCase()}`">{{ content }}</h3>
    <h4 v-if="rank.toLowerCase()==='h4'" class="title" :class="`title-${type.toLowerCase()}`">{{ content }}</h4>
    <h5 v-if="rank.toLowerCase()==='h5'" class="title" :class="`title-${type.toLowerCase()}`">{{ content }}</h5>
    <h6 v-if="rank.toLowerCase()==='h6'" class="title" :class="`title-${type.toLowerCase()}`">{{ content }}</h6>
</template>

<script setup>
    const props = defineProps({
        content: {
            type: String,
            required: true,
        },
        rank: {
            type: String,
            default: 'h1',
        },
        type: {
            type: String,
            default: 'm',
        },
    });
</script>

<style scoped>
.title{
    width: 100%;
    font-family: PP Agrandir Variable;
    text-transform: uppercase;
    word-wrap: break-word;

}
.title-s {
    font-size: 16px;
    font-weight: 617;
}
.title-ms {
    font-size: 18px;
    font-weight: 617;
}
.title-m {
    font-size: 22px;
    font-weight: 617;
}
.title-l {
    font-size: 28px;
    font-weight: 767;
}
.title-xl {
    font-size: 32px;
    font-weight: 767;
}
.title-explorer {
    font-size: 20px;
    font-weight: 469;
}
.title-post {
    font-size: 32px;
    font-weight: 617;
}
</style>
