<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>


    
</head>
<body>
    <nav class="red">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo center">Curso Laravel</a>
      <ul id="nav-mobile"class= "left">
        <li><a href="sass.html">Home</a></li>
        <li><a href="badges.html">Carrinho</a></li>
        <li><a href="collapsible.html">JavaScript</a></li>
      </ul>
    </div>
  </nav>
 @yield('conteudo')
    
     
   


</body>
</html>