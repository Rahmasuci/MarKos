@extends('layouts.stisla')
@section('title', 'Profil')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Profil</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></div>
                <div class="breadcrumb-item ">Profil</div>
            </div>
        </div>
        <div class="section-body">
            @include('profil.profil')
            @include('profil.update')
            @include('profil.delete')
        </div>
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