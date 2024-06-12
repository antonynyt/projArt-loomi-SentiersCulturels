<script setup>
import { onMounted, ref, watch } from 'vue';
import { defineModel, defineExpose } from 'vue';
import Text from '@/Components/App/Text/Text.vue';

const model = defineModel({
    type: String,
    required: true,
});

const props = defineProps({
    rows: {
        type: Number,
        default: 6,
    },
    length: {
        type: Number,
        default: 3000,
    },
});

const input = ref(null);
const rows = ref(props.rows);
const myTextArea = ref(null);
const lastModelValue = ref(0);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });

watch(model, () => {
    if (!model.value.length){
        rows.value = props.rows;
        return;
    }
    // console.log(lastModelValue.value);
    // console.log(model.value.length);
    // if(model.value.length > lastModelValue.value)
    //     lastModelValue.value = model.value.length;
    // if(lastModelValue.value > model.value.length + 80){
    //     lastModelValue.value = model.value.length;
    //     rows.value = INITIAL_ROWS;
    // }
    myTextArea.value = document.querySelector('.textarea');
    const styles = window.getComputedStyle(myTextArea.value);
    const paddingTop = parseInt(styles.paddingTop);
    const paddingBottom = parseInt(styles.paddingBottom);
    const padding = paddingTop + paddingBottom;
    const currentHeight = parseInt(styles.height) - padding;
    const initialHeight = (parseInt(styles.height) - padding) / rows.value;
    const scrollHeight = myTextArea.value.scrollHeight - padding;
    const newRows = Math.ceil(scrollHeight / initialHeight);
    rows.value = newRows;
});
</script>

<template>
    <div class="flex flex-col">
        <textarea
            class="textarea border-back focus:border-midnight-blue focus:ring-midnight-blue rounded-2xl shadow-sm"
            v-model="model"
            ref="input"
            :rows="rows"
            cols="40"
        ></textarea>
        <Text class="self-end" :class="{'text-red':model.length>props.length}">{{ model.length }}/{{props.length}}</Text>
    </div>

</template>
