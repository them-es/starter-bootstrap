const path = require( 'path' );
const webpack = require( 'webpack' );

module.exports = {
	context: path.resolve( __dirname, 'assets' ),
	entry: {
		main: [ './main.js' ],
	},
	output: {
		path: path.resolve( __dirname, 'assets/js' ),
		filename: '[name].bundle.js',
	},
	externals: {
		jquery: 'jQuery'
	},
	plugins: [
		new webpack.ProvidePlugin( {
			$: 'jquery',
			jQuery: 'jquery',
			'window.jQuery': 'jquery',
		} ),
	],
	devtool: 'source-map',
	watch: true,
};