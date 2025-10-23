<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class UserBookingController extends Controller
{
    // Menampilkan form edit booking (hanya milik user login)
    public function edit($id)
    {
        $booking = Booking::where('user_id', auth()->id())->findOrFail($id);
        return view('dashboard.edit-booking', compact('booking'));

    }

    // Memproses update booking
    public function update(Request $request, $id)
    {
        $booking = Booking::where('user_id', auth()->id())->findOrFail($id);

        $validated = $request->validate([
            'jasa' => 'required|string|max:255',
            'tanggal_kedatangan' => 'required|date|after_or_equal:today',
        ]);

        $booking->update($validated);

        return redirect()->route('dashboard.user')->with('success', 'Booking berhasil diperbarui!');
    }
}
