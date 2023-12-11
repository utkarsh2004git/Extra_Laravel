<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Customer extends Model
{

    use HasFactory;
    use SoftDeletes;
    protected $table="customer";
    protected $primaryKey="customer_id";

    //capitalized name and modify
    public function setNameAttribute($value){
        $this ->attributes['name']=ucwords($value);
    }

    //change date format while showing only

    // public function getDobAttribute($value){
    //     return date("d-M-Y",strtotime($value));
    // }
}
