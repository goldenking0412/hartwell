<div class="row">
  <div class="col-md-12">
    <h2>Locations</h2>
  </div>
</div>
<div class="row border-bottom" ng-repeat="item in locations" ng-controller="ResourceController" data-laravel-resource="Location">
  <div class="col-md-12 margin-top">
    <h3 class="capitalize edit-header flat-top">Office in [[ item.city ]]</h3>
  </div>
  <div class="col-md-6">
    <div class="row">
      <div class="col-md-5 edit-field">
        <label>Address 1</label>
        <input class="form-control" type="text" ng-model="item.address_1" placeholder="Street Address" />
      </div>
      <div class="col-md-5 edit-field">
        <label>Address 2</label>
        <input class="form-control" type="text" ng-model="item.address_2" placeholder="City, State, Zipcode" />
      </div>
      <div class="col-md-5 edit-field">
        <label>City</label>
        <input class="form-control" type="text" ng-model="item.city" />
      </div>
      <div class="col-md-5 edit-field">
        <label>State</label>
        <input class="form-control" type="text" ng-model="item.state" />
      </div>
      <div class="col-md-5 edit-field">
        <label>Phone Number</label>
        <input class="form-control" type="text" ng-model="item.phone" />
      </div>
      <div class="col-md-5 edit-field">
        <label>Caption</label>
        <input class="form-control" type="text" ng-model="item.caption" />
      </div>
      <div class="col-md-5 edit-field">
        <label>Latitude</label>
        <input class="form-control" type="text" ng-model="item.latitude" />
      </div>
      <div class="col-md-5 edit-field">
        <label>Longitude</label>
        <input class="form-control" type="text" ng-model="item.longitude" />
      </div>
      <div class="col-md-10 margin-top">
        <div class="btn-group">
          <?= HTML::actions( Location::$required_fields ) ?>
          <ul class="dropdown-menu pull-left">
            <li><a ng-click="save()">Save Location</a></li>
            <li><a ng-click="get()">Revert Changes</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-2"></div>
  <div class="col-md-4 edit-field">
    <div class="row margin-top">
      <div class="well edit-field text-center" image-upload="item.image" crops="grid" directory="locations">
        <a class="btn btn-success">[[ item.image ? 'Change' : 'Upload' ]] Image</a>
        <?= HTML::image_dimensions( 'grid' ) ?>
      </div>
    </div>
  </div>
</div>
