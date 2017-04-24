<div id="wireframe" style="background-image: url('/platforms-img/<?= $category->image ?>');" class="hide-mobile">
	<div class="wireframe-fg" style="background-image: url('/platforms-img/<?= $category->image_2 ?>');">

	<?php foreach ($category->hotspots as $key => $h): ?>
		<div class="wireframe-circle"
			style="
				left: <?= $h->x ?>%;
				top: <?= $h->y ?>%;
			"
		>
			<?php if (! empty($h->link)): ?>
				<a href="<?= $h->link ?>"><?= $h->text ?></a>
			<?php else: ?>
				<span><?= $h->text ?></span>
			<?php endif; ?>
		</div>
	<?php endforeach; ?>

	</div>
</div>
<div id="slider" class="swipe mobile-only">
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
					<a href="#" class="band-link" index="<?= (int) $iii ?>">
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
