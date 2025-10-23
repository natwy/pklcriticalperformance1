<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Galeri | Critical Performance</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;800&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
/* === DASAR === */
body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    color: #fff;
    background: #000;
    text-align: center;
}

/* === NAVBAR (disamakan dengan Garansi) === */
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
    margin-top: 15px;
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

/* === HEADER === */
header {
    margin-top: 10px;
    margin-bottom: 20px;
}
header h1 {
    font-family: 'Orbitron', sans-serif;
    font-size: 2rem;
    margin: 0;
    color: #fff;
}

/* === LOGO LATAR BELAKANG === */
.logo-background {
    position: fixed;
    top: 50%;
    left: 50%;
    width: 1200px;
    opacity: 0.03;
    transform: translate(-50%, -50%) scale(1);
    z-index: 0;
    pointer-events: none;
    filter: brightness(1.2) contrast(1) drop-shadow(0 0 5px #e63946);
    animation: fadeZoom 6s ease-in-out forwards, breathing 10s ease-in-out infinite;
}
@keyframes fadeZoom {
    0% { opacity: 0; transform: translate(-50%, -50%) scale(0.9); filter: blur(3px); }
    100% { opacity: 0.03; transform: translate(-50%, -50%) scale(1); filter: blur(0); }
}
@keyframes breathing {
    0%,100% { transform: translate(-50%, -50%) scale(1); }
    50% { transform: translate(-50%, -50%) scale(1.05); }
}

/* === KONTEN GALERI === */
section#dokumentasi h2,
h2 {
    font-family: 'Orbitron', sans-serif;
    font-size: 2rem;
    color: #fff;
    letter-spacing: 1px;
    margin-bottom: 25px;
    text-transform: uppercase;
    text-align: center;
}

footer {
    padding: 20px;
    background: rgba(0,0,0,0.8);
    margin-top: 40px;
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

<!-- ===== FOTO & GALERI ===== -->
<section id="dokumentasi">
    <h2>💨 Dokumentasi Pengerjaan 💨</h2>
    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; max-width: 900px; margin: auto;">
        <img src="{{ asset('images/galeri 2.jpg') }}" alt="galeri 1"
            style="width: 250px; height: 380px; object-fit: cover; border: 3px solid #fff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.5);">
        <img src="{{ asset('images/galeri 3.jpg') }}" alt="galeri 2"
            style="width: 250px; height: 380px; object-fit: cover; border: 3px solid #fff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.5);">
        <img src="{{ asset('images/galeri 4.jpg') }}" alt="galeri 3"
            style="width: 250px; height: 380px; object-fit: cover; border: 3px solid #fff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.5);">
        <img src="{{ asset('images/galeri 5.jpg') }}" alt="galeri 4"
            style="width: 250px; height: 380px; object-fit: cover; border: 3px solid #fff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.5);">
        <img src="{{ asset('images/galeri 6.jpg') }}" alt="galeri 5"
            style="width: 250px; height: 380px; object-fit: cover; border: 3px solid #fff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.5);">
        <img src="{{ asset('images/galeri 1.jpg') }}" alt="galeri 6"
            style="width: 250px; height: 380px; object-fit: cover; border: 3px solid #fff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.5);">
    </div>
</section>

<h2>💸 TestiMoney 💸</h2>
<div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; max-width: 900px; margin: auto;">
    <img src="{{ asset('images/testimoney 9.jpg') }}" alt="Testimoney"
        width="280" height="40"
        style="border: 4px solid #fff; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.6);">
    <img src="{{ asset('images/testimoney 10.jpg') }}" alt="Testimoney"
        width="280" height="240"
        style="border: 4px solid #fff; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.6);">
    <img src="{{ asset('images/testimoney 11.jpg') }}" alt="Testimoney"
        width="280" height="240"
        style="border: 4px solid #fff; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.6);">
    <img src="{{ asset('images/testimoney 6.jpg') }}" alt="Testimoney"
        style="width: 460px !important; height: 470px !important; object-fit: cover; border: 4px solid #fff; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.6);">
    <img src="{{ asset('images/testimoney 7.jpg') }}" alt="Testimoney"
        width="460" height="240"
        style="border: 4px solid #fff; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.6);">
    <img src="{{ asset('images/testimoney 8.jpg') }}" alt="Testimoney"
        width="460" height="240"
        style="border: 4px solid #fff; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.6);">
</div>

<footer>
    <p>&copy; 2025 Critical Performance. All rights reserved.</p>
</footer>
</body>
</html>
