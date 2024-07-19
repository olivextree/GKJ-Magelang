<div class="card-body">
    <h4 class="box-title">Daftar Pengeluaran</h4>
    <div align="right">
        <button class="btn btn-primary mb-2" onClick="create()">+ Tambah Pengeluaran</button>
    </div>
</div>
<div class="card-body">
    <div class="table-stats order-table ov-h">
        <div id="read">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Pengeluaran</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengeluarans as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td >{{ $data->tanggal }}</td>
                            <td>@rupiah($data->pengeluaran)</td>
                            <td>{{$data->ket}}</td>
                            <td>
                                <form action="{{ route('pengeluaran.destroy', $data->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="#" onclick="return edit({{ $data->id }})" class="btn btn-success btn-sm "><i
                                            class="fas fa-pen"></i></a>
                                    <button  class="btn btn-danger btn-sm" name="button"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
