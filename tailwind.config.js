/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "node_modules/preline/dist/*.js",
    ],
    theme: {
        container: {
            center: true,
        },
        extend: {
            backgroundColor: {
                glass: "#1E1E1E",
                darkGray: "#0E0E0E",
                lightGray: "#27292C",
            },
            
        },
    },
    plugins: [require("preline/plugin")],
};
