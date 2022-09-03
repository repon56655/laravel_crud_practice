<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productmodel;
use Illuminate\Support\Facades\Validator;

class Productcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $valid = Validator::make($request->all(),[
            'name'=>'required',
            'des'=>'required',
            'code'=>'required',
            'size'=>'required',
            'color'=>'required',
            'purchase_price'=>'required',
            'sell_price'=>'required'
        ]);
        if($valid->fails()){
            return response()->json([
                'status'=>'failed',
                'error'=> $valid->messages()
            ]);
        }
        else{
            $product = new Productmodel;
            $product->name = $request->name;
            $product->des = $request->des;
            $product->code = $request->code;
            $product->size = $request->size;
            $product->color = $request->color;
            $product->purchase_price = $request->purchase_price;
            $product->sell_price = $request->sell_price;
            $product->save();
            return response()->json([
                'status'=>'success'
            ]);
        }


        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $product = Productmodel::all();
        return response()->json([
            'data'=>$product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Productmodel::find($id);
        return response()->json([
            'data'=>$product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Productmodel::find($id);
        $product->name = $request->name;
        $product->des = $request->des;
        $product->size = $request->size;
        $product->color = $request->color;
        $product->code = $request->code;
        $product->purchase_price = $request->purchase_price;
        $product->sell_price = $request->sell_price;
        $product->update();
        return response()->json([
            'status'=>'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Productmodel::find($id);
        $product->delete();
        return response()->json([
            'status'=>'success'
        ]);
    }
}
