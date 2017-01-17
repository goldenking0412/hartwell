<div class="band">
	<div class="max-width">
		<?php foreach ($positions as $position): ?>
			<div class="position-wrapper">
				<h3><?= $position->title ?></h3>
				<div class="position-teaser">
					<?= str_limit($position->body, 260, '...') ?>
				</div>
				<a href="/careers/<?= $position->slug ?>">Apply Now</a>
			</div>
		<?php endforeach; ?>
	</div>
</div>
