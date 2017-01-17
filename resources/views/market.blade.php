<div id="slider" class="swipe">
	<div class="swipe-wrap">
		@foreach ($market->banners as $banner)
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
@foreach($market->bands as $band)

	<?= View::make('band', ['band' => $band])->render() ?>

@endforeach
<div class="band clear-both product-category-band clearfix center">
	@foreach($markets as $category)
		<a class="product-category-item" style="width: calc(100%/<?= count($markets)+1 ?>); background-image: url('/markets/<?= $category->image ?>');" href="/markets/<?= $category->slug ?>">
			<span><?= $category->title ?></span>
		</a>
	@endforeach
</div>

<div class="band clear-both product-category-band clearfix center">
	@foreach($productCategories as $category)
		<a class="product-category-item" style="width: calc(100%/<?= count($productCategories)+1 ?>); background-image: url('/product-categories/<?= $category->image ?>');" href="/products/<?= $category->slug ?>">
			<span><?= $category->title ?></span>
		</a>
	@endforeach
</div>
