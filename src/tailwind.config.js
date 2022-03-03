module.exports = {
	mode: 'jit',
	purge: [
		'/resources/**/*.blade.php',
		'./resources/views/layout/*.blade.php',
   
	  ],
	content: ['./storage/framework/views/*.php',
		'./resources/views/layout/*.blade.php',
		'./resources/**/*.blade.php',
		'./resources/**/*.js',
		'./resources/**/*.vue',],
	theme: {
		extend: {},
	},
	plugins: [],
}