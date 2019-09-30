<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Deal;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){

        view()->share('brands', Brand::all() );
        view()->share('categories', Category::all() );
        view()->share('deals', Deal::all() );

    }
}
