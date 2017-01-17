<div class="btn-group pull-right full-width">
	<a class="btn btn-success dropdown-toggle full-width" data-toggle="dropdown">Actions <span class="caret"></span></a>
	<ul class="dropdown-menu pull-left">
		<li><a ng-click="save()">Save</a></li>
		<li><a ng-click="get()">Revert</a></li>
		<li ng-if="item.id"><a ng-click="delete()">Delete</a></li>
	</ul>
</div>