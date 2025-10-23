<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register - Critical Performance</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600;800&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: #000;
            font-family: 'Poppins', sans-serif;
            color: #fff;
            overflow: hidden;
        }

        /* === LOGO LATAR BELAKANG === */
        .logo-background {
            position: fixed;
            top: 50%;
            left: 50%;
            width: 1000px;
            opacity: 0.08;
            transform: translate(-50%, -50%);
            z-index: 0;
            pointer-events: none;
            filter: brightness(1.4) contrast(1.1) drop-shadow(0 0 10px #e63946);
            animation: breathing 10s ease-in-out infinite;
        }

        @keyframes breathing {
            0%, 100% { transform: translate(-50%, -50%) scale(1); }
            50% { transform: translate(-50%, -50%) scale(1.05); }
        }

        /* === KARTU REGISTER === */
        .card {
            background: rgba(0, 0, 0, 0.85);
            padding: 40px 35px;
            border-radius: 14px;
            color: #fff;
            width: 380px;
            z-index: 1;
            position: relative;
            border: 1.5px solid #e63946;
            box-shadow: 0 0 25px rgba(230, 57, 70, 0.25);
            backdrop-filter: blur(6px);
        }

        .card h2 {
            font-family: 'Orbitron', sans-serif;
            text-align: center;
            margin-bottom: 25px;
            letter-spacing: 1px;
            color: #e63946;
            text-shadow: 0 0 10px rgba(230, 57, 70, 0.4);
        }

        label {
            display: block;
            font-weight: 600;
            margin-top: 12px;
            color: #ddd;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 2px solid #e63946;
            border-radius: 8px;
            background: #111;
            color: #fff;
            font-size: 14px;
            outline: none;
            transition: 0.3s;
        }

        input:focus {
            border-color: #ff4747;
            box-shadow: 0 0 8px rgba(230, 57, 70, 0.6);
        }

        /* === INPUT TERISI ATAU SHOW PASSWORD === */
        .filled,
        .showing {
            background: #fff !important;
            color: #000 !important;
            border-color: #e63946 !important;
            box-shadow: 0 0 10px rgba(230, 57, 70, 0.6);
            transition: 0.3s ease;
        }

        /* === WRAPPER PASSWORD === */
        .password-wrapper {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #e63946;
            transition: 0.3s;
        }

        .toggle-password:hover {
            color: #ff4747;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #e63946;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 20px;
            font-size: 15px;
            transition: 0.3s;
            font-family: 'Poppins', sans-serif;
        }

        button:hover {
            background: #ff4040;
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(255, 64, 64, 0.5);
        }

        .link {
            text-align: center;
            margin-top: 18px;
        }

        .link a {
            color: #e63946;
            text-decoration: none;
            font-weight: 600;
        }

        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <img src="{{ asset('images/DANIELAYAL_CRITICAL.png') }}" alt="Logo Critical Performance" class="logo-background">

    <div class="card">
        <h2><i class="fas fa-user-plus"></i> Buat Akun Baru</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <label>Nama</label>
            <input type="text" id="name" name="name" required>

            <label>Email</label>
            <input type="email" id="email" name="email" required>

            <label>Password</label>
            <div class="password-wrapper">
                <input type="password" id="password" name="password" required>
                <i class="fa-solid fa-eye toggle-password" data-target="password"></i>
            </div>

            <label>Konfirmasi Password</label>
            <div class="password-wrapper">
                <input type="password" id="password_confirmation" name="password_confirmation" required>
                <i class="fa-solid fa-eye toggle-password" data-target="password_confirmation"></i>
            </div>

            <button type="submit">Daftar</button>
        </form>

        <div class="link">
            <a href="{{ route('login') }}">Sudah punya akun? Login</a>
        </div>
    </div>

    <script>
        // === LOGIKA SHOW/HIDE PASSWORD ===
        const toggles = document.querySelectorAll('.toggle-password');

        toggles.forEach(toggle => {
            toggle.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const input = document.getElementById(targetId);
                const isPassword = input.getAttribute('type') === 'password';
                input.setAttribute('type', isPassword ? 'text' : 'password');
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');

                if (isPassword) {
                    input.classList.add('showing');
                } else {
                    input.classList.remove('showing');
                }
            });
        });

        // === LOGIKA INPUT TERISI JADI PUTIH ===
        const inputs = document.querySelectorAll('input[type="text"], input[type="email"]');

        inputs.forEach(input => {
            input.addEventListener('input', () => {
                if (input.value.trim() !== "") {
                    input.classList.add('filled');
                } else {
                    input.classList.remove('filled');
                }
            });
        });
    </script>

</body>
</html>
