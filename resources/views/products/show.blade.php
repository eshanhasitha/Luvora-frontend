<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ data_get($product, 'name') ?? data_get($product, 'Name') ?? 'Product' }} | Luvora</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:opsz,wght@6..96,400;6..96,500;6..96,600&family=Inter:wght@400;500;600&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-[#f7f9fb] font-['Plus_Jakarta_Sans'] text-[#191c1e]">
@php
    $name = data_get($product, 'name') ?? data_get($product, 'Name') ?? 'Luvora creation';
    $description = data_get($product, 'description') ?? data_get($product, 'Description') ?? '';
    $price = data_get($product, 'price') ?? data_get($product, 'Price');
    $currency = data_get($product, 'currency') ?? data_get($product, 'Currency') ?? 'LKR';
    $image = data_get($product, 'imageUrl') ?? data_get($product, 'ImageUrl') ?? data_get($product, 'image') ?? data_get($product, 'Image') ?? data_get($product, 'images.0.url') ?? data_get($product, 'images.0');
    $category = data_get($product, 'category.name') ?? data_get($product, 'categoryName') ?? data_get($product, 'category') ?? 'Luvora collection';
    $sku = data_get($product, 'sku') ?? data_get($product, 'SKU');
    $stock = data_get($product, 'stock') ?? data_get($product, 'stockQuantity') ?? data_get($product, 'Stock');
@endphp

@include('partials.site-header')
<main class="mx-auto max-w-7xl px-5 py-7 lg:px-8">
    <nav aria-label="Breadcrumb" class="mb-7 text-xs text-slate-500"><a href="{{ route('home') }}" class="hover:text-blue-700">Home</a><span class="mx-2">/</span><a href="{{ route('shop.index') }}" class="hover:text-blue-700">Shop</a><span class="mx-2">/</span><span class="text-slate-800">{{ $name }}</span></nav>
    @if (!empty($productUnavailable))<div role="status" class="mb-6 rounded-xl border border-amber-200 bg-amber-50 p-4 text-sm leading-6 text-amber-900">Product details are temporarily unavailable because the product service could not be reached.</div>@endif
    <div class="grid gap-8 lg:grid-cols-2 lg:gap-14">
        <section aria-label="Product image" class="overflow-hidden rounded-2xl bg-[#eceef0]">
            @if ($image)
                <img src="{{ $image }}" alt="{{ $name }}" class="aspect-[4/5] w-full object-cover">
            @else
                <div class="flex aspect-[4/5] flex-col items-center justify-center gap-3 text-slate-400"><span class="material-symbols-outlined text-6xl">checkroom</span><span class="text-sm">Product image unavailable</span></div>
            @endif
        </section>
        <section class="py-2 lg:py-7">
            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-blue-700">{{ is_scalar($category) ? $category : 'Luvora collection' }}</p>
            <h1 class="mt-3 font-['Bodoni_Moda'] text-4xl leading-tight sm:text-5xl">{{ $name }}</h1>
            @if ($sku)<p class="mt-3 text-xs uppercase tracking-widest text-slate-500">Item {{ $sku }}</p>@endif
            @if ($price !== null)<p class="mt-6 text-xl font-semibold">{{ $currency }} {{ number_format((float) $price, 2) }}</p>@else<p class="mt-6 text-sm text-slate-500">Price available at checkout</p>@endif
            @if ($stock !== null)<p class="mt-2 text-xs {{ (int) $stock > 0 ? 'text-emerald-700' : 'text-rose-700' }}">{{ (int) $stock > 0 ? 'Available' : 'Currently unavailable' }}</p>@endif
            <div class="my-7 h-px bg-slate-200"></div>
            @if ($description)<div class="max-w-xl whitespace-pre-line text-sm leading-7 text-slate-600">{{ $description }}</div>@else<p class="text-sm leading-7 text-slate-500">Details for this piece have not been provided yet.</p>@endif
            <div class="mt-8 rounded-xl border border-slate-200 bg-white p-5">
                <div class="flex items-start gap-3"><span class="material-symbols-outlined text-blue-700">shopping_bag</span><div><h2 class="text-sm font-semibold">Add this piece to your bag</h2><p class="mt-1 text-xs leading-5 text-slate-500">Your cart service currently supports viewing the bag. Adding products will be available when its add-item endpoint is connected.</p></div></div>
                <a href="{{ route('cart.index') }}" class="mt-5 block rounded-full border border-blue-700 px-6 py-3 text-center text-sm font-semibold text-blue-700 hover:bg-blue-50">View shopping bag</a>
                <form method="POST" action="{{ route('compare.add') }}" class="mt-3">@csrf<input type="hidden" name="slug" value="{{ $slug }}"><button class="w-full rounded-full px-6 py-2 text-sm font-medium text-slate-600 hover:bg-slate-50">Add to compare</button></form>
            </div>
            <div class="mt-7 grid gap-3 text-xs text-slate-600 sm:grid-cols-2"><a href="{{ route('customer-care.delivery') }}" class="flex items-center gap-2 hover:text-blue-700"><span class="material-symbols-outlined text-base text-blue-700">local_shipping</span><span>Delivery information</span></a><a href="{{ route('customer-care.returns') }}" class="flex items-center gap-2 hover:text-blue-700"><span class="material-symbols-outlined text-base text-blue-700">assignment_return</span><span>Returns &amp; exchanges</span></a></div>
            <div class="mt-7 flex flex-wrap gap-x-5 gap-y-2 border-t border-slate-200 pt-5 text-xs font-semibold text-blue-700"><a href="{{ route('products.reviews',$slug) }}" class="hover:underline">Customer reviews</a><a href="{{ route('products.availability',$slug) }}" class="hover:underline">Check availability</a><a href="{{ route('customer-care.size-guide') }}" class="hover:underline">Size guide</a><a href="{{ route('recently-viewed') }}" class="hover:underline">Recently viewed</a></div>
        </section>
    </div>
</main>
@include('partials.site-footer')</body>
</html>
