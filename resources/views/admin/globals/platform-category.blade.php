<div ng-controller="ResourceController" data-laravel-resource="App\Models\PlatformCategory" data-laravel-stem="/admin/platform-category/" class="margin-bottom" name="top">
  <div class="row">
    <div class="col-md-12">
      <div class="btn-group pull-right">
        <?= HTML::actions( ['title'] ) ?>
        <ul class="dropdown-menu pull-left">
          <li><a ng-click="save()">Save</a></li>
        </ul>
      </div>

      <h4 class="edit-header">
        [[ item.id ? 'Editing' : 'Creating' ]] Platform Category: <span class="title" ng-class="{ untitled: !item.title }">"[[ item.title ? item.title : 'Untitled' ]]"</span>
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

<style>
.wireframe-container {
  position: relative;
}
.wireframe-background {
  height:auto;
  width: 100%;
}
.wireframe-foreground {
  width: 100%;
  height: auto;
  position: absolute;
  top: 0;
  left: 0;
}
.hotspots {
  width: 1140px;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
}
.hotspot {
  width: 179px;
  height: 184px;
  background-image: url('/static/public/img/circle-inactive.png');
  background-repeat: no-repeat;
  background-position: center center;
  text-align: center;
  box-sizing: border-box;
  padding: 10px;
  display: table;
  position: absolute;
  left: 0%;
  top: 0%;
}
.hotspot span {
  display: table-cell;
  vertical-align: middle;
  color: #FFF;
  font-weight: 600;
  font-size: 17px;
  user-select: none;
}
</style>

  <div class="row">
    <div class="col-md-12"><label>Wireframe</label></div>
    <div class="col-md-12 edit-field">
      <div class="form-group col-md-6">
        <div class="btn btn-default"
          asset-upload="item.image"
          directory="platforms-img"
          style="margin-top:10px;">
          Upload Background
        </div>
        <div class="btn btn-default"
          asset-upload="item.image_2"
          directory="platforms-img"
          style="margin-top:10px;margin-left:10px;">
          Upload Wireframe
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <label>Circles</label>
      <ul class="list-unstyled">
        <li class="well edit-field clearfix" ng-controller="ResourceController" data-laravel-resource="HotSpot" ng-repeat="item in item.hotspots" style="margin-bottom: 10px">
          <div class="form-group col-md-3">
            <label>Text</label>
            <input class="form-control" type="text" ng-model="item.text" placeholder="Text" />
          </div>
          <div class="form-group col-md-3">
            <label>Link</label>
            <input class="form-control" type="text" ng-model="item.link" placeholder="/example/link" />
          </div>
          <div class="well-options-container btn-group pull-right">
            <a class="btn btn-danger delete" ng-click="removeFrom( $parent.$parent.item.hotspots )">Delete</a>
          </div>
        </li>

        <li style="margin-top: 20px;" class="well edit-field clearfix" ng-controller="ResourceController" data-laravel-resource="HotSpot" new-child-with="fake_id pushing [ 'text', 'link' ] into $parent.item.hotspots">
          <div class="form-group col-md-3">
            <label>Text</label>
            <input class="form-control" type="text" ng-model="item.text" placeholder="Text" />
          </div>
          <div class="form-group col-md-3">
            <label>Link</label>
            <input class="form-control" type="text" ng-model="item.link" placeholder="/example/link" />
          </div>
          <a class="btn btn-success pull-right" ng-click="saveChild()" style="margin-top: 20px;">Add Circle</a>
        </li>

      </ul>

    </div>
    <div class="col-md-12">
      <div class="wireframe-container" ng-show="item.image && item.image_2">
        <img src="/platforms-img/[[item.image]]" class="wireframe-background" />
        <img src="/platforms-img/[[item.image_2]]" class="wireframe-foreground" />
        <div class="hotspots">
          <div wireframe-hotspot class="hotspot" ng-repeat="h in item.hotspots">
            <span ng-bind="h.text"></span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <hr style="margin: 15px 0;"/>

  <div class="row">
    <div class="col-md-12 edit-field">
      <label>Banners (mobile only)</label>
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
              <option value="195a8d">Blue (#195A8D)</option>
              <option value="022F3B">Dark Blue (#022F3B)</option>
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

            <div style="margin-top: 20px;" class="well edit-field clearfix" ng-controller="ResourceController" data-laravel-resource="BandImage" new-child-with="platform_category_id pushing [ 'image' ] into $parent.item.band_images">
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
              <option value="195a8d">Blue (#195A8D)</option>
              <option value="022F3B">Dark Blue (#022F3B)</option>
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
