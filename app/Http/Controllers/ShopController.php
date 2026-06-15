<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function hombre()
    {

        // $productos = Product::where('genero', 'Hombre')
        //     ->paginate(12);

        return view('shop.hombre');
    }

     public function mujer()
    {

        // $productos = Product::where('genero', 'Hombre')
        //     ->paginate(12);

        return view('shop.mujer');
    }
}
