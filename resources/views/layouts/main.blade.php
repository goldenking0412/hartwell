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
		<div class="main-container">
		<div id="top-header">
			<div class="outer">
				<a href="/news">News</a>
				<span class="top-header-separator">|</span>
				<a href="/human-resources">HR</a>
				<span class="top-header-separator">|</span>
				<a href="/contact">Contact</a>
				<span class="top-header-separator">|</span>
				<a href="#">Order Entry</a>
				<span class="top-header-separator">|</span>
				<a href="http://www.hartwellcorp.com/publications/">CMM Login</a>
				<span class="top-header-separator">|</span>
				<a href="tel:17149934200">+1 714&nbsp;993&nbsp;4200</a>
			</div>
		</div>
		<div id="header">
			<div class="inner-outer b-clear">
				<a id="logo" href="/" title="Hartwell">
					&nbsp;
				</a>
				<span class="header-separator">&nbsp;</span>
				<a class="header-item" href="/#who-we-are">
					About
				</a>
				<span class="header-separator">&nbsp;</span>
				<a class="header-item" href="/capabilities">
					Capabilities
				</a>
				<span class="header-separator">&nbsp;</span>
				<a class="header-item" href="/products">
					Products
				</a>
				<span class="header-separator">&nbsp;</span>
				<a class="header-item" href="/platforms">
					Platforms
				</a>
				<span class="header-separator">&nbsp;</span>
				<a class="header-item" href="/support">
					Support
				</a>
				<a class="mobile-only" id="mobile-menu" href="#">&equiv;</a>
			</div>
		</div>
		<?php if (stristr($currentRoute, 'support/')): ?>
			<div id="sub-header">
				<div class="inner-outer">
					<span class="header-separator">&nbsp;</span>
					<a href="/support/aftermarket-support"
						class="<?= stristr($currentRoute, 'aftermarket-support') ? 'active' : '' ?>"
					>Aftermarket Support</a>
					<span class="header-separator">&nbsp;</span>
					<a href="/support/faa-repair-station"
						class="<?= stristr($currentRoute, 'faa-repair-station') ? 'active' : '' ?>"
					>FAA Repair Station</a>
					<span class="header-separator">&nbsp;</span>
					<a href="/support/quality-control"
						class="<?= stristr($currentRoute, 'quality-control') ? 'active' : '' ?>"
					>Quality Control</a>
					<span class="header-separator">&nbsp;</span>
				</div>
			</div>
		<?php endif; ?>
		<?php if (stristr($currentRoute, 'products/')): ?>
			<div id="sub-header">
				<div class="inner-outer">
					<span class="header-separator">&nbsp;</span>
					<?php foreach ($globalData['productCategories'] as $productType): ?>
						<a href="/products/<?= $productType->slug ?>" class="<?= $globalData['category']->id == $productType->id ? 'active' : '' ?>">
							<?= $productType->title ?>
						</a>
						<span class="header-separator">&nbsp;</span>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if (stristr($currentRoute, 'platforms/')): ?>
			<div id="sub-header">
				<div class="inner-outer">
					<span class="header-separator">&nbsp;</span>
					<?php foreach ($globalData['platformCategories'] as $productType): ?>
						<a href="/platforms/<?= $productType->slug ?>" class="<?= $globalData['category']->id == $productType->id ? 'active' : '' ?>">
							<?= $productType->title ?>
						</a>
						<span class="header-separator">&nbsp;</span>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if (isset($content)): ?>
			<?= $content ?>
		<?php endif; ?>

		<div class="product-types-outer-wrapper">
		<div class="product-types outer">
			<?php foreach ($globalData['productCategories'] as $productType): ?>

			<a href="/products/<?= $productType->slug ?>" class="product-type">
				<div class="product-type-label">
					<?= ucwords($productType->title) ?>
				</div>
				<img src="/product-categories/<?= $productType->image ?>" />
			</a>

			<?php endforeach; ?>
		</div>
		</div>

		<div id="footer">
			<div class="outer">
				<div class="footer-menu-section">
					<a href="/#who-we-are">About</a>
					<a href="/#who-we-are">Who We Are</a>
					<a href="/#history">History</a>
					<a href="/capabilities">Capabilities</a>
				</div>
				<div class="footer-menu-section">
					<a href="/products">Products</a>
					<?php foreach ($globalData['productCategories'] as $p): ?>
						<a href="/products/<?= $p->slug ?>"><?= ucwords($p->title) ?></a>
					<?php endforeach; ?>
				</div>
				<div class="footer-menu-section">
					<a href="#">Platforms</a>
					<a href="#">Commercial</a>
					<a href="#">Regional/Business Jet</a>
					<a href="#">Defense</a>
					<a href="#">Rotor Wing</a>
				</div>
				<div class="footer-menu-section">
					<a href="/support">Support</a>
					<a href="/support/aftermarket-support">After Market</a>
					<a href="/support/faa-repair-station">FAA Repair</a>
					<a href="/support/quality-control">Quality Control</a>
				</div>
				<div class="footer-menu-section">
					<a href="/news">News</a>
					<a href="/human-resources">HR</a>
					<a href="/contact">Contact</a>
					<a href="http://www.hartwellcorp.com/publications/">CMM Login</a>
				</div>
				<div class="footer-menu-section">
					<?php foreach (\App\Models\FooterItem::all() as $fi): ?>
						<?php
							$fil = $fi->link;
							// If it's not a URL, and isn't relative, it's a file.
							if (strpos($fil, 'http') !== 0 && strpos($fil, '/') !== 0) {
								$fil = '/resources/' . $fil;
							}
						?>
						<a href="<?= $fil ?>">
							<?= $fi->name ?>
						</a>
					<?php endforeach ?>
				</div>
				<div class="footer-menu-info">
					<img src="/static/public/img/bottom-logo.png" />
					<div>900 South Richfield Road</div>
					<div>Placentia, CA 92870-6788 USA</div>
					<div>Phone: <a href="tel:17149934200">+1 714 993 4200</a></div>
					<div>Fax: +1 714 579 4419</div>
				</div>
			</div>
		</div>
		<div class="by-beehive">site by Beehive</div>
		<?= View::make('mobile-menu')->render() ?>
		</div>
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="/static/public/js/lib.js"></script>
	<script src="/static/public/js/common.js"></script>
</html>
