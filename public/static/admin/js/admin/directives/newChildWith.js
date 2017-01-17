( function( ng, app, $, undefined ) {

	'use strict';

	app.directive( 'newChildWith', function( $parse ) {
		return {
			restrict: 'A',
			link: function( $scope, $element, $attributes ) {
				// e.g. "case_study_id pushing [ 'title', 'url' ] into $parent.item.press"
				var instructions        = $attributes.newChildWith.split( " pushing " );
				var parentReference     = instructions[0];
				var furtherInstructions = instructions[1].split( " into " );
				var watchFields         = eval( furtherInstructions[0] );
				var parentGetter        = $parse( furtherInstructions[1] );
				var parentSetter        = parentGetter.assign;


				$scope.$watch( "$parent.item", function() {
					if ( typeof $scope.$parent.item === "object") {
						if ( !$scope.item[parentReference] ) {
							$scope.item = {};
							$scope.item[parentReference] = $scope.$parent.item.id;
						}
					}
				} );

				$scope.hasChanged = function() {
					if ( typeof $scope.item === "object" && $scope.item[parentReference] ) {
						for ( var index in watchFields ) {
							if ( typeof watchFields[index] === "string" ) {
								if ( !$scope.item[watchFields[index]] ) {
									return false;
								}
							}
						}
						return true;
					}
					return false;
				};

				$scope.saveChild = function() {
					var parentReferences = parentGetter( $scope.$parent );
					$scope.item.delta = parentReferences.length;
					parentReferences.push( $scope.item );
					parentSetter( $scope.$parent, parentReferences );
					$scope.item = {};
					$scope.item[parentReference] = $scope.$parent.item.id;
				};
			}
		};
	} );

} )( angular, Admin, jQuery );
