<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customer = new Customer();
        $customer->name = "dudung";
        $customer->no_hp = "08367398392";
        $customer->alamat = "Jl.Aman Jaya";
        $customer->save();
    }
}
