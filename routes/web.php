<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Productcontroller;
use App\Http\Controllers\Backend\AddressController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->name('dashboard');
Route::get('/addproduct',function(){return view('backend.pages.addproduct');})->name('addproduct');
Route::post('/createproduct',[Productcontroller::class, 'create']);
Route::get('/showproduct',[Productcontroller::class, 'show']);
Route::get('/deleteproduct/{id}',[Productcontroller::class, 'destroy']);
Route::get('/editproduct/{id}',[Productcontroller::class, 'edit']);
Route::post('/updateproduct/{id}',[Productcontroller::class, 'update']);


Route::group(['prefix'=>'/address'],function(){
    Route::get('/add',[AddressController::class,'add'])->name('address.add');
    Route::post('/insert',[AddressController::class,'insert'])->name('address.insert');
    Route::get('/delete/{id}',[AddressController::class,'delete'])->name('address.delete');
    Route::get('/edit/{id}',[AddressController::class,'edit'])->name('address.edit');
    Route::post('/update/{id}',[AddressController::class,'update'])->name('address.update');
});