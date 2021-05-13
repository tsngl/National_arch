<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/log.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" href="/assets/css/now-ui-dashboard.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
  <!--<link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/dataTables.min.css') }}">-->
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="yellow">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a class="simple-text logo-mini">
            @yield('logo')
            <img src="assets/img/log.png"/>
        </a>
        <a class="simple-text logo-normal">
          Үндэсний сур харваа
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <!--<li class="{{'assistant' == request()->path() ? 'active' : ''}}">
            <a href="/assistant">
              <i class="now-ui-icons design_app"></i>
             <p>Хэрэглэгчийн самбар</p>
            </a>
          </li>
          <li class="{{'icons' == request()->path() ? 'active' : ''}}">
            <a href="./icons.html">
              <i class="now-ui-icons education_atom"></i>
              <p>Icons</p>
            </a>
          </li>-->
          <li class="{{'athletes-info' == request()->path() ? 'active' : ''}}">
            <a href="/athletes-info">
              <i class="fa fa-group"></i>
              <p>Тамирчдын мэдээлэл</p>
            </a>
          </li>
          <li class="{{'assistant' == request()->path() ? 'active' : ''}}">
            <a href="/assistant">
              <i class="now-ui-icons business_badge"></i> 
              <p>Тэмцээний бүртгэл</p>
            </a>
          </li>
          <li class="{{'competition' == request()->path() ? 'active' : ''}}">
            <a href="/competition">
              <i class="fa fa-thumb-tack"></i>
              <p>Тэмцээн</p>
            </a>
          </li>
          <li class="{{'athlete-archived' == request()->path() ? 'active' : ''}}">
            <a href="/athlete-archived">
              <i class="fa fa-database"></i>
              <p>Архив</p>
            </a>
          </li>
          <!--<li class="{{'participant-athletes' == request()->path() ? 'active' : ''}}">
            <a href="/participant-athletes">
              <i class="now-ui-icons business_bulb-63"></i>
              <p>Тэмцээнд оролцогчид</p>
            </a>
          </li>-->
          <li class="{{'new_rank' == request()->path() ? 'active' : ''}}">
            <a href="/new_rank">
              <i class="now-ui-icons business_bulb-63"></i>
              <p>Цолны болзол</p>
            </a>
          </li>
         <!-- <li class="active-pro">
            <a href="./upgrade.html">
              <i class="now-ui-icons education_atom"></i>
              <p>Тэмцээний явц</p>
            </a>
          </li>-->
        </ul>
      </div>
    </div>

    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <!--<a class="navbar-brand" href="#pablo">Table List</a>-->
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation"> 
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->user_type }}
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                    {{ __('Гарах') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                      </form>
                    </div>
               </li>
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>

      <div class="content">
        @yield('content')
      </div>

      <footer class="footer">
        <div class=" container-fluid ">
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Үндэсний сур харваа
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <!--<script src="{{ asset('assets/js/dataTables.min.js') }}"></script>-->
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script src="{{asset('assets/js/sweetalert.js')}}"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
     @if (session('status'))  
         swal({
            title: '{{ session('status') }}',
            icon: '{{ session('statuscode') }}',
            button: "ОК",
          });
     @endif
  </script>
  @yield('scripts')
</body>

</html>