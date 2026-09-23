<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>
        {{ $product['name'] ?? 'Product' }} - Luvora
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="max-w-4xl mx-auto p-8">

    <a
        href="/shop"
        class="text-gray-600"
    >
        ← Back to Shop
    </a>

    <div class="bg-white rounded-xl shadow p-8 mt-6">

        <h1 class="text-3xl font-bold">
            {{ $product['name'] ?? 'Product' }}
        </h1>

        <p class="mt-4 text-gray-600">
            {{ $product['description'] ?? '' }}
        </p>

        <p class="text-2xl font-bold mt-6">
            ${{ $product['price'] ?? '0.00' }}
        </p>

    </div>

</div>

</body>
</html>