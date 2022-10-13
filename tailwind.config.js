module.exports = {
  content: ["./resources/**/*.blade.php"],
  darkMode: 'media',
  theme: {
    screens: {
      'xs': '375px',
      'sm': '540px',
      'md': '720px',
      'lg': '960px',
      'xl': '1140px',
      '2xl': '1550px',
    },
    container: {
      center: true,
      padding: '20px',
    },
    fontFamily: {
      'sans': ['Gilroy', 'sans-serif'],
    },
    fontSize: {
      'xxs': ['14px', '1.6em'],
      'xs': ['16px', '1.6em'],
      'sm': ['18px', '1.6em'],
      'md': ['20px', '1.45em'],
      'lg': ['26px', '1.3em'],
      'xl': ['36px', '1.3em'],
      '2xl': ['64px', '1.1em'],
      '3xl': ['96px', '1.1em'],
    },
    extend: {
      colors: {
        white: "#FFF",
        purple: "#7843E9",
        pink: "#EC4176",
        dark: "#222",
        gray: "#454545",
        darkblue: "#1E1F43",
				body: '#BDBECA',
				card: '#323359',
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [
		require('@tailwindcss/line-clamp'),
	],
}
