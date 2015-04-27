/*global module:false, require:false */

module.exports = function (grunt) {
	"use strict";
	
    // load all grunt tasks matching the `grunt-*` pattern
    require('load-grunt-tasks')(grunt);

    grunt.initConfig({
		
		pkg: grunt.file.readJSON('package.json'),

        // watch for changes and trigger sass, less, jshint, uglify and livereload
        watch: {
            sass: {
                files: ['*.{scss,sass}'],
                tasks: ['sass', 'autoprefixer', 'cssmin']
            },
			less: {
                files: '*.less',
                tasks: ['less', 'autoprefixer', 'cssmin']
            },
            images: {
                files: ['img/*.{png,jpg,gif}'],
                tasks: ['imagemin']
            },
            /*js: {
                files: '<%= jshint.all %>',
                tasks: ['jshint', 'uglify']
            }*/
        },

        // 1. sass
        sass: {
            dist: {
				options: {
                    style: 'expanded',
                },
                files: {
                    'css/main.css': 'main.scss',
                    //'css/editor-style.css': 'editor-style.scss'
                }
            }
        },
		
		// 2. less
        less: {
            dist: {
				options: {
                    style: 'expanded',
                },
                files: {
                    'css/main.css': 'main.less',
                    //'css/editor-style.css': 'editor-style.less'
                }
            }
        },

        // autoprefixer
        autoprefixer: {
            options: {
                browsers: ['last 2 versions', 'ie 9', 'ios 6', 'android 4'],
                map: true
            },
            files: {
                expand: true,
                flatten: true,
				cwd: 'css',
                src: '*.css',
                dest: 'css'
            },
        },

        // css minify
        cssmin: {
            options: {
                keepSpecialComments: 1
            },
            minify: {
                expand: true,
                cwd: 'css',
                src: ['*.css', '!*.min.css'],
				dest: 'css',
                ext: '.css'
            }
        },
		
        // javascript linting with jshint
        jshint: {
            options: {
                jshintrc: '.jshintrc',
                "force": true
            },
            all: [
                'Gruntfile.js',
                'js/*.js'
            ]
        },
		
		// image optimization
        imagemin: {
            dist: {
                options: {
                    optimizationLevel: 7,
                    progressive: true,
                    interlaced: true
                },
                files: [{
                    expand: true,
                    cwd: 'img/',
                    src: ['*.{png,jpg,gif}'],
                    dest: 'img/'
                }]
            }
        },
		
        // uglify to concat, minify, and make source maps
        /*uglify: {
            plugins: {
                options: {
                    sourceMap: 'js/plugins.js.map',
                    sourceMappingURL: 'plugins.js.map',
                    sourceMapPrefix: 2
                },
                files: {
                    'js/plugins.min.js': [
                        'js/plugins.js',
                        // 'js/yourplugin/yourplugin.js',
                    ]
                }
            },
            main: {
                options: {
                    sourceMap: 'js/main.js.map',
                    sourceMappingURL: 'main.js.map',
                    sourceMapPrefix: 2
                },
                files: {
                    'js/main.min.js': [
                        'js/main.js'
                    ]
                }
            }
        },*/

        // browserSync
        /*browserSync: {
            dev: {
                bsFiles: {
                    src : ['style.css', 'css/main.css', 'js/*.js', 'img/*.{png,jpg,jpeg,gif,webp,svg}']
                },
                options: {
                    proxy: "local.dev",
                    watchTask: true
                }
            }
        },*/

    });
	
    // register task
    grunt.registerTask('default', ['watch', 'sass', 'less', 'autoprefixer', 'cssmin', 'imagemin', /*'uglify', 'browserSync'*/]);

};