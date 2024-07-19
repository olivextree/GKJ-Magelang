<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Kebaktian</title>
</head>

<body>
    <div style="display: flex; align-items: center; margin-bottom:-30px">
        <h2 style="text-align:center;">Laporan Kegiatan
            {{ \Carbon\Carbon::parse($start_date)->isoFormat('D MMMM Y') }} s/d
            {{ \Carbon\Carbon::parse($end_date)->isoFormat('D MMMM Y') }}</h2>
    </div>
    <br><br>
    <table style="text-align: center; " border="1" cellspacing="0" cellpadding="5" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal Kegiatan</th>
                <th>Jumlah Peserta</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($datas))
                @foreach ($datas as $data)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <th>{{ $data->acara }}</th>
                        <td>{{ \Carbon\Carbon::parse($data->tanggal_mulai)->isoFormat('D MMMM Y') }}</td>
                        <td>{{ count($data->detail) }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>

    </table>

</body>

</html>
