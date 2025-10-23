<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Critical Performance</title>

    @vite('resources/css/app.css') <!-- tetap aktif tapi kita batasi efeknya -->

    <style>
        /* ======== RESET SELEKTIF ======== */
        body.dashboard-page {
            all: unset;
            display: block;
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
        }

        /* ======== SIDEBAR ======== */
        .dashboard-page .sidebar {
            width: 230px;
            background-color: #111;
            color: white;
            min-height: 100vh;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
        }

        .dashboard-page .sidebar h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        .dashboard-page .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 6px;
            transition: 0.3s;
        }

        .dashboard-page .sidebar a:hover {
            background: #333;
        }

        /* ======== MAIN CONTENT ======== */
        .dashboard-page .main-content {
            margin-left: 250px;
            padding: 20px;
            background-color: #000;
            min-height: 100vh;
        }

        /* ======== HEADER ======== */
        .dashboard-page .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .dashboard-page .logout-btn {
            background: red;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
        }

        .dashboard-page .logout-btn:hover {
            background: darkred;
        }

        /* ======== CARD ======== */
        .dashboard-page .card {
            background: #f9f9f9;
            color: #111;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }

        .dashboard-page .card h2 {
            margin-bottom: 10px;
            color: #000;
        }

        /* ======== TABLE ======== */
        .dashboard-page table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }

        .dashboard-page table th,
        .dashboard-page table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            color: #000;
        }

        .dashboard-page table th {
            background: #f2f2f2;
            font-weight: bold;
        }

        /* ======== BUTTON EDIT ======== */
        .dashboard-page .btn-edit {
            background-color: #e63946;
            color: #fff;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            transition: 0.3s;
        }

        .dashboard-page .btn-edit:hover {
            background-color: #ffffffff;
        }
    </style>
</head>

<body class="dashboard-page">

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Dashboard</h2>
        <a href="{{ route('booking.create') }}">📅 Booking</a>
        <a href="{{ route('dashboard') }}">📊 Dashboard</a>
        <hr style="border-color:#333; margin:15px 0;">
        <a href="{{ route('home') }}">🏠 Beranda</a>
        <a href="{{ route('tentang') }}">ℹ️ Tentang Kami</a>
        <a href="{{ route('galeri') }}">🖼️ Galeri</a>
        <a href="{{ route('lokasi') }}">📍 Lokasi</a>
        <a href="{{ route('kontak') }}">📞 Kontak</a>
        <a href="{{ route('garansi') }}">🧾 Garansi</a>
    </div>

    <!-- Main -->
    <div class="main-content">
        <div class="header">
            <h1>Halo, {{ Auth::user()->name }} 👋</h1>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>

        @if(Auth::user()->role === 'admin')
            <div class="card">
                <h2>Manajemen Booking</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Nama User</th>
                            <th>Jasa</th>
                            <th>Tgl Pemesanan</th>
                            <th>Tgl Kedatangan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $booking)
                        <tr>
                            <td>{{ $booking->user->name }}</td>
                            <td>{{ $booking->jasa }}</td>
                            <td>{{ $booking->created_at->format('Y-m-d') }}</td>
                            <td>{{ $booking->tanggal_kedatangan }}</td>
                            <td>{{ ucfirst($booking->status) }}</td>
                        </tr>
                        @empty
                        <tr><td colspan="5">Belum ada data booking</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @else
            <div class="card">
                <h2>Pesanan Aktif</h2>
                <p><b>Nama:</b> {{ $user->name }}</p>
                <p><b>Jasa:</b> {{ $activeBooking->jasa ?? '-' }}</p>
                <p><b>Tanggal Pemesanan:</b> {{ $activeBooking->tgl_pemesanan ?? '-' }}</p>
                <p><b>Tanggal Kedatangan:</b> {{ $activeBooking->tgl_kedatangan ?? '-' }}</p>
                <p><b>Status:</b> {{ ucfirst($activeBooking->status ?? 'Pending') }}</p>
            </div>

            <div class="card">
                <h2>Riwayat Pesanan</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Jasa yang di Pesan</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Tanggal Reservasi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $booking)
                        <tr>
                            <td>{{ $booking->jasa }}</td>
                            <td>{{ $booking->tgl_pemesanan ?? $booking->created_at->format('Y-m-d') }}</td>
                            <td>{{ $booking->tgl_kedatangan ?? '-' }}</td>
                            <td>{{ $booking->status ?? 'Pending' }}</td>
                            <td><a href="{{ route('user.booking.edit', $booking->id) }}" class="btn-edit">Edit</a></td>
                        </tr>
                        @empty
                        <tr><td colspan="5">Belum ada riwayat pesanan</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</body>
</html>
