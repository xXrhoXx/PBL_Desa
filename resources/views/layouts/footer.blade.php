<!-- Footer -->
<footer class="bg-dark text-white py-4 mt-4">
    <div class="container">
        <div class="row">
            <!-- Tentang Desa -->
            <div class="col-md-4 mb-4 mb-md-0">
                <h5>Tentang Desa Kita</h5>
                <p>
                    Desa yang maju dengan masyarakat yang sejahtera dan berbudaya,
                    mengedepankan gotong royong dan kearifan lokal.
                </p>
            </div>

            <!-- Kontak Kami -->
            <div class="col-md-4 mb-4 mb-md-0">
                <h5>Kontak Kami</h5>
                <ul class="list-unstyled">
                    <li><i class="bi bi-geo-alt"></i> Jl. Desa No. 123, Kecamatan, Kabupaten</li>
                    <li><i class="bi bi-telephone"></i> (021) 12345678</li>
                    <li><i class="bi bi-envelope"></i> info@desakita.id</li>
                </ul>
            </div>

            <!-- Link Cepat -->
            <div class="col-md-4">
                <h5>Link Cepat</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('home') }}" class="text-white text-decoration-none">Beranda</a></li>
                    <li><a href="{{ route('berita') }}" class="text-white text-decoration-none">Berita</a></li>
                    <li><a href="{{ route('produk') }}" class="text-white text-decoration-none">Produk</a></li>
                    <li><a href="{{ route('informasi') }}" class="text-white text-decoration-none">Informasi</a></li>
                    <li><a href="{{ route('login') }}" class="text-white text-decoration-none">Login</a></li>
                </ul>
            </div>
        </div>

        <hr class="my-4">

        <!-- Copyright -->
        <div class="text-center">
            <p class="mb-0">&copy; {{ date('Y') }} Website Desa Kita. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
