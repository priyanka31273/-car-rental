@extends('layouts.frontend')

@section('title', 'Browse Cars')

@section('content')
<h2>Available Cars</h2>

<form method="GET" class="mb-4">
    <div class="row g-3">
        <div class="col-md-3">
            <input type="text" name="brand" value="{{ request('brand') }}" placeholder="Brand" class="form-control" />
        </div>
        <div class="col-md-3">
            <input type="text" name="car_type" value="{{ request('car_type') }}" placeholder="Car Type" class="form-control" />
        </div>
        <div class="col-md-2">
            <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min Price" class="form-control" min="0" />
        </div>
        <div class="col-md-2">
            <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max Price" class="form-control" min="0" />
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary w-100">Filter</button>
        </div>
    </div>
</form>

@if($cars->count())
    <div class="row">
        @foreach($cars as $car)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('storage/'.$car->image) }}" class="card-img-top" alt="{{ $car->name }}" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $car->name }}</h5>
                    <p class="card-text">
                        Brand: {{ $car->brand }}<br>
                        Type: {{ $car->car_type }}<br>
                        Daily Rent: ${{ number_format($car->daily_rent_price, 2) }}
                    </p>
                    <a href="{{ route('cars.show', $car->id) }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@else
    <p>No cars available with the selected filters.</p>
@endif
@endsection
