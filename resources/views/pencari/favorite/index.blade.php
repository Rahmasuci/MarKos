@extends('layouts.stisla')
@section('title', 'Favorit Indekos')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
        <h1>Favorit</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></div>
          <div class="breadcrumb-item ">Favorit</div>
        </div>
    </div>

    <div class="section-body">
     @if($indekos->count() >= 2)
      <div class="">
        <button class="btn btn-primary" id="modal-compare"><i class="fas fa-check"></i> Bandingkan</button>
      </div>
      @endif
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
                  <i class="fas fa-dollar-sign"></i> <span>Harga  : Rp.<span id="harga{{$kos->id}}">{{$kri->price}}</span></span><br>
                  @endforeach 
                  {!!$kos->description!!}               
                  <div class="text-right mt-2">
                    <a href="{{route('user.favorite.show', $kos->id) }}" class="btn btn-info mr-1">
                      <i class="fas fa-eye"></i>
                    </a>
                    <button class="btn btn-danger" id="modal-delete-{{$kos->id}}"><i class="fas fa-trash"></i></button>
                  </div>
              </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="col-12 mt-4">
          <p class="text-center">Belum ada Favorit Indekos</p>   
        </div>
      @endif
      </div>
    </div>
    @include('pencari.favorite.compare')
    @include('pencari.favorite.delete')
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
<script>
$("#modal-compare").fireModal({
    title: 'Bandingkan Indekos',
    body: $("#modal-compare-part"),
    footerClass: 'bg-whitesmoke',
    autoFocus: false,
    shown: function(modal, form) {
      console.log(form)
    }
  });
@foreach($indekos as $kos)
  $("#modal-delete-{{$kos->id}}").fireModal({
    title: 'Hapus Favorit Indekos',
    body: $("#modal-delete-part{{$kos->id}}"),
    footerClass: 'bg-whitesmoke',
    autoFocus: false,
    shown: function(modal, form) {
      console.log(form)
    }
  });
@endforeach
$('#closeModal').click(function() {
    $('#fire-modal-2').modal('hide');
});
</script>
@endsection