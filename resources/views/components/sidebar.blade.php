<aside id="sidebar-wrapper">
    @if (Auth::check())
        <div class="sidebar-brand">
            <a href="/">{{ Str::upper(Auth::user()->role) }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">{{ Str::upper(Auth::user()->role) }}</a>
        </div>
    @else
        <div class="sidebar-brand">
            <a href="/">User</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">User</a>
        </div>
    @endif
    @auth
        <ul class="sidebar-menu">
            <li class="{{ Route::current()->getName() == 'dashboard' ? 'active' : '' }}"><a class="nav-link"
                    href="{{ Route('dashboard') }}"><i class="fas fa-fire"></i> <span>Beranda</span></a></li>
        </ul>
        <ul class="sidebar-menu">
            <li class="{{ Route::current()->getName() == 'kategori' ? 'active' : '' }}"><a class="nav-link"
                    href="{{ Route('kategori') }}"><i class="fas fa-cube"></i> <span>Kategori</span></a></li>
        </ul>
        <ul class="sidebar-menu">
            <li class="{{ Route::current()->getName() == 'fasilitas' ? 'active' : '' }}"><a class="nav-link"
                    href="{{ Route('fasilitas') }}"><i class="fas fa-image"></i> <span>Data Image</span></a></li>
        </ul>
        <ul class="sidebar-menu">
            <li class="{{ Route::current()->getName() == 'pemetaan' ? 'active' : '' }}"><a class="nav-link"
                    href="{{ Route('pemetaan') }}"><i class="fas fa-map"></i> <span>Tambah Pemetaan</span></a></li>
        </ul>
        <ul class="sidebar-menu">
            <li class="{{ Route::current()->getName() == 'user.index' ? 'active' : '' }}"><a class="nav-link"
                    href="{{ Route('user.index') }}"><i class="fas fa-user"></i> <span>User</span></a></li>
        </ul>
        <ul class="sidebar-menu">
            <li class="{{ Route::current()->getName() == 'setting' ? 'active' : '' }}"><a class="nav-link"
                    href="{{ Route('setting') }}"><i class="fas fa-wrench"></i> <span>Pengaturan</span></a></li>
        </ul>
    @else
    <ul class="sidebar-menu">
        <li><a class="nav-link"
        href="{{ Route('home') }}"><i class="fas fa-fire"></i> <span>Beranda</span></a></li>
    </ul>
    @endif

</aside>
