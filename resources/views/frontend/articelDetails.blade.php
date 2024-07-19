@extends('frontend.layouts.master')
@section('content')
<div class="hero-wrap hero-bread position-relative" style="background-image: url({{asset('gereja/images/pray-unsplash.jpg')}});" data-aos="fade-down" data-aos-delay="500">
  <div class="container position-relative z-1">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 text-center">
        <p class="breadcrumbs"><span class="mr-2">Renungan</p>
        <h1 class="mb-0 bread">{{$data->name}}</h1>
      </div>
    </div>
  </div>
  <div class="position-absolute top-0 h-100 w-100 bg-black opacity-50 z-0"></div>
</div>

<section class="ftco-section ftco-degree-bg" data-aos="fade-up" data-aos-delay="500">
  <div class="container">
    <div class="col-lg-12 article-detail-container">
      <h2 class="mb-3" align="center">{{$data->name}}</h2>
      <p>
        <img src="{{asset('upload/gambar')}}/{{$data->file}}" width="100%" class="img-fluid">
      </p>
      {!!$data->desc!!}
    </div> <!-- .col-md-8 -->
  </div>
</section> <!-- .section -->
@endsection