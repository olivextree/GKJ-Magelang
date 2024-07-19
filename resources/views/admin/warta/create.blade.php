<form action="{{route('warta.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="p2">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" required class="form-control">
        </div>
        <div class="form-group">
            <label for="">File Warta</label>
            <input type="file" name="file" accept="application/pdf" required class="form-control">
        </div>
        <div class="form-group">
            <label for="">Tanggal</label>
            <input type="date" name="tanggal" required class="form-control">
        </div>
        <div class="form-group mt-2">
            <button class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>
