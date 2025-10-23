<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Booking - Critical Performance</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;800&family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        /* === DASAR === */
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            color: #fff;
            background: #000;
        }

        h1, h2 {
            font-family: 'Orbitron', sans-serif;
            letter-spacing: 1px;
        }

        h2 {
            text-align: center;
            font-size: 2rem;
            color: #fff;
            margin-bottom: 25px;
            text-transform: uppercase;
        }

        /* === NAVBAR === */
        nav {
            background: #000;
            border-bottom: 2px solid #e63946;
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 14px 0;
        }
        .nav-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 28px;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            letter-spacing: 0.3px;
            position: relative;
            transition: color 0.3s ease;
            padding-bottom: 4px;
        }
        nav a::after {
            content: "";
            position: absolute;
            width: 0%;
            height: 2px;
            left: 50%;
            bottom: 0;
            background: #e63946;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        nav a:hover {
            color: #e63946;
        }
        nav a:hover::after {
            width: 50%;
        }

        .btn-auth {
            background: #e63946;
            color: white !important;
            padding: 8px 16px;
            border-radius: 10px;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn-auth:hover {
            background: #ff4040;
            transform: scale(1.05);
        }

        /* === BACKGROUND LOGO === */
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
        }

        /* === FORM WRAPPER === */
        main {
            position: relative;
            z-index: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 40px 20px;
        }
        .form-wrapper {
            background: linear-gradient(135deg, #e63946, #000);
            padding: 3px;
            border-radius: 1rem;
            width: 100%;
            max-width: 550px;
        }
        .form-content {
            background: #fff;
            border-radius: 0.9rem;
            padding: 2rem;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
            color: #111827;
        }
        label { color: #111827; font-weight: 600; }
        .form-input, .form-select {
            width: 100%;
            border: 1px solid #000;
            border-radius: 0.4rem;
            padding: 0.75rem 0.2rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            color: #111827;
        }
        .form-input:focus, .form-select:focus {
            outline: none;
            border-color: #e63946;
            box-shadow: 0 0 8px rgba(230, 57, 70, 0.5);
        }
        .btn-submit {
            width: 100%;
            background: #e63946;
            color: white;
            font-weight: bold;
            padding: 0.75rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }
        .btn-submit:hover {
            background: #ff4040;
            transform: scale(1.05);
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            text-align: center;
        }

        footer {
            padding: 20px;
            background: rgba(0,0,0,0.8);
            text-align: center;
            font-size: 14px;
            color: #ccc;
        }
    </style>
</head>

<body>
    <img src="{{ asset('images/DANIELAYAL_CRITICAL.png') }}" alt="Logo Critical Performance" class="logo-background">

    <header>
        <h1><i class="fas fa-wrench"></i> Critical Performance</h1>
        <nav>
            <div class="nav-container">
                <a href="{{ url('/') }}">Beranda</a>
                <a href="{{ url('/tentang') }}">Tentang Kami</a>
                <a href="{{ url('/lokasi') }}">Lokasi</a>
                <a href="{{ url('/kontak') }}">Kontak</a>
                <a href="{{ url('/galeri') }}">Galeri</a>
                <a href="{{ url('/garansi') }}">Garansi</a>
                <a href="{{ url('/booking') }}">Booking</a>

                @auth
                    <a href="/dashboard" class="btn-auth">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn-auth">Login</a>
                @endauth
            </div>
        </nav>
    </header>

    <main>
        <div class="form-wrapper">
            <div class="form-content">
                @if(session('success'))
                    <div class="alert-success">{{ session('success') }}</div>
                @endif

                <h2>Form Booking</h2>

                <form action="{{ route('booking.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="nama">Nama Pemesan</label>
                        <input type="text" name="nama" id="nama" class="form-input" required>
                    </div>

                    <div>
                        <label for="no_hp">Nomor Handphone</label>
                        <input type="tel" name="no_hp" id="no_hp" class="form-input" required>
                    </div>

                    <div>
                        <label for="jasa">Jenis Jasa</label>
                        <select name="jasa" id="jasa" class="form-select" required>
                            <option value="">-- Pilih Jasa --</option>
                            <option value="Remap ECU Standar Honda">Remap ECU Standar Honda</option>
                            <option value="Remap ECU BRT">Remap ECU BRT (Bintang Racing Team)</option>
                            <option value="Service Harian">Service Harian</option>
                            <option value="Pembuatan Pully Custom">Pembuatan Pully Custom</option>
                            <option value="BoreUp">BoreUp</option>
                            <option value="Porting & Polish">Porting & Polish</option>
                        </select>
                    </div>

                    <div>
                        <label for="tgl_pemesanan">Tanggal Pemesanan <span style="color:#666; font-size:0.85rem;">*Tanggal Hari Ini</span></label>
                        <input type="date" name="tgl_pemesanan" id="tgl_pemesanan" class="form-input" required>
                    </div>

                    <div>
                        <label for="tgl_kedatangan">Tanggal Kedatangan</label>
                        <input type="date" name="tgl_kedatangan" id="tgl_kedatangan" class="form-input" required>
                    </div>

                    <button type="submit" class="btn-submit">Booking Sekarang</button>
                </form>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2025 Critical Performance. All rights reserved.</p>
    </footer>
</body>
</html>
