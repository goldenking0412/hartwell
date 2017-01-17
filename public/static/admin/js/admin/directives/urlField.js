( function( ng, app, $, undefined ) {

	'use strict';

	var URL_REGEXP        = /^(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?$/;
	var URL_FIELD_CLASS   = '.url-field-wrapper';
	var INVALID_URL_CLASS = 'invalid-input-url';

	app.directive( 'urlField', function() {
		return {
			restrict: 'A',
			link: function( $scope, $element, attr ) {

				var value;

				$scope.$watch( "item", function() {
					if ( $scope.item !== undefined ) {
						value = $scope.item[ attr.urlField ];
						if ( value !== undefined ) {
							validate();
						}
					}
				} );

				$element
					.on( 'keyup paste', validate );

				function validate() {
					value = $element.val();

					if ( URL_REGEXP.test( value ) || !value ) {
						$element.removeClass( INVALID_URL_CLASS );
						$element
							.closest( URL_FIELD_CLASS )
							.removeClass( 'has-error' );
					} else {
						$element.addClass( INVALID_URL_CLASS );
						$element
							.closest( URL_FIELD_CLASS )
							.addClass( 'has-error' );
					}
				}

			}
		}

	});

} )( angular, Admin, jQuery );
