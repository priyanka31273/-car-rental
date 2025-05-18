<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::where('availability', true);

        if ($request->car_type) {
            $query->where('car_type', $request->car_type);
        }

        if ($request->brand) {
            $query->where('brand', $request->brand);
        }

        if ($request->min_price && $request->max_price) {
            $query->whereBetween('daily_rent_price', [$request->min_price, $request->max_price]);
        }

        $cars = $query->get();

        return view('frontend.cars.index', compact('cars'));
    }

    public function show($id)
    {
        $car = Car::findOrFail($id);
        return view('frontend.cars.show', compact('car'));
    }
}

