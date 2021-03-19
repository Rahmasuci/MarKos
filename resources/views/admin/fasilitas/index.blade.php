@extends('layouts.stisla')
@section('title', 'Fasilitas')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Fasilitas</h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></div>
            <div class="breadcrumb-item ">Fasilitas</div>
            </div>
        </div>
        <div class="section-body">
            <div class="mb-4">
                <button class="btn btn-primary" id="modal-create"><i class="fas fa-plus"></i> Tambah Fasilitas</button>
            </div>
            <div class="row">
                <div class="col-12">                    
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Daftar Fasilitas</h4>
                        </div>
                        <div class="card-body">                    
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-facility">
                                <thead>
                                    <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Fasilitas</th>
                                    <th>Tanggal Buat</th>
                                    <th>Tanggal Ubah</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($facilities as $facility)
                                    <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td>{{$facility->facility}}</td>
                                    <td>{{$facility->created_at}}</td>
                                    <td>{{$facility->updated_at}}</td>
                                    <td>
                                        <button class="btn btn-warning" id="modal-update-{{$loop->iteration}}"><i class="fas fa-pencil-alt"></i> </button>
                                         <button class="btn btn-danger" id="modal-delete-{{$loop->iteration}}"><i class="fas fa-trash"></i></button>
                                    </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.fasilitas.create')
        @include('admin.fasilitas.update')
        @include('admin.fasilitas.delete')

    </section>
</div>

<script>
$("#modal-create").fireModal({
  title: 'Tambah Fasilitas',
  body: $("#modal-create-part"),
  footerClass: 'bg-whitesmoke',
  autoFocus: false,
});

@foreach($facilities as $facility)
$("#modal-update-{{$loop->iteration}}").fireModal({
  title: 'Ubah Fasilitas',
  body: $("#modal-update-part"),
  footerClass: 'bg-whitesmoke',
  autoFocus: false,
});

$("#modal-delete-{{$loop->iteration}}").fireModal({
  title: 'Hapus Fasilitas Indekos',
  body: $("#modal-delete-part{{$loop->iteration}}"),
  footerClass: 'bg-whitesmoke',
  autoFocus: false,
  shown: function(modal, form) {
    console.log(form)
  }
});
@endforeach
$('#closeModal').click(function() {
    $('#fire-modal-3').modal('hide');
});
</script>

<script>
$("#table-facility").DataTable({
  "columnDefs": [
    { "sortable": false, "targets": [4] }
  ]
});
</script>
@endsection