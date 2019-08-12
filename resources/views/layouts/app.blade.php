<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="app">
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
          <a class="navbar-brand" href="{{ url('/')  }}">
            <img src="https://seeklogo.com/images/B/b-logo-A317956935-seeklogo.com.png" width="30" height="30" class="d-inline-block align-top" alt="">
            BANTU
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item px-5">
                <form class="form-inline my-2 my-lg-0" action="{{ url('sumbangan') }}" method="GET">
                  <input class="form-control mr-sm-2" value="{{ Request::get('search') }}" type="search" name="search" placeholder="Search yayasan" aria-label="Search">
                  <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/zakat') }}">Zakat</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ url('/sumbangan') }}">Sumbangan</a>
                </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/about') }}">About</a>
              </li>
              @if(Auth::check())
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="{{ (Auth::user()->foto) ? asset('images/profile/'.Auth::user()->foto) : asset('images/profile/foto_default.png') }}" class="img-fluid rounded-circle mx-1" height="30" width="30" alt="">
                  {{ Auth::user()->username }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <div class="dropdown-item">
                    {{ Auth::user()->role->nama_role }}
                  </div>
                  @if(Auth::user()->isAdmin() || Auth::user()->isHelpdesk())
                  <a class="dropdown-item" href="{{ route('dashboard.admin') }}">Dashboard</a>
                  <a class="dropdown-item" href="{{ route('account.index.admin') }}">Account</a>
                  @else
                  <a class="dropdown-item" href="{{ url('dashboard') }}">Dashboard</a>
                  <a class="dropdown-item" href="{{ route('account.index') }}">Account</a>
                  @endif
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">Logout</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </div>
              </li>
              @else

              <li class="nav-item">
                  <a class="nav-link btn-primary" href="{{ route('login') }}">{{ __('Login') }} </a>
              </li>
              @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link btn-secondary" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
              @endif

              @endif
            </ul>
          </div>
        </div>
      </nav>

        <main class="py-4">
            @yield('content')
        </main>



    </div>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/imageReader.js') }}"></script>
</body>
</html>
