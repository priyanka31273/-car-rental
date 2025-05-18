@extends('layouts.admin')

@section('title', 'Manage Customers')

@section('content')
<h2>Customers</h2>

@if($customers->count())
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Registered At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
        <tr>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->created_at->format('Y-m-d') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $customers->links() }}
@else
<p>No customers found.</p>
@endif
@endsection
