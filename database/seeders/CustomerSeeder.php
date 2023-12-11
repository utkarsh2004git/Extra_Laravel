<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $customer=new Customer;
        $customer->name='Utkarsh';
        $customer->email='utkarsh@gmail.com';
        $customer->password='password';
        $customer->gender='M';
        $customer->address='Nagpur';
        $customer->state='Maharashtra';
        $customer->country='India';
        $customer->dob=now();
        $customer->save();

    }
}
