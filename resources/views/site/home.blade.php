@extends('site.layout')
@section('title', 'Essa é a nossa home')
@section('conteudo')



@foreach($frutas as $fruta)
    {{$fruta}}<br>
@endforeach

@endsection
