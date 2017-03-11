<div class="band-wrapper-outer">
	<div class="outer">
		<h2 class="news-headline">Hartwell News</h2>
	</div>
</div>
<div class="band-wrapper-outer">
	<div class="outer b-clear">
		@foreach ($news as $n)
			<div class="band news-item">
				<h3><a href="/news/<?= $n->slug ?>"><?= $n->title ?></a></h3>
				<?= $n->teaser ?>
			</div>
		@endforeach
	</div>
</div>
