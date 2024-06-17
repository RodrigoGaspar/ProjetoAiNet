<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        
        $purchases = auth()->user()->purchases()->paginate(8);
        
        return view('profile.history', ['purchases' => $purchases]);
    }
}
