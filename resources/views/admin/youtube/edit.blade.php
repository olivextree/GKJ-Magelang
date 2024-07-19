<form action="{{route('youtube.update',$item->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="p2">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" value="{{$item->name}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Link Youtube <sup style="color: red">*contoh : AITcZ7o3Hro</sup></label>
            <input type="text" name="link" id="gambar" value="{{$data->link}}"  class="form-control">
        </div>
        <div class="form-group mt-2">
            <button class="btn btn-primary" >Simpan</button>
        </div>
    </div>
</form>
