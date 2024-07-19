<form action="{{route('gallery.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="p2">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" required class="form-control">
        </div>
        <div class="form-group">
            <label for="">Category</label>
            <select name="category" class="form-control">
                <option value="">--Pilih Category--</option>
                <option value="Kegiatan">Kegiatan</option>
                <option value="Pernikahan">Pernikahan</option>
                <option value="Baptis">Baptis</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" name="file" accept="image/png|image/jpg" required class="form-control">
        </div>
        <div class="form-group mt-2">
            <button class="btn btn-primary" >Simpan</button>
        </div>
    </div>
</form>
