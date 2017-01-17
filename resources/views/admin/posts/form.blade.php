<div ng-controller="ResourceController" data-laravel-resource="Post" data-laravel-stem="/admin/post/" data-options="markup" class="margin-bottom" convert-markdown="body" name="top">
	<div class="row">
		<div class="col-md-12">
			<div class="btn-group pull-right">
				<?= HTML::actions( Post::$required_fields ) ?>
				<ul class="dropdown-menu pull-left">
					<li><a ng-click="save()">Save</a></li>
					<li><a ng-click="get()">Revert</a></li>
				</ul>
			</div>

			<h4 class="edit-header">
				[[ item.id ? 'Editing' : 'Creating' ]] Post: <span class="title" ng-class="{ untitled: !item.title }">"[[ item.title ? item.title : 'Untitled' ]]"</span>
				&nbsp;
				<a target="_blank" ng-if="item.id" href="/news/[[ item.slug ]]">(view)</a>
			</h4>
		</div>
		<div class="col-md-12 edit-field">
			<label for="published" class="pull-left">Published</label>
			<input type="checkbox" name="published" value="item.published" ng-checked="item.published" ng-model="item.published" />
		</div>
		<div class="col-md-3 edit-field">
			<label for="title">Title</label>
			<input class="form-control" type="text" name="title" ng-model="item.title" />
		</div>
		<div class="col-md-3 edit-field">
			<label for="slug">Slug</label>
			<input class="form-control" type="text" name="slug" ng-model="item.slug" ng-disabled="item.id" />
		</div>
		<div class="col-md-3 edit-field">
			<label for="employee">Author</label>
			<select class="form-control" name="employee" chosen-select="employees" ng-model="item.employee_id" ng-options="employee.id as employee.name for employee in employees" data-placeholder="Employee"></select>
		</div>
		<div class="col-md-3 edit-field" ng-controller="PostController">
			<label for="topics">Topics</label>
			<select name="topics" chosen-select="topics" multiple ng-model="item.topicIds" ng-options="topic.id as topic.title for topic in topics" data-placeholder="Topics"></select>
		</div>
		<div class="col-md-3 edit-field" ng-controller="PostController">
			<label for="topics">Focus Areas</label>
			<select name="focus_areas" chosen-select="focus_areas" multiple ng-model="item.focusAreaIds" ng-options="focus_area.id as focus_area.title for focus_area in focus_areas" data-placeholder="Focus Areas"></select>
		</div>
		<div class="col-md-3 edit-field">
			<label for="created_at">Post Date</label>
			<input datetimepicker="item.created_at" type="text" class="form-control" />
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 edit-field">
			<label for="body">Body</label>
			<a data-toggle="modal" href="#markdown-modal" class="btn btn-default btn-small modal-button hidden-xs">How do I write markdown?</a>
			<textarea class="form-control markdown-editor" name="body" ng-model="item.body" data-provide="markdown"></textarea>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 edit-field">
			<div image-upload="item.image" class="text-center well" crops="post" directory="posts">
				<a class="btn btn-success">[[ item.image ? 'Change' : 'Upload' ]] Image</a><br />
				<?= HTML::image_dimensions( 'post' ) ?>
			</div>
		</div>
	</div>

	@include( 'admin.partials.meta' )

</div>

@include( 'admin.partials.markdown-instructions' )
