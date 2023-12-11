/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
    theme: {
        container: {
            center: true,
            padding: '1rem'
        },
        extend: {
            colors: {
                primary: '#3b82f6',
                secondary: '#797A7B'
            },
            fontFamily: {
                poppins: ['poppins']
            }
        },
    },
    plugins: [],
}
