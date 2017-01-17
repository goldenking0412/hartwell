<div class="row" ng-controller="ResourceController" data-laravel-resource="JobApplication">
	<div class="col-md-12 col-md-12">
		<h3 class="edit-header">Job application for <strong>[[ item.job.title ]]</strong> ([[ item.job.location.city ]])</h3>

		<hr />

		<h4 class="edit-header"><strong>Name:</strong> [[ item.name ]]</h4>
		<h4 class="edit-header"><strong>Email:</strong> <a href="mailto:[[ item.email ]]">[[ item.email ]]</a></h4>
		<h4 class="edit-header"><strong>Message:</strong></h4>
		<p>[[ item.application_message ]]</p>
		<div class="btn-group">
			<a class="btn btn-default margin-top" href="<?= FileManager::get_full_s3_url( '[[ item.resume ]]', 'resumes' ) ?>" target="_blank" ng-if="item.resume">Download Resume</a>
			<a class="btn btn-danger margin-top" ng-click="delete()">Delete Submission</a>
		</div>
	</div>
</div>
