<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Luvora Shop</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="max-w-7xl mx-auto p-8">

    <h1 class="text-3xl font-bold mb-8">
        Luvora Shop
    </h1>

    @if (empty($products))

        <div class="bg-white p-8 rounded-xl text-center">
            No products found.
        </div>

    @else

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            @foreach ($products as $product)

                <div class="bg-white rounded-xl shadow p-5">

                    <h2 class="text-xl font-semibold">
                        {{ $product['name'] ?? 'Product' }}
                    </h2>

                    <p class="text-gray-600 mt-2">
                        {{ $product['description'] ?? '' }}
                    </p>

                    <p class="font-bold mt-4">
                        ${{ $product['price'] ?? '0.00' }}
                    </p>

                    @if (isset($product['id']))
                        <a
                            href="/products/{{ $product['id'] }}"
                            class="inline-block mt-4 bg-black text-white px-4 py-2 rounded"
                        >
                            View Product
                        </a>
                    @endif

                </div>

            @endforeach

        </div>

    @endif

</div>

</body>
</html>