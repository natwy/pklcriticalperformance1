<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Critical Performance</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fff;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .reset-container {
            background-color: #000;
            padding: 40px;
            border-radius: 10px;
            width: 350px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #fff;
        }

        label {
            display: block;
            text-align: left;
            margin: 10px 0 5px;
            font-weight: bold;
            color: #fff;
        }

        input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 2px solid red;
            border-radius: 5px;
            outline: none;
            font-size: 14px;
        }

        input[type="email"]:focus {
            border-color: #ff4747;
        }

        button {
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            border: none;
            background-color: red;
            color: white;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
            transition: 0.3s;
        }

        button:hover {
            background-color: #b30000;
        }

        a {
            color: #e63946;
            text-decoration: none;
            font-size: 14px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="reset-container">
        <h2>Lupa Password</h2>

        @if (session('status'))
            <p style="color: lightgreen;">{{ session('status') }}</p>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <label for="email">Masukkan Email</label>
            <input id="email" type="email" name="email" placeholder="contoh@email.com" required>

            @error('email')
                <p style="color: #ff4d4d; font-size: 13px;">{{ $message }}</p>
            @enderror

            <button type="submit">Kirim Link Reset</button>
        </form>

        <div style="margin-top: 20px;">
            <a href="{{ route('login') }}">Kembali ke Login</a>
        </div>
    </div>

</body>
</html>
