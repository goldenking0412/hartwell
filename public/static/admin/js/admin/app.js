// Initialize our app module.
window.Admin = angular.module( 'Admin', [], function( $interpolateProvider, $locationProvider, $httpProvider ) {
	// Don't let Blade slay Angular
	$interpolateProvider.startSymbol('[[');
	$interpolateProvider.endSymbol(']]');
	// Turn on HTML5 mode if available.
	$locationProvider.html5Mode( true ).hashPrefix('!');

	$httpProvider.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
} );

( function( ng, app, $, undefined ) {
	'use strict';

} )( angular, Admin, jQuery );

Array.prototype.last = function() {
	return this[ this.length - 1 ];
}
