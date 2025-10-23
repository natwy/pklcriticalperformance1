<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kontak - Critical Performance</title>
@vite('resources/css/app.css')

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;800&family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<style>
/* === BODY & GLOBAL === */
body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    color: #fff;
    background: #000;
    text-align: center;
}

.logo-background {
    position: fixed;
    top: 50%;
    left: 50%;
    width: 1200px;
    opacity: 0.08;
    transform: translate(-50%, -50%) scale(1);
    z-index: 0;
    pointer-events: none;
    filter: brightness(1.4) contrast(1.1) drop-shadow(0 0 10px #e63946);
    animation: fadeZoom 6s ease-in-out forwards, breathing 10s ease-in-out infinite;
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
    font-family: 'Orbitron', sans-serif;
    font-size: 2rem;
    color: #fff;
    margin: 0;
}

//* === NAVBAR === */
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
    margin-top: 15px; /* biar center */
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

/* === MAIN CONTENT === */
main {
    max-width: 900px;
    margin: 60px auto 80px;
    text-align: center;
    position: relative;
    z-index: 5;
}

/* Headings */
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

h3 {
    font-family: 'Orbitron', sans-serif;
    color: #ff4040;
    margin-top: 25px;
    margin-bottom: 10px;
}

/* Contact Cards */
.contact-links {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
    margin-top: 40px;
}

.contact-card {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    padding: 15px 25px;
    border-radius: 10px;
    font-size: 18px;
    font-weight: bold;
    color: #fff;
    text-decoration: none;
    width: 280px;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.contact-card.whatsapp { background-color: #25D366; }
.contact-card.email { background-color: #e63946; }
.contact-card.instagram { background: linear-gradient(45deg, #fd1d1d, #833ab4); }

.contact-card:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 15px rgba(0,0,0,0.3);
}

/* Garansi */
.garansi {
    margin-top: 50px;
}

.garansi a {
    display: inline-block;
    margin-top: 15px;
    padding: 12px 25px;
    background-color: #e63946;
    color: #fff;
    text-decoration: none;
    border-radius: 8px;
    font-weight: bold;
    transition: 0.2s;
}

.garansi a:hover {
    background-color: #c72c36;
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
main, h2, h3, p, .contact-card, .garansi {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.8s ease, transform 0.8s ease;
}

.visible { opacity:1 !important; transform: translateY(0) !important; }

/* RESPONSIVE */
@media (max-width: 768px) {
    nav { flex-direction: column; }
    .nav-container { gap: 15px; }
    main { margin: 40px 15px 60px; }
    .contact-card { width: 100%; }
}
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
    <h2>Hubungi Kami</h2>

    <div class="contact-links">
        <a href="https://wa.me/6285157917442?text=Halo,%20saya%20ingin%20bertanya" target="_blank" class="contact-card whatsapp">
            <i class="fab fa-whatsapp"></i> WhatsApp
        </a>
        <a href="mailto:criticalperformance@gmail.com" class="contact-card email">
            <i class="fas fa-envelope"></i> Email
        </a>
        <a href="https://www.instagram.com/critical.performance14/" target="_blank" class="contact-card instagram">
            <i class="fab fa-instagram"></i> Instagram
        </a>
    </div>

    <div class="garansi">
        <h3>Ada ingin klaim garansi?</h3>
        <a href="{{ url('/garansi') }}">Klik disini untuk klaim garansi mu!</a>
    </div>
</main>

<footer>
    &copy; 2025 Critical Performance. All rights reserved.
</footer>

<script>
function fadeIn() {
    const elements = document.querySelectorAll('main, h2, h3, p, .contact-card, .garansi');
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
