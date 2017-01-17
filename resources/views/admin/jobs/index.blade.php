<div class="fuzz-section row">
	<div class="col-md-12">
		<h2>Jobs</h2>
		<table class="table table-striped table-bordered">
			<thead>
				<th>Title</th>
				<th>Applicants</th>
				<th>
					<div class="text-center">
						<a class="btn btn-success full-width" href="/admin/job/create">New Job</a>
					</div>
				</th>
			</thead>
			<tbody sortable-parent="delta" autosave="true">
				<tr ng-controller="ResourceController" data-laravel-resource="Job" ng-repeat="item in jobs | orderBy:'delta'" sortable-child>
					<td class="col-md-1 col-xs-2 sorter-handle text-center"><i class="icon-move glyphicon glyphicon-move"></i></td>
					<td><a href="job/[[ item.id ]]/edit">[[ item.title ]]</a></td>
					<td class="col-md-6">
						<div class="row job-app-row" ng-show="item.job_application">
							<div class="col-md-2">
								<label>Date</label>
							</div>
							<div class="col-md-4">
								<label>Name</label>
							</div>
							<div class="col-md-5">
								<label>Email</label>
							</div>
						</div>
						<div ng-hide="item.job_application"><em>No submissions</em></div>
						<div class="row job-app-row" ng-controller="JobController" ng-repeat="item in item.job_application | orderBy:'id':true">
							<div class="col-md-2">
								<p>[[ submittedDate | date: 'shortDate' ]]</p>
							</div>
							<div class="col-md-4">
								<p>[[ item.name ]]</p>
							</div>
							<div class="col-md-5">
								<p><a href="mailto:[[ item.email ]]">[[ item.email ]]</a></p>
							</div>
							<div class="col-md-1">
								<a href="/admin/job/application/[[ item.id ]]" title="View Submission"><span class="glyphicon glyphicon-eye-open"></span>
							</div>
						</div>
					</td>
					<td class="col-md-2">
						<div class="row job-options-row">
							<div class="col-md-8">
								<input class="pull-left margin-right disabled" type="checkbox" value="item.published" ng-checked="item.published" ng-model="item.published" disabled />
								<p class="disabled">[[ item.published ? 'Published' : 'Unpublished' ]]</p>
							</div>
							<div class="col-md-4 delete-link">
								<a ng-click="delete()">Delete</a>
							</div>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>