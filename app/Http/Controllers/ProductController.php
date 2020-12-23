<?php

  namespace App\Http\Controllers;

  use App\Models\Category;
  use Illuminate\Http\Request;
  use App\Models\Product;

  class ProductController extends Controller
  {
    public function show($category_name, $product_id)
    {
      $item = Product::where("id", $product_id)->first();

      return view("product.show", [
        "item" => $item,
      ]);
    }

    public function showCategory(Request $request, $category_name)
    {
      $category = Category::where("alias", $category_name)->first();
      $prod = Product::where("category_id", $category->id)->paginate(2);

      /**
       * Filter for category page
       * Block start
       */
      if (isset($request->orderBy))
      {
        if ($request->orderBy === "price-low-high")
        {
          $prod = Product::where("category_id", $category_name)->orderBy("price")->paginate(2);
        }
      }

      if (isset($request->orderBy))
      {
        if ($request->orderBy === "price-high-low")
        {
          $prod = Product::where("category_id", $category_name)->orderBy("price", "desc")->paginate(2);
        }
      }

      if (isset($request->orderBy))
      {
        if ($request->orderBy === "name-A-Z")
        {
          $prod = Product::where("category_id", $category_name)->orderBy("title")->paginate(2);
        }
      }

      if (isset($request->orderBy))
      {
        if ($request->orderBy === "name-Z-A")
        {
          $prod = Product::where("category_id", $category_name)->orderBy("title", "desc")->paginate(2);
        }
      }
      /**
       * Filter block end.
       */

      /**
       * Dynamic generation our page with filtered products
       */
      if ($request->ajax())
      {
        return view("ajax.order-by", [
          "prod" => $prod
        ])->render();
      }

      return view("categories.index", [
        "category" => $category,
        "prod" => $prod,
      ]);
    }
}
