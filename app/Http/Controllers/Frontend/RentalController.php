<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RentalConfirmed;
use App\Mail\NewRentalAlert;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RentalController extends Controller
{
    public function index(Request $request)
    {
     
  /** @var User $user */
$user = Auth::user();// Get the logged-in user

    // Correctly access rentals through the user instance
    $rentals = $user->rentals()->with('car')->latest()->get();

    return view('frontend.rentals.history', compact('rentals'));
}

    public function store(Request $request)
    {
        // Validate inputs
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        $car = Car::findOrFail($request->car_id);

        // Check for booking conflicts
        $conflict = Rental::where('car_id', $car->id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                      ->orWhereBetween('end_date', [$request->start_date, $request->end_date]);
            })->exists();

        if ($conflict) {
            return back()->with('error', 'Car is already booked during this period.');
        }

        // Calculate total days (+1 to include both start and end dates)
        $days = now()->parse($request->start_date)->diffInDays(now()->parse($request->end_date)) + 1;
        $total = $car->daily_rent_price * $days;

        // Create rental record
        $rental = Rental::create([
            'user_id' => Auth::id(),
            'car_id' => $car->id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_cost' => $total,
        ]);

        // Eager load 'car' relation to avoid null errors in emails
        $rental->load('car');

        $user = Auth::user();

        // Send confirmation email to customer if user exists
        if ($user) {
            Mail::to($user->email)->send(new RentalConfirmed($rental));
        }

        // Send notification email to admin
        $admin = User::where('role', 'admin')->first();
        if ($admin) {
            Mail::to($admin->email)->send(new NewRentalAlert($rental));
        }

        return redirect()->route('rentals.index')->with('success', 'Booking confirmed!');
    }

    public function destroy($id)
    {
        $rental = Rental::findOrFail($id);

        // Allow cancellation only if booking start date is in future
        if ($rental->start_date > now()->toDateString()) {
            $rental->delete();
            return back()->with('success', 'Booking canceled.');
        }

        return back()->with('error', 'You cannot cancel this booking.');
    }
}
