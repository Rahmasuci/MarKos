@foreach($kos->gambar as $img)
<div id="modal-delete-part{{$loop->iteration}}">
    <p>Apakah anda yakin ingin menghapus Foto Indekos?</p>
    <div class="text-right">        
        <button type="submit" class="btn btn-danger">Ya</button> 
        <button type="button" class="btn btn-secondary" id="closeModal">Tidak</button> 
    </div>
    <form class="modal-part"  action="{{route('owner.foto-indekos.destroy', $img->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('delete')
        
    </form>
</div>
@endforeach

