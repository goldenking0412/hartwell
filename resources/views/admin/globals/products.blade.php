<div id="clients" class="row">
  <div class="col-md-12">
    <h2>Products</h2>
    <table class="table table-striped table-bordered">
      <thead>
        <th></th>
        <th>Title</th>
        <th>Slug</th>
        <th class="hidden-xs">Image</th>
        <th>&nbsp;</th>
      </thead>
      <tbody sortable-parent="delta" autosave="true">
        <tr ng-controller="ResourceController" data-laravel-resource="App\Models\Product" ng-repeat="item in items" class="client-row" sortable-child>
          <td class="col-xs-1 sorter-handle text-center"><i class="icon-move glyphicon glyphicon-move"></i></td>
          <td class="col-md-5 col-xs-5">
            <div class="input-group">
              <input type="text" class="form-control" ng-model="item.title" placeholder="Title" />
              <div class="input-group-btn">
                <?= HTML::actions( ['title', 'slug'] ) ?>
                <ul class="dropdown-menu pull-right">
                  <li><a ng-click="save()">Save</a></li>
                </ul>
              </div>
            </div>
          </td>
          <td class="col-md-5 col-xs-5">
            <div class="input-group">
              <input type="text" class="form-control" ng-model="item.slug" placeholder="Slug" />
            </div>
          </td>
          <td class="col-md-2 hidden-xs img-cell-white">
            <div image-upload="item.image" directory="products">
              <div class="text-center">
                <a class="btn btn-success btn-sm">Image</a>
              </div>
            </div>
          </td>
          <td>
            <a class="btn btn-sm btn-warning" ng-href="/admin/products/[[ item.id ]]">Edit</a>
            <a class="btn btn-sm btn-danger" ng-click="delete()" style="margin-top: 10px;">Delete</a>
          </td>
        </tr>
        <tr ng-controller="ResourceController" data-laravel-resource="App\Models\Product" class="client-row">
          <td class="col-md-1"></td>
          <td class="col-md-5 col-xs-6">
            <div class="input-group">
              <input class="form-control" type="text" ng-model="item.title" placeholder="Product Name" />
              <div class="input-group-btn">
                <button class="btn btn-success" ng-click="save()" ng-class="{ disabled: !item.title }" type="button">Add Product</button>
              </div>
            </div>
          </td>
          <td class="col-md-5 col-xs-5">
            <div class="input-group">
              <input type="text" class="form-control" ng-model="item.slug" placeholder="Slug" />
            </div>
          </td>
          <td class="col-md-2 hidden-xs img-cell-white">
            <div image-upload="item.image" directory="products">
              <div class="text-center">
                <a class="btn btn-success btn-sm">Image</a>
              </div>
            </div>
          </td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
