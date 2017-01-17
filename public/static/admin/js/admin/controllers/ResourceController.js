( function( ng, app, $, undefined ) {

	'use strict';

	var INVALID_INPUT_CLASSES = [
		'.invalid-input-url'
	].join( ', ' );

	app.controller(
		'ResourceController',
		function( $scope, $element ) {

			$scope.contrasts = [ "light", "dark" ];

			$scope.orientations = [ "left", "right" ];

			$scope.hasChanged = false;

			var model = $scope.model = $element.data( 'laravelResource' ) || null;

			var stem  = $element.data( 'laravelStem' ) || '/admin/resource/';

			$scope.notFeatured = function() {
				return $scope.item.featured_delta === null;
			};

			$scope.idsToArray = function( references ) {
				references = references || [];
				if ( references.length > 0 ) {
					return $.map( references, function( reference ) { return reference.id } );
				}
			};

			$scope.removeFrom = function( parentArray, index ) {
				// Remove this item from the array
				var really = confirm( "Would you really like to remove this item?" );
				if ( really ) {
					// Sort the items to be in the correct order (delta)
					parentArray.sort( function( item1, item2 ) { return item1.delta - item2.delta; } );

					if ( typeof index === "undefined" ) {
						index = $scope.$index;
					}

					if ( typeof index === "number" ) {
						parentArray.splice( index, 1 );
					}
				}
			};

			$scope.image = function( imageKey ) {
				if ( typeof $scope.item[imageKey] === "object" ) {
					return $('<img />').prop('src', $scope.item[imageKey].filename + '.' + $scope.item[imageKey].extension );
				}
				return '';
			};

			$scope.makeFeatured = function() {
				var really = confirm( "Are you sure you want to feature " + $scope.item.title  + "?" );
				if ( really ) {
					var featured_delta = $scope.featured.length ? parseInt( $scope.featured.last().featured_delta ) + 1 : 0;

					$scope.item.featured_delta = featured_delta;
					$scope.save( true ); // save silently
				}
			};

			$scope.unmakeFeatured = function() {
				if ( $scope.featured.length < 3 ) {
					return alert( "Negative, you need at least 2 featured items." );
				}
				var really = confirm( "Are you sure you want to unfeature " + $scope.item.title  + "?" );
				if ( really ) {
					$scope.item.featured_delta = null;
					$scope.save( true ); // save silently
				}
			};

			$scope.delete = function() {
				var item = $scope.item.name ? $scope.item.name : $scope.item.title;
				var really = confirm( "Are you really, really sure you want to delete " + item + "? (All references to it will be purged sitewide.)" );

				if ( really ) {
					$.ajax( {
						method: "DELETE",
						url: stem + $scope.item.id,
						data: { model: model ? model : $scope.item.model },
						success: function( response ) {
							if ( response.success ) {
								$scope.$emit( 'dataUpdated' );
							} else {
								$scope.notify( "Hmmm", response.data );
							}
						}
					} );
				}
			}

			$scope.get = function() {
				$.get( stem + $scope.item.id, { model: model ? model : $scope.item.model }, function( response ) {
					if ( response.success ) {
						$scope.item = response.data;
						$scope.hasChanged = false;
						$scope.$apply();
					} else {
						$scope.notify( "Hmmm", "Unable to get that data for you" );
						console.log( response );
					}
				} );
			};

			function invalidInputsPresent() {
				var invalidInputCount = $element.find( INVALID_INPUT_CLASSES ).length;
				if ( invalidInputCount === 0 ) {
					return false;
				} else {
					$scope.notify( 'Unable to save. There are ' + invalidInputCount + ' validation errors.' );
					return true;
				}
			}

			$scope.save = function( silent, only ) {

				if ( invalidInputsPresent() ) return;

				var exists = $scope.item.id;
				var input   = {};
				if ( exists && typeof only === "object" ) {
					if ( $.inArray( "id", only ) === -1 ) {
						only.push( "id" );
					}
					for ( var index in only ) {
						input[only[index]] = $scope.item[only[index]];
					}
				} else {
					input = $scope.item;
				}

				var data = {
					item: JSON.stringify( input ),
					model: model ? model : $scope.item.model
				};

				$.ajax( {
					type: exists ? "PUT" : "POST",
					url: exists ? stem + $scope.item.id : stem.replace(/\/$/, ""),
					data: data,
					success: function( response ) {
						if ( response.success ) {
							if ( !silent ) {
								$scope.notify( model + ' ' + ( exists ? 'updated' : 'created' ) + '!' );
							}
							if ( !exists ) {
								$scope.item = {};
								$scope.$broadcast( 'resourceCreated', response.data );
							}
							if ( typeof only !== "object" ) {
								$scope.$emit( 'dataUpdated' );
							}
						} else {
							$scope.notify( response.data );
						}
					},
					error: function( response ) {
						$scope.notify( "Got resource error!" );
						console.log( response );
					}
				} );
			};

		}
	);

} )( angular, Admin, jQuery );
