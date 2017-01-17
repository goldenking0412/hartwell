<div class="margin-bottom">
	<div class="row column-row">
		<div class="col-md-12">
			<h2>Footer Links</h2>
		</div>
		<div class="col-md-3 edit-field" ng-repeat="item in columns" ng-controller="ResourceController" data-laravel-resource="FooterColumn" data-laravel-stem="/admin/footer/">
			<div class="input-group margin-bottom">
				<input maxlength="24" class="form-control flat-bottom" type="text" name="title" placeholder="Header Title" ng-model="item.title" />
				<span class="input-group-btn"><a class="btn btn-success" ng-click="save()">Save Column</a></span>
			</div>
			<ul class="list-unstyled" sortable-parent="delta">
				<li class="well edit-field clearfix" ng-controller="ResourceController" data-laravel-resource="FooterColumnLink" ng-repeat="item in item.links | orderBy: 'delta'" sortable-child>
					<input class="form-control" type="text" ng-model="item.title" placeholder="Link Title" />
					<input class="form-control" type="text" ng-model="item.link" placeholder="Link URL" />
					<a class="pull-left btn btn-sm btn-default disabled hidden-md">[[ item.delta + 1 ]] / [[ $parent.$parent.item.links.length ]]</a>
					<div class="well-options-container btn-group pull-right">
						<a class="btn btn-sm btn-default sorter-handle padding-sm" ng-if="$parent.$parent.item.links.length > 1">Move<span class="glyphicon-move glyphicon"></span></a>
						<a class="btn btn-sm btn-danger delete" ng-click="removeFrom( $parent.$parent.item.resources )">Delete</a>
					</div>
				</li>

				<li class="well edit-field clearfix" ng-controller="ResourceController" data-laravel-resource="FooterColumnLink" new-child-with="footer_column_id pushing [ 'title', 'link' ] into $parent.item.links" ng-if="$parent.item.links.length < 5">
					<input class="form-control" type="text" ng-model="item.title" placeholder="Link Title" />
					<input class="form-control" type="text" ng-model="item.link" placeholder="Link URL" />
					<a class="btn btn-sm btn-success pull-right" ng-class="{ disabled: !item.title || !item.link }" ng-click="saveChild()">Add Link</a>
				</li>
			</ul>
		</div>
	</div>
</div>