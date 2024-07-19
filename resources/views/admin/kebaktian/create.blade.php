@extends('layouts.master')
@section('title', 'Kebaktian')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Pembuatan Kebaktian</h6>
    </div>
    <form class="user" action="{{route('kebaktian.store')}}" method="post">
        @csrf
    <div class="card-body">

        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="nama_customer">Tema Kebaktian</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="col-sm-6">
                <label for="">Tanggal Kebaktian</label>
                <input type="date" name="tgl_kebaktian" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="nama_customer">Jadwal Satu</label>
                <input type="time" name="jadwal_1" class="form-control">
            </div>
            <div class="col-sm-6 ">
                <label for="">Jadwal Dua</label>
                <input type="time" name="jadwal_2" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 col-sm-6 mb-3 mb-sm-0">
                <label for="">Jadwal Tiga</label>
                <input type="time" name="jadwal_3" class="form-control">
            </div>
            <div class="col-sm-6">
                <label for="">Jadwal Empat</label>
                <input type="time" name="jadwal_4" class="form-control">
            </div>
        </div>
            {{-- <div class="form-group row">
                <div class="card col-sm-12">
                    <div class="card-body">
                        <table class="table" id="aksesoris_table">
                            <thead>
                                <tr>
                                    <th>Waktu</th>
                                    <th>Majelis</th>
                                    <th>Laki - Laki</th>
                                    <th>Perempuan</th>
                                    <th>Anak - Anak</th>
                                    <th>Persembahan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="aksesoris0">
                                    <td>
                                        <input type="time" name="waktu[]" class="form-control">
                                    </td>
                                    <td>
                                        <input type="number" name="majelis[]" value="0" class="form-control" />
                                    </td>
                                    <td>
                                        <input type="number" name="laki[]" value="0" class="form-control" />
                                    </td>
                                    <td>
                                        <input type="number" name="perempuan[]" value="0" class="form-control" />
                                    </td>
                                    <td>
                                        <input type="number" name="anak[]" value="0" class="form-control" />
                                    </td>
                                    <td>
                                        <input type="number" name="persembahan[]" value="0" class="form-control" />
                                    </td>
                                </tr>
                                <tr id="aksesoris1"></tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                <button id="add_aksesoris" class="btn btn-success pull-left">+ Tambah</button>
                                <button id='delete_aksesoris' class="pull-right btn btn-danger">- Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div> --}}

            <div class="form-group row mt-3">
                <div class="col-sm-6">
                    <a href="{{route('kebaktian.index')}}" class="btn btn-danger btn-block btn">
                        <i class="fas fa-arrow-left fa-fw"></i> Kembali
                    </a>
                </div>
                <div class="col-sm-6">
                    <button class="btn btn-primary btn-block">
                        <i class="fas fa-save fa-fw"></i> Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')

<script>
    $(document).ready(function(){
        let row_number = 1;
        $("#add_aksesoris").click(function(e) {
            e.preventDefault();
            let new_row_number = row_number - 1;
            $('#aksesoris' + row_number).html($('#aksesoris' + new_row_number).html()).find(
                'td:first-child');
            $('#aksesoris_table').append('<tr id="aksesoris' + (row_number + 1) + '"></tr>');
            row_number++;
        });

        $("#delete_aksesoris").click(function(e) {
            e.preventDefault();
            if (row_number > 1) {
                $("#aksesoris" + (row_number - 1)).html('');
                row_number--;
            }
        });
    });
</script>
@endsection
