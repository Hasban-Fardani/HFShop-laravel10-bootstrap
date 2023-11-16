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
  <link rel="shortcut icon" href="{{ asset('images/HF.png') }}" type="image/png">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('bootstrap-5.3.2-dist/css/bootstrap.min.css') }}">

  <!-- animate css -->
  <link rel="stylesheet" href="{{ asset('css/animate.css') }}" />

  <!-- custom css -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <!-- custom css from blade -->
  @yield('custom_css')
</head>

<body data-bs-theme="dark">
  <div id="app" class="d-flex w-100 h-100 flex-column">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark animate_animated animate__fadeIn" id="navbar-app">
      <div class="container">
        <a class="navbar-brand fs-3" href="{{ url('/') }}">
          <img src="{{ asset('images/HF.png') }}" alt="HF Shop Logo" width="40">
          {{ config('app.name', 'Laravel') }}
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a href=""
                class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">Dashboard</a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">Products</a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">About</a>
            </li>
          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @guest
              @if (Route::has('login'))
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
              @endif

              @if (Route::has('register'))
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
              @endif
            @else
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </div>
              </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>

    <main>
      @yield('content')
    </main>

    <div class="container-fluid bg-dark text-body-secondary mt-auto">
      <footer class="d-flex justify-content-between align-items-center mt-4 flex-wrap px-10 py-2">
        <p class="col-md-4 text-body-secondary mb-0">&copy; 2023 Company, Inc</p>

        <a href="/"
          class="col-md-4 d-flex align-items-center justify-content-center mb-md-0 me-md-auto link-body-emphasis text-decoration-none mb-3">
          <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap" />
          </svg>
        </a>

        <ul class="nav col-md-4 justify-content-end">
          <li class="nav-item"><a href="#" class="nav-link text-body-secondary px-2">Home</a></li>
          <li class="nav-item"><a href="#" class="nav-link text-body-secondary px-2">Dasboard</a></li>
          <li class="nav-item"><a href="#" class="nav-link text-body-secondary px-2">Products</a></li>
          <li class="nav-item"><a href="#" class="nav-link text-body-secondary px-2">About</a></li>
          <li class="nav-item"><a href="#" class="nav-link text-body-secondary px-2">FAQs</a></li>
        </ul>
      </footer>
    </div>
  </div>

  <!-- bootstrap js -->
  <script src="{{ asset('bootstrap-5.3.2-dist/js/bootstrap.min.js') }}"></script>

  <!-- custom js -->
  @yield('custom_js')
</body>

</html>
