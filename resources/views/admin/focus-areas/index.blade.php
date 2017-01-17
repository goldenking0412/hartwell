<div class="row fuzz-section">
	<div class="col-md-12">
		<h2>Focus Areas</h2>
	</div>
	<div class="col-md-12">
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<th class="th-filter">
					<p>Filter and search by title:</p>
					<input type="text" class="form-control" ng-model="filterResults" />
				</th>
				<th>
					<div class="text-center">
						<a class="btn btn-success full-width" href="/admin/focus-area/create">New Focus Area</a>
					</div>
				</th>
			</thead>
			<tbody>
				<tr ng-controller="ResourceController" data-laravel-resource="Post" ng-repeat="item in focus_areas | filter:filterResults">
					<td><a href="/admin/focus-area/[[ item.id ]]/edit">[[ item.title ]]</a></td>
					<td class="col-md-2"></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>