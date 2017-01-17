@include ( 'admin/widgets/forms/global' )

<div sortable-parent="delta" class="well margin-top">
	<div class="row margin-top well-options-container" sortable-child ng-repeat="item in item.panes">
		@include( 'admin/widgets/forms/controls' )
		<div class="col-lg-2">
			<label>Section Title</label>
			<input class="form-control" ng-model="item.data.title" />
		</div>
		<div class="col-lg-4">
			<label>UX Image</label>
			<div image-upload="item.data.image" class="text-center well" directory="widgets">
				<a class="btn btn-success full-width">[[ item.data.image ? 'Change' : 'Upload' ]] UX Image</a>
				<small>Note that this image should be <strong>exactly</strong> the same size as the UI image</small>
			</div>
		</div>
		<div class="col-lg-4">
			<label>UI Image</label>
			<div image-upload="item.data.image2" class="text-center well" directory="widgets">
				<a class="btn btn-success full-width">[[ item.data.image2 ? 'Change' : 'Upload' ]] UI Image</a>
				<small>Note that this image should be <strong>exactly</strong> the same size as the UX image</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-1">
			<a class="btn btn-success pull-left" ng-click="addPane()">Add Pane</a>
		</div>
	</div>
</div>