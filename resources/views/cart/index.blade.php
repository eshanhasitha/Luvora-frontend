<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Cart - Luvora</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="max-w-6xl mx-auto p-8">

    <h1 class="text-3xl font-bold mb-8">
        My Cart
    </h1>

    <div class="bg-white rounded-xl shadow p-6">

        @if (empty($cart['items']))

            <p class="text-gray-600">
                Your cart is empty.
            </p>

        @else

            <div class="space-y-4">

                @foreach ($cart['items'] as $item)

                    <div class="border-b pb-4">

                        <h2 class="font-semibold">
                            Product ID:
                            {{ $item['productId'] ?? '' }}
                        </h2>

                        <p>
                            Quantity:
                            {{ $item['quantity'] ?? 0 }}
                        </p>

                        <p>
                            Unit Price:
                            ${{ $item['unitPrice'] ?? '0.00' }}
                        </p>

                    </div>

                @endforeach

            </div>

            <div class="mt-6 text-xl font-bold">
                Total:
                ${{ $cart['totalAmount'] ?? '0.00' }}
            </div>

        @endif

    </div>

</div>

</body>
</html>