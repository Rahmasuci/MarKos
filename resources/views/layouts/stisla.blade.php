<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="{{asset ('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets_stisla/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets_stisla/assets/css/components.css')}}">
</head>
<body>
    <div id="app">
        <div class="main-wrapper">
            @include('admin.partials.navbar')
            @include('admin.partials.sidebar')

            @yield('content')

            @include('admin.partials.footer')
        </div>
    </div>
    

    <script src="{{asset ('plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset ('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    
    <script src="{{asset ('js/popper.js/popper.min.js')}}"></script>

    <script src="{{asset ('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset ('plugins/bootstrap/js/bootstrap.bundle.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>

    <script src="{{asset ('plugins/moment/moment.min.js')}}"></script>

    <script src="{{asset ('plugins/fullcalendar/main.min.js')}}"></script>
    <script src="{{asset ('plugins/fullcalendar-daygrid/main.min.js')}}"></script>
    <script src="{{asset ('plugins/fullcalendar-timegrid/main.min.js')}}"></script>
    <script src="{{asset ('plugins/fullcalendar-interaction/main.min.js')}}"></script>
    <script src="{{asset ('plugins/fullcalendar-bootstrap/main.min.js')}}"></script>

    <script src="{{asset ('assets_stisla/assets/js/stisla.js')}}"></script>  
    <script src="{{asset ('assets_stisla/assets/js/scripts.js')}}"></script>
    <script src="{{asset ('assets_stisla/assets/js/custom.js')}}"></script>
    <script src="{{asset ('assets_stisla/assets/js/page/index.js')}}"></script>
</body>
</html>