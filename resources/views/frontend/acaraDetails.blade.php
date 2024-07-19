@extends('frontend.layouts.master')
@section('content')

<div class="hero-wrap hero-bread position-relative" style="background-image: url({{ asset('upload/acara') }}/{{ $data->file }});" data-aos="fade-down" data-aos-delay="500">
    <div class="container position-relative z-1">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 text-center">
                <p class="breadcrumbs"><span class="mr-2">Kegiatan</p>
                <h1 class="mb-0 bread">{{ $data->acara }}</h1>
            </div>
        </div>
    </div>
    <div class="position-absolute top-0 h-100 w-100 bg-black opacity-50 z-0"></div>
</div>

<section class="ftco-section ftco-degree-bg" data-aos="fade-up" data-aos-delay="500">
    <div class="container p-0">
        <div class="w-100 article-detail-container">
            <div class="w-100 position-relative overflow-hidden p-4 shadow-lg" style="height: 500px;">
                <img src="{{ asset('upload/acara') }}/{{ $data->file }}" class="w-100 h-100 position-absolute top-0 z-0 object-fit-cover" style="background-image: url({{ asset('upload/acara') }}/{{ $data->file }}); left: 0; filter:blur(10px);">
                <div class="w-100 h-100 position-absolute bg-black z-1 opacity-50 top-0" style="left: 0;"></div>
                <img src="{{ asset('upload/acara') }}/{{ $data->file }}" class="w-100 h-100 object-fit-contain position-relative z-2 shadow-lg">
            </div>
            <p>{!! $data->desc !!}</p>
            <span>Total Pendaftar : <b>{{ $data->total }} Peserta</b></span>
            <p></p>
            @if (Auth::check())
            @if (count($data->detail) > 0)
            @foreach ($data->detail as $detail)
            @if ($detail->user_id == Auth::user()->id)
            <center>
                <h4>
                    <span class="badge badge-warning">Anda Telah Melakukan Pendaftaran</span>
                </h4>
            </center>
            @else
            <center>
                <p><a href="#" onclick="return daftar({{ $data->id }})" class="btn btn-primary py-2 px-3">Ikuti Acara</a></p>
            </center>
            @endif
            @endforeach
            @else
            <center>
                <p><a href="#" onclick="return daftar({{ $data->id }})" class="btn btn-primary py-2 px-3">Ikuti Acara</a></p>
            </center>
            @endif
            @else
            <center>
                <p><a href="{{ route('login') }}" class="btn btn-primary py-2 px-3">Silahkan Login Terlebih
                        Dahulu</a></p>
            </center>
            @endif
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    // Untuk modal halaman edit show
    function daftar(id) {
        $.get("{{ url('acara/daftar') }}/" + id, {}, function(data, status) {
            $("#exampleModalLabel").html('Daftar Acara')
            $("#page").html(data);
            $("#exampleModal").modal('show');
        });
    }
</script>
@endsection