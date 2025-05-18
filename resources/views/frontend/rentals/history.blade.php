@extends('layouts.frontend')

@section('title', 'My Rental History')

@section('content')
<div class="container my-4">
    <h2 class="mb-3">My Rentals</h2>

    @if($rentals->count())
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Car</th>
                <th>Rental Period</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rentals as $rental)
            <tr>
                <td>{{ $rental->car->model }} ({{ $rental->car->brand }})</td>
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
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="alert alert-info">
        You have not rented any cars yet.
    </div>
    @endif
</div>
@endsection
