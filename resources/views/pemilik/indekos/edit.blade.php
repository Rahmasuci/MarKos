@extends('layouts.stisla')
@section('title', 'Edit Indekos')
@section('content')
<div class="main-content">
    <section class="section">
    @foreach($indekos as $kos)
      <div class="section-header">
        <h1>Edit Indekos</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="{{route('owner.indekos.index')}}">Indekos</a></div>
          <div class="breadcrumb-item"><a href="{{route('owner.indekos.show', $kos->id )}}">Detail</a></div>
          <div class="breadcrumb-item ">Edit Indekos</div>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          
          <form method="post" action="{{route('owner.indekos.update', $kos->id)}}" enctype="multipart/form-data">
          @method('patch')
          @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama">Nama Indekos</label>
                  <input type="text" id="nama" class="form-control" name="name" value="{{$kos->name}}" required>
                </div>
                <div class="form-group">
                  <label for="type">Jenis Indekos</label>
                  <div class="row">
                      <div class="col-6">
                          <div class="form-check">
                              <label class="form-check-label">
                                  <input class="form-check-input" type="radio" name="type" value="putra" {{ ($kos->type=="putra")? "checked" : "" }}>
                                  Indekos Putra
                              </label>
                          </div>
                      </div>
                      <div class="col-6">
                          <div class="form-check">
                              <label class="form-check-label">
                                  <input class="form-check-input" type="radio" name="type" value="putri" {{ ($kos->type=="putri")? "checked" : "" }}>
                                  Indekos Putri
                              </label>
                          </div>
                      </div>                    
                  </div>
                  
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat Indekos</label>
                  <input type="text" id="alamat" class="form-control" name="address" required value="{{$kos->address}}"> 
                </div>

                <div class="form-group">
                  <label for="price">Harga</label>
                  <select class="form-control custom-select" name="price" required>
                    <option selected disabled>Select One</option>
                    <option value="<300k" @foreach ($kos->kriteria as $kri) @if('<300k' == $kri->price) selected @endif @endforeach
                    > < Rp.300.000</option>
                    <option value="300k-400k" @foreach ($kos->kriteria as $kri) @if('300k-400k' == $kri->price) selected @endif @endforeach
                    >Rp.300.000-Rp.400.000</option>
                    <option value="400k-500k" @foreach ($kos->kriteria as $kri) @if('400k-500k' == $kri->price) selected @endif @endforeach>Rp.400.000-Rp.500.000</option>
                    <option value="500k-600k" @foreach ($kos->kriteria as $kri) @if('500k-600k' == $kri->price) selected @endif @endforeach>Rp.500.000-Rp.600.000</option>
                    <option value=">600k" @foreach ($kos->kriteria as $kri) @if('>600k' == $kri->price) selected @endif @endforeach> > Rp.600.000</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="large">Luas Kamar</label>
                  <select class="form-control custom-select" name="large" required>
                    <option selected disabled>Select One</option>
                    <option value="4x5"  @foreach ($kos->kriteria as $kri) @if('4x5' == $kri->large) selected @endif @endforeach>4 x 5</option>
                    <option value="4x4"  @foreach ($kos->kriteria as $kri) @if('4x4' == $kri->large) selected @endif @endforeach>4 x 4</option>
                    <option value="3x4"  @foreach ($kos->kriteria as $kri) @if('3x4' == $kri->large) selected @endif @endforeach>3 x 4</option>
                    <option value="3x3"  @foreach ($kos->kriteria as $kri) @if('3x3' == $kri->large) selected @endif @endforeach>3 x 3</option>
                    <option value="4x2"  @foreach ($kos->kriteria as $kri) @if('4x2' == $kri->large) selected @endif @endforeach>3 x 2</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="distance">Jarak Dari Universitas Jember</label>
                  <select class="form-control custom-select" name="distance" required>
                    <option selected disabled>Select One</option>
                    <option value=">1km" @foreach ($kos->kriteria as $kri) @if('>1km' == $kri->distance) selected @endif @endforeach> < 1 Km </option>
                    <option value="2km-5km" @foreach ($kos->kriteria as $kri) @if('2km-5km' == $kri->distance) selected @endif @endforeach>2 km-5 Km </option>
                    <option value="6km-10km" @foreach ($kos->kriteria as $kri) @if('6km-10km' == $kri->distance) selected @endif @endforeach>6 Km-10 Km</option>
                    <option value="11km-15km" @foreach ($kos->kriteria as $kri) @if('11km-15km' == $kri->distance) selected @endif @endforeach>11 Km-15 Km</option>
                    <option value=">15km" @foreach ($kos->kriteria as $kri) @if('>15km' == $kri->distance) selected @endif @endforeach> > 15 Km </option>
                  </select>
                </div>
              </div>
              <div class="col-md-6"> 
                <div class="form-group">
                    <label for="condition">Kondisi Bangunan</label>
                    <div class="row">
                        @foreach($conditions as $condition)                        
                        <div class="col-6">
                            <div class="form-check">
                                <label class="form-check-label"> 
                                    <input class="form-check-input" type="checkbox" name="condition[]" value="{{$condition->id}}" @foreach ($kos->kriteria as $kri) @foreach($kri->kondisi as $kon) {{ ($kon->pivot->condition_id =="$condition->id")? "checked" : "" }} @endforeach @endforeach >
                                    {{$condition->condition}}
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>    
                </div>
                <div class="form-group">
                  <label for="facility">Fasilitas</label>
                  <div class="row">
                  @foreach($facilities as $facility)
                      <div class="col-6">
                          <div class="form-check">
                              <label class="form-check-label"> 
                                  <input class="form-check-input" type="checkbox" name="facilities[]" value="{{$facility->id}}" @foreach ($kos->kriteria as $kri) @foreach($kri->fasilitas as $fas) {{ ($fas->pivot->facility_id =="$facility->id")? "checked" : "" }} @endforeach @endforeach> 
                                  {{$facility->facility}}
                              </label>
                          </div>
                        </div>
                    @endforeach
                  </div>
                </div>

                <div class="form-group">
                  <label for="description">Deskripsi</label>
                  <textarea name="description" id="desc" class="summernote-simple"></textarea>
                </div>

                <div class="form-group float-right">
                  <a href="{{route('owner.indekos.show', $kos->id )}}" class="btn btn-warning">Kembali</a>
                  <button type="submit" class="btn btn-primary">Simpan</button>       
                </div>

              </div>
            </div>
          </form>
          @endforeach
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
    @foreach($indekos as $kos)
        var text = '{!!$kos->description!!}'
    @endforeach
    $("#desc").summernote('code', text);
    
</script>
@endsection