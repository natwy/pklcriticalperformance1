<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Booking - Critical Performance</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #000;
            color: #fff;
        }

        main {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: calc(100vh - 100px);
            padding: 40px 20px 10px;
        }

        .form-wrapper {
            background: linear-gradient(135deg, #e63946, #000);
            padding: 3px;
            border-radius: 1rem;
            width: 100%;
            max-width: 750px;
        }

        .form-content {
            background: #fff;
            border-radius: 0.9rem;
            padding: 2.5rem;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
            color: #111827;
        }

        h2 {
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
            color: #000000ff;
            border-bottom: 3px solid #000000ff;
            padding-bottom: 8px;
            margin-bottom: 2rem;
            letter-spacing: 1px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #111827;
        }

        .form-input, 
        .form-select {
            width: 100%;
            padding: 12px 14px;
            border: 2px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
            color: #111827;
            background-color: #fff;
            transition: all 0.3s ease;
            box-sizing: border-box;
            margin-bottom: 18px;
        }

        .form-input:focus, 
        .form-select:focus {
            border-color: #e63946;
            box-shadow: 0 0 8px rgba(230, 57, 70, 0.4);
            outline: none;
        }

        .btn-submit {
            width: 100%;
            background: #e63946;
            color: white;
            font-weight: bold;
            padding: 1rem;
            font-size: 1.05rem;
            border-radius: 0.6rem;
            border: none;
            margin-top: 1rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-submit:hover {
            background: #ff4040;
            transform: scale(1.05);
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
            padding: 12px 18px;
            border-radius: 8px;
            margin-bottom: 18px;
            text-align: center;
            font-weight: 500;
        }

        .logo-background {
            position: fixed;
            top: 50%;
            left: 50%;
            width: 850px;
            opacity: 0.08;
            transform: translate(-50%, -50%);
            z-index: -1;
            pointer-events: none;
            filter: brightness(1.4) contrast(1.1) drop-shadow(0 0 10px #e63946);
        }

        footer {
            background: rgba(0, 0, 0, 0.85);
            color: #ccc;
            text-align: center;
            padding: 15px 0;
            font-size: 14px;
            margin-top: 20px;
        }

        @keyframes popIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>
</head>
<body class="booking-page bg-black text-white flex flex-col min-h-screen">

    <img src="{{ asset('images/DANIELAYAL_CRITICAL.png') }}" alt="Logo Critical Performance" class="logo-background">

    <main>
        <div class="form-wrapper">
            <div class="form-content">

                @if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert-error" style="background:#ff4d4d;color:#fff;padding:12px 18px;border-radius:8px;margin-bottom:18px;text-align:center;font-weight:500;">
        {{ session('error') }}
    </div>
@endif


                <h2>Form Booking</h2>
                
                <form action="{{ route('booking.store') }}" method="POST">
                    @csrf

                    <label for="nama">Nama Pemesan</label>
                    <input type="text" name="nama" id="nama" class="form-input" required>

                    <label for="no_hp">Nomor Handphone</label>
                    <input type="tel" name="no_hp" id="no_hp" class="form-input" required>

                    <!-- Pilih Jasa -->
<div>
<label for="jasa" class="block font-semibold mb-2">Pilih Jasa</label>
<select id="jasa" name="jasa" class="form-select" onchange="tampilOpsiJasa()" required>
    <option value="">-- Pilih Jasa --</option>
    <option value="remap">Remap ECU</option>
    <option value="porting">Porting & Polish</option>
    <option value="service">Service Berkala</option>
    <option value="modifikasi">Modifikasi Mesin</option>
</select>
</div>

<!-- ========== REMAP ECU SECTION ========== -->
<div id="remapSection" style="display:none; margin-top:15px;">
    <label for="jenisMotor" class="block font-semibold mb-2">Jenis Motor</label>
    <select id="jenisMotor" name="jenisMotor" class="form-select" onchange="updateSpesifikasi()">
    <option value="">-- Pilih Jenis Motor --</option>
    <option value="matic">Motor Matic (All Honda)</option>
    <option value="kopling">Motor Kopling / Bebek</option>
    </select>

    <div style="margin-top:10px;">
    <label for="spekMotor" class="block font-semibold mb-2">Spesifikasi</label>
    <select id="spekMotor" name="spekMotor" class="form-select" onchange="updateHarga()" disabled>
    <option value="">-- Pilih Spesifikasi --</option>
    </select>
</div>

<div id="hargaDisplay" style="margin-top:8px; color:#e3342f; font-weight:600;"></div>
</div>

<!-- ========== PORTING POLISH / MODIFIKASI ========== -->
<div id="hargaLain" style="display:none; margin-top:15px; color:#e3342f; font-weight:600;"></div>

<!-- ========== SERVICE BERKALA SECTION ========== -->
<div id="serviceSection" style="display:none; margin-top:15px;">
    <label for="jenisService" class="block font-semibold mb-2">Jenis Service</label>
    <select id="jenisService" name="jenisService" class="form-select" onchange="updateServiceHarga()">
    <option value="">-- Pilih Jenis Service --</option>
    <option value="gantiOli">Ganti Oli</option>
    <option value="gantiBan">Ganti Ban</option>
    <option value="tuneUp">Tune Up</option>
    <option value="cekKelistrikan">Cek Kelistrikan</option>
    </select>

    <div id="serviceDetail" style="display:none; margin-top:12px;">
    <label for="subService" class="block font-semibold mb-2">Detail Pilihan</label>
    <select id="subService" name="subService" class="form-select" onchange="tampilHargaService()">
    <option value="">-- Pilih Detail --</option>
    </select>
    <div id="hargaServiceDisplay" style="margin-top:8px; color:#e3342f; font-weight:600;"></div>
</div>
</div>

<script>
  // Data Remap
        const dataRemap = {
            matic: [
            { spek: "Spek Standar", harga: 250000 },
            { spek: "Bore Up Harian", harga: 350000 },
            { spek: "Race Only", harga: 500000 }
    ],
            kopling: [
            { spek: "Spek Standar", harga: 300000 },
            { spek: "Bore Up Harian", harga: 400000 },
            { spek: "Balap Only", harga: 700000 }
            ]
        };

        // Data Jasa Lain
        const dataJasaLain = {
    porting: 450000,
    modifikasi: 600000
        };

        // Data Service Berkala
        const dataService = {
        gantiOli: [
        { nama: "Oli MPX1 (Matic)", harga: 85000 },
        { nama: "Oli MPX2 (Bebek)", harga: 90000 },
        { nama: "Oli AHM Gear Oil", harga: 25000 }
    ],
        gantiBan: [
        { nama: "Ban Depan FDR 90/80", harga: 250000 },
        { nama: "Ban Belakang FDR 100/80", harga: 275000 },
        { nama: "Ban Tubeless Aspira", harga: 230000 }
    ],
        tuneUp: [
        { nama: "Tune Up Ringan", harga: 120000 },
        { nama: "Tune Up Lengkap", harga: 200000 }
    ],
                cekKelistrikan: [
                { nama: "Cek Aki & Sistem Pengisian", harga: 60000 },
            { nama: "Cek Lampu & Saklar", harga: 40000 }
        ]
    };

  // Elemen global
    const noteElement = document.createElement('div');
    noteElement.id = "noteElement";
    noteElement.style = `
    margin-top: 15px;
    font-size: 0.9rem;
    color: #d00000;
    background: rgba(255, 255, 255, 0.07);
    border-left: 3px solid #e3342f;
    padding: 10px 12px;
    border-radius: 8px;
    line-height: 1.4;
    animation: fadeIn 0.4s ease-in-out;
    `;
    noteElement.textContent = "ℹ️ Untuk informasi lebih lanjut mengenai Jasa yang ingin anda Booking, Admin akan segera menghubungi Anda setelah pengiriman Form Booking ini.";

    function tampilOpsiJasa() {
    const jasa = document.getElementById('jasa').value;
    const remapSection = document.getElementById('remapSection');
    const serviceSection = document.getElementById('serviceSection');
    const hargaLain = document.getElementById('hargaLain');
    const hargaDisplay = document.getElementById('hargaDisplay');
    const spekMotor = document.getElementById('spekMotor');

    remapSection.style.display = 'none';
    serviceSection.style.display = 'none';
    hargaLain.style.display = 'none';
    hargaDisplay.textContent = '';
    spekMotor.disabled = true;
    spekMotor.innerHTML = '<option value="">-- Pilih Spesifikasi --</option>';

    // Hapus note lama kalau ada
    if (noteElement.parentElement) {
        noteElement.parentElement.removeChild(noteElement);
    }

    if (jasa === 'remap') {
        remapSection.style.display = 'block';
        remapSection.appendChild(noteElement);
    } else if (jasa === 'service') {
        serviceSection.style.display = 'block';
        serviceSection.appendChild(noteElement);
    } else if (dataJasaLain[jasa]) {
        hargaLain.style.display = 'block';
        hargaLain.textContent = '💰 Harga: Rp ' + new Intl.NumberFormat('id-ID').format(dataJasaLain[jasa]);
        hargaLain.insertAdjacentElement('afterend', noteElement);
    }
    }

    function updateSpesifikasi() {
    const jenisMotor = document.getElementById('jenisMotor').value;
    const spekMotor = document.getElementById('spekMotor');
    const hargaDisplay = document.getElementById('hargaDisplay');

    spekMotor.innerHTML = '<option value="">-- Pilih Spesifikasi --</option>';
    hargaDisplay.textContent = '';

    if (jenisMotor) {
        spekMotor.disabled = false;
        dataRemap[jenisMotor].forEach(item => {
        const option = document.createElement('option');
        option.value = item.harga;
        option.textContent = item.spek;
        spekMotor.appendChild(option);
        });
    } else {
        spekMotor.disabled = true;
    }
    }

    function updateHarga() {
    const spekMotor = document.getElementById('spekMotor');
    const hargaDisplay = document.getElementById('hargaDisplay');
    const harga = spekMotor.value;

    hargaDisplay.textContent = harga
        ? '💰 Harga: Rp ' + new Intl.NumberFormat('id-ID').format(harga)
        : '';
    }

    function updateServiceHarga() {
    const jenisService = document.getElementById('jenisService').value;
    const subService = document.getElementById('subService');
    const hargaServiceDisplay = document.getElementById('hargaServiceDisplay');
    const serviceDetail = document.getElementById('serviceDetail');

    serviceDetail.style.display = 'none';
    subService.innerHTML = '<option value="">-- Pilih Detail --</option>';
    hargaServiceDisplay.textContent = '';

    if (jenisService && dataService[jenisService]) {
        serviceDetail.style.display = 'block';
        dataService[jenisService].forEach(item => {
        const option = document.createElement('option');
        option.value = item.harga;
        option.textContent = item.nama;
        subService.appendChild(option);
        });
    }
    }

    function tampilHargaService() {
    const subService = document.getElementById('subService');
    const hargaServiceDisplay = document.getElementById('hargaServiceDisplay');
    const harga = subService.value;

    hargaServiceDisplay.textContent = harga
    ? '💰 Harga: Rp ' + new Intl.NumberFormat('id-ID').format(harga)
    : '';
}

  // Animasi lembut munculnya note
const style = document.createElement('style');
style.innerHTML = `
    @keyframes fadeIn {
    from {opacity: 0; transform: translateY(5px);}
    to {opacity: 1; transform: translateY(0);}
    }
`;
document.head.appendChild(style);
</script>



                    <label for="tgl_pemesanan">
                        Tanggal Pemesanan <span style="font-size: 0.85rem; color:#666;">(Tanggal Hari Ini)</span>
                    </label>
                    <input type="date" name="tgl_pemesanan" id="tgl_pemesanan" class="form-input" required>

                    <label for="tgl_kedatangan">Tanggal Kedatangan</label>
                    <input type="date" name="tgl_kedatangan" id="tgl_kedatangan" class="form-input" required>

                    <button type="submit" class="btn-submit">Booking Sekarang</button>
                    <div style="text-align: center; margin-top: 25px;">
                    <a href="{{ route('dashboard') }}" 
                    style="display: inline-block; padding: 10px 20px; background: #e63946; color: #fff; 
                            font-weight: 600; border-radius: 8px; text-decoration: none; 
                            transition: all 0.3s ease;">
                        ← Kembali ke Dashboard
    </a>
                        </div>

                        <style>
                        a[href="{{ route('dashboard') }}"]:hover {
                            background: #ff4040;
                            transform: scale(1.05);
                        }
                        </style>

                </form>
                
            </div>
        </div>
    </main>

    <footer>
        &copy; 2025 Critical Performance. All rights reserved.
    </footer>

</body>
</html>
