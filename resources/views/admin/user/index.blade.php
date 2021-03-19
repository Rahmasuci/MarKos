@extends('layouts.stisla')
@section('title', 'User')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></div>
                <div class="breadcrumb-item ">User</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">                    
                    <div class="card">
                        <div class="card-header">
                            <h4>Daftar User</h4>
                        </div>
                        <div class="card-body">                    
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-user">
                                <thead>
                                    <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>No Hp</th>
                                    <th>Kategori</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->address}}</td>
                                    <td>{{$user->phone_number}}</td>
                                    <td>{{$user->category}}</td>
                                    <td><a href="{{route('admin.user.show', $user->id)}}" class="btn btn-action btn-info"> <i class="fas fa-eye"></i></a></td>
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
    </section>
</div>
<script>
$("#table-user").DataTable({
  "columnDefs": [
    { "sortable": false, "targets": [6] }
  ]
});
</script>
@endsection