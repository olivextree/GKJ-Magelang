<form action="{{route('gallery.update',$item->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="p2">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" value="{{$item->name}}"  class="form-control">
        </div>
        <div class="form-group">
            <label for="">Category</label>
            <select name="category" class="form-control">
                <option value="">--Pilih Category--</option>
                <option value="Kegiatan" @if ($item->category == 'Kegiatan') selected @endif>Kegiatan</option>
                <option value="Pernikahan" @if ($item->category == 'Pernikahan') selected @endif>Pernikahan</option>
                <option value="Baptis" @if ($item->category == 'Baptis') selected @endif>Baptis</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Gambar</label>
            <label for="gambar">{{$item->file}}</label>
            <input type="file" name="file" accept="image/png|image/jpg" id="gambar" class="form-control">
        </div>
        <div class="form-group mt-2">
            <button class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>
