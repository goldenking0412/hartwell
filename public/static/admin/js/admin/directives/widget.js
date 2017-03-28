( function( ng, app, $, undefined ) {

	'use strict';

	app.directive('ckEditor', [function () {
		return {
			require: '?ngModel',
			link: function ($scope, elm, attr, ngModel) {

				var ck = CKEDITOR.replace(elm[0], {
					filebrowserUploadUrl: '/upload',
					extraPlugins: 'colorbutton',
					colorButton_colors: 'FFFFFF,000000,794a94,fefb76,195A8D,022F3B'
				});

				ck.on('pasteState', function () {
					$scope.$apply(function () {
						ngModel.$setViewValue(ck.getData());
					});
				});

				ngModel.$render = function (value) {
					ck.setData(ngModel.$modelValue);
				};
			}
		};
	}]);

	app.directive(
		'widgetWizard',
		function() {
			return {
				restrict: 'A',
				link: function( $scope, $element, $attr ) {
					$scope.addWidget = function( widget_type ) {
						// Calculate the next delta
						var delta = 0;
						for ( var i in $scope.item.widgets ) {
							if ( !isNaN( $scope.item.widgets[i].delta ) ) {
								delta = Math.max( $scope.item.widgets[i].delta, delta );
							}
						}

						$.post(
							'/admin/widget',
							{
								widget_type: widget_type,
								delta: delta + 1,
								title: 'New Widget',
								target_type: $scope.model,
								target_id:   $scope.item.id
							},
							function( response ) {
								if ( response.success ) {
									$scope.item.widgets.push( response.data );
									$scope.$apply();
								}
							}
						);
					};
				}
			};
		}
	);

	app.directive(
		'widget',
		function() {
			return {
				restrict: 'A',
				link: function( $scope, $element, $attr ) {
					$scope.addPane = function() {
						// Calculate the next delta
						var delta = 0;
						for ( var i in $scope.item.panes ) {
							if ( !isNaN( $scope.item.panes[i].delta ) ) {
								delta = Math.max( $scope.item.panes[i].delta, delta );
							}
						}

						$scope.item.panes.push( { delta: delta + 1 } );
					};

					$scope.canDeletePanes = function() {
						return $scope.item.panes.length > 1 || $scope.item.widget_type in [];
					};

					$scope.canHaveBody = function() {
						return $.inArray( $scope.item.widget_type, ['vertical-slideshow', 'vertical-slideshow-double', 'big-image', 'bg-image', 'columns'] ) !== -1;
					};

					$scope.canHaveImage = function() {
						return $.inArray( $scope.item.widget_type, ['big-image', 'bg-image', 'columns'] ) !== -1;
					};

					$scope.delete = function() {
						var really = confirm( "Really delete this widget? All the panes inside it will also be deleted." );

						if ( really ) {
							$.ajax( {
								type: "DELETE",
								url: '/admin/widget/' + $scope.item.id,
								success: function( response ) {
									if ( response.success ) {
										$scope.get();
										$scope.notify( "We warned you!" );
										$scope.$destroy();
									} else {
										$scope.notify( "Unable to delete widget" );
									}
								}
							} );
						}
					};

					$scope.save = function() {
						var stem = '/admin/widget/';
						var data = {
							item: JSON.stringify( $scope.item ),
							model: 'Widget',
							deltas: (function() {
								var deltas = [];
								ng.forEach( $scope.$parent.item.widgets, function( value ) {
									deltas.push( { id: value.id, delta: value.delta } );
								} );

								return deltas;
							})()
						};

						$.ajax( {
							type: "PUT",
							url: stem + $scope.item.id,
							data: data,
							success: function( response ) {
								if ( response.success ) {
									$scope.notify( 'Widget updated!' );

									$scope.item = response.data;
									$scope.$apply();
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
			};
		}
	);

} )( angular, Admin, jQuery );
