@extends('backend.mastering.master')
@section('nishat')

<div class="col-md-8 offset-md-2">
    <div class="alert alert-success msg" style="display:none"></div>

    <form action="{{ route('address.update',$address->id) }}" method="post">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" value="{{ $address->order_id }}" name="order_id">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" value="{{ $address->user_id }}" name="user_id">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" value="{{ $address->name }}" name="name">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" value="{{ $address->email }}" name="email">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" value="{{ $address->phone }}" name="phone">
        </div>
        <div class="form-group">
            <select class="form-control"  name="country">
                <option value="0">-----Select Country-----</option>
                <option value="India" @if($address->country=='India')selected @endif>India</option>
                <option value="Bangladesh" @if($address->country=='Bangladesh')selected @endif>Bangladesh</option>
                <option value="Pakistan" @if($address->country=='Pakistan')selected @endif>Pakistan</option>
                <option value="Nepal" @if($address->country=='Nepal')selected @endif>Nepal</option>
                <option value="Bhutan" @if($address->country=='Bhutan')selected @endif>Bhutan</option>
            </select>
        </div>
        <div class="form-group">
            <select class="form-control" name="city">
                <option value="0">-----Select City-----</option>
                <option value="Dhaka" @if($address->city=='Dhaka')selected @endif>Dhaka</option>
                <option value="Chittagong" @if($address->city=='Chittagong')selected @endif>Chittagong</option>
                <option value="Sylhet" @if($address->city=='Sylhet')selected @endif>Sylhet</option>
                <option value="Mymensingh" @if($address->city=='Mymensingh')selected @endif>Mymensingh</option>
                <option value="Khulna" @if($address->city=='Khulna')selected @endif>Khulna</option>
                <option value="Barisal" @if($address->city=='Barisal')selected @endif>Barisal</option>
            </select>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" value="{{ $address->address }}" name="address">
        </div>
        <div class="form-group">
            <textarea type="text" class="form-control" name="remark" rows="3">{{ $address->remark }}</textarea>
        </div>
        <div class="form-group">
            <button id="updateAddress" type="submit" class="btn btn-success form-control">Update Address</button>
        </div>
    </form>

@endsection