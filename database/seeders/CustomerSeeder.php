<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use Faker\Factory as faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        for ($i=0; $i < 3; $i++) { 
            $customer=new Customer;
            $customer->name=$faker->name;
            $customer->email=$faker->email;
            $customer->password=md5($faker->password);
            $customer->gender=$faker->randomElement(['M', 'F',"O"]);
            $customer->address=$faker->randomElement(['Address1', 'Address2',"Address3"]);
            $customer->state=$faker->state;
            $customer->status=$faker->randomElement([1,0]);
            $customer->country=$faker->country;
            $customer->dob=$faker->date;
            $customer->save();
        }

    }
}
