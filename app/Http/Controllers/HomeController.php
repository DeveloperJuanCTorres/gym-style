<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Company;
use App\Models\Product;
use App\Models\Taxonomy;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $empresa = Company::first();
        $banners = Banner::all();
        $categorias = Taxonomy::all();

        $featuredProducts = Product::with([
            'brand',
            'type',
            'taxonomy',
            'variants.color',
            'variants.size'
        ])
        ->where('featured',1)
        ->where('is_active',1)
        ->take(4)
        ->get();

        return view('home',compact(
            'empresa',
            'featuredProducts',
            'banners', 
            'categorias'
        ));
    }
}
