<div id="clients" class="row">
	<div class="col-md-12">
		<h2>Users</h2>
		<table class="table table-striped table-bordered">
			<thead>
				<th>Username</th>
				<th>Email</th>
				<th>Password</th>
				<th>&nbsp;</th>
			</thead>
			<tbody sortable-parent="delta" autosave="true">
				<tr ng-controller="ResourceController" data-laravel-resource="App\User" data-laravel-stem="/admin/user/" ng-repeat="item in items" class="client-row" sortable-child>
					<td class="col-md-4 col-xs-4">
						<div class="input-group">
							<input type="text" class="form-control" ng-model="item.name" placeholder="Username" />
							<div class="input-group-btn">
								<?= HTML::actions( ['name', 'email'] ) ?>
								<ul class="dropdown-menu pull-right">
									<li><a ng-click="save()">Save</a></li>
								</ul>
							</div>
						</div>
					</td>
					<td class="col-md-4 col-xs-4">
						<div class="input-group">
							<input type="text" class="form-control" ng-model="item.email" placeholder="Email" />
						</div>
					</td>
					<td class="col-md-4">
						<div class="input-group">
							<input type="text" class="form-control" ng-model="item.password" placeholder="Password" />
						</div>
					</td>
					<td>
						<a class="btn btn-sm btn-danger" ng-click="delete()" ng-hide="item.id == 1">Delete</a>
					</td>
				</tr>
				<tr ng-controller="ResourceController" data-laravel-resource="App\User" class="client-row">
					<td class="col-md-4 col-xs-4">
						<div class="input-group">
							<input class="form-control" type="text" ng-model="item.name" placeholder="Name" />
							<div class="input-group-btn">
								<button class="btn btn-success" ng-click="save()" ng-class="{ disabled: !item.name }" type="button">Add User</button>
							</div>
						</div>
					</td>
					<td class="col-md-4 col-xs-4">
						<div class="input-group">
							<input type="text" class="form-control" ng-model="item.email" placeholder="Email" />
						</div>
					</td>
					<td class="col-md-4 col-xs-4">
						<div class="input-group">
							<input type="text" class="form-control" ng-model="item.password" placeholder="Password" />
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
