<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>    
    <footer class="footer-48201">
      <div class="container">       
        <div class="row">
          <div class="col-md-4 pr-md-5">
            <a href="#" class="footer-site-logo d-block mb-4">GKJ MAGELANG</a>
            <p>Jl. Tentara Pelajar No.106, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah 56122</p>
          </div>
          <div class="col-md">
            <ul class="list-unstyled nav-links">
            <li class="nav-item "><a href="{{route('blog.index')}}" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="{{route('blog.kegiatan')}}" class="nav-link">Kegiatan</a></li>
            </ul>
          </div>
          <div class="col-md">
            <ul class="list-unstyled nav-links">
            <li class="nav-item"><a href="{{route('blog.warta')}}" class="nav-link">Warta</a></li>
            <li class="nav-item"><a href="{{route('blog.about')}}" class="nav-link">Tentang</a></li>
            </ul>
          </div>
          <div class="col-md">
            <ul class="list-unstyled nav-links">
            <li class="nav-item"><a href="{{route('blog.articel')}}" class="nav-link">Renungan</a></li>
            <li class="nav-item"><a href="{{route('blog.bacaan')}}" class="nav-link">Bacaan</a></li>
            </ul>
          </div>
          <div class="col-md10 text-md-center">
            <ul class="social list-unstyled">
              <li><a href="https://www.instagram.com/gkjmagelang/"><span class="icon-instagram"></span></a></li>
              <li><a href="https://www.youtube.com/@gkjmagelang"><span class="icon-youtube"></span></a></li>
              <li><a href="https://www.facebook.com/profile.php?id=100078197184766&locale=id_ID"><span class="icon-facebook"></span></a></li>
              <li><a href="#"><span class="icon-whatsapp"></span></a></li>
            </ul>
          </div>
        </div> 

        <div class="row ">
          <div class="col-12 text-center">
            <span>
          <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="#" target="_blank">SatriaBagus_GKJ Magelang</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                      </p>
          </span>
            </div>
          </div>
        </div> 
      </div>
      </footer>
    



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="{{asset('gereja/js/jquery.min.js')}}"></script>
<script src="{{asset('gereja/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('gereja/js/popper.min.js')}}"></script>
<script src="{{asset('gereja/js/bootstrap.min.js')}}"></script>
<script src="{{asset('gereja/js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('gereja/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('gereja/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('gereja/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('gereja/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('gereja/js/aos.js')}}"></script>
<script src="{{asset('gereja/js/jquery.animateNumber.min.js')}}"></script>
<script src="{{asset('gereja/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('gereja/js/scrollax.min.js')}}"></script>
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script> --}}
{{-- <script src="{{asset('gereja/js/google-map.js')}}"></script> --}}
<script src="{{asset('gereja/js/main.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@yield('script')
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>