<?php if ($page->type === 'home'): ?>
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
		<div class="floating-logo"></div>
	</div>
<?php endif; ?>
<?php if ($page->type !== 'home'): ?>

	<?php if (count($page->banners)): ?>
		<div id="slider" class="swipe <?= isset($hideSubNav) && $hideSubNav ? 'no-sub' : '' ?>">
			<div class="swipe-wrap">
				@foreach ($page->banners as $banner)
					<div class="hero home-hero" style="background-image: url('/banners/<?= $banner->image ?>');">
						<div class="max-width mobile-padding">
							<h1 class="page-headline">
								<?php if (! empty($banner->headline)): ?>
									<?= $banner->headline ?>
								<?php endif; ?>
							</h1>
							<?php if (! empty($banner->body)): ?>
								<div class="hero-box">
									<?= $banner->body ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	<?php endif; ?>

<?php endif; ?>

<?php if ($page->type === 'contact'): ?>
	<?= View::make('contact-form', [
		'usa' => @$usa,
		'sales' => @$sales,
		'europe' => @$europe,
		'distributors' => @$distributors,
		'sales_representatives' => @$sales_representatives,
	])->render() ?>
<?php endif; ?>

@foreach($page->bands as $band)

	<?= View::make('band', ['band' => $band])->render() ?>

@endforeach

<?php if ($page->type === 'news'): ?>
	<?= View::make('news', ['news' => @$news])->render() ?>
<?php endif; ?>

<?php if ($page->type === 'home'): ?>
	<?= View::make('supplier-logos')->render() ?>
<?php endif; ?>

<?php if ($page->type === 'hr'): ?>
	<div class="outer">
		<iframe
			src="https://www.californiadiversity.com/s/e-Hartwell-Corporation-jobs-e97811.html?pbid=67920"
			frameborder="0"
			style="width:100%;height:800px;"
		></iframe>
	</div>
<?php endif; ?>

<?php if ($page->type === 'careers'): ?>
	<?= view('careers', ['positions' => $positions])->render() ?>
<?php endif; ?>
