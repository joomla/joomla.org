module.exports = function(grunt) {
    grunt.initConfig({
        concat: {
            options: {
                separator: ';',
            },
            dist: {
                src: [
                    'node_modules/jquery-countto/jquery.countTo.js',
                    'node_modules/scrollmagic/scrollmagic/uncompressed/ScrollMagic.js',
                    'js/countup.js',
                ],
                dest: '../templates/joomla/js/countup.js',
            },
        },
        uglify: {
            options: {
                compress: {
                    drop_console: true,
                },
            },
            allJs: {
                files: [{
                    expand: true,
                    src: ['../templates/joomla/js/countup.js'],
                    ext: '.min.js',
                }],
            },
        },
    });

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    grunt.registerTask('default', ['concat:dist', 'uglify:allJs']);
};

