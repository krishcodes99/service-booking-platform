<!DOCTYPE html>
<html>
<head>
    <title>My Bookings</title>
</head>
<body>

    <h2>My Bookings</h2>

    @foreach($bookings as $booking)
        <div style="border:1px solid #000; padding:10px; margin:10px;">
            
            <h3>Service: {{ $booking->service->name }}</h3>

            <p>Date: {{ $booking->booking_date }}</p>
            <p>Time: {{ $booking->booking_time }}</p>

            <p>Address: {{ $booking->address }}</p>
            <p>Phone: {{ $booking->phone }}</p>

            <p>Status: {{ $booking->status }}</p>

        </div>
    @endforeach

</body>
</html>