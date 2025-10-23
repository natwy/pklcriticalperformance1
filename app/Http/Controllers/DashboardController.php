<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $activeBooking = Booking::where('user_id', $user->id)
            ->whereIn('status', ['pending', 'proses'])
            ->latest()
            ->first();

        $bookings = Booking::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard.index', compact('user', 'activeBooking', 'bookings'));
    }

    public function userDashboard()
    {
        $user = Auth::user();

        $activeBooking = Booking::where('user_id', $user->id)
            ->whereIn('status', ['pending', 'proses'])
            ->latest()
            ->first();

        $bookings = Booking::where('user_id', $user->id)->latest()->get();

        return view('dashboard.user', compact('user', 'activeBooking', 'bookings'));
    }

    public function adminDashboard(Request $request)
    {
        $query = Booking::with('user')->latest();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->whereHas('user', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })
            ->orWhere('jasa', 'like', "%{$search}%");
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $bookings = $query->get();
        $newBookingsCount = Booking::where('status', 'pending')->count();

        return view('dashboard.admin', compact('bookings', 'newBookingsCount'));
    }

    public function updateBookingStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();

        return redirect()->back()->with('success', 'Status booking berhasil diperbarui');
    }

    public function destroyBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->back()->with('success', 'Booking berhasil dihapus');
    }
    public function editUserBooking($id)
{
    $booking = Booking::findOrFail($id);

    // Pastikan hanya pemilik booking yang bisa edit
    if ($booking->user_id !== auth()->id()) {
        abort(403);
    }

    return view('dashboard.edit-booking', compact('booking'));

}

public function updateUserBooking(Request $request, $id)
{
    $booking = Booking::findOrFail($id);

    if ($booking->user_id !== auth()->id()) {
        abort(403);
    }

    $request->validate([
        'jasa' => 'required|string|max:255',
        'tgl_kedatangan' => 'required|date|after_or_equal:today',
    ]);

    $booking->update([
        'jasa' => $request->jasa,
        'tgl_kedatangan' => $request->tgl_kedatangan,
    ]);

    return redirect()->route('user')->with('success', 'Booking berhasil diperbarui.');
}

    
    }

