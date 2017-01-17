@include ( 'admin/widgets/forms/global' )

<div class="row margin-top">
	<div class="col-lg-12 text-center">
		<strong>Note:</strong> panoramic images will display inline beneath the title and (optional) body text for this widget. They should typically be at least 1400 pixels wide.
	</div>
</div>

<div sortable-parent="delta" class="well margin-top clearfix">
	<div class="well-options-container" sortable-child ng-repeat="item in item.panes">
		<div class="row margin-top margin-bottom">
			@include( 'admin/widgets/forms/controls' )
		</div>
		<div class="row">
			<div class="col-md-8" convert-markdown="data.body">
				<label>Pane Body</label>
				<textarea class="form-control markdown-editor" ng-model="item.data.body" data-provide="markdown" rows="4"></textarea>
			</div>
			<div class="col-md-4">
				<label>Image</label>
				<div image-upload="item.data.image" class="text-center" directory="widgets">
					<a class="btn btn-success full-width">[[ item.data.image ? 'Change' : 'Upload' ]] Pane Image</a>
				</div>
			</div>
		</div>
		<hr class="margin-top" />
	</div>
	<div class="row margin-top" ng-if="item.panes.length < 4">
		<div class="col-md-1">
			<a class="btn btn-success pull-left" ng-click="addPane()">Add Pane</a>
		</div>
	</div>
</div>