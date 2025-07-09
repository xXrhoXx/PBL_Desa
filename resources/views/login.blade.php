<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    @include('layouts.navbar')

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <h3 class="text-center mb-4 text-success">Login</h3>
            <form id="loginForm">
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control" id="nik" value="123456" placeholder="Masukkan NIK" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <input type="password" class="form-control" id="password" value="123456" placeholder="Masukkan Password" required>
                </div>
                <button type="submit" class="btn btn-success w-100" >Login</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            const nik = document.getElementById('nik').value;
            const password = document.getElementById('password').value;

            const url = `http://127.0.0.1:8000/api/login?nik=${encodeURIComponent(nik)}&password=${encodeURIComponent(password)}`;
            const response = await fetch(url, {
                method: 'POST',
            });

            const data = await response.json();

            if (response.ok && data.token) {
                document.cookie = `token=${data.token}; path=/; max-age=86400`;
                document.cookie = `role=${data.user.isAdmin}`;
                alert('Login berhasil! Token disimpan di cookie.');
                console.log('Token:', data.token);
                window.location.href = '/'; // <-- Redirect ke halaman /
            } else {
                alert('Login gagal: ' + (data.message || 'Unknown error'));
            }
        });
    </script>

    @include('layouts.footer')
</body>

</html>
