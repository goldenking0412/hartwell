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
	var now = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;

	if (now === 0) return 0;
	if (now >= max) return 100;

	return (now / max) * 100;
}

window.initMap = function() {
	$('.map').each(function() {
		var $this = $(this);

		$this.parent().height($('.contact-form-wrapper-outer').height());

		var mapOptions = {
			zoom: 16,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};

		var map = new google.maps.Map(this, mapOptions);
		var geocoder = new google.maps.Geocoder();

		geocoder.geocode( {'address': $this.data('config')}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				map.setCenter(results[0].geometry.location);
				var marker = new google.maps.Marker({
					map: map,
					position: results[0].geometry.location
				});
				marker.setMap(map);
			} else {
				return;
			}
		});

	});
};

$(function() {

	window.__mobileMenuActive = false;

	$('#mobile-menu').on('click', function(e) {
		e.preventDefault();

		if (window.__mobileMenuActive) {
			window.__mobileMenuActive = false;
			$('html').removeClass('menu-out');
		} else {
			window.__mobileMenuActive = true;
			$('html').addClass('menu-out');
		}

	});

	if (('onhashchange' in window)) {
		$(window).bind('hashchange', function() {
			var hash = window.location.hash.replace(/^#/,'');
			if (hash && hash.indexOf('index') === 0) {
				var hashParts = hash.split('-');
				if (hashParts.length === 2) {
					var $now  = $('.band-wrapper-outer').eq(parseInt(hashParts[1]));
					setTimeout(function() {
						$(document).scrollTop($now.offset().top - 180);
					}, 300);
				}
			}
		}).trigger('hashchange');

	}

	setInterval(function() {
		$.get('/get-time', function(d) {
			$.each(d, function(di, dv) {
				$('.time[timezone="'+di+'"]').text(dv);
			});
		});
	}, 30000);

	$('#search-submit').on('click', function(e) {
		e.preventDefault();
		$('#search')[0].submit();
	});

	window.mySwipe = Swipe(document.getElementById('slider'), {
		auto: 3000,
		continuous: true
	});

	$('.swipe-item-slideshow').each(function() {
		$(this).data('__swipe', Swipe(this, {
			auto: 3000,
			continuous: true
		}));
	});

	// var start = 35;
	var $jet = $('.intro-jet');
	var $c1 = $('.cloud-1');
	var $c2 = $('.cloud-2');
	var $c3 = $('.cloud-3');
	var $c4 = $('.cloud-4');
	var $header = $('#header');
	var $whiteDrift = $('.white-drift');
	var $floatingLogo = $('.floating-logo');

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
				'-webkit-transform': 'translate(0, ' + calculated + '%)',
				'-moz-transform': 'translate(0, ' + calculated + '%)',
				'transform': 'translate(0, ' + calculated + '%)'
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
			'-moz-transform': transformString,
			'-webkit-transform': transformString,
			'transform': transformString
		});

		$c1.css({
			'-moz-transform': 'translate(0, ' + (p * 3) + 'vh)',
			'-webkit-transform': 'translate(0, ' + (p * 3) + 'vh)',
			'transform': 'translate(0, ' + (p * 3) + 'vh)'
		});

		$c2.css({
			'-moz-transform': 'translate(0, ' + (p * 3.2) + 'vh)',
			'-webkit-transform': 'translate(0, ' + (p * 3.2) + 'vh)',
			'transform': 'translate(0, ' + (p * 3.2) + 'vh)'
		});

		$c3.css({
			'-moz-transform': 'translate(0, ' + (p * 5) + 'vh)',
			'-webkit-transform': 'translate(0, ' + (p * 5) + 'vh)',
			'transform': 'translate(0, ' + (p * 5) + 'vh)'
		});

		$c4.css({
			'-moz-transform': 'translate(0, ' + (p * 5.2) + 'vh)',
			'-webkit-transform': 'translate(0, ' + (p * 5.2) + 'vh)',
			'transform': 'translate(0, ' + (p * 5.2) + 'vh)'
		});

		var driftFactor = (p * 1.1);

		if (driftFactor > 30) {
			driftFactor = 30;
		}

		$whiteDrift.css({
			'-moz-transform': 'translate(0, -' + driftFactor + 'vh)',
			'-webkit-transform': 'translate(0, -' + driftFactor + 'vh)',
			'transform': 'translate(0, -' + driftFactor + 'vh)'
		});

		$floatingLogo.css({
			'top': (pos - 50) + 'vh'
		});
	}

	var debounce = null;

	var resetSliders = function() {
		$('.swipe-item-slideshow').each(function() {
			var s = $(this).data('__swipe').kill();
			$(this).data('__swipe', Swipe(this, {
				auto: 3000,
				continuous: true
			}));
		});
	};

	$(window).on('resize', function() {
		clearTimeout(debounce);
		debounce = setTimeout(resetSliders, 300);
		window.requestAnimationFrame(function() {
			$('.para-col-left, .para-col-right, .para-col-2-right, .para-col-left-1, .para-col-right-1').each(function() {
				var $this = $(this);
				var $body = $this.find('.body');

				$this.children(':not(.body)').css({
					height: $body.height()
				})
			});

			$('.item-slideshow').each(function() {
				var $this = $(this);
				var $body = $this.find('.body');

				$this.children(':not(.body)').css({
					height: $body.height() + 100
				})
			});
		});

		if (window.innerWidth > 768) {
			$('.recipient-group').css('height', 'auto');
			var tallest   = 0;
			var rowLength = window.innerWidth > 1170 ? 3 : 2;
			var row       = 1;
			var rows      = [];

			$('.recipient-group').each(function() {
				var $rg = $(this);

				if (rows.length < row) {
					rows.push([]);
				}

				if ($rg.index() < rowLength) {
					var rowIndex = rows.length - 1;
					rows[rowIndex].push($rg);

					if ((rowLength - $rg.index()) === 1) {
						row++;
						rowLength = rowLength*row;
					}
				}
			});

			$.each(rows, function(i, v) {
				var rowHeight = 0;
				$.each(v, function(ii, $v) {
					var hh = $v.outerHeight();
					if (hh > rowHeight) {
						rowHeight = hh;
					}
				});
				$.each(v, function(ii, $v) {
					$v.css('height', rowHeight);
				});
			});
		} else {
			$('.recipient-group').css('height', 'auto');
		}
	}).trigger('resize');

	setTimeout(function() {
		$(window).trigger('resize');
	}, 500);

	$(window).on('scroll', function() {
		window.requestAnimationFrame(function() {
			handleHeaderBackground();
			handleHeader();
			handleFloatingItems();
		});
	});

	$('#sn').find('.band-link').click(function(e) {
		var $this = $(this);
		var $now  = $('.band-wrapper-outer').eq(parseInt($this.attr('index')));

		$(document).scrollTop($now.offset().top - 180);
	});
});
