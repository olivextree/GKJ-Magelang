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
                    @foreach ($articels as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td width="50%">{{ $data->name }}</td>
                            <td><img src="{{asset('upload/gambar')}}/{{ $data->file }}" width="50%"></td>
                            <td> @php
                                $firstPart = substr(strip_tags($data->desc, ['<br>']), 0, 250);
                                $secondPart = strlen($data->desc) > 250 ? '...' : '';
                                echo $firstPart . $secondPart;
                            @endphp</td>
                            <td>
                                <form action="{{ route('articel.destroy', $data->id) }}" method="post">
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
