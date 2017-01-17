<div id="clients" class="row">
	<div class="col-md-12">
		<h2>Job Applications</h2>
		<table class="table table-striped table-bordered">
			<thead>
				<th>Name</th>
				<th>Position Applied For</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Resume</th>
			</thead>
			<tbody>
				<tr class="client-row" ng-repeat="item in items">
					<td>
						[[ item.name ]]
					</td>
					<td>
						[[ item.position.title ]]
					</td>
					<td>
						[[ item.email ]]
					</td>
					<td>
						[[ item.phone ]]
					</td>
					<td>
						<a class="btn btn-success" href="/resumes/[[ item.resume ]]" target="_blank">Download</a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
