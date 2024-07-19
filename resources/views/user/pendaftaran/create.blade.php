<form action="{{route('articel.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="p2">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" required class="form-control">
        </div>
        <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" name="file" accept="image/png|image/jpg" required class="form-control">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <textarea name="desc" class="form-control" id="desc"></textarea>
        </div>
        <div class="form-group mt-2">
            <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
    </div>
</form>
