<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comida;
use App\Ingrediente;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comida = Comida::inRandomOrder()->where(date('D') , '1')->get();
       
        
        session()->put('fecha',date('Y-m-d'));
    
        
        return view('landing-page')->with('comidas', $comida);
    }

   
   
}
