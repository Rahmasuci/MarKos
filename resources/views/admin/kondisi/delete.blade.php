@foreach($conditions as $condition)
<div id="modal-delete-part{{$loop->iteration}}">
    <p>Apakah anda yakin ingin menghapus Kondisi Indekos?</p>
    <div class="text-right">        
        <button type="submit" class="btn btn-danger">Ya</button> 
        <button type="button" class="btn btn-secondary" id="closeModal">Tidak</button> 
    </div>

    <form class="modal-part" action="{{route('admin.condition.destroy', $condition->id )}}" method="post">
    @csrf
    @method('delete')
    </form>  
</div>   
@endforeach