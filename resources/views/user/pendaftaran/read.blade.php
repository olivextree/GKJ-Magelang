<div class="card-body">
    <h4 class="box-title">Daftar Articel</h4>
    <div align="right">
        <button class="btn btn-primary mb-2" onClick="create()">+ Tambah Articel</button>
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
                        <th>Gambar</th>
                        <th>Desciption</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendaftarans as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td width="50%">{{ $data->name }}</td>
                            <td><img src="{{asset('upload/gambar')}}/{{ $data->file }}" width="50%"></td>
                            <td>{!!$data->desc!!}</td>
                            <td>
                                <form action="{{ route('articel.destroy', $data->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="#" onclick="return edit({{ $data->id }})" class="btn btn-success btn-sm "><i
                                            class="fas fa-pen"></i></a>
                                    <button type="submit" class="btn btn-danger btn-sm" name="button"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
