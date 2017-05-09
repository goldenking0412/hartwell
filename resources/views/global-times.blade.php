<div class="global-times hide-tablet">
<?php

$la_time = new DateTime('now', new DateTimeZone('America/Los_Angeles'));
$ny_time = new DateTime('now', new DateTimeZone('America/New_York'));
$ln_time = new DateTime('now', new DateTimeZone('Europe/London'));
$hk_time = new DateTime('now', new DateTimeZone('Asia/Hong_Kong'));

?>

	<div class="time-wrapper">
		<span class="location">Los Angeles</span>
		<span class="time" timezone="la"><?= $la_time->format('H:i') ?></span>
	</div>

	<div class="time-wrapper">
		<span class="location">New York</span>
		<span class="time" timezone="ny"><?= $ny_time->format('H:i') ?></span>
	</div>

	<div class="time-wrapper">
		<span class="location">London</span>
		<span class="time" timezone="ln"><?= $ln_time->format('H:i') ?></span>
	</div>

	<div class="time-wrapper">
		<span class="location">Hong Kong</span>
		<span class="time" timezone="hk"><?= $hk_time->format('H:i') ?></span>
	</div>

</div>
