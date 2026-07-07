@extends('site.layout')
@section('title', 'Essa é a nossa home')
@section('conteudo')

<div class="row container">
    <h3></h3>
    
    {{--for que lista os produtos por categoria--}}
    @foreach ($produtos as $produto)
    
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image"> 
                <img src="{{$produto->imagem}}" class="responsive-img">
                <a href="{{route('site.details', $produto->slug) }}"class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">visibility</i></a>
                </div>
                
                <div class="card-content">
                <span class="card-title">{{ $produto->nome }}</span>
                <p style="text-overflow: ellipsis; ">{{ Str::limit($produto->descricao, 20) }}</p>
                </div>
            </div>
        </div>
    @endforeach  
    
    
</div>  
<div class="row center">
    
</div>

@endsection
