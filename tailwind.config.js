module.exports = {
  purge: [],
  theme: {
  	fontFamily: {
  		'sans': ['Helvetica Neue', 'Helvetica', 'Arial', 'sans-serif'],
  		'serif': ['Besley', 'Cambria', 'serif'],
  		'mono': ['Courier New', 'Courier', 'Menlo', 'monospace'],
  	},
    screens: {
      'xs': '324px',
      // => @media (min-width: 324px) { ... }

      'sm': '640px',
      // => @media (min-width: 640px) { ... }

      'md': '768px',
      // => @media (min-width: 768px) { ... }

      'lg': '1024px',
      // => @media (min-width: 1024px) { ... }

      'xl': '1280px',
      // => @media (min-width: 1280px) { ... }
    },
    extend: {
      cursor: {
        'help': 'help',
        'crosshair': 'crosshair',
      },
      spacing: {
        '72': '18rem',
        '80': '20rem',
        '88': '22rem',
        '96': '24rem',
        '104': '26rem',
        '112': '28rem',
        '120': '30rem',
        '128': '32rem',
        '136': '34rem',
        '144': '36rem',
      },
      height: {
        'inherit': 'inherit',
      },
      maxWidth: {
        'screen-2xl': '1536px',
      }
    },
  },
  variants: {
    borderStyle: ['responsive', 'hover'],
  },
  plugins: [],
}
