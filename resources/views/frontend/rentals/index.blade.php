@extends('layouts.frontend')

@section('title', 'My Bookings')

@section('content')
<h2>My Bookings</h2>

@if($rentals->count())
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Car</th>
            <th>Rental Period</th>
            <th>Total Cost</th>
            <th>Status</th>
            <th>Action</th>
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
            <td>${{ number_format($rental->total_cost, 2) }}</td>
            <td>
                @php
                    $today = \Carbon\Carbon::today();
                    $start = \Carbon\Carbon::parse($rental->start_date);
                    $end = \Carbon\Carbon::parse($rental->end_date);

                    if ($end->lt($today)) {
                        echo '<span class="badge bg-success">Completed</span>';
                    } elseif ($start->gt($today)) {
                        echo '<span class="badge bg-info">Upcoming</span>';
                    } else {
                        echo '<span class="badge bg-warning text-dark">Ongoing</span>';
                    }
                @endphp
            </td>
            <td>
                @if(\Carbon\Carbon::parse($rental->start_date)->gt(\Carbon\Carbon::today()))
                <form action="{{ route('rentals.cancel', $rental->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this booking?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                </form>
                @else
                <span class="text-muted">No action</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>You have no bookings yet.</p>
@endif
@endsection
