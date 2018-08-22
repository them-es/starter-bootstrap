const sass = require('node-sass');
const postcss = require('postcss');

module.exports = function (grunt) {
	'use strict';
	
	// load all Grunt tasks matching the `grunt-*` pattern
	require('load-grunt-tasks')(grunt);

	grunt.initConfig({
		
		pkg: grunt.file.readJSON('package.json'),

		// watch for changes and trigger tasks
		watch: {
			sass: {
				files: ['*.{scss,sass}'],
				tasks: ['sass', 'postcss']
			},
			images: {
				files: ['img/*.{png,jpg,gif}'],
				tasks: ['imagemin']
			},
			js: {
				files: '<%= jshint.all %>',
				tasks: ['jshint', 'uglify']
			},
			options: {
				//livereload: true // Install and enable a Browser Plugin first: http://livereload.com/extensions
			}
		},

		// Sass
		sass: {
			options: {
				implementation: sass,
				sourceMap: true
			},
			dist: {
				files: {
					'css/main.min.css': 'main.scss',
					//'css/editor-style.min.css': 'editor-style.scss'
				}
			}
		},

		// PostCSS: Source maps, Autoprefix, Minify
		postcss: {
			options: {
				map: {
					inline: false, // Save all Source maps as separate files...
					annotation: 'css/' // ...to the specified directory
				},
				processors: [
					require('pixrem')(), // Add fallbacks for rem units
					require('autoprefixer')({ browsers: 'last 2 versions' }), // Add vendor prefixes
					require('cssnano')() // Minify the result
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
		
		// Uglify to concat, minify, and make Source maps
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

	});

	// Set base directory to "/assets": https://gruntjs.com/api/grunt.file#grunt.file.setbase
	grunt.file.setBase('assets');
	
	// Register the tasks
	grunt.registerTask('default', ['watch', 'sass', 'postcss', 'imagemin', 'uglify']);

};