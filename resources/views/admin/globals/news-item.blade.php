<div ng-controller="ResourceController" data-laravel-resource="App\Models\News" data-laravel-stem="/admin/news/" class="margin-bottom" name="top">
  <div class="row">
    <div class="col-md-12">
      <div class="btn-group pull-right">
        <?= HTML::actions( ['title'] ) ?>
        <ul class="dropdown-menu pull-left">
          <li><a ng-click="save()">Save</a></li>
        </ul>
      </div>

      <h4 class="edit-header">
        [[ item.id ? 'Editing' : 'Creating' ]] News: <span class="title" ng-class="{ untitled: !item.title }">"[[ item.title ? item.title : 'Untitled' ]]"</span>
        &nbsp;
      </h4>
    </div>
    <div class="col-md-3 edit-field">
      <label for="title">Title</label>
      <input class="form-control" type="text" name="title" ng-model="item.title" />
    </div>
    <div class="col-md-3 edit-field">
      <label for="slug">Slug</label>
      <input class="form-control" type="text" name="slug" ng-model="item.slug" ng-disabled="item.id" />
    </div>
  </div>

  <hr style="margin: 15px 0;"/>

  <div class="row">
    <div class="form-group">
      <label>Teaser</label>
      <textarea ck-editor class="form-control" type="text" ng-model="item.teaser" placeholder="Body" rows="10"></textarea>
    </div>
    <div class="form-group">
      <label>Body</label>
      <textarea ck-editor class="form-control" type="text" ng-model="item.body" placeholder="Body" rows="10"></textarea>
    </div>
  </div>

</div>
