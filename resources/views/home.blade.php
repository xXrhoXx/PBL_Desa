@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!-- Main Content -->
<main class="py-4">

    <!-- Hero Section -->
    <section class="hero-section mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Selamat Datang di Wringin Anom</h1>
                    <p class="lead mb-4">Desa yang maju dengan masyarakat yang sejahtera dan berbudaya</p>
                    <a href="#tentang" class="btn btn-success btn-lg me-2">Tentang Kami</a>
                    <a href="#perangkat" class="btn btn-outline-success btn-lg">Perangkat Desa</a>
                </div>
                <div class="col-lg-6">
                    <!-- Carousel -->
                    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                        <div class="carousel-inner rounded shadow-lg">
                            <div class="carousel-item active">
                                <img src="{{ asset('images/sungai.jpg') }}" class="d-block w-100" alt="Gambar 1">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/rafting.jpg') }}" class="d-block w-100" alt="Gambar 2">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/camp.jpg') }}" class="d-block w-100" alt="Gambar 3">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Sebelumnya</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Berikutnya</span>
                        </button>
                    </div>
                </div>
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
                    <a href="{{ route('informasi') }}" class="btn btn-success mt-3">Selengkapnya</a>
                </div>
                <div class="col-lg-6">
                    <div class="row g-3">
                        @php
                            $info = [
                                ['icon' => 'people-fill', 'value' => '2,500+', 'label' => 'Jiwa Penduduk'],
                                ['icon' => 'house-door-fill', 'value' => '15', 'label' => 'Rukun Tetangga'],
                                ['icon' => 'tree-fill', 'value' => '500+', 'label' => 'Hektar Lahan'],
                                ['icon' => 'award-fill', 'value' => '10+', 'label' => 'Penghargaan'],
                            ];
                        @endphp

                        @foreach($info as $item)
                        <div class="col-6">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center p-4">
                                    <i class="bi bi-{{ $item['icon'] }} display-4 text-success mb-3"></i>
                                    <h3>{{ $item['value'] }}</h3>
                                    <p class="mb-0">{{ $item['label'] }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!-- Perangkat Desa Section -->
    <section id="perangkat" class="py-5 mb-5">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="section-title">Perangkat Desa</h2>
                <p class="lead">Kenali tim yang mengelola pemerintahan desa kami</p>
            </div>

            <div class="row justify-content-center">
                @forelse ($perangkat as $p)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-img-top team-img" style="background-image: url('{{ asset('storage/' . $p->foto) }}'); height: 300px; background-size: cover; background-position: center;"></div>
                        <div class="card-body text-center">
                            <h5 class="card-title mb-1">{{ $p->nama }}</h5>
                            <p class="text-muted small">{{ $p->jabatan }}</p>
                            <div class="d-flex justify-content-center">
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $p->kontak) }}" target="_blank" class="btn btn-sm btn-outline-success mx-1">
                                    <i class="bi bi-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <p>Belum ada data perangkat desa.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Produk Unggulan -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Produk Unggulan Desa</h2>
            <p class="lead">Berbagai produk lokal unggulan dari masyarakat desa kami</p>
        </div>

        <div class="row">
        @forelse ($produk as $p)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow">
                <img src="data:image/jpeg;base64,{{ $p->gambar }}" class="card-img-top" alt="{{ $p->nama_produk }}" style="max-width: 100%; height: 250px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $p->nama_produk }}</h5>
                    <p class="card-text">{{ $p->deskripsi }}</p>
                    <p class="text-success fw-bold">{{ $p->harga }}</p>
                </div>
                <div class="card-footer bg-white">
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $p->kontak) }}?text=Halo%2C%20saya%20tertarik%20dengan%20produk%20{{ urlencode($p->nama_produk) }}"
                        target="_blank"
                        class="btn btn-success w-100">
                        Hubungi via WhatsApp
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p class="text-center">Belum ada produk yang tersedia.</p>
        </div>
        @endforelse

        </div>
    </div>
</section>


</main>
@endsection
