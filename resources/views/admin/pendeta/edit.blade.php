<form action="{{route('pendeta.update',$item->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="p2">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" value="{{$item->name}}" >
        </div>
        <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" name="file" accept="image/png|image/jpg" value="{{$item->file}}"  class="form-control">
        </div>
        
        <div class="form-group">
            <label for="">Active</label>
            <input type="checkbox" name="is_active" @if ($item->is_active == "1") checked @endif value="{{$item->is_active}}">
        </div>
        <div class="form-group mt-2">
            <button class="btn btn-primary" >Simpan</button>
        </div>
    </div>
</form>
