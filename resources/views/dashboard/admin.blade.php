<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard - Critical Performance</title>
<style>
/* ===== STATUS WARNA ===== */
.status-badge {
    padding:4px 8px;
    border-radius:5px;
    color:#fff;
    font-weight:bold;
    font-size:12px;
}
.status-pending { background:#facc15; color:#000; } /* kuning */
.status-proses  { background:#3b82f6; } /* biru */
.status-selesai { background:#22c55e; } /* hijau */

/* ===== BODY ===== */
body {
    margin:0;
    font-family: Arial,sans-serif;
    display:flex;
    height:100vh;
    background:#f9f9f9;
}

/* ===== SIDEBAR ===== */
.sidebar {
    width:220px;
    background:#111827;
    color:#fff;
    padding:20px;
    display:flex;
    flex-direction:column;
}
.sidebar .profile {
    display:flex;
    align-items:center;
    margin-bottom:20px;
}
.sidebar .profile img {
    width:40px;
    height:40px;
    border-radius:50%;
    margin-right:10px;
    object-fit:cover;
}
.sidebar a {
    color:#fff;
    text-decoration:none;
    margin-bottom:12px;
    display:block;
    padding:8px 12px;
    border-radius:5px;
    transition:0.3s;
}
.sidebar a:hover { background:#374151; }
.badge {
    background:red;
    color:#fff;
    padding:2px 6px;
    border-radius:50%;
    font-size:12px;
}

/* ===== MAIN CONTENT ===== */
.main-content { flex:1; display:flex; flex-direction:column; }

/* ===== HEADER ===== */
.header {
    background:#fff;
    padding:15px 20px;
    display:flex;
    justify-content:flex-end;
    align-items:center;
    box-shadow:0 2px 4px rgba(0,0,0,0.1);
}
.header .user-profile {
    display:flex;
    align-items:center;
    margin-right:20px;
}
.header .user-profile img {
    width:35px;
    height:35px;
    border-radius:50%;
    margin-right:10px;
    object-fit:cover;
}
.header form button {
    padding:8px 12px;
    background:#ef4444; /* tombol logout */
    color:#fff;
    border:none;
    border-radius:5px;
    cursor:pointer;
}
.header form button:hover { background:#dc2626; }

/* ===== CONTENT ===== */
.content { padding:20px; overflow-y:auto; flex:1; }

/* ===== TABLE ===== */
table {
    width:100%;
    border-collapse:collapse;
    background:#fff;
    border-radius:8px;
    overflow:hidden;
}
th, td { padding:12px; text-align:center; border-bottom:1px solid #ddd; }
th { background:#1f2937; color:#fff; }

/* ===== SEARCH & FILTER ===== */
.search-filter {
    margin-bottom:15px;
    display:flex;
    gap:10px;
    flex-wrap:wrap;
}
.search-filter input,
.search-filter select,
.search-filter button {
    padding:8px 10px;
    border-radius:5px;
    border:1px solid #ccc;
}
.search-filter button {
    background:#111827;
    color:#fff;
    cursor:pointer;
}
.search-filter button:hover { background:#374151; }

/* ===== BUTTONS ===== */
.btn {
    padding:5px 10px;
    border:none;
    border-radius:5px;
    cursor:pointer;
    color:#fff;
}
.btn-edit { background:#3b82f6; }
.btn-delete { background:#ef4444; }
.btn-edit:hover { background:#2563eb; }
.btn-delete:hover { background:#dc2626; }

.status-select {
    border-radius:5px;
    padding:4px;
    font-size:12px;
}

</style>
</head>
<body>

<!-- ===== SIDEBAR ===== -->
<div class="sidebar">
    <div class="profile">
        <img src="{{ auth()->user()->profile_photo ?? '/images/nathanprofile.png' }}" alt="Admin">
        <span>{{ auth()->user()->name }}</span>
    </div>
    <!-- ===== MENU ADMIN =====-->
    <a href="{{ route('admin.dashboard') }}">📊 Data Booking <span class="badge">{{ $newBookingsCount }}</span></a>
    <a href="#">📈 Data Jumlah Orderan</a>
    <hr style="border-color:#374151; margin:15px 0;">
    <!-- ===== LINK HALAMAN ===== -->
    <a href="{{ route('home') }}">🏠 Beranda</a>
    <a href="{{ route('tentang') }}">ℹ️ Tentang Kami</a>
    <a href="{{ route('galeri') }}">🖼️ Galeri</a>
    <a href="{{ route('lokasi') }}">📍 Lokasi</a>
    <a href="{{ route('kontak') }}">📞 Kontak</a>
    <a href="{{ route('garansi') }}">🧾 Garansi</a>

    
</div>

<!-- ===== MAIN CONTENT ===== -->
<div class="main-content">

    <!-- ===== HEADER ===== -->
    <div class="header">
        <div class="user-profile">
            <img src="{{ auth()->user()->profile_photo ?? '/images/nathanprofile.png' }}" alt="Profile">
            <span>{{ auth()->user()->name }}</span>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>

    <!-- ===== CONTENT AREA ===== -->
    <div class="content">
        <h1>Data Booking</h1>

        <!-- ===== SEARCH & FILTER ===== -->
        <form method="GET" action="{{ route('admin.dashboard') }}" class="search-filter">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search user/layanan">
            <select name="status">
                <option value="">Semua Status</option>
                <option value="pending" {{ request('status')=='pending' ? 'selected' : '' }}>Pending</option>
                <option value="proses" {{ request('status')=='proses' ? 'selected' : '' }}>Proses</option>
                <option value="selesai" {{ request('status')=='selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
            <button type="submit">Filter</button>
        </form>

        <!-- ===== TABEL BOOKING ===== -->
        <table>
            <thead>
                <tr>
                    <th>Nama User</th>
                    <th>Jasa</th>
                    <th>Tgl Pemesanan</th>
                    <th>Tgl Kedatangan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                <tr>
                    <td>{{ $booking->user?->name ?? 'User tidak ditemukan' }}</td>
                    <td>{{ $booking->jasa }}</td>
                    <td>{{ $booking->created_at->format('Y-m-d') }}</td>
                    <td>{{ $booking->tgl_kedatangan ?? '-' }}</td>

                    <!-- ===== KOLOM STATUS ===== -->
                    <td>
                        @php
                            $statusClasses = [
                                'pending' => 'status-pending',
                                'proses'  => 'status-proses',
                                'selesai' => 'status-selesai'
                            ];
                        @endphp
                        <span class="status-badge {{ $statusClasses[$booking->status] ?? '' }}">
                            {{ ucfirst($booking->status) }}
                        </span>

                        <!-- Dropdown update status -->
                        <form action="{{ route('admin.bookings.updateStatus', $booking->id) }}" method="POST" style="display:inline-block; margin-left:5px;">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="status-select" onchange="this.form.submit()">
                                <option value="pending" {{ $booking->status=='pending' ? 'selected' : '' }}>Pending</option>
                                <option value="proses" {{ $booking->status=='proses' ? 'selected' : '' }}>Proses</option>
                                <option value="selesai" {{ $booking->status=='selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </form>
                    </td>

                    <!-- ===== KOLOM AKSI ===== -->
                    <td>
                        <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" onclick="return confirm('Yakin ingin hapus booking ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6">Belum ada booking</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div> <!-- end main-content -->

</body>
</html>
