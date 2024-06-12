<script setup>
import { ref, computed } from 'vue';

const props = defineProps({
    quiz: {
        type: Object,
        required: true,
    }
});

// Function to shuffle an array
const shuffleArray = (array) => {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
};

// Shuffle the answers array
const shuffledAnswers = shuffleArray([...props.quiz.answers]);

// Array to track the state of each button
const buttonStates = ref([]);

// Initialize button states
for (let i = 0; i < shuffledAnswers.length; i++) {
    buttonStates.value.push({
        isSelected: false,
        isCorrect: shuffledAnswers[i].is_correct === 1
    });
}

const checkAnswer = (index) => {
    if (!buttonStates.value[index].isSelected) {
        buttonStates.value[index].isSelected = true;
        if (!buttonStates.value[index].isCorrect) {
            // If incorrect, find the correct answer and mark it as green
            const correctIndex = buttonStates.value.findIndex(button => button.isCorrect);
            buttonStates.value[correctIndex].isSelected = true;
        }
    }
};

const areButtonsDisabled = computed(() => buttonStates.value.some(button => button.isSelected));

// Determine button color based on correctness
const buttonColor = (index) => {
    if (buttonStates.value[index].isSelected) {
        if (buttonStates.value[index].isCorrect) {
            return 'bg-green text-midnight-blue';
        } else {
            return 'bg-red';
        }
    }
    return '';
};

</script>

<template>
    <div class="flex flex-col py-8 px-7 bg-purple text-off-white rounded-2xl">
        <h2 class="text-white mb-8 font-bold">{{ quiz.question }}</h2>
        <div class="flex flex-col gap-3 w-full">
            <button v-for="(answer, index) in shuffledAnswers" :key="answer.id" @click="checkAnswer(index)"
                :disabled="areButtonsDisabled"
                class="inline-flex items-center justify-center px-4 py-2 border border-1 rounded-full text-md"
                :class="[buttonColor(index)]">
                {{ answer.answer }}
            </button>
        </div>
    </div>
</template>
