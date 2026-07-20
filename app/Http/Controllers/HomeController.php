<?php

namespace App\Http\Controllers;

use App\Mail\Reclamos;
use App\Models\Banner;
use App\Models\Company;
use App\Models\Product;
use App\Models\Taxonomy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function terminos()
    {
        $empresa = Company::first();
        return view('terminos',compact('empresa'));
    }

    public function politicas()
    {
        $empresa = Company::first();
        return view('politicas',compact('empresa'));
    }

    public function libroReclamaciones()
    {
        $empresa = Company::first();

        return view('libro-reclamaciones', compact('empresa'));
    }

    public function correoReclamo(Request $request)
    {
        $correo = new Reclamos($request);
        try {
            Mail::to('reclamos@industrial-hammer.com')->send($correo);
            return response()->json(['status' => true, 'msg' => "El correo fue enviado satisfactoriamente"]);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => "Hubo un error al enviar, inténtalo de nuevo más tarde." . $e->getMessage()]);
        }
    }
}
