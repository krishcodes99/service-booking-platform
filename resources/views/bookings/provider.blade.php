<!DOCTYPE html>
<html>
<head>
    <title>Provider Bookings</title>
</head>
<body>

    <h2>Bookings for Your Services</h2>

    @foreach($bookings as $booking)
        <div style="border:1px solid #000; padding:10px; margin:10px;">
            
            <h3>Service: {{ $booking->service->name }}</h3>

            <p>Booked By: {{ $booking->user->name }}</p>

            <p>Date: {{ $booking->booking_date }}</p>
            <p>Time: {{ $booking->booking_time }}</p>

            <p>Address: {{ $booking->address }}</p>
            <p>Phone: {{ $booking->phone }}</p>

            <p>Status: {{ $booking->status }}</p>

            @if($booking->status == 'pending')
                <form method="POST" action="/booking/{{ $booking->id }}/accept" style="display:inline;">
                    @csrf
                    <button type="submit">Accept</button>
                </form>

                <form method="POST" action="/booking/{{ $booking->id }}/reject" style="display:inline;">
                    @csrf
                    <button type="submit">Reject</button>
                </form>
            @endif

        </div>
    @endforeach

</body>
</html>