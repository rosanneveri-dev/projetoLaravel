@if($mensagem = Session::get('erro'))
    
        {{$mensagem}}
    
@endif

@if($mensagem = Session::get('sucesso'))
    <div style="color:green;background:pink;padding: 14px;font-size:17px;font-weight:bold;margin-bottom:15px">
        {{$mensagem}}
    </div>
@endif

@if ($errors->any())
    
        @foreach ($errors->all() as $error)
                {{$erro}}
        @endforeach
    
@endif
    

<form action="{{route('login.auth')}}" method="POST">
    

    @csrf
    Email: <input type="email" name="email"><br>
    Senha: <input type="password" name="password"><br>
    <button type="submit">Entrar</button>





</form>

