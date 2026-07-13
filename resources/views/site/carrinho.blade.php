@extends('site.layout')
@section('title', 'Carrinho')
@section('conteudo')

<div class="row container">

    {{--CARD DE AVISO PRODUTO ADICIONADO--}}

    @if ($mensagem = Session::get('sucesso'))
    {{$mensagem}}

    <div class="card green darken-1">
        <div class="card-content white-text">
          <span class="card-title">Parabéns!</span>
          <p>{{ $mensagem }}</p>
        </div>

      </div>

    @endif

    {{--CARD DE AVISO CARRINHO VAZIO--}}

    @if ($mensagem = Session::get('aviso'))
    {{$mensagem}}

    <div class="card blue darken-1">
        <div class="card-content white-text">
          <span class="card-title">Tudo bem!</span>
          <p>{{ $mensagem }}</p>
        </div>

      </div>

    @endif

    {{--LOGICA DE EXIBIÇÃO DO CARRINHO SE ESTIVER VAZIO(CARD LARANJA) COM PRODUTOS (EXIBI A TABELA) --}}

    @if ($itens->count() == 0)

    <div class="card orange darken-1">
        <div class="card-content white-text">
          <span class="card-title">Seu carrinho está vazio!</span>
          <p>Aproveite nossas promoções!</p>
        </div>

      </div>

    @else

    {{--CONTADOR--}}
    <h5>Seu carrinho possui {{ $itens->count() }} produtos. </h5>

    <table class="striped">
        <thead>
            <tr>
                <th></th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th></th>
                <th></th>
            </tr>
        </thead>

        <tbody>

            {{--TABELA DE PRODUTOS DOS CARRINHO--}}
            @foreach ($itens as $item)
            <tr>
                <td><img src="{{$item->attributes->image}}" alt="" width="70" class="responsive-img circle"></td>
                <td>{{$item->name}}</td>
                <td>R$ {{number_format($item->price, 2,',','.')}}</td>

                {{--BTN ATUALIZAR COM JAVASCRIPT--}}
                <td>
                    <form action="{{ route('site.putcarrinho', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" style="width: 40px; font-weight:900;">

                        <button type="submit" class="btn-floating waves-effect waves-light blue">
                            <i class="material-icons right">refresh</i>
                        </button>
                    </form>
                </td>

                {{--BTN DELETAR COM JAVASCRIPT--}}
                <td>
                    <form action="{{ route('site.deletecarrinho', $item->id) }}" method="POST" enctype="multipart/form-data" style="display: inline">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn-floating waves-effect waves-light red" onclick="return confirm('Tem certeza que deseja remover este item?')">
                            <i class="material-icons right">delete</i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

    <div class="card orange">

        <div class="card-content white-text">
            <span class="card-title"><b>Valor total: </b>R$ {{ number_format(\Cart::getTotal(), 2, ',', '.')}} </span>
            <p>Pague com 12x sem juros!</p>
        </div>

    </div>

    @endif

    {{--TABELA DO CARRINHO--}}

    {{--BUTTONS--}}
    <div class="row container center">
        <a href="{{route('site.index')}}" class="btn-large waves-effect waves-light blue"> Continuar comprando <i class="material-icons right">arrow_back</i></a>
        <a href="{{route('site.clearcarrinho')}}" class="btn-large waves-effect waves-light blue"> Limpar carrinho <i class="material-icons right">clear</i></a>
        <button class="btn-large waves-effect waves-light green"> Finalizar pedido <i class="material-icons">check</i></button>
    </div>

</div>

@endsection
```
