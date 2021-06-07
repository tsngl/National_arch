<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Үндэсний сур харваа</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
         <!-- Latest compiled and minified CSS -->
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #f4f9ff">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand">
                    <img class="mr-3" src="assets/img/logo.png" style=" max-width:45px" />Үндэсний сур харваа
                </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @if (Route::has('login'))
                            <div class="hidden fixed top-0 right-0 sm:block">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700" style="color:gray">ХЯНАЛТЫН САМБАР</a>
                                @else
                                    <a href="{{ route('login') }}" class="text-sm text-gray-700" style="color:gray">НЭВТРЭХ</a>

                                    <!--@if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700" style="color:gray">БҮРТГҮҮЛЭХ</a>
                                    @endif-->
                                @endauth
                            </div>
                         @endif
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4 container">
        <h3 style="text-align:center">{{$c_name}}</h3><hr>
@if($male->count() !=0)
<div class="row">
          <div class="col-6">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">ЭРЭГТЭЙ ТАМИРЧИД</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>Нэр</th>
                      <th>Цол зэрэг</th>
                      <th class="text-right">Оноо</th>
                    </thead>
                    <tbody>
                    @foreach($male as $process)
                      <tr>
                        <td>{{$process->first_name}}</td>
                        <td>{{$process->skill}}</td>
                        <td class="text-right">{{$process->score}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-6">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">ЭМЭГТЭЙ ТАМИРЧИД</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>Нэр</th>
                      <th>Цол зэрэг</th>
                      <th class="text-right">Оноо</th>
                    </thead>
                    <tbody>
                    @foreach($female as $fe)
                      <tr>
                        <td>{{$fe->first_name}}</td>
                        <td>{{$fe->skill}}</td>
                        <td class="text-right">{{$fe->score}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        @else
          <div class="col-6">
            <div class="card-header"><h5>Зарлал</h5></div>
            @foreach($posts as $title)
            <div class="card">
              <div class="card-body">
                <div class="panel-heading">
                    <div class="text-center">
                        <div class="row">
                            <div class="col-sm">
                                <h3 class="float-left"><i>{{$title->title}}</i></h3>
                            </div>
                        </div>
                    </div>
                 </div>
                 <div class="panel-body">{{$title->description}}<a href="#">Дэлгэрэнгүй</a></div>
              </div>
                  <div class="card-footer">
                      <footer class="float-right"><i class="fa fa-calendar"> {{$title->created_at}}</i></footer>
                  </div>
              @endforeach
            </div>
          </div>
        @endif
    </div>
        </main>
    </div>

</body>
<footer class="text-center text-dark fixed-bottom bg-light" >
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
    © 2021 Зохиогчийн эрх:
    <a class="text-dark" href="">Монголын үндэсний сур харваа</a>
  </div>
   <!--Copyright -->
</footer>
</html>