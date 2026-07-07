<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    
    <!-- Compiled and minified CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
  {{--Dropdown Structure-- for que renderiza os options--}}
  <ul id='dropdown1' class='dropdown-content'>
    @foreach ($categoriasMenu as $categoria)
    <li><a href="{{route('site.categoria', $categoria->id)}}">{{$categoria->nome}}</a></li>
        
    @endforeach
    
  </ul>

  <nav class="blue">
    <div class="nav-wrapper container">
            
      <div class="options">
        <ul id="nav-mobile"class= "left">        
        <li><a href="{{route('site.index')}}">Home</a></li>
        <li><a href="#" class="dropdown-trigger" data-target='dropdown1'>Categorias<i class="material-icons right">expand_more</i></a></li>
        <li><a href="{{route('site.carrinho')}}">Carrinho<span class="new badge blue" data-badge-caption="">{{\Cart::getContent()->count()}}</span> </a></li>      
        </ul>
      </div>
      
      <a href="{{route('site.index')}}" class="logo">CursoLaravel</a>
      
    </div>
    
  </nav>
  
      
 @yield('conteudo')
    
     
   

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
   
<script>
    document.addEventListener('DOMContentLoaded', function () {
      var elems = document.querySelectorAll('.dropdown-trigger');

      var options = {
        alignment: 'left',
        autoTrigger: false,
        closeOnClick: true,
        constrainWidth: true,
        coverTrigger: true,
        hover: false,
        inDuration: 150,
        outDuration: 250
      };

      var instances = M.Dropdown.init(elems, options);
    });
    </script>
   
</body>
</html>