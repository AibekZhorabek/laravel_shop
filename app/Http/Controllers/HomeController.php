<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $products = Product::orderBy('created_at')->take(8)->get();
        $categories = Category::orderBy('id')->get();
        return view('home.index', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

//    public function showCategory(){
//        $categories = Category::orderBy('id')->get();
//        return view('home')
//    }
}
