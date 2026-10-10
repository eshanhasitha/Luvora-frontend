<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Luvora Account')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:opsz,wght@6..96,400;6..96,500;6..96,600&family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config={theme:{extend:{fontFamily:{display:['Bodoni Moda','serif'],body:['Plus Jakarta Sans','sans-serif'],label:['Inter','sans-serif']},colors:{primary:'#005baf',surface:'#f7f9fb',ink:'#191c1e',tertiary:'#006947'}}}}</script>
</head>
<body class="min-h-screen bg-surface font-body text-ink">
<header class="border-b border-slate-200 bg-white/90"><div class="mx-auto flex max-w-7xl items-center justify-between px-5 py-4 lg:px-8"><a href="{{ route('home') }}" class="flex items-center gap-3"><img src="{{ asset('images/logo.png') }}" alt="Luvora" class="h-10 w-auto"></a><nav class="flex items-center gap-4 text-sm"><a href="{{ route('shop.index') }}" class="hidden text-slate-600 hover:text-primary sm:inline">Shop</a><a href="{{ route('login.show') }}" class="text-slate-600 hover:text-primary">Sign in</a><a href="{{ route('register.show') }}" class="rounded-full bg-ink px-4 py-2 font-semibold text-white hover:bg-primary">Join the Society</a></nav></div></header>
<main class="mx-auto grid max-w-7xl gap-6 px-5 py-7 lg:grid-cols-12 lg:gap-10 lg:px-8 lg:py-10">
    <aside class="relative overflow-hidden rounded-3xl bg-[#10283d] p-7 text-white sm:p-10 lg:col-span-5 lg:p-12"><div class="pointer-events-none absolute -right-20 -top-20 h-72 w-72 rounded-full bg-sky-400/20 blur-3xl"></div><div class="pointer-events-none absolute -bottom-24 -left-16 h-64 w-64 rounded-full bg-emerald-300/10 blur-3xl"></div><div class="relative"><p class="text-[10px] font-semibold uppercase tracking-[0.25em] text-sky-200">The Luvora Society · Sri Lanka</p><h1 class="mt-8 font-display text-4xl leading-tight sm:text-5xl">@yield('brand-heading', 'A more personal way to discover Ceylon.') </h1><p class="mt-5 max-w-md text-sm leading-6 text-slate-300">@yield('brand-copy', 'Discover thoughtful design, island-made craftsmanship, and a considered shopping experience shaped around you.') </p><div class="mt-9 space-y-4">@foreach ([['diamond','Curated island craft','Discover pieces from Sri Lankan makers and ateliers.'],['local_shipping','Considered delivery','Keep your selections and order details together.'],['support_agent','Personal assistance','Get help with your account and shopping journey.']] as [$icon,$title,$copy])<div class="flex gap-3 rounded-xl border border-white/10 bg-white/5 p-4"><span class="material-symbols-outlined text-sky-200">{{ $icon }}</span><div><h2 class="text-sm font-semibold">{{ $title }}</h2><p class="mt-1 text-xs leading-5 text-slate-300">{{ $copy }}</p></div></div>@endforeach</div><p class="mt-9 border-t border-white/10 pt-5 text-[10px] uppercase tracking-widest text-slate-400">Made with care in Sri Lanka · Luvora</p></div></aside>
    <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-10 lg:col-span-7 lg:p-12"><div class="mx-auto max-w-xl">@yield('content')</div></section>
</main>
<footer class="px-5 pb-8 text-center text-xs text-slate-500">Need help? Contact Luvora customer care <span class="mx-1">·</span> <a href="{{ route('shop.index') }}" class="text-primary hover:underline">Return to shop</a></footer>
</body></html>
