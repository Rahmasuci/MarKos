<form class="modal-part" id="modal-create-part" action="{{route('owner.foto-indekos.store')}}" method="post" enctype="multipart/form-data">
@csrf
    <input type="text" class="form-control d-none" name="boarding_house_id" value="{{$kos->id}}" >
    <div class="form-group">
        <label>Foto Indekos</label>
        <div class="input-group">   
            <input type="file" class="form-control" id="path_img" name="path_img" >
        </div>
    </div>
    <div class="text-right">        
        <button type="submit" class="btn btn-primary">Simpan</button> 
    </div>
</form>

