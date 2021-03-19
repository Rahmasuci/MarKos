@foreach($conditions as $condition)
<form class="modal-part" id="modal-update-part" action="{{route('admin.condition.update', $condition->id )}}" method="post">
@csrf
@method('patch')
    <div class="form-group">    
        <input type="text" class="form-control d-none" id="id-{{$condition->id}}" name="id" value="{{$condition->id}}">
        <label>Kondisi</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-list"></i>
                </div>
            </div>
            <input type="text" class="form-control" id="kondisi-{{$condition->id}}" name="condition" value="{{$condition->condition}}">
        </div>
    </div>
    <div class="text-right">        
        <button type="submit" class="btn btn-primary">Simpan</button> 
    </div>
</form>
@endforeach

