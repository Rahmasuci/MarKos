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
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">    
    <link rel="stylesheet" href="{{ asset ( 'css/izitoast/iziToast.min.css')}}">

    <script src="{{asset ('plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset ('plugins/jquery-ui/jquery-ui.min.js')}}"></script>

    <script src="{{asset ('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset ('plugins/bootstrap/js/bootstrap.bundle.js')}}"></script>
    
    <script src="{{asset ('js/popper.js/popper.min.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>

    <script src="{{asset ('plugins/moment/moment.min.js')}}"></script>  
    
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>  

    <script src="{{asset ('assets_stisla/assets/js/stisla.js')}}"></script>  
    <script src="{{asset ('assets_stisla/assets/js/scripts.js')}}"></script>
    <script src="{{asset ('assets_stisla/assets/js/custom.js')}}"></script>

    <script src="{{ asset ('js/izitoast/iziToast.min.js') }}"></script>
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

    <!-- TAMBAH FAV INDEKOS -->
    <script>
    jQuery(document).ready(function() {      
        $('.fav').click(function(event){
        var boarding_house_id    = $(this).attr("value");
        // console.log(boarding_house_id)  
        $.ajax({
            url:"{{ route('user.favorite.store') }}",
            method:"POST",          
            dataType: 'JSON', 
            data:{"_token": "{{ csrf_token() }}",
                "boarding_house_id":boarding_house_id,
        }})
        .done(function(hasil){
            iziToast.success({
                title: 'Berhasil',
                message: hasil.success,
                position: 'topRight'
            });
        })        
        .fail(function(request, error, status){
        console.log("error");
        });
        });
    });
    </script>

</body>
</html>