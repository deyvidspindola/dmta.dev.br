/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./*.html', './assets/js/**/*.js'],
  theme: {
    extend: {
      colors: {
        graphite: '#12151C',
        'graphite-card': '#1B1F29',
        mist: '#8B93A6',
        bone: '#F3F4F7',
        signal: '#FF9A3C',
        circuit: '#4C7EFF',
      },
      fontFamily: {
        display: ['"Space Grotesk"', 'system-ui', 'sans-serif'],
        sans: ['Inter', 'system-ui', 'sans-serif'],
        mono: ['"JetBrains Mono"', 'ui-monospace', 'monospace'],
      },
      letterSpacing: {
        tighter: '-0.03em',
      },
      maxWidth: {
        site: '72rem',
      },
    },
  },
  plugins: [],
};
