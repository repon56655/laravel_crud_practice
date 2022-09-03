<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Address;

class AddressController extends Controller
{
    public function add(){
        $address = Address::all();
        return view("backend.pages.address.add",compact("address"));

    }
    public function insert(Request $request){
        $address = new Address;
        $address->order_id = $request->order_id;
        $address->user_id = $request->user_id;
        $address->name = $request->name;
        $address->email = $request->email;
        $address->phone = $request->phone;
        $address->address = $request->address;
        $address->country = $request->country;
        $address->city = $request->city;
        $address->remark = $request->remark;

        $address->save();
        return redirect()->route("address.add");


    }
    public function delete($id){
        $address = Address::find($id);
        $address->delete();
        return redirect()->route("address.add");
    }

    public function edit($id){
        $address = Address::find($id);
        return view("backend.pages.address.edit",compact("address"));
    }
    public function update(Request $request,$id){

       $address = Address::find($id);
        $address->order_id = $request->order_id;
        $address->user_id = $request->user_id;
        $address->name = $request->name;
        $address->email = $request->email;
        $address->phone = $request->phone;
        $address->address = $request->address;
        $address->country = $request->country;
        $address->city = $request->city;
        $address->remark = $request->remark;

        $address->update();
        return redirect()->route("address.add");
    }
}
