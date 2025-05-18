@extends('layouts.frontend')

@section('title', 'Book Car')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg">
        <div class="row g-0">
            <div class="col-md-5">
                <img src="{{ asset('storage/' . $car->image) }}" class="img-fluid rounded-start h-100" alt="{{ $car->model }}">
            </div>
            <div class="col-md-7">
                <div class="card-body p-4">
                    <h2 class="card-title mb-3 text-success">{{ $car->brand }} - {{ $car->model }}</h2>
                    <ul class="list-group list-group-flush mb-3">
                        <li class="list-group-item"><strong>Year:</strong> {{ $car->year }}</li>
                        <li class="list-group-item"><strong>Type:</strong> {{ ucfirst($car->car_type) }}</li>
                        <li class="list-group-item"><strong>Daily Rent Price:</strong> ${{ number_format($car->daily_rent_price, 2) }}</li>
                        <li class="list-group-item"><strong>Availability:</strong>
                            @if($car->availability)
                                <span class="badge bg-success">Available</span>
                            @else
                                <span class="badge bg-danger">Not Available</span>
                            @endif
                        </li>
                    </ul>

                    @if($car->availability)
                    <form action="{{ route('rentals.store') }}" method="POST" class="mt-4">
                        @csrf
                        <input type="hidden" name="car_id" value="{{ $car->id }}">

                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" name="start_date" class="form-control" required min="{{ now()->toDateString() }}">
                        </div>

                        <div class="mb-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" name="end_date" class="form-control" required min="{{ now()->toDateString() }}">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Confirm Booking</button>
                    </form>
                    @else
                    <div class="alert alert-warning mt-4">
                        This car is currently not available for booking.
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
