<div class="band-wrapper-outer">
	<div class="outer b-clear">

		<form id="contact-form" class="b-clear">

			<div class="recipient-selector">
				<?php foreach (['usa' => 'U.S.A', 'sales' => 'Sales', 'europe' => 'Europe', 'distributors' => 'Distributors'] as $grouping => $groupingLabel): ?>
					<?php if (${$grouping} && count(${$grouping})): ?>
						<div class="recipient-group">
							<h4><?= $groupingLabel ?></h4>
							<?php foreach (${$grouping} as $r): ?>
								<label>
									<input type="radio" name="recipient" value="<?= $r->email ?>" />
									<div class="input-labels">
										<?php if (! empty($r->location)): ?>
											<span><?= $r->location ?></span>
										<?php endif; ?>
										<?php if (! empty($r->name)): ?>
											<span><?= $r->name ?></span>
										<?php endif; ?>
										<?php if (! empty($r->phone)): ?>
											<span><?= $r->phone ?></span>
										<?php endif; ?>
										<?php if (! empty($r->other)): ?>
											<span><?= $r->other ?></span>
										<?php endif; ?>
									</div>
								</label>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>

			<div class="b-clear">
				<div class="form-left">
					<label>
						<span>Name</span>
						<input type="text" name="name" maxlength="200" />
					</label>
					<label>
						<span>Company</span>
						<input type="text" name="company" maxlength="200" />
					</label>
					<label>
						<span>Email</span>
						<input type="text" name="email" maxlength="200" />
					</label>
					<label>
						<span>Phone</span>
						<input type="text" name="phone" maxlength="200" />
					</label>
				</div>
			</div>

			<label class="comment">
				<span>Comment</span>
				<textarea name="comments" rows="6" maxlength="4048"></textarea>
			</label>

			<div class="form-actions">
				<div class="spinner-wrapper">
					<a class="form-submit-link">Send</a>
					<img src="/static/public/img/spinner.gif" />
				</div>
			</div>

		</form>
	</div>

	<div class="max-width contact-success-wrapper" style="display: none;">
		<h2>Thank You</h2>
		<p>We've received your enquiry and will contact you shortly.</p>
	</div>
</div>
