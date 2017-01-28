<div style="background-color: #<?= $band->background ?>;">
	<div class="outer">
		<?php if ($band->type === 'image-right-float'): ?>
		<div class="para-col-left">
			<div
				class="para"
				style="background-image: url('/floating/<?= $band->floating ?>');"
			></div>
			<div class="body">
				<?= $band->body ?>
			</div>
			<div
				class="img"
				style="background-image: url('/bands/<?= $band->image ?>');"
			></div>
		</div>
		<?php endif; ?>

		<?php if ($band->type === 'image-left-float'): ?>
		<div class="para-col-right">
			<div
				class="img"
				style="background-image: url('/bands/<?= $band->image ?>');"
			></div>
			<div class="body">
				<?= $band->body ?>
			</div>
			<div
				class="para"
				style="background-image: url('/floating/<?= $band->floating ?>');"
			></div>
		</div>
		<?php endif; ?>

		<?php if ($band->type === 'item-slideshow'): ?>
		<div class="item-slideshow">
			<div class="body">
				<?= $band->body ?>
			</div>
			<div
				class="img"
			>
				<div class="swipe swipe-item-slideshow">
					<div class="swipe-wrap">
						@foreach ($band->bandImages as $band_image)
							<div class="" style="background-image: url('/slideshow/<?= $band_image->image ?>');">&nbsp;</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>
</div>
