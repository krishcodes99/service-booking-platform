<!DOCTYPE html>
<html>
<head>
    <title>Book Service</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <div class="max-w-xl mx-auto mt-10 bg-white p-8 rounded-2xl shadow-md">

        <h2 class="text-2xl font-bold mb-6 text-center">Book Service</h2>

        <form method="POST" action="/book">
            @csrf

            <input type="hidden" name="service_id" value="{{ $service->id }}">

            <div class="mb-4">
                <label class="block mb-1 font-medium">Booking Date</label>
                <input type="date" name="booking_date" 
                    class="w-full border rounded-lg px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Booking Time</label>
                <input type="time" name="booking_time" 
                    class="w-full border rounded-lg px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Address</label>
                <textarea name="address" 
                    class="w-full border rounded-lg px-3 py-2" required></textarea>
            </div>

            <div class="mb-6">
                <label class="block mb-1 font-medium">Phone</label>
                <input type="text" name="phone" 
                    class="w-full border rounded-lg px-3 py-2" required>
            </div>

            <button type="submit" 
                class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">
                Confirm Booking
            </button>

        </form>

    </div>

</body>
</html>