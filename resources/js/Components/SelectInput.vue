<script setup>
import { ref } from 'vue'

const selected = ref('')

const props = defineProps({
  options: {
    type: Array,
    default: [
        { text: 'A', value: 'a'},
        { text: 'B', value: 'b', disabled: true},
        { text: 'C', value: 'c', disabled: false, selected: true},
    ]
  },
  placeholder: {
    type: String,
    default: 'Sélectionner une option'
  }
})
let asDefault = false;
props.options.forEach(option => {
    if (option.selected) {
        asDefault = true;
    }
})
</script>

<template>
    <select v-model="selected" class="border-back focus:border-midnight-blue focus:ring-midnight-blue rounded-2xl shadow-sm">
        <option disabled value="">{{ props.placeholder }}</option>
        <option
            v-for="option in props.options"
            :value="option.value"
            :disabled ="option.disabled"
            :selected="option.selected"
        >
            {{ option.text }}
        </option>
    </select>
</template>

<style scoped>

</style>
