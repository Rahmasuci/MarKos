<form class="modal-part" id="modal-compare-part" action="{{route('user.maut')}}" method="post">
    <p class="mr-4">Sesuaikan dengan kriteria mu</p>
    @csrf   
    <div class="form-group row mb-4">
        <label for="kri-harga" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga</label>
        <div class="col-sm-12 col-md-9">
            <select name="harga" id="kri-harga" class="form-control">
                <option value="Sangat Tidak Penting">Sangat Tidak Penting</option>
                <option value="Tidak Penting">Tidak Penting</option>
                <option value="Cukup Penting">Cukup Penting</option>
                <option value="Penting">Penting</option>
                <option value="Sangat Penting">Sangat Penting</option>
            </select>
        </div>
    </div>
    <div class="form-group row mb-4">
        <label for="kri-jarak" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jarak</label>
        <div class="col-sm-12 col-md-9">
            <select name="jarak" id="kri-jarak" class="form-control">
                <option value="Sangat Tidak Penting">Sangat Tidak Penting</option>
                <option value="Tidak Penting">Tidak Penting</option>
                <option value="Cukup Penting">Cukup Penting</option>
                <option value="Penting">Penting</option>
                <option value="Sangat Penting">Sangat Penting</option>
            </select>
        </div>
    </div>
    <div class="form-group row mb-4">
        <label for="kri-luas" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Luas Kamar</label>
        <div class="col-sm-12 col-md-9">
            <select name="luas_kamar" id="kri-luas" class="form-control">
                <option value="Sangat Tidak Penting">Sangat Tidak Penting</option>
                <option value="Tidak Penting">Tidak Penting</option>
                <option value="Cukup Penting">Cukup Penting</option>
                <option value="Penting">Penting</option>
                <option value="Sangat Penting">Sangat Penting</option>
            </select>
        </div>
    </div>
    <div class="form-group row mb-4">
        <label for="kri-fasilitas" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Fasilitas</label>
        <div class="col-sm-12 col-md-9">
            <select name="fasilitas" id="kri-fasilitas" class="form-control">
                <option value="Sangat Tidak Penting">Sangat Tidak Penting</option>
                <option value="Tidak Penting">Tidak Penting</option>
                <option value="Cukup Penting">Cukup Penting</option>
                <option value="Penting">Penting</option>
                <option value="Sangat Penting">Sangat Penting</option>
            </select>
        </div>
    </div>
    <div class="form-group row mb-4">
        <label for="kri-kondisi" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kondisi Bangunan</label>
        <div class="col-sm-12 col-md-9">
            <select name="kondisi" id="kri-kondisi" class="form-control">
                <option value="Sangat Tidak Penting">Sangat Tidak Penting</option>
                <option value="Tidak Penting">Tidak Penting</option>
                <option value="Cukup Penting">Cukup Penting</option>
                <option value="Penting">Penting</option>
                <option value="Sangat Penting">Sangat Penting</option>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-warning float-right">Lanjutkan</button>
</form>  