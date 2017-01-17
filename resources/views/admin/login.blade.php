<?= Form::open( array( 'class' => 'text-center') ) ?>
@if ( Input::old( 'username' ) )
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>Nope.</strong> Try again.
</div>
@endif
<div class="row">
	<div class="col-md-4 centered">
		<input type="username" value="<?= Input::old( 'username' ) ?>" name="username" placeholder="Username" class="form-control" />
	</div>
</div>
<div class="row">
	<div class="col-md-4 centered">
		<input type="password" name="password" placeholder="Password" class="form-control" />
	</div>
</div>
<div class="row text-center">
	<input type="submit" class="btn btn-success" value="Log In" />
</div>
<?= Form::close() ?>
