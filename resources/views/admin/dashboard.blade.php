

@if(Auth::check())
    <h1>Olá {{ Auth::user()->firstName }}</h1>
@else
    <h1>Usuário não autenticado</h1>
@endif