<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    // 👉 Menampilkan halaman booking
    public function create()
    {
        return view('booking');
    }

    // 👉 Menyimpan data booking
    public function store(Request $request)
    {
        try {
            // Pastikan user login
            if (!auth()->check()) {
                return redirect()->route('login')->with('error', '⚠️ Silakan login terlebih dahulu untuk melakukan booking.');
            }

            $userId = auth()->id();

            // 🔒 Cek apakah user masih punya booking aktif (belum selesai)
            $existingBooking = Booking::where('user_id', $userId)
                ->whereIn('status', ['pending', 'proses'])
                ->first();

            if ($existingBooking) {
                return redirect()
                    ->back()
                    ->with('error', '⚠️ Anda masih memiliki booking yang belum selesai. Tunggu hingga booking tersebut selesai sebelum membuat booking baru.');
            }

            // ✅ Validasi input form
            $validated = $request->validate([
                'nama' => 'required|string|max:100',
                'no_hp' => 'required|string|max:20',
                'jasa' => 'required|string',
                'tgl_pemesanan' => 'required|date',
                'tgl_kedatangan' => 'required|date|after_or_equal:today',
            ]);

            // Tambahkan user_id & status default
            $validated['user_id'] = $userId;
            $validated['status'] = 'pending';

            // Simpan data ke database
            Booking::create($validated);

            return redirect()
                ->route('dashboard')
                ->with('success', '✅ Booking berhasil disimpan, menunggu validasi admin!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '❌ Terjadi kesalahan sistem: ' . $e->getMessage());
        }
    }

    // 👉 Update data booking
    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $validated = $request->validate([
            'jasa' => 'required|string',
            'tgl_kedatangan' => 'required|date|after_or_equal:today',
        ]);

        $booking->update($validated);

        return redirect()
            ->route('dashboard')
            ->with('success', '✅ Booking berhasil diperbarui!');
    }
}
