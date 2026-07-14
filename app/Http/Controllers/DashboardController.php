<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

class DashboardController extends Controller
{
    /*
    //middleware via controller
    public function __construct()
    {
        $this->middleware('auth')->only(['index', 'home']);
        $this->middleware('auth')->except(['index', 'home']);
    } */
    public function index()
    {
        $usuarios = User::all()->count();

        //grafico 1 - usuários
        $usersData = User::select([ 
            DB::raw('YEAR(created_at) as ano'),
            DB::raw('COUNT(*) as total')
        ])
        ->groupBy('ano')
        ->orderBy('ano', 'asc')
        ->get();

        //preparar arrays
        $ano = [];
        $total = [];
        foreach($usersData as $user){
            $ano[] = $user->ano; 
            $total[] = $user-> total;

        }
        //formatar para char.js
        $userLabel = "'Comparativo de cadastros de usuários'";
        $userAno = implode(',', $ano);
        $userTotal = implode(',', $total);
        //dd($usersData);
        
        //grafico 2 - categorias
        $categoriasData = Categoria::all();
        
        //preparar array
        $categoriasNome = [];
        $categoriasTotal = [];
        foreach ($categoriasData as $categoria) {
            $categoriasNome[] = "'".$categoria->nome."'";
            $categoriasTotal[] = Produto::where('id_categoria', $categoria->id)->count();
            }
            //formatar par char.js
            $categoriasLabel = implode(',', $categoriasNome);
            $categoriasTotal = implode(',', $categoriasTotal);
            //dd($categoriasNome,$categoriasTotal );
            
        return view('admin.dashboard', compact('usuarios', 'userLabel', 'userAno', 'userTotal', 'categoriasLabel', 'categoriasTotal'));
    }
}
