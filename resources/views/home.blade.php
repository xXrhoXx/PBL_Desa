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
                    <a href="#tentang" class="btn btn-primary btn-lg me-2">Tentang Kami</a>
                    <a href="#perangkat" class="btn btn-outline-primary btn-lg">Perangkat Desa</a>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('img/dekorasi.jpg') }}" alt="Dekorasi Desa" class="img-fluid rounded shadow-lg">
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
                    <a href="{{ route('informasi') }}" class="btn btn-primary mt-3">Selengkapnya</a>
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
                @php
                    $perangkat = [
                        ['nama' => 'Asep Saefullah', 'jabatan' => 'Kepala Desa'],
                        ['nama' => 'Aulia Naresti', 'jabatan' => 'Sekretaris Desa'],
                        ['nama' => 'Nabila Aminatun', 'jabatan' => 'Bendahara Desa'],
                        ['nama' => 'Bintang Shallahudin', 'jabatan' => 'Kasi Pemerintahan'],
                        ['nama' => 'David Aditya', 'jabatan' => 'Kasi Kesejahteraan'],
                        ['nama' => 'Daffa Hafid', 'jabatan' => 'Kasi Pelayanan'],
                    ];
                @endphp

                @foreach($perangkat as $anggota)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-img-top team-img" style="background-image: url('https://via.placeholder.com/400x400'); height: 300px; background-size: cover; background-position: center;"></div>
                        <div class="card-body text-center">
                            <h5 class="card-title mb-1">{{ $anggota['nama'] }}</h5>
                            <p class="text-muted small">{{ $anggota['jabatan'] }}</p>
                            <div class="d-flex justify-content-center">
                                <a href="#" class="btn btn-sm btn-outline-secondary mx-1"><i class="bi bi-envelope"></i></a>
                                <a href="#" class="btn btn-sm btn-outline-primary mx-1"><i class="bi bi-telephone"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
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
                @for($i = 1; $i <= 6; $i++)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Produk {{ $i }}">
                        <div class="card-body">
                            <h5 class="card-title">Produk Desa {{ $i }}</h5>
                            <p class="card-text">Deskripsi produk {{ $i }}. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <p class="text-success fw-bold">Rp {{ number_format(rand(10000, 100000), 0, ',', '.') }}</p>
                        </div>
                        <div class="card-footer bg-white">
                            <button class="btn btn-success w-100">Pesan Sekarang</button>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </section>

</main>

@endsection
