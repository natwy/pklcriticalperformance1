<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingAdminController extends Controller
{
    public function index(Request $request)
    {
        $newBookingsCount = Booking::where('status', 'pending')->count();

        $query = Booking::with('user');

        if ($request->search) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%");
            })->orWhere('jasa', 'like', "%{$request->search}%");
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $bookings = $query->latest()->get();

        return view('dashboard.admin', compact('bookings', 'newBookingsCount'));
    }

    public function updateStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();

        return redirect()->back()->with('success', 'Status booking berhasil diperbarui');
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        return view('dashboard.admin-edit-booking', compact('booking'));
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'jasa' => $request->jasa,
            'tgl_kedatangan' => $request->tgl_kedatangan,
            'status' => $request->status,
        ]);
        return redirect()->route('bookings.index')->with('success', 'Data booking berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', '❌ Booking berhasil dihapus!');

    }
}
