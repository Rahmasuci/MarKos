@extends('layouts.stisla')
@section('title', 'Detail Indekos')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
        <h1>Detail Indekos</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="{{route('owner.indekos.index')}}">Indekos</a></div>
          <div class="breadcrumb-item ">Detail Indekos</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-1">
            </div>
            @foreach($indekos as $i)
            <div class="col-10 col-md-10 col lg-10">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                    <div id="imgIndekos" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach($i->gambar as $img)
                            <li data-target="#imgIndekos" data-slide-to="{{$loop->index}}" class="{{$loop->first ? 'active' : ''}}"></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($i->gambar as $img)
                            <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                            <img class="d-block w-100" src="{{ asset('storage/indekos/'.$img->path_img) }}" alt="First slide" style="width:100%;">
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#imgIndekos" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#imgIndekos" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        </div>
                
                    </div>
                    <div class="profile-widget-description">
                        <div class="profile-widget-name">
                        <h1 class="text-left">{{ $i->name }}</h1>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <h4>Tentang</h4>
                                <i class="fas fa-map-marker-alt"></i> <span>Alamat : {{$i->address}}</span> <br>
                                @foreach($i->kriteria as $kri)
                                <i class="fas fa-dollar-sign"></i> <span>Harga  : {{$kri->price}}</span><br>
                                <i class="fas fa-venus-mars"></i> <span>Khusus {{$i->type}}</span> <br>
                                <i class="fas fa-expand-arrows-alt"></i> <span>Luas Kamar : {{$kri->large}}</span><br>
                                <i class="fas fa-road"></i> <span>Jarak dari Unej  : {{$kri->distance}}</span><br>
                                @endforeach 
                            </div>
                            <div class="col-4">
                                <h4>Fasilitas</h4>
                                @foreach($i->kriteria as $kri)
                                    <ul>
                                    @foreach($kri->fasilitas as $fas)
                                        <li>{{$fas->facility}}</li>
                                    @endforeach
                                    </ul>
                            </div>
                            <div class="col-4">
                                <h4>Kondisi</h4>
                                    <ul>
                                    @foreach($kri->kondisi as $kon)
                                        <li>{{$kon->condition}}</li>
                                    @endforeach
                                    </ul>
                                @endforeach 
                            </div>
                            <div class="col-8 mt-4"> 
                                <h4>Deskrpsi</h4>                     
                                <p>{!!$i->description!!}</p>   
                            </div>  
                            <div class="col-4 mt-4"> 
                                <h4>Info Pemilik Indekos</h4>                     
                                <i class="fas fa-house-user"></i> <span>Nama : {{$i->user->name}}</span> <br> 
                                <i class="fas fa-phone"></i> <span>No Telp : {{$i->user->phone_number}}</span> <br> 
                            </div> 
                        </div>
                                    
                        <div class="text-right mt-4">
                            <a href="#" class="btn btn-danger btn-action mr-1">
                            <i class="fas fa-heart"></i>
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
@endsection