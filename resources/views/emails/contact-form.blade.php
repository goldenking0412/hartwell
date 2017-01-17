<?php foreach ($inputs as $name => $input): ?>
	<?php if ($name === 'g-recaptcha-response') continue; ?>
	<h4><?= ucfirst($name) ?></h4>
	<?= empty($input) ? 'n/a' : $input ?><br />
<?php endforeach; ?>
