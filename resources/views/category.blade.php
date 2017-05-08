<div id="slider" class="swipe">
	<div class="swipe-wrap">
		@foreach ($category->banners as $banner)
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
	<div id="swipe-fade"></div>
</div>
<div id="sidenav" class="hide-tablet">
	<div class="outer">
		<div id="sn">
			@foreach($category->bands as $iii => $band)
				<?php if (! empty($band->section)): ?>
					<a href="#index-<?= (int) $iii ?>" class="band-link" index="<?= (int) $iii ?>">
						<?= $band->section ?>
					</a>
				<?php endif; ?>
			@endforeach
		</div>
	</div>
</div>
@foreach($category->bands as $band)
	<?= View::make('band', ['band' => $band])->render() ?>
@endforeach
