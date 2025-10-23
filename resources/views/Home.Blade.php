<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Critical Performance</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;800&family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<style>
/* === DASAR === */
body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    color: #fff;
    background: #000;
    text-align: center;
}

h1, h2, h3 {
    font-family: 'Orbitron', sans-serif;
    letter-spacing: 1px;
}

p {
    font-family: 'Poppins', sans-serif;
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

/* Link utama */
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

/* Garis bawah hover elegan */
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

/* Saat hover */
nav a:hover {
    color: #e63946;
}
nav a:hover::after {
    width: 50%; /* Garis tengah */
}

/* Tombol login/dashboard */
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

/* === LOGO LATAR BELAKANG (versi baru dengan animasi) === */
.logo-background {
    position: fixed;
    top: 50%;
    left: 50%;
    width: 1200px;
    opacity: 0.08;
    transform: translate(-50%, -50%) scale(1);
    z-index: 0;
    pointer-events: none;
    animation: fadeZoom 6s ease-in-out forwards, breathing 10s ease-in-out infinite;
    filter: brightness(1.4) contrast(1.1) drop-shadow(0 0 10px #e63946);
}

/* Muncul pelan dan sedikit zoom */
@keyframes fadeZoom {
    0% {
        opacity: 0;
        transform: translate(-50%, -50%) scale(0.9);
        filter: blur(3px);
    }
    100% {
        opacity: 0.08;
        transform: translate(-50%, -50%) scale(1);
        filter: blur(0);
    }
}

/* Efek bernafas lembut */
@keyframes breathing {
    0%, 100% { transform: translate(-50%, -50%) scale(1); }
    50% { transform: translate(-50%, -50%) scale(1.05); }
}

/* === BAGIAN LAIN === */
header {
    position: relative;
    z-index: 1;
}
#welcome, #layanan, #dokumentasi, #testimoney {
    position: relative;
    z-index: 1;
}

/* ANIMASI SCROLL */
#welcome h2, #welcome p, .layanan-card, #dokumentasi img, #testimoney img {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.6s ease, transform 0.6s ease;
}
.visible {
    opacity: 1 !important;
    transform: translateY(0) !important;
}

/* LAYANAN CARD */
.layanan-card {
    background: #1c1c1c;
    padding: 30px 20px;
    border-radius: 12px;
    transition: transform 0.3s ease;
    cursor: pointer;
}
.layanan-card:hover {
    transform: scale(1.05);
}

/* FOOTER */
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

<main>

    <!-- WELCOME SECTION -->
    <section id="welcome" style="padding: 60px 20px; border-radius: 14px; background: #111; color: #fff;">
        <h2 style="font-size: 2rem; margin-bottom: 20px;">
            Selamat Datang di
            <span style="color:#e63946;">Critical</span>
            <span style="color:#c0c0c0;">Performance</span>
        </h2>

        <p style="font-size: 18px; max-width: 800px; margin: 0 auto 15px; color: #fff; line-height: 1.6;">
            Bengkel kami hadir untuk Anda yang menginginkan performa motor terbaik.
            Dari <strong>remap ECU</strong> hingga <strong>servis berkala</strong>,
            kami siap memberikan sentuhan profesional untuk motor kesayangan.
        </p>

        <p style="font-size: 18px; max-width: 800px; margin: 0 auto; color: #fff; line-height: 1.6;">
            Temukan berbagai layanan unggulan, lihat dokumentasi kerja kami,
            dan rasakan pengalaman berbeda bersama
            <em>
                <span style="color:#e63946;">Critical</span>
                <span style="color:#c0c0c0;">Performance</span>
            </em>.
            Setiap detail kami hadirkan agar Anda semakin yakin memilih kami.
        </p>
    </section>

    <!-- LAYANAN SECTION -->
    <section id="layanan" style="padding: 50px 20px; border-radius: 14px; background: #111; color: #fff;">
        <h2 style="font-size: 2rem; margin-bottom: 30px;">Layanan Kami</h2>

        <div class="layanan-grid"
            style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 25px; max-width: 1000px; margin: 0 auto;">
            
            <div class="layanan-card">
                <i class="fas fa-microchip" style="font-size: 40px; color: #e63946; margin-bottom: 15px;"></i>
                <h3>Remap ECU</h3>
                <p style="font-size: 14px; color: #ccc;">
                    Optimasi performa motor dengan remap ECU (Honda, Aracer, BRT, Apitech).
                </p>
            </div>

            <div class="layanan-card">
                <i class="fas fa-tools" style="font-size: 40px; color: #25D366; margin-bottom: 15px;"></i>
                <h3>Servis Berkala</h3>
                <p style="font-size: 14px; color: #ccc;">
                    Perawatan rutin untuk menjaga kondisi motor tetap prima.
                </p>
            </div>

            <div class="layanan-card">
                <i class="fas fa-motorcycle" style="font-size: 40px; color: #f4a261; margin-bottom: 15px;"></i>
                <h3>Modifikasi Mesin</h3>
                <p style="font-size: 14px; color: #ccc;">
                    Upgrade mesin untuk performa maksimal sesuai kebutuhan Anda.
                </p>
            </div>

            <div class="layanan-card">
                <i class="fas fa-gas-pump" style="font-size: 40px; color: #e9c46a; margin-bottom: 15px;"></i>
                <h3>Injection & Karburator</h3>
                <p style="font-size: 14px; color: #ccc;">
                    Perbaikan dan setting injection maupun karburator agar lebih efisien.
                </p>
            </div>

        </div>
    </section>

   <!-- DOKUMENTASI SECTION -->
<section id="dokumentasi" style="padding: 60px 20px; background: transparent; color: #fff; text-align: center;">
    <h2 style="font-family: 'Orbitron', sans-serif; color: #fff; margin-bottom: 30px;">Dokumentasi Pengerjaan</h2>

    <div style="display: flex; gap: 25px; justify-content: center; flex-wrap: wrap;">
        <img src="{{ asset('images/PORTING.jpg') }}" alt="Porting"
            style="width: 280px; height: 300px; object-fit: cover; border-radius: 12px; border: 1px solid #fff; transition: transform 0.3s ease;">
        <img src="{{ asset('images/REMAP ECU.jpg') }}" alt="Remap ECU"
            style="width: 280px; height: 300px; object-fit: cover; border-radius: 12px; border: 1px solid #fff; transition: transform 0.3s ease;">
        <img src="{{ asset('images/PENGERJAAN BENGKEL.jpg') }}" alt="Pengerjaan Bengkel"
            style="width: 280px; height: 300px; object-fit: cover; border-radius: 12px; border: 1px solid #fff; transition: transform 0.3s ease;">
    </div>
</section>

<!-- TESTIMONEY SECTION -->
<section id="testimoney" style="padding: 60px 20px; background: transparent; color: #fff; text-align: center;">
    <h2 style="font-family: 'Orbitron', sans-serif; color: #fff; margin-bottom: 30px;">💸 TestiMoney 💸</h2>

    <div style="display: flex; justify-content: center; gap: 25px; flex-wrap: wrap;">
        <img src="{{ asset('images/testimoney 1.jpg') }}" alt="Testimoney"
            width="320" height="270"
            style="border-radius: 12px; object-fit: cover; border: 1px solid #fff; transition: transform 0.3s ease;">
        <img src="{{ asset('images/testimoney 5.jpg') }}" alt="Testimoney"
            width="370" height="270"
            style="border-radius: 12px; object-fit: cover; border: 1px solid #fff; transition: transform 0.3s ease;">
        <img src="{{ asset('images/testimoney 3.jpg') }}" alt="Testimoney"
            width="460" height="240"
            style="border-radius: 12px; object-fit: cover; border: 1px solid #fff; transition: transform 0.3s ease;">
    </div>

    <div style="text-align: center; margin-top: 25px;">
        <p style="font-size: 18px; color: #e1e0e0;">
            Ingin lihat lebih banyak <strong>Testimoni & Dokumentasi</strong> pelanggan kami?<br>
            Klik tombol di bawah ini untuk melihat <em>Galeri Lebih Lengkap</em> 💨
        </p>

        <a href="{{ url('/galeri') }}"
            style="display: inline-block; margin-top: 12px; padding: 10px 20px; background-color: #e63946; color: #fff; text-decoration: none; border-radius: 8px; font-weight: bold; transition: transform 0.3s ease;">
            📸 Lihat Galeri
        </a>
    </div>
</section>



</main>

<footer>
    <p>&copy; 2025 Critical Performance. All rights reserved.</p>
</footer>

<script>
function fadeInOnScroll() {
    const elements = document.querySelectorAll('#welcome h2, #welcome p, .layanan-card, #dokumentasi img, #testimoney img');
    const windowBottom = window.innerHeight + window.scrollY;
    elements.forEach(el => {
        if (el.offsetTop + 50 < windowBottom) {
            el.classList.add('visible');
        }
    });
}
window.addEventListener('scroll', fadeInOnScroll);
window.addEventListener('load', fadeInOnScroll);
</script>

</body>
</html>
