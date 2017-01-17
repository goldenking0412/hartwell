( function( ng, app, $, undefined ) {

	"use strict";

	app.directive( "datetimepicker", function( $parse ) {
		return {
			restrict: "A",
			link: function( scope, element, attr ) {

				var dateInput = $parse( attr.datetimepicker );

				var $datetimepicker = element.datetimepicker( {
					format: 'm/dd/yyyy hh:ii',
					autoclose: true,
					orientation: "top auto"
				} ).data( 'datetimepicker' );

				element
					.on( 'changeDate', function( e ) {
						dateInput.assign( scope, $datetimepicker.getFormattedDate() );
						scope.$apply();
					} );

				scope.$watch( attr.datetimepicker, function() {
					var date;
					if ( date = dateInput( scope ) ) {
						$datetimepicker.setDate( new Date( date ) );
					}
				} );
			}
		};
	} );

} )( angular, Admin, jQuery );
