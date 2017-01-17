<div class="row">
  <div class="col-md-12">
    <h2>Snippets</h2>
  </div>
</div>
<div class="row" ng-repeat="item in snippets" ng-controller="ResourceController" data-laravel-resource="Snippet" data-options="markup" convert-markdown="body">
  <div class="col-md-12">
    <h3 class="edit-header capitalize">
      [[ item.for ]]
      <span class="btn-group pull-right">
        <?= HTML::actions( Snippet::$required_fields ) ?>
        <ul class="dropdown-menu pull-left">
          <li><a ng-click="save()">Save Snippet</a></li>
          <li><a ng-click="get()">Revert Changes</a></li>
        </ul>
      </span>
    </h3>
  </div>
  <div class="col-md-4 edit-field">
    <label>Title</label>
    <input class="form-control" type="text" ng-model="item.title" maxlength="70" />
  </div>
  <div class="col-md-12 edit-field">
    <label>Body</label>
    <textarea class="form-control markdown-editor" name="body" ng-model="item.body" data-provide="markdown"></textarea>
  </div>
</div>
