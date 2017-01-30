<div ng-controller="ResourceController" data-laravel-resource="App\Models\ProductCategory" data-laravel-stem="/admin/product-category/" class="margin-bottom" name="top">
  <div class="row">
    <div class="col-md-12">
      <div class="btn-group pull-right">
        <?= HTML::actions( ['title'] ) ?>
        <ul class="dropdown-menu pull-left">
          <li><a ng-click="save()">Save</a></li>
        </ul>
      </div>

      <h4 class="edit-header">
        [[ item.id ? 'Editing' : 'Creating' ]] Product Category: <span class="title" ng-class="{ untitled: !item.title }">"[[ item.title ? item.title : 'Untitled' ]]"</span>
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
              <!--<option value="text">Text</option>-->
              <option value="image-left">Left Image</option>
              <option value="image-right">Right Image</option>
              <option value="image-left-float">Left Image with Floating Image</option>
              <option value="image-right-float">Right Image with Floating Image</option>
              <option value="item-slideshow">Product/Platform Slideshow</option>
              <!--
              <option value="text-2-col">Text (2 Columns)</option>
              <option value="text-3-col">Text (3 Columns)</option>
              -->
            </select>
          </div>
          <div class="form-group">
            <label>Band Background</label>
            <select class="form-control" ng-model="item.background">
              <option value="FFFFFF">White (#FFFFFF)</option>
              <option value="000000">Black (#000000)</option>
              <option value="e7e8e9">Grey (#E7E8E9)</option>
            </select>
          </div>

          <div class="form-group">
            <label>Section Title</label>
            <input class="form-control" type="text" ng-model="item.section" placeholder="" />
          </div>

          <div class="form-group" ng-show="item.type == 'image-left-float' || item.type == 'image-right-float'">
            <div image-upload="item.floating" class="text-center well banner-upload-well" directory="floating">
              <a class="btn btn-success full-width">[[ item.image ? 'Change' : 'Upload' ]] Floating Image<span class="icon-upload icon-white"></a>
            </div>
          </div>


          <div class="form-group" ng-hide="item.type == 'text-2-col' || item.type == 'text-3-col' || item.type == 'item-slideshow'">
            <div image-upload="item.image" class="text-center well banner-upload-well" directory="bands">
              <a class="btn btn-success full-width">[[ item.image ? 'Change' : 'Upload' ]] Band Image<span class="icon-upload icon-white"></a>
            </div>
          </div>

          <div class="form-group" ng-show="item.type == 'item-slideshow'">

            <div class="well edit-field clearfix" ng-controller="ResourceController" data-laravel-resource="BandImage" ng-repeat="item in item.band_images" style="margin-bottom: 10px">
              <div image-upload="item.image" class="text-center well banner-upload-well" directory="slideshow">
                <a class="btn btn-success full-width">[[ item.image ? 'Change' : 'Upload' ]] Slideshow Image<span class="icon-upload icon-white"></a>
              </div>
              <a class="btn btn-danger delete" ng-click="removeFrom( $parent.$parent.item.band_images )">Delete</a>
            </div>

            <div style="margin-top: 20px;" class="well edit-field clearfix" ng-controller="ResourceController" data-laravel-resource="BandImage" new-child-with="product_category_id pushing [ 'image' ] into $parent.item.band_images">
              <div image-upload="item.image" class="text-center well banner-upload-well" directory="slideshow">
                <a class="btn btn-success full-width">[[ item.image ? 'Change' : 'Upload' ]] Slideshow Image<span class="icon-upload icon-white"></a>
              </div>
              <a class="btn btn-success pull-right" ng-click="saveChild()" style="margin-top: 20px;">Add Slideshow Image</a>
            </div>
          </div>

          <div class="form-group" ng-hide="item.type == 'text-2-col' || item.type == 'text-3-col'">
            <label>Band Body</label>
            <textarea ck-editor class="form-control" type="text" ng-model="item.body" placeholder="Body" rows="10"></textarea>
          </div>

          <div ng-show="item.type == 'text-2-col' || item.type == 'text-3-col'">
            <div class="form-group">
              <label>Column 1</label>
              <textarea ck-editor class="form-control" type="text" ng-model="item.body" placeholder="Body" rows="10"></textarea>
            </div>
            <div class="form-group">
              <label>Column 2</label>
              <textarea ck-editor class="form-control" type="text" ng-model="item.body_2" placeholder="Body" rows="10"></textarea>
            </div>
            <div class="form-group" ng-show="item.type == 'text-3-col'">
              <label>Column 3</label>
              <textarea ck-editor class="form-control" type="text" ng-model="item.body_3" placeholder="Body" rows="10"></textarea>
            </div>
          </div>

          <div class="well-options-container btn-group pull-right">
            <a class="btn btn-default sorter-handle" ng-if="$parent.$parent.item.bands.length > 1">Move<span class="glyphicon-move glyphicon"></span></a>
            <a class="btn btn-danger delete" ng-click="removeFrom( $parent.$parent.item.bands )">Delete</a>
          </div>
        </li>

        <li style="margin-top: 20px;" class="well edit-field clearfix" ng-controller="ResourceController" data-laravel-resource="Band" new-child-with="page_id pushing [ 'background', 'type', 'image', 'floating', 'body' ] into $parent.item.bands">
          <div class="form-group">
            <label>Band Type</label>
            <select class="form-control" ng-model="item.type">
              <!--<option value="text">Text</option>-->
              <option value="image-left">Left Image</option>
              <option value="image-right">Right Image</option>
              <option value="image-left-float">Left Image with Floating Image</option>
              <option value="image-right-float">Right Image with Floating Image</option>
              <option value="item-slideshow">Product/Platform Slideshow</option>
              <!--
              <option value="text-2-col">Text (2 Columns)</option>
              <option value="text-3-col">Text (3 Columns)</option>
              -->
            </select>
          </div>
          <div class="form-group">
            <label>Band Background</label>
            <select class="form-control" ng-model="item.background">
              <option value="FFFFFF">White (#FFFFFF)</option>
              <option value="000000">Black (#000000)</option>
              <option value="e7e8e9">Grey (#E7E8E9)</option>
            </select>
          </div>

          <div class="form-group">
            <label>Section Title</label>
            <input class="form-control" type="text" ng-model="item.section" placeholder="" />
          </div>

          <div class="form-group" ng-show="item.type == 'image-left-float' || item.type == 'image-right-float'">
            <div image-upload="item.floating" class="text-center well banner-upload-well" directory="floating">
              <a class="btn btn-success full-width">[[ item.image ? 'Change' : 'Upload' ]] Floating Image<span class="icon-upload icon-white"></a>
            </div>
          </div>

          <div class="form-group" ng-hide="item.type == 'text-2-col' || item.type == 'text-3-col' || item.type == 'item-slideshow'">
            <div image-upload="item.image" class="text-center well banner-upload-well" directory="bands">
              <a class="btn btn-success full-width">[[ item.image ? 'Change' : 'Upload' ]] Band Image<span class="icon-upload icon-white"></a>
            </div>
          </div>

          <div class="form-group" ng-hide="item.type == 'text-2-col' || item.type == 'text-3-col'">
            <label>Band Body</label>
            <textarea ck-editor class="form-control" type="text" ng-model="item.body" placeholder="Body" rows="10"></textarea>
          </div>

          <div ng-show="item.type == 'text-2-col' || item.type == 'text-3-col'">
            <div class="form-group">
              <label>Column 1</label>
              <textarea ck-editor class="form-control" type="text" ng-model="item.body" placeholder="Body" rows="10"></textarea>
            </div>
            <div class="form-group">
              <label>Column 2</label>
              <textarea ck-editor class="form-control" type="text" ng-model="item.body_2" placeholder="Body" rows="10"></textarea>
            </div>
            <div class="form-group" ng-show="item.type == 'text-3-col'">
              <label>Column 3</label>
              <textarea ck-editor class="form-control" type="text" ng-model="item.body_3" placeholder="Body" rows="10"></textarea>
            </div>
          </div>

          <a class="btn btn-success pull-right" ng-click="saveChild()" style="margin-top: 20px;">Add Band</a>
        </li>

      </ul>
    </div>
  </div>

</div>
