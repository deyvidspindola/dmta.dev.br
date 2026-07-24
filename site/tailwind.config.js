/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./*.html', './assets/js/**/*.js'],
  theme: {
    extend: {
      colors: {
        paper: '#F7F7FA',
        'paper-card': '#FFFFFF',
        ink: '#12151C',
        mist: '#5B6472',
        signal: '#FF7A2E',
        circuit: '#2A4CE0',
        pulse: '#0EA37A',
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
