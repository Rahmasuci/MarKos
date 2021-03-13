<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/adminlte/adminlte.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick-carousel/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick-carousel/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('css/style/style.css')}}">
</head>
<body>
    @yield('content')
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/adminlte/adminlte.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('plugins/popper/popper.min.js')}}"></script>
    <script src="{{asset('js/wowjs/wow.min.js')}}"></script>
    <script src="{{asset('js/slick/slick.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/landing.js')}}"></script>
    <script>
      new WOW({mobile: false}).init();
    </script>
</body>
</html>