@extends('frontend.layouts.master')
@section('content')
<div class="hero-wrap hero-bread position-relative" style="background-image: url('gereja/images/about-img.jpg');" data-aos="fade-down" data-aos-delay="500">
  <div class="container position-relative z-1">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 text-center">
        <h1 class="mb-0 bread">Tentang Kami</h1>
        <p class="breadcrumbs"><span class="mr-2"><a href="{{route('blog.index')}}"></a></span> <span>Kenali lebih dekat tentang gereja kami!</span></p>
      </div>
    </div>
  </div>
  <div class="position-absolute top-0 h-100 w-100 bg-black opacity-25 z-0"></div>
</div>

<section class="ftco-section ftco-no-pb ftco-no-pt bg-light" data-aos="fade-up" data-aos-delay="600">
  <div class="container">
    <div class="d-flex about-page-container mt-5 h-auto">
      <div class="wrap-about h-auto">
        <div class="heading-section-bold ">
          <div class="ml-md-0">
            <h2 class="text-black">Selamat Datang Di GKJ Magelang!</h2>
          </div>
        </div>
        <hr/>
        <div class="pb-md-5">
          <h3><b>Sejarah Kami</b></h3>
          <hr/>
          {!!$about->desc!!}
          <h3><b>Visi</b></h3>
          <hr/>
          {!!$about->visi!!}
          <h3><b>Misi</b></h3>
          <hr/>
          {!!$about->misi!!}
        </div>
      </div>
      <div class="d-flex flex-column justify-content-start h-100" data-aos="fade-up">
        <div class="w-100 h-25 p-3">
          <img src="{{asset('gereja/images/about-img.jpg')}}" class="w-100 h-100 object-fit-cover shadow-sm" />
        </div>
        <div class="w-100 h-25 p-3">
          <img src="{{asset('gereja/images/abouts.jpg')}}" class="w-100 h-100 object-fit-cover shadow-sm" />
        </div>
        <div class="w-100 h-25 p-3">
          <img src="{{asset('gereja/images/about.jpg')}}" class="w-100 h-100 object-fit-cover shadow-sm" />
        </div>
        <div class="w-100 h-25 p-3">
          <img src="{{asset('gereja/images/abouts.jpg')}}" class="w-100 h-100 object-fit-cover shadow-sm" />
        </div>
      </div>
    </div>
</section>
@endsection