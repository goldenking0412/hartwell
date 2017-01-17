<div ng-controller="ResourceController" data-laravel-resource="Job" data-laravel-stem="/admin/job/" data-options="markup" class="margin-bottom" convert-markdown="requirements">

	<div class="row">
		<div class="col-md-12">
			<div class="btn-group pull-right">
				<?= HTML::actions( Job::$required_fields ) ?>
				<ul class="dropdown-menu pull-left">
					<li><a ng-click="save()">Save</a></li>
					<li><a ng-click="get()">Revert</a></li>
					<li ng-if="item.id"><a ng-click="delete()">Delete</a></li>
				</ul>
			</div>

			<h4 class="edit-header">
				[[ item.id ? 'Editing' : 'Creating' ]] Job Listing: <span class="title" ng-class="{ untitled: !item.title }">"[[ item.title ? item.title : 'Untitled' ]]"</span>
				&nbsp;
				<a target="_blank" ng-if="item.id" href="/jobs/apply/[[ item.slug ]]">(view)</a>
			</h4>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 edit-field">
			<label for="published" class="pull-left">Published</label>
			<input type="checkbox" name="published" value="item.published" ng-checked="item.published" ng-model="item.published" />
		</div>
		<div class="col-md-3 edit-field">
			<label>Title</label>
			<input class="form-control" type="text" ng-model="item.title" />
		</div>
		<div class="col-md-3 edit-field">
			<label>Slug</label>
			<input class="form-control" type="text" ng-model="item.slug" ng-disabled="item.id" />
		</div>
		<div class="col-md-3 edit-field">
			<label>Role</label>
			<select class="form-control" chosen-select="roles" ng-model="item.role_id" ng-options="role.id as role.title for role in roles" data-placeholder="Role"></select>
		</div>
		<div class="col-md-3 edit-field">
			<label>Location</label>
			<select class="form-control" chosen-select="locations" ng-model="item.location_id" ng-options="location.id as location.city for location in locations" data-placeholder="Location"></select>
		</div>
		<div class="col-md-3 edit-field">
			<label>Contact Email</label>
			<input class="form-control" type="text" ng-model="item.destination" />
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 edit-field">
			<label for="body">Body</label>
			<a data-toggle="modal" href="#markdown-modal" class="btn btn-default btn-small modal-button hidden-xs">How do I write markdown?</a>
			<textarea class="form-control markdown-editor" name="body" ng-model="item.requirements" data-provide="markdown"></textarea>
		</div>
	</div>

</div>

@include( 'admin.partials.markdown-instructions' )
