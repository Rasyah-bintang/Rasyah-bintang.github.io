/** @type {import('tailwindcss').Config} */
module.exports = {
  prefix: "tw-", // Semua class harus pake prefix tw-
  corePlugins: {
    preflight: false, // Matikan reset CSS Tailwind
  },
  content: ["./*.{html,js}"], // Sesuaikan dengan struktur file kamu
  theme: {
    extend: {},
  },
  plugins: [],
};
