<form action="{{route('pendeta.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="p2">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" name="file" accept="image/png|image/jpg" required class="form-control">
        </div>
        
        <div class="form-group">
            <label for="">Active</label>
            <input type="checkbox" name="is_active" value="1">
        </div>
        <div class="form-group mt-2">
            <button class="btn btn-primary" >Simpan</button>
        </div>
    </div>
</form>
