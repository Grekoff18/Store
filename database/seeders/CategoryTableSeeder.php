<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
					[
						"title" => "Phones",
						"img"		=> "categories.jpg",
						"alias" => "phones"
					],
					[
						"title" => "Cameras",
						"img"		=> "avds_large.jpg",
						"alias" => "cameras"
					],
					[
						"title" => "Laptops",
						"img"		=> "categories.jpg",
						"alias" => "laptops"
					],
				];

				foreach($categories as $item) {
					DB::table('categories')->insert([
						"title" 			=> $item["title"],
						"description" => Str::random(60),
						"img" 				=> $item["img"],
						"alias" 			=> $item["alias"]
					]);
				}
    }
}
