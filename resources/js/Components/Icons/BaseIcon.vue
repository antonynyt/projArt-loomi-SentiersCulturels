<script setup>
import { ref, computed } from 'vue';

// Define SVG paths for each icon
const iconPaths = {
    home: {
        outlined: "M6 19H9.34625V13.0577H14.6538V19H18V9.99999L12 5.48074L6 9.99999V19ZM4.5 20.5V9.24999L12 3.60574L19.5 9.24999V20.5H13.1538V14.5577H10.8463V20.5H4.5Z",
        filled: "M9.77143 0.5L0 7.5V21H7.05714V13H13.0286V21.5H19V7L9.77143 0.5Z"
    },
};

// Props definition remains the same
const props = defineProps({
    icon: {
        type: String,
        required: true,
    },
    filled: {
        type: Boolean,
        default: false,
    },
});

// Computed property to get the path data for the current icon
const getPathData = computed(() => {
    return iconPaths[props.icon][props.filled ? "filled" : "outlined"];
});
</script>

<template>
  <svg :class="['w-6 h-6', {'text-gray-500':!filled, 'dark:text-gray-400':!filled, 'group-hover:text-blue-600': filled, 'dark:group-hover:text-blue-500': filled}]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
    <path :d="getPathData" />
  </svg>
</template>