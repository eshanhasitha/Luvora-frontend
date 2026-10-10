<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order Confirmation | Luvora</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:opsz,wght@6..96,400;6..96,500;6..96,600&family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-[#f7f9fb] font-['Plus_Jakarta_Sans'] text-[#191c1e]"><div class="pointer-events-none fixed inset-0 -z-10 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-emerald-100/60 via-[#f7f9fb] to-blue-50/50"></div>
<header class="border-b border-slate-200 bg-white/90"><div class="mx-auto flex max-w-7xl items-center justify-between px-5 py-5"><a href="{{ route('home') }}" class="flex items-center gap-3"><img src="{{ asset('images/logo.png') }}" alt="Luvora" class="h-10 w-auto"></a><a href="{{ route('shop.index') }}" class="text-sm font-semibold text-blue-700 hover:underline">Continue shopping</a></div></header>
<main class="mx-auto max-w-5xl px-5 py-12 text-center sm:py-16">
    @if ($order)
        <span class="inline-flex items-center gap-2 rounded-full bg-emerald-50 px-4 py-2 text-xs font-semibold uppercase tracking-wider text-emerald-800"><span class="material-symbols-outlined text-base">verified</span> Order confirmed</span>
        <h1 class="mt-6 font-['Bodoni_Moda'] text-4xl sm:text-6xl">Thank you, {{ data_get($user,'name','Luvora customer') }}.<br><span class="italic text-blue-700">Your order is confirmed.</span></h1>
        <p class="mx-auto mt-4 max-w-2xl text-base leading-7 text-slate-600">Your order confirmation and delivery updates will be sent to your registered contact details.</p>
        <section class="mt-9 grid gap-3 rounded-xl bg-white p-5 text-left shadow-sm sm:grid-cols-2 lg:grid-cols-4">@foreach ([['Order reference',data_get($order,'reference')??data_get($order,'id')??'—'],['Order placed',data_get($order,'createdAt')??'Recently'],['Payment status',data_get($order,'paymentStatus')??'Processing'],['Estimated dispatch',data_get($order,'estimatedDispatch')??'To be confirmed']] as [$label,$value])<div class="rounded-lg bg-slate-50 p-4"><span class="text-[10px] font-semibold uppercase tracking-wider text-slate-500">{{ $label }}</span><p class="mt-2 font-semibold">{{ $value }}</p></div>@endforeach</section>
        <a href="{{ route('orders.index') }}" class="mt-7 inline-flex rounded-full bg-[#005baf] px-7 py-3 text-sm font-semibold text-white hover:bg-blue-800">View your orders</a>
    @else
        <span class="inline-flex items-center gap-2 rounded-full bg-amber-50 px-4 py-2 text-xs font-semibold uppercase tracking-wider text-amber-900"><span class="material-symbols-outlined text-base">info</span> Confirmation pending</span>
        <h1 class="mt-6 font-['Bodoni_Moda'] text-4xl sm:text-6xl">Your order has not been submitted yet.</h1>
        <p class="mx-auto mt-4 max-w-2xl text-base leading-7 text-slate-600">This page will show your order reference, payment status, and delivery milestones after the checkout service confirms an order. No order has been created by opening this page.</p>
        <div class="mt-8 flex flex-wrap justify-center gap-3"><a href="{{ route('checkout.review') }}" class="rounded-full bg-[#005baf] px-7 py-3 text-sm font-semibold text-white hover:bg-blue-800">Return to order review</a><a href="{{ route('orders.index') }}" class="rounded-full border border-slate-300 bg-white px-7 py-3 text-sm font-semibold hover:border-blue-700 hover:text-blue-700">View orders</a></div>
    @endif
    <section class="mt-12 rounded-2xl bg-white p-6 text-left shadow-sm sm:p-8"><div class="flex items-start gap-4"><span class="material-symbols-outlined text-3xl text-blue-700">timeline</span><div><h2 class="font-['Bodoni_Moda'] text-2xl">Your order journey</h2><p class="mt-1 text-sm text-slate-500">Atelier inspection, dispatch, and handover updates will appear here once order tracking is connected.</p><ol class="mt-6 grid gap-4 sm:grid-cols-2">@foreach (['Order received and payment verified','Atelier quality inspection','Courier dispatch','Doorstep handover'] as $milestone)<li class="flex items-center gap-3 rounded-lg bg-slate-50 p-4 text-sm"><span class="flex h-7 w-7 items-center justify-center rounded-full bg-slate-200 text-xs font-bold text-slate-600">·</span>{{ $milestone }}</li>@endforeach</ol></div></div></section>
    <section class="mt-5 grid gap-4 rounded-xl bg-slate-100 p-6 text-left sm:grid-cols-3"><div><h3 class="font-semibold">Luvora concierge</h3><p class="mt-1 text-xs leading-5 text-slate-600">Our customer care team can help with delivery and fitting questions.</p></div><div><h3 class="font-semibold">14-day exchanges</h3><p class="mt-1 text-xs leading-5 text-slate-600">Exchange eligibility and instructions will be included with a confirmed order.</p></div><div><h3 class="font-semibold">Artisan provenance</h3><p class="mt-1 text-xs leading-5 text-slate-600">Product craft and origin details remain available on each product page.</p></div></section>
</main>@include('partials.site-footer')</body></html>
