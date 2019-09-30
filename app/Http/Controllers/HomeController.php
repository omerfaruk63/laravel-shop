<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function index()
   {
       $title = 'Larashop';
       $sub_title = 'Ürünler';
       $products = Product::all();
//       $category =  Category::first();
//       $category->products;
//        dd( Product::all());
       return view('index', compact('title','sub_title', 'products'));
   }
   public function brands($url)
   {
       $brand = Brand::whereUrl($url)->first();
       $title = $brand->title;
       $sub_title = "$brand->title  Ürünler";
       $products = $brand->products;
       return view('index',compact('title','sub_title', 'products'));
   }
   public function categories($url)
   {
       $category = Category::whereUrl($url)->first();
       $title = $category->title;
       $sub_title = "$category->title Ürünler";
       $products = $category->products;
       return view('index', compact('title','sub_title', 'products'));
   }
}
