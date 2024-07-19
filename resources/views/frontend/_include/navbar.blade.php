  <section class="hero">
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar" data-aos="fade-down">
      <div class="d-flex justify-content-between w-100">
        <a class="logo-container bg-white rounded-end-5" href="{{route('blog.index')}}" data-aos="fade-right" data-aos-delay="500">
          <img src="{{asset('gereja/images/logo.png')}}" width="15%">
          <h4 class="m-0 text-black"> GKJ MAGELANG </h4>
        </a>
        <div class="collapse navbar-collapse justify-content-end">
          <ul class="navbar-nav d-flex">
            <li class="nav-item"><a href="{{route('blog.index')}}" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="{{route('blog.kegiatan')}}" class="nav-link">Kegiatan</a></li>
            <li class="nav-item"><a href="{{route('blog.warta')}}" class="nav-link">Warta</a></li>
            <li class="nav-item"><a href="{{route('blog.about')}}" class="nav-link">Tentang</a></li>
            <li class="nav-item"><a href="{{route('blog.articel')}}" class="nav-link">Renungan</a></li>
            <li class="nav-item"><a href="{{route('blog.bacaan')}}" class="nav-link">Bacaan</a></li>
            @guest
            @if (Route::has('login'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @endif
            @else


            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
              </a>

              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @if (Auth::user()->role == 'admin')
                <a class="dropdown-item" href="{{ route('home') }}">
                  {{ __('Dashboard') }}
                </a>
                @else
                <a class="dropdown-item" href="{{ route('blog.user.kegiatan') }}">
                  {{ __('Dashboard') }}
                </a>
                @endif
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </div>
            </li>
            @endguest
          </ul>
        </div>
        <button class="navbar-toggler pe-3" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <p><span class="fa fa-bars"></span>Menu</p>
        </button>
      </div>
    </nav>
    <nav class="bg-dark ftco-navbar-light navbar-dark navbar collapse navbar-collapse justify-content-start position-fixed" id="ftco-nav" style="width: 100vw;">
      <ul class="navbar-nav d-flex w-100">
        <li class="nav-item"><a href="{{route('blog.index')}}" class="nav-link"><span class="ms-3">Home</span></a></li>
        <li class="nav-item"><a href="{{route('blog.kegiatan')}}" class="nav-link"><span class="ms-3">Kegiatan</span></a></li>
        <li class="nav-item"><a href="{{route('blog.warta')}}" class="nav-link"><span class="ms-3">Warta</span></a></li>
        <li class="nav-item"><a href="{{route('blog.about')}}" class="nav-link"><span class="ms-3">Tentang</span></a></li>
        <li class="nav-item"><a href="{{route('blog.articel')}}" class="nav-link"><span class="ms-3">Renungan</span></a></li>
        <li class="nav-item"><a href="{{route('blog.bacaan')}}" class="nav-link"><span class="ms-3">Bacaan</span></a></li>
        @guest
        @if (Route::has('login'))
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}"><span class="ms-3">{{ __('Login') }}</span></a>
        </li>
        @endif
        @else


        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <span class="ms-3">{{ Auth::user()->name }}</span>
          </a>

          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @if (Auth::user()->role == 'admin')
            <a class="dropdown-item" href="{{ route('home') }}">
              <span class="ms-3">{{ __('Dashboard') }}</span>
            </a>
            @else
            <a class="dropdown-item" href="{{ route('blog.user.kegiatan') }}">
              <span class="ms-3">{{ __('Dashboard') }}</span>
            </a>
            @endif
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
              <span class="ms-3">{{ __('Logout') }}</span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
        </li>
        @endguest
      </ul>
      <button class="navbar-toggler pe-3" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="true" aria-label="Toggle navigation">
        <p><span class="fa-solid fa-x"></span>Close</p>
      </button>
    </nav>
  </section>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>