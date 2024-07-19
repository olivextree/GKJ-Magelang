<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan {{$item->name}} </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>

@if ($type == 'petugas')
<table class="table table-bordered" width="100%">
    <thead class="thead-dark">
        <tr>
            <th colspan="2">
                <center>
                    Tema : "{{$item->name}}" <br>
                <span>Pk.{{\Carbon\Carbon::parse($item->jadwal_1)->format('H:i')}} & {{\Carbon\Carbon::parse($item->jadwal_2)->format('H:i')}}</span>
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
                        <ul>{{$data->bagian}} : {{$data->nama_petugas}}</ul>
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td>Pukul {{\Carbon\Carbon::parse($item->jadwal_2)->format('H:i')}}</td>
            <td>
                @foreach ($item->petugas as $data)
                    @if ($item->jadwal_2 == $data->waktu)
                        <ul>{{$data->bagian}} : {{$data->nama_petugas}}</ul>
                    @endif
                @endforeach
            </td>
        </tr>
    </tbody>
</table>
@else
<center>
    <h5> Data Kehadiran Jemaat Kebaktian {{\Carbon\Carbon::parse($item->tgl_kebaktian)->format('Y-m-d')}}</h3>
</center>
    <table class="table" width="100%">
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
                <td>Penatua</td>
                @foreach ($item->detail as $data)
                    <td>{{$data->penatua}}</td>
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
                    $data1 = ($data->penatua + $data->laki);
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
@endif
</body>
</html>
