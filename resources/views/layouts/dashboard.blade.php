<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Simple Sidebar - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    @include('layouts.dashboardsidebar')
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{ (Auth::user()->foto) ? asset('images/profile/'.Auth::user()->foto) : asset('images/profile/foto_default.png') }}" class="img-fluid rounded-circle mx-1" height="30" width="30" alt="">
                {{ Auth::user()->username }}
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="">{{ Auth::user()->role->nama_role }}</a>
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
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
          @yield('content')
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
