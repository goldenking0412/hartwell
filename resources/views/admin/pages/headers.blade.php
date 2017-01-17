<h2>Page Headers</h2>
<div id="page-headers" ng-repeat="item in headers" ng-hide="item.for == 'contact'" ng-controller="ResourceController" data-laravel-resource="Header">
	<div class="row">
		<div class="col-md-12 margin-top">
			<div class="pull-right">
				<div class="btn-group full-width">
					<?= HTML::actions( Header::$required_fields ) ?>
					<ul class="dropdown-menu pull-right">
						<li><a ng-click="save()">Save</a></li>
						<li><a ng-click="get()">Revert</a></li>
					</ul>
				</div>
			</div>
			<h3 class="capitalize edit-header flat-top">[[ item.for ]]</h3>
		</div>

		<div class="col-md-2 edit-field">
			<label for="title">Title</label>
			<input class="form-control" ng-model="item.title" />
		</div>

		<div class="col-md-2 edit-field">
			<label for="contrast">Contrast</label>
			<div class="full-width btn-group contrast-group" data-toggle-name="contrast" data-toggle="buttons-radio" >
				<button ng-repeat="contrast in contrasts" type="button" ng-value="contrast" class="btn btn-default" data-toggle="button" ng-class="{ active: contrast == item.contrast }" ng-click="item.contrast = contrast">[[ contrast ]]</button>
			</div>
			<input type="hidden" name="contrast" value="contrast" ng-model="item.contrast" />
		</div>

		<div class="col-md-12 edit-field" ng-if="item.for != 'newsletter'">
			<label for="title">Blurb</label>
			<textarea rows="5" class="form-control" ng-model="item.subtitle"></textarea>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 edit-field">
			<div class="well edit-field text-center" image-upload="item.image" crops="tinybanner" directory="banners">
				<a class="btn btn-success">[[ item.image ? 'Change' : 'Upload' ]] Splash image</a>
				<span><?= HTML::image_dimensions( 'tinybanner' ) ?></span>
			</div>
		</div>
	</div>
	<hr />
</div>
