/**
 * jquery.animateSprite.js
 * @version 1.0
 * @author Fuzz Productions
 * @license GPLv2
 *
 * Begins a simple looping sprite animation according to a configuration.
 */
( function( $, undefined ) {
	$.fn.animateSprite = function(options) {
		var $target = $(options.selector);
		var backgroundPath = options.filename;
		if (window.devicePixelRatio > 1) {
			backgroundPath += "@2x";
		}
		backgroundPath += options.extension;
		console.log(backgroundPath);
	};
} )( jQuery );