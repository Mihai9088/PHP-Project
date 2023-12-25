/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./dist/*.{html,js,php}", "./dist/partials/**/*.{html,js,php}"],
  theme: {
    extend: {
      backgroundColor: {
        bg: "#5eead4",
        bg2: "#A7ECEE",
        footerbg: "#FFEEBB",
      },
    },
  },
  plugins: [],
};
