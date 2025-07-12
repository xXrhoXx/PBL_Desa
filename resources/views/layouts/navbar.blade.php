<!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">Desa Wringinanom</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active text-white' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('login') ? 'active text-white' : '' }}" href="{{ route('login') }}">Login</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('berita') ? 'active text-white' : '' }}" href="{{ route('berita') }}">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('produk') ? 'active text-white' : '' }}" href="{{ route('produk') }}">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('informasi') ? 'active text-white' : '' }}" href="{{ route('informasi') }}">Perangkat Desa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('cetak.index') ? 'active text-white' : '' }}" href="{{ route('cetak.index') }}">Dokumen</a>
                    </li>
                    
                    @php
                        $isLoggedIn = isset($_COOKIE['token']) && !empty($_COOKIE['token']);
                        $isAdmin = isset($_COOKIE['role']) && $_COOKIE['role'] === '1';
                    @endphp

                    @if ($isLoggedIn)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('login') ? 'active text-white' : '' }}" href="{{ route('login') }}">Login</a>
                        </li>
                    @endif
                    @if ($isAdmin)
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin/profil') ? 'active text-white' : '' }}" href="{{ route('admin.profil') }}">Admin</a>
                        </li>
                    @else
                        <li class="nav-item"></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
