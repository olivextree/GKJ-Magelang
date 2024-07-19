@extends('frontend.layouts.master')
@section('content')
  <section class="ftco-section ftco-degree-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 ftco-animate">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <center>
                    <h4>KEGIATAN YANG DI DAFTARKAN</h4>
                </center>
                <table class="table table-striped" width=100%>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kegiatan as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td width="30%">{{ $data->pendaftaran->acara }}</td>
                                <td width="30%">{!!$data->pendaftaran->desc!!}</td>
                                <td><img src="{{asset('upload/gambar')}}/{{ $data->pendaftaran->file }}" width="30%"></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> <!-- .col-md-8 -->
      </div>
    </div>
</section> <!-- .section -->
@endsection
