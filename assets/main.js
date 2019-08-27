// Webpack Imports
import 'bootstrap';


(function ($) {
	'use strict';

	// JQuery fallback: add title attribute from placeholder
	$('input, textarea').attr('title', function () {
		return $(this).attr('placeholder');
	});
	
	// Focus Search if Searchform is empty
	$('.search-form').on('submit', function (e) {
		var search = $('#s');
		if (search.val().length < 1) {
			e.preventDefault();
			search.focus();
		}
	});

}(jQuery));