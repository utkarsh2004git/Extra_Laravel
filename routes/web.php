<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Models\Customer;
use Illuminate\Http\Request;
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

//trash customers
Route::get('/customer/trash',[CustomerController::class,'trashView'])->name('customer.trash');

//add customer
Route::post('/customer/create',[CustomerController::class,'store'])->name('customer.create');


//delete customer
Route::get('/customer/delete/{id}',[CustomerController::class,'delete'])->name('customer.delete');

//Force delete customer
Route::get('/customer/forcedelete/{id}',[CustomerController::class,'forcedelete'])->name('customer.forceDelete');

//Force delete all customer
Route::get('/customer/empty',[CustomerController::class,'empty'])->name('customer.empty');

//Restore customer
Route::get('/customer/restore/{id}',[CustomerController::class,'restore'])->name('customer.restore');

//edit customer
Route::get('/customer/edit/{id}',[CustomerController::class,'edit'])->name('customer.edit');

Route::post('/customer/update/{id}',[CustomerController::class,'update'])->name('customer.update');





Route::get('get-all-session',function(){
    $session = session()->all();
    echo '<pre>';
    print_r($session);
});

Route::get('set-session',function(Request $req){
    $req->session()->put("name","DemoName");
    $req->session()->put("id","DemoID");
    // $req->session()->flash("session","success");
    
    return redirect('get-all-session');

});

Route::get('destroy-session',function(){
    session()->forget("name","DemoName");
    session()->forget("id","DemoID");
    return redirect('get-all-session');

});

