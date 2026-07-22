<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class CheckoutController extends Controller
{
    public function index()
    {
        $empresa = Company::first();
        return view('shop.checkout', compact('empresa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'email' => 'required|email',
            'phone' => 'required|max:20',
            'shipping_method' => 'required|in:delivery,pickup',
        ]);

        if ($request->shipping_method == 'delivery') {

            $request->validate([
                'department' => 'required',
                'province' => 'required',
                'district' => 'required',
                'address' => 'required'
            ]);

        }

        if (Cart::count() == 0) {

            return response()->json([
                'success'=>false,
                'message'=>'El carrito está vacío.'
            ],422);

        }

        try{

            $order = DB::transaction(function () use ($request){

                return $this->registrarPedido($request);

            });

            return response()->json([
                'success'=>true,
                'message'=>'Pedido registrado correctamente.',
                'order_number'=>$order->order_number
            ]);

        }catch(\Throwable $e){

            return response()->json([
                'success'=>false,
                'message'=>$e->getMessage()
            ],500);

        }

    }

    private function registrarPedido(Request $request)
    {
        $orderNumber = $this->generarNumeroPedido();

        $order = Order::create([

            'order_number'=>$orderNumber,

            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'phone'=>$request->phone,

            'shipping_method'=>$request->shipping_method,

            'department'=>$request->department,
            'province'=>$request->province,
            'district'=>$request->district,
            'address'=>$request->address,
            'reference'=>$request->reference,

            'subtotal'=>Cart::subtotal(2,'.',''),
            'shipping_cost'=>0,
            'total'=>Cart::subtotal(2,'.',''),

            'status'=>'pending'

        ]);

        foreach(Cart::content() as $item){

            $this->registrarDetalle($order,$item);

        }

        Cart::destroy();

        $rutaPDF = $this->generarPDF($order);

        $order->update([
            'pdf'=>$rutaPDF
        ]);


        return $order;

    }

    private function registrarDetalle(Order $order, $item)
    {
        $variant = ProductVariant::with([
            'product',
            'color',
            'size'
        ])
        ->lockForUpdate()
        ->find($item->id);

        if(!$variant){

            throw new \Exception('Producto no encontrado.');

        }

        if($variant->stock < $item->qty){

            throw new \Exception(
                "Stock insuficiente para {$variant->product->name}"
            );

        }

        OrderItem::create([

            'order_id'=>$order->id,
            'product_id'=>$variant->product_id,
            'variant_id'=>$variant->id,
            'product_name'=>$variant->product->name,
            'color'=>$variant->color?->name,
            'size'=>$variant->size?->name,
            'price'=>$item->price,
            'quantity'=>$item->qty,
            'subtotal'=>$item->price * $item->qty

        ]);

        $variant->decrement('stock',$item->qty);
    }

    private function generarNumeroPedido()
    {
        $ultimo = Order::latest('id')->first();

        $numero = $ultimo ? $ultimo->id + 1 : 1;

        return 'PED-' . str_pad($numero, 6, '0', STR_PAD_LEFT);
    }

    private function generarPDF(Order $order)
    {
        $order->load('items');


        $pdf = Pdf::loadView('pdf.order',[
            'order'=>$order
        ]);


        $nombre = 'pedido-'.$order->order_number.'.pdf';


        $ruta = 'orders/'.$nombre;


        Storage::disk('public')->put(
            $ruta,
            $pdf->output()
        );


        return $ruta;
    }
}
