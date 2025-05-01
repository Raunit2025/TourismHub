<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        try {
            $userId = Auth::id();
            \Log::info('Fetching bookings for user', ['user_id' => $userId]);

            $bookings = Booking::where('user_id', $userId)
                ->with(['bookable'])
                ->latest()
                ->paginate(10);

            \Log::info('Bookings retrieved', [
                'user_id' => $userId,
                'count' => $bookings->count(),
                'bookings' => $bookings->toArray()
            ]);

            return view('bookings.index', compact('bookings'));
        } catch (\Exception $e) {
            \Log::error('Failed to retrieve bookings', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'user_id' => Auth::id()
            ]);

            return view('bookings.index', ['bookings' => collect()])
                ->with('error', 'Failed to load bookings: ' . $e->getMessage());
        }
    }

    public function create(Request $request)
    {
        $packageId = $request->query('package_id');
        $hotelId = $request->query('hotel_id');

        if ($packageId) {
            $bookable = Package::findOrFail($packageId);
            $view = 'bookings.create-package';
        } elseif ($hotelId) {
            $bookable = Hotel::findOrFail($hotelId);
            $view = 'bookings.create-hotel';
        } else {
            abort(404, 'No booking item specified');
        }

        return view($view, compact('bookable'));
    }

    public function store(Request $request)
    {
        try {
            \Log::info('Booking request received', [
                'all_data' => $request->all(),
                'user_id' => Auth::id()
            ]);

            $request->validate([
                'bookable_type' => 'required|in:App\Models\Hotel,App\Models\Package',
                'bookable_id' => 'required|integer',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after:start_date',
                'guests' => 'required|integer|min:1',
                'special_requests' => 'nullable|string',
            ]);

            // Generate a unique booking reference
            $bookingReference = 'BOOK-' . strtoupper(uniqid());

            // Calculate total price
            $bookable = $request->bookable_type::findOrFail($request->bookable_id);
            $days = \Carbon\Carbon::parse($request->start_date)
                ->diffInDays(\Carbon\Carbon::parse($request->end_date));
            
            $totalPrice = $bookable instanceof Hotel 
                ? $bookable->price_per_night * $days * $request->guests
                : $bookable->price * $request->guests;

            \Log::info('Creating booking with data', [
                'user_id' => Auth::id(),
                'bookable_type' => $request->bookable_type,
                'bookable_id' => $request->bookable_id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'guests' => $request->guests,
                'total_price' => $totalPrice,
                'booking_reference' => $bookingReference
            ]);

            $booking = Booking::create([
                'user_id' => Auth::id(),
                'bookable_type' => $request->bookable_type,
                'bookable_id' => $request->bookable_id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'guests' => $request->guests,
                'total_price' => $totalPrice,
                'special_requests' => $request->special_requests,
                'status' => 'pending',
                'booking_reference' => $bookingReference,
            ]);

            \Log::info('Booking created successfully', [
                'booking_id' => $booking->id,
                'booking_reference' => $bookingReference
            ]);

            return redirect()->route('bookings.index')
                ->with('success', 'Booking Confirmed! Your booking reference is: ' . $bookingReference);
        } catch (\Exception $e) {
            \Log::error('Failed to create booking', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'user_id' => Auth::id(),
                'request_data' => $request->all()
            ]);

            return back()->with('error', 'Failed to create booking: ' . $e->getMessage());
        }
    }

    public function show(Booking $booking)
    {
        $this->authorize('view', $booking);
        
        return view('bookings.show', compact('booking'));
    }

    public function edit(Booking $booking)
    {
        $this->authorize('update', $booking);
        
        $hotels = Hotel::where('is_active', true)->get();
        $packages = Package::where('is_active', true)->get();
        
        return view('bookings.edit', compact('booking', 'hotels', 'packages'));
    }

    public function update(Request $request, Booking $booking)
    {
        $this->authorize('update', $booking);

        $validated = $request->validate([
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after:start_date',
            'guests' => 'required|integer|min:1',
            'special_requests' => 'nullable|string|max:1000',
        ]);

        // Calculate total price based on new dates
        $days = \Carbon\Carbon::parse($validated['start_date'])
            ->diffInDays(\Carbon\Carbon::parse($validated['end_date']));

        $bookable = $booking->bookable;
        $totalPrice = $bookable instanceof Hotel 
            ? $bookable->price_per_night * $days * $validated['guests']
            : $bookable->price * $validated['guests'];

        // Update the booking
        $booking->update([
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'guests' => $validated['guests'],
            'total_price' => $totalPrice,
            'special_requests' => $validated['special_requests'] ?? null,
        ]);

        return redirect()->route('bookings.index')
            ->with('success', 'Booking updated successfully.');
    }

    public function destroy(Booking $booking)
    {
        $this->authorize('delete', $booking);
        
        $booking->delete();

        return redirect()->route('bookings.index')
            ->with('success', 'Booking cancelled successfully.');
    }

    private function calculateTotalPrice($data)
    {
        $bookable = $data['bookable_type']::find($data['bookable_id']);
        $days = \Carbon\Carbon::parse($data['start_date'])
            ->diffInDays(\Carbon\Carbon::parse($data['end_date']));

        if ($bookable instanceof Hotel) {
            return $bookable->price_per_night * $days * $data['guests'];
        } else {
            return $bookable->price * $data['guests'];
        }
    }
} 