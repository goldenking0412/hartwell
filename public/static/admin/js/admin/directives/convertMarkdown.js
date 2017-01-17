( function( ng, app, $, undefined ) {

	'use strict';

	/**
	 * Turn a textarea into a markdown editor.
	 *
	 * Declare this directive on the parent element that has the ResourceController defined.
	 * Also declare the data-options="markdown" attribute on the element.
	 * Make sure to convert HTML back to markdown via the Eloquent model.
	 */
	app.directive( 'convertMarkdown', function( $parse, $compile ) {
		return {
			restrict: 'A',
			link: function( $scope, $element, $attr ) {

				var getter = $parse( 'item.' + $attr.convertMarkdown );
				var setter = getter.assign;

				var additionalButtons = [[{
					name: 'groupCustom',
					data: [{
						name: 'cmdUpload',
						title: 'Upload" asset-upload="uploadedFile" directory="uploads', // Hacking into bootstrap-markdown to make this a directive
						icon: 'glyphicon glyphicon-upload'
					}]
				}]];

				var initialized = false;

				$scope.$on( 'assetUploaded', function() {
					if ( $scope.uploadedFile ) {
						// Give ![] surround the selection and prepend the image link
						var chunk, cursor, selected = $scope.editor.getSelection(), content = $scope.editor.getContent(), link;

						if ( selected.length === 0 ) {
							chunk = 'enter image description here';
						} else {
							chunk = selected.text;
						}

						$scope.editor.replaceSelection( '![' + chunk + '](' + $scope.ASSET_BASE + 'uploads/' + $scope.uploadedFile + ' "enter image title here")' );
						cursor = selected.start + 2;

						// Set the next tab
						$scope.editor.setNextTab( 'enter image title here' );

						$scope.editor.setSelection( cursor, cursor + chunk.length );

						// Pass through the markdown to Angular
						setter( $scope, $scope.editor.$element.val() );
					}
				} );

				$scope.$watch( 'item.' + $attr.convertMarkdown, function() {
					if ( !initialized ) {
						// Initialize markdown editor.
						if ( $scope.item !== undefined ) {
							initialized = true;
							$( ".markdown-editor:first", $element ).markdown( {
								additionalButtons: additionalButtons,
								onShow: function( e ) {
									// Compile the asset upload directive so it can be used
									$compile( $( '[asset-upload]', $element ) )( $scope );
								}
							} );

							$scope.editor = $( ".markdown-editor:first", $element ).data( 'markdown' );
							$scope.editor.$element.on( 'select', function() {
								setter( $scope, $( this ).val() );
							} );
						}
					}
				});
			}
		}

	});

} )( angular, Admin, jQuery );
