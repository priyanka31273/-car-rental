<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::with('car', 'user')->latest()->get();
        return view('admin.rentals.index', compact('rentals'));
    }

    public function show(Rental $rental)
    {
        $rental->load('car', 'user');
        return view('admin.rentals.show', compact('rental'));
    }

    public function edit(Rental $rental)
    {
        return view('admin.rentals.edit', compact('rental'));
    }

    public function update(Request $request, Rental $rental)
    {
        $data = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $days = now()->parse($data['start_date'])->diffInDays(now()->parse($data['end_date'])) + 1;
        $data['total_cost'] = $rental->car->daily_rent_price * $days;

        $rental->update($data);

        return redirect()->route('admin.rentals.index')->with('success', 'Rental updated.');
    }

    public function destroy(Rental $rental)
    {
        $rental->delete();
        return redirect()->route('admin.rentals.index')->with('success', 'Rental deleted.');
    }

    public function updateStatus(Request $request, $id)
{
    $rental = Rental::findOrFail($id);
    $rental->status = $request->input('status');
    $rental->save();

    return redirect()->back()->with('success', 'Rental status updated to ' . ucfirst($rental->status) . '.');
}

}
