@extends('layouts.stisla')
@section('title', 'Indekos')
@section('content')
<div class="main-content">
    <section class="section">
        @foreach($indekos as $kos)
        <div class="section-header">
            <h1>Foto Indekos</h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{route('owner.indekos.index')}}">Indekos</a></div>
            <div class="breadcrumb-item"><a href="{{route('owner.indekos.show', $kos->id)}}">Detail</a></div>
            <div class="breadcrumb-item ">Edit Foto Indekos</div>
            </div>
        </div>

        <div class="section-body">
            <div class="mb-4">
                <button class="btn btn-primary" id="modal-create"><i class="fas fa-plus"></i> Foto Indekos</button>
            </div>
            <div class="row">
                @foreach($kos->gambar as $img)
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <!-- {{$kos->id}} -->
                            <img src="{{ asset('storage/indekos/'.$img->path_img) }}" alt="image" style="width:100%">  
                            <div class="text-right mt-2">
                                <button class="btn btn-warning" id="modal-edit-{{$loop->iteration}}"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger" id="modal-delete-{{$loop->iteration}}"><i class="fas fa-trash"></i></button>
                            </div>      
                        </div>
                    </div>
                </div>
                @endforeach
            @endforeach
            </div>
        </div>
        @include('pemilik.foto_indekos.create')
        @include('pemilik.foto_indekos.update')
        @include('pemilik.foto_indekos.delete')
    </section>
</div>
<script>
$("#modal-create").fireModal({
  title: 'Tambah Foto Indekos',
  body: $("#modal-create-part"),
  footerClass: 'bg-whitesmoke',
  autoFocus: false,
});
@foreach($kos->gambar as $img)
$("#modal-edit-{{$loop->iteration}}").fireModal({
  title: 'Ubah Foto Indekos',
  body: $("#modal-update-part"),
  footerClass: 'bg-whitesmoke',
  autoFocus: false,
  shown: function(modal, form) {
    console.log(form)
  }
});
$("#modal-delete-{{$loop->iteration}}").fireModal({
    id: 'modal-delete',
  title: 'Hapus Foto Profil',
  body: $("#modal-delete-part{{$loop->iteration}}"),
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