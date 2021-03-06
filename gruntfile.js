'use strict';
module.exports = function(grunt) {

    grunt.initConfig({

        // let us know if our JS is sound
        jshint: {
            options: {
                "bitwise": true,
                "browser": true,
                "curly": true,
                "eqeqeq": true,
                "eqnull": true,
                "es5": true,
                "esnext": true,
                "immed": true,
                "jquery": true,
                "latedef": true,
                "newcap": true,
                "noarg": true,
                "node": true,
                "strict": false,
                "trailing": true,
                "undef": true,
                "globals": {
                    "jQuery": true,
                    "alert": true
                }
            },
            all: [
                'Gruntfile.js',
                //'assets/js/vendor/*.js',
                //'assets/js/vendor/**/*.js',
                //'assets/js/source/*.js',
                //'assets/js/source/**/*.js',
                // 'assets/js/build/*.js',
            ]
        },

        // concatenation and minification all in one
        uglify: {
            dist: {
                files: {
                    'assets/js/build/vendor.min.js': [
                        'assets/js/vendor/skel/skel.min.js',
                        'assets/js/vendor/skel/skel-viewport.min.js',
                        'assets/js/vendor/skel/skel-layout.min.js'
                    ],
                    'assets/js/build/bitsy.min.js': [
                        'assets/js/source/main.js',
                        'assets/js/source/customizer.js',
                        'assets/js/source/navigation.js',
                        'assets/js/source/skip-link-focus-fix.js'
                    ]
                }
            }
        },

        // style (Sass) compilation via Compass
        compass: {
            dist: {
                options: {
                    sassDir: 'assets/sass',
                    cssDir: './',
                    imagesDir: 'assets/images',
                    images: 'images',
                    javascriptsDir: 'assets/js/build',
                    fontsDir: 'assets/fonts',
                    environment: 'production',
                    outputStyle: 'expanded', // switch to 'compressed' for minification
                    relativeAssets: true,
                    noLineComments: true,
                    force: true
                }
            }
        },
	    wp_readme_to_markdown: {
		    readme: {
			    files: {
				    'README.md': 'readme.txt'
			    }
		    }
	    },
        // watch our project for changes
        watch: {
            php: {
                files: ['**.php', 'template-parts/**.php', 'inc/**.php']
            }, // php
            compass: {
                files: [
                    'assets/sass/*',
                    'assets/sass/**/*',
                ],
                tasks: ['compass']
            },
            js: {
                files: [
                    '<%= jshint.all %>'
                ],
                tasks: ['jshint', 'uglify']
            }
        }
    
    });

    // load tasks
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-compass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-wp-readme-to-markdown');

    // register task
    grunt.registerTask('default', [
        'jshint',
        'compass',
        'uglify',
	    'wp_readme_to_markdown',
        'watch'
    ]);

};