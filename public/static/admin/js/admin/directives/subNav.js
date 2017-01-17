( function( ng, app, $, undefined ) {

	'use strict';

	app.directive( 'subNav', function() {
		return {
			restrict: 'A',
			link: function( $scope, $element, attr ) {

				var children = $element.find( '.btn' );

				/*
				$(document).ready( function() {
					children.first().addClass( 'active' );
				} );
				*/

				children.on( 'click', function(e) {
					e.preventDefault();

					// Find the target section to scroll to.
					var $this  = $(this),
							name     = $this.data( 'target' ),
							target = $( '[name=' + name + ']' ),
							offset = parseInt( $( 'body' ).css( 'padding-top' ) );

					/*
					// Toggle active class for chosen element.
					children.removeClass( 'active' );
					$this.addClass( 'active' );
					*/

					$( 'html, body' ).animate( { scrollTop: target.offset().top - offset }, 'slow' ); // Subtract the top padding from the body.
				} );

			}
		};
	} );


} )( angular, Admin, jQuery );
