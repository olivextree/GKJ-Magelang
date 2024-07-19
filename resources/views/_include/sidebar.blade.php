<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href=""{{route('blog.index')}}">GKJ Magelang</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SA</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-fire"></i></i> <span>Dashboard</span></a>
            </li>

            @if (Auth::user()->role == 'admin')
            <li class="menu-header">Menu Utama</li>

            <li><a class="nav-link" href="{{route('banner.index')}}"><i class="fas fa-images"></i><span>Gambar</span></a></li>
            <li><a class="nav-link" href="{{route('about.index')}}"><i class="fas fa-file-alt"></i><span>Tentang Gereja</span></a></li>
            <li><a class="nav-link" href="{{route('kebaktian.index')}}"><i class="fas fa-user"></i> <span>Kebaktian</span></a></li>
            <li><a class="nav-link" href="{{route('laporan.index')}}"><i class="fas fa-file-pdf"></i> <span>Laporan</span></a></li>
            <li><a class="nav-link" href="{{route('kegiatan.index')}}"><i class="fas fa-newspaper"></i> <span>Kegiatan</span></a></li>

            
            <li class="menu-header">Master</li>
            <li><a class="nav-link" href="{{route('user.index')}}"><i class="fas fa-users"></i><span>User</span></a></li>
            <li><a class="nav-link" href="{{route('pendeta.index')}}"><i class="fas fa-user"></i> <span>Pendeta</span></a></li>
            <li><a class="nav-link" href="{{route('warta.index')}}"><i class="fas fa-newspaper"></i><span>Warta</span></a></li>
            <li><a class="nav-link" href="{{route('articel.index')}}"><i class="fas fa-newspaper"></i><span>Renungan</span></a></li>
            <li><a class="nav-link" href="{{route('bacaan.index')}}"><i class="fas fa-book"></i> <span>Bacaan</span></a></li>

            @else
            <li class="menu-header">Master</li>
                <li><a class="nav-link" href="{{route('kegiatan.index')}}"><i class="fas fa-users"></i><span>Pendaftaran</span></a></li>
            @endif
        </ul>

    </aside>
</div>
</div>