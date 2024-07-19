@extends('layouts.master')

@section('title', 'Home')
@section('content')
@if (Auth::user()->role == 'admin')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="" class="text-decoration-none card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Pemasukan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">@rupiah($jumlah['pemasukan'])</div>
                        </div>
                        {{-- <div class="col-auto">
                            <i class="fas fa-address-book fa-2x text-gray-300"></i>
                        </div> --}}
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="" class="text-decoration-none card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Jemaat
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah['anggota'] }}</div>
                        </div>
                        {{-- <div class="col-auto">
                            <i class="fas fa-address-book fa-2x text-gray-300"></i>
                        </div> --}}
                    </div>
                </div>
            </a>
        </div>
        {{-- <div class="col-xl-3 col-md-6 mb-4">
            <a href="" class="text-decoration-none card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Jumlah Pendeta
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah['pendeta'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-address-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div> --}}
        {{-- <div class="col-xl-3 col-md-6 mb-4">
            <a href="" class="text-decoration-none card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Surat Selesai
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah['suratselesai'] }}</div>
                        </div>
                        {{-- <div class="col-auto">
                            <i class="fas fa-address-book fa-2x text-gray-300"></i>
                        </div> --}}
                    </div>
                </div>
            </a>
        </div> --}}
    </div>
</div>
@endif
@endsection