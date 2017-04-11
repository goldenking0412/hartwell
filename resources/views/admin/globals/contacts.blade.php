<div id="clients" class="row">
	<div class="col-md-12">
		<h2>Contacts</h2>
		<p>These appear on the Contact page as recipients of the form submission.</p>
		<table class="table table-striped table-bordered">
			<thead>
				<th></th>
				<th>Group</th>
				<th>Name</th>
				<th>Location</th>
				<th>Phone</th>
				<th>Email</th>
				<th>Other</th>
				<th>&nbsp;</th>
			</thead>
			<tbody sortable-parent="delta" autosave="true">
				<tr ng-controller="ResourceController" data-laravel-resource="\App\Models\Contact" ng-repeat="item in items" class="client-row" sortable-child>
					<td class="col-xs-1 sorter-handle text-center"><i class="icon-move glyphicon glyphicon-move"></i></td>
					<td class="col-md-1 col-xs-1">
						<div class="input-group">
							<select class="form-control" ng-model="item.group">
								<option value="usa">U.S.A.</option>
								<option value="sales">Sales</option>
								<option value="europe">Europe</option>
								<option value="distributors">Distributors</option>
								<option value="sales-representatives">Sales Representatives</option>
							</select>
						</div>
					</td>
					<td class="col-md-3 col-xs-3">
						<div class="input-group">
							<input type="text" class="form-control" ng-model="item.name" placeholder="Name" />
							<div class="input-group-btn">
								<?= HTML::actions( ['name', 'email'] ) ?>
								<ul class="dropdown-menu pull-right">
									<li><a ng-click="save()">Save</a></li>
								</ul>
							</div>
						</div>
					</td>
					<td class="col-md-2 col-xs-2">
						<div class="input-group">
							<input type="text" class="form-control" ng-model="item.location" placeholder="Location" />
						</div>
					</td>
					<td class="col-md-2 col-xs-2">
						<div class="input-group">
							<input type="text" class="form-control" ng-model="item.phone" placeholder="Phone" />
						</div>
					</td>
					<td class="col-md-2 col-xs-2">
						<div class="input-group">
							<input type="text" class="form-control" ng-model="item.email" placeholder="Email" />
						</div>
					</td>
					<td class="col-md-2 col-xs-2">
						<div class="input-group">
							<input type="text" class="form-control" ng-model="item.other" placeholder="Other" />
						</div>
					</td>
					<td>
						<a class="btn btn-sm btn-danger" ng-click="delete()" style="margin-top:10px;">Delete</a>
					</td>
				</tr>
				<tr ng-controller="ResourceController" data-laravel-resource="App\Models\Contact" class="client-row">
					<td class="col-md-1"></td>
					<td class="col-md-1 col-xs-1">
						<div class="input-group">
							<select class="form-control" ng-model="item.group">
								<option value="usa">U.S.A.</option>
								<option value="sales">Sales</option>
								<option value="europe">Europe</option>
								<option value="distributors">Distributors</option>
								<option value="sales-representatives">Sales Representatives</option>
							</select>
						</div>
					</td>
					<td class="col-md-3 col-xs-3">
						<div class="input-group">
							<input type="text" class="form-control" ng-model="item.name" placeholder="Name" />
							<div class="input-group-btn">
								<button class="btn btn-success" ng-click="save()" ng-class="{ disabled: !item.name && !item.email }" type="button">Add Contact</button>
							</div>
						</div>
					</td>
					<td class="col-md-2 col-xs-2">
						<div class="input-group">
							<input type="text" class="form-control" ng-model="item.location" placeholder="Location" />
						</div>
					</td>
					<td class="col-md-2 col-xs-2">
						<div class="input-group">
							<input type="text" class="form-control" ng-model="item.phone" placeholder="Phone" />
						</div>
					</td>
					<td class="col-md-2 col-xs-2">
						<div class="input-group">
							<input type="text" class="form-control" ng-model="item.email" placeholder="Email" />
						</div>
					</td>
					<td class="col-md-2 col-xs-2">
						<div class="input-group">
							<input type="text" class="form-control" ng-model="item.other" placeholder="Other" />
						</div>
					</td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
