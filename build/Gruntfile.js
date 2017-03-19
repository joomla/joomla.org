module.exports = function(grunt) {
	// Project configuration.
	grunt.initConfig({
		concat: {
			options: {
				separator: ';',
			},
			dist: {
				src: ['node_modules/jquery-countto/jquery.countTo.js', 'node_modules/scrollmagic/scrollmagic/uncompressed/ScrollMagic.js', 'js/countup.js'],
				dest: '../templates/joomla/js/countup.js',
			},
		},

		// Minimize some javascript files
		uglify: {
			allJs: {
				files: [
					{
						src: [
							'../templates/joomla/js/countup.js',
						],
						dest: '',
						expand: true,
						ext: '.min.js'
					}
				]
			}
		},
	});

	// Load required modules
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-concat');

	grunt.registerTask('default',
		[
			'concat:dist',
			'uglify:allJs',
		]
	);
};
