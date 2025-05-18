@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <h2 class="mb-4">Admin Dashboard</h2>

    <div class="row">
        <!-- Total Cars -->
        <div class="col-md-4 mb-4">
            <a href="{{ route('admin.cars.index') }}" class="text-decoration-none">
                <div class="card text-white shadow h-100"style="background-color: #b30000;">
                    <div class="card-body text-center">
                        <h5 class="card-title">Total Cars</h5>
                        <h2>{{ $totalCars }}</h2>
                    </div>
                </div>
            </a>
        </div>

        <!-- Total Customers -->
        <div class="col-md-4 mb-4">
            <a href="{{ route('admin.customers.index') }}" class="text-decoration-none">
                <div class="card text-white shadow h-100" style="background-color: #00004d;">
                    <div class="card-body text-center">
                        <h5 class="card-title">Total Customers</h5>
                        <h2>{{ $totalCustomers }}</h2>
                    </div>
                </div>
            </a>
        </div>

        <!-- Total Rentals -->
        <div class="col-md-4 mb-4">
            <a href="{{ route('admin.rentals.index') }}" class="text-decoration-none">
                <div class="card text-white shadow h-100"style="background-color:rgb(133, 61, 123);">
                    <div class="card-body text-center">
                        <h5 class="card-title">Total Rentals</h5>
                        <h2>{{ $totalRentals }}</h2>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
