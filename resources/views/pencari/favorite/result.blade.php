@extends('layouts.stisla')
@section('title', 'Hasil Perbandingan')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Hasil Perbandingan</h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="{{route('user.favorite.index')}}">Favorit</a></div>
            <div class="breadcrumb-item ">Hasil Perbandingan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-2"></div>
                <div class="card card-info col-8">
                    <div class="card-header">
                        <h4>Kriteriamu</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <p class="mb-0"><i class="fas fa-dollar-sign"></i> Harga : {{$criteria[0]}}</p>
                                <p class="mb-0"><i class="fas fa-road"></i> Jarak : {{$criteria[1]}}</p>
                                <p class="mb-0"><i class="fas fa-expand-arrows-alt"></i> Luas Kamar : {{$criteria[2]}}</p>
                            </div>
                            <div class="col-6">
                                <p class="mb-0"><i class="fas fa-tags"></i> Fasilitas : {{$criteria[3]}}</p>
                                <p class="mb-0"><i class="fas fa-list"></i> Kondisi : {{$criteria[4]}}</p>    
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
            
            <div class="row">
            @foreach($results as $result)
                <div class="col-4 col-md-4 col lg-4">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                        @foreach($result->indekos->gambar as $img )
                            @if($loop->first)
                            <img src="{{ asset('storage/indekos/'.$img->path_img) }}" alt="image" style="width:100%">
                            @endif
                        @endforeach
                        </div>
                        
                        <div class="profile-widget-description"> 
                            <span class="badge badge-primary float-right">Rank {{$loop->iteration}}</span>                           
                            <div class="profile-widget-name">                            
                                {{$result->indekos->name}}
                                <div class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div> Khusus {{$result->indekos->type}}
                                </div>
                            </div>
                            <i class="fas fa-map-marker-alt"> </i> <span>Alamat : {{$result->indekos->address}}</span> <br>
                            @foreach($result->indekos->kriteria as $kri)
                            <i class="fas fa-dollar-sign"></i> <span>Harga  : Rp.<span id="harga{{$result->indekos->id}}">{{$kri->price}}</span></span><br>
                            @endforeach 
                            {!!$result->indekos->description!!}               
                            <div class="text-right mt-2">
                                <a href="{{route('user.favorite.show', $result->boarding_house_id) }}" class="btn btn-info mr-1">
                                <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </section>
</div>
<script>
  $(document).ready(function(){
  // Format mata uang.
    @foreach($results as $result)
      $( '#harga{{$result->indekos->id}}' ).mask('#.000.000.000.000.000', {reverse: true});
    @endforeach
  })
</script>
@endsection
