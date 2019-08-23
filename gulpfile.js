const gulp = require('gulp'),
	fancylog = require('fancy-log');


/**
 * Define all source paths
 */

var paths = {
	styles: {
		src: './assets/*.scss',
		dest: './assets/css'
	},
	scripts: {
		src: './assets/*.js',
		dest: './assets/js'
	}
};


/**
 * Webpack compilation: http://webpack.js.org, https://github.com/shama/webpack-stream#usage-with-gulp-watch
 * 
 * build_js()
 */

function build_js() {
	const compiler = require('webpack'),
		webpackStream = require('webpack-stream');
	
	return gulp.src(paths.scripts.src)
		.pipe(
			webpackStream({
				config: require('./webpack.config.js')
			},
			compiler, function (err, stats) {
				if (err) {
					fancylog(err)
				}
			})
		)
		.pipe(
			gulp.dest(paths.scripts.dest)
		);
}


/**
 * SASS-CSS compilation: https://www.npmjs.com/package/gulp-sass
 * 
 * build_css()
 */

function build_css() {
	const sass = require('gulp-sass'),
		postcss = require('gulp-postcss'),
		sourcemaps = require('gulp-sourcemaps'),
		autoprefixer = require('autoprefixer'),
		cssnano = require('cssnano');
	
	const plugins = [
		autoprefixer(),
		cssnano(),
	];
	
	return gulp.src(paths.styles.src)
		.pipe(
			sourcemaps.init()
		)
		.pipe(
			sass()
				.on('error', sass.logError)
		)
		.pipe(
			postcss(plugins)
		)
		.pipe(
			sourcemaps.write('./')
		)
		.pipe(
			gulp.dest(paths.styles.dest)
		);
}

/**
 * Watch task: Webpack + SASS
 * 
 * $ gulp watch
 */

gulp.task('watch',
	function () {
		gulp.watch(paths.scripts.src, build_js);
		gulp.watch([paths.styles.src, './assets/scss/*.scss'], build_css);
	}
);