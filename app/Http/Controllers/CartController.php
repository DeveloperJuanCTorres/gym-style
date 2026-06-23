<?php

namespace App\Http\Controllers;

use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $variant = ProductVariant::with([
            'product',
            'color',
            'size'
        ])->findOrFail(
            $request->variant_id
        );

        Cart::add([
            'id' => $variant->id,
            'name' => $variant->product->name,
            'qty' => 1,
            'price' => $variant->price,
            'weight' => 0,
            'options' => [

                'product_id' =>
                $variant->product_id,

                'color' =>
                $variant->color?->name,

                'size' =>
                $variant->size?->name,

                'image' =>
                $variant->image
                    ? url('storage/' . str_replace('\\', '/', $variant->image))
                    : url('storage/' . str_replace('\\', '/', $variant->product->image))

            ]
        ]);

        return response()->json([
            'success' => true,
            'count' => Cart::count()
        ]);
    }

    public function content()
    {
        return response()->json([
            'items' => Cart::content()->values(),
            'subtotal' => Cart::subtotal(),
            'total' => Cart::subtotal(),
            'count' => Cart::count()
        ]);
    }

    public function update(Request $request)
    {
        Cart::update(
            $request->rowId,
            $request->qty
        );

        return response()->json([
            'success'=>true
        ]);
    }

    public function remove($rowId)
    {
        Cart::remove($rowId);

        return response()->json([
            'success'=>true
        ]);
    }
}
