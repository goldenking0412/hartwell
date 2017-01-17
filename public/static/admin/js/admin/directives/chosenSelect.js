( function( ng, app, $, undefined ) {

	'use strict';

	// Tiny plugin to remove chosen elements.
	$.fn.chosenDestroy = function () {
		$(this)
			.show()
			.removeClass('chzn-done');
		$(this)
			.next()
			.remove();
		return $(this);
	};

	app.directive( 'chosenSelect', function( $parse ) {
		return {
			restrict: 'A',
			link: function( $scope, $element, $attributes ) {
				$scope.$watch( $attributes.chosenSelect, function() {
					var children = $parse( $attributes.chosenSelect )( $scope );
					if ( typeof children === "object" && $element.children().length >= children.length ) {

						// Create a new chosen always. This will get triggered if a placeholder value has been provided to chosen.
						if( !$element.data( 'processed' ) ) {
							$element.chosen().data( 'processed', true );
						} else {
							$element.chosenDestroy().chosen().data( 'processed', true );
						}

					}
				} );
			}
		};
	} );

} )( angular, Admin, jQuery );
