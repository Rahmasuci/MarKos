<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-header">
                <h4> Foto Profil</h4>
            </div>
            <div class="card-body">
                <div class=" d-flex justify-content-center">
                    @if(Auth()->user()->path_photo == null)
                    <img src="{{asset('assets_stisla/assets/img/avatar/avatar-1.png')}}" alt="" style="width:80%;" class="rounded-circle">
                    @else
                    <img src="{{asset('storage/photo_profile/'.Auth()->user()->path_photo)}}" alt="" style="width:80%;" class="rounded-circle">
                    @endif                            
                </div>       
                <div class="text-center mt-2">      
                    <button class="btn btn-warning" id="modal-edit-photo"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger" id="modal-delete-photo"><i class="fas fa-trash"></i></button>
                </div>               
            </div>
        </div>
        
    </div>
    <div class="col-8">
        <div class="card">
          <form method="post" action="{{route('update.profile', Auth()->user()->id )}}">
          @csrf
          @method('patch')
            <div class="card-header">
              <h4>Edit Profile</h4>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-6 col-12">
                    <label>Nama</label>
                    <input type="text" class="form-control" value="{{Auth()->user()->name}}" name="name" required="">
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label>Email</label>
                    <input type="email" class="form-control" value="{{Auth()->user()->email}}" name="email" required="">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-7 col-12">
                    <label>Alamat</label>
                    <input type="text" class="form-control" value="{{Auth()->user()->address}}" name="address" required="">
                  </div>
                  <div class="form-group col-md-5 col-12">
                    <label>Phone</label>
                    <input type="tel" class="form-control" value="{{Auth()->user()->phone_number}}" name="phone_number">
                  </div>
                </div>
            </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
          </form>
        </div>
</div>