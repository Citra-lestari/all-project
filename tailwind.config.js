/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./src/**/*.{html,js}"],
    theme: {
        extend: {
            screens: {
                'xs': '300px',  //hp
                'sm': '640px', //tablet
                'md': '768px', //small laptop and tablet landscape
                'lg': '1024px', //laptop
                'xl': '1280px', //desktop
                '2xl': '1536px', //large desktop
                // '3xl': '1700px', 
                // '4xl': '2000px',
            },
            colors: {
                'whiteText': '#FCFCFC',
                'primary': '#453627',
                'brownHover': '#684F36',
                'blueStar': '#0D5EA6',
                'blackAll': '#222222',
                'whiteBrown': '#F6F1EE',
                'bgWhite': '#FAFAFA',
                'whitebg' : '#F5F5F5',
            },
            fontFamily: {
                'poppins': ['Poppins'],
            }
        },
    },
    plugins: [],
};
