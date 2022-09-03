@extends('backend.mastering.master')
@section('nishat')

<div class="col-md-4">
    <div class="alert alert-success msg" style="display:none"></div>

    <form action="{{ route('address.insert') }}" method="post">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Enter Order Id" name="order_id">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Enter User Id" name="user_id">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Enter Name" name="name">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Enter Email" name="email">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Enter Phone" name="phone">
        </div>
        <div class="form-group">
            <select class="form-control" name="country">
                <option value="0">-----Select Country-----</option>
                <option value="India">India</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Nepal">Nepal</option>
                <option value="Bhutan">Bhutan</option>
            </select>
        </div>
        <div class="form-group">
            <select class="form-control" name="city">
                <option value="0">-----Select City-----</option>
                <option value="Dhaka">Dhaka</option>
                <option value="Chittagong">Chittagong</option>
                <option value="Sylhet">Sylhet</option>
                <option value="Mymensingh">Mymensingh</option>
                <option value="Khulna">Khulna</option>
                <option value="Barisal">Barisal</option>
            </select>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Enter Address" name="address">
        </div>
        <div class="form-group">
            <textarea type="text" class="form-control" placeholder="Enter Remark" name="remark" rows="3"></textarea>
        </div>
        <div class="form-group">
            <button id="addAddress" type="submit" class="btn btn-success form-control">Add Address</button>
        </div>
    </form>


    
</div>
<div class="col-md-8">
    <table class="table">
        <thead>
            <tr>
                <th>#Sl</th>
                <th>Order ID</th>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Country</th>
                <th>City</th>
                <th>Address</th>
                <th>Remark</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php $sl=1; ?>
        <tbody class="productData">
            @foreach($address as $address)
            <tr>
                <td>{{ $sl }}</td>
                <td>{{ $address->order_id }}</td>
                <td>{{ $address->user_id }}</td>
                <td>{{ $address->name }}</td>
                <td>{{ $address->email }}</td>
                <td>{{ $address->phone }}</td>
                <td>{{ $address->country }}</td>
                <td>{{ $address->city }}</td>
                <td>{{ $address->address }}</td>
                <td>{{ $address->remark }}</td>
                <td>
                    <a href="{{ route('address.edit',$address->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a><a href="{{ route('address.delete',$address->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <?php $sl++; ?>
            @endforeach
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

<a href="" class="btn btn-info"><i class="fa fa-edit"></i></a><a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>