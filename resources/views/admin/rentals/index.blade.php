@extends('layouts.admin')

@section('title', 'Manage Rentals')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">All Rental Bookings</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($rentals->count())
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Customer</th>
                <th>Car</th>
                <th>Rental Period</th>
                <th>Status</th>
                <th>Change Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rentals as $rental)
            <tr>
                <td>{{ $rental->user->name }}</td>
                <td>{{ $rental->car->brand }} {{ $rental->car->model }}</td>
                <td>
                    {{ \Carbon\Carbon::parse($rental->start_date)->format('M d, Y') }}
                    to
                    {{ \Carbon\Carbon::parse($rental->end_date)->format('M d, Y') }}
                </td>
                <td>
                    @php
                        $status = strtolower($rental->status ?? '');
                        $badgeClass = match ($status) {
                            'pending'    => 'badge bg-secondary',
                            'confirmed'  => 'badge bg-primary',
                            'processing' => 'badge bg-warning text-dark',
                            'ongoing'    => 'badge bg-info text-dark',
                            'completed'  => 'badge bg-success',
                            'cancelled'  => 'badge bg-danger',
                            default      => 'badge bg-light text-dark',
                        };
                    @endphp
                    <span class="{{ $badgeClass }}">{{ ucfirst($status) }}</span>
                </td>
                <td>
                    <form action="{{ route('admin.rentals.updateStatus', $rental->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="pending"    {{ $rental->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="confirmed"  {{ $rental->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="processing" {{ $rental->status == 'processing' ? 'selected' : '' }}>Processing</option>
                            <option value="ongoing"    {{ $rental->status == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                            <option value="completed"  {{ $rental->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled"  {{ $rental->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <div class="alert alert-info">No rentals found.</div>
    @endif
</div>
@endsection
