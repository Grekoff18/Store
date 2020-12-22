<?php

  namespace App\Http\Controllers;

  use App\Models\Category;
  use Illuminate\Http\Request;
  use App\Models\Product;

  class ProductController extends Controller
  {
    public function show($category_name, $product_alias)
    {
      $item = Product::where("product_alias", $product_alias)->first();

      return view("product.show", [
        "item" => $item,
      ]);
    }

    public function showCategory($category_alias)
    {
      $category = Category::where("alias", $category_alias)->first();

      return view("categories.index", [
        "category" => $category
      ]);
    }
}
