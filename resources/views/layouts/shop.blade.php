<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="{{asset ('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets_users/css/shop-homepage.css')}}">
</head>
<body>
    @include('pencari.partials.navbar')

    @yield('content')

    @include('pencari.partials.footer')        

    <script src="{{asset ('plugins/jquery/jquery.min.js')}}"></script>

    <script src="{{asset ('plugins/bootstrap/js/bootstrap.min.js')}}"></script>

</body>
</html>