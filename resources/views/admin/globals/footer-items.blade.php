<div id="clients" class="row">
	<div class="col-md-12">
		<h2>Footer Items</h2>
		<p>These appear in the last column of the footer links.</p>
		<table class="table table-striped table-bordered">
			<thead>
				<th></th>
				<th>Label</th>
				<th>Link</th>
				<th>Actions</th>
				<th>&nbsp;</th>
			</thead>
			<tbody sortable-parent="delta" autosave="true">
				<tr ng-controller="ResourceController" data-laravel-resource="\App\Models\FooterItem" ng-repeat="item in items" class="client-row" sortable-child>
					<td class="col-xs-1 sorter-handle text-center"><i class="icon-move glyphicon glyphicon-move"></i></td>
					<td class="col-md-4 col-xs-4">
						<div class="input-group">
							<input type="text" class="form-control" ng-model="item.name" placeholder="Name" />
							<div class="input-group-btn">
								<?= HTML::actions( ['name', 'link'] ) ?>
								<ul class="dropdown-menu pull-right">
									<li><a ng-click="save()">Save</a></li>
								</ul>
							</div>
						</div>
					</td>
					<td class="col-md-4 col-xs-4">
						<div class="input-group">
							<input type="text" class="form-control" ng-model="item.link" placeholder="http://example.com" />
							<div class="btn btn-default"
								asset-upload="item.link"
								directory="resources"
								style="margin-top:10px;"
							>Upload File</div>
						</div>
					</td>
					<td>
						<a class="btn btn-sm btn-danger" ng-click="delete()" style="margin-top:10px;">Delete</a>
					</td>
					<td></td>
				</tr>
				<tr ng-controller="ResourceController" data-laravel-resource="App\Models\FooterItem" class="client-row">
					<td class="col-md-1"></td>
					<td class="col-md-4 col-xs-4">
						<div class="input-group">
							<input type="text" class="form-control" ng-model="item.name" placeholder="Name" />
							<div class="input-group-btn">
								<button class="btn btn-success" ng-click="save()" ng-class="{ disabled: !item.name && !item.email }" type="button">Add Footer Item</button>
							</div>
						</div>
					</td>
					<td class="col-md-4 col-xs-4">
						<div class="input-group">
							<input type="text" class="form-control" ng-model="item.link" placeholder="http://example.com" />
							<div class="btn btn-default"
								asset-upload="item.link"
								directory="resources"
								style="margin-top:10px;"
							>Upload File</div>
						</div>
					</td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
