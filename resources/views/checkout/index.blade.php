<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout Overview | Luvora</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:opsz,wght@6..96,400;6..96,500;6..96,600&family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config={theme:{extend:{fontFamily:{display:['Bodoni Moda','serif'],body:['Plus Jakarta Sans','sans-serif'],label:['Inter','sans-serif']},colors:{primary:'#005baf',surface:'#f7f9fb',ink:'#191c1e',tertiary:'#006947'}}}}</script>
</head>
<body class="min-h-screen bg-surface font-body text-ink">
@php
    $items = $cart['items'] ?? [];
    $subtotal = (float) (data_get($cart, 'totalAmount') ?? data_get($cart, 'total') ?? data_get($cart, 'TotalAmount') ?? collect($items)->sum(fn ($item) => (float) (data_get($item, 'unitPrice') ?? data_get($item, 'UnitPrice') ?? data_get($item, 'price') ?? 0) * (int) (data_get($item, 'quantity') ?? data_get($item, 'Quantity') ?? 1)));
    $fullName = data_get($user, 'fullName') ?? data_get($user, 'name') ?? data_get($user, 'Name') ?? 'Luvora customer';
    $email = data_get($user, 'email') ?? data_get($user, 'Email') ?? '';
    $phone = data_get($user, 'phoneNumber') ?? data_get($user, 'phone') ?? data_get($user, 'PhoneNumber') ?? '';
    $delivery = $subtotal >= 15000 ? 0 : ($subtotal > 0 ? 1200 : 0);
    $total = $subtotal + $delivery;
@endphp
<div class="bg-ink px-4 py-2 text-center text-[11px] font-semibold uppercase tracking-wider text-white">Island-wide Sri Lanka Express Delivery · Free shipping over LKR 15,000 · Colombo Same-Day Available</div>
<header class="border-b border-slate-200 bg-white/95">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-5 py-5 lg:px-8">
        <a href="{{ route('home') }}" class="flex items-center gap-3"><img src="{{ asset('images/logo.png') }}" alt="Luvora" class="h-10 w-auto"></a>
        <a href="{{ route('cart.index') }}" class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-slate-600 hover:text-primary"><span class="material-symbols-outlined text-base">arrow_back</span> Sanctuary bag ({{ count($items) }})</a>
        <div class="hidden items-center gap-2 text-xs font-semibold uppercase tracking-wider text-tertiary sm:flex"><span class="material-symbols-outlined text-base">lock</span> Secure checkout</div>
    </div>
</header>
<main class="mx-auto max-w-7xl px-5 py-8 lg:px-8">
    <div class="mb-7">
        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-primary">Checkout overview</p>
        <h1 class="mt-2 font-display text-4xl sm:text-5xl">Your order, thoughtfully delivered</h1>
        <p class="mt-2 text-sm text-slate-500">Review your details and preferences before placing your order.</p>
    </div>

    @if (!empty($cartUnavailable))
        <div class="mb-6 rounded-xl border border-amber-200 bg-amber-50 p-5 text-amber-900">Your cart service is temporarily unavailable. Please return to your bag and try again shortly.</div>
    @elseif (empty($items))
        <section class="rounded-2xl border border-slate-200 bg-white px-6 py-16 text-center shadow-sm">
            <span class="material-symbols-outlined text-4xl text-slate-400">shopping_bag</span>
            <h2 class="mt-4 font-display text-3xl">Your bag is empty</h2>
            <p class="mt-2 text-sm text-slate-500">Add something lovely before starting checkout.</p>
            <a href="{{ route('shop.index') }}" class="mt-6 inline-flex rounded-full bg-primary px-7 py-3 text-sm font-semibold text-white hover:bg-blue-800">Explore the shop</a>
        </section>
    @else
        <div class="mb-7 rounded-xl bg-white p-4 shadow-sm sm:p-5">
            <div class="flex items-center justify-between gap-1">
                @foreach ([['01', 'Customer'], ['02', 'Address'], ['03', 'Delivery'], ['04', 'Payment'], ['05', 'Review']] as $index => [$step, $label])
                    <div class="flex min-w-0 items-center gap-2">
                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full {{ $index < 2 ? 'bg-primary text-white ring-4 ring-blue-100' : 'bg-slate-100 text-slate-500' }} text-xs font-bold">{{ $index === 0 ? '✓' : $step }}</span>
                        <span class="hidden text-[10px] font-semibold uppercase tracking-wider {{ $index === 1 ? 'text-primary' : ($index === 0 ? 'text-tertiary' : 'text-slate-400') }} md:inline">{{ $label }}</span>
                    </div>
                    @if ($index < 4)<div class="h-0.5 min-w-2 flex-1 {{ $index === 0 ? 'bg-tertiary' : 'bg-slate-200' }}"></div>@endif
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-1 items-start gap-6 lg:grid-cols-12 lg:gap-8">
            <div class="flex flex-col gap-4 lg:col-span-7">
                <section class="rounded-xl bg-white p-5 shadow-sm sm:p-6">
                    <div class="flex items-center justify-between gap-3">
                        <div class="flex items-center gap-3"><span class="flex h-8 w-8 items-center justify-center rounded-full bg-emerald-50 text-sm font-bold text-tertiary">✓</span><div><p class="text-[10px] font-semibold uppercase tracking-widest text-slate-500">Step 01 · Customer &amp; contact</p><h2 class="mt-1 font-display text-xl">{{ $fullName }}</h2></div></div>
                        <a href="{{ route('dashboard') }}" class="text-xs font-semibold uppercase tracking-wider text-primary hover:underline">Edit</a>
                    </div>
                    <div class="mt-4 grid gap-2 border-t border-slate-100 pt-4 text-sm text-slate-600 sm:grid-cols-2">
                        @if ($email)<p class="flex items-center gap-2"><span class="material-symbols-outlined text-base">mail</span>{{ $email }}</p>@endif
                        @if ($phone)<p class="flex items-center gap-2"><span class="material-symbols-outlined text-base">phone_iphone</span>{{ $phone }}</p>@endif
                        @if (!$email && !$phone)<p class="text-slate-500">Contact details are not available in your profile.</p>@endif
                    </div>
                </section>

                <section class="rounded-xl border border-blue-100 bg-white p-5 shadow-sm sm:p-6">
                    <div class="mb-5 flex items-center justify-between gap-3 border-b border-slate-100 pb-4">
                        <div class="flex items-center gap-3"><span class="flex h-8 w-8 items-center justify-center rounded-full bg-primary text-sm font-bold text-white">2</span><div><p class="text-[10px] font-bold uppercase tracking-widest text-primary">Active configuration</p><h2 class="font-display text-2xl">Delivery address</h2></div></div>
                        <span class="material-symbols-outlined text-primary">location_on</span>
                    </div>
                    <div class="rounded-xl border-2 border-primary bg-blue-50/50 p-4">
                        <div class="flex items-start gap-3"><input checked type="radio" name="delivery_address" aria-label="Selected delivery address" class="mt-1 accent-primary"><div><div class="flex flex-wrap items-center gap-2"><h3 class="font-semibold">Delivery details</h3><span class="rounded-full bg-blue-100 px-2 py-0.5 text-[10px] font-semibold uppercase text-blue-800">Selected</span></div><p class="mt-2 text-sm text-slate-600">Choose or add a delivery address during the next checkout step. Your saved addresses will appear here when supported by your account.</p>@if ($phone)<p class="mt-3 flex items-center gap-1 text-xs text-slate-500"><span class="material-symbols-outlined text-sm">phone</span>{{ $phone }}</p>@endif</div></div>
                    </div>
                    <p class="mt-4 rounded-lg bg-slate-50 p-3 text-xs leading-5 text-slate-500">Address selection is a preview only; address management is not connected to the current API.</p>
                </section>

                <section class="rounded-xl bg-white p-5 shadow-sm sm:p-6">
                    <div class="mb-4 flex items-center gap-3"><span class="flex h-8 w-8 items-center justify-center rounded-full bg-slate-100 text-sm font-bold">3</span><div><p class="text-[10px] font-semibold uppercase tracking-widest text-slate-500">Step 03</p><h2 class="font-display text-2xl">Select delivery method</h2></div></div>
                    <div class="space-y-3">
                        <label class="flex cursor-pointer items-center justify-between gap-4 rounded-xl border border-slate-200 p-4 hover:border-primary"><span class="flex items-start gap-3"><input checked type="radio" name="delivery_method" class="mt-1 accent-primary"><span><strong class="block text-sm">Island Express Courier</strong><span class="mt-1 block text-xs text-slate-500">Delivery across Sri Lanka</span></span></span><span class="text-right text-xs font-semibold">{{ $delivery === 0 ? 'Complimentary' : 'LKR '.number_format($delivery, 2) }}</span></label>
                        <label class="flex cursor-pointer items-center justify-between gap-4 rounded-xl border border-slate-200 p-4 hover:border-primary"><span class="flex items-start gap-3"><input type="radio" name="delivery_method" class="mt-1 accent-primary"><span><strong class="block text-sm">Colombo Same-Day</strong><span class="mt-1 block text-xs text-slate-500">Availability and fee confirmed by the delivery service</span></span></span><span class="text-xs font-semibold text-slate-500">Confirm later</span></label>
                    </div>
                </section>

                <section class="rounded-xl bg-white p-5 shadow-sm sm:p-6">
                    <div class="mb-4 flex items-center gap-3"><span class="flex h-8 w-8 items-center justify-center rounded-full bg-slate-100 text-sm font-bold">4</span><div><p class="text-[10px] font-semibold uppercase tracking-widest text-slate-500">Step 04</p><h2 class="font-display text-2xl">Payment method</h2></div></div>
                    <div class="space-y-3">
                        <label class="flex cursor-pointer items-start gap-3 rounded-xl border border-slate-200 p-4 hover:border-primary"><input type="radio" name="payment_type" class="mt-1 accent-primary"><span><strong class="block text-sm">Credit or debit card</strong><span class="mt-1 block text-xs text-slate-500">Secure card payment through the available payment gateway.</span></span></label>
                        <label class="flex cursor-pointer items-start gap-3 rounded-xl border border-slate-200 p-4 hover:border-primary"><input type="radio" name="payment_type" class="mt-1 accent-primary"><span><strong class="block text-sm">Cash on delivery</strong><span class="mt-1 block text-xs text-slate-500">Availability depends on your delivery location.</span></span></label>
                    </div>
                    <p class="mt-4 text-xs leading-5 text-slate-500">Payment options are shown for review. Payment processing is not connected to the current API.</p>
                </section>

                <section class="rounded-xl bg-white p-5 shadow-sm sm:p-6">
                    <div class="mb-4 flex items-center gap-3"><span class="flex h-8 w-8 items-center justify-center rounded-full bg-slate-100 text-sm font-bold">5</span><div><p class="text-[10px] font-semibold uppercase tracking-widest text-slate-500">Step 05</p><h2 class="font-display text-2xl">Final order review</h2></div></div>
                    <label class="flex items-start gap-3 text-sm leading-6 text-slate-600"><input type="checkbox" class="mt-1 accent-primary"><span>I have reviewed the items and delivery details in my order.</span></label>
                    <a href="{{ route('checkout.address') }}" class="mt-5 flex w-full items-center justify-center gap-2 rounded-full bg-[#005baf] px-5 py-4 text-sm font-bold uppercase tracking-wider text-white hover:bg-blue-800"><span class="material-symbols-outlined text-base">arrow_forward</span>Begin checkout</a>
                    <p class="mt-3 text-center text-xs text-slate-500">Order placement will be available when the checkout API is connected.</p>
                </section>
            </div>

            <aside class="flex flex-col gap-4 lg:sticky lg:top-6 lg:col-span-5">
                <section class="rounded-xl bg-white p-5 shadow-sm sm:p-6">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-4"><h2 class="font-display text-2xl">Sanctuary bag</h2><span class="rounded-full bg-slate-100 px-3 py-1 text-xs text-slate-600">{{ count($items) }} {{ count($items) === 1 ? 'item' : 'items' }}</span></div>
                    <div class="divide-y divide-slate-100">
                        @foreach ($items as $item)
                            @php
                                $name = data_get($item, 'product.name') ?? data_get($item, 'productName') ?? data_get($item, 'name') ?? 'Luvora creation';
                                $image = data_get($item, 'product.imageUrl') ?? data_get($item, 'imageUrl') ?? data_get($item, 'image') ?? data_get($item, 'product.image');
                                $quantity = (int) (data_get($item, 'quantity') ?? data_get($item, 'Quantity') ?? 1);
                                $price = (float) (data_get($item, 'unitPrice') ?? data_get($item, 'UnitPrice') ?? data_get($item, 'price') ?? 0);
                            @endphp
                            <article class="flex gap-4 py-4">
                                <div class="flex h-24 w-20 shrink-0 items-center justify-center overflow-hidden rounded-lg bg-slate-100">@if ($image)<img src="{{ $image }}" alt="{{ $name }}" class="h-full w-full object-cover">@else<span class="material-symbols-outlined text-3xl text-slate-400">checkroom</span>@endif</div>
                                <div class="flex min-w-0 flex-1 flex-col justify-between"><div class="flex items-start justify-between gap-3"><h3 class="font-display text-lg leading-tight">{{ $name }}</h3><span class="shrink-0 text-xs font-semibold">LKR {{ number_format($price * $quantity, 2) }}</span></div><p class="text-xs text-slate-500">Quantity: {{ $quantity }}</p></div>
                            </article>
                        @endforeach
                    </div>
                    <div class="space-y-3 border-t border-slate-100 pt-4 text-sm"><div class="flex justify-between text-slate-600"><span>Subtotal</span><span>LKR {{ number_format($subtotal, 2) }}</span></div><div class="flex justify-between text-slate-600"><span>Island Express delivery</span><span class="{{ $delivery === 0 ? 'text-tertiary' : '' }}">{{ $delivery === 0 ? 'Complimentary' : 'LKR '.number_format($delivery, 2) }}</span></div><div class="flex items-end justify-between border-t border-slate-100 pt-4"><div><span class="block text-xs font-semibold uppercase tracking-wider text-slate-500">Total</span><span class="text-xs text-slate-500">LKR</span></div><span class="font-display text-2xl font-semibold">{{ number_format($total, 2) }}</span></div></div>
                </section>
                <section class="rounded-xl bg-slate-100 p-5 text-xs leading-5 text-slate-600"><p class="font-semibold text-ink">Secure shopping with Luvora</p><p class="mt-1">Your cart and customer details are handled through your Luvora account. Payment processing will be enabled when a payment provider is configured.</p></section>
            </aside>
        </div>
    @endif
</main>
<footer class="mt-10 border-t border-slate-200 bg-white py-6 text-center text-xs text-slate-500"><a href="{{ route('shop.index') }}" class="text-primary hover:underline">Continue shopping</a><span class="mx-2">·</span>Need help? Contact the Luvora customer care team.</footer>
@include('partials.site-footer')</body>
</html>
