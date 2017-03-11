<div style="background-color: #<?= $band->background ?>;" class="band-wrapper-outer">
	<div class="outer">
		<?php if ($band->type === 'image-right'): ?>
		<div class="para-col-left-1">
			<div class="body">
				<?= $band->body ?>
			</div>
			<div
				class="img tablet-only"
				style="background-image: url('/bands/<?= $band->image ?>');"
			></div>
			<img src="/bands/<?= $band->image ?>" class="mobile-only" />
		</div>
		<?php endif; ?>

		<?php if ($band->type === 'image-left'): ?>
		<div class="para-col-right-1">
			<img src="/bands/<?= $band->image ?>" class="mobile-only" />
			<div
				class="img tablet-only"
				style="background-image: url('/bands/<?= $band->image ?>');"
			></div>
			<div class="body">
				<?= $band->body ?>
			</div>
		</div>
		<?php endif; ?>

		<?php if ($band->type === 'image-right-float'): ?>
		<div class="para-col-left">
			<div
				class="para hide-mobile"
				style="background-image: url('/floating/<?= $band->floating ?>');"
			></div>
			<div class="body">
				<?= $band->body ?>
			</div>
			<div
				class="img hide-mobile"
				style="background-image: url('/bands/<?= $band->image ?>');"
			></div>
			<img class="mobile-only" src="/bands/<?= $band->image ?>" />
		</div>
		<?php endif; ?>

		<?php if ($band->type === 'image-left-float'): ?>
		<div class="para-col-right">
			<div
				class="img hide-mobile"
				style="background-image: url('/bands/<?= $band->image ?>');"
			></div>
			<img class="mobile-only" src="/bands/<?= $band->image ?>" />
			<div class="body">
				<?= $band->body ?>
			</div>
			<div
				class="para hide-mobile"
				style="background-image: url('/floating/<?= $band->floating ?>');"
			></div>
		</div>
		<?php endif; ?>

		<?php if ($band->type === 'item-slideshow'): ?>
		<div class="item-slideshow">
			<div class="faux hide-tablet"></div>
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
