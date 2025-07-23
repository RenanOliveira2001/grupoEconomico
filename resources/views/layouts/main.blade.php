<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonte do Google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!-- Aplicação do Livewire -->
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script defer src="https://unpkg.com/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script>
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.plugin(window.mask);
            });
        </script>

        <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!-- CSS da aplicação -->
        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/scripts.js"></script>

        @livewireStyles
    </head>
    <body>
      <header>
      <div class="logo">
        <img src="https://laravel.com/img/logomark.min.svg" alt="Logo">
        Gestão Inteligente
      </div>
        @auth
          <div class="user">{{ Auth()->user()->name }}
            <a href="/logout" 
                    class="nav-link" 
                    onclick="event.preventDefault();
                    this.closest('form').submit();">
                    Sair
          </a>
          </div>
        @endauth
        @guest
          <div class="user"><a href="/login">Entrar</a>
          <a href="/register">Cadastrar</a></div>
        @endguest
      </header>

      <nav>
        @yield('navbar')
      </nav>

      <div class="container">
        <div class="grid">
            <main>
            <div class="container-fluid">
              <div class="row">
                @if(session('msg'))
                  <p class="msg">{{ session('msg') }}</p>
                  <p class="error">{{ session('error') }}</p>
                @endif
                @yield('content')
              </div>
            </div>
          </main>
        </div>
      </div>

      <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
      @livewireScripts
    </body>
</html>