<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    return view('admin.index');
  }

  public function category()
  {
    $categories = Category::all();
    return view('admin.category',compact('categories'));
  }
  public function categoryadd()
  {
    return view('admin.categoryadd');
  }
  public function product()
  {
    $products = Product::all();
    return view('admin.product',compact('products'));

  }
  public function productadd()
  {
    $categories = Category::all();
    $brands = Brand::all();
    return view('admin.productadd',compact('categories','brands'));
  }

  public function cataddpost(Request $request)
  {
    Category::create($request->all());

    return redirect('admin/category');
  }

  public function proaddpost(Request $request)
  {
    Product::create($request->all());

    return redirect('admin/product');
  }




  public function brand()
  {
    $brands = Brand::all();
    return view('admin.brand',compact('brands'));

  }
  public function brandadd()
  {


    return view('admin.brandadd');
  }

  public function braaddpost(Request $request)
  {
    Brand::create($request->all());

    return redirect('admin/brand');
  }


}
