import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        extend: {
            colors: {
                "off-white": "#FAF9F6",
                "midnight-blue": "#101720",
                green: "#B5F9BB",
                blue: "#B5F5F9",
                beige: "#FFEED6",
                purple: "#9747FF",
                red: "#E95D5D",
                grey: "#C1C9D2",
                tradition: "#FF8188",
                transport: "#9EA6F0",
                science: "#FFD967",
                musique: "#FFC4E8",
                gastronomie: "#B4DBCD",
                religion: "#BB9F85",
                sport: "#F9B06B",
                nature: "#C7E1B3",
                histoire: "#F1CAC9",
                art: "#E3B9F7",
                architecture: "#B5E0FF",
                'green_validation': '#41D350'
            },
            fontWeight: {
                light: '400',
                normal: '460',
            },
            fontFamily: {
                sans: ["PPAvenir", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
