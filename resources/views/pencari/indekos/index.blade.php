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
                    @foreach($kos->kriteria as $kri)
                    <div class="slash"></div> Rp.<span id="harga{{$kos->id}}">{{$kri->price}}</span> 
                    @endforeach   
                  </div>
                </div>
                  <i class="fas fa-map-marker-alt"> </i> <span>Alamat : {{$kos->address}}</span> <br>
                  <i class="fas fa-venus-mars"></i> <span>Khusus  : {{$kos->type}}</span><br>
                  {!!$kos->description!!}                
                  <div class="text-right mt-2">
                    <a href="{{route('user.indekos.show', $kos->id) }}" class="btn btn-info mr-1">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('user.favorite.store') }}"
                        onclick="event.preventDefault();
                        document.getElementById('fav-form{{$loop->iteration}}').submit();"  class="btn btn-danger mr-1 @foreach($favorite as $fav) @if($fav->boarding_house_id == $kos->id) d-none @endif @endforeach">
                        <i class="fas fa-heart"></i> 
                    </a>
                    <form id="fav-form{{$loop->iteration}}" action="{{ route('user.favorite.store') }}" method="POST" class="d-none">
                        @csrf
                        <input type="number" name="boarding_house_id" id="" value="{{$kos->id}}">
                    </form>                    
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
<script>
    $(document).ready(function(){
    // Format mata uang.
      @foreach($indekos as $kos)
        $( '#harga{{$kos->id}}' ).mask('#.000.000.000.000.000', {reverse: true});
      @endforeach
    })
</script>
@endsection