@extends('layouts.frontend')

@section('title', 'Car Details')

@section('content')
<div class="row">
    <div class="col-md-6">
        <img src="{{ asset('storage/'.$car->image) }}" alt="{{ $car->name }}" class="img-fluid" />
    </div>
    <div class="col-md-6">
        <h2>{{ $car->name }}</h2>
        <p><strong>Brand:</strong> {{ $car->brand }}</p>
        <p><strong>Model:</strong> {{ $car->model }}</p>
        <p><strong>Year:</strong> {{ $car->year }}</p>
        <p><strong>Type:</strong> {{ $car->car_type }}</p>
        <p><strong>Daily Rent Price:</strong> ${{ number_format($car->daily_rent_price, 2) }}</p>

        @auth
            @if(auth()->user()->isCustomer())
                <h4>Book this car</h4>
                <form action="{{ route('rentals.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="car_id" value="{{ $car->id }}" />
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" required min="{{ date('Y-m-d') }}" />
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" required min="{{ date('Y-m-d') }}" />
                    </div>
                    <button type="submit" class="btn btn-success">Book Now</button>
                </form>
            @else
                <p><em>Only customers can book cars.</em></p>
            @endif
        @else
            <p><a href="{{ route('login') }}">Login</a> or <a href="{{ route('register') }}">register</a> to book this car.</p>
        @endauth
    </div>
</div>
@endsection
