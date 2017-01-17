<div id="services" sortable-parent="delta" autosave="true">
	<div class="row">
		<div class="col-md-12">
			<h2>Services</h2>
			<?= HTML::image_dimensions( 'services' ) ?>
		</div>
	</div>
	<div class="row well services-well" ng-controller="ResourceController" data-laravel-resource="Service" ng-repeat="item in services | orderBy: 'delta'" sortable-child>
		<div class="col-md-1 sorter-handle text-center"><i class="icon-move glyphicon glyphicon-move"></i></div>
		<div class="col-md-4">
			<div class="input-group margin-bottom">
				<span class="input-group-addon flat-bottom">[[ item.delta ]]</span>
				<input type="text" class="form-control input-sm" ng-model="item.title" placeholder="Title" />
			</div>
			<textarea class="form-control margin-bottom" ng-model="item.blurb" placeholder="Blurb" rows="12"></textarea>
		</div>
		<div class="col-md-3">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-10 col-md-offset-1 services-icon" image-upload="item.icon" directory="services" crops="services">
					<a class="btn btn-xs btn-success full-width">Icon</a>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<ul class="list-unstyled" sortable-parent="delta" autosave="true">
				<li class="input-group margin-bottom" ng-controller="ResourceController" data-laravel-resource="SubService" ng-repeat="item in item.sub_service" sortable-child>
					<input type="text" class="form-control input-sm" ng-model="item.title" />
					<span class="input-group-btn">
						<a class="btn btn-default btn-sm sorter-handle icon-container"><i class="icon-move glyphicon-move glyphicon"></i></a>
						<a class="btn btn-default btn-sm dropdown-toggle icon-container" data-toggle="dropdown" ng-class="{ disabled: !item.title }"><span class="glyphicon glyphicon-cog"></span></a>
							<ul class="dropdown-menu pull-right">
								<li><a ng-click="save()">Save</a></li>
								<li><a ng-click="get()">Reset</a></li>
								<li><a ng-click="delete()">Delete</a></li>
			        </ul>
					</span>
				</li>
			</ul>
			<ul class="list-unstyled">
				<li class="input-group" ng-controller="ResourceController" data-laravel-resource="SubService" new-child-with="service_id pushing [ 'title' ] into $parent.item.sub_service">
					<input type="text" class="form-control input-sm" placeholder="Add item" ng-model="item.title" />
					<span class="input-group-btn">
						<button class="btn btn-default btn-sm" type="button" ng-click="save()" ng-class="{ disabled: !item.title }">Add</button>
					</span>
				</li>
			</ul>
		</div>
		<div class="col-md-1">
			<?= HTML::actions( Service::$required_fields ) ?>
			<ul class="dropdown-menu pull-right">
				<li><a ng-click="save()">Save</a></li>
				<li><a ng-click="get()">Revert</a></li>
				<li><a ng-click="delete()">Delete</a></li>
			</ul>
		</div>
	</div>

	<div class="row well services-well" ng-controller="ResourceController" data-laravel-resource="Service">
		<div class="col-md-1"></div>
		<div class="col-md-4">
			<input type="text" class="form-control input-sm margin-bottom" ng-model="item.title" placeholder="Title" />
			<textarea class="form-control" ng-model="item.blurb" placeholder="Blurb" rows="12"></textarea>
		</div>
		<div class="col-md-3">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-10 col-md-offset-1 services-icon" image-upload="item.icon" directory="services" crops="services">
					<a class="btn btn-xs btn-success full-width">Icon</a>
				</div>
			</div>
		</div>
		<div class="col-md-2"></div>
		<div class="col-md-2">
			<a class="btn btn-success pull-right" ng-click="save()" ng-class="{ disabled: !item.title || !item.blurb || !item.icon }">Add Service</a>
		</div>
	</div>

</div>
