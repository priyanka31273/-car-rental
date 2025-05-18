<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{

    public function store(Request $request, $id)
{
    $request->validate([
        'start_date' => 'required|date|after_or_equal:today',
        'end_date' => 'required|date|after_or_equal:start_date',
    ]);

    $car = Car::findOrFail($id);
    $user = Auth::user();

    // Optional: Check if car is already rented during this period

    $days = (new \DateTime($request->end_date))->diff(new \DateTime($request->start_date))->days + 1;
    $total_price = $days * $car->price_per_day;

    // Create rental
    $user->Rental::create([
        'car_id' => $car->id,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'total_price' => $total_price,
    ]);

    return back()->with('success', 'Booking confirmed successfully!');
}
   


    public function showForm($id)
    {
        $car = Car::findOrFail($id);
 return view('frontend.cars.booking', compact('car'));
    }
}

