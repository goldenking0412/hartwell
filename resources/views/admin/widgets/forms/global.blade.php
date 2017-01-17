<div class="row">
	<div class="col-md-3 edit-field">
		<label>Title</label>
		<input class="form-control" ng-model="item.title" placeholder="Title" />
	</div>
	<div class="col-md-2 edit-field">
		<label>Contrast</label>
		<div class="full-width btn-group contrast-group" data-toggle-name="contrast" data-toggle="buttons-radio" >
			<button ng-repeat="contrast in contrasts" type="button" ng-value="contrast" class="btn btn-default" data-toggle="button" ng-class="{ active: contrast == item.contrast }" ng-click="item.contrast = contrast">[[ contrast ]]</button>
		</div>
	</div>
	<div class="col-md-2 edit-field">
		<label>Orientation</label>
		<div class="full-width btn-group contrast-group" data-toggle-name="orientation" data-toggle="buttons-radio" >
			<button ng-repeat="orientation in orientations" type="button" ng-value="orientation" class="btn btn-default" data-toggle="button" ng-class="{ active: orientation == item.orientation }" ng-click="item.orientation = orientation">[[ orientation ]]</button>
		</div>
	</div>
	<div class="col-md-5 edit-field" convert-markdown="body" ng-if="canHaveBody()">
		<label>Widget Body</label>
		<textarea class="form-control markdown-editor" ng-model="item.body" data-provide="markdown" rows="6"></textarea>
	</div>
	<div class="col-md-12 edit-field margin-top" ng-if="canHaveImage()">
		<div image-upload="item.image" class="text-center well" directory="widgets">
			<a class="btn btn-success full-width">[[ item.image ? 'Change' : 'Upload' ]] Panoramic Image</a>
		</div>
	</div>
</div>
