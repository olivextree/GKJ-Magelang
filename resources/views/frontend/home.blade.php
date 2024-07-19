@extends('frontend.layouts.master')
@section('content')

<!-- Hero -->
<section id="home-section" class="position-relative h-auto">
    <div class="home-slider owl-carousel" data-aos="fade-up">
        @foreach ($banners as $data)
        <div class="slider-item" style="background-image: url({{ asset('upload/gambar') }}/{{ $data->file }});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="p-0 col-md-12 w-100 h-100 d-flex flex-column justify-content-center align-items-center  text-center position-absolute top-0" data-aos="fade-up" data-aos-delay="5000">
        <h4 class="text-light w-75">"Masuklah melalui pintu gerbang-Nya dengan nyanyian syukur, ke dalam pelataran-Nya dengan puji-pujian; bersyukurlah kepada-Nya dan pujilah nama-Nya!"</h4>
        <h5 class="text-light w-75">Mazmur 100:4 (TB)<i class="fas fa-android"></i></h5>
    </div>
</section>

<!-- Tentang -->
<section class="ftco-section h-auto w-100">
    <div class="container" data-aos="fade-up" style="height: 600px;">
        <div class="d-flex gap-3 gap-md-5 h-100">
            <div class="d-flex justify-content-center align-items-center w-50 h-100 bg-body-secondary">
                <img class="w-100 h-100 object-fit-cover" src="{{asset('gereja/images/abouts.jpg')}}" />
            </div>
            <div class="wrap-about w-50 h-100 overflow-hidden d-flex flex-column justify-content-md-center justify-content-start align-content-center gap-4">
                <div class="heading-section-bold overflow-hidden about-image-home">
                    <h2 class="h2-phone">Tentang GKJ Magelang</h2>
                    <p>
                        {!! $about->desc !!}
                    </p>
                </div>
                <a class="w-100 text-decoration-underline fst-italic" href="{{ route('blog.about') }}" style="cursor: pointer; color: #6c757d;">Baca lebih lanjut</a>
            </div>
        </div>
    </div>
</section>

<!-- Maps -->
<section class="ftco-section testimony-section px-5 py-0">
    <div class="d-flex flex-column justify-content-center gap-4" data-aos="fade-up">
        <div class="d-flex flex-column justify-content-center align-items-center w-100">
            <div class="heading-section text-center w-100">
                <h2>Lokasi Kita</h2>
            </div>
            <h6 class="text-center">Jl. Tentara Pelajar No.106, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah 56122</h6>
        </div>
        <div class="container d-flex justify-content-center align-items-center w-100" data-aos="fade-up" style="height: 500px;">
            <iframe class="h-100 shadow-sm maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.8317716116726!2d110.2132944750018!3d-7.48382069252818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a8f5c5e585a8d%3A0xa8ee7043471949!2sGKJ%20Magelang!5e0!3m2!1sid!2sid!4v1700127099614!5m2!1sid!2sid" width="1150" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>

<!-- Pendeta -->
<section class="ftco-section testimony-section overflow-hidden">
    <div class="container" data-aos="fade-up">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section  text-center">
                <h2 class="mb-4">Pendeta <br />GKJ Magelang</h2>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel">
                    @foreach ($pendeta as $data)
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5" style="background-image: url({{ asset('upload/pendeta') }}/{{ $data->file }})">
                            </div>
                            <div class="text text-center name">
                                <p class="name">{{ $data->name }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Jadwal Kebaktian -->
<section class="ftco-section" data-aos="fade-up">
    <div class="w-100 container">
        <div class="heading-section text-center mb-3">
            <h2>Jadwal Kebaktian Minggu Ini</h2>
        </div>
        @if (!empty($kebaktian))
        <div class="d-flex justify-content-center">
            <table class="table table-bordered w-25">
                <thead class="thead-dark">
                    <tr>
                        <th colspan="2">
                            <h4 class="tanggal-kebaktian">
                                {{ \Carbon\Carbon::parse($kebaktian->tgl_kebaktian)->format('D, d F Y') }}
                            </h4>
                            <h5 class="tema-kebaktian">Tema : "{{ $kebaktian->name }}" <br></h5>
                        </th>
                    </tr>
                    <tr>
                        <th><b>Jadwal</b></th>
                        <th><b>Petugas/Bagian</b></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Pukul {{ \Carbon\Carbon::parse($kebaktian->jadwal_1)->format('H:i') }}</td>
                        <td>
                            <div class="d-flex justify-content-between flex-wrap">
                                @foreach ($kebaktian->petugas as $data)
                                @if ($kebaktian->jadwal_1 == $data->waktu)
                                <div class="petugas-kebaktian">
                                    <b>{{ $data->bagian }}</b>
                                    <p>{{ $data->nama_petugas }}</p>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Pukul {{ \Carbon\Carbon::parse($kebaktian->jadwal_2)->format('H:i') }}</td>
                        <td>
                            <div class="d-flex justify-content-between flex-wrap">
                                @foreach ($kebaktian->petugas as $data)
                                @if ($kebaktian->jadwal_2 == $data->waktu)
                                <div class="petugas-kebaktian">
                                    <b>{{ $data->bagian }}</b>
                                    <p>{{ $data->nama_petugas }}</p>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Pukul {{ \Carbon\Carbon::parse($kebaktian->jadwal_3)->format('H:i') }}</td>
                        <td>
                            <div class="d-flex justify-content-between flex-wrap">
                                @foreach ($kebaktian->petugas as $data)
                                @if ($kebaktian->jadwal_3 == $data->waktu)
                                <div class="petugas-kebaktian">
                                    <b>{{ $data->bagian }}</b>
                                    <p>{{ $data->nama_petugas }}</p>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Pukul {{ \Carbon\Carbon::parse($kebaktian->jadwal_4)->format('H:i') }}</td>
                        <td>
                            <div class="d-flex justify-content-between flex-wrap">
                                @foreach ($kebaktian->petugas as $data)
                                @if ($kebaktian->jadwal_4 == $data->waktu)
                                <div class="petugas-kebaktian">
                                    <b>{{ $data->bagian }}</b>
                                    <p>{{ $data->nama_petugas }}</p>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif
    </div>
</section>

<!-- Kegiatan -->
<section class="ftco-section h-auto" data-aos="fade-up">
    <div class="w-100 h-auto">
        <div class="justify-content-center">
            <div class="heading-section  text-center d-flex flex-column gap-3">
                <h2>Kegiatan GKJ Magelang</h2>
                <div class="d-flex gap-4 justify-content-center flex-wrap kegiatan-home-container">
                    @foreach ($kegiatan as $data )
                    @if ( \Carbon\Carbon::parse($data->tanggal_selesai) > \Carbon\Carbon::now()->format('Y-m-d H:i:s'))
                    <div class="d-flex flex-column gap-3 kegiatan-home-item" style="height: 500px; box-sizing: content-box;">
                        <img src="{{asset('upload/acara')}}/{{$data->file}}" class="w-100 h-75 object-fit-cover shadow-sm bg-primary" alt="{{$data->name}}" style="min-height: 75%;">
                        <div class="d-flex justify-content-center align-items-center flex-column w-100 justify-content-between h-25" style="box-sizing: border-box; -webkit-box-sizing: border-box;">
                            <div class="text">
                                <div class="meta" style="justify-self: center; align-self: center;">
                                    <h6 style="color: #999;">{{ \Carbon\Carbon::parse($data->tanggal_mulai)->diffForHumans() }}</h6>
                                </div>
                                <h4 class="heading">{{$data->acara}}</h4>
                            </div>
                            <a href="{{route('blog.detailKegiatan',$data->id)}}" class="btn py-2 px-3 btn-primary" style="width: fit-content;">Selengkapnya</a>
                        </div>
                    </div>
                    @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Ulang tahun -->
<section class="ftco-section testimony-section">
    <div class="container" data-aos="fade-up" style="padding-inline: 0 !important;">
        <div class="justify-content-center mb-5 pb-3">
            <div class="heading-section text-center">
                <h2 class="mb-2">Ulang Tahun Hari Ini</h2>
                <h6>Selamat ulang tahun! Berikut adalah jemaat GKJ Magelang yang merayakan hari ulang tahun hari ini!</h6>
            </div>
        </div>
        @if (!empty($birthday) && count($birthday) > 3)
        <div class="carousel-testimony owl-carousel">
            @foreach ($birthday as $data)
            <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                    <div class="user-img mb-5" style="background-image: url({{ asset('upload/user/' . $data->file) }})">
                        </span>
                    </div>
                    <div class="text text-center">
                        <p>Selamat Ulang Tahun</p>
                        <p class="name">{{ $data->name }}</p>
                        <span class="position">{{ \Carbon\Carbon::parse($data->birthday)->format('d F Y') }}</span>
                        {{-- <span class="position">{{$data->time_start}} - {{$data->time_end}}</span> --}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @elseif (!empty($birthday) && count($birthday) <= 3) <div class="d-flex w-100 justify-content-center align-items-center">
            @foreach ($birthday as $data)
            <div class="d-flex gap-4 flex-column justify-content-between align-items-center" style="width: 33.33%;">
                <img class="object-fit-cover birthday-home-img" src="{{ asset('upload/user/' . $data->file) }}" />
                <div class="text text-center w-100">
                    <h2 class="name w-100 birthday-home-name">{{ $data->name.'' }}</h2>
                </div>
            </div>
            @endforeach
            @else
            <div class="d-flex w-100 justify-content-center align-items-center">
                <h2 class="text-center">Tidak ada jemaat yang merayakan ulang tahun hari ini</h2>
            </div>
            @endif
    </div>
    </div>
</section>

<a href="https://wa.me/085236865306?text=halo%20min" class="wafloat shadow-sm" target="_blank">
    <i class="fa-brands fa-whatsapp"></i>
</a>


@endsection

<style>
    * {
        padding: 0;
        margin: 0;
    }

    body {
        font-family: Verdana, Geneva, sans-serif;
        font-size: 18px;
        background-color: #CCC;
    }

    .wafloat {
        position: fixed;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 60px;
        height: 60px;
        bottom: 40px;
        right: 40px;
        background-color: #0C9;
        color: #FFF;
        border-radius: 50px;
        text-align: center;
    }

    .wafloat i {
        font-size: 30px;
    }

    .wafloat:hover {
        color: #fff;
        scale: 1.1;
    }

    .my-float {
        margin-top: 22px;
    }
</style>