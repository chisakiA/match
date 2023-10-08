<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css\app.css') }}" type="text/css">

    
    <!-- Scripts -->
    <!- @vite(['resources/sass/app.scss'])
    <script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>

<body>
    <!-- Header Start -->
    <header class="site-header">
      <div class="wrapper site-header__wrapper">
        <div class="site-header__start">
        </div>
        <div class="site-header__middle">
          <nav class="nav">
            <ul class="nav__wrapper">
              <li class="nav__item"><a href="{{route('timeline')}}" class="nav-link">TimeLine</a></li>
              <li class="nav__item"><a href="{{route('user.matches')}}" class="nav-link">Message</a></li>
              <li class="nav__item"><a href="{{route('user.favorite')}}" class="nav-link">LikeList</a></li>
              <li class="nav__item"><a href="{{route('user.edit')}}" class="nav-link">MyProfile</a></li>
            </ul>
          </nav>
        </div>
        <div class="site-header__end">
        <li class="nav-item"><a href="{{route('logout')}}" class="nav-link">▶Logout</a></li>
        </div>
      </div>
    </header>
    <!-- Header End -->
        <main class="py-4">
            @yield('content')
        </main>

        <script src="{{ asset('js/app.js') }}"></script>
    @stack('js')

</body>
</html>
