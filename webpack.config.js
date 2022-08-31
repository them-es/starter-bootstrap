const path = require( 'path' ),
	webpack = require( 'webpack' );

module.exports = {
	mode: 'production',
	context: path.resolve( __dirname, 'assets' ),
	entry: {
		main: [ './main.js' ],
	},
	output: {
		path: path.resolve( __dirname, 'assets/dist' ),
		filename: '[name].bundle.js',
	},
	// Uncomment if jQuery support is needed
	/*externals: {
		jquery: 'jQuery'
	},
	plugins: [
		new webpack.ProvidePlugin( {
			$: 'jquery',
			jQuery: 'jquery',
			'window.jQuery': 'jquery',
		} ),
	],*/
	devtool: 'source-map',
	watch: true,
};