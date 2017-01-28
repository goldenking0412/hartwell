(function() {
	var lastTime = 0;
	var vendors = ['ms', 'moz', 'webkit', 'o'];
	for(var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
		window.requestAnimationFrame = window[vendors[x]+'RequestAnimationFrame'];
		window.cancelAnimationFrame = window[vendors[x]+'CancelAnimationFrame']
								   || window[vendors[x]+'CancelRequestAnimationFrame'];
	}

	if (!window.requestAnimationFrame)
		window.requestAnimationFrame = function(callback, element) {
			var currTime = new Date().getTime();
			var timeToCall = Math.max(0, 16 - (currTime - lastTime));
			var id = window.setTimeout(function() { callback(currTime + timeToCall); },
			  timeToCall);
			lastTime = currTime + timeToCall;
			return id;
		};

	if (!window.cancelAnimationFrame)
		window.cancelAnimationFrame = function(id) {
			clearTimeout(id);
		};
}());

function showPosition(){
	var docElm = document.documentElement, // better to cache this outside of this fuction
		pos = ( document.body.scrollTop || docElm.scrollTop || docElm.scrollTop) / ( docElm.scrollHeight - docElm.clientHeight ) * 100;

	return pos;
};

function percentageFromTop() {
	var max = window.innerHeight;
	var now = document.body.scrollTop;

	if (now === 0) return 0;
	if (now >= max) return 100;

	return (now / max) * 100;
}

$(function() {

	window.mySwipe = Swipe(document.getElementById('slider'), {
		auto: 3000,
		continuous: true
	});

	$('.swipe-item-slideshow').each(function() {
		Swipe(this, {
			auto: 3000,
			continuous: true
		});
	});

	// var start = 35;
	var $jet = $('.intro-jet');
	var $c1 = $('.cloud-1');
	var $c2 = $('.cloud-2');
	var $c3 = $('.cloud-3');
	var $c4 = $('.cloud-4');
	var $header = $('#header');
	var $whiteDrift = $('.white-drift');

	function handleHeader() {
		if ($(window).scrollTop() <= 35) {
			$header.removeClass('top');
		} else {
			$header.addClass('top');
		}
	}

	function handleFloatingItems() {
		var windowHeight = window.innerHeight;

		$('.para').each(function() {
			var $this = $(this);

			var distanceFromTop = $this.offset().top - $(window).scrollTop();
			var middle = ($this.height() / 2) + distanceFromTop - (windowHeight / 2);

			var calculated = (middle / windowHeight) * 100;

			if (calculated > 100) {
				calculated = 100
			}

			if (calculated < -100) {
				calculated = -100;
			}

			$this.css({
				'transform': 'translate(0, ' + calculated + '%'
			});
		});
	}

	var $landingStrip = $('.landing-strip-wrapper');

	function handleHeaderBackground() {

		var p = percentageFromTop();

		var pos = (
			100 - (
				p * 8
			)
		);

		$landingStrip.css({
			'background-position-y': pos + '%'
		});


		var top = p * 2;
		var scale = 1 + ((p * 4) / 100);

		var transformString = 'translate(0, -' + top + 'vh) scale(' + scale + ')';

		$jet.css({
			'transform': transformString
		});

		$c1.css({
			'transform': 'translate(0, ' + (p * 3) + 'vh)'
		});

		$c2.css({
			'transform': 'translate(0, ' + (p * 3.2) + 'vh)'
		});

		$c3.css({
			'transform': 'translate(0, ' + (p * 5) + 'vh)'
		});

		$c4.css({
			'transform': 'translate(0, ' + (p * 5.2) + 'vh)'
		});

		var driftFactor = (p * 1.1);

		if (driftFactor > 30) {
			driftFactor = 30;
		}

		$whiteDrift.css({
			'transform': 'translate(0, -' + driftFactor + 'vh)'
		});
	}

	$(window).on('resize', function() {
		window.requestAnimationFrame(function() {
			$('.para-col-left, .para-col-right, .para-col-2-right').each(function() {
				var $this = $(this);
				var $body = $this.find('.body');

				$this.children(':not(.body)').css({
					height: $body.height()
				})
			});
		});
	}).trigger('resize');

	setTimeout(function() {
		$(window).trigger('resize');
	}, 500);

	$(window).on('scroll', function() {
		window.requestAnimationFrame(function() {

			handleHeaderBackground();

			handleHeader();

			handleFloatingItems();

			// var p = z = showPosition();
			// if (p > 100) {
			// 	p = 0;
			// }
			// var top = start - p;
			// var scale = p/100;
			// var opacity = p/100;

			// scale = (scale + .4) * 1.8;

			// if (scale > 2) {
			// 	scale = 2;
			// }

			// var transformString = 'translate(0, ' + top + 'vh) scale(' + scale + ')';

			// $jet.css({
			// 	'transform': transformString,
			// 	'opacity': (opacity + .3) * 1.2
			// });

			// z = 60 - z;

			// if (z < 0) {
			// 	z = 0;
			// }

			// $c1.css({
			// 	'left': '-' + (z) + '%'
			// });
			// $c2.css({
			// 	'right': '-' + (z) + '%'
			// });
		});
	});
});
