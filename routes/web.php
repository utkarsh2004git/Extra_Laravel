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
Route::post('/customer/create',[CustomerController::class,'store'])->name('customer.create');
Route::get('/customer/view',[CustomerController::class,'view']);
