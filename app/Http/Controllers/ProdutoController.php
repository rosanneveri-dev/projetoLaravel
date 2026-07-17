<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use \App\Models\Produto;
use PhpParser\Node\Expr\PreDec;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::paginate(5);
        $categorias = Categoria::all();
        return view('admin.produtos', compact('produtos', 'categorias'));
        //return "index";
        //return dd($produtos);

        //$frutas = ['banana', 'maça', 'laranja' ];
        //return view('site.home', compact('frutas'));//ou site.empresa 


        //return view('site.home', compact('produtos')); //ou site.empresa 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([

            'nome'         => 'required|string|max:255',
            'preco'        => 'required|numeric|min:0',
            'descricao'    => 'nullable|string',
            'id_categoria' => 'required|exists:categorias,id',

            'imagem'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $produto = $request->only(['nome', 'preco', 'descricao', 'id_categoria']);
        //aciona posição no array (pegando o usuario validado melhor pratica)
        $produto['id_user'] = Auth::id();

        if ($request->hasFile('imagem')) {
            $produto['imagem'] = $request->file('imagem')->store('produtos', 'public');
        }
        $produto['slug'] = Str::slug($request->nome);
        $produto = Produto::create($produto);
        return redirect()->route('admin.produtos')->with('sucesso', 'Produto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)

    {
        Produto::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => abs($request->quantity),
            ],
        ]);

        //dd($produto);
        return view('admin.putprodutos', compact('produto'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()->route('admin.produtos')->with('sucesso', 'Produto removido com sucesso!');
    }
}
