<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container-fluid">
            <a class="navbar-brand text-white fw-bold" href="#">Admin</a>
            <div class="d-flex ms-auto">
                <a href="{{ route('logout') }}" class="btn btn-outline-light">Logout</a>
            </div>
        </div>
    </nav>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="bg-white border-end" style="width: 200px; min-height: 100vh;">
            <ul class="nav flex-column p-3">
                <li class="nav-item mb-2">
                    <a class="nav-link text-dark" href="{{ route('admin.profil') }}">Profil Desa</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-dark" href="{{ route('admin.berita') }}">Berita</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-dark" href="{{ route('admin.perangkat') }}">Perangkat Desa</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-dark" href="{{ route('admin.produk') }}">Produk</a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="p-4 w-100">
            @yield('content')
        </div>
    </div>

</body>
</html>
