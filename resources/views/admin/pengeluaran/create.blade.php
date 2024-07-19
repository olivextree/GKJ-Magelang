<form action="{{route('pengeluaran.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="p2">
        <div class="form-group">
            <label for="">Tanggal</label>
            <input type="date" name="tanggal" required class="form-control">
        </div>
        <div class="form-group">
            <label for="">Pengeluaran</label>
            <input type="number" name="pengeluaran" required class="form-control">
        </div>
        <div class="form-group">
            <label for="">Keterangan</label>
            <input type="text" name="ket" required class="form-control">
        </div>
        <div class="form-group mt-2">
            <button class="btn btn-primary" >Simpan</button>
        </div>
    </div>
</form>
