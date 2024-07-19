@extends('layouts.master')
@section('title', 'Kebaktian')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form {{$type}} {{$item->name}}</h6>
    </div>
    @if ($type == 'petugas')
    <div class="card-body">
        <div class="form-group row">
            <div class="card col-sm-12 ">
                <div class="card-body">
                <table class="table" width="100%">
                    <thead class="thead-dark">
                        <tr>
                            <th colspan="2">
                                <center>
                                    Tema : "{{$item->name}}" <br>
                                <span>Pk.{{\Carbon\Carbon::parse($item->jadwal_1)->format('H:i')}} &
                                        {{\Carbon\Carbon::parse($item->jadwal_2)->format('H:i')}} &
                                        {{\Carbon\Carbon::parse($item->jadwal_3)->format('H:i')}} &
                                        {{\Carbon\Carbon::parse($item->jadwal_4)->format('H:i')}} 
                                    </span>
                                </center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Pukul {{\Carbon\Carbon::parse($item->jadwal_1)->format('H:i')}}</td>
                            <td>
                                @foreach ($item->petugas as $data)
                                    @if ($item->jadwal_1 == $data->waktu)
                                        <li>{{$data->bagian}} : {{$data->nama_petugas}}</li>
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td>Pukul {{\Carbon\Carbon::parse($item->jadwal_2)->format('H:i')}}</td>
                            <td>
                                @foreach ($item->petugas as $data)
                                    @if ($item->jadwal_2 == $data->waktu)
                                        <li>{{$data->bagian}} : {{$data->nama_petugas}}</li>
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td>Pukul {{\Carbon\Carbon::parse($item->jadwal_3)->format('H:i')}}</td>
                            <td>
                                @foreach ($item->petugas as $data)
                                    @if ($item->jadwal_3 == $data->waktu)
                                        <li>{{$data->bagian}} : {{$data->nama_petugas}}</li>
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td>Pukul {{\Carbon\Carbon::parse($item->jadwal_4)->format('H:i')}}</td>
                            <td>
                                @foreach ($item->petugas as $data)
                                    @if ($item->jadwal_4 == $data->waktu)
                                        <li>{{$data->bagian}} : {{$data->nama_petugas}}</li>
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>

        </div>

        <div class="form-group row mt-3">
            <div class="col-sm-6">
                <a href="{{route('kebaktian.index')}}" class="btn btn-danger btn-block btn">
                    <i class="fas fa-arrow-left fa-fw"></i> Kembali
                </a>
            </div>
            <div class="col-sm-6">
                <a href="{{route('kebaktian.pdf',['id' => $item->id , 'type' => $type])}}" class="btn btn-info btn-block btn">
                    <i class="fas fa-file-pdf fa-fw"></i> Cetak
                </a>
            </div>
        </div>
</div>
    @else
    <div class="card-body">
        <div class="form-group row">
            <div class="card col-sm-12 ">
                <div class="card-body"><table class="table" width="100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>Pengunjung</th>
                            @foreach ($item->detail as $data)
                                <th>PK. {{\Carbon\Carbon::parse($data->waktu)->format('H:i')}} WIB</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Majelis</td>
                            @foreach ($item->detail as $data)
                                <td>{{$data->majelis}}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>Laki - Laki</td>
                            @foreach ($item->detail as $data)
                                <td>{{$data->laki}}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>Perempuan</td>
                            @foreach ($item->detail as $data)
                                <td>{{$data->wanita}}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>Anak</td>
                            @foreach ($item->detail as $data)
                                <td>{{$data->anak}}</td>
                            @endforeach
                        </tr>
                    </tbody>
                    <thead class="thead-dark">
                        <tr>
                            <th><b>Jumlah</b></th>
                            @foreach ($item->detail as $data)
                            @php
                                $data1 = ($data->majelis + $data->laki);
                                $data2 = ($data->wanita + $data->anak);
                                $total = $data1 + $data2;
                            @endphp
                                <th><b>{{$total}}</b></th>
                            @endforeach
                        </tr>
                        <tr>
                            <th><b>Total Persembahan</b></th>
                            @foreach ($item->detail as $data)
                                <th>@rupiah($data->persembahan)</th>
                            @endforeach
                        </tr>
                    </thead>
                </table>
                </div>
            </div>

        </div>

        <div class="form-group row mt-3">
            <div class="col-sm-6">
                <a href="{{route('kebaktian.index')}}" class="btn btn-danger btn-block btn">
                    <i class="fas fa-arrow-left fa-fw"></i> Kembali
                </a>
            </div>
            <div class="col-sm-6">
                <a href="{{route('kebaktian.pdf',['id' => $item->id , 'type' => $type])}}" class="btn btn-info btn-block btn">
                    <i class="fas fa-file-pdf fa-fw"></i> Cetak
                </a>
            </div>
        </div>
</div>
    @endif
</div>
@endsection
