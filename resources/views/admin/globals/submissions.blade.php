<div id="clients" class="row">
	<div class="col-md-12">
		<h2>Contact Form Submissions</h2>
		<table class="table table-striped table-bordered">
			<thead>
				<th>Name</th>
				<th>Submitted At</th>
				<th>Email</th>
				<th>Work</th>
				<th>Address</th>
				<th>Phone</th>
				<th>Fax</th>
				<th>Comment</th>
				<th>&nbsp;</th>
			</thead>
			<tbody>
				<tr class="client-row" ng-controller="ResourceController" data-laravel-resource="App\Models\Submission" ng-repeat="item in items">
					<td>
						[[ item.name ]]
					</td>
					<td width="150">
						[[ item.created_at ]]
					</td>
					<td>
						[[ item.email ]]
					</td>
					<td>
						[[ item.title ]] - [[ item.company ]]
					</td>
					<td>
						[[ item.address ]]<br />
						[[ item.city ]]<br />
						[[ item.state ]]<br />
						[[ item.country ]]<br />
						[[ item.zip ]]<br />
					</td>
					<td>
						[[ item.phone ]]
					</td>
					<td>
						[[ item.fax ]]
					</td>
					<td>
						[[ item.comments ]]
					</td>
					<td>
						<a ng-click="delete()" class="btn btn-danger">Delete</a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
