<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produto;

class SiteController extends Controller
{
    public function index()
    {
        $produtos = Produto::paginate(3);
        //return "index";
        //return dd($produtos);
          
        //$frutas = ['banana', 'maça', 'laranja' ];
        //return view('site.home', compact('frutas'));//ou site.empresa 
        
        
        return view('site.home', compact('produtos'));//ou site.empresa 
    }

    public function details($slug)
    {

        
        $produto = Produto::where('slug', $slug)->first();
        Gate::authorize('ver-produto', $produto);

        return view('site.details', compact('produto'));
        
        
     }
    
     public function categoria($id)
    {

        
        $produtos = Produto::where('id_categoria', $id)->get();

        return view('site.categoria', compact('produtos'));
        
        
     }
}
