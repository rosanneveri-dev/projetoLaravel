<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function carrinhoLista(Request $request)
    {
        $itens = \Cart::getContent();
        return view('site.carrinho', compact('itens'));
    }


    public function adicionarCarrinho(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => abs($request->qtn),
            'attributes' => array(
                'image' => $request->img,
            )

        ]);
        return redirect()->route('site.carrinho')->with('sucesso', 'Produto adicionado com sucesso!');
    }
    public function removerCarrinho(Request $request)
    {


        \Cart::remove($request->id);
        return redirect()->route('site.carrinho')->with('sucesso', 'Produto removido com sucesso!');
    }

    public function atualizarCarrinho(Request $request)
    {
        \Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => abs($request->quantity),
            ],
        ]);

        return redirect()->route('site.carrinho')->with('sucesso', 'Produto atualizado com sucesso!');
    }
    public function limparCarrinho()
    {
        \Cart::clear();
        return redirect()->route('site.carrinho')->with('aviso', 'Seu carrinho está vazio!');
    }
}
