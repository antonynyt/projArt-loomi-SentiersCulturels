<!-- <template>
    <div class="text-midnight-blue">
        <h1 v-if="rank.toLowerCase()==='h1'" class=" title" :class="`title-${type.toLowerCase()}`"><slot></slot></h1>
        <h2 v-if="rank.toLowerCase()==='h2'" class=" title" :class="`title-${type.toLowerCase()}`"><slot></slot></h2>
        <h3 v-if="rank.toLowerCase()==='h3'" class=" title" :class="`title-${type.toLowerCase()}`"><slot></slot></h3>
        <h4 v-if="rank.toLowerCase()==='h4'" class=" title" :class="`title-${type.toLowerCase()}`"><slot></slot></h4>
        <h5 v-if="rank.toLowerCase()==='h5'" class=" title" :class="`title-${type.toLowerCase()}`"><slot></slot></h5>
        <h6 v-if="rank.toLowerCase()==='h6'" class=" title" :class="`title-${type.toLowerCase()}`"><slot></slot></h6>
    </div>
</template> -->

<template>
    <div :class="['title', `title-${type.toLowerCase()}`, $attrs.class]" :style="$attrs.style">
        <slot></slot>
    </div>
</template>

<script setup>
    const props = defineProps({
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
    text-transform: uppercase;
    word-wrap: break-word;
}
.title-s {
    font-size: 1rem;
    font-weight: 617;
}
.title-ms {
    font-size: 1.125rem;
    font-weight: 617;
}
.title-m {
    font-size: 1.375rem;
    font-weight: 617;
}
.title-l {
    font-size: 1.75rem;
    font-weight: 767;
}
.title-xl {
    font-size: 2rem;
    font-weight: 767;
}
.title-explorer {
    font-size: 1.25rem;
    font-weight: 469;
}
.title-post {
    font-size: 3rem;
    font-weight: 617;
}
</style>
