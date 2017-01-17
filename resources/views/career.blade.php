<div class="band black">
	<div class="max-width">
		<h2><?= $position->title ?></h2>
		<div class="position-body">
			<?= $position->body ?>
		</div>
	</div>
</div>

<div class="band">

	<div class="max-width apply-wrapper">
		<h2>Apply Now</h2>

		<form id="application-form" class="clearfix" data-position-name="<?= $position->title ?>">
			<div class="clearfix">
				<div class="form-left">
					<input type="hidden" name="position_id" value="<?= $position->id ?>" />
					<input type="hidden" name="resume" value="none" />
					<label>
						<span>Name</span>
						<input type="text" name="name" maxlength="200" />
					</label>
					<label>
						<span>Email</span>
						<input type="text" name="email" maxlength="200" />
					</label>
				</div>

				<div class="form-right">
					<label>
						<span>Phone</span>
						<input type="text" name="phone" maxlength="200" />
					</label>
					<label class="hide">
						<span>Resume Upload</span>
						<div id="resume-upload-wrapper">
							<input type="file" name="resume-dummy" id="resume-upload" />
						</div>
					</label>
				</div>
			</div>

			<div class="form-actions">
				<div class="hide g-recaptcha" data-sitekey="6LfVlxMTAAAAAFlA_XWQGkHyK4n1ekZe344dr6zg"></div>
				<div class="spinner-wrapper">
					<a href="#" class="form-submit-link">Apply</a>
					<img src="/static/public/img/spinner.gif" />
				</div>
			</div>

		</form>
	</div>

	<div class="max-width apply-success-wrapper" style="display: none;">
		<h2>Thank You</h2>
		<p>We've received your application.</p>
	</div>
</div>
