/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/js/**/*.vue",
    ],
    theme: {
        extend: {},
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
}
