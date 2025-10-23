<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class RiwayatController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Ambil semua booking user yang sudah selesai
        $bookings = Booking::where('user_id', $user->id)
            ->where('status', 'selesai')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard.riwayat', compact('bookings', 'user'));
    }
}
