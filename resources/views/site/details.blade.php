@extends('site.layout')
@section('title', 'Detalhes')
@section('conteudo')


<div class="row container">
    <div class="col s12 m6">
    <img src="{{$produto->imagem}}" class="responsive-img"/>

    </div>

    <div class="col s12 m6" >
        <h1>{{ $produto->nome }}</h1>
        <p>{{ $produto->descricao }}</p>
        <p> Postado por: {{ $produto->user->firstName}}<br>
            Categoria: {{$produto->categoria->nome}}

        </p>
        <form name="form_produto" action="{{route('site.addcarrinho')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name ="id" value="{{ $produto->id }}">
        <input type="hidden" name ="name" value="{{ $produto->nome }}">
        <input type="hidden" name ="price" value="{{ $produto->preco }}">
        <input type="number" name ="qtn" value="1">
        <input type="hidden" name ="img" value="{{$produto->imagem}}">
                                
        <button class="btn orange btn-large" onclick="document.forms['form_produto'].submit()">Comprar</button>
         </form>
        
    </div>

</div>

@endsection