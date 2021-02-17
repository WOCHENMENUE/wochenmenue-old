module.exports = {
	plugins: [
		require('postcss-import'),
		require('tailwindcss'),
		require('postcss-url'),
		require('postcss-nested'),
		require('autoprefixer'),
		require('cssnano'),
	]
}