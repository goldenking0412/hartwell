<div class="outer">
	<div class="search-landing">

		<h2>Search: <em>{{ empty(\Input::get('query')) ? 'Empty' : \Input::get('query') }}</em></h2>

		<div class="results">

			<?php if (empty($results)): ?>
				<div class="result">No results found.</div>
			<?php else: ?>

				<?php foreach ($results as $r): ?>

					<div class="result">
						<?php
							$base = \URL::to('') . '/';

							switch ($r->type) {
								case 'page':
									$base .= $r->slug;
									break;
								case 'news':
									$base .= 'news/' . $r->slug;
									break;
								case 'product_category':
									$base .= 'products/' . $r->slug;
									break;
								case 'platform_category':
									$base .= 'platforms/' . $r->slug;
									break;
								default:
									break;
							}

						?>
						<a href="<?= $base ?>">

						<h3>
							<?= ucwords($r->title) ?>
						</h3>

						<div class="result-link">
							<?= $base ?>
						</div>

						<div class="preview">
							<p>
							<?php
								$t = strip_tags($r->body);
								if (strlen($t) > 300) {
									$t = substr($t, 0, 300) . '...';
								}

								echo $t;
							?>
							</p>
						</div>
						</a>
					</div>

				<?php endforeach; ?>

			<?php endif; ?>

		</div>

	</div>
</div>
