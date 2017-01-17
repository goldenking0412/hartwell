<div class="row">

	<div class="col-md-12">
		<div name="employees">
			<h2>People</h2>
			<table class="table table-striped table-bordered">
				<tbody sortable-parent="delta" autosave="true">
					<tr ng-controller="ResourceController" data-laravel-resource="Employee" ng-repeat="item in employees | orderBy: 'delta'" sortable-child>
						<td class="col-md-1 sorter-handle text-center"><i class="icon-move glyphicon glyphicon-move"></i></td>

						<td class="col-md-8">
							<div class="row employee-row">
								<div class="col-md-5 col-md-12 edit-field">
									<input class="form-control" type="text" placeholder="Name" ng-model="item.name" data-target="#employee-[[ item.id ]]" ng-click="toggleRow()" toggle-row />
								</div>
								<div class="col-md-5 col-md-12 edit-field">
									<input class="form-control" type="text" placeholder="Title" ng-model="item.title" data-target="#employee-[[ item.id ]]" ng-click="toggleRow()" toggle-row maxlength="30" />
								</div>
								<div class="col-md-2 col-md-12 edit-field text-center">
									<a class="btn btn-default employee-expander full-width" data-toggle="collapse" data-target="#employee-[[ item.id ]]" ng-click="expanded = !expanded" ng-class="{ dropup: expanded }" toggle-row>[[ expanded ? 'Collapse' : 'Expand' ]] <span class="caret"></span></a>
								</div>
							</div>

							<div id="employee-[[ item.id ]]" class="row collapse employee-row">
								<div class="col-md-5 edit-field margin-top">
									<input class="form-control" type="text" placeholder="Slug" ng-model="item.slug" ng-disabled="item.id" />
								</div>
								<div class="col-md-5 edit-field margin-top">
									<input class="form-control" type="text" placeholder="Email" ng-model="item.email" />
								</div>
								<div class="col-md-2">
									<div class="btn-group full-width">
										<a class="btn btn-success dropdown-toggle full-width margin-top" data-toggle="dropdown">Actions <span class="caret"></span></a>
										<ul class="dropdown-menu pull-right">
											<li><a ng-click="save()">Save</a></li>
											<li><a ng-click="get()">Reset</a></li>
											<li><a ng-click="delete()">Delete</a></li>
										</ul>
									</div>
								</div>
								<div class="col-md-5 edit-field headshot margin-top">
									<div image-upload="item.image" directory="employees" crops="staff">
										<div class="text-center">
											<a class="btn btn-small btn-success full-width">[[ item.image ? 'Change' : 'Upload' ]] Photo</a>
											<?= HTML::image_dimensions( 'staff' ) ?>
										</div>
									</div>
								</div>
								<div class="col-md-5 edit-field margin-top">
									<select class="form-control" chosen-select="roles" ng-model="item.role_id" ng-options="role.id as role.title for role in roles" data-placeholder="Role" ng-change="hasChanged = true"></select>
									<input class="form-control margin-top" type="text" placeholder="Google+ Profile URL" ng-model="item.google_plus_url" />
									<div class="edit-field margin-top">
										<label for="published" class="pull-left">Published</label>
										<input name="published" type="checkbox" value="item.published" ng-checked="item.published" ng-model="item.published" ng-change="hasChanged = true" />
									</div>
								</div>
							</div>
						</td>
					</tr>

					<tr ng-controller="ResourceController" data-laravel-resource="Employee">
						<td class="col-md-1"></td>

						<td class="col-md-8">
							<div class="row employee-row">
								<div class="col-md-5 edit-field">
									<input class="form-control" type="text" ng-model="item.name" placeholder="Name" />
								</div>
								<div class="col-md-5 edit-field">
									<input class="form-control" type="text" ng-model="item.title" placeholder="Title" maxlength="30" />
								</div>
								<div class="col-md-2 edit-field text-center">
									<a class="btn btn-success full-width" ng-click="save()" type="button" ng-class="{ disabled: !item.name || !item.title || !item.role_id || !item.image || !item.slug || !item.email }">Add New</a>
								</div>
								<div class="col-md-5 edit-field margin-top">
									<input class="form-control" type="text" placeholder="Slug" ng-model="item.slug" />
								</div>
								<div class="col-md-5 edit-field margin-top">
									<input class="form-control" type="text" placeholder="Email" ng-model="item.email" />
								</div>
							</div>

							<div class="row employee-row">
								<div class="col-md-5 edit-field headshot margin-top">
									<div image-upload="item.image" directory="employees" crops="staff">
										<div class="text-center">
											<a class="btn btn-small btn-success full-width">[[ item.image ? 'Change' : 'Upload' ]] Photo</a>
											<?= HTML::image_dimensions( 'staff' ) ?>
										</div>
									</div>
								</div>
								<div class="col-md-5 edit-field margin-top">
									<select class="form-control" chosen-select="roles" ng-model="item.role_id" ng-options="role.id as role.title for role in roles" data-placeholder="Role"></select>
								</div>
							</div>
						</td>


					</tr>

				</tbody>
			</table>
		</div>
	</div>

</div>
