<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan - Critical Performance</title>
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #000000, #3a0b0b);
            color: #fff;
            margin: 0;
            display: flex;
        }

        /* Sidebar */
        .sidebar {
            width: 220px;
            background: #111;
            color: white;
            min-height: 100vh;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 10px;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background: #e50914;
        }

        /* Main */
        .main-content {
            margin-left: 240px;
            padding: 30px;
            width: 100%;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logout-btn {
            background: #e50914;
            border: none;
            color: #fff;
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: darkred;
        }

        .card {
            background: #1a1a1a;
            border: 1px solid #333;
            border-radius: 12px;
            padding: 20px;
            margin-top: 30px;
            box-shadow: 0 4px 8px rgba(255, 0, 0, 0.2);
        }

        h1, h2 {
            color: #ff4b4b;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            border-radius: 8px;
            overflow: hidden;
        }

        .table th, .table td {
            border: 1px solid #333;
            padding: 12px;
            text-align: center;
            color: #ddd;
        }

        .table th {
            background: #222;
            color: #fff;
        }

        .status {
            padding: 6px 12px;
            border-radius: 12px;
            font-weight: bold;
        }

        .status.pending { background: #ffcc00; color: #000; }
        .status.proses { background: #2196f3; color: #fff; }
        .status.selesai { background: #4caf50; color: #fff; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Dashboard</h2>
        <a href="{{ route('home') }}">🏠 Beranda</a>
        <a href="{{ route('dashboard') }}">📊 Dashboard</a>
        <a href="{{ route('riwayat') }}" style="background:#e50914;">📜 Riwayat</a>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Riwayat Pesanan 🚗</h1>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="logout-btn">Logout</button>
            </form>
        </div>

        <div class="card">
            <h2>Data Riwayat Pesanan</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Jasa</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Tanggal Kedatangan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                    <tr>
                        <td>{{ $booking->jasa }}</td>
                        <td>{{ $booking->tgl_pemesanan ?? $booking->created_at->format('Y-m-d') }}</td>
                        <td>{{ $booking->tgl_kedatangan ?? '-' }}</td>
                        <td>
                            <span class="status {{ strtolower($booking->status) }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">Belum ada riwayat pesanan selesai.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
