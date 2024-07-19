@extends('layouts.master')
@section('title', 'Laporan')
@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Laporan</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="card">
                        <form action="{{ route('laporan.store') }}" method="POST">
                            @csrf
                            <div class="card-header">
                                <h4>Cetak Laporan Kegiatan</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Mulai Tanggal :</label>
                                    <input type="date" name="start_date" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Sampai Tanggal :</label>
                                    <input type="date" name="end_date" class="form-control">
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
