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


    public function adicionaCarrinho(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->qtn,
            'attributes' => array(
                'image' => $request->img,
            )

        ]);
        return redirect()->route('site.carrinho')->with('sucesso', 'Produto adicionado no carrinho com sucesso!');
    }
    public function removeCarrinho(Request $request)
    {


        \Cart::remove($request->id);
        return redirect()->route('site.carrinho')->with('sucesso', 'Produto do carinho removido com sucesso!');
    }
}
