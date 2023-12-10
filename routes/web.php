<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Models\Customer;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/form',[FormController::class,'index']);
Route::post('/register',[FormController::class,'register']);

// Route::get('/customer', function () {
//     $customers=Customer::all();
//     echo "<pre>";
//     print_r($customers->toArray());
// });

Route::get('/customer/create',[CustomerController::class,'index']);

//view customers
Route::get('/customer/view',[CustomerController::class,'view']);

//add customer
Route::post('/customer/create',[CustomerController::class,'store'])->name('customer.create');


//delete customer
Route::get('/customer/delete/{id}',[CustomerController::class,'delete'])->name('customer.delete');

//edit customer
Route::get('/customer/edit/{id}',[CustomerController::class,'edit'])->name('customer.edit');

Route::get('/customer/update/{id}',[CustomerController::class,'update'])->name('customer.update');


