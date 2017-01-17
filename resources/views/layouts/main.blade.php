<!doctype html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Hartwell</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,600,700,700i" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
		<link rel="stylesheet" href="/static/public/stylesheets/screen.css">
	</head>
	<body>
		<div id="top-header">
			<div class="outer">
				<a href="#">News</a>
				<span class="top-header-separator">|</span>
				<a href="#">HR</a>
				<span class="top-header-separator">|</span>
				<a href="#">RFQ</a>
				<span class="top-header-separator">|</span>
				<a href="#">Contact</a>
				<span class="top-header-separator">|</span>
				<a href="#">Order Entry</a>
				<span class="top-header-separator">|</span>
				<a href="#">CMM Login</a>
				<span class="top-header-separator">|</span>
				<span>+1 714&nbsp;993&nbsp;4200</span>
			</div>
		</div>
		<div id="header">
			<div class="inner-outer b-clear">
				<a id="logo" href="/" title="Hartwell">
					&nbsp;
				</a>
				<span class="header-separator">&nbsp;</span>
				<a class="header-item" href="#who-we-are">
					About
				</a>
				<span class="header-separator">&nbsp;</span>
				<a class="header-item" href="/">
					Capabilities
				</a>
				<span class="header-separator">&nbsp;</span>
				<a class="header-item" href="/">
					Products
				</a>
				<span class="header-separator">&nbsp;</span>
				<a class="header-item" href="/">
					Platforms
				</a>
				<span class="header-separator">&nbsp;</span>
				<a class="header-item" href="/">
					Support
				</a>
			</div>
		</div>
		<div class="landing-strip-wrapper">
			<div class="intro-jet"></div>
			<div class="cloud-1"></div>
			<div class="cloud-2"></div>
			<div class="cloud-3"></div>
			<div class="cloud-4"></div>
			<div class="white-drift"></div>
			<div class="landing-strip-text">
				<div class="landing-strip-text-line">Hartwell Corporation</div>
				<div class="landing-strip-text-line">is the Market Leader</div>
				<div class="landing-strip-text-line">for Latches & Latching Systems</div>
				<div class="landing-strip-text-line">used in Aerospace, Defense & Commercial Aircraft</div>
			</div>
		</div>

		<?php if (isset($content)): ?>
			<?= $content ?>
		<?php endif; ?>

		<div class="product-types outer">
			<?php foreach ([
				['latches', 'latches'],
				['hinges', 'hinges'],
				['hold open rods', 'hold-open-rods'],
				['systems', 'systems'],
			] as $productType): ?>

			<div class="product-type">
				<div class="product-type-label">
					<?= $productType[0] ?>
				</div>
				<img src="/static/public/img/product-types/<?= $productType[1] ?>.png" />
			</div>

			<?php endforeach; ?>
		</div>

		<div id="footer">
			<div class="outer">
				<div class="footer-menu-section">
					<a href="#">About</a>
					<a href="#">Who We Are</a>
					<a href="#">History</a>
					<a href="#">Certifications</a>
					<a href="#">Capabilities</a>
					<a href="#">State-of-the-Art Mfg.</a>
				</div>
				<div class="footer-menu-section">
					<a href="#">Products</a>
					<a href="#">Latches</a>
					<a href="#">Hinges</a>
					<a href="#">Hold Open Rods</a>
					<a href="#">Systems</a>
				</div>
				<div class="footer-menu-section">
					<a href="#">Platforms</a>
					<a href="#">Commercial</a>
					<a href="#">Regional/Business Jet</a>
					<a href="#">Defense</a>
					<a href="#">Rotor Wing</a>
				</div>
				<div class="footer-menu-section">
					<a href="#">Support</a>
					<a href="#">After Market</a>
					<a href="#">FAA Repair</a>
					<a href="#">Our Patents</a>
				</div>
				<div class="footer-menu-section">
					<a href="#">News</a>
					<a href="#">Careers</a>
					<a href="#">HR</a>
					<a href="#">RFQ</a>
					<a href="#">Contact</a>
					<a href="#">Order Entry</a>
					<a href="#">CMM Login</a>
				</div>
				<div class="footer-menu-info">
					<img src="/static/public/img/bottom-logo.png" />
					<div>900 South Richfield Road</div>
					<div>Placentia, CA 92870-6788 USA</div>
					<div>Phone: +1 714 993 4200</div>
					<div>Fax: +1 714 579 4419</div>
				</div>
			</div>
		</div>
		<div class="by-beehive">site by Beehive</div>
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="/static/public/js/lib.js"></script>
	<script src="/static/public/js/common.js"></script>
</html>
