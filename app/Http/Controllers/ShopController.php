<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Company;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function hombre(Request $request)
    {
        $empresa = Company::first();
        $query = Product::with([
            'brand',
            'type',
            'taxonomy',
            'variants.size',
            'variants.color'
        ])
        ->whereHas('taxonomy', function ($q) {
            $q->where('nombre', 'hombre');
        });

        if ($request->filled('type')) {
            $query->where('type_id', $request->type);
        }

        if ($request->filled('brand')) {
            $query->where('brand_id', $request->brand);
        }

        if ($request->sort == 'price_asc') {
            $query->orderBy('price');
        }

        if ($request->sort == 'price_desc') {
            $query->orderByDesc('price');
        }

        if ($request->sort == 'newest') {
            $query->latest();
        }

        $products = $query->paginate(12);

        $brands = Brand::orderBy('nombre')->get();
        $types = Type::orderBy('name')->get();

        return view('shop.hombre', compact(
            'products',
            'brands',
            'types',
            'empresa'
        ));
    }

    public function mujer(Request $request)
    {
        $empresa = Company::first();
        $query = Product::with([
            'brand',
            'type',
            'taxonomy',
            'variants.size',
            'variants.color'
        ])
        ->whereHas('taxonomy', function ($q) {
            $q->where('nombre', 'mujer');
        });

        if ($request->filled('type')) {
            $query->where('type_id', $request->type);
        }

        if ($request->filled('brand')) {
            $query->where('brand_id', $request->brand);
        }

        if ($request->sort == 'price_asc') {
            $query->orderBy('price');
        }

        if ($request->sort == 'price_desc') {
            $query->orderByDesc('price');
        }

        if ($request->sort == 'newest') {
            $query->latest();
        }

        $products = $query->paginate(12);

        $brands = Brand::orderBy('nombre')->get();
        $types = Type::orderBy('name')->get();

        return view('shop.mujer', compact(
            'products',
            'brands',
            'types',
            'empresa'
        ));
    }

    public function accesorios(Request $request)
    {
        $empresa = Company::first();
        $query = Product::with([
            'brand',
            'type',
            'taxonomy',
            'variants.size',
            'variants.color'
        ])
        ->whereHas('taxonomy', function ($q) {
            $q->where('nombre', 'accesorios');
        });

        if ($request->filled('type')) {
            $query->where('type_id', $request->type);
        }

        if ($request->filled('brand')) {
            $query->where('brand_id', $request->brand);
        }

        if ($request->sort == 'price_asc') {
            $query->orderBy('price');
        }

        if ($request->sort == 'price_desc') {
            $query->orderByDesc('price');
        }

        if ($request->sort == 'newest') {
            $query->latest();
        }

        $products = $query->paginate(12);

        $brands = Brand::orderBy('nombre')->get();
        $types = Type::orderBy('name')->get();

        return view('shop.accesorios', compact(
            'products',
            'brands',
            'types',
            'empresa'
        ));
    }

    public function detalle($id)
    {
        $product = Product::with([
            'brand',
            'type',
            'variants.color',
            'variants.size'
        ])->findOrFail($id);

        return response()->json($product);
    }
}
