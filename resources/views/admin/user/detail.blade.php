@extends('layouts.stisla')
@section('title', 'Detail User')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{route('admin.user.index')}}">User</a></div>
                <div class="breadcrumb-item ">Detail User</div>
            </div>
        </div>
        <div class="section-body">
        @foreach($users as $user)
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h4> Foto Profil</h4>
                        </div>                        
                        <div class="card-body">
                            <div class=" d-flex justify-content-center">
                                @if($user->path_photo == null)
                                <img src="{{asset('assets_stisla/assets/img/avatar/avatar-1.png')}}" alt="" style="width:80%;" class="rounded-circle">
                                @else
                                <img src="{{asset('storage/photo_profile/'.$user->path_photo)}}" alt="" style="width:80%;" class="rounded-circle">
                                @endif                            
                            </div>                  
                        </div>                        
                    </div>
                    
                </div>
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Profil</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" value="{{$user->name}}" disabled>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Email</label>
                                    <input type="email" class="form-control" value="{{$user->email}}"  disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-7 col-12">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" value="{{$user->address}}" disabled>
                                </div>
                                <div class="form-group col-md-5 col-12">
                                    <label>Phone</label>
                                    <input type="tel" class="form-control" value="{{$user->phone_number}}" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label>Sebagai</label>
                                    <input type="text" class="form-control" value="{{$user->category}}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </section>
</div>
@endsection