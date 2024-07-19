<div class="card-body">
    <h4 class="box-title">Daftar user</h4>
    <div align="right">
        <button class="btn btn-primary mb-2" onClick="create()">+ Tambah user</button>
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
                        <th>Email</th>
                        <th>Tanggal Lahir</th>
                        <th>No Handphone</th>
                        <th>Profile</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td >{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{\Carbon\Carbon::parse($data->birthday)->format('d F Y')}}</td>
                            <td>{{ $data->phone }}</td>
                            <td width="30%"><img src="{{asset('upload/user')}}/{{ $data->file }}" width="20%"></td>
                            <td>
                                <form action="{{ route('user.destroy', $data->id) }}" method="post">
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
