@if( isset( $sidebar_options ) )
<div class="col-md-3 sidebar-container">
	<div class="btn-group-vertical sidebar affix" sub-nav>
		@foreach( $sidebar_options as $option )
			<a class="btn btn-default" data-target="<?= $option ?>"><?= ucfirst( $option ) ?> <span class="glyphicon glyphicon-chevron-down"></span></a>
		@endforeach
	</div>
</div>
@endif
