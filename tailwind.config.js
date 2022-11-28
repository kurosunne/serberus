/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        './resources/**/*.js'
    ],
    theme: {
        extend: {},
    },
    daisyui: {
        themes: [
            {
                mytheme: {
                    "primary": "#FFB034",
                    "secondary": "#077CC3",
                    "accent": "#EA697C",
                    "neutral": "#000000",
                    "base-100": "#F4EFF5",
                    "info": "#3194F6",
                    "success": "#5EC992",
                    "warning": "#F7E02B",
                    "error": "#E60400",
                },
            },
        ],
    },
    plugins: [
        require('daisyui')
    ],
}
