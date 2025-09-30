/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./src/**/*.{html,js}"],
    theme: {
        extend: {
            screens: {
                'xs': '300px',
                'sm': '640px',
                'md': '768px',
                'lg': '1024px',
                'xl': '1280px',
                '2xl': '1536px',
                '3xl': '1700px',
                '4xl': '2000px',
            },
            colors: {
                'white': '#F8F8F8',
                'primary': '#2C7BD8',
                'secondary': '#7ED6DF',
                'black': '#222222',
            },
            fontFamily: {
                'pop': ['Poppins'],
                'open': ['Open Sans'],
            },
        },
    },
    plugins: [],
};
