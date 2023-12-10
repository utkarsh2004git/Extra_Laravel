<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(){
        return view('customer');
    }
    public function store(Request $req){
        // echo "<pre>";
        // print_r($req->all());


        $customer=new Customer;
        $customer->name=$req['name'];
        $customer->email=$req['email'];
        $customer->password=md5($req['password']);
        $customer->gender=$req['gender'];
        $customer->address=$req['address'];
        $customer->state=$req['state'];
        $customer->country=$req['country'];
        $customer->dob=$req['dob'];
        $customer->save();
        return redirect('/customer/view');
    }
    public function view(){
        $customers=Customer::all();
        // echo "<pre>";  
        $data=compact('customers');
         return view('customer-view')->with($data);
    }

    public function delete($id){
        $customer=Customer::find($id);
        if(!is_null($customer)){
            $customer->delete();
        }

        return redirect('customer/view');

    }
}
