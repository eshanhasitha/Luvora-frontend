<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment Status | Luvora</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:opsz,wght@6..96,400;6..96,500;6..96&family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-[#f7f9fb] font-['Plus_Jakarta_Sans'] text-[#191c1e]"><header class="border-b border-slate-200 bg-white"><div class="mx-auto flex max-w-7xl items-center justify-between px-5 py-5"><a href="{{ route('home') }}" class="flex items-center gap-3"><img src="{{ asset('images/logo.png') }}" alt="Luvora" class="h-10 w-auto"></a><a href="{{ route('shop.index') }}" class="text-sm font-semibold text-blue-700 hover:underline">Continue shopping</a></div></header>
<main class="mx-auto max-w-3xl px-5 py-16 text-center"><span class="inline-flex h-16 w-16 items-center justify-center rounded-full bg-rose-50 text-rose-700"><span class="material-symbols-outlined text-3xl">error</span></span><p class="mt-6 text-xs font-semibold uppercase tracking-[0.2em] text-rose-700">Payment status</p><h1 class="mt-2 font-['Bodoni_Moda'] text-4xl sm:text-5xl">Payment could not be completed</h1><p class="mx-auto mt-4 max-w-xl text-sm leading-6 text-slate-600">{{ $paymentError ?: 'No payment attempt is recorded. Payment processing is not connected yet, so your order has not been placed.' }}</p><div class="mt-8 flex flex-wrap justify-center gap-3"><a href="{{ route('checkout.payment') }}" class="rounded-full bg-[#005baf] px-7 py-3 text-sm font-semibold text-white hover:bg-blue-800">Return to payment options</a><a href="{{ route('cart.index') }}" class="rounded-full border border-slate-300 bg-white px-7 py-3 text-sm font-semibold hover:border-blue-700 hover:text-blue-700">Review your bag</a></div><p class="mt-8 text-xs text-slate-500">You have not been charged through this page. If you believe a payment was taken, contact your bank or Luvora support.</p></main>@include('partials.site-footer')</body></html>
