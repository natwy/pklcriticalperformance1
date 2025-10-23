<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Critical Performance</title>
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
    line-height: 1.6;
}

/* === NAVBAR === */
nav {
    background: #000;
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
    border-bottom: 2px solid #e63946; /* pindahkan garis ke sini */
    padding-bottom: 10px;
    width: fit-content;
    margin: 0 auto; /* biar center */
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


/* === LOGO LATAR BELAKANG === */
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

@keyframes fadeZoom {
    0% { opacity: 0; transform: translate(-50%, -50%) scale(0.9); filter: blur(3px); }
    100% { opacity: 0.08; transform: translate(-50%, -50%) scale(1); filter: blur(0); }
}

@keyframes breathing {
    0%,100% { transform: translate(-50%, -50%) scale(1); }
    50% { transform: translate(-50%, -50%) scale(1.05); }
}

/* === HEADER === */
header {
    text-align: center;
    padding: 10px 10px 5px;
    position: relative;
    z-index: 1;
}

header h1 {
    font-size: 2rem;
    color: #fff;
    letter-spacing: 1px;
    margin: 0;
}

/* === MAIN CONTENT === */
main {
    padding: 60px 30px;
    max-width: 900px;
    margin: 40px auto 60px;
    background: rgba(20,20,20,0.75);
    border-radius: 16px;
    box-shadow: 0 0 25px rgba(230, 57, 70, 0.25);
    text-align: left;
    color: #e1e0e0;
    position: relative;
    z-index: 1;
}

h2 {
    font-family: 'Orbitron', sans-serif;
    color: #ff4040;
    font-size: 2.3rem;
    font-weight: 700;
    letter-spacing: 2px;
    margin-bottom: 25px;
    border-bottom: 3px solid #ff4040;
    display: inline-block;
    padding-bottom: 6px;
}

p {
    margin-bottom: 20px;
}

strong { color: #fff; }
em { color: #f87171; font-style: italic; }

blockquote {
    border-left: 4px solid #e63946;
    padding-left: 15px;
    font-style: italic;
    color: #f1f1f1;
    margin-top: 35px;
    font-size: 1.1rem;
}

/* FOOTER */
footer {
    padding: 25px 0;
    
    color: #aaa;
    font-size: 0.9rem;
    text-align: center;
    margin-top: 60px;
}

/* ANIMASI SCROLL */
main, h2, p, blockquote {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.8s ease, transform 0.8s ease;
}
.visible { opacity:1 !important; transform: translateY(0) !important; }

</style>
</head>
<body>

<img src="{{ asset('images/DANIELAYAL_CRITICAL.png') }}" alt="Logo Critical Performance" class="logo-background">

<header>
    <h1><i class="fas fa-wrench"></i> Critical Performance</h1>
</header>

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

<main>
    <h2>TENTANG CRITICAL PERFORMANCE</h2>

    <p>
        <strong>Critical Performance</strong> adalah Bengkel Spesialis <em>REMAP ECU</em> yang berlokasi di 
        <strong>Kecamatan Rajeg, Kabupaten Tangerang</strong>. Kami melayani berbagai jenis REMAP ECU seperti 
        <strong>Honda, Aracer, Apitech,</strong> dan <strong>BRT</strong>.
    </p>

    <p>
        Selain Remap, kami juga melayani <strong>Service Berkala</strong>, Sistem Injeksi, Karburator, 
        dan Modifikasi Mesin untuk berbagai Jenis Motor.
    </p>

    <p>
        Dengan pengalaman teknisi yang handal serta peralatan modern, kami berkomitmen memberikan pelayanan terbaik 
        demi performa motor yang optimal.
    </p>

    <p>
        Kepuasan pelanggan adalah prioritas kami. Kami terbuka untuk konsultasi seputar tuning dan perawatan motor Anda.
    </p>

    <blockquote>
        “Performa maksimal dimulai dari penanganan yang profesional.”
    </blockquote>
</main>

<footer>
    &copy; 2025 Critical Performance. All rights reserved.
</footer>

<script>
function fadeIn() {
    const elements = document.querySelectorAll('main, h2, p, blockquote');
    const windowBottom = window.innerHeight + window.scrollY;
    elements.forEach(el => {
        if(el.offsetTop < windowBottom - 50) {
            el.classList.add('visible');
        }
    });
}
window.addEventListener('scroll', fadeIn);
window.addEventListener('load', fadeIn);
</script>

</body>
</html>
