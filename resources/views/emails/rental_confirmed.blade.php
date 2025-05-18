<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Booking Confirmed</title>
</head>
<body>
    <h2>Booking Confirmed</h2>
    <p>Dear {{ $rental->user->name }},</p>
    <p>Your booking for the car <strong>{{ $rental->car->model }}</strong> is confirmed.</p>
    <p>
        <strong>Rental Period:</strong><br>
        From: {{ $rental->start_date }}<br>
        To: {{ $rental->end_date }}
    </p>
    <p>Thank you for choosing our service!</p>
</body>
</html>
