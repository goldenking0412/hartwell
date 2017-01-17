<div class="row">

	<div class="col-md-12">
		<div class="fuzz-section case-studies">
			<h2>Featured Case Studies</h2>
			<table class="table table-striped table-bordered">
				<thead>
					<th></th>
					<th>Name</th>
					<th></th>
				</thead>
				<tbody sortable-parent="featured_delta" autosave="true">
					<tr ng-controller="ResourceController" ng-repeat="item in featured" sortable-child>
						<td class="col-md-1 col-xs-2 sorter-handle text-center"><i class="icon-move glyphicon glyphicon-move"></i></td>
						<td class="col-md-9 col-xs-7" ng-bind="item.title"></td>
						<td class="col-md-2 col-xs-3">
							<div class="text-center">
								<button type="button" class="btn btn-danger btn-sm full-width" ng-click="unmakeFeatured()">Don't Feature</button>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="fuzz-section case-studies">
			<h2>All Case Studies</h2>
			<table class="table table-striped table-bordered">
				<thead>
					<th></th>
					<th>Name</th>
					<th>
						<div class="text-center">
							<a class="btn btn-success btn-sm full-width" href="/admin/case-study/create">New Case Study</a>
						</div>
					</th>
				</thead>
				<tbody sortable-parent="delta" autosave="true">
					<tr ng-controller="ResourceController" data-laravel-resource="CaseStudy" ng-repeat="item in case_studies" sortable-child>
						<td class="col-md-1 col-xs-2 sorter-handle text-center"><i class="icon-move glyphicon glyphicon-move"></i></td>
						<td class="col-md-9 col-xs-7"><a href="/admin/case-study/[[ item.id ]]/edit">[[ item.title ]]</a> <span ng-if="item.featured_event"><em>(featured event)</em></span></td>
						<td class="col-md-2 col-xs-3">
							<div class="text-center">
								<button type="button" ng-show="notFeatured()" class="btn btn-success btn-sm full-width" ng-click="makeFeatured()">Make Featured</button>
								<button type="button" ng-hide="notFeatured()" class="btn disabled btn-sm full-width" ng-click="makeFeatured()">Featured</button>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>

	</div>


</div>
