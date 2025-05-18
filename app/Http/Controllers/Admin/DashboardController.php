<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\User;
use App\Models\Rental;

class DashboardController extends Controller
{
  public function dashboard()
{
    $totalCars = Car::count();
    $totalCustomers = User::where('role', 'customer')->count(); // assuming role column
    $totalRentals = Rental::count();
   //dd($totalCars, $totalCustomers, $totalRentals);
    return view('admin.dashboard', compact('totalCars', 'totalCustomers', 'totalRentals'));
}
}
