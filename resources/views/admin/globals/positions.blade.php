<div id="clients" class="row">
	<div class="col-md-12">
		<h2>Positions</h2>
		<table class="table table-striped table-bordered">
			<thead>
				<th>Title</th>
				<th>Slug</th>
				<th>&nbsp;</th>
			</thead>
			<tbody>
				<tr ng-controller="ResourceController" data-laravel-resource="App\Models\Position" ng-repeat="item in items" class="client-row">
					<td class="col-md-6 col-xs-6">
						<div class="input-group">
							<input type="text" class="form-control" ng-model="item.title" placeholder="Title" />
							<div class="input-group-btn">
								<?= HTML::actions( ['title', 'slug'] ) ?>
								<ul class="dropdown-menu pull-right">
									<li><a ng-click="save()">Save</a></li>
								</ul>
							</div>
						</div>
					</td>
					<td class="col-md-5 col-xs-5">
						<div class="input-group">
							<input type="text" class="form-control" ng-model="item.slug" placeholder="Slug" />
						</div>
					</td>
					<td>
						<a class="btn btn-sm btn-warning" ng-href="/admin/positions/[[ item.id ]]">Edit</a>
						<a class="btn btn-sm btn-danger" ng-click="delete()" style="margin-top:10px;">Delete</a>
					</td>
				</tr>
				<tr ng-controller="ResourceController" data-laravel-resource="App\Models\Position" class="client-row">
					<td class="col-md-6 col-xs-6">
						<div class="input-group">
							<input class="form-control" type="text" ng-model="item.title" placeholder="Position Title" />
							<div class="input-group-btn">
								<button class="btn btn-success" ng-click="save()" ng-class="{ disabled: !item.title }" type="button">Add Position</button>
							</div>
						</div>
					</td>
					<td class="col-md-5 col-xs-5">
						<div class="input-group">
							<input type="text" class="form-control" ng-model="item.slug" placeholder="Slug" />
						</div>
					</td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
