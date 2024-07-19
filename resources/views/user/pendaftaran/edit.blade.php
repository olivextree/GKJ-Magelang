<form action="{{route('articel.update',$item->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="p2">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" value="{{$item->name}}" required class="form-control">
        </div>
        <div class="form-group">
            <label for="">Gambar</label>
            <label for="gambar">{{$item->file}}</label>
            <input type="file" name="file" accept="image/png|image/jpg" id="gambar" required class="form-control">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <textarea name="desc" class="form-control" id="desc">{!!$item->desc!!}</textarea>
        </div>
        <div class="form-group mt-2">
            <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
    </div>
</form>
