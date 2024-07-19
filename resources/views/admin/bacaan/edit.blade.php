<form action="{{route('bacaan.update',$item->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="p2">
        <div class="form-group">
            <label for="">Tanggal</label>
            <input type="date" name="tanggal" value="{{$item->tanggal}}"  class="form-control">
        </div>
        <div class="form-group">
            <label for="">Bacaan</label>
            <textarea name="desc" class="form-control">{{$item->desc}}</textarea>
        </div>
        <div class="form-group mt-2">
            <button class="btn btn-primary">Update</button>
        </div>
    </div>
</form>
