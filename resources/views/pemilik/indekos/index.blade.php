@extends('layouts.stisla')
@section('title', 'Indekos')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
        <h1>Indekos</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></div>
          <div class="breadcrumb-item ">Indekos</div>
        </div>
    </div>

    <div class="section-body">
      <div class="">
        <a href="{{route('owner.indekos.create')}}" class="btn btn-primary"> <i class="fas fa-plus"></i> Tambah Indekos</a>
      </div>
      <div class="row">
      @if($indekos->isNotEmpty())
        @foreach($indekos as $kos)
        <div class="col-4 col-md-4 col lg-4">
            <div class="card profile-widget">
              <div class="profile-widget-header">
              @foreach($kos->gambar as $img)
                @if($loop->first)
                <img src="{{ asset('storage/indekos/'.$img->path_img) }}" alt="image" style="width:100%">
                @endif
              @endforeach
              </div>
              <div class="profile-widget-description">
                <div class="profile-widget-name">
                {{ $kos->name }}
                  <div class="text-muted d-inline font-weight-normal">
                    <div class="slash"></div> Khusus {{$kos->type}}
                  </div>
                </div>
                  <i class="fas fa-map-marker-alt"> </i> <span>Alamat : {{$kos->address}}</span> <br>
                  @foreach($kos->kriteria as $kri)
                  <i class="fas fa-dollar-sign"></i> <span>Harga  : {{$kri->price}}</span><br>
                  @endforeach 
                  {!!$kos->description!!}                  
                  <div class="text-right mt-2">
                    <a href="{{route('owner.indekos.show', $kos->id) }}" class="btn btn-info mr-1">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{route('owner.indekos.edit', $kos->id) }}" class="btn btn-warning mr-1">
                      <i class="fas fa-pencil-alt"></i>
                    </a>
                    <a href="{{route('owner.foto-indekos.show', $kos->id) }}" class="btn btn-success mr-1">
                      <i class="fas fa-images"></i>
                    </a>
                    <!-- <button class="btn btn-success mr-1" id="modal-edit-photo"><i class="fas fa-images"></i> -->
                  </div>
              </div>
            </div>
        </div>
        @endforeach
      @else
        <div class="col-12 mt-4">
          <p class="text-center">Belum ada Indekos</p>   
        </div>
      @endif
      </div>
    </div>
    
  </section>
</div>

@endsection