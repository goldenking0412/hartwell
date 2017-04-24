( function( ng, app, $, undefined ) {

	"use strict";

	// app.directive( "wireframe", function() {
	// 	return {
	// 		scope: true,
	// 		restrict: 'A',
	// 		link: function( $scope, $element, $attributes ) {

	// 		}
	// 	};
	// } );

	app.directive( "wireframeHotspot", function() {
		return {
			scope: true,
			restrict: 'A',
			link: function( $scope, $element, $attributes ) {
				$scope.$on('$destroy', function() {
					//
				});

				setTimeout(function() {
					var xp = $scope.$parent.h.x;
					var yp = $scope.$parent.h.y;
					console.log(xp, yp);
					$element.css({
						'top': yp + '%',
						'left': xp + '%'
					});
					// $element.css(
					// 	'transform',
					// 	'translate(' + x + 'px, ' + y + 'px)'
					// );
				}, 1000);

				$scope.safeApply = function(fn) {
					var phase = this.$root.$$phase;
					if (phase == '$apply' || phase == '$digest') {
						if (fn && (typeof(fn) === 'function')) {
							fn();
						}
					} else {
						this.$apply(fn);
					}
				};

				function dragFn(event) {
					var target = event.target,
						// keep the dragged position in the data-x/data-y attributes
						x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx,
						y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;

					console.log(x, y);

					$element.css({
						'top': y + 'px',
						'left': x + 'px'
					});

					// // translate the element
					// target.style.webkitTransform =
					// target.style.transform =
					// 'translate(' + x + 'px, ' + y + 'px)';

					// update the posiion attributes
					target.setAttribute('data-x', x);
					target.setAttribute('data-y', y);
				}

				function endFn(event) {
					var target = event.target,
						// keep the dragged position in the data-x/data-y attributes
						x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx,
						y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;

					$element.css({
						'top': y + 'px',
						'left': x + 'px'
					});

					var container = $element.closest('.wireframe-container');

					var xp = 100 * x / container.width();
					var yp = 100 * y / container.height();

					console.log(xp+'%', yp+'%');

					$scope.safeApply(function() {
						$scope.$parent.h.x = xp;
						$scope.$parent.h.y = yp;
					});
				}

				// function endFn(event) {
				// 	var target = event.target,
				// 		// keep the dragged position in the data-x/data-y attributes
				// 		x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx,
				// 		y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;

				// 	// translate the element
				// 	target.style.webkitTransform =
				// 	target.style.transform =
				// 	'translate(' + x + 'px, ' + y + 'px)';

				// 	var container = $element.closest('.wireframe-container');

				// 	var xp = 100 * x / container.width();
				// 	var yp = 100 * y / container.height();

				// 	console.log(xp+'%', yp+'%');

				// 	$scope.safeApply(function() {
				// 		$scope.$parent.h.x = xp;
				// 		$scope.$parent.h.y = yp;
				// 	});
				// }

				interact($element[0]).draggable({
					inertia: false,
					restrict: {
						restriction: "parent",
						endOnly: true,
						elementRect: {
							top: 0,
							left: 0,
							bottom: 1,
							right: 1
						}
					},
					onmove: dragFn,
					onend: endFn
				})
			}
		};
	} );

} )( angular, Admin, jQuery );
