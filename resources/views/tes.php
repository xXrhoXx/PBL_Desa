<!DOCTYPE html>
<html>

<head>
    <title>Login API Test</title>
</head>

<body>
    <h2>Login Form</h2>
    <form id="loginForm">
        <input type="email" id="email" value="sugi@gmail.com" placeholder="Email" required><br>
        <input type="password" id="password" value="123" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>

    <script>
        document.getElementById('loginForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            const response = await fetch('http://127.0.0.1:8080/api/auth/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    email,
                    password
                })
            });

            const data = await response.json();

            if (response.ok && data.access_token) {
                // Simpan token ke dalam cookie
                document.cookie = `token=${data.access_token}; path=/; max-age=86400`; // berlaku 1 hari
                alert('Login berhasil! Token disimpan di cookie.');
                console.log('Token:', data.access_token);
            } else {
                alert('Login gagal: ' + (data.message || 'Unknown error'));
            }
            // console.log(data);
            // alert(JSON.stringify(data));
        });
    </script>
</body>

</html>