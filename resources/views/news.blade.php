<div class="band black news-heading">
	<div class="max-width">
		<h2>News</h2>
	</div>
</div>
@foreach ($news as $n)
	<div class="band news-item">
		<div class="max-width module">
			<h3><?= $n->title ?></h3>
			<?= $n->teaser ?>
			<a href="/news/<?= $n->slug ?>">Read More</a>
		</div>
	</div>
@endforeach
