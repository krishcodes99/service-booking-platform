<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function create($id)
    {
        $service = Service::findOrFail($id);
        return view('bookings.create', compact('service'));
    }

    public function store(Request $request)
    {
        Booking::create([
            'user_id' => Auth::id(),
            'service_id' => $request->service_id,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'address' => $request->address,
            'phone' => $request->phone,
            'status' => 'pending',
        ]);

        return "Booking Successful!";
    }

    public function index()
    {
        $bookings = Booking::with('service')
            ->where('user_id', Auth::id())
            ->get();

        return view('bookings.index', compact('bookings'));
    }

    public function providerBookings()
    {
        $bookings = Booking::with('service', 'user')
            ->whereHas('service', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->get();

        return view('bookings.provider', compact('bookings'));
    }

    public function accept($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'confirmed';
        $booking->save();

        return back();
    }

    public function reject($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'rejected';
        $booking->save();

        return back();
    }
}