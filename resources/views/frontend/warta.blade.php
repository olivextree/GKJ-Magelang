@extends('frontend.layouts.master')
@section('content')
<div class="hero-wrap hero-bread position-relative" style="background-image: url('gereja/images/speech-unsplash.jpg');" data-aos="fade-down" data-aos-delay="500">
  <div class="container position-relative z-1">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 text-center">
        <h1 class="mb-0 bread">Warta</h1>
        <p class="breadcrumbs"><span class="mr-2"><a href="index.html"></a></span> <span>Warta gereja kami</span></p>
      </div>
    </div>
  </div>
  <div class="position-absolute top-0 h-100 w-100 bg-black opacity-25 z-0" ></div>
</div>

<section class="ftco-section ftco-degree-bg">
  <div class="container">
    <div class="d-flex flex-column flex-md-row w-100 justify-content-center gap-4 flex-wrap" style="min-height: 400px; max-height: auto;">
      @foreach ($wartas as $data )
      <div class="d-flex flex-column align-items-start warta-page-item h-100 gap-4" data-aos="fade-up" data-aos-delay="600">
        <iframe src="{{asset('upload/warta')}}/{{$data->file}}" class="w-100 overflow-hidden h-100"></iframe>
        <div class="text d-flex flex-column gap-2">
          <div class="meta">
            <h6 style="color: #999;">{{ \Carbon\Carbon::parse($data->created_at)->diffForHumans() }}</h6>
          </div>
          <h3 class="heading">{{$data->name}}</h3>
          <a href="{{route('blog.wartadetail',$data->id)}}" class="btn btn-primary py-2 px-3">Lihat detail</a>
        </div>
      </div>
      @endforeach
    </div> 
  </div>
</section> <!-- .section -->
@endsection