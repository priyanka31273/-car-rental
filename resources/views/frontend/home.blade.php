@extends('layouts.frontend')

@section('title', 'Home')

@section('content')
{{-- Hero Section --}}
<div class=" text-white text-center py-2 mb-2"style="background-color:rgb(126, 51, 161);>
    <div class="container">
        <h1 class="display-4 fw-bold">Explore Our Car Collection</h1>
        <p class="lead">Rent your dream car at the best price and convenience.</p>
 
    </div>
</div>

{{-- Browse Cars --}}
<div class="container mb-5" id="cars">
    <h2 class="text-center mb-4">Browse Our Cars</h2>
    <div class="row">
    @forelse($cars as $car)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card h-100 shadow-sm border-0 rounded-4">
                @if($car->image)
                    <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top rounded-top-4" style="height: 220px; object-fit: cover;" alt="{{ $car->model }}">
                @else
                    <img src="https://via.placeholder.com/400x200?text=No+Image" class="card-img-top rounded-top-4" alt="No Image">
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-primary fw-bold"><strong>Brand </strong>{{ $car->brand }}</h5>
                    <h6 class="text-muted mb-2"><strong>Model </strong>{{ $car->model }}</h6>
                     <h6 class="text-muted mb-2"><strong>Daily Rent Price: </strong>{{ $car->daily_rent_price }}</h6>
       
                    <a href="{{ route('booking.form', $car->id) }}" class="btn btn-outline-primary mt-auto rounded-pill">
                        Book Now
                    </a>
                </div>
            </div>
        </div>
    @empty
        <p class="text-center">No cars available at the moment.</p>
    @endforelse
</div>

</div>

{{-- About Section --}}
<div class="bg-light py-5">
    <div class="container">
        <h3 class="text-center mb-4">Why Rent From Us?</h3>
        <div class="row text-center">
            <div class="col-md-4 mb-3">
                <div class="p-4 shadow-sm bg-white rounded">
                    <i class="bi bi-car-front fs-1 text-primary mb-3"></i>
                    <h5>Wide Range of Cars</h5>
                    <p>Choose from economy to luxury cars for every need.</p>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="p-4 shadow-sm bg-white rounded">
                    <i class="bi bi-currency-dollar fs-1 text-success mb-3"></i>
                    <h5>Affordable Pricing</h5>
                    <p>Transparent pricing with no hidden charges.</p>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="p-4 shadow-sm bg-white rounded">
                    <i class="bi bi-geo-alt fs-1 text-danger mb-3"></i>
                    <h5>Easy Pickup</h5>
                    <p>Convenient pickup locations and home delivery available.</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Contact/Address --}}
<div class="bg-dark text-white py-4">
    <div class="container text-center">
        <h5>Contact Us</h5>
        <p class="mb-0">Car Rental Service, 123 Main Street, Dhaka, Bangladesh</p>
        <p>Email: abc@carrental.com | Phone: +880 1234 567890</p>
    </div>
</div>
@endsection
