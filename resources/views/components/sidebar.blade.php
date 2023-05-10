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
    @if (Auth::check())
        <ul class="sidebar-menu">
            <li class="{{ Route::current()->getName() == 'dashboard' ? 'active' : '' }}"><a class="nav-link"
                    href="{{ Route('dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            <li class="{{ Route::current()->getName() == 'pemetaan' ? 'active' : '' }}"><a class="nav-link"
                    href="{{ Route('pemetaan') }}"><i class="fas fa-map"></i> <span>Data Pemetaan</span></a></li>
            <li class="{{ Route::current()->getName() == 'kategori.tambah' ? 'active' : '' }}"><a class="nav-link"
                    href="{{ Route('kategori') }}"><i class="fas fa-map"></i> <span>Kategori Wisata</span></a></li>
        </ul>
    @else
        <ul class="sidebar-menu">
            <li class="{{ Route::current()->getName() == 'home' ? 'active' : '' }}"><a class="nav-link"
                    href="{{ Route('home') }}"><i class="fas fa-map"></i> <span>Tempat Wisata</span></a></li>
            <li class="{{ Route::current()->getName() == 'about' ? 'active' : '' }}"><a class="nav-link"
                    href="{{ Route('about') }}"><i class="fas fa-info"></i> <span>Tentang Kami</span></a></li>
            
                    <li class="{{ Route::current()->getName() == 'login' ? 'active' : '' }}"><a class="nav-link"
                    href="{{ Route('login') }}"><i class="fas fa-fire"></i> <span>Login</span></a></li>
        </ul>
    @endif
</aside>
