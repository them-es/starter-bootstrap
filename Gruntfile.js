/*global module:false, require:false */

module.exports = function (grunt) {
	"use strict";
	
    // load all grunt tasks matching the `grunt-*` pattern
    require('load-grunt-tasks')(grunt);

    grunt.initConfig({
		
		pkg: grunt.file.readJSON('package.json'),

        // watch for changes and trigger tasks
        watch: {
            sass: {
                files: ['*.{scss,sass}'],
                tasks: ['sass', 'postcss']
            },
			less: {
                files: '*.less',
                tasks: ['less', 'postcss']
            },
            images: {
                files: ['img/*.{png,jpg,gif}'],
                tasks: ['imagemin']
            },
            js: {
                files: '<%= jshint.all %>',
                tasks: ['jshint', 'uglify']
            }
        },

        // 1. Sass
        sass: {
            dist: {
				files: {
                    'css/main.min.css': 'main.scss',
                    //'css/editor-style.min.css': 'editor-style.scss'
                }
            }
        },
		
		// 2. Less
        less: {
            dist: {
				files: {
                    'css/main.min.css': 'main.less',
                    //'css/editor-style.min.css': 'editor-style.less'
                }
            }
        },

        // PostCSS: sourcemaps, autoprefix, minify
        postcss: {
			options: {
			  map: {
				  inline: false, // save all sourcemaps as separate files...
				  annotation: 'css/' // ...to the specified directory
			  },

			  processors: [
				require('pixrem')(), // add fallbacks for rem units
				require('autoprefixer')({ browsers: 'last 2 versions' }), // add vendor prefixes
				require('cssnano')() // minify the result
			  ]
			},
			dist: {
			  src: 'css/*.min.css'
			}
		},
		
		// Image optimization
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
		
        // Javascript linting with jshint
        jshint: {
            all: [
                //'Gruntfile.js',
                'js/*.js',
                '!js/*.min.js'
            ]
        },
        
        // Uglify to concat, minify, and make source maps
        uglify: {
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
        },

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
    grunt.registerTask('default', ['watch', 'sass', 'less', 'postcss', 'imagemin', 'uglify', /*'browserSync'*/]);

};