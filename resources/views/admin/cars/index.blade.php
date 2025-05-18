@extends('layouts.admin')

@section('title', 'Manage Cars')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Cars</h2>
    <a href="{{ route('admin.cars.create') }}" class="btn btn-primary">Add New Car</a>
</div>

@if($cars->count())
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Year</th>
            <th>Type</th>
            <th>Daily Rent Price</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cars as $car)
        <tr>
            <td>{{ $car->name }}</td>
            <td>{{ $car->brand }}</td>
            <td>{{ $car->model }}</td>
            <td>{{ $car->year }}</td>
            <td>{{ $car->car_type }}</td>
            <td>${{ number_format($car->daily_rent_price, 2) }}</td>
            <td><img src="{{ asset('storage/'.$car->image) }}" alt="{{ $car->name }}" width="80"></td>
            <td>
                <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn btn-sm btn-success">Edit</a>

                <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Delete this car?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $cars->links() }}
@else
<p>No cars found.</p>
@endif
@endsection
