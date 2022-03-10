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
		extend: {
			colors: {
				'logo-yellow' : '#f6e851',
				'logo-red' : '#e33b35',
			},
			backgroundImage: theme => ({
				'logo':"url('/img/main2.png')",
				'hand-grass': "url('/img/solid1.jpg')",
				'hand-plain': "url('/img/solid2.lpg')",
				})
		},
	},
	plugins: [],
}