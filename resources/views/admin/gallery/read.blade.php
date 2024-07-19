<div class="card-body">
    <h4 class="box-title">Daftar Gallery</h4>
    <div align="right">
        <button class="btn btn-primary mb-2" onClick="create()">+ Tambah Gallery</button>
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
                        <th>Category</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gallerys as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td width="25%">{{ $data->name }}</td>
                            <td width="25%">{{ $data->category }}</td>
                            <td><img src="{{asset('upload/gallery')}}/{{ $data->file }}" width="50%"></td>
                            <td>
                                <form action="{{ route('banner.destroy', $data->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="#" onclick="return edit({{ $data->id }})" class="btn btn-success btn-sm "><i
                                            class="fas fa-pen"></i></a>
                                    <button class="btn btn-danger btn-sm" name="button"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
