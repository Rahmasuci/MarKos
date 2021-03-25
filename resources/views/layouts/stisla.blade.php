<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset ('plugins/fontawesome-free/css/all.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">    
    <link rel="stylesheet" href="{{ asset ( 'css/izitoast/iziToast.min.css')}}">

    <link rel="stylesheet" href="{{ asset ('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset ('assets_stisla/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets_stisla/assets/css/components.css')}}">

    <script src="{{ asset ('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset ('plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <script src="{{ asset ('js/popper.js/popper.min.js') }}"></script>
    
    <script src="{{ asset ('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset ('plugins/bootstrap/js/bootstrap.bundle.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>

    <script src="{{asset ('plugins/moment/moment.min.js')}}"></script>  

    <script src="{{asset ('assets_stisla/assets/js/stisla.js')}}"></script>  
    
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>  

    <script src="{{ asset ('js/izitoast/iziToast.min.js') }}"></script>
        
    <script src="{{ asset ('plugins/dataTables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset ('plugins/dataTables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset ('plugins/dataTables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset ('plugins/dataTables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  
</head>
<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @include('partials.navbar')
            @include('partials.sidebar')

            @yield('content')

            @include('partials.footer')
        </div>
    </div>
    
    <script src="{{ asset ('js/jquery.mask.min.js') }}"></script>

    <script>
        @if(Session::has('success'))
            iziToast.success({
                title: 'Berhasil',
                message: '{{ Session::get('success') }}',
                position: 'topRight'
            });
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                iziToast.error({
                    title: 'Gagal',
                    message: '{{ $error }}',
                    position: 'topRight'
                });
            @endforeach
        @endif
    </script>
    
    <script>
        $(document).ready(function(){
        // Format mata uang.
            $( '#harga' ).mask('#.000.000.000.000.000', {reverse: true});
        })
    </script>

    <script src="{{asset ('assets_stisla/assets/js/scripts.js')}}"></script>
    <script src="{{asset ('assets_stisla/assets/js/custom.js')}}"></script>


</body>
</html>