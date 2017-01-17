( function( ng, app, $, undefined ) {

	"use strict";

	app.directive( "sortableParent", function() {
		return {
			scope: true,
			restrict: 'A',
			link: function( $scope, $element, $attributes ) {

				$scope.$on( "readyToSort", function() {
					$element
						.sortable( {
							handle: ".sorter-handle",
							axis: $attributes.axis || "y",
							tolerance: "pointer",
							stop: function( event, ui ) {
								$scope.$broadcast( "sortComplete", $attributes );
								$scope.notify( "Sort order updated!" );
								ui.item.children().removeAttr( 'style' );
							},
							helper: function( event, ui ) {
								ui.children().each( function() {
									$( this ).width( $(this).width() );
								} );
								return ui;
							}
						} )
						.disableSelection();
				} );
			}
		};
	} );

	app.directive( "sortableChild", function() {
		return {
			restrict: "A",
			link: function( $scope, $element ) {
				$scope.$on( "sortComplete", function( event, attributes ) {

					if ( ! $scope.item.hasOwnProperty( attributes.sortableParent ) ) return false;

					$scope.item[attributes.sortableParent] = $element.index();

					if ( attributes.autosave ) {
						$scope.save( true, [ attributes.sortableParent ] );
					}
				} );

				if ( $scope.$last ) {
					$scope.$emit( "readyToSort" );
				}
			}
		};
	} );

} )( angular, Admin, jQuery );
