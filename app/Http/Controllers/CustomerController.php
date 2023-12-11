<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(){
       $title= "Create Customer";
       $customer=new Customer();     //since if there is no customer data in database to fetch for update we created new empty object
       $url=url('customer/create');
       $forbtn="Submit";
       $data=compact('title','url','customer','forbtn');  //passing
        return view('customer')->with($data);
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
        return redirect('/customer/view')->with('messagecreated',"User Created successfully!");
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
        return redirect('customer/view')->with('messagedeleted',"User Deleted successfully!");

    }

    public function forcedelete($id){
        $customer=Customer::withTrashed()->find($id);
        if(!is_null($customer)){
            $customer->forcedelete();
        }
        return redirect('customer/trash')->with('messagedeleted',"User Deleted successfully!");

    }

    public function empty(){
        $customer=Customer::withTrashed()->get();
        foreach ($customer as $value) {
            if(!is_null($value)){
                $value->forcedelete();
          }
        }
        return redirect('customer/trash')->with('messagedeleted',"User Deleted successfully!");

    }

    public function restore($id){
        $customer=Customer::withTrashed()->find($id);
        if(!is_null($customer)){
            $customer->restore();
        }
        return redirect('customer/view')->with('messagerestored',"User restored successfully!");

    }
    public function edit($id){
        $customer=Customer::find($id);
        if(is_null($customer)){
            $url= url('customer/create')."/".$id;
            $title="Create Customer";
            $forbtn="Submit";
            $data=compact('url','title','forbtn');
            return redirect('customer/view')->with($data);
        }
        else{
            $url= url('/customer/update')."/".$id;  //.  is for concatinate
            $title="Update Customer";
            $forbtn="Update";
            $data=compact("customer","url",'title','forbtn');
            return view('customer')->with($data);
        }

    }
    public function update($id,Request $req){
        $customer=Customer::find($id);
        $customer->name=$req['name'];
        $customer->email=$req['email'];
        $customer->gender=$req['gender'];
        $customer->address=$req['address'];
        $customer->state=$req['state'];
        $customer->country=$req['country'];
        $customer->dob=$req['dob'];
        $customer->save();
        return redirect('/customer/view')->with('messageupdated',"User updated successfully!");
    }




    public function trashView(){
        $customers = Customer::onlyTrashed()->get(); 
        $data=compact('customers');
        return view('customer-trash')->with($data);
    }
}
