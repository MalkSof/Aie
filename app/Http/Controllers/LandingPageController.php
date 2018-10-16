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
        
        if (setting('site.horario')>= date("H:i")) {
              # code...
            session()->put('fecha',date('Y-m-d'));
            $fecha = date('Y-m-d');
            
          }
          else{
            session()->put('fecha',date('Y-m-d', strtotime(date('Y-m-d'). ' + 1 days')));
              $fecha = date('Y-m-d', strtotime(date('Y-m-d'). ' + 1 days'));
          }  
        
        $comida = Comida::inRandomOrder()->where( $fecha('D') , '1')->get();
    
        
        return view('landing-page')->with('comidas', $comida);
    }

   
   
}
