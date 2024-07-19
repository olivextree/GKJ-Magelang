@extends('layouts.master')
@section('title', 'Kebaktian')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Edit Kebaktian</h6>
    </div>
    <form class="user" action="{{route('kebaktian.update',$item->id)}}" method="post">
        @csrf
        @method('put')
    <div class="card-body">

        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="nama_customer">Nama Kebaktian</label>
                <input type="text" name="name" value="{{$item->name}}" class="form-control">
            </div>
            <div class="col-sm-6">
                <label for="">Tanggal Kebaktian</label>
                <input type="date" name="tgl_kebaktian" value="{{$item->tgl_kebaktian}}" class="form-control">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="nama_customer">Jadwal Satu</label>
                <input type="time" name="jadwal_1" value="{{$item->jadwal_1}}" class="form-control">
            </div>
            <div class="col-sm-6">
                <label for="">Jadwal Dua</label>
                <input type="time" name="jadwal_2" value="{{$item->jadwal_2}}" class="form-control">
            </div>
            <div class="col-sm-6">
                <label for="">Jadwal Tiga</label>
                <input type="time" name="jadwal_3" value="{{$item->jadwal_3}}" class="form-control">
            </div>
            <div class="col-sm-6">
                <label for="">Jadwal Empat</label>
                <input type="time" name="jadwal_4" value="{{$item->jadwal_4}}" class="form-control">
            </div>
        </div>
            <div class="form-group row">
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
                                @foreach ($item->detail as $data)
                                <input type="hidden" name="id_detail[]" value="{{$data->id}}">
                                <tr id="aksesoris0">
                                    <td>
                                        <select name="waktu[]" id="" class="form-control">
                                            <option value="">--Pilih Waktu--</option>
                                            <option value="{{$item->jadwal_1}}">{{$item->jadwal_1}}</option>
                                            <option value="{{$item->jadwal_2}}">{{$item->jadwal_2}}</option>
                                            <option value="{{$item->jadwal_3}}">{{$item->jadwal_3}}</option>
                                            <option value="{{$item->jadwal_4}}">{{$item->jadwal_4}}</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="majelis[]" value="{{$data->majelis}}" class="form-control" />
                                    </td>
                                    <td>
                                        <input type="number" name="laki[]" value="{{$data->laki}}" class="form-control" />
                                    </td>
                                    <td>
                                        <input type="number" name="perempuan[]" value="{{$data->wanita}}" class="form-control" />
                                    </td>
                                    <td>
                                        <input type="number" name="anak[]" value="{{$data->anak}}" class="form-control" />
                                    </td>
                                    <td>
                                        <input type="number" name="persembahan[]" value="{{$data->persembahan}}" class="form-control" />
                                    </td>
                                </tr>
                                @endforeach
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
                    <button class="btn btn-primary btn-block">
                        <i class="fas fa-save fa-fw"></i> Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
