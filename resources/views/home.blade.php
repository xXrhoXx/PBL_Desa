@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Informasi Desa</h1>
    <section id="perangkat" class="py-5 mb-5">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="section-title">Perangkat Desa</h2>
                    <p class="lead">Kenali tim yang mengelola pemerintahan desa kami</p>
                </div>
                
                <div class="row justify-content-center">
                    <!-- Anggota 1 -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-img-top team-img" style="background-image: url('https://via.placeholder.com/400x400');"></div>
                            <div class="card-body text-center">
                                <h5 class="card-title mb-1">Asep Saefullah</h5>
                                <p class="text-muted small">Kepala Desa</p>
                                <div class="d-flex justify-content-center">
                                    <a href="#" class="btn btn-sm btn-outline-secondary mx-1"><i class="bi bi-envelope"></i></a>
                                    <a href="#" class="btn btn-sm btn-outline-primary mx-1"><i class="bi bi-telephone"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Anggota 2 -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-img-top team-img" style="background-image: url('https://via.placeholder.com/400x400');"></div>
                            <div class="card-body text-center">
                                <h5 class="card-title mb-1">Aulia Naresti</h5>
                                <p class="text-muted small">Sekretaris Desa</p>
                                <div class="d-flex justify-content-center">
                                    <a href="#" class="btn btn-sm btn-outline-secondary mx-1"><i class="bi bi-envelope"></i></a>
                                    <a href="#" class="btn btn-sm btn-outline-primary mx-1"><i class="bi bi-telephone"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Anggota 3 -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-img-top team-img" style="background-image: url('https://via.placeholder.com/400x400');"></div>
                            <div class="card-body text-center">
                                <h5 class="card-title mb-1">Nabila Aminatun</h5>
                                <p class="text-muted small">Bendahara Desa</p>
                                <div class="d-flex justify-content-center">
                                    <a href="#" class="btn btn-sm btn-outline-secondary mx-1"><i class="bi bi-envelope"></i></a>
                                    <a href="#" class="btn btn-sm btn-outline-primary mx-1"><i class="bi bi-telephone"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Anggota 4 -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-img-top team-img" style="background-image: url('https://via.placeholder.com/400x400');"></div>
                            <div class="card-body text-center">
                                <h5 class="card-title mb-1">Bintang Shallahudin</h5>
                                <p class="text-muted small">Kasi Pemerintahan</p>
                                <div class="d-flex justify-content-center">
                                    <a href="#" class="btn btn-sm btn-outline-secondary mx-1"><i class="bi bi-envelope"></i></a>
                                    <a href="#" class="btn btn-sm btn-outline-primary mx-1"><i class="bi bi-telephone"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Anggota 5 -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-img-top team-img" style="background-image: url('https://via.placeholder.com/400x400');"></div>
                            <div class="card-body text-center">
                                <h5 class="card-title mb-1">David Aditya</h5>
                                <p class="text-muted small">Kasi Kesejahteraan</p>
                                <div class="d-flex justify-content-center">
                                    <a href="#" class="btn btn-sm btn-outline-secondary mx-1"><i class="bi bi-envelope"></i></a>
                                    <a href="#" class="btn btn-sm btn-outline-primary mx-1"><i class="bi bi-telephone"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Anggota 6 -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-img-top team-img" style="background-image: url('https://via.placeholder.com/400x400');"></div>
                            <div class="card-body text-center">
                                <h5 class="card-title mb-1">Daffa Hafid</h5>
                                <p class="text-muted small">Kasi Pelayanan</p>
                                <div class="d-flex justify-content-center">
                                    <a href="#" class="btn btn-sm btn-outline-secondary mx-1"><i class="bi bi-envelope"></i></a>
                                    <a href="#" class="btn btn-sm btn-outline-primary mx-1"><i class="bi bi-telephone"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection