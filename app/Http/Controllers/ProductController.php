<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class ProductController extends Controller
{
    public function showCategory(Request $request, $cat_alias){
        $category = Category::where('alias', $cat_alias)->first();
        if (isset($request->orderBy)){
            return $request->orderBy;
        }
        $cat_alias = Category::select('alias')->where('alias', $cat_alias)->first();
        return view('categories.index', [
            'category' => $category,
            'cat_alias' => $cat_alias,
        ]);
    }
    public function showProduct($cat, $product_id){
        $item = Product::where('id', $product_id)->first();

        dd($item->images);
        if (isEmpty($item)){
            return view('errors.error404');
        }
//        $categories = Category::orderBy('id')->get();
//        $category = Category::orderBy('id')->first();
        return view('product.show', [
           'item' => $item,
//            'categories' => $categories
        ]);
    }
}
