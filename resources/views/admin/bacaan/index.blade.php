@extends('layouts.master')
@section('title', 'Bacaan')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card" id="read">
                <div class="card-body">
                    <h4 class="box-title">Daftar Bacaan</h4>
                    <div align="right">
                        <button class="btn btn-primary mb-2" onClick="create()">+ Tambah Bacaan</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-stats order-table ov-h">
                        <div id="read">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>Bacaan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bacaan as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->tanggal }}</td>
                                            <td>{{$data->desc}}</td>
                                            <td>
                                                <form action="{{ route('bacaan.destroy', $data->id) }}" method="post">
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

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>

        function create() {
            $.get("{{ url('admin/bacaan/create') }}", {}, function(data, status) {
                $("#exampleModalLabel").html('Create bacaan')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }

        // Untuk modal halaman edit show
        function edit(id) {
            $.get("{{ url('admin/bacaan/') }}/" + id +"/edit", {}, function(data, status) {
                $("#exampleModalLabel").html('Edit bacaan')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }

        function deleteData(id) {
            var id = id;
            var url = '{{ route('bacaan.destroy', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteform").attr('action', url);
        }

        function formSubmit() {
            $("#deleteform").submit();
        }
    </script>
@endsection
