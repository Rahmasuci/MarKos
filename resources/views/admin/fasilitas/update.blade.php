@foreach($facilities as $facility)
<form class="modal-part" id="modal-update-part" action="{{route('admin.facility.update', $facility->id )}}" method="post">
@csrf
@method('patch')
    <div class="form-group">    
        <label>Fasilitas</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-list"></i>
                </div>
            </div>
            <input type="text" class="form-control" id="fasilitas-{{$loop->iteration}}" name="facility" value="{{$facility->facility}}">
        </div>
    </div>
    <div class="text-right">        
        <button type="submit" class="btn btn-primary">Simpan</button> 
    </div>
</form>
@endforeach

