@extends('layouts.app')

@section('title', 'Kontak Kami')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="mb-4">Hubungi Kami</h1>
            
            <form>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Subjek</label>
                    <input type="text" class="form-control" id="subject" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Pesan</label>
                    <textarea class="form-control" id="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim Pesan</button>
            </form>
        </div>
        <div class="col-md-6">
            <div class="card mt-md-0 mt-4">
                <div class="card-body">
                    <h5 class="card-title">Informasi Kontak</h5>
                    <p class="card-text">
                        <i class="bi bi-geo-alt-fill"></i> Jl. Desa No. 123, Kecamatan, Kabupaten<br>
                        <i class="bi bi-telephone-fill"></i> (021) 12345678<br>
                        <i class="bi bi-envelope-fill"></i> info@desakita.id<br>
                        <i class="bi bi-clock-fill"></i> Senin - Jumat: 08.00 - 16.00
                    </p>
                    
                    <div class="mt-4">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613507864!3d-6.194741395493371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0x6b45e839560a85ab!2sMonumen%20Nasional!5e0!3m2!1sid!2sid!4v1623394257724!5m2!1sid!2sid" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection