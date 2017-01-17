( function( ng, app, $, undefined ) {

	'use strict';

	app.directive( 'imageUpload', function( $parse ) {
		return {
			restrict: 'A',
			link: function( scope, element, attr ) {

				var scopeItem = attr.imageUpload;
				var scopeItemReference = scopeItem + '_id';

				var imageGetter = $parse( scopeItem );
				var imageSetter = imageGetter.assign;

				var imageReferenceSetter = $parse( scopeItemReference ).assign;

				scope.$watch( scopeItem, function() {
					var scopeObject = imageGetter( scope );
					if (scopeObject !== null && typeof scopeObject !== 'undefined') {
						element
							.find( 'img' ).remove().end()
							.append(
								$( '<img />' ).prop('src', scope.ASSET_BASE + ( attr.directory ? attr.directory + '/' : '' ) + scopeObject )
							);
							return;
					}
					element.find( 'img' ).remove();
				} );

				scope.removeImage = function() {
					var really = confirm( "Are you sure you want to remove this image?" );
					if ( really ) {
						imageSetter( scope, null );
						imageReferenceSetter( scope, null );
					}
				};

				new qq.FineUploaderBasic( {
					debug: true,
					button: element[0],
					request: {
						endpoint: '/upload',
						params: {
							image: true,
							crops: attr.crops,
							directory: attr.directory
						}
					},
					callbacks: {
						onComplete: function( id, filename, response ) {
							if ( response.success ) {
								scope.notify( "Image uploaded!" );
								imageSetter( scope, response.filename );
								//imageReferenceSetter( scope, response.image.id );
								scope.hasChanged = true; // Were you looking for deez?
								scope.$apply();
							} else if ( response.error ) {
								scope.notify( response.error );
							}
						},
						onError: function() {
							// ...
						}
					}
				} );
			}
		};
	} );


} )( angular, Admin, jQuery );
