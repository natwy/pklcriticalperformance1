<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Booking (Admin) - Critical Performance</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600;800&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: #000;
            font-family: 'Poppins', sans-serif;
            color: #fff;
            overflow: hidden;
        }

        .logo-background {
            position: fixed;
            top: 50%;
            left: 50%;
            width: 1000px;
            opacity: 0.08;
            transform: translate(-50%, -50%);
            z-index: 0;
            filter: brightness(1.4) contrast(1.1) drop-shadow(0 0 10px #e63946);
            animation: breathing 10s ease-in-out infinite;
        }

        @keyframes breathing {
            0%, 100% { transform: translate(-50%, -50%) scale(1); }
            50% { transform: translate(-50%, -50%) scale(1.05); }
        }

        .card {
            background: rgba(0, 0, 0, 0.85);
            padding: 40px 35px;
            border-radius: 14px;
            color: #fff;
            width: 380px;
            z-index: 1;
            position: relative;
            border: 1.5px solid #e63946;
            box-shadow: 0 0 25px rgba(230, 57, 70, 0.25);
            backdrop-filter: blur(6px);
        }

        h2 {
            font-family: 'Orbitron', sans-serif;
            text-align: center;
            margin-bottom: 25px;
            color: #e63946;
            text-shadow: 0 0 10px rgba(230, 57, 70, 0.4);
        }

        label {
            display: block;
            font-weight: 600;
            margin-top: 12px;
            color: #ddd;
            font-size: 14px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 2px solid #e63946;
            border-radius: 8px;
            background: #111;
            color: #fff;
            font-size: 14px;
            outline: none;
            transition: 0.3s;
        }

        input:focus, select:focus {
            border-color: #ff4747;
            box-shadow: 0 0 8px rgba(230, 57, 70, 0.6);
        }

        /* === CUSTOM SELECT KEREN === */
        .custom-select {
            position: relative;
            width: 100%;
        }

        .selected-option {
            background-color: #111;
            border: 2px solid #e63946;
            border-radius: 8px;
            padding: 10px;
            cursor: pointer;
            transition: 0.3s;
        }

        .selected-option:hover {
            box-shadow: 0 0 10px rgba(230, 57, 70, 0.6);
        }

        .options-list {
            display: none;
            position: absolute;
            background-color: #111;
            border: 2px solid #e63946;
            border-radius: 8px;
            margin-top: 5px;
            width: 100%;
            max-height: 160px;
            overflow-y: auto;
            z-index: 10;
            box-shadow: 0 0 12px rgba(230, 57, 70, 0.4);
        }

        .option {
            padding: 10px;
            transition: 0.3s;
        }

        .option:hover {
            background-color: #e63946;
            color: #000;
            cursor: pointer;
        }

        .options-list::-webkit-scrollbar { width: 6px; }
        .options-list::-webkit-scrollbar-thumb {
            background-color: #e63946;
            border-radius: 3px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #e63946;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 20px;
            font-size: 15px;
            transition: 0.3s;
        }

        button:hover {
            background: #ff4040;
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(255, 64, 64, 0.5);
        }

        .link {
            text-align: center;
            margin-top: 18px;
        }

        .link a {
            color: #e63946;
            text-decoration: none;
            font-weight: 600;
        }

        .link a:hover { text-decoration: underline; }

    </style>
</head>
<body>

    <img src="{{ asset('images/DANIELAYAL_CRITICAL.png') }}" alt="Logo Critical Performance" class="logo-background">

    <div class="card">
        <h2><i class="fas fa-pen-to-square"></i> Edit Booking (Admin)</h2>
        <form method="POST" action="{{ route('admin.bookings.update', $booking->id) }}">
            @csrf
            @method('PUT')

            <label>Nama</label>
            <input type="text" name="name" value="{{ $booking->name }}">


            <form method="POST" action="{{ route('admin.bookings.update', $booking->id) }}">
    @csrf
    @method('PUT')

    <label for="jasa">Jasa</label>
    <select name="jasa" id="jasa" required>
        <option value="Remap ECU" {{ $booking->jasa == 'Remap ECU' ? 'selected' : '' }}>Remap ECU</option>
        <option value="Service Berkala" {{ $booking->jasa == 'Service Berkala' ? 'selected' : '' }}>Service Berkala</option>
        <option value="Modifikasi Mesin" {{ $booking->jasa == 'Modifikasi Mesin' ? 'selected' : '' }}>Modifikasi Mesin</option>
    </select>

    <label for="tgl_kedatangan">Tanggal Kedatangan</label>
    <input type="date" name="tgl_kedatangan" id="tgl_kedatangan"
            value="{{ old('tgl_kedatangan', $booking->tgl_kedatangan) }}" required>

    <label for="status">Status</label>
    <select name="status" id="status" required>
        <option value="Menunggu" {{ $booking->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
        <option value="Diterima" {{ $booking->status == 'Diterima' ? 'selected' : '' }}>Diterima</option>
        <option value="Selesai" {{ $booking->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
    </select>

    <button type="submit">Update</button>
</form>

            <button type="submit">Simpan Perubahan</button>

            <div class="link">
                <a href="{{ route('admin.dashboard') }}">← Kembali ke Dashboard</a>
            </div>
        </form>
    </div>

    <script>
        const selected = document.getElementById('selectedJasa');
        const optionsList = document.getElementById('optionsJasa');
        const inputHidden = document.getElementById('inputJasa');

        selected.addEventListener('click', () => {
            optionsList.style.display = optionsList.style.display === 'block' ? 'none' : 'block';
        });

        document.querySelectorAll('.option').forEach(opt => {
            opt.addEventListener('click', () => {
                selected.textContent = opt.textContent;
                inputHidden.value = opt.dataset.value;
                optionsList.style.display = 'none';
            });
        });

        window.addEventListener('click', (e) => {
            if (!e.target.closest('.custom-select')) {
                optionsList.style.display = 'none';
            }
        });
    </script>
</body>
</html>
