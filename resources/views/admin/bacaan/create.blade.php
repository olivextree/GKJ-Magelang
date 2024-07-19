<form action="{{route('bacaan.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="p2">
        <div class="form-group">
            <label for="">Tanggal</label>
            <input type="date" name="tanggal" required class="form-control">
        </div>
        <div class="form-group">
            <label for="">Bacaan</label>
            <textarea name="desc" class="form-control"></textarea>
        </div>
        <div class="form-group mt-2">
            <button class="btn btn-primary" >Simpan</button>
        </div>
    </div>
</form>
