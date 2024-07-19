@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card" id="read">
                <div class="card-body">
                    <h4 class="box-title">List User Pendaftaran Acara {{ $item->acara }}</h4>
                </div>
                <div class="card-body">
                    <div class="table-stats order-table ov-h">
                        <div id="read">
                            <table class="table mt-3" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($item))
                                        @if (!empty($item->detail))
                                            @foreach ($item->detail as $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->user->name }}</td>
                                                    <td>{{ $data->user->email }}</td>
                                                    <td>{{ $data->user->phone }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
