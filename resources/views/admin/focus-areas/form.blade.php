<div ng-controller="ResourceController" data-laravel-resource="FocusArea" data-laravel-stem="/admin/focus-area/" data-options="markup" class="margin-bottom" name="top">
	<div class="row" convert-markdown="body">
		<div class="col-md-12">
			<div class="btn-group pull-right">
				<?= HTML::actions( FocusArea::$required_fields ) ?>
				<ul class="dropdown-menu pull-left">
					<li><a ng-click="save()">Save</a></li>
					<li><a ng-click="get()">Revert</a></li>
				</ul>
			</div>

			<h4 class="edit-header">
				[[ item.id ? 'Editing' : 'Creating' ]] Focus Area: <span class="title" ng-class="{ untitled: !item.title }">"[[ item.title ? item.title : 'Untitled' ]]"</span>
				&nbsp;
				<a target="_blank" ng-if="item.id" href="/focus-area/[[ item.slug ]]">(view)</a>
			</h4>
		</div>

		<div class="col-md-12 edit-field">
			<label for="published" class="pull-left">Published</label>
			<input type="checkbox" name="published" value="item.published" ng-checked="item.published" ng-model="item.published" />
		</div>

		<div class="col-md-12">
			<h3 class="edit-header">Basic Info</h3>
		</div>

		<div class="col-md-4 edit-field">
			<label for="title">Title</label>
			<input maxlength="70" class="form-control" type="text" name="title" ng-model="item.title" />
		</div>

		<div class="col-md-4 edit-field">
			<label for="title">Subtitle</label>
			<input maxlength="96" class="form-control" type="text" name="title" ng-model="item.subtitle" />
		</div>

		<div class="col-md-4 edit-field">
			<label for="slug">Slug</label>
			<input maxlength="64" class="form-control" type="text" name="slug" ng-disabled="item.id" ng-model="item.slug" />
		</div>

		<div class="col-md-4 edit-field">
			<label for="title">Contact Name</label>
			<input maxlength="128" class="form-control" type="text" name="title" ng-model="item.contact_name"/>
		</div>

		<div class="col-md-4 edit-field">
			<label for="title">Contact Email</label>
			<input maxlength="40" class="form-control" type="text" name="title" ng-model="item.contact_email" />
		</div>

		<div class="col-md-4 edit-field">
			<label for="slug">Contact Phone</label>
			<input maxlength="20" class="form-control" type="text" name="slug" ng-model="item.contact_phone" />
		</div>

		<div class="col-md-4 edit-field">
			<label for="contrast">Contrast</label>
			<div class="full-width btn-group contrast-group" data-toggle-name="contrast" data-toggle="buttons-radio" >
				<button ng-repeat="contrast in contrasts" type="button" ng-value="contrast" class="btn btn-default" data-toggle="button" ng-class="{ active: contrast == item.contrast }" ng-click="item.contrast = contrast">[[ contrast ]]</button>
			</div>
			<input type="hidden" name="contrast" value="contrast" ng-model="item.contrast" />
		</div>

		<div class="col-md-12 edit-field">
			<label for="body">Body copy</label>
			<a data-toggle="modal" href="#markdown-modal" class="btn btn-default btn-small modal-button hidden-xs">How do I write markdown?</a>
			<textarea class="form-control markdown-editor" name="body" ng-model="item.body" data-provide="markdown"></textarea>
		</div>

		<div class="col-md-12 edit-field">
			<div image-upload="item.image" class="text-center well banner-upload-well" crops="tinybanner" directory="focus-areas/banners">
				<a class="btn btn-success full-width">[[ item.image ? 'Change' : 'Upload' ]] Banner Image<span class="icon-upload icon-white"></a>
				<?= HTML::image_dimensions( 'tinybanner' ) ?>
			</div>
		</div>
	</div>

	<hr />

	<div class="row column-row">
		<div class="col-md-12">
			<h3 class="edit-header">Resources</h3>
		</div>
		<div class="col-md-12 edit-field">
			<ul class="list-unstyled" sortable-parent="delta">

				<li class="well edit-field clearfix" ng-controller="ResourceController" data-laravel-resource="Resource" ng-repeat="item in item.resources | orderBy: 'delta'" sortable-child>
					<input class="form-control" type="text" ng-model="item.title" placeholder="Title" />
					<input class="form-control" type="text" ng-model="item.cta" placeholder="Download CTA" />
					<p class="pull-left btn btn-default disabled">[[ item.delta + 1 ]] / [[ $parent.$parent.item.resources.length ]]</p>
					<div class="well-options-container btn-group pull-right">
						<a class="btn btn-default sorter-handle" ng-if="$parent.$parent.item.resources.length > 1">Move<span class="glyphicon-move glyphicon"></span></a>
						<a class="btn btn-default" ng-if="item.filename" href="[[ ASSET_BASE + 'resources/' + item.filename ]]" target="_blank">Download file</a>
						<a class="btn btn-default" asset-upload="item.filename" directory="resources">Replace file</a>
						<a class="btn btn-danger delete" ng-click="removeFrom( $parent.$parent.item.resources )">Delete</a>
					</div>
				</li>

				<li class="well edit-field clearfix" ng-controller="ResourceController" data-laravel-resource="Resource" new-child-with="focus_area_id pushing [ 'title', 'pdf' ] into $parent.item.resources">
					<input class="form-control" type="text" ng-model="item.title" placeholder="Title" />
					<input class="form-control" type="text" ng-model="item.cta" placeholder="Download CTA" />
					<div class="well-options-container btn-group pull-right">
						<a class="btn btn-default" asset-upload="item.filename" directory="resources">Upload file</a>
						<a class="btn btn-success" ng-class="{ disabled: !item.title || !item.filename || !item.cta }" ng-click="saveChild()">Add Press</a>
					</div>
				</li>

			</ul>
		</div>
	</div>

	<div ng-if="item.id">
		<hr />

		@include( 'admin.widgets.index' )
	</div>

	<hr />

	@include( 'admin.partials.meta' )
</div>

@include( 'admin.partials.markdown-instructions' )
