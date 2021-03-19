@foreach($kos->gambar as $img)
<form class="modal-part" id="modal-update-part" action="{{route('owner.foto-indekos.update', $img->id)}}" method="post" enctype="multipart/form-data">
@csrf
@method('patch')
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
@endforeach

