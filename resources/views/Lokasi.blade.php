<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lokasi Bengkel - Critical Performance</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])
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
    z-index: 10;
}

header h1 {
    font-family: 'Orbitron', sans-serif;
    font-size: 2rem;
    color: #fff;
    margin: 0;
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


/* === MAIN CONTENT === */
main {
    padding: 60px 30px;
    max-width: 900px;
    margin: 40px auto 60px;
    text-align: left;
    color: #e1e0e0;
    position: relative;
    z-index: 5;
    background: transparent; /* hilangkan bayangan hitam */
    box-shadow: none; /* hilangkan bayangan */
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
    font-size: 2.3rem;
    font-weight: 700;
    letter-spacing: 2px;
    margin-bottom: 25px;
    border-bottom: 3px solid #ff4040;
    display: inline-block;
    padding-bottom: 6px;
}

/* Buttons */
a.button-contact {
    width: 200px;
    text-align: center;
    padding: 12px;
    color: #fff;
    text-decoration: none;
    border-radius: 8px;
    font-weight: 600;
    transition: 0.3s;
    display: inline-block;
}

a.button-contact:hover {
    transform: scale(1.05);
}

/* === MAP STYLING === */
.map-container iframe {
    width: 100%;
    height: 450px;
    border: 0;
    border-radius: 12px;
    box-shadow: 0 0 20px rgba(230, 57, 70, 0.25);
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
main, h2, h3, p {
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
    a.button-contact { width: 100%; }
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
    <h2>📍 Lokasi Bengkel Kami</h2>
    <p>Bengkel Critical Performance dapat kamu temukan di lokasi berikut:</p>

    <div class="map-container" style="margin: 20px 0;">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15868.112356658436!2d106.52513199764422!3d-6.126922401756269!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e41ff56c3f042f3%3A0xa8ccbac2d1d1e815!2sREMAP%20ECU%20HONDA%20(%20CRITICAL%20PERFORMANCE)!5e0!3m2!1sen!2sid!4v1753345113882!5m2!1sen!2sid"
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>

    <div>
        <h3>📌 Alamat</h3>
        <p>Griya Artha Rajeg Blok J5/4, Kabupaten Tangerang, Banten 15540</p>
    </div>
    
    <div style="margin-top:30px;">
        <h2>Hubungi Kami</h2>
        <div style="display:flex; gap:15px; flex-wrap:wrap;">
            <a href="https://wa.me/6285157917442?text=Halo,%20saya%20ingin%20Bertanya" target="_blank" class="button-contact" style="background:#25D366;">WhatsApp</a>
            <a href="mailto:criticalperformance@email.com" target="_blank" class="button-contact" style="background:#ff4b4b;">Email</a>
            <a href="https://instagram.com/critical.performance14" target="_blank" class="button-contact" style="background:linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888);">Instagram</a>
        </div>
    </div>
</main>

<footer>
    &copy; 2025 Critical Performance. All rights reserved.
</footer>

<script>
function fadeIn() {
    const elements = document.querySelectorAll('main, h2, h3, p');
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
