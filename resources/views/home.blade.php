@extends('layouts.stisla')
@section('title', 'Dashboard')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            @if(auth()->user()->category == 'Admin') 
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">            
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Pengguna </h4>
                        </div>
                        <div class="card-body">
                            {{$users}}
                        </div>
                     </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-tags"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Fasilitas</h4>
                    </div>
                    <div class="card-body">
                        {{$facilities}}
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-list"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Kondisi</h4>
                    </div>
                    <div class="card-body">
                        {{$conditions}}
                    </div>
                </div>
                </div>
            </div>            
            @elseif(auth()->user()->category == 'Pemilik kos')
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-home"></i>
                    </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Indekos</h4>
                    </div>
                    <div class="card-body">
                        {{$indekos}}
                    </div>
                </div>
                </div>
            </div>
            @else
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">            
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-home"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Indekos </h4>
                        </div>
                        <div class="card-body">
                            {{$kosan}}
                        </div>
                     </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-heart"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Favorit Indekos</h4>
                    </div>
                    <div class="card-body">
                        {{$favorite}}
                    </div>
                </div>
                </div>
            </div>
            @endif
        </div>

        @include('profil.profil')
        @include('profil.update')
        @include('profil.delete')
    </section>
</div>

<script>
$("#modal-edit-photo").fireModal({
  title: 'Ubah Foto Profil',
  body: $("#modal-update-part"),
  footerClass: 'bg-whitesmoke',
  autoFocus: false,
  shown: function(modal, form) {
    console.log(form)
  }
});

$("#modal-delete-photo").fireModal({
    id: 'modal-delete',
  title: 'Hapus Foto Profil',
  body: $("#modal-delete-part"),
  footerClass: 'bg-whitesmoke',
  autoFocus: false,
  shown: function(modal, form) {
    console.log(form)
  }
});

$('#closeModal').click(function() {
    $('#fire-modal-2').modal('hide');
});
</script>
@endsection