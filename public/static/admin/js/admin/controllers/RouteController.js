( function( ng, app, $, undefined ) {

	'use strict';

	app.controller(
		'RouteController',
		function( $scope, $location ) {

			$scope.getBusy = function() {
				$( '#spinner' ).addClass( 'busy' );
			};

			$scope.currentRoute = function( purpose ) {
				if ( purpose ) {
					return $location.$$absUrl + "?" + purpose + "=1";
				}

				return $location.$$absUrl;
			};

			$scope.windowTitle = function() { return window.title };

			$scope.getData = function() {
				$.get( $scope.currentRoute( 'data' ), function( data ) {
					$scope.item = {};
					for ( var key in data ) {
						$scope[key] = data[key];
					}
					$scope.$apply();
					$( '#spinner' ).removeClass( 'busy' );

					$( '.nav li' ).removeClass( 'active' );
					$( '.nav a[href="' + $scope.currentRoute() + '"]' ).parent().addClass( 'active' );
				} ).error( function( error ) {
					console.log( error );
					$( '#spinner' ).removeClass( 'busy' );
				} );
			};

			$scope.$on( 'dataUpdated', $scope.getData );

			$scope.notify = function( title, content ) {
				$.ClassyNotty({
					title: title,
					content: content,
					timeout: 5000
				});
			};
		}
	);

} )( angular, Admin, jQuery );
