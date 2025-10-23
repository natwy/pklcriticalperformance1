<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Critical Performance</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        <h1>🔧 Critical Performance</h1>
        <nav>
            <a href="{{ url('/') }}">Beranda</a>
            <a href="{{ url('/tentang') }}">Tentang Kami</a>
            <a href="{{ url('/lokasi') }}">Lokasi</a>
            <a href="{{ url('/kontak') }}">Kontak</a>
            <a href="{{ url('/galeri') }}">Galeri</a>
            <a href="{{ url('/garansi') }}">Garansi</a>
            <a href="{{ url('/booking') }}">Booking</a>

            {{-- ✅ Bagian Login / Dashboard / Logout --}}
            @auth
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
            @endauth
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="text-center py-4 text-gray-400 text-sm">
        &copy; 2025 Critical Performance. All rights reserved.
    </footer>
</body>
</html>
