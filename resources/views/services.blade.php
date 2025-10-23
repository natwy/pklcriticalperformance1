<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan - Critical Performance</title>
    @vite('resources/css/app.css')
</head>
<body>
    <header>
        <h1>🔧 Layanan Critical Performance</h1>
        <nav>
            <a href="{{ url('/') }}">Beranda</a> |
            <a href="{{ route('services') }}">Layanan</a> |
            <a href="{{ url('/booking') }}">Booking</a>
        </nav>
    </header>

    <main>
        <div class="services-container">
            @foreach($services as $service)
                <div class="service-card">
                    @if($service->gambar)
                        <img src="{{ asset($service->gambar) }}" alt="{{ $service->nama_jasa }}" style="width:200px; height:auto;">
                    @endif
                    <h3>{{ $service->nama_jasa }}</h3>
                    <p>{{ $service->deskripsi }}</p>
                    @if($service->harga)
                        <p>Harga: Rp {{ number_format($service->harga, 0, ',', '.') }}</p>
                    @endif
                    <a href="{{ url('/booking?service_id='.$service->id) }}">
                        <button>+ Booking</button>
                    </a>
                </div>
            @endforeach
        </div>
    </main>

    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .services-container { display: flex; flex-wrap: wrap; gap: 20px; }
        .service-card { border: 1px solid #ccc; padding: 15px; border-radius: 10px; width: 220px; text-align: center; }
        .service-card button { margin-top: 10px; padding: 5px 10px; border: none; border-radius: 5px; background-color: #007bff; color: #fff; cursor: pointer; }
        .service-card button:hover { background-color: #0056b3; }
    </style>
</body>
</html>
