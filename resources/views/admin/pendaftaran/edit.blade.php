<form action="{{route('kegiatan.update',$item->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="p2">
        <div class="form-group">
            <label for="">Acara</label>
            <input type="text" name="acara" value="{{$item->acara}}"  class="form-control">
        </div>
        <div class="form-group">
            <label for="">Tanggal Mulai</label>
            <input type="datetime-local" name="tanggal_mulai" id="txt-appoint_date" value="{{$item->tanggal_mulai}}"  class="form-control">
        </div>
        <div class="form-group">
            <label for="">Tanggal Selesai</label>
            <input type="datetime-local" name="tanggal_selesai" id="txt-appoint_date" value="{{$item->tanggal_selesai}}"  class="form-control">
        </div>
        {{-- <div class="form-group">
            <label for="">Category</label>
            <select name="category" class="form-control">
                <option value="">-- Pilih Pendaftaran --</option>
                <option value="Penikahan" @if ($item->category == "Penikahan") selected @endif>Penikahan</option>
                <option value="Baptis" @if ($item->category == "Baptis") selected @endif>Baptis</option>
            </select>
        </div> --}}
        <div class="form-group">
            <label for="">Foto Acara</label>
            <input type="file" name="file" accept="image/png|image/jpg" value="{{$item->file}}"  class="form-control">
        </div>
        <div class="form-group">
            <label for="">Tentang Acara</label>
            <textarea name="desc" class="form-control" id="desc">{!!$item->desc!!}</textarea>
        </div>
        <div class="form-group mt-2">
            <button class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>
