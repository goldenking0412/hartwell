<div class="supplier-logos-wrapper">
	<div class="supplier-logos-fade-in"></div>

	<div class="supplier-logos outer">

		<h2>A Preferred Supplier</h2>

		<div class="suppliers">
			<?php foreach (\App\Models\SupplierLogo::orderBy('delta')->get() as $l): ?>

				<div class="supplier">
					<div class="supplier-logo-wrap">
						<img src="/suppliers/<?= $l->image ?>" alt="<?= $l->name ?>" />
					</div>
					<span class="supplier-name-wrap">
						<?= $l->name ?>
					</span>
				</div>

			<?php endforeach; ?>
		</div>

	</div>

	<div class="supplier-logos-fade-out"></div>
</div>
