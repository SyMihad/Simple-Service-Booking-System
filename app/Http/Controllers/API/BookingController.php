<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request) {
        try {
            $request->validate([
                'service_id' => 'required|exists:services,id',
                'booking_date' => 'required|date|after_or_equal:today',
            ]);

            return Booking::create([
                'user_id' => auth()->id(),
                'service_id' => $request->service_id,
                'booking_date' => $request->booking_date,
                'status' => 'pending'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error occurred',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function userBookings() {
        return Booking::where('user_id', auth()->id())->with('service')->get();
    }

    public function allBookings() {
        return Booking::with('user', 'service')->get();
    }
}
