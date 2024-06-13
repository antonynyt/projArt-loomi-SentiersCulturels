<script setup>
import { ref, computed, defineEmits, onMounted } from "vue";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue'

const props = defineProps({
    accept: {
        type: String,
        required: true,
    },
    capture: {
        type: String,
        default: null,
    },
});

const encodeFile = defineModel({
    prop: "file",
    event: "update:file",
});

//const emit = defineEmits(["file-uploaded"]);

const file = ref(null);
const fileName = computed(() => file.value?.name);
const fileExtension = computed(() => fileName.value?.substr(fileName.value?.lastIndexOf(".") + 1));
const fileMimeType = computed(() => file.value?.type);

let fileInput = null;

onMounted(() => {
    fileInput = document.createElement("input");
    fileInput.type = "file";
    if (props.capture)
        fileInput.capture = props.capture;
    fileInput.accept = props.accept;
    fileInput.onchange = uploadFile;
    fileInput.style.display = "none";
})

const uploadFile = async (event) => {
    if (!event.target.files.length){
        file.value = 'undefined';
        encodeFile.value = '';
        return;
    }
    file.value = event.target.files[0];
    const reader = new FileReader();
    reader.readAsDataURL(file.value);
    reader.onload = async () => {
        //emit("file-uploaded", reader.result);
        encodeFile.value = reader.result;
    };
};
</script>

<template>
    <div class="flex">
        <TextInput readonly v-model="fileName" class="w-full rounded-e-none me-[-0.75rem]"></TextInput>
        <PrimaryButton @click.prevent="fileInput.click()" size="xs" class="rounded-xl" style="height: 2.75rem;" >
            <span v-if="fileName">Changer de fichier</span>
            <span v-else>Choisir un fichier</span>
        </PrimaryButton>
    </div>
</template>
