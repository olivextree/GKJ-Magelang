<div class="card-body">
    <h4 class="box-title">Daftar youtube</h4>
    <div align="right">
        <button class="btn btn-primary mb-2" onClick="create()">+ Tambah youtube</button>
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
                        <th>Youtube</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($youtubes as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td width="50%">{{ $data->name }}</td>
                            <td><iframe src="https://www.youtube.com/embed/{{ $data->link }}" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe></td>
                            <td>
                                <form action="{{ route('youtube.destroy', $data->id) }}" method="post">
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
