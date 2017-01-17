<div id="clients" class="row">
	<div class="col-md-12">
		<h2>Clients</h2>
		<?= HTML::image_dimensions( 'logo' ) ?>
		<table class="table table-striped table-bordered">
			<thead>
				<th></th>
				<th>Name</th>
				<th class="hidden-xs">Light logo</th>
				<th class="hidden-xs">Dark logo</th>
				<th>Published</th>
			</thead>
			<tbody sortable-parent="delta" autosave="true">
				<tr ng-controller="ResourceController" data-laravel-resource="Client" ng-repeat="item in clients" class="client-row" sortable-child>
					<td class="col-xs-1 sorter-handle text-center"><i class="icon-move glyphicon glyphicon-move"></i></td>
					<td class="col-md-5 col-xs-5">
						<div class="input-group">
							<input type="text" class="form-control" ng-model="item.title" placeholder="Title" />
							<div class="input-group-btn">
								<?= HTML::actions( Client::$required_fields ) ?>
								<ul class="dropdown-menu pull-right">
									<li><a ng-click="save()">Save</a></li>
									<li><a ng-click="get()">Revert</a></li>
									<li><a ng-click="delete()">Delete</a></li>
								</ul>
							</div>
						</div>
					</td>
					<td class="col-md-2 hidden-xs img-cell-gray">
						<div image-upload="item.logolight" crops="logo" directory="logos">
							<div class="text-center">
								<a class="btn btn-success btn-sm">Light Logo</a>
							</div>
						</div>
					</td>
					<td class="col-md-2 hidden-xs img-cell-white">
						<div image-upload="item.logodark" crops="logo" directory="logos">
							<div class="text-center">
								<a class="btn btn-success btn-sm">Dark Logo</a>
							</div>
						</div>
					</td>
					<td class="col-xs-1">
						<input type="checkbox" class="full-width" value="item.published" ng-checked="item.published" ng-model="item.published" ng-change="hasChanged = true" />
					</td>
				</tr>
				<tr ng-controller="ResourceController" data-laravel-resource="Client" class="client-row">
					<td class="col-md-1"></td>
					<td class="col-md-5 col-xs-6">
						<div class="input-group">
							<input class="form-control" type="text" ng-model="item.title" placeholder="Client name" />
							<div class="input-group-btn">
								<button class="btn btn-success" ng-click="save()" ng-class="{ disabled: !item.title || !item.logolight || !item.logodark }" type="button">Add New Client</button>
							</div>
						</div>
					</td>
					<td class="col-md-2 hidden-xs img-cell-gray">
						<div image-upload="item.logolight" crops="logo" directory="logos">
							<div class="text-center">
								<a class="btn btn-success btn-sm">Light Logo</a>
							</div>
						</div>
					</td>
					<td class="col-md-2 hidden-xs img-cell-white">
						<div image-upload="item.logodark" crops="logo" directory="logos">
							<div class="text-center">
								<a class="btn btn-success btn-sm">Dark Logo</a>
							</div>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
