<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        return Response::view('home')->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    }

    public function verifylogin(Request $request)
    {
        if(isset(Auth::user()->id)){
            return response()->json(['login'=>true]);
        }
        return response()->json(['login'=>false]);
    }
}
