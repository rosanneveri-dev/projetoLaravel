<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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

        foreach ($usersData as $user) {
            $ano[] = $user->ano;
            $total[] = $user->total;
        }
        //formatar para char.js
        $userLabel = "'Comparativo de cadastros de usuários'";
        $userAno = implode(',', $ano);
        $userTotal = implode(',', $total);
        //dd($usersData);

        //grafico 2 - categorias
        //with()--> para relacionamento hasMany(1:N ou N:1)
        $catData = Categoria::with('produtos')->get();

        //preparar array

        foreach ($catData as $cat) {
            $catNome[] = "'" . $cat->nome . "'";
            $catTotal[] = $cat->produtos->count();
        }
        //dd($catNome,$catTotal);
        //formatar par char.js
        $catLabel = implode(',', $catNome);
        $catTotal = implode(',', $catTotal);
        //dd($catTotal, $catLabel );

        return view('admin.dashboard', compact('usuarios', 'userLabel', 'userAno', 'userTotal', 'catLabel', 'catTotal'));
    }
}
