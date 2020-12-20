<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++)
        {
            DB::table("products")->insert([
                "title" => "Product{$i}",
                "price" => rand(100, 900),
                "in_stock" => 1,
                "description" => Str::random(20)
            ]);
        }
    }
}
