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

        $correo = new NewsletterMail($request->email);

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

            'first_name' => [
                'required',
                'max:100',
                'regex:/^[\\pL\\s]+$/u'
            ],

            'last_name' => [
                'required',
                'max:100',
                'regex:/^[\\pL\\s]+$/u'
            ],

            'email' => 'required|email',

            'phone' => [
                'required',
                'regex:/^[0-9+\\-\\s()]+$/'
            ],

            'product_name' => [
                'required',
                'max:255',
                'regex:/^[\\pL\\pN\\s\\-]+$/u'
            ],

            'brand' => [
                'nullable',
                'max:255',
                'regex:/^[\\pL\\pN\\s\\-]+$/u'
            ],

            'quantity' => 'required|integer|min:1',
            'description' => 'required',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072'

        ], [

            'first_name.required' => 'El nombre es obligatorio.',
            'first_name.regex' => 'El nombre solo puede contener letras y espacios.',

            'last_name.required' => 'El apellido es obligatorio.',
            'last_name.regex' => 'El apellido solo puede contener letras y espacios.',

            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Ingrese un correo electrónico válido.',

            'phone.required' => 'El teléfono es obligatorio.',
            'phone.regex' => 'El teléfono contiene caracteres no válidos.',

            'product_name.required' => 'El nombre del producto es obligatorio.',
            'product_name.regex' => 'El nombre del producto contiene caracteres no válidos.',

            'brand.regex' => 'La marca contiene caracteres no válidos.',

            'quantity.required' => 'La cantidad es obligatoria.',
            'quantity.integer' => 'La cantidad debe ser un número entero.',
            'quantity.min' => 'La cantidad debe ser al menos 1.',

            'description.required' => 'La descripción es obligatoria.',

            'image.image' => 'El archivo debe ser una imagen.',
            'image.mimes' => 'La imagen debe ser JPG, JPEG, PNG o WEBP.',
            'image.max' => 'La imagen no debe superar los 3 MB.'

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
