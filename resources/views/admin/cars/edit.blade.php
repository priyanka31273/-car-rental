@extends('layouts.admin')

@section('title', 'Edit Car')

@section('content')
<h2>Edit Car</h2>

<form action="{{ route('admin.cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Car Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $car->name) }}" required />
    </div>

    <div class="mb-3">
        <label for="brand" class="form-label">Brand</label>
        <input type="text" name="brand" id="brand" class="form-control" value="{{ old('brand', $car->brand) }}" required />
    </div>

    <div class="mb-3">
        <label for="model" class="form-label">Model</label>
        <input type="text" name="model" id="model" class="form-control" value="{{ old('model', $car->model) }}" required />
    </div>

    <div class="mb-3">
        <label for="year" class="form-label">Year</label>
        <input type="number" name="year" id="year" class="form-control" value="{{ old('year', $car->year) }}" min="1900" max="{{ date('Y') }}" required />
    </div>

    <div class="mb-3">
        <label for="car_type" class="form-label">Car Type</label>
        <input type="text" name="car_type" id="car_type" class="form-control" value="{{ old('car_type', $car->car_type) }}" required />
    </div>

    <div class="mb-3">
        <label for="daily_rent_price" class="form-label">Daily Rent Price</label>
        <input type="number" step="0.01" name="daily_rent_price" id="daily_rent_price" class="form-control" value="{{ old('daily_rent_price', $car->daily_rent_price) }}" min="0" required />
    </div>

    <div class="mb-3">
        <label>Current Image</label><br>
        <img src="{{ asset('storage/'.$car->image) }}" alt="{{ $car->name }}" width="120" class="mb-3" />
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Change Image (optional)</label>
        <input type="file" name="image" id="image" class="form-control" />
    </div>

     <div class="mb-3">
    <label for="availability" class="form-label">Availability</label>
    <select name="availability" id="availability" class="form-control" required>
        <option value="">-- Select --</option>
        <option value="1">Available</option>
        <option value="0">Unavailable</option>
    </select>
</div>
    <button class="btn btn-success" type="submit">Update Car</button>
    <a href="{{ route('admin.cars.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
