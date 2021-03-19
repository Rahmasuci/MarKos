<form class="modal-part" id="modal-update-part" action="{{route('update.photo', auth()->user()->id)}}" method="post" enctype="multipart/form-data">
@csrf
@method('patch')
    <div class="form-group">    
        <label>Foto Profil</label>
        <div class="input-group">
            <input type="file" class="form-control" id="path_photo" name="path_photo" value="{{Auth()->user()->path_photo}}">
        </div>
    </div>
    <div class="text-right">        
        <button type="submit" class="btn btn-primary">Simpan</button> 
    </div>
</form>

