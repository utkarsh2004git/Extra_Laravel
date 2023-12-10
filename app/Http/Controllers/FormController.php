<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index(){
        return view('form');
    }
    public function register(Request $req ){
        $req->validate(
            [
                'name'=>'required',
                'email'=>'required|email',
                'pass'=>'required',
            ]
        );
        echo "<pre>";
        print_r($req->all());
    }
}
