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
                glasses: "#1E1E1E",
                darkGray: "#0E0E0E",
                lightGray: "#27292C",
            },
            animation: {
                "loop-scroll" : "loop-scroll 10s linear infinite"
            },
            keyframes: {
                "loop-scroll" : {
                    from : {transform : "translateX(0)"},
                    to : {transform : "translateX(-100%)"},
                }
            }
            
        },
    },
    plugins: [require("preline/plugin")],
};
