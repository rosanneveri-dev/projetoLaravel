@extends('site.layout')
@section('title', 'Carrinho')
@section('conteudo')

<div class="row container">
    @if ($mensagem = Session::get('sucesso'))
    {{$mensagem}}  

    <div class="card green darken-1">
        <div class="card-content white-text">
          <span class="card-title">Parabéns!</span>
          <p>{{ $mensagem }}</p>
        </div>
        
      </div> 

    @endif


    <h5>Seu carrinho possui {{ $itens->count() }} produtos. </h5>
    
    {{--for que lista os produtos por categoria--}}
    
    <table class="striped">
        <thead>
            <tr>
                <th></th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th></th>
            </tr>
        </thead>
        
        <tbody>

        @foreach ($itens as $item)
          <tr>
            <td><img src="{{$item->attributes->image}}" alt="" width="70" class="responsive-img circle"></td>
            <td>{{$item->name}}</td>
            <td>R$ {{number_format($item->price, 2,',','.')}}</td>
            
            <td><input style="width: 40px; font-weight:900" class="white center" type="number" name="quantity" value="{{$item->quantity}}"></td>
            <td>
                
                <button type="button" class="btn-floating waves-effect waves-light green"><i class="material-icons left">refresh</i></button>
                
                <form name="form_delete"action="{{route('site.removeCarrinho')}}" method="POST"enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$item->id}}">
                <button type="button" class="btn-floating waves-effect waves-light red" onclick="document.forms['form_delete'].submit()"><i class="material-icons">delete</i></button>
                </form>
            </td>
            </tr>
        @endforeach  
        
        </tbody>
    </table>
  <div  class="row container center">
        <td><button class=" btn-large waves-effect waves-light blue" >Continuar comprando<i class="material-icons right">arrow_back</i></button></td>
        <td><button class=" btn-large waves-effect waves-light blue">Limpar carrinho<i class="material-icons right">clear</i></button></td>
        <td><button class=" btn-large waves-effect waves-light green">Finalizar pedido<i class="material-icons">check</i></button></td>

    </div>
   
</div>   
    
@endsection
