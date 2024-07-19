@extends('layouts.master')
@section('title', 'Kebaktian')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card" id="read">
                <div class="card-body">
                    <h4 class="box-title">Daftar Kebaktian</h4>
                    <div align="right">
                        <a href="{{route('kebaktian.create')}}" class="btn btn-primary mb-2"> Tambah Kebaktian</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-stats order-table ov-h">
                        <div id="read">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tema</th>
                                        <th>Tanggal Kebaktian</th>
                                        <th>Detail</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kebaktians as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{\Carbon\Carbon::parse($data->tgl_kebaktian)->format('d F Y') }}</td>
                                            <td>
                                                @if (count($data->detail) > 0)
                                                    <a href="{{route('kebaktian.show',['id' => $data->id , 'type' => 'detail'])}}" class="btn btn-info btn-sm "><i
                                                        class="fas fa-pen"></i> Tampilkan Detail</a>
                                                @else
                                                    <a href="{{route('kebaktian.detail',['id' => $data->id , 'type' => 'detail'])}}" class="btn btn-info btn-sm "><i
                                                        class="fas fa-pen"></i> Detail</a>
                                                @endif
                                                @if (count($data->petugas) > 0)
                                                    <a href="{{route('kebaktian.show',['id' => $data->id , 'type' => 'petugas'])}}" class="btn btn-secondary btn-sm "><i
                                                        class="fas fa-pen"></i> Tampilkan Petugas</a>
                                                    @else
                                                    <a href="{{route('kebaktian.detail',['id' => $data->id , 'type' => 'petugas'])}}" class="btn btn-secondary btn-sm "><i
                                                        class="fas fa-pen"></i> Petugas</a>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('kebaktian.destroy', $data->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{route('kebaktian.edit',$data->id)}}" class="btn btn-success btn-sm "><i
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
        $(document).ready(function() {
            read();
        });

        // Read Database
        function read() {
            $.get("{{ url('admin/kebaktian/read') }}", {}, function(data, status) {
                $("#read").html(data);
            });
        }

        function create() {
            $.get("{{ url('admin/kebaktian/create') }}", {}, function(data, status) {
                $("#exampleModalLabel").html('Create kebaktian')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }

        // Untuk modal halaman edit show
        function edit(id) {
            $.get("{{ url('admin/kebaktian/') }}/" + id +"/edit", {}, function(data, status) {
                $("#exampleModalLabel").html('Edit kebaktian')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }

        function deleteData(id) {
            var id = id;
            var url = '{{ route('kebaktian.destroy', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteform").attr('action', url);
        }

        function formSubmit() {
            $("#deleteform").submit();
        }
    </script>
@endsection
