@include ( 'admin/widgets/forms/global' )

<div sortable-parent="delta" class="well margin-top">
	<div class="row margin-top well-options-container" sortable-child ng-repeat="item in item.panes">
		@include( 'admin/widgets/forms/controls' )
		<div class="col-lg-2">
			<label>Section Title</label>
			<input class="form-control" ng-model="item.data.title" />
		</div>
		<div class="col-lg-4">
			<label>Section Image</label>
			<div image-upload="item.data.image" class="text-center well" directory="widgets">
				<a class="btn btn-success full-width">[[ item.data.image ? 'Change' : 'Upload' ]] Section Image</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-1">
			<a class="btn btn-success pull-left" ng-click="addPane()">Add Pane</a>
		</div>
	</div>
</div>
