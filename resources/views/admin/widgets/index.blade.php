<div class="row">
	<div class="col-lg-12">
		<h3 class="edit-header">
			Widgets
		</h3>
	</div>
</div>
<div sortable-parent="delta">
	<div ng-repeat="item in item.widgets | orderBy: 'delta'" class="widgets" widget sortable-child>
		<div class="row">
			<div class="col-xs-12">
				<div class="well widget clearfix">
					<div class="col-md-8 edit-field">
						<h5>[[ widget_types[item.widget_type].label ]] — [[ item.title ]]</h5>
					</div>
					<div class="col-md-4 col-xs-12 edit-field">
						<div class="btn-group pull-right">
							<a class="btn btn-default sorter-handle" ng-if="$parent.$parent.item.widgets.length > 1">
								<i class="glyphicon-move glyphicon"></i>
							</a>
							<a class="btn btn-success" ng-click="save()">Save</a>
							<a class="btn btn-danger" ng-if="item.id" ng-click="delete()">Delete</a>
							<a class="btn btn-default" data-toggle="collapse" data-target="#widget-[[ item.id ]]" ng-click="expanded = !expanded" ng-class="{ dropup: expanded }" toggle-row>[[ expanded ? 'Collapse' : 'Expand' ]] <span class="caret"></span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div ng-include src="'/admin/widget/' + [[ item.id ]]" id="widget-[[ item.id ]]" class="collapse margin-bottom"></div>
	</div>
</div>
<div class="row" widget-wizard id="widget-wizard">
	<div class="col-xs-12 edit-field">
		<h4 class="edit-header">Add a new widget</h4>
	</div>
	@foreach ( Widget::types() as $type => $specification )
		@if ( $specification['cms'] )
		<div class="col-xs-3 text-center">
			<a ng-click="addWidget( '<?= $type ?>' )">
				<?= HTML::image( 'img/widgets/' . $type . '.png', $specification['label'], array( 'class' => 'img-responsive' ) ) ?>
			</a>
			<small><?= $specification['label'] ?></small>
		</div>
		@endif
	@endforeach
</div>
