<div ng-controller="ResourceController" data-laravel-resource="CaseStudy" data-laravel-stem="/admin/case-study/" class="margin-bottom" data-options="markup" convert-markdown="content" name="top">
	<div class="row">
		<div class="col-md-12">
			<div class="btn-group pull-right">
				<?= HTML::actions( CaseStudy::$required_fields ) ?>
				<ul class="dropdown-menu pull-left">
					<li><a ng-click="save()">Save</a></li>
					<li><a ng-click="get()">Revert</a></li>
				</ul>
			</div>

			<h4 class="edit-header">
				[[ item.id ? 'Editing' : 'Creating' ]] Case Study: <span class="title" ng-class="{ untitled: !item.title }">"[[ item.title ? item.title : 'Untitled' ]]"</span>
				&nbsp;
				<a target="_blank" ng-if="item.id" href="[[ item.featured_event ? ('/featured-event/' + item.slug) : ('/work/' + item.slug) ]]">(view)</a>
			</h4>
		</div>

		<div class="col-md-12 edit-field">
			<label class="pull-left">Published</label>
			<input type="checkbox" value="item.published" ng-checked="item.published" ng-change="requirementsMet = true" ng-model="item.published" />
		</div>

		<div class="col-md-12 edit-field">
			<label class="pull-left">Recent</label>
			<input type="checkbox" value="item.recent" ng-checked="item.recent" ng-model="item.recent" />
		</div>

		<div class="col-md-12 edit-field">
			<label class="pull-left">Featured Event</label>
			<input type="checkbox" value="item.featured_event" ng-checked="item.featured_event" ng-model="item.featured_event" />
		</div>
	</div>

	<div id="case-study-form" ng-controller="CaseStudyController">

		<div class="row">
			<div class="col-md-12">
				<h3 class="edit-header">Banner</h3>
			</div>
			<div class="col-md-4 edit-field">
				<label>Title</label>
				<input class="form-control" type="text" ng-model="item.title" />
			</div>
			<div class="col-md-4 edit-field">
				<label>Search Title</label>
				<input class="form-control" type="text" ng-model="item.short_title" />
			</div>
			<div class="col-md-4 edit-field">
				<label>Slug</label>
				<input class="form-control" type="text" ng-model="item.slug" ng-disabled="item.id" />
			</div>
			<div class="col-md-3 edit-field">
				<label>Headline</label>
				<textarea class="form-control" ng-model="item.headline" rows="5" maxlength="64"></textarea>
			</div>
			<div class="col-md-3 edit-field">
				<label>Subheadline</label>
				<textarea class="form-control" ng-model="item.subheadline" rows="5" maxlength="128"></textarea>
			</div>
			<div class="col-md-3 edit-field">
				<label>CTA for clickthrough</label>
				<input class="form-control" type="text" ng-model="item.cta" />
			</div>
			<div class="col-md-3 edit-field">
				<label>Contrast</label>
				<div class="full-width btn-group contrast-group" data-toggle-name="contrast" data-toggle="buttons-radio" >
					<button ng-repeat="contrast in contrasts" type="button" ng-value="contrast" class="btn btn-default" data-toggle="button" ng-class="{ active: contrast == item.contrast }" ng-click="item.contrast = contrast">[[ contrast ]]</button>
				</div>
				<input type="hidden" value="contrast" ng-model="item.contrast" />
			</div>
		</div>

		<div class="row">
			<div class="col-md-9 edit-field">
				<div image-upload="item.image" class="text-center well banner-upload-well" crops="banner" directory="case-studies/banners">
					<a class="btn btn-success full-width">[[ item.image ? 'Change' : 'Upload' ]] Landing Page Image<span class="icon-upload icon-white"></a>
					<?= HTML::image_dimensions( 'banner' ) ?>
				</div>
			</div>
			<div class="col-md-3 edit-field">
				<div image-upload="item.mobileimage" class="text-center well banner-upload-well" crops="bannermobile" directory="case-studies/banners">
					<a class="btn btn-success full-width">[[ item.mobileimage ? 'Change' : 'Upload' ]] Mobile Version<span class="icon-upload icon-white"></a>
					<?= HTML::image_dimensions( 'bannermobile' ) ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-9 edit-field">
				<div image-upload="item.homepageimage" class="text-center well banner-upload-well" crops="bannertall" directory="case-studies/banners">
					<a class="btn btn-success full-width">[[ item.homepageimage ? 'Change' : 'Upload' ]] Homepage Image<span class="icon-upload icon-white"></a>
					<?= HTML::image_dimensions( 'bannertall' ) ?>
				</div>
			</div>
			<div class="col-md-3 edit-field">
				<div image-upload="item.mobilehomepageimage" class="text-center well banner-upload-well" crops="bannertallmobile" directory="case-studies/banners">
					<a class="btn btn-success full-width">[[ item.mobilehomepageimage ? 'Change' : 'Upload' ]] Mobile Version<span class="icon-upload icon-white"></a>
					<?= HTML::image_dimensions( 'bannertallmobile' ) ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 edit-field">
				<div image-upload="item.deviceimage" class="text-center well banner-upload-well" directory="case-studies/devices">
					<a class="btn btn-success full-width">[[ item.deviceimage ? 'Change' : 'Upload' ]] Device Image<span class="icon-upload icon-white"></a>
				</div>
			</div>
			<div class="col-md-6 edit-field">
				<div image-upload="item.clientimage" class="text-center well banner-upload-well" crops="worklogo" directory="logos">
					<a class="btn btn-success full-width">[[ item.clientimage ? 'Change' : 'Upload' ]] Client Logo<span class="icon-upload icon-white"></a>
					<?= HTML::image_dimensions( 'worklogo' ) ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 edit-field">
				<div image-upload="item.thumbnailimage" class="text-center well banner-upload-well" crops="worksquare" directory="case-studies/thumbnails">
					<a class="btn btn-success full-width">[[ item.thumbnailimage ? 'Change' : 'Upload' ]] Square Thumbnail<span class="icon-upload icon-white"></a>
					<?= HTML::image_dimensions( 'worksquare' ) ?>
				</div>
			</div>
			<div class="col-md-6 edit-field">
				<div image-upload="item.widgetimage" class="text-center well banner-upload-well" crops="worksliver" directory="case-studies/thumbnails">
					<a class="btn btn-success full-width">[[ item.widgetimage ? 'Change' : 'Upload' ]] Short Thumbnail<span class="icon-upload icon-white"></a>
					<?= HTML::image_dimensions( 'worksliver' ) ?>
				</div>
				<label class="margin-top">Thumbnail Caption</label>
				<input class="form-control" type="text" ng-model="item.caption" />
			</div>
		</div>

		<hr />

		<div class="row">
			<div class="col-md-12">
				<h3 class="edit-header">Description</h3>
			</div>
			<div class="col-md-12 edit-field">
				<label>Body copy and testimonial</label>
				<a data-toggle="modal" href="#testimonial-example" class="btn btn-primary btn-small modal-button testimonial-example hidden-sm">Testimonial Formatting Example</a>
				<a data-toggle="modal" href="#markdown-modal" class="btn btn-default btn-small modal-button hidden-xs">How do I write markdown?</a>
				<textarea class="form-control markdown-editor" ng-model="item.content" data-provide="markdown"></textarea>
			</div>
		</div>

		<div class="modal fade" id="testimonial-example">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 class="modal-title">Testimonial Formatting Example</h3>
					</div>
					<div class="modal-body">
						<div class="row markdown-instructions">
							<div class="col-md-12">
								<h4>Steps:</h4>
								<ul>
									<li>Write the quote as a blockquote by prefixing lines with "&gt;".</li>
									<li>Use a level 6 header for the name.</li>
									<li>Use a level 5 header for the title and company.</li>
								</ul>
								<p class="well">
									&gt; "I love Fuzz Productions!"<br />
									&gt; ###### Jane Smith<br />
									&gt; ##### CEO, Great Startup
								</p>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

		<hr />

		<div class="row">
			<div class="col-md-12">
				<h3 class="edit-header">Acclaim</h3>
			</div>
		</div>
		<div class="row acclaim-row">
			<div class="col-md-6 edit-field">
				<label>Press</label>
				<ul class="list-unstyled" sortable-parent="delta">

					<li class="well edit-field clearfix" ng-controller="ResourceController" data-laravel-resource="CaseStudyPress" ng-repeat="item in item.press | orderBy: 'delta'" sortable-child>
						<input class="form-control" type="text" ng-model="item.title" placeholder="Title" />
						<div class="url-field-wrapper">
							<input class="form-control" type="text" ng-model="item.url" placeholder="URL" url-field="url" />
						</div>
						<input class="form-control" type="text" ng-model="item.source" placeholder="Source" />
						<p class="pull-left btn btn-default disabled">[[ item.delta + 1 ]] / [[ $parent.$parent.item.press.length ]]</p>
						<div class="well-options-container btn-group pull-right">
							<a class="btn btn-default sorter-handle" ng-if="$parent.$parent.item.press.length > 1">Move<span class="glyphicon-move glyphicon"></span></a>
							<a class="btn btn-danger delete" ng-click="removeFrom( $parent.$parent.item.press )">Delete</a>
						</div>
					</li>

					<li class="well edit-field clearfix" ng-controller="ResourceController" data-laravel-resource="CaseStudyPress" new-child-with="case_study_id pushing [ 'title', 'url' ] into $parent.item.press">
						<input class="form-control" type="text" ng-model="item.title" placeholder="Title" />
						<div class="url-field-wrapper">
							<input class="form-control" type="text" ng-model="item.url" placeholder="URL" url-field="url" />
						</div>
						<input class="form-control" type="text" ng-model="item.source" placeholder="Source" />
						<a class="btn btn-success pull-right" ng-class="{ disabled: !item.title || !item.url }" ng-click="saveChild()">Add Press</a>
					</li>

				</ul>
			</div>

			<div class="col-md-6 edit-field">
				<label>Awards</label>
				<ul class="list-unstyled" sortable-parent="delta">

					<li class="well edit-field clearfix" ng-controller="ResourceController" data-laravel-resource="CaseStudyAward" ng-repeat="item in item.awards | orderBy: 'delta'" sortable-child>
						<input class="form-control" type="text" ng-model="item.title" placeholder="Title" />
						<div class="url-field-wrapper">
							<input class="form-control" type="text" ng-model="item.url" placeholder="URL" url-field="url" />
						</div>
						<p class="pull-left btn btn-default disabled">[[ item.delta + 1 ]] / [[ $parent.$parent.item.awards.length ]]</p>
						<div class="well-options-container btn-group pull-right">
							<a class="btn btn-default sorter-handle" ng-if="$parent.$parent.item.press.length > 1">Move<span class="glyphicon-move glyphicon"></span></a>
							<a class="btn btn-danger delete" ng-click="removeFrom( $parent.$parent.item.awards )">Delete</a>
						</div>
					</li>

					<li class="well edit-field clearfix" ng-controller="ResourceController" data-laravel-resource="CaseStudyAward" new-child-with="case_study_id pushing [ 'title', 'url' ] into $parent.item.awards">
						<input class="form-control" type="text" ng-model="item.title" placeholder="Title" />
							<div class="url-field-wrapper">
							<input class="form-control" type="text" ng-model="item.url" placeholder="URL" url-field="url" />
						</div>
						<a class="btn btn-success pull-right" ng-class="{ disabled: !item.title || !item.url }" ng-click="saveChild()">Add Award</a>
					</li>

				</ul>
			</div>

		</div>

		<div class="row">
			<div class="col-md-12">
				<h3 class="edit-header">Taxonomies</h3>
			</div>
			<div class="col-md-4 edit-field">
				<label>Industries</label>
				<select class="form-control" chosen-select="industries" multiple ng-model="item.industryIds" ng-options="industry.id as industry.title for industry in industries" data-placeholder="Industries"></select>
			</div>
			<div class="col-md-4 edit-field">
				<label>Platforms</label>
				<select class="form-control" chosen-select="platforms" multiple ng-model="item.platformIds" ng-options="platform.id as platform.title for platform in platforms" data-placeholder="Platforms"></select>
				<div class="platform-link" ng-repeat="platform in item.platforms">
					<label>Platform Link: [[platform.title]]</label>
					<input class="form-control input-sm" ng-model="platform.pivot.link" type="text" placeholder="[[ platform.title ]] URL" />
				</div>
			</div>
			<div class="col-md-4 edit-field">
				<label>Technologies</label>
				<select class="form-control" chosen-select="technologies" multiple ng-model="item.technologyIds" ng-options="technology.id as technology.title for technology in technologies" data-placeholder="Technologies"></select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 edit-field">
				<label>Similar Work</label>
				<select class="form-control" chosen-select="case_studies" multiple ng-model="item.caseStudyIds" ng-options="case_study.id as case_study.short_title for case_study in case_studies" data-placeholder="Related Work"></select>
			</div>
			<div class="col-md-4 edit-field">
				<label>Focus Areas</label>
				<select class="form-control" chosen-select="focus_areas" multiple ng-model="item.focusAreaIds" ng-options="focus_area.id as focus_area.title for focus_area in focus_areas" data-placeholder="Focus Areas"></select>
			</div>
			<div class="col-md-4 edit-field">
				<label>Devices</label>
				<select class="form-control" chosen-select="devices" multiple ng-model="item.deviceIds" ng-options="device.id as device.title for device in devices" data-placeholder="Devices"></select>
			</div>
		</div>

		<hr />

		<div class="row">
			<div class="col-md-12">
				<h3 class="edit-header">Slides</h3>
			</div>
		</div>
		<div class="row slides-row" sortable-parent="delta" axis="x,y">
			<div ng-controller="ResourceController" data-laravel-resource="CaseStudySlide" class="col-md-4 edit-field" ng-repeat="item in item.slides | orderBy: 'delta'" sortable-child>
				<div class="well edit-field text-center">
					<div image-upload="item.image" directory="case-studies/slides"></div>
					<div class="well-options-container btn-group margin-top" ng-if="item.image">
						<a class="btn btn-default sorter-handle">Move<span class="glyphicon glyphicon-move"></span></a>
						<a class="btn btn-danger" ng-click="removeFrom( $parent.$parent.$parent.item.slides )">Remove Slide</a>
					</div>
				</div>
			</div>
			<div ng-controller="ResourceController" data-laravel-resource="CaseStudySlide" class="col-md-4 edit-field" new-child-with="case_study_id pushing [ 'image' ] into $parent.item.slides">
				<div class="well edit-field">
					<div image-upload="item.image" directory="case-studies/slides">
						<div class="well-options-container text-center">
							<a class="btn btn-success full-width">Upload New Slide Image</a>
						</div>
					</div>
					<div class="well-options-container text-center margin-top">
						<a class="btn btn-success full-width" ng-class="{ disabled: !item.image }" ng-click="saveChild()">Add Slide</a>
					</div>
				</div>
			</div>
		</div>

		<div ng-if="item.id">
			<hr />

			@include( 'admin.widgets.index' )
		</div>

		<hr />

		@include( 'admin.partials.meta' )

	</div> <!--/ #case-study-form -->

</div>

@include( 'admin.partials.markdown-instructions' )
