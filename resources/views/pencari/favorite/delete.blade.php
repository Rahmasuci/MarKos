@foreach($indekos as $kos)
<div id="modal-delete-part{{$kos->id}}">
    <p>Apakah anda yakin ingin menghapus Favorit Indekos?</p>
    <div class="text-right">        
        <button type="submit" class="btn btn-danger">Ya</button> 
        <button type="button" class="btn btn-secondary" id="closeModal">Tidak</button> 
    </div>

    <form class="modal-part" action="{{route('user.favorite.destroy', $kos->id)}}" method="post">
    @csrf
    @method('delete')
    </form>  
</div>   
@endforeach