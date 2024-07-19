<form action="{{route('warta.update',$item->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="p2">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" value="{{$item->name}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="">File Warta</label>
            <label for="gambar">{{$item->file}}</label>
            <input type="file" name="file" accept="image/pdf" id="gambar"  class="form-control">
        </div>
        <div class="form-group">
            <label for="">Tanggal</label>
            <input type="date" name="name" required class="form-control">
        </div>
        <div class="form-group mt-2">
            <button class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>
