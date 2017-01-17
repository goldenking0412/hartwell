( function( ng, app, $, undefined ) {

	'use strict';

	app.directive( 'toggleRow', function() {
		return {
			restrict: 'A',
			link: function( $scope, element, attr ) {

				$scope.expanded = false;

				$scope.toggleRow = function() {
					if ( !$( attr.target ).hasClass( 'in' ) ) {
						$( attr.target ).collapse( 'show' );
						$scope.expanded = true;
					}
				}

			}
		}

	});

} )( angular, Admin, jQuery );
