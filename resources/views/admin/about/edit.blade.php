<form action="{{route('about.update',$item->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="p2">
        <div class="form-group">
            <label for="">About</label>
            <textarea name="desc" class="form-control" id="desc">{!!$item->desc!!}</textarea>
        </div>
        <div class="form-group">
            <label for="">Visi</label>
            <textarea name="visi" class="form-control" id="visi">{!!$item->visi!!}</textarea>
        </div>
        <div class="form-group">
            <label for="">Misi</label>
            <textarea name="misi" class="form-control" id="misi">{!!$item->misi!!}</textarea>
        </div>

        <div class="form-group mt-2">
            <button class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>
