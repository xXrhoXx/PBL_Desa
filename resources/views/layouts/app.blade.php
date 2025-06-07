<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Desa - @yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">Desa Kita</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('artikel.index') }}">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('produk') }}">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('informasi') }}">Informasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cetak.index') }}">Dokumen</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-4">
        <!-- Hero Section -->
        <section class="hero-section mb-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h1 class="display-4 fw-bold mb-4">Selamat Datang di Wringin Anom</h1>
                        <p class="lead mb-4">Desa yang maju dengan masyarakat yang sejahtera dan berbudaya</p>
                        <a href="#tentang" class="btn btn-primary btn-lg me-2">Tentang Kami</a>
                        <a href="#perangkat" class="btn btn-outline-primary btn-lg">Perangkat Desa</a>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ asset('img/dekorasi.jpg') }}" alt="Dekorasi Desa" class="img-fluid rounded shadow-lg">
                </div>
            </div>
        </section>

        <!-- Tentang Desa Section -->
        <section id="tentang" class="py-5 bg-light mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <h2 class="section-title mb-4">Tentang Desa Kami</h2>
                        <p class="lead">Desa kami adalah komunitas yang kaya akan budaya dan tradisi, dengan masyarakat yang ramah dan bersahabat.</p>
                        <p>Terletak di wilayah yang subur dengan pemandangan alam yang indah, desa kami memiliki berbagai potensi baik di bidang pertanian, kerajinan tangan, maupun wisata alam. Kami berkomitmen untuk mengembangkan desa secara berkelanjutan dengan melestarikan kearifan lokal.</p>
                        <p>Dengan semangat gotong royong yang kuat, kami terus membangun infrastruktur dan meningkatkan kesejahteraan masyarakat desa.</p>
                        <a href="{{ route('informasi') }}" class="btn btn-primary mt-3">Selengkapnya</a>
                    </div>
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="card border-0 shadow-sm h-100">
                                    <div class="card-body text-center p-4">
                                        <i class="bi bi-people-fill display-4 text-success mb-3"></i>
                                        <h3>2,500+</h3>
                                        <p class="mb-0">Jiwa Penduduk</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card border-0 shadow-sm h-100">
                                    <div class="card-body text-center p-4">
                                        <i class="bi bi-house-door-fill display-4 text-success mb-3"></i>
                                        <h3>15</h3>
                                        <p class="mb-0">Rukun Tetangga</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card border-0 shadow-sm h-100">
                                    <div class="card-body text-center p-4">
                                        <i class="bi bi-tree-fill display-4 text-success mb-3"></i>
                                        <h3>500+</h3>
                                        <p class="mb-0">Hektar Lahan</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card border-0 shadow-sm h-100">
                                    <div class="card-body text-center p-4">
                                        <i class="bi bi-award-fill display-4 text-success mb-3"></i>
                                        <h3>10+</h3>
                                        <p class="mb-0">Penghargaan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>   

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5>Tentang Desa Kita</h5>
                    <p>Desa yang maju dengan masyarakat yang sejahtera dan berbudaya, mengedepankan gotong royong dan kearifan lokal.</p>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5>Kontak Kami</h5>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-geo-alt"></i> Jl. Desa No. 123, Kecamatan, Kabupaten</li>
                        <li><i class="bi bi-telephone"></i> (021) 12345678</li>
                        <li><i class="bi bi-envelope"></i> info@desakita.id</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Link Cepat</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}" class="text-white">Beranda</a></li>
                        <li><a href="{{ route('berita') }}" class="text-white">Berita</a></li>
                        <li><a href="{{ route('produk') }}" class="text-white">Produk</a></li>
                        <li><a href="{{ route('informasi') }}" class="text-white">Informasi</a></li>
                        <li><a href="{{ route('login') }}" class="text-white">Login</a></li>
                    </ul>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p class="mb-0">&copy; 2023 Website Desa Kita. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>