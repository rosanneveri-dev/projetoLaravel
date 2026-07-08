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
        
            <form  action="{{ route('site.putcarrinho', $item->id) }}" method="POST" style="display: inline">
            @csrf
            @method('PUT') <!-- Diretiva correta para atualizações (Update) -->

    <!-- Campo de quantidade com o valor atual do carrinho -->
            <td><input type="number" name="quantity" value="{{ $item->quantity }}" min="1" style="width: 60px; margin-right: 10px; text-align: center;"></td>

    <!-- Botão de atualização estilo Materialize -->
            <td><button type="submit" class=" btn blue" style="margin-left: 12px; display:block;">
                Atualizar
            </button>
        
            </form>
        
            {{--BTN DELETAR COM JAVASCRIPT--}}    

            <!-- Substitua o ID pelo identificador correto da sua variável do loop ($item->id) -->
    
        <form  action="{{ route('site.deletecarrinho', $item->id) }}" method="POST" style="display: inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn red " style="margin-left: 12px; display: block;" onclick="return confirm('Tem certeza que deseja remover este item?')">
                Deletar
            </button>
        </form>
        </td>
    



    
            


        
    </tbody>
</table>
@endforeach  
          
      
    <h5><b>Valor total: </b> R$ {{ number_format(\Cart::getTotal(), 2, ',', '.')}} </h5>
          
      @endif
    
      
    
    {{--TABELA DO CARRINHO--}}
    
    
    {{--BUTTONS--}}
  <div  class="row container center">
        <a href="{{route('site.index')}}"class=" btn-large waves-effect waves-light blue" > Continuar comprando <i class="material-icons right">arrow_back</i></a>
        <a href="{{route('site.clearcarrinho')}}" class=" btn-large waves-effect waves-light blue"> Limpar carrinho <i class="material-icons right">clear</i></a>
        <button class=" btn-large waves-effect waves-light green"> Finalizar pedido <i class="material-icons">check</i></button>

    </div>
   
</div>   
    
@endsection
