<?php

namespace App\Http\Controllers;

use App\Mail\NewsletterMail;
use App\Mail\ProductRequestMail;
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
            Mail::to('reclamos@gymstyleshark.com')->send($correo);
            return response()->json(['status' => true, 'msg' => "El correo fue enviado satisfactoriamente"]);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => "Hubo un error al enviar, inténtalo de nuevo más tarde." . $e->getMessage()]);
        }
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $correo = new NewsletterMail($request);

        Mail::to('subscripciones@gymstyleshark.com')->send($correo);

        return response()->json([
            'success' => true,
            'message' => '¡Gracias por suscribirte!'
        ]);
    }

    public function pedidos()
    {
        $empresa = Company::first();

        return view('pedidos', compact('empresa'));
    }

    public function solicitarProducto(Request $request)
    {

        $request->validate([

            'first_name'=>'required|max:100',
            'last_name'=>'required|max:100',
            'email'=>'required|email',
            'phone'=>'required',

            'product_name'=>'required|max:255',
            'brand'=>'nullable|max:255',
            'quantity'=>'required|integer|min:1',
            'description'=>'required',

            'image'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:3072'

        ]);

        if($request->hasFile('image')){

            $image=$request->file('image')->store(
                'product_requests',
                'public'
            );

        }else{

            $image=null;

        }

        Mail::to('pedidos@gymstyleshark.com')
            ->send(new ProductRequestMail($request,$image));

        return response()->json([

            'success'=>true,
            'message'=>'Solicitud enviada correctamente.'

        ]);

    }
}
