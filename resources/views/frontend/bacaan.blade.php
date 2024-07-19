@extends('frontend.layouts.master')
@section('content')
<div class="hero-wrap hero-bread position-relative" style="background-image: url('gereja/images/bible-unsplash.jpg');" data-aos="fade-down" data-aos-delay="500">
  <div class="container position-relative z-1">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 text-center">
        <h1 class="mb-0 bread">Bacaan</h1>
        <p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}"></a></span> <span>Bacaan Kitab Suci dalam Sepekan</span></p>
      </div>
    </div>
  </div>
  <div class="position-absolute top-0 h-100 w-100 bg-black opacity-25 z-0" ></div>
</div>

<section class="ftco-section" data-aos="fade-up" data-aos-delay="600">
  <div class="container d-flex gap-3 flex-column align-items-center justify-content-center w-50">
    <table class="table table-striped shadow-sm" style="min-width: 100% !important;">
      <thead>
        <tr class="text-start">
          <th><b>Hari</b></th>
          <th><b>Tanggal</b></th>
          <th><b>Bacaan</b></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($bacaan as $data)
        <tr>
          <td width="30%">{{\Carbon\Carbon::parse($data->tanggal)->isoFormat('dddd')}}</td>
          <td width="30%">{{\Carbon\Carbon::parse($data->tanggal)->format('d-m-Y')}}</td>
          <td>{{$data->desc}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</section>
@endsection