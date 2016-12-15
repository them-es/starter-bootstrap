/*global jQuery:false */

(function ($) {
	'use strict';

	// JQuery fallback: add title attribute from placeholder
	$('input, textarea').attr('title', function () {
		return $(this).attr('placeholder');
	});
	
	// Focus Search if Searchform is empty
	$('.searchform').on('submit', function (event) {
		var search = document.getElementById('s');
		if (search.value === '') {
			search.focus();
			return false;
		}
	});

}(jQuery));