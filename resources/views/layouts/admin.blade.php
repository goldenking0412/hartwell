<!doctype html>
<html lang="en" ng-init="ASSET_BASE='/'">
	<head>
		<meta charset="utf-8">
		<title>Hartwell | Administration</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?= HTML::style( '//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css' ) ?>
		<?= HTML::style( 'static/admin/plugins/bootstrap/css/bootstrap-glyphicons.css' ) ?>
		<?= HTML::style( 'static/admin/plugins/chosen/chosen.min.css' ) ?>
		<?= HTML::script( 'static/admin/plugins/modernizr.custom.min.js' ) ?>
		<?= HTML::script( 'static/admin/js/admin/global.js' ) ?>
		<?= View::make('admin.styles')->render() ?>
	</head>
	<body>

		<div class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">

				<div class="navbar-header">
			    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			      <span class="glyphicon glyphicon-align-justify"></span>
			    </button>
					<a class="navbar-brand" href="/admin/home">Administration</a>
			  </div>

				@if ( Auth::check() )
					<div class="navbar-collapse collapse">
						<?= HTML::image( '/static/admin/img/spinner.gif', 'Loading...', array( 'id' => 'spinner', 'class' => 'busy pull-left' ) ) ?>
						<ul class="nav navbar-nav">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Static Pages <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<?= HTML::menu_link( 'admin/home', 'Home' ) ?>
									<!--
									<?= HTML::menu_link( 'admin/about', 'About' ) ?>
									<?= HTML::menu_link( 'admin/clients', 'Our Clients' ) ?>
									<?= HTML::menu_link( 'admin/quality', 'Quality & Process' ) ?>
									<?= HTML::menu_link( 'admin/certifications', 'Certifications' ) ?>
									<?= HTML::menu_link( 'admin/platforms', 'Platforms' ) ?>
									<?= HTML::menu_link( 'admin/faa-repair', 'FAA Repair' ) ?>
									<?= HTML::menu_link( 'admin/contact', 'Contact' ) ?>
									<?= HTML::menu_link( 'admin/careers', 'Careers' ) ?>
									-->
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Other <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<!--
									<?= HTML::menu_link( 'admin/news-items', 'News' ) ?>
									<?= HTML::menu_link( 'admin/submissions', 'Submissions' ) ?>
									<?= HTML::menu_link( 'admin/applications', 'Job Applications' ) ?>
									<?= HTML::menu_link( 'admin/positions', 'Positions' ) ?>
									-->
									<?= HTML::menu_link( 'admin/users', 'Users' ) ?>
								</ul>
							</li>
							<?= HTML::menu_link( 'admin/product-categories', 'Product Categories' ) ?>
							<?= HTML::menu_link( 'admin/platforms', 'Platforms' ) ?>
						</ul>
						<p class="navbar-text pull-right"><span class="name">Signed in as <?= Auth::user()->name ?> | </span><a href="/admin/logout" class="navbar-link">Logout</a></p>
					</div><!--/.nav-collapse -->
				@endif
			</div>
		</div>

		<div class="container">
			<div id="notifications" class="notifications bottom-right"></div>
			<div ng-cloak ng-include ng-controller="RouteController" src="currentRoute('template')" onload="getData()" id="data-wrapper"></div>

		</div> <!--/.container -->
	</body>
</html>
