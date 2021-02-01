// Webpack Imports
import 'bootstrap';


( function ( $ ) {
	'use strict';

	// Focus Search if Searchform is empty
	$( '.search-form' ).on( 'submit', function ( e ) {
		var search = $( '#s' );
		if ( search.val().length < 1 ) {
			e.preventDefault();
			search.trigger( 'focus' );
		}
	} );

}( jQuery ) );
