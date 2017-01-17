<div class="col-md-3 edit-field">
	<div class="btn-group full-width">
		<a class="btn btn-default sorter-handle margin-bottom" ng-class="{ disabled: $parent.item.panes.length < 2 }">Move<i class="glyphicon-move glyphicon"></i></a>
		<a class="btn btn-danger" ng-click="removeFrom( $parent.$parent.item.panes, $index )" ng-class="{ disabled: ! canDeletePanes() }">Remove<i class="glyphicon-trash glyphicon"></i></a>
	</div>
</div>
