( function ( window, document ) {

  /**
   * Conditionally load script and provide local
   * fallbacks when the CDN fails to deliver.
   */
  Modernizr.load([
    {
      load: [
        '//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js',
        '//ajax.googleapis.com/ajax/libs/angularjs/1.1.5/angular.min.js',
        '//ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.js',
        '//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js',
        '/static/admin/plugins/bootstrap-markdown/js/bootstrap-markdown.js',
        '/static/admin/plugins/markdown.js'
      ],
      complete: function() {}
    },
    {
      // Load custom files.
      load: [
        '/static/admin/plugins/jquery-classynotty/js/jquery.classynotty.js',
        '/static/admin/plugins/jquery-classynotty/css/jquery.classynotty.css',
        '/static/admin/plugins/chosen/chosen.jquery.min.js',
        '/static/admin/plugins/fineuploader.min.js',
        '/static/admin/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js',
        '/static/admin/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css',
        '/static/admin/js/admin/app.js',
        '/static/admin/js/admin/directives/imageUpload.js',
        '/static/admin/js/admin/directives/assetUpload.js',
        '/static/admin/js/admin/directives/chosenSelect.js',
        '/static/admin/js/admin/directives/newChildWith.js',
        '/static/admin/js/admin/directives/convertMarkdown.js',
        '/static/admin/js/admin/directives/toggleRow.js',
        '/static/admin/js/admin/directives/subNav.js',
        '/static/admin/js/admin/directives/widget.js',
        '/static/admin/js/admin/controllers/RouteController.js',
        '/static/admin/js/admin/controllers/ResourceController.js',
        '/static/admin/js/admin/directives/sortable.js',
        '/static/admin/js/admin/directives/urlField.js',
        '/static/admin/js/admin/directives/datetimepicker.js'
      ],
      complete: function () {
        angular.element(document).ready(function() {
          angular.bootstrap(this, ['Admin']);
        });
      }
    }
  ]);
} ) ( window, document );
