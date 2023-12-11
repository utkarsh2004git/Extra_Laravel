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
        $customer=new Customer;
        $customer->name=$faker->name;
        $customer->email=$faker->email;
        $customer->password=$faker->password;
        $forgender=$faker->gender;
        if($forgender=="Male"){
            $customer->gender='M';
        }
        elseif($forgender=="Female"){
            $customer->gender='F';
        }
        else{
            $customer->gender='O';
        }

        $customer->address=$faker->address;
        $customer->state=$faker->state;
        $customer->country=$faker->country;
        $customer->dob=$faker->date;
        $customer->save();

    }
}