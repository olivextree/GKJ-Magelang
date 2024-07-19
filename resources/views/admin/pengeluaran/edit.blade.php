<form action="{{route('banner.update',$item->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="p2">
        <div class="form-group">
            <label for="">Tanggal</label>
            <input type="date" name="tanggal" value="{{$item->tanggal}}" required class="form-control">
        </div>
        <div class="form-group">
            <label for="">Pengeluaran</label>
            <input type="number" name="pengeluaran" value="{{$item->pengeluaran}}" required class="form-control">
        </div>
        <div class="form-group">
            <label for="">Keterangan</label>
            <input type="text" name="ket" value="{{$item->ket}}" required class="form-control">
        </div>
        <div class="form-group mt-2">
            <button class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>
