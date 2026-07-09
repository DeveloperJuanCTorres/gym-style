<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $empresa = Company::first();
        return view('shop.checkout', compact('empresa'));
    }
}
