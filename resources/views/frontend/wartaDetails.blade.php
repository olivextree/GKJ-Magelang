@extends('frontend.layouts.master')
@section('content')
<div class="hero-wrap hero-bread position-relative" style="background-image: url({{asset('gereja/images/speech-unsplash.jpg')}});" data-aos="fade-down" data-aos-delay="500">
  <div class="container position-relative z-1">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 text-center">
        <p class="breadcrumbs">Warta</p>
        <h1 class="mb-0 bread">{{$data->name}}</h1>
      </div>
    </div>
  </div>
  <div class="position-absolute top-0 h-100 w-100 bg-black opacity-25 z-0" ></div>
</div>

<section class="ftco-section ftco-degree-bg" data-aos="fade-up" data-aos-delay="500">
  <div class="container d-flex flex-column w-100 gap-3 justify-content-center align-items-center">
    <h1 class="text-center">{{$data->name}}</h1>
    <iframe src="{{asset('upload/warta')}}/{{$data->file}}" width="100%" height="800px"></iframe>
  </div>
</section> <!-- .section -->
@endsection