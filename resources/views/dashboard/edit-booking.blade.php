<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Booking - Critical Performance</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600;800&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { box-sizing: border-box; }
        body {
            display: flex; justify-content: center; align-items: center;
            height: 100vh; margin: 0; background: #000; color: #fff;
            font-family: 'Poppins', sans-serif; overflow: hidden;
        }
        .logo-background {
            position: fixed; top: 50%; left: 50%; width: 1000px; opacity: 0.08;
            transform: translate(-50%, -50%); z-index: 0; pointer-events: none;
            filter: brightness(1.4) contrast(1.1) drop-shadow(0 0 10px #e63946);
            animation: breathing 10s ease-in-out infinite;
        }
        @keyframes breathing {
            0%, 100% { transform: translate(-50%, -50%) scale(1); }
            50% { transform: translate(-50%, -50%) scale(1.05); }
        }
        .card {
            background: rgba(0, 0, 0, 0.85); padding: 40px 35px; border-radius: 14px;
            color: #fff; width: 400px; z-index: 1; position: relative;
            border: 1.5px solid #e63946; box-shadow: 0 0 25px rgba(230, 57, 70, 0.25);
            backdrop-filter: blur(6px);
        }
        .card h2 {
            font-family: 'Orbitron', sans-serif; text-align: center; margin-bottom: 25px;
            color: #e63946; text-shadow: 0 0 10px rgba(230, 57, 70, 0.4);
        }
        label {
            display: block; font-weight: 600; margin-top: 12px; color: #ddd; font-size: 14px;
        }
        select, input[type="date"] {
            width: 100%; padding: 10px; margin-top: 6px; border: 2px solid #e63946;
            border-radius: 8px; background: #111; color: #fff; font-size: 14px; outline: none;
            transition: 0.3s;
        }
        select:focus, input:focus {
            border-color: #ff4747; box-shadow: 0 0 8px rgba(230, 57, 70, 0.6);
        }
        button {
            width: 100%; padding: 10px; background: #e63946; color: white; border: none;
            border-radius: 8px; cursor: pointer; font-weight: bold; margin-top: 20px;
            font-size: 15px; transition: 0.3s; font-family: 'Poppins', sans-serif;
        }
        button:hover {
            background: #ff4040; transform: scale(1.05);
            box-shadow: 0 0 10px rgba(255, 64, 64, 0.5);
        }
        .back-btn {
            display: block; text-align: center; margin-top: 15px;
            color: #e63946; text-decoration: none; font-weight: 600;
        }
        .back-btn:hover { text-decoration: underline; color: #ff4747; }
    </style>
</head>
<body>

<img src="{{ asset('images/DANIELAYAL_CRITICAL.png') }}" alt="Logo Critical Performance" class="logo-background">

<div class="card">
    <h2><i class="fa-solid fa-pen-to-square"></i> Edit Booking</h2>

    <form action="{{ url('/user/booking/' . $booking->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Wajib agar route PUT bisa dibaca -->

        <label for="jasa">Pilih Jasa:</label>
        <select name="jasa" id="jasa" required>
            <option value="Remap ECU" {{ $booking->jasa == 'Remap ECU' ? 'selected' : '' }}>Remap ECU</option>
            <option value="Service Mesin" {{ $booking->jasa == 'Service Mesin' ? 'selected' : '' }}>Service Mesin</option>
            <option value="Ganti Oli" {{ $booking->jasa == 'Ganti Oli' ? 'selected' : '' }}>Ganti Oli</option>
            <option value="Diagnosa" {{ $booking->jasa == 'Diagnosa' ? 'selected' : '' }}>Diagnosa</option>
        </select>

        <label for="tgl_kedatangan">Tanggal Kedatangan:</label>
        <input type="date" name="tgl_kedatangan" id="tgl_kedatangan"
            value="{{ $booking->tgl_kedatangan }}" required>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <a href="{{ route('dashboard') }}" class="back-btn">
        <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
    </a>
</div>

</body>
</html>
