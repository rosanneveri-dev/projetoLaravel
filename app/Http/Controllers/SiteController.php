<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produto;

class SiteController extends Controller
{
    public function index()
    {
        $produtos = Produto::paginate(6);
        //return "index";
        //return dd($produtos);
          
        //$frutas = ['banana', 'maça', 'laranja' ];
        //return view('site.home', compact('frutas'));//ou site.empresa 
        
        
        return view('site.home', compact('produtos'));//ou site.empresa 
    }

    public function details($slug)
    {

        
        $produto = Produto::where('slug', $slug)->first();

        return view('site.datails', compact('produto'));
        
        
     }
}
