<div class="row fuzz-section">
	<div class="col-md-12">
		<h2>News Posts</h2>
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
						<a class="btn btn-success full-width" href="/admin/post/create">New Post</a>
					</div>
				</th>
			</thead>
			<tbody>
				<tr ng-controller="ResourceController" data-laravel-resource="Post" ng-repeat="item in posts | filter:filterResults">
					<td><a href="post/[[ item.id ]]/edit" class="vertical-link">[[ item.title ]]</a></td>
					<td class="col-md-2"><button type="button" class="btn btn-danger full-width" ng-click="delete()">Delete</button></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>