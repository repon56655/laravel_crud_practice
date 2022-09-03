@extends('backend.mastering.master')
@section('nishat')

<div class="col-md-4">
    <div class="alert alert-success msg" style="display:none"></div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Product Name" id="name">
            <span class="text-danger text-name"></span>
        </div>
        <div class="form-group">
           <textarea name="" id="des" cols="30" rows="10" placeholder="Description" class="form-control"></textarea>
           <span class="text-danger text-des"></span>
        </div>
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Product Code" id="code">
        <span class="text-danger text-code"></span>
        </div>
        <div class="form-group">
            <select name="" id="size" class="form-control">
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
            </select>
            <span class="text-danger text-size"></span>
        </div>
        <div class="form-group">
            <input type="color" class="form-control" id="color">
            <span class="text-danger text-color"></span>
        </div>
        <div class="form-group">
            <input type="number" class="form-control" placeholder="Purchase Price" id="purchase_price">
            <span class="text-danger text-purchase_price"></span>
        </div>
        <div class="form-group">
            <input type="number" class="form-control" placeholder="Sale Price" id="sell_price">
            <span class="text-danger text-sell_price"></span>
        </div>

        <button id="addProduct" class="btn btn-success">Add Product</button>
    
</div>
<div class="col-md-8">
    <table class="table">
        <thead>
        <tr>
            <th>Product Name</th>
            <th>Color</th>
            <th>Size</th>
            <th>Sell Price</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody class="productData">
        <!--<tr>
            <td>Product Name</td>
            <td>Color</td>
            <td>Size</td>
            <td>Sale Price</td>
            <td>Action</td>
        </tr>-->
        </tbody>
    </table>
</div>




<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-group">
                    <input type="text" class="form-control name" placeholder="Product Name">
                </div>
                <div class="form-group">
                <textarea cols="30" rows="10" placeholder="Description" class="des form-control"></textarea>
                </div>
                <div class="form-group">
                <input type="text" class="form-control code" placeholder="Product Code">
                </div>
                <div class="form-group">
                    <select class="form-control size">
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="XXL">XXL</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="color" class="form-control color">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control purchase_price" placeholder="Purchase Price">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control sell_price" placeholder="Sale Price">
                </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success update">Update</button>
      </div>
    </div>
  </div>
</div>


<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure want to delete?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="delete">Delete</button>
      </div>
    </div>
  </div>
</div>

@endsection