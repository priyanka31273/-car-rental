<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class RentalHistoryController extends Controller
{
    public function index()
    {
        /** @var User $user */
    $user = Auth::user();

    $rentals = $user->rentals()->with('car')->latest()->get();

    return view('frontend.rentals.history', compact('rentals'));
}
}

