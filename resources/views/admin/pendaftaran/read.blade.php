<div class="card-body">
    <h4 class="box-title">Data Acara</h4>
    <div align="right">
        @if (Auth::user()->role == 'admin')
            <button class="btn btn-primary mb-2" onClick="create()">+ Tambah Kegiatan</button>
        @endif
    </div>
</div>
<div class="card-body">
    @if (Auth::user()->role == 'admin')
        <div class="table-stats order-table ov-h">
            <div id="read">
                <table class="table mt-3" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Acara</th>
                            <th>Tangal Mulai Pendaftaran</th>
                            <th>Tangal Selesai Pendaftaran</th>
                            <th>Gambar</th>
                            <th>Detail</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($pendaftarans))
                            @foreach ($pendaftarans as $data)
                                <tr>
                                    @if (Auth::user()->role == 'admin')
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                    @else
                                        <td>{{ $loop->iteration }}</td>
                                    @endif
                                    <td>{{ $data->acara }}</td>
                                    <td>{{ $data->tanggal_mulai }}</td>
                                    <td>{{ $data->tanggal_selesai }}</td>
                                    <td width="20%"><img src="{{ asset('upload/gambar') }}/{{ $data->file }}"
                                            width="30%"></td>
                                    <td>
                                        <a href="{{ route('kegiatan.details', $data->id) }}"
                                            class="btn btn-info btn-sm " title="Details"><i class="fas fa-user"></i></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('kegiatan.destroy', $data->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="#" onclick="return edit({{ $data->id }})"
                                                class="btn btn-success btn-sm " title="Edit"><i
                                                    class="fas fa-pen"></i></a>
                                            <button class="btn btn-danger btn-sm" name="button"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="table-stats order-table ov-h">
            <div id="read">
                @if (Auth::user()->role == 'admin')
                    <form action="{{ route('kegiatan.status') }}" onsubmit="return check_mark();" method="post">
                        @csrf
                        <select class="browser-default custom-select w-25" name="status_type">
                            <option selected value="null" readonly>Mark Data Status Menjadi</option>
                            <option value="terima">Terima</option>
                            <option value="tolak">Tolak</option>
                        </select>

                        <button class="btn btn-success">Apply</button>
                @endif
                <table class="table mt-3" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Acara</th>
                            <th>Tangal Mulai</th>
                            <th>Tangal Selesai</th>
                            <th>Gambar</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($pendaftarans))
                            @foreach ($pendaftarans as $data)
                                <tr>
                                    @if (Auth::user()->role == 'admin')
                                        <td>
                                            <div class="custom-control custom-checkbox ml-2">
                                                <input type="checkbox" class="custom-control-input"
                                                    name="status[{{ $data->id }}]" id="status{{ $data->id }}">
                                                <label class="custom-control-label"
                                                    for="status{{ $data->id }}"></label>

                                            </div>
                                        </td>
                                    @else
                                        <td>{{ $loop->iteration }}</td>
                                    @endif
                                    <td>{{ $data->pendaftaran->acara }}</td>
                                    <td>{{ $data->pendaftaran->tanggal_mulai }}</td>
                                    <td>{{ $data->pendaftaran->tanggal_selesai }}</td>
                                    <td width="20%"><img src="{{ asset('upload/gambar') }}/{{ $data->file }}"
                                            width="30%"></td>
                                    <td>{{ $data->pendaftaran->status }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                </form>
            </div>
        </div>
    @endif
</div>
@section('script')
    <script>
        function check_mark() {
            if ($('.custom-control-input').is(":checked")) {

                if ($('.custom-select').val() == "null") {
                    alert('Silahkan Pilih Data Acara.');
                    return false;
                }

            } else {
                alert('Silahkan Pilih Satu Data Acara.');
                return false;
            }

        }
    </script>
@endsection
