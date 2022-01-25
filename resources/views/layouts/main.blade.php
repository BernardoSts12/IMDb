<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title')</title>

  <!-- Fontes do Google-->
  <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

  <!--CSS Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!---CSS da aplicação-->
  <link rel="stylesheet" href="/css/style.css">



</head>


<body>

  <main>
    <nav class="navbar navbar-expand-lg navbar-light ">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="{{asset('storage/img/logo.png')}}" alt="logotipo" style="width: 70px;"></a>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/">Página Inicial</a>
            </li>

            @auth
            
            <li class="nav-item">
              <form action="/logout" method="POST">
                @csrf
                <a href="/logout" class="nav-link" onclick="event.preventDefault();
                    this.closest('form').submit();">
                  Sair
                </a>
              </form>
            </li>

            @endauth

            @guest
            <li class="nav-item">
              <a class="nav-link" href="/login">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/register">Cadastrar-se</a>
            </li>
            @endguest

          </ul>
          <form class="d-flex" action="/" method="GET">
            <input class="form-control me-2" type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
            <button class="btn" type="submit">Search</button>
          </form>
        </div>
      </div>


    </nav>
    <div class="contaner-fluid">
      <div class="row">
        @if(session('msg'))
        <P class="msg"> {{ session('msg')}}</P>
        @endif
        @yield('content')
      </div>
    </div>
  </main>

</body>

<script src="https://use.fontawesome.com/2ecb1f4487.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>