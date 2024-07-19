@extends('frontend.layouts.master')
@section('content')
<div class="hero-wrap hero-bread position-relative" style="background-image: url('gereja/images/pray-unsplash.jpg');" data-aos="fade-down" data-aos-delay="500">
  <div class="container position-relative z-1">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 text-center">
        <h1 class="mb-0 bread">Renungan</h1>
        <p class="breadcrumbs"><span class="mr-2"><a href="index.html"></a></span> <span>Renungan</span></p>
      </div>
    </div>
  </div>
  <div class="position-absolute top-0 h-100 w-100 bg-black opacity-25 z-0"></div>
</div>

<section class="ftco-section ftco-degree-bg">
  <div class="container">
    <div class="col-lg-12">
      <div class="d-flex gap-4 flex-column article-list-container">
        @foreach ($articels as $data )
        <div class="col-md-12 d-flex" style="min-height: 300px;" data-aos="fade-up" data-aos-delay="600">
          <div class="blog-entry d-flex article-list-item-container w-100 h-100 gap-4">
            <img src="{{asset('upload/gambar')}}/{{$data->file}}" class="object-fit-cover shadow-sm" alt="{{$data->name}}">
            <div class="d-flex flex-column article-list-item-text justify-content-between h-100 article-list-text-container" style="box-sizing: border-box; -webkit-box-sizing: border-box;">
              <div class="text">
                <div class="meta mb-3" style="justify-self: center; align-self: center;">
                  <div><a href="#">{{ \Carbon\Carbon::parse($data->created_at)->diffForHumans() }}</a></div>
                </div>
                <h3 class="heading"><a href="#">{{$data->name}}</a></h3>
                <p>
                  @php
                  $firstPart = substr(strip_tags($data->desc, ['<br>']), 0, 250);
                  $secondPart = strlen($data->desc) > 250 ? '...' : '';
                  echo $firstPart . $secondPart;
                  @endphp
                </p>
              </div>
              <a href="{{route('blog.detailArticel',$data->id)}}" class="btn btn-primary py-2 px-3" style="width: fit-content;">Baca lebih lanjut</a>
            </div>
          </div>
        </div>
        <hr />
        @endforeach
      </div>
    </div>
  </div>
</section>
@endsection