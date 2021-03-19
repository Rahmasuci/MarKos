<div id="modal-delete-part">
    <p>Apakah anda yakin ingin menghapus Foto Profil?</p>
    <div class="text-right">        
        <button type="submit" class="btn btn-danger">Ya</button> 
        <button type="button" class="btn btn-secondary" id="closeModal">Tidak</button> 
    </div>
    <form class="modal-part"  action="{{route('delete.photo', auth()->user()->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('delete')
        
    </form>
</div>

