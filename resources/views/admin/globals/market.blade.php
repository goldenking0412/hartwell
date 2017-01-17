<div ng-controller="ResourceController" data-laravel-resource="App\Models\Market" data-laravel-stem="/admin/market/" class="margin-bottom" name="top">
  <div class="row">
    <div class="col-md-12">
      <div class="btn-group pull-right">
        <?= HTML::actions( ['title'] ) ?>
        <ul class="dropdown-menu pull-left">
          <li><a ng-click="save()">Save</a></li>
        </ul>
      </div>

      <h4 class="edit-header">
        [[ item.id ? 'Editing' : 'Creating' ]] Market: <span class="title" ng-class="{ untitled: !item.title }">"[[ item.title ? item.title : 'Untitled' ]]"</span>
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
    <div class="col-md-12 edit-field">
      <label>Banners</label>
      <ul class="list-unstyled" sortable-parent="delta">

        <li class="well edit-field clearfix" ng-controller="ResourceController" data-laravel-resource="Banner" ng-repeat="item in item.banners | orderBy: 'delta'" sortable-child style="margin-bottom: 10px">
          <div class="form-group">
            <label>Banner Headline</label>
            <input class="form-control" type="text" ng-model="item.headline" placeholder="Headline" />
          </div>

          <div class="form-group">
            <div image-upload="item.image" class="text-center well banner-upload-well" directory="banners">
              <a class="btn btn-success full-width">[[ item.image ? 'Change' : 'Upload' ]] Banner Image<span class="icon-upload icon-white"></a>
            </div>
          </div>

          <div class="form-group">
            <label>Banner Body</label>
            <textarea ck-editor class="form-control" type="text" ng-model="item.body" placeholder="Body" rows="10"></textarea>
          </div>

          <div class="well-options-container btn-group pull-right">
            <a class="btn btn-default sorter-handle" ng-if="$parent.$parent.item.banners.length > 1">Move<span class="glyphicon-move glyphicon"></span></a>
            <a class="btn btn-danger delete" ng-click="removeFrom( $parent.$parent.item.banners )">Delete</a>
          </div>
        </li>

        <li style="margin-top: 20px;" class="well edit-field clearfix" ng-controller="ResourceController" data-laravel-resource="Banner" new-child-with="fake_id pushing [ 'headline', 'image', 'body' ] into $parent.item.banners">
          <div class="form-group">
            <label>Banner Headline</label>
            <input class="form-control" type="text" ng-model="item.headline" placeholder="Headline" />
          </div>

          <div class="form-group">
            <div image-upload="item.image" class="text-center well banner-upload-well" directory="banners">
              <a class="btn btn-success full-width">[[ item.image ? 'Change' : 'Upload' ]] Banner Image<span class="icon-upload icon-white"></a>
            </div>
          </div>

          <div class="form-group">
            <label>Banner Body</label>
            <textarea ck-editor class="form-control" type="text" ng-model="item.body" placeholder="Body" rows="10"></textarea>
          </div>
          <a class="btn btn-success pull-right" ng-click="saveChild()" style="margin-top: 20px;">Add Banner</a>
        </li>

      </ul>
    </div>
  </div>

  <hr style="margin: 15px 0;"/>

  <div class="row">
    <div class="col-md-12 edit-field">
      <label>Bands</label>
      <ul class="list-unstyled" sortable-parent="delta">

        <li class="well edit-field clearfix" ng-controller="ResourceController" data-laravel-resource="Band" ng-repeat="item in item.bands | orderBy: 'delta'" sortable-child style="margin-bottom: 10px">
          <div class="form-group">
            <label>Band Type</label>
            <select class="form-control" ng-model="item.type">
              <option value="text">Text</option>
              <option value="image-left">Left Image</option>
              <option value="image-right">Right Image</option>
            </select>
          </div>
          <div class="form-group">
            <label>Band Color</label>
            <select class="form-control" ng-model="item.dark">
              <option value="0">White</option>
              <option value="1">Black</option>
            </select>
          </div>

          <div class="form-group">
            <div image-upload="item.image" class="text-center well banner-upload-well" directory="bands">
              <a class="btn btn-success full-width">[[ item.image ? 'Change' : 'Upload' ]] Band Image<span class="icon-upload icon-white"></a>
            </div>
          </div>

          <div class="form-group">
            <label>Band Body</label>
            <textarea ck-editor class="form-control" type="text" ng-model="item.body" placeholder="Body" rows="10"></textarea>
          </div>
          <div class="well-options-container btn-group pull-right">
            <a class="btn btn-default sorter-handle" ng-if="$parent.$parent.item.bands.length > 1">Move<span class="glyphicon-move glyphicon"></span></a>
            <a class="btn btn-danger delete" ng-click="removeFrom( $parent.$parent.item.bands )">Delete</a>
          </div>
        </li>

        <li style="margin-top: 20px;" class="well edit-field clearfix" ng-controller="ResourceController" data-laravel-resource="Band" new-child-with="fake_id pushing [ 'dark', 'type', 'image', 'body' ] into $parent.item.bands">
          <div class="form-group">
            <label>Band Type</label>
            <select class="form-control" ng-model="item.type">
              <option value="text">Text</option>
              <option value="image-left">Left Image</option>
              <option value="image-right">Right Image</option>
            </select>
          </div>
          <div class="form-group">
            <label>Band Color</label>
            <select class="form-control" ng-model="item.dark">
              <option value="0">White</option>
              <option value="1">Black</option>
            </select>
          </div>

          <div class="form-group">
            <div image-upload="item.image" class="text-center well banner-upload-well" directory="bands">
              <a class="btn btn-success full-width">[[ item.image ? 'Change' : 'Upload' ]] Band Image<span class="icon-upload icon-white"></a>
            </div>
          </div>

          <div class="form-group">
            <label>Band Body</label>
            <textarea ck-editor class="form-control" type="text" ng-model="item.body" placeholder="Body" rows="10"></textarea>
          </div>
          <a class="btn btn-success pull-right" ng-click="saveChild()" style="margin-top: 20px;">Add Band</a>
        </li>

      </ul>
    </div>
  </div>

</div>
