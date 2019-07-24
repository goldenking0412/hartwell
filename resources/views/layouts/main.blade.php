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
		<link rel="stylesheet" href="/static/public/stylesheets/cookie.css">
	</head>
	<body>
		<div class="main-container">
		<div id="top-header">
			<div class="outer">
				<?= View::make('global-times')->render() ?>
				<a href="/news">News</a>
				<span class="top-header-separator">|</span>
				<a href="/human-resources">HR</a>
				<span class="top-header-separator">|</span>
				<a href="/contact">Contact</a>
				<span class="top-header-separator">|</span>
				<a href="http://weborder.hartwellcorp.com/esuite8/Default.aspx?appname=Store&tabname=Login">E-Comm</a>
				<span class="top-header-separator">|</span>
				<a href="http://216.237.48.25/publications/">CMM Login</a>
				<span class="top-header-separator">|</span>
				<a href="tel:17149934200">+1 714&nbsp;993&nbsp;4200</a>
				<div class="search-wrapper">
					<form id="search" action="/search" method="get" novalidate="novalidate">
						<input type="text" name="query" placeholder="Search" />
						<a href="#" id="search-submit">&nbsp;</a>
					</form>
				</div>
			</div>
		</div>
		<div id="header">
			<div class="inner-outer b-clear">
				<a id="logo" href="/" title="Hartwell">
					&nbsp;
				</a>
				<span class="header-separator">&nbsp;</span>
				<a class="header-item" href="/#who-we-are">
					About Us
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
			<div id="mobile-header-number" class="mobile-only">
				<a href="tel:17149934200">+1 714 993 4200</a>
			</div>
			<section class="cookies_sch" data-swiftype-index="false" id="cookies_section">
				<div class="cookies_content">
					<p>
            By continuing to browse or closing this window by clicking "X" you are providing consent to the storing of cookies on your device to enhance site navigation and analyze site usage. You can reject cookies by changing your browser settings. 
            <a class="cookie-link" href="/cookie-policy">Cookie Policy</a>
        	</p>
				</div>
				<a href="#" class="close-cookie"></a>
			</section>
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

		<?php if (!stristr($currentRoute, 'cookie-policy')): ?>
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
		<?php endif; ?>

		<div id="footer">
			<div class="outer">
				<div class="footer-menu-section">
					<a href="/#who-we-are">About Us</a>
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
					<a href="/platforms">Platforms</a>
					<?php foreach ($globalData['platformCategories'] as $p): ?>
						<a href="/platforms/<?= $p->slug ?>"><?= ucwords($p->title) ?></a>
					<?php endforeach; ?>
				</div>
				<div class="footer-menu-section">
					<a href="/support">Support</a>
					<a href="/support/aftermarket-support">After Market</a>
					<a href="/support/faa-repair-station">FAA Repair</a>
					<a href="/support/quality-control">Quality Control</a>
					<a href="/patents">Hartwell Patents</a>
				</div>
				<div class="footer-menu-section">
					<a href="/news">News</a>
					<a href="/human-resources">HR</a>
					<a href="/contact">Contact</a>
					<a href="http://216.237.48.25/publications/">CMM Login</a>
				</div>
				<div class="footer-menu-section">
					<?php foreach (\App\Models\FooterItem::orderBy('delta')->get()->toArray() as $fi): ?>
						<?php
							if ($fi['name'] === '&nbsp;') continue;
							$fil = $fi['link'];
							// If it's not a URL, and isn't relative, it's a file.
							if (strpos($fil, 'http') !== 0 && strpos($fil, '/') !== 0) {
								$fil = '/resources/' . $fil;
							}
						?>
						<a href="<?= $fil ?>" target="_blank">
							<?= $fi['name'] ?>
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
		<div class="by-beehive"><a href="http://beehiveagency.com">site by Beehive</a></div>
		<?= View::make('mobile-menu')->render() ?>
		</div>
		<div id="privacyBack"></div>
		<div id="privacyDialogWrapper" title="">
			<div id="privacyDialog">
				<div class="privacy-dialog-header">
					<span>Privacy Notice Pursuant to Article 13 GDPR</span>
				</div>
				<p>Hartwell Corporation, 900 S. Richfield, Placentia, CA 92780 is the ‘Controller’ of the information you have provided.<br/>We collect and process your personal data for the purpose of allowing you to access website content and providing you information about our products.<br/>The legal basis for processing your information is necessary for the purposes of the overriding legitimate interests pursued by the controller or by a third party.<br/>The legitimate interests of the controller of the information are the processing of your data is required for security purpose of the website content and for providing product information to you and for direct marketing.<br/>The period for storage of your data depends and is determined by factors such as the typical need for such information and storage and space constraints.<br/>We may process the information to a third party email marketing firm and IT hosting company for the purpose set out above.<br/>Hartwell Corporation, Email marketing and IT hosting companies are located outside the European Union. In the event that the recipient country does not ensure a level of data protection equivalent to that of the European Union, the company undertakes to take all appropriate guarantees, either on the basis of an adequacy decision such as that for the Privacy Shield, or, in the absence of such a decision, on the basis of appropriate guarantees, in particular those drawn up on the model of standard contractual clauses made public by the European Commission a copy of which may be requested at the follow e-mail address GDPR@hartwellcorp.com.<br/>You have right to access, modify, rectify, limit and to portability or delete any personal data as well as a right of opposition, if necessary subject to legitimate and imperative reasons, to the processing of these data.<br/>If you wish to exercise your rights, you can contact GDPR@hartwellcorp.com.<br/>You also have the right to lodge a complaint with a supervisory authority.<br/>You have the right to withdraw your consent to the processing of your data anytime. The withdrawal does not affect the lawfulness of processing based on your consent before its withdrawal.<br/>If you would like to withdraw your consent, please contact GDPR@hartwellcorp.com.<br/>You have the right to object to the processing of your personal data for marketing purposes at any time.<br/>You have the right to object to the processing of your personal data at any time on grounds relating to your particular situation. We ask you to provide reasons and legitimate interest to back up your objection. In case of a legal objection, we shall no longer process your personal data unless we have compelling legitimate grounds for the processing which override your interests, rights and freedoms of the data subject or for the establishment, exercise or defence of legal claims. We shall inform you on the grounds of our decisions.<br/>
				</p>
			</div>
			
		</div>
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="/static/public/js/lib.js"></script>
	<script src="/static/public/js/common.js"></script>
	<script src="/static/public/js/cookie.js"></script>
	<script src="/static/public/js/js-cookie.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-l8wyp7WNl5ViWFzPfUmRLKkqCpAR9Og&callback=initMap" defer></script>
</html>
