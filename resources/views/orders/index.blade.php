<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Orders - Luvora</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="max-w-6xl mx-auto p-8">

    <h1 class="text-3xl font-bold mb-8">
        My Orders
    </h1>

    @if (empty($orders))

        <div class="bg-white p-8 rounded-xl">
            You have no orders yet.
        </div>

    @else

        <div class="space-y-4">

            @foreach ($orders as $order)

                <div class="bg-white rounded-xl shadow p-6">

                    <p class="font-bold">
                        Order:
                        {{ $order['id'] ?? '' }}
                    </p>

                    <p class="mt-2">
                        Status:
                        {{ $order['status'] ?? 'Unknown' }}
                    </p>

                    <p class="mt-2">
                        Total:
                        ${{ $order['totalAmount'] ?? '0.00' }}
                    </p>

                </div>

            @endforeach

        </div>

    @endif

</div>

</body>
</html>