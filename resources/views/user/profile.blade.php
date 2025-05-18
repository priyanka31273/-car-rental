{{-- resources/views/user/profile.blade.php --}}
@extends('layouts.frontend')

@section('title', 'My Profile & Rental History')

@section('content')
    <h2>Welcome, {{ Auth::user()->name }}</h2>

    <h3>Your Profile Info</h3>
    <ul>
        <li><strong>Name:</strong> {{ Auth::user()->name }}</li>
        <li><strong>Email:</strong> {{ Auth::user()->email }}</li>
        {{-- Add more profile fields if you want --}}
    </ul>

    <hr>

    <h3>My Rental History</h3>

    @if($rentals->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Car</th>
                    <th>Rental Period</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rentals as $rental)
                    @php
                        $status = strtolower($rental->status ?? '');

                        $badgeClass = match ($status) {
                            'pending' => 'badge bg-secondary',
                            'confirmed' => 'badge bg-primary',
                            'ongoing' => 'badge bg-warning text-dark',
                            'completed' => 'badge bg-success',
                            'cancelled' => 'badge bg-danger',
                            default => 'badge bg-info',
                        };
                    @endphp
                    <tr>
                        <td>{{ $rental->car->brand }} - {{ $rental->car->model }}</td>
                        <td>
                            {{ \Carbon\Carbon::parse($rental->start_date)->format('M d, Y') }} 
                            to 
                            {{ \Carbon\Carbon::parse($rental->end_date)->format('M d, Y') }}
                        </td>
                        <td>
                            <span class="{{ $badgeClass }}">{{ ucfirst($status) }}</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>You have not rented any cars yet.</p>
    @endif
@endsection
