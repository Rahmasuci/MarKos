@extends('layouts.stisla')
@section('title', 'Tambah Indekos')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Tambah Indekos</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="{{route('owner.indekos.index')}}">Indekos</a></div>
          <div class="breadcrumb-item ">Tambah Indekos</div>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <form role="form" action="{{route('owner.indekos.store')}}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="name">Nama Indekos</label>
                  <input type="text" id="nama" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                  <label for="type">Jenis Indekos</label>
                  <div class="row">
                      <div class="col-6">
                          <div class="form-check">
                              <label class="form-check-label">
                                  <input class="form-check-input" type="radio" name="type" value="putra">
                                  Indekos Putra
                              </label>
                          </div>
                      </div>
                      <div class="col-6">
                          <div class="form-check">
                              <label class="form-check-label">
                                  <input class="form-check-input" type="radio" name="type" value="putri">
                                  Indekos Putri
                              </label>
                          </div>
                      </div>                    
                  </div>
                  
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat Indekos</label>
                  <input type="text" id="alamat" class="form-control" name="address" required> 
                </div>

                <div class="form-group">
                  <label for="price">Harga</label>
                  <select class="form-control custom-select" name="price" required>
                    <option selected disabled>Select One</option>
                    <option value="300k"> < Rp.300.000</option>
                    <option value="300k-400k">Rp.300.000-Rp.400.000</option>
                    <option value="400k-500k">Rp.400.000-Rp.500.000</option>
                    <option value="500k-600k">Rp.500.000-Rp.600.000</option>
                    <option value=">600k"> > Rp.600.000</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="large">Luas Kamar</label>
                  <select class="form-control custom-select" name="large" required>
                    <option selected disabled>Select One</option>
                    <option value="4x5">4 x 5</option>
                    <option value="4x4">4 x 4</option>
                    <option value="3x4">3 x 4</option>
                    <option value="3x3">3 x 3</option>
                    <option value="4x2">3 x 2</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="distance">Jarak Dari Universitas Jember</label>
                  <select class="form-control custom-select" name="distance" required>
                    <option selected disabled>Select One</option>
                    <option value=">1km"> < 1 Km </option>
                    <option value="2km-5km">2 km-5 Km </option>
                    <option value="6km-10km">6 Km-10 Km</option>
                    <option value="11km-15km">11 Km-15 Km</option>
                    <option value=">15km"> > 15 Km </option>
                  </select>
                </div>

                <div class="form-group">
                    <label for="condition">Kondisi Bangunan</label>
                    <div class="row">
                        @foreach($conditions as $condition)                        
                        <div class="col-6">
                            <div class="form-check">
                                <label class="form-check-label"> 
                                    <input class="form-check-input" type="checkbox" name="condition[]" value="{{$condition->id}}" >
                                    {{$condition->condition}}
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>    
                </div>
              </div>
              <div class="col-md-6"> 
                <div class="form-group">
                  <label for="facility">Fasilitas</label>
                  <div class="row">
                  @foreach($facilities as $facility)
                      <div class="col-6">
                          <div class="form-check">
                              <label class="form-check-label"> 
                                  <input class="form-check-input" type="checkbox" name="facilities[]" value="{{$facility->id}}"> 
                                  {{$facility->facility}}
                              </label>
                          </div>
                        </div>
                    @endforeach
                  </div>
                </div>

                <div class="form-group">
                  <label for="desc">Deskripsi</label>
                  <textarea class="summernote-simple" name="description" id="desc"></textarea>
                </div>

                <div class="form-group">
                  <label for="image">File Gambar</label>
                  <input class="form-control" type="file" name="image[]" id="image" multiple required/>
                  <span class="text-warning">Bisa upload gambar lebih dari 1</span>
                </div>

                <div class="form-group float-right">
                  <button type="reset" class="btn btn-danger">Reset</button>
                  <button type="submit" class="btn btn-success">Simpan</button>       
                </div>

              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
</div>

<aside class="control-sidebar control-sidebar-dark">
</aside>
<script>
$("#desc").summernote({
    toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough']],
        ['para', ['paragraph']],
    ],
    height: 190,
})
</script>
@endsection