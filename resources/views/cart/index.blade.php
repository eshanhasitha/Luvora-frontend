<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Bag | Luvora</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:opsz,wght@6..96,400;6..96,500&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-[#f7f8fa] font-['Inter'] text-[#191c1e]">
@php
    $items = $cart['items'] ?? [];
    $subtotal = (float) (data_get($cart, 'totalAmount') ?? data_get($cart, 'total') ?? data_get($cart, 'TotalAmount') ?? collect($items)->sum(fn ($item) => (float) (data_get($item, 'unitPrice') ?? data_get($item, 'UnitPrice') ?? data_get($item, 'price') ?? 0) * (int) (data_get($item, 'quantity') ?? data_get($item, 'Quantity') ?? 1)));
@endphp
<header class="border-b border-slate-200 bg-white">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-5 py-5 lg:px-8">
        <a href="{{ route('home') }}" class="flex items-center gap-3"><img src="{{ asset('images/logo.png') }}" alt="Luvora" class="h-10 w-auto"></a>
        <nav class="flex items-center gap-5 text-sm">
            <a href="{{ route('shop.index') }}" class="hidden text-slate-600 hover:text-blue-700 sm:block">Continue shopping</a>
            <a href="{{ route('cart.saved') }}" class="hidden text-slate-600 hover:text-blue-700 sm:block">Saved for later</a>
            <a href="{{ route('wishlist.index') }}" aria-label="Wishlist" class="text-slate-600 hover:text-blue-700"><span class="material-symbols-outlined">favorite</span></a>
            <button type="button" id="open-cart-drawer" class="font-semibold text-blue-700 hover:text-blue-900">Shopping bag ({{ count($items) }})</button>
        </nav>
    </div>
</header>
<main class="mx-auto max-w-7xl px-5 py-10 lg:px-8">
    <div class="mb-8 text-sm text-slate-500"><a href="{{ route('home') }}" class="hover:text-blue-700">Home</a><span class="mx-2">/</span><span class="text-slate-900">Shopping bag</span><span class="mx-2">·</span><a href="{{ route('cart.saved') }}" class="hover:text-blue-700">Saved for later</a></div>
    <div class="mb-8 flex flex-col justify-between gap-3 sm:flex-row sm:items-end">
        <div><p class="mb-2 text-xs font-semibold uppercase tracking-[0.2em] text-blue-700">Your selections</p><h1 class="font-['Bodoni_Moda'] text-4xl sm:text-5xl">Shopping bag</h1></div>
        <p class="text-sm text-slate-500">{{ count($items) }} {{ count($items) === 1 ? 'piece' : 'pieces' }} in your bag</p>
    </div>

    @if (!empty($cartUnavailable))
        <div class="mb-6 rounded-xl border border-amber-200 bg-amber-50 p-5 text-amber-900">Your cart service is temporarily unavailable. Please try again shortly.</div>
    @endif

    @if (empty($items))
        <section class="rounded-2xl border border-slate-200 bg-white px-6 py-16 text-center shadow-sm">
            <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-full bg-slate-100 text-slate-500"><span class="material-symbols-outlined text-3xl">shopping_bag</span></div>
            <h2 class="font-['Bodoni_Moda'] text-3xl">Your bag is empty</h2>
            <p class="mx-auto mt-3 max-w-md text-sm leading-6 text-slate-500">Explore our curated collection of island-made fashion, handloom pieces, and Ceylon jewelry.</p>
            <a href="{{ route('shop.index') }}" class="mt-7 inline-flex rounded-full bg-[#005baf] px-7 py-3 text-sm font-semibold text-white hover:bg-blue-800">Explore the shop</a>
        </section>
    @else
        <div class="grid grid-cols-1 items-start gap-8 lg:grid-cols-3">
            <section class="space-y-4 lg:col-span-2" aria-label="Cart items">
                @foreach ($items as $item)
                    @php
                        $name = data_get($item, 'product.name') ?? data_get($item, 'productName') ?? data_get($item, 'name') ?? 'Luvora creation';
                        $image = data_get($item, 'product.imageUrl') ?? data_get($item, 'imageUrl') ?? data_get($item, 'image') ?? data_get($item, 'product.image');
                        $quantity = (int) (data_get($item, 'quantity') ?? data_get($item, 'Quantity') ?? 1);
                        $price = (float) (data_get($item, 'unitPrice') ?? data_get($item, 'UnitPrice') ?? data_get($item, 'price') ?? 0);
                        $productId = data_get($item, 'productId') ?? data_get($item, 'ProductId') ?? data_get($item, 'product.id');
                    @endphp
                    <article class="flex gap-4 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm sm:gap-6 sm:p-6">
                        <a href="{{ $productId ? route('products.show', $productId) : route('shop.index') }}" class="flex h-32 w-24 shrink-0 items-center justify-center overflow-hidden rounded-xl bg-slate-100 sm:h-40 sm:w-32">
                            @if ($image)<img src="{{ $image }}" alt="{{ $name }}" class="h-full w-full object-cover">@else<span class="material-symbols-outlined text-4xl text-slate-400">checkroom</span>@endif
                        </a>
                        <div class="flex min-w-0 flex-1 flex-col justify-between py-1">
                            <div><p class="text-xs uppercase tracking-widest text-slate-500">{{ data_get($item, 'product.brand') ?? data_get($item, 'brand') ?? 'Luvora Atelier' }}</p><h2 class="mt-2 font-['Bodoni_Moda'] text-xl sm:text-2xl"><a href="{{ $productId ? route('products.show', $productId) : route('shop.index') }}" class="hover:text-blue-700">{{ $name }}</a></h2><p class="mt-2 line-clamp-2 text-sm text-slate-500">{{ data_get($item, 'product.description') ?? data_get($item, 'description') ?? '' }}</p></div>
                            <div class="mt-4 flex flex-wrap items-center justify-between gap-3"><span class="text-sm text-slate-500">Quantity: <strong class="text-slate-900">{{ $quantity }}</strong></span><span class="font-semibold">LKR {{ number_format($price * $quantity, 2) }}</span></div>
                        </div>
                    </article>
                @endforeach
            </section>
            <aside class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm lg:sticky lg:top-6">
                <h2 class="font-['Bodoni_Moda'] text-2xl">Order summary</h2>
                <div class="mt-6 space-y-4 border-b border-slate-200 pb-5 text-sm"><div class="flex justify-between"><span class="text-slate-500">Subtotal</span><span>LKR {{ number_format($subtotal, 2) }}</span></div><div class="flex justify-between"><span class="text-slate-500">Delivery</span><span class="text-emerald-700">Calculated at checkout</span></div></div>
                <div class="mt-5 flex justify-between font-semibold"><span>Total</span><span>LKR {{ number_format($subtotal, 2) }}</span></div>
                <a href="{{ route('checkout.index') }}" class="mt-6 block w-full rounded-full bg-[#005baf] px-6 py-3 text-center text-sm font-semibold text-white hover:bg-blue-800">Continue to checkout</a>
                <a href="{{ route('shop.index') }}" class="mt-4 block text-center text-sm font-medium text-blue-700 hover:underline">Continue shopping</a>
                <p class="mt-6 flex items-center justify-center gap-2 border-t border-slate-100 pt-5 text-center text-xs text-slate-500"><span class="material-symbols-outlined text-base">lock</span>Secure checkout � Island-wide delivery</p>
            </aside>
        </div>
    @endif
</main>
<div id="cart-drawer-backdrop" class="fixed inset-0 z-40 hidden bg-slate-950/40" aria-hidden="true"></div>
<aside id="cart-drawer" class="fixed inset-y-0 right-0 z-50 flex w-full max-w-md translate-x-full flex-col bg-white shadow-2xl transition-transform duration-300" role="dialog" aria-modal="true" aria-labelledby="cart-drawer-title" aria-hidden="true">
    <div class="flex items-center justify-between border-b border-slate-200 px-6 py-5"><div><p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-blue-700">Curated vault</p><h2 id="cart-drawer-title" class="mt-1 font-['Bodoni_Moda'] text-2xl">Your Sanctuary Selection</h2></div><button type="button" id="close-cart-drawer" class="rounded-full p-2 text-slate-500 hover:bg-slate-100" aria-label="Close shopping bag"><span class="material-symbols-outlined">close</span></button></div>
    <div class="flex-1 overflow-y-auto px-6">
        @if (empty($items))
            <div class="py-16 text-center"><span class="material-symbols-outlined text-4xl text-slate-400">shopping_bag</span><p class="mt-3 font-['Bodoni_Moda'] text-2xl">Your bag is empty</p><a href="{{ route('shop.index') }}" class="mt-5 inline-block text-sm font-semibold text-blue-700 hover:underline">Explore the shop</a></div>
        @else
            <div class="my-5 rounded-xl bg-slate-50 p-4"><p class="text-sm font-semibold">A considered choice</p><p class="mt-1 text-xs leading-5 text-slate-500">Review your selected pieces and continue to secure checkout.</p></div>
            <div class="divide-y divide-slate-100">
                @foreach ($items as $item)
                    @php
                        $drawerName = data_get($item, 'product.name') ?? data_get($item, 'productName') ?? data_get($item, 'name') ?? 'Luvora creation';
                        $drawerImage = data_get($item, 'product.imageUrl') ?? data_get($item, 'imageUrl') ?? data_get($item, 'image') ?? data_get($item, 'product.image');
                        $drawerQty = (int) (data_get($item, 'quantity') ?? data_get($item, 'Quantity') ?? 1);
                        $drawerPrice = (float) (data_get($item, 'unitPrice') ?? data_get($item, 'UnitPrice') ?? data_get($item, 'price') ?? 0);
                    @endphp
                    <article class="flex gap-4 py-5"><div class="flex h-24 w-20 shrink-0 items-center justify-center overflow-hidden rounded-lg bg-slate-100">@if ($drawerImage)<img src="{{ $drawerImage }}" alt="{{ $drawerName }}" class="h-full w-full object-cover">@else<span class="material-symbols-outlined text-3xl text-slate-400">checkroom</span>@endif</div><div class="min-w-0 flex-1"><h3 class="font-['Bodoni_Moda'] text-lg leading-tight">{{ $drawerName }}</h3><p class="mt-2 text-xs text-slate-500">Quantity: {{ $drawerQty }}</p><p class="mt-3 text-sm font-semibold">LKR {{ number_format($drawerPrice * $drawerQty, 2) }}</p></div></article>
                @endforeach
            </div>
        @endif
    </div>
    @if (!empty($items))<div class="border-t border-slate-200 px-6 py-5"><div class="flex justify-between text-sm"><span class="text-slate-500">Subtotal</span><strong>LKR {{ number_format($subtotal, 2) }}</strong></div><p class="mt-2 text-xs text-slate-500">Delivery is calculated during checkout.</p><a href="{{ route('checkout.index') }}" class="mt-5 block rounded-full bg-[#005baf] px-6 py-3 text-center text-sm font-semibold text-white hover:bg-blue-800">Continue to checkout</a><a href="{{ route('cart.index') }}" class="mt-3 block text-center text-xs font-semibold text-blue-700 hover:underline">View full bag</a></div>@endif
</aside>
<script>
    (() => {
        const drawer = document.getElementById('cart-drawer');
        const backdrop = document.getElementById('cart-drawer-backdrop');
        const openButton = document.getElementById('open-cart-drawer');
        const closeButton = document.getElementById('close-cart-drawer');
        const setOpen = (open) => {
            drawer.classList.toggle('translate-x-full', !open);
            backdrop.classList.toggle('hidden', !open);
            drawer.setAttribute('aria-hidden', String(!open));
            backdrop.setAttribute('aria-hidden', String(!open));
            document.body.classList.toggle('overflow-hidden', open);
            if (open) closeButton.focus(); else openButton.focus();
        };
        openButton.addEventListener('click', () => setOpen(true));
        closeButton.addEventListener('click', () => setOpen(false));
        backdrop.addEventListener('click', () => setOpen(false));
        document.addEventListener('keydown', (event) => { if (event.key === 'Escape' && drawer.getAttribute('aria-hidden') === 'false') setOpen(false); });
    })();
</script>
@include('partials.site-footer')</body>
</html>
