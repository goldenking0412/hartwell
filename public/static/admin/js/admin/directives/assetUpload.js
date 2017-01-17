( function( ng, app, $, undefined ) {

	'use strict';

	app.directive( 'assetUpload', function( $parse ) {
		return {
			restrict: 'A',
			link: function( scope, element, attr ) {

				var scopeItem = attr.assetUpload;

				var assetGetter = $parse( scopeItem );
				var assetSetter = assetGetter.assign;

				scope.removeAsset = function() {
					var really = confirm( "Are you sure you want to remove this asset?" );
					if ( really ) {
						assetSetter( scope, null );
					}
				};

				new qq.FineUploaderBasic( {
					debug: true,
					button: element[0],
					request: {
						endpoint: '/upload',
						params: {
							directory: attr.directory,
							obfuscate: false
						}
					},
					callbacks: {
						onComplete: function( id, filename, response ) {
							if ( response.success ) {
								scope.notify( "Asset uploaded!" );
								assetSetter( scope, response.filename );
								scope.hasChanged = true; // Were you looking for deez?
								scope.$apply();
								scope.$broadcast( 'assetUploaded' );
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
