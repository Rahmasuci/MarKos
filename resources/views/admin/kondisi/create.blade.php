<form class="modal-part" id="modal-create-part" action="{{route('admin.condition.store')}}" method="post">
@csrf
    <div class="form-group">
        <label>Kondisi</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-list"></i>
                </div>
            </div>
            <input type="text" class="form-control" placeholder="Kondisi" name="condition" id="kondisi">
        </div>
    </div>
    <div class="text-right">        
        <button type="submit" class="btn btn-primary">Simpan</button> 
    </div>
</form>

