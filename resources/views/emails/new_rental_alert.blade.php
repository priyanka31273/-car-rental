<!DOCTYPE html>
<html>
<head>
    <title>New Rental Alert</title>
</head>
<body>
    <h1>New Car Rental Booked</h1>
    <p><strong>Customer:</strong> {{ $rental->user->name }}</p>
    <p><strong>Car:</strong> {{ $rental->car->name }}</p>
    <p><strong>From:</strong> {{ $rental->start_date }}</p>
    <p><strong>To:</strong> {{ $rental->end_date }}</p>
    <p><strong>Status:</strong> {{ $rental->status }}</p>
</body>
</html>
