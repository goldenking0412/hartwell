<div class="row">

	@include( 'admin.partials.sidebar' )

		<div class="col-md-9">
			@foreach ( $taxonomies as $label => $model )
				<div name="<?= $label ?>" class="fuzz-section">
					<h2><?= ucfirst( $label ) ?></h2>
					<table class="table table-striped table-bordered">
						<thead>
							<th></th>
							<th>Name</th>
							<th>URL Slug</th>
						</thead>
						<tbody sortable-parent="delta" autosave="true">
							<tr ng-controller="ResourceController" data-laravel-resource="<?= $model ?>" ng-repeat="item in <?= $label ?>" sortable-child>
								<td class="col-xs-1 sorter-handle text-center"><i class="icon-move glyphicon glyphicon-move"></i></td>
								<td class="col-md-5 col-xs-6">

									<div class="input-group">
										<input type="text" class="form-control" ng-model="item.title" placeholder="Title" />
										<div class="input-group-btn">
											<?= HTML::actions( array( 'title' ) ) ?>
											<ul class="dropdown-menu pull-right">
												<li><a ng-click="save()">Save</a></li>
												<li><a ng-click="get()">Revert</a></li>
												<li><a ng-click="delete()">Delete</a></li>
											</ul>
										</div>
									</div>

								</td>
								<td class="col-md-2 col-xs-3">
									<input type="text" class="form-control disabled" ng-model="item.slug" disabled />
								</td>
							</tr>
							<tr ng-controller="ResourceController" data-laravel-resource="<?= $model ?>" ng-init="item={}">
								<td></td>
								<td>
									<div class="input-group">
										<input type="text" class="form-control" ng-model="item.title" placeholder="New <?= Str::singular( $label ) ?>" />
										<div class="input-group-btn">
											<button type="button" class="btn btn-success" ng-class="{ disabled: !item.title || !item.slug }" ng-click="save()">Add <?= Str::singular( $label ) ?></button>
										</div>
									</div>
								</td>
								<td>
									<input type="text" class="form-control" ng-model="item.slug" placeholder="Slug" />
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			@endforeach
	</div>

</div>
