@include ( 'admin/widgets/forms/global' )
<div class="row margin-top">
	<div class="col-lg-6">
		<label>Columns for text</label>
		<select class="form-control" ng-model="item.data.width">
			@foreach ( $widths as $width )
			<option value="<?= $width['columns'] ?>"><?= $width['label'] ?></option>
			@endforeach
		</select>
	</div>
	<div class="col-lg-6">
		<strong>Note:</strong> panoramic images will display in the background behind the title and (suggested) body text for this widget. They should typically be exactly 1400 pixels wide.
	</div>
</div>
