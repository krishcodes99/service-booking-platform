<!DOCTYPE html>
<html>
<head>
    <title>All Services</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <div class="max-w-6xl mx-auto py-10">

        <h2 class="text-3xl font-bold mb-6 text-center">All Services</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($services as $service)
                <div class="bg-white p-6 rounded-2xl shadow-md">

                    <h3 class="text-xl font-semibold mb-2">
                        {{ $service->name }}
                    </h3>

                    <p class="text-gray-600 mb-2">
                        {{ $service->description }}
                    </p>

                    <p class="font-bold text-green-600 mb-1">
                        ₹{{ $service->price }}
                    </p>

                    <p class="text-sm text-gray-500 mb-2">
                        Category: {{ $service->category }}
                    </p>

                    <p class="text-sm text-gray-500 mb-4">
                        Provider: {{ $service->user->name }}
                    </p>

                    <a href="/book/{{ $service->id }}" 
                       class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                        Book Now
                    </a>

                </div>
            @endforeach

        </div>

    </div>

</body>
</html>