<!DOCTYPE html>

<html lang="en"><head>
<title>Luvora | Luxury Fashion Marketplace</title><meta charset="utf-8"/><meta content="width=device-width, initial-scale=1.0" name="viewport"/><link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&amp;family=Inter:wght@400;500;600;700&amp;family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&amp;display=swap" rel="stylesheet"/><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/><style>@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config={darkMode:"class",theme:{extend:{"colors":{"tertiary-fixed":"#6ffbbe","surface":"#f7f9fb","secondary-fixed":"#dae2fd","surface-container-high":"#e6e8ea","on-background":"#191c1e","secondary-container":"#dae2fd","tertiary":"#006947","inverse-on-surface":"#eff1f3","surface-container-low":"#f2f4f6","on-tertiary-container":"#f5fff6","surface-tint":"#005eb3","surface-container-lowest":"#ffffff","outline":"#717785","on-tertiary":"#ffffff","on-tertiary-fixed":"#002113","on-secondary-fixed":"#131b2e","surface-bright":"#f7f9fb","surface-dim":"#d8dadc","primary":"#005baf","outline-variant":"#c0c6d6","primary-fixed":"#d5e3ff","primary-fixed-dim":"#a8c8ff","error-container":"#ffdad6","on-primary-fixed":"#001b3c","on-error":"#ffffff","secondary":"#565e74","primary-container":"#0074db","on-error-container":"#93000a","on-primary-container":"#fefcff","on-surface-variant":"#404754","surface-container-highest":"#e0e3e5","on-surface":"#191c1e","tertiary-container":"#00855b","on-tertiary-fixed-variant":"#005236","secondary-fixed-dim":"#bec6e0","surface-container":"#eceef0","on-secondary-fixed-variant":"#3f465c","error":"#ba1a1a","on-secondary-container":"#5c647a","inverse-surface":"#2d3133","surface-variant":"#e0e3e5","background":"#f7f9fb","on-primary":"#ffffff","tertiary-fixed-dim":"#4edea3","on-secondary":"#ffffff","on-primary-fixed-variant":"#004689","inverse-primary":"#a8c8ff"},"borderRadius":{"DEFAULT":"0.25rem","lg":"0.5rem","xl":"0.75rem","full":"9999px"},"spacing":{"space-lg":"1.5rem","gutter":"1.5rem","space-sm":"0.5rem","margin-lg":"4rem","space-xs":"0.25rem","gutter-sm":"1rem","margin":"1.5rem","space-xl":"2.5rem","gutter-lg":"2rem","space-md":"1rem","margin-sm":"1rem"},"fontFamily":{"label-sm":["Inter"],"display-hero":["Bodoni Moda"],"body-sm":["Plus Jakarta Sans"],"headline-sm":["Plus Jakarta Sans"],"body-lg":["Plus Jakarta Sans"],"headline-lg":["Bodoni Moda"],"label-lg":["Inter"],"body-md":["Plus Jakarta Sans"],"headline-md":["Bodoni Moda"],"label-md":["Inter"],"display-hero-mobile":["Bodoni Moda"],"headline-lg-mobile":["Bodoni Moda"]},"fontSize":{"label-sm":["11px",{"lineHeight":"14px","letterSpacing":"0.06em","fontWeight":"600"}],"display-hero":["56px",{"lineHeight":"64px","letterSpacing":"-0.02em","fontWeight":"600"}],"body-sm":["13px",{"lineHeight":"18px","fontWeight":"400"}],"headline-sm":["20px",{"lineHeight":"28px","fontWeight":"600"}],"body-lg":["18px",{"lineHeight":"28px","fontWeight":"400"}],"headline-lg":["40px",{"lineHeight":"48px","letterSpacing":"-0.01em","fontWeight":"500"}],"label-lg":["14px",{"lineHeight":"20px","letterSpacing":"0.02em","fontWeight":"600"}],"body-md":["15px",{"lineHeight":"22px","fontWeight":"400"}],"headline-md":["28px",{"lineHeight":"34px","fontWeight":"500"}],"label-md":["12px",{"lineHeight":"16px","letterSpacing":"0.04em","fontWeight":"500"}],"display-hero-mobile":["38px",{"lineHeight":"44px","letterSpacing":"-0.01em","fontWeight":"600"}],"headline-lg-mobile":["30px",{"lineHeight":"36px","letterSpacing":"0em","fontWeight":"500"}]}}}}</script></head>@php
    $wishlistCount = $wishlistCount ?? 3;
    $cartCount = $cartCount ?? 2;
@endphp

<body class="bg-surface font-body-md text-on-surface antialiased"><header class="bg-surface-container-lowest shadow-[0_1px_8px_rgba(0,0,0,0.04)]"><div class="bg-on-background text-surface-container-lowest py-space-xs px-gutter-sm text-center"><div class="max-w-7xl mx-auto flex items-center justify-center gap-space-sm"><span class="material-symbols-outlined text-primary-fixed-dim text-sm">local_shipping</span><p class="font-label-sm text-label-sm tracking-wider uppercase">Island-wide Sri Lanka Express Delivery | Free shipping over LKR 15,000 | Colombo Same-Day Available</p></div></div><div class="h-28 max-w-7xl mx-auto px-gutter lg:px-gutter-lg flex flex-col justify-between pt-space-sm pb-space-xs"><div class="flex items-center justify-between gap-space-lg"><div class="flex items-center gap-space-md"><a class="flex items-center gap-space-sm" data-path="home" href="{{ route('home') }}"><img alt="Luvora" class="h-10 w-auto object-contain" src="{{ asset('images/logo.png') }}"/></a></div><div class="hidden md:flex flex-1 max-w-xl mx-space-lg"><form method="GET" action="{{ route('search') }}" class="relative w-full flex items-center bg-surface-container-low rounded-full px-space-md py-space-xs focus-within:ring-2 focus-within:ring-primary focus-within:bg-surface-container-lowest transition-all"><span class="material-symbols-outlined text-secondary mr-space-sm text-lg">search</span><input class="w-full bg-transparent border-none outline-none font-body-sm text-body-sm text-on-surface placeholder:text-secondary" name="q" placeholder="Search Ceylon sapphire jewelry, handloom silks, bespoke couture..." type="search"/><button class="font-label-sm text-label-sm text-secondary bg-surface-container-high px-space-xs py-0.5 rounded uppercase" type="submit">Search</button></form></div><div class="flex items-center gap-space-md"><a class="relative p-space-xs text-on-surface-variant hover:text-primary transition-colors" data-path="wishlist" href="{{ route('wishlist.index') }}"><span class="material-symbols-outlined">favorite</span><span class="absolute -top-0.5 -right-0.5 bg-primary text-on-primary font-label-sm text-label-sm w-4 h-4 rounded-full flex items-center justify-center text-[10px]" data-wishlist-count>0</span></a><a class="relative p-space-xs text-on-surface-variant hover:text-primary transition-colors" data-path="cart" href="{{ url('/cart') }}"><span class="material-symbols-outlined">shopping_bag</span><span class="absolute -top-0.5 -right-0.5 bg-primary text-on-primary font-label-sm text-label-sm w-4 h-4 rounded-full flex items-center justify-center text-[10px]">{{ $cartCount }}</span></a><div class="flex items-center gap-space-xs pl-space-xs">@include('partials.profile-link')</div></div></div>@include('partials.category-nav')</div></header><main class="w-full bg-surface min-h-screen"><div class="flex flex-col w-full">
<!-- SECTION 1: HERO FASHION SPLIT BANNER -->
<section class="relative w-full overflow-hidden bg-surface-container-lowest pb-space-xl">
<div class="max-w-7xl mx-auto px-gutter lg:px-gutter-lg pt-space-lg lg:pt-space-xl">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter-lg items-center">
<!-- Left Editorial Content (7 Cols) -->
<div class="lg:col-span-7 flex flex-col justify-center z-10">
<!-- Trust Pill Indicator -->
<div class="inline-flex items-center gap-space-xs bg-surface-container-low px-space-md py-space-xs rounded-full shadow-sm w-fit mb-space-md">
<span class="w-2 h-2 rounded-full bg-tertiary animate-pulse"></span>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant">
              Islandwide 24–48h Delivery • 50,000+ Happy Fashionistas
            </span>
</div>
<p class="font-label-md text-label-md uppercase tracking-widest text-primary font-semibold mb-space-xs">
            Resort &amp; Monsoon ’25 Lookbook
          </p>
<h1 class="font-display-hero text-display-hero text-on-surface leading-tight tracking-tight mb-space-md">
            Contemporary <span class="italic font-normal">Tropical Elegance</span> — The Monsoon &amp; Resort ’25 Collection.
          </h1>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-xl mb-space-lg">
            Impeccable Ceylon handloom craft fused with ultra-clean modern silhouettes. Curated for the warm equatorial climate and timeless evening glamour.
          </p>
<!-- Dual Call to Action -->
<div class="flex flex-wrap items-center gap-space-md mb-space-xl">
<a class="inline-flex items-center justify-center gap-space-xs px-space-xl py-space-md rounded-full bg-primary text-on-primary font-label-lg text-label-lg shadow-md hover:shadow-xl hover:bg-primary-container transition-all transform active:scale-95 duration-200" href="{{ route('shop.index') }}">
<span>Shop Now</span>
<span class="material-symbols-outlined text-lg">arrow_forward</span>
</a>
<a class="inline-flex items-center justify-center gap-space-xs px-space-lg py-space-md rounded-full bg-surface-container-lowest text-on-surface font-label-lg text-label-lg shadow-sm hover:bg-surface-container-low transition-all duration-200" href="{{ route('shop.index') }}">
<span>Explore Collection</span>
<span class="material-symbols-outlined text-lg">auto_awesome</span>
</a>
</div>
<!-- Micro Stats Badges -->
<div class="grid grid-cols-3 gap-space-md max-w-md pt-space-sm bg-surface-container-low/60 p-space-md rounded-xl">
<div>
<p class="font-headline-sm text-headline-sm font-bold text-on-surface">100%</p>
<p class="font-body-sm text-body-sm text-secondary">Island Artisan Loom</p>
</div>
<div>
<p class="font-headline-sm text-headline-sm font-bold text-on-surface">3-Pay</p>
<p class="font-body-sm text-body-sm text-secondary">0% Interest Koko</p>
</div>
<div>
<p class="font-headline-sm text-headline-sm font-bold text-on-surface">4.92/5</p>
<p class="font-body-sm text-body-sm text-secondary">Verified Luxury Tier</p>
</div>
</div>
</div>
<!-- Right Visual Showcase (5 Cols) -->
<div class="lg:col-span-5 relative">
<div class="relative w-full aspect-[3/4] rounded-2xl overflow-hidden shadow-xl bg-surface-container">
<img class="w-full h-full object-cover object-center transform hover:scale-105 transition-transform duration-700" data-alt="Editorial Sri Lankan high-fashion model wearing an ivory handloom wrap dress against minimalist tropical limestone architecture in Galle Fort. Warm golden-hour daylight, soft oceanic breeze, sharp high fashion photography, editorial styling." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBv5SRhViWFdkfA9XWuDt3qN8DiEmpBICsTIYUKx339f_kIG46oUrqfG240TXMz_TGVJimdViy2tfNxSwNZqxtrzipGYcwhMJ_EWNVVun0Eqvyxz37s8jFFDiKaZUewUPjdNzytEH4yPSWKbF9QiespwtlCaSQ4uZaADKYF68QbMO_SQhDErWymdYVAUBLIkh9y9JO7QSQVGLOdLH_tzXneVVZIbU-e1TiYnjWV9RmVQB9lx3tLVj5A"/>
<div class="absolute inset-0 bg-gradient-to-t from-on-background/60 via-transparent to-transparent"></div>
<div class="absolute bottom-space-lg left-space-lg right-space-lg text-surface-container-lowest">
<span class="inline-block bg-surface-container-lowest/20 backdrop-blur-md px-space-sm py-0.5 rounded-full font-label-sm text-label-sm tracking-wider uppercase mb-space-xs text-white">
                Signature Ensemble
              </span>
<p class="font-headline-sm text-headline-sm font-medium leading-snug">
                Raw Silk &amp; Natural Indigo Weave
              </p>
<p class="font-body-sm text-body-sm text-surface-container-high">
                Hand-spun in Matale • Limited Run 120 Pieces
              </p>
</div>
</div>
<!-- Floating Accent Mini Card -->
<div class="hidden sm:flex absolute -bottom-6 -left-8 bg-surface-container-lowest p-space-md rounded-xl shadow-xl items-center gap-space-md max-w-xs z-20">
<div class="w-12 h-12 rounded-lg bg-primary-fixed flex items-center justify-center text-on-primary-fixed shrink-0">
<span class="material-symbols-outlined text-2xl">diamond</span>
</div>
<div>
<p class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">Gem Certification</p>
<p class="font-body-sm text-body-sm font-bold text-on-surface">Ratnapura Ceylon Sapphire Certified</p>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION 2: FEATURED CATEGORIES GRID (6 Bespoke Cards) -->
<section class="w-full py-space-xl bg-surface" id="curated-categories">
<div class="max-w-7xl mx-auto px-gutter lg:px-gutter-lg">
<div class="flex flex-col md:flex-row md:items-end justify-between mb-space-lg">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold">Curated Portfolios</span>
<h2 class="font-headline-lg text-headline-lg text-on-surface mt-space-xs">Explore Haute Living</h2>
</div>
<a class="mt-space-sm md:mt-0 inline-flex items-center gap-space-xs font-label-lg text-label-lg text-primary hover:text-primary-container transition-colors" href="{{ route('shop.index') }}">
<span>View All Departments</span>
<span class="material-symbols-outlined text-sm">north_east</span>
</a>
</div>
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-gutter-sm">
<!-- Category 1 -->
<a class="group flex flex-col bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300" href="{{ route('shop.category', 'women') }}">
<div class="relative aspect-[3/4] w-full overflow-hidden bg-surface-container-low">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Editorial close up of traditional Sri Lankan modern fusion silk saree draped with modern geometric accents, deep emerald and metallic gold details, bright studio setting." src="https://lh3.googleusercontent.com/aida-public/AB6AXuC7svDGsJa5q5Wf8n2WjluAdCzZH5RvORcvsCKXuf1TVPc7EuDqhI6z3sB336muHOEKzSC2urDoXn-pGtVedVqREkKPuav-Xd_dGIgTlF_InEajQ1m0-S-EuHjsVcAXZQDB5nQfd7KL3LJpD1c7KuiJO7EJ7ghy8tB9O6WOA2JgCw0-jkS9RG6-SuMCNsl041Q-iXVVYiQWIGPINhQVLNzRYXFOV5BMS8tXYOMElvJOyanOMMyGz0gY"/>
<span class="absolute top-2 right-2 bg-on-background/75 text-surface-container-lowest text-[10px] font-label-sm px-2 py-0.5 rounded-full uppercase tracking-wider">Couture</span>
</div>
<div class="p-space-sm text-center">
<h3 class="font-headline-sm text-base font-semibold text-on-surface group-hover:text-primary transition-colors truncate">Women's Sarees</h3>
<p class="font-body-sm text-body-sm text-secondary">640+ Styles</p>
</div>
</a>
<!-- Category 2 -->
<a class="group flex flex-col bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300" href="{{ route('shop.category', 'men') }}">
<div class="relative aspect-[3/4] w-full overflow-hidden bg-surface-container-low">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Handsome male model wearing a relaxed breathable ivory linen shirt paired with tailored slate trousers in a sunny Colombo terrace setting." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAWZbJNNBDnS3182XucW428NRMv1agTBVmIJW-ZWf_nuP6PykPUBPGIMKsv_Njskql2vAr-WaejIDVZobooyUyKyUWFSIQ2wd6svN28jtaa6Hl-CtnvcFbYRlteSo9w44nhEoexkC44JcOqgELbTG-3w5wgAdd3NUDMXDV4hJ-_bv2sYqC4amQLUe-G-xRTsQzOD4XHycV1vLO4PfhIL0c60pqQJMSskj_ZAI0he3TaEcqx0ZcV5AYC"/>
</div>
<div class="p-space-sm text-center">
<h3 class="font-headline-sm text-base font-semibold text-on-surface group-hover:text-primary transition-colors truncate">Men's Linen &amp; Tailored</h3>
<p class="font-body-sm text-body-sm text-secondary">310+ Styles</p>
</div>
</a>
<!-- Category 3 -->
<a class="group flex flex-col bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300" href="{{ route('shop.category', 'kids') }}">
<div class="relative aspect-[3/4] w-full overflow-hidden bg-surface-container-low">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Charming child dressed in ceremonial handloom festival attire with delicate gold trim against a warm terracotta backdrop." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDnZttEL1g9zmOXgA7lzos6uSxc3-VNPIOx88f9UBLbemUDZx3qFl8YsZpdkMRk7ikxaDufD9eXHlYIlr4jc3t0URaBiQFGVSjxc1i5i2WyIatk-aYFyCLx9fn66XdrtPyDBK0Kw_cbZ_L7iO41tn3mTMvXREOPVz8P02YAo3NjyvvdepttPuzOvCnN9MPW_SLJEhU33DfC4xwCCqT1C2q0SqoezCXHAzLpCXZb3Sp079cBS30jYQxi"/>
<span class="absolute top-2 right-2 bg-tertiary-container text-on-tertiary-container text-[10px] font-label-sm px-2 py-0.5 rounded-full uppercase tracking-wider">New</span>
</div>
<div class="p-space-sm text-center">
<h3 class="font-headline-sm text-base font-semibold text-on-surface group-hover:text-primary transition-colors truncate">Kids Festive</h3>
<p class="font-body-sm text-body-sm text-secondary">180+ Styles</p>
</div>
</a>
<!-- Category 4 -->
<a class="group flex flex-col bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300" href="{{ route('shop.category', 'bags') }}">
<div class="relative aspect-[3/4] w-full overflow-hidden bg-surface-container-low">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Handmade luxury caramel saddle leather tote bag with brass hardware resting on a polished granite plinth." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDCDTZgInY5k5vcevbOxVWIqk5WUfCl-12S2NmdJ0zdajkQZT89vsay4vKvHX-JTdKRmh8LT41TuP_3MI31bbnOgUBPXFvKJyjmTVv9vE-RRtSLmXZ3S9cynXIoY05Bwh3b17MD9vB4QUyJRB1ksorxVh94GUI_Gm1bQpxMVI1iMQepAw2XujaP2Da1IjVnQ0eTmBWnv2MKY2QylL-JrRiTJlHoitopU1gzYjFbTcaGNiOKAmrRP2VT"/>
</div>
<div class="p-space-sm text-center">
<h3 class="font-headline-sm text-base font-semibold text-on-surface group-hover:text-primary transition-colors truncate">Artisan Leather Bags</h3>
<p class="font-body-sm text-body-sm text-secondary">95+ Styles</p>
</div>
</a>
<!-- Category 5 -->
<a class="group flex flex-col bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300" href="{{ route('shop.category', 'jewelry') }}">
<div class="relative aspect-[3/4] w-full overflow-hidden bg-surface-container-low">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Macro photography of 18k gold necklace with natural royal blue Ceylon sapphire gemstone sparkling under studio lights." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAJWqce-L7tuUofFdxzftQyZnUdQNFcvEU6MsaWUkrEIXumwU7Haf-Hsbu65RJsqestxWOhdUS4VG_S5vKHRmWR9w74gmRJruCFJNArnfms7WLbVACEY4wDzuJ0J_Q8T3zE2V1WxFvrdcTboGK8Av9gK2SZlhtOT-h8m0OsCSpMTlsC_SpTe_G35UAP-yVS6izqfXO8ZVn2U5lVnlx1dcvgWHLGRcwJdAYKntdbTpKYZcX0G2FKwj79"/>
<span class="absolute top-2 right-2 bg-primary text-on-primary text-[10px] font-label-sm px-2 py-0.5 rounded-full uppercase tracking-wider">Certified</span>
</div>
<div class="p-space-sm text-center">
<h3 class="font-headline-sm text-base font-semibold text-on-surface group-hover:text-primary transition-colors truncate">Ceylon Gems &amp; Fine Jewelry</h3>
<p class="font-body-sm text-body-sm text-secondary">140+ Pieces</p>
</div>
</a>
<!-- Category 6 -->
<a class="group flex flex-col bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300" href="{{ route('shop.category', 'shoes') }}">
<div class="relative aspect-[3/4] w-full overflow-hidden bg-surface-container-low">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Minimalist handcrafted leather strappy resort sandals in clean sand colorway placed on white marble step." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDQ1a2A9gV9Z36k5VOSQQVoLXz1bfjCll2frh7NqbxTxe98pKMDTi5zy1CcLvuGRNmhyCtJeOusDBP6wXjpiB31sc7bfz7xPhYR33Gv0iSuRx1wDpd5QAgkA77qnhkCnKN9J-_kMsk5ecNH2AgqN7etqw5wnCYLefi2L3wJMVRZa--Vm-Ly7wr7A5kBNHmmwwAGMnkqO7SMe1Ag7S-p1GBthJNEJXVXXAHo5nnxFuF7-t4jTrhmNBB8"/>
</div>
<div class="p-space-sm text-center">
<h3 class="font-headline-sm text-base font-semibold text-on-surface group-hover:text-primary transition-colors truncate">Minimal Footwear</h3>
<p class="font-body-sm text-body-sm text-secondary">110+ Styles</p>
</div>
</a>
</div>
</div>
</section>
<!-- SECTION 3: NEW ARRIVALS CAROUSEL / GRID -->
<section class="w-full py-space-xl bg-surface-container-low" id="new-arrivals">
<div class="max-w-7xl mx-auto px-gutter lg:px-gutter-lg">
<div class="flex flex-col sm:flex-row sm:items-end justify-between mb-space-lg">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold">Unveiled Today</span>
<h2 class="font-headline-lg text-headline-lg text-on-surface mt-space-xs">New Arrivals</h2>
</div>
<div class="flex items-center gap-space-xs mt-space-sm sm:mt-0">
<span class="font-label-md text-label-md text-secondary mr-2">Islandwide Stock Live</span>
<span class="w-2.5 h-2.5 rounded-full bg-tertiary"></span>
</div>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-gutter-lg">
<!-- Product 1 -->
<div class="group relative bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col">
<div class="relative aspect-[3/4] bg-surface-container overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Studio fashion shot of model wearing ivory and sky blue Handloom Linen Wrap Dress with tie waist detail." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAl_hHReD5ZVQgxG1B-gzHeN0OGf4JdamrpZcF9pYqSInwOcZee_ZZwSvo1oB0Y02Wllk0C_bmBpcyRYsNDZJB5Uwap78NC0G0pwj37iDYP5ZngrIiCAjIeAAaeAyxjoF4MOlgNyCy84L9xMqkWu8PW23Z9BqsD04jGVMk9m1Aqc9xJYA-vybpawzn_u0dfb4oSZlgE1BLdrWaHO4vYcK-tYRJB-hre5vByrxiNVM3d1Dukxo41NlGq"/>
<span class="absolute top-3 left-3 bg-surface-container-lowest text-on-surface font-label-sm text-label-sm px-space-sm py-0.5 rounded-full uppercase shadow-sm">
              New Season
            </span>
<button class="wishlist-btn absolute top-3 right-3 w-8 h-8 rounded-full bg-surface-container-lowest/80 backdrop-blur-md flex items-center justify-center text-on-surface hover:text-error transition-colors shadow-sm" onclick="this.classList.toggle('text-error')">
<span class="material-symbols-outlined text-lg">favorite</span>
</button>
<!-- Quick Add Size Overlay on Hover -->
<div class="absolute inset-x-0 bottom-0 p-space-sm bg-surface-container-lowest/90 backdrop-blur-md translate-y-full group-hover:translate-y-0 transition-transform duration-200 flex items-center justify-center gap-space-xs">
<span class="font-label-sm text-label-sm text-secondary uppercase mr-1">Quick Size:</span>
<button class="px-2 py-1 rounded bg-surface-container-high hover:bg-primary hover:text-on-primary font-label-sm text-label-sm transition-colors">XS</button>
<button class="px-2 py-1 rounded bg-surface-container-high hover:bg-primary hover:text-on-primary font-label-sm text-label-sm transition-colors">S</button>
<button class="px-2 py-1 rounded bg-surface-container-high hover:bg-primary hover:text-on-primary font-label-sm text-label-sm transition-colors">M</button>
<button class="px-2 py-1 rounded bg-surface-container-high hover:bg-primary hover:text-on-primary font-label-sm text-label-sm transition-colors">L</button>
</div>
</div>
<div class="p-space-md flex-1 flex flex-col justify-between">
<div>
<div class="flex items-center gap-space-xs mb-1">
<span class="material-symbols-outlined text-amber-500 text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="font-label-sm text-label-sm text-on-surface font-semibold">4.9</span>
<span class="font-body-sm text-body-sm text-secondary">(38 reviews)</span>
</div>
<h3 class="font-headline-sm text-base font-semibold text-on-surface line-clamp-1">Handloom Linen Wrap Dress</h3>
<p class="font-body-sm text-body-sm text-secondary mt-0.5">Natural Ceylon Plant Dye</p>
</div>
<div class="mt-space-md pt-space-sm flex items-center justify-between border-t-0">
<div>
<p class="font-headline-sm text-base font-bold text-on-surface">LKR 14,800</p>
<p class="font-label-sm text-[10px] text-tertiary">Or 3 x LKR 4,933 via Koko</p>
</div>
<!-- Swatches -->
<div class="flex items-center gap-1">
<span class="w-3.5 h-3.5 rounded-full bg-[#f4ebd0] ring-1 ring-outline-variant"></span>
<span class="w-3.5 h-3.5 rounded-full bg-[#a8c8ff] ring-1 ring-outline-variant"></span>
<span class="w-3.5 h-3.5 rounded-full bg-[#395034] ring-1 ring-outline-variant"></span>
</div>
</div>
</div>
</div>
<!-- Product 2 -->
<div class="group relative bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col">
<div class="relative aspect-[3/4] bg-surface-container overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Editorial look of male model in Colombo Relaxed Cuban Collar Shirt made of breathable linen in ocean sage tone." src="https://lh3.googleusercontent.com/aida-public/AB6AXuC1KU3aSxyQnWw4YzjGnTiD9mhOoP5dm3_ruwzRg_vfqM0N7vTWwhupdv84GDgmfwp9YZ10CBeQtbkUXw87_FVeNGpQgAQDnmGFcth1WNmYUlajekx_M8UCiTmGxAh7M_nnCYKQQ3wuMaR0fTG5_09oL2wfjxG1-zZCBowAwvb670FsPvJHoloNVczg2-bDYe05poRBe5LWSQBG4Yue9cH2fw-AkKBHdovuclwsnBwyflHyJ2powbW-"/>
<span class="absolute top-3 left-3 bg-error text-on-error font-label-sm text-label-sm px-space-sm py-0.5 rounded-full uppercase shadow-sm">
              -14% OFF
            </span>
<button class="wishlist-btn absolute top-3 right-3 w-8 h-8 rounded-full bg-surface-container-lowest/80 backdrop-blur-md flex items-center justify-center text-on-surface hover:text-error transition-colors shadow-sm" onclick="this.classList.toggle('text-error')">
<span class="material-symbols-outlined text-lg">favorite</span>
</button>
<div class="absolute inset-x-0 bottom-0 p-space-sm bg-surface-container-lowest/90 backdrop-blur-md translate-y-full group-hover:translate-y-0 transition-transform duration-200 flex items-center justify-center gap-space-xs">
<span class="font-label-sm text-label-sm text-secondary uppercase mr-1">Quick Size:</span>
<button class="px-2 py-1 rounded bg-surface-container-high hover:bg-primary hover:text-on-primary font-label-sm text-label-sm transition-colors">S</button>
<button class="px-2 py-1 rounded bg-surface-container-high hover:bg-primary hover:text-on-primary font-label-sm text-label-sm transition-colors">M</button>
<button class="px-2 py-1 rounded bg-surface-container-high hover:bg-primary hover:text-on-primary font-label-sm text-label-sm transition-colors">L</button>
<button class="px-2 py-1 rounded bg-surface-container-high hover:bg-primary hover:text-on-primary font-label-sm text-label-sm transition-colors">XL</button>
</div>
</div>
<div class="p-space-md flex-1 flex flex-col justify-between">
<div>
<div class="flex items-center gap-space-xs mb-1">
<span class="material-symbols-outlined text-amber-500 text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="font-label-sm text-label-sm text-on-surface font-semibold">4.8</span>
<span class="font-body-sm text-body-sm text-secondary">(45 reviews)</span>
</div>
<h3 class="font-headline-sm text-base font-semibold text-on-surface line-clamp-1">Colombo Relaxed Cuban Collar Shirt</h3>
<p class="font-body-sm text-body-sm text-secondary mt-0.5">Ultra-light Resort Weave</p>
</div>
<div class="mt-space-md pt-space-sm flex items-center justify-between">
<div>
<div class="flex items-center gap-2">
<p class="font-headline-sm text-base font-bold text-on-surface">LKR 9,500</p>
<p class="font-body-sm text-xs text-secondary line-through">LKR 11,000</p>
</div>
<p class="font-label-sm text-[10px] text-tertiary">Or 3 x LKR 3,166 via Mintpay</p>
</div>
<div class="flex items-center gap-1">
<span class="w-3.5 h-3.5 rounded-full bg-[#5d7367] ring-1 ring-outline-variant"></span>
<span class="w-3.5 h-3.5 rounded-full bg-[#ffffff] ring-1 ring-outline-variant"></span>
<span class="w-3.5 h-3.5 rounded-full bg-[#1b2a4a] ring-1 ring-outline-variant"></span>
</div>
</div>
</div>
</div>
<!-- Product 3 -->
<div class="group relative bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col">
<div class="relative aspect-[3/4] bg-surface-container overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Editorial look of fashion model wearing a flowing emerald Raw Silk Pleated Midi Skirt walking through sunlight." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBtEcdxdTJ8gbOy0Pnha6JfNm3GXsLTyVhpjyLxnzJgwfn8aBLYtPaxfX5KhxDxtuKTHvPd7ui6Ff8s-BZfPmu_pQ4IsbPKf2KfDFZoShmGuDszka7zohF4MEMFm2P_bCAz_k8dyUzUFlbDa_N8-K0PxVFtDoBr7LI8TbRRRJjTNBH9bbxjQ_cOqclfNnoNZ_WuPNvWVetSazKIxbYOAbC1MfxWn7ANqRe_R7Io6_M_4Vip9ha-kye7"/>
<span class="absolute top-3 left-3 bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm px-space-sm py-0.5 rounded-full uppercase shadow-sm">
              Trending
            </span>
<button class="wishlist-btn absolute top-3 right-3 w-8 h-8 rounded-full bg-surface-container-lowest/80 backdrop-blur-md flex items-center justify-center text-on-surface hover:text-error transition-colors shadow-sm" onclick="this.classList.toggle('text-error')">
<span class="material-symbols-outlined text-lg">favorite</span>
</button>
<div class="absolute inset-x-0 bottom-0 p-space-sm bg-surface-container-lowest/90 backdrop-blur-md translate-y-full group-hover:translate-y-0 transition-transform duration-200 flex items-center justify-center gap-space-xs">
<span class="font-label-sm text-label-sm text-secondary uppercase mr-1">Quick Size:</span>
<button class="px-2 py-1 rounded bg-surface-container-high hover:bg-primary hover:text-on-primary font-label-sm text-label-sm transition-colors">XS</button>
<button class="px-2 py-1 rounded bg-surface-container-high hover:bg-primary hover:text-on-primary font-label-sm text-label-sm transition-colors">S</button>
<button class="px-2 py-1 rounded bg-surface-container-high hover:bg-primary hover:text-on-primary font-label-sm text-label-sm transition-colors">M</button>
<button class="px-2 py-1 rounded bg-surface-container-high hover:bg-primary hover:text-on-primary font-label-sm text-label-sm transition-colors">L</button>
</div>
</div>
<div class="p-space-md flex-1 flex flex-col justify-between">
<div>
<div class="flex items-center gap-space-xs mb-1">
<span class="material-symbols-outlined text-amber-500 text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="font-label-sm text-label-sm text-on-surface font-semibold">5.0</span>
<span class="font-body-sm text-body-sm text-secondary">(24 reviews)</span>
</div>
<h3 class="font-headline-sm text-base font-semibold text-on-surface line-clamp-1">Raw Silk Pleated Midi Skirt</h3>
<p class="font-body-sm text-body-sm text-secondary mt-0.5">Pure Handwoven Dupioni</p>
</div>
<div class="mt-space-md pt-space-sm flex items-center justify-between">
<div>
<p class="font-headline-sm text-base font-bold text-on-surface">LKR 16,200</p>
<p class="font-label-sm text-[10px] text-tertiary">Or 3 x LKR 5,400 via Koko</p>
</div>
<div class="flex items-center gap-1">
<span class="w-3.5 h-3.5 rounded-full bg-[#174e37] ring-1 ring-outline-variant"></span>
<span class="w-3.5 h-3.5 rounded-full bg-[#9e674b] ring-1 ring-outline-variant"></span>
<span class="w-3.5 h-3.5 rounded-full bg-[#111827] ring-1 ring-outline-variant"></span>
</div>
</div>
</div>
</div>
<!-- Product 4 -->
<div class="group relative bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col">
<div class="relative aspect-[3/4] bg-surface-container overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Editorial product shot of a luxury Crafted Leather Minimalist Tote in deep cognac brown resting on light sandstone." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDwtBRV6NX0Es994cLAvHqv_41gW70hANE2Tlx7Ka-FnS34_P046F-dWMUt8L6KhhF0jdh59aj_Ky_P7XRbfl1Q72lxvmIURbiNi1K367T3Cz3r9MQfWc4WZhM5TC1x8x7cmQEdUTj_s2pcC6-UCGPb08YnGcKhYPYxYjto6jj2MoFgU8GOe8oNgqkMywPF1JKZOjBmQuqIeUyLIeIO-CHvqUfAzO4bHLmJ4Ir0HyOG8hENZMWVrXeB"/>
<span class="absolute top-3 left-3 bg-tertiary-fixed text-on-tertiary-fixed font-label-sm text-label-sm px-space-sm py-0.5 rounded-full uppercase shadow-sm">
              Artisan Guild
            </span>
<button class="wishlist-btn absolute top-3 right-3 w-8 h-8 rounded-full bg-surface-container-lowest/80 backdrop-blur-md flex items-center justify-center text-on-surface hover:text-error transition-colors shadow-sm" onclick="this.classList.toggle('text-error')">
<span class="material-symbols-outlined text-lg">favorite</span>
</button>
<div class="absolute inset-x-0 bottom-0 p-space-sm bg-surface-container-lowest/90 backdrop-blur-md translate-y-full group-hover:translate-y-0 transition-transform duration-200 flex items-center justify-center gap-space-xs">
<button class="w-full py-1.5 rounded-full bg-primary text-on-primary font-label-sm text-label-sm hover:bg-primary-container transition-colors">
                Quick Add To Bag
              </button>
</div>
</div>
<div class="p-space-md flex-1 flex flex-col justify-between">
<div>
<div class="flex items-center gap-space-xs mb-1">
<span class="material-symbols-outlined text-amber-500 text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="font-label-sm text-label-sm text-on-surface font-semibold">4.9</span>
<span class="font-body-sm text-body-sm text-secondary">(52 reviews)</span>
</div>
<h3 class="font-headline-sm text-base font-semibold text-on-surface line-clamp-1">Crafted Leather Minimalist Tote</h3>
<p class="font-body-sm text-body-sm text-secondary mt-0.5">Vegetable-tanned full grain</p>
</div>
<div class="mt-space-md pt-space-sm flex items-center justify-between">
<div>
<p class="font-headline-sm text-base font-bold text-on-surface">LKR 22,500</p>
<p class="font-label-sm text-[10px] text-tertiary">Or 3 x LKR 7,500 via Koko</p>
</div>
<div class="flex items-center gap-1">
<span class="w-3.5 h-3.5 rounded-full bg-[#6d4128] ring-1 ring-outline-variant"></span>
<span class="w-3.5 h-3.5 rounded-full bg-[#111827] ring-1 ring-outline-variant"></span>
<span class="w-3.5 h-3.5 rounded-full bg-[#bf9b6e] ring-1 ring-outline-variant"></span>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION 4: TRENDING & BEST SELLERS (Interactive Category Tabs) -->
<section class="w-full py-space-xl bg-surface">
<div class="max-w-7xl mx-auto px-gutter lg:px-gutter-lg">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-space-md mb-space-lg">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold">Island Curations</span>
<h2 class="font-headline-lg text-headline-lg text-on-surface mt-space-xs">Trending &amp; Best Sellers</h2>
</div>
<!-- Interactive Category Switcher Tabs -->
<div class="flex items-center gap-space-xs p-1 bg-surface-container-high rounded-full overflow-x-auto" id="category-tabs">
<button class="tab-btn active-tab px-space-md py-1.5 rounded-full font-label-md text-label-md transition-all bg-on-background text-surface-container-lowest shadow-sm" data-cat="all">
            All
          </button>
<button class="tab-btn px-space-md py-1.5 rounded-full font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-all" data-cat="dresses">
            Dresses
          </button>
<button class="tab-btn px-space-md py-1.5 rounded-full font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-all" data-cat="shirts">
            Shirts
          </button>
<button class="tab-btn px-space-md py-1.5 rounded-full font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-all" data-cat="bags">
            Bags
          </button>
<button class="tab-btn px-space-md py-1.5 rounded-full font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-all" data-cat="accessories">
            Accessories
          </button>
</div>
</div>
<!-- Dynamic Product Showcase Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-gutter-lg" id="tabbed-product-grid">
<!-- Item 1 (Dresses) -->
<div class="tab-item group bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300" data-cat="dresses">
<div class="relative aspect-[3/4] bg-surface-container-low overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Fashion model posing in sunlit courtyard wearing tiered sunset orange resort sundress with delicate embroidery." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBJSeigpJN9gMQ66DO9EJuvztskwL0nVbce631pKNhMlcyfNQVa7LyyXb2tpFfEmS8FH6iNp0Pd4-341nMMHyUATkLI_8g1iDLJr8APwdsdRKEnKMR7DOUHKF5EyqKxxmg635FD9tBO1tDyo62R2IC85hn6SR_7CUFXEPUyKG5i8_1SBaoa_rEv82EOu3-0Al9hBkWcjkWCRlfz0KY14sRTV_Uz21rJ_hrLdD-cPDQmeZHyImxjflC_"/>
<span class="absolute top-3 left-3 bg-tertiary text-on-tertiary font-label-sm text-label-sm px-space-sm py-0.5 rounded-full uppercase">
              Top Rated
            </span>
</div>
<div class="p-space-md">
<h3 class="font-headline-sm text-base font-semibold text-on-surface truncate">Tiered Sunset Resort Dress</h3>
<p class="font-body-sm text-body-sm text-secondary">Organic Mulberry Cotton</p>
<div class="mt-space-sm flex items-center justify-between">
<span class="font-headline-sm text-base font-bold text-on-surface">LKR 13,900</span>
<span class="font-label-sm text-label-sm text-tertiary">In Stock</span>
</div>
</div>
</div>
<!-- Item 2 (Shirts) -->
<div class="tab-item group bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300" data-cat="shirts">
<div class="relative aspect-[3/4] bg-surface-container-low overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Editorial look of modern man wearing off-white textured linen band-collar shirt against tropical minimalist courtyard." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAN0_2GtTsW1aI9F0TUaRUhQzujElJyvcchJsdagNk211CXQohv4FL29aOQ99e8r8SoCpwU86hNWzJ0_qXhPI35CeOMAzALsQn6Cm0M73-eNsuvEduGUc5sL-h8Zo3Akaya90ZDhV2vhb3xYS3oX9tTLow-ejqowvtmntx6qcjMOzJz-SMpru-XLNsdr--aAHMCz-ZZt-ye0PY6xmdvbw44D-5q9-lCfz4LkSmNDG5UJhE0CsSEjun3"/>
<span class="absolute top-3 left-3 bg-secondary text-on-secondary font-label-sm text-label-sm px-space-sm py-0.5 rounded-full uppercase">
              Best Seller
            </span>
</div>
<div class="p-space-md">
<h3 class="font-headline-sm text-base font-semibold text-on-surface truncate">Galle Fort Band-Collar Linen</h3>
<p class="font-body-sm text-body-sm text-secondary">100% Breathable Flax</p>
<div class="mt-space-sm flex items-center justify-between">
<span class="font-headline-sm text-base font-bold text-on-surface">LKR 8,900</span>
<span class="font-label-sm text-label-sm text-tertiary">In Stock</span>
</div>
</div>
</div>
<!-- Item 3 (Bags) -->
<div class="tab-item group bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300" data-cat="bags">
<div class="relative aspect-[3/4] bg-surface-container-low overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Handcrafted structured woven palmyrah cane and tan leather crossbody bag photographed on minimal stone pedestal." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDtaaVQa1GizTNWGl4f74OMvtS_Gf5fZ8uzAGjb0iUoYw3cWc9rXuAiII6tz8f4XfEaz5k8H_Wl0WI5yVUwa5ehOo6vnEo05gY_qXtEorP0tUPk1lubCB3hFniuSc9dZEzAPIboey9A0pm8_9ufNbSqOhRDmz5LjydY7_Qq11nMMmgAUjx2MX8Ptyut7j2sfXRpGjflPR90QqNmujgKaFTpLgSJXqUwAqz6lyn9MhkapbccZBT8NFkd"/>
<span class="absolute top-3 left-3 bg-primary text-on-primary font-label-sm text-label-sm px-space-sm py-0.5 rounded-full uppercase">
              Heritage Craft
            </span>
</div>
<div class="p-space-md">
<h3 class="font-headline-sm text-base font-semibold text-on-surface truncate">Jaffna Cane Crossbody Bag</h3>
<p class="font-body-sm text-body-sm text-secondary">Natural Palmyrah &amp; Calfskin</p>
<div class="mt-space-sm flex items-center justify-between">
<span class="font-headline-sm text-base font-bold text-on-surface">LKR 11,400</span>
<span class="font-label-sm text-label-sm text-tertiary">Limited Batch</span>
</div>
</div>
</div>
<!-- Item 4 (Accessories) -->
<div class="tab-item group bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300" data-cat="accessories">
<div class="relative aspect-[3/4] bg-surface-container-low overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Stunning artisan statement earrings handcrafted with polished Ceylon moonstone and hammered recycled sterling silver." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCo2eZYcL0dEqbksO9wJkRY0_gQgxVMuqRM1ljcdgCn8niYgsiPYJqvAeoidk6ik_SCVXnmdB4978bl1Q8PKpoFEFRwhzAdGDixQkl2zdjZ8K82OnQkEb0x-kVmSJHKkjWFIIND4RUhsCny0EQNn3qJbnckU0nLGCVTF8cexiGZQtBtu84xnPTwfURlPcv1MarUEsdFrfP3w7BZiToFoepMMnF9u53U5dJ9VJGkXr4H4CRVly9FZFdy"/>
<span class="absolute top-3 left-3 bg-primary-container text-on-primary-container font-label-sm text-label-sm px-space-sm py-0.5 rounded-full uppercase">
              Exclusive
            </span>
</div>
<div class="p-space-md">
<h3 class="font-headline-sm text-base font-semibold text-on-surface truncate">Meetiyagoda Moonstone Drops</h3>
<p class="font-body-sm text-body-sm text-secondary">Recycled 925 Silver</p>
<div class="mt-space-sm flex items-center justify-between">
<span class="font-headline-sm text-base font-bold text-on-surface">LKR 18,500</span>
<span class="font-label-sm text-label-sm text-tertiary">Only 4 Left</span>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION 5: PROMOTIONAL SHOWCASE BANNER (KOKO & MINTPAY) -->
<section class="w-full py-space-md bg-surface">
<div class="max-w-7xl mx-auto px-gutter lg:px-gutter-lg">
<div class="relative rounded-2xl overflow-hidden bg-gradient-to-r from-on-background via-inverse-surface to-on-background p-space-lg lg:p-space-xl text-surface-container-lowest shadow-xl">
<div class="absolute -right-16 -top-16 w-96 h-96 bg-primary/20 rounded-full blur-3xl pointer-events-none"></div>
<div class="absolute -left-16 -bottom-16 w-80 h-80 bg-tertiary/20 rounded-full blur-3xl pointer-events-none"></div>
<div class="relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-space-lg items-center">
<div class="lg:col-span-8 space-y-space-xs">
<div class="inline-flex items-center gap-2 bg-surface-container-lowest/15 backdrop-blur-md px-space-sm py-0.5 rounded-full text-primary-fixed">
<span class="material-symbols-outlined text-sm">payments</span>
<span class="font-label-sm text-label-sm uppercase tracking-wider">Island Smart Shopping</span>
</div>
<h2 class="font-headline-lg text-headline-lg font-medium text-surface-container-lowest leading-tight">
              Buy Now, Pay Later with Koko &amp; Mintpay.
            </h2>
<p class="font-body-lg text-body-lg text-surface-container-high max-w-xl">
              Split any purchase above LKR 3,000 into 3 interest-free monthly installments. No extra hidden charges, instant approval with your Sri Lankan debit or credit card.
            </p>
</div>
<div class="lg:col-span-4 flex flex-col sm:flex-row lg:flex-col items-start lg:items-end gap-space-md justify-center">
<div class="flex items-center gap-space-sm bg-surface-container-lowest/10 backdrop-blur-lg px-space-md py-space-sm rounded-xl">
<span class="font-label-md text-label-md uppercase tracking-wider text-surface-container-lowest font-bold">Supported By:</span>
<div class="flex items-center gap-2">
<span class="px-2.5 py-1 bg-surface-container-lowest text-on-surface font-label-sm text-label-sm rounded font-bold">KOKO</span>
<span class="px-2.5 py-1 bg-surface-container-lowest text-on-surface font-label-sm text-label-sm rounded font-bold">Mintpay</span>
</div>
</div>
<a class="px-space-lg py-space-sm rounded-full bg-surface-container-lowest text-on-background font-label-md text-label-md uppercase tracking-wider hover:bg-primary hover:text-on-primary transition-colors duration-200" href="{{ route('shop.index') }}">
              Learn How It Works
            </a>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION 6: CUSTOMER BENEFITS TRUST BAR (4 Feature Columns) -->
<section class="w-full py-space-xl bg-surface-container-low mt-space-lg">
<div class="max-w-7xl mx-auto px-gutter lg:px-gutter-lg">
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-gutter-lg">
<!-- Feature 1 -->
<div class="flex items-start gap-space-md p-space-md bg-surface-container-lowest rounded-xl shadow-sm">
<div class="w-12 h-12 rounded-full bg-primary-fixed flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined text-2xl">local_shipping</span>
</div>
<div>
<h3 class="font-headline-sm text-base font-semibold text-on-surface">Express Delivery</h3>
<p class="font-body-sm text-body-sm text-secondary mt-1">24h Colombo courier; 48h to Kandy, Galle, Jaffna &amp; islandwide.</p>
</div>
</div>
<!-- Feature 2 -->
<div class="flex items-start gap-space-md p-space-md bg-surface-container-lowest rounded-xl shadow-sm">
<div class="w-12 h-12 rounded-full bg-tertiary-fixed flex items-center justify-center text-tertiary shrink-0">
<span class="material-symbols-outlined text-2xl">sync_alt</span>
</div>
<div>
<h3 class="font-headline-sm text-base font-semibold text-on-surface">Easy 14-Day Exchanges</h3>
<p class="font-body-sm text-body-sm text-secondary mt-1">Doorstep courier pickup exchange throughout Sri Lanka.</p>
</div>
</div>
<!-- Feature 3 -->
<div class="flex items-start gap-space-md p-space-md bg-surface-container-lowest rounded-xl shadow-sm">
<div class="w-12 h-12 rounded-full bg-secondary-fixed flex items-center justify-center text-secondary shrink-0">
<span class="material-symbols-outlined text-2xl">verified</span>
</div>
<div>
<h3 class="font-headline-sm text-base font-semibold text-on-surface">100% Authentic Brands</h3>
<p class="font-body-sm text-body-sm text-secondary mt-1">Directly vetted master weavers, gem labs &amp; global houses.</p>
</div>
</div>
<!-- Feature 4 -->
<div class="flex items-start gap-space-md p-space-md bg-surface-container-lowest rounded-xl shadow-sm">
<div class="w-12 h-12 rounded-full bg-primary-fixed flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined text-2xl">support_agent</span>
</div>
<div>
<h3 class="font-headline-sm text-base font-semibold text-on-surface">Colombo Concierge</h3>
<p class="font-body-sm text-body-sm text-secondary mt-1">24/7 dedicated personal shopping support via WhatsApp &amp; phone.</p>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION 7: CUSTOMER TESTIMONIALS -->
<section class="w-full py-space-xl bg-surface">
<div class="max-w-7xl mx-auto px-gutter lg:px-gutter-lg">
<div class="text-center max-w-2xl mx-auto mb-space-xl">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold">Client Voices</span>
<h2 class="font-headline-lg text-headline-lg text-on-surface mt-space-xs">Worn &amp; Adored Across Ceylon</h2>
<p class="font-body-md text-body-md text-secondary mt-space-xs">
          Discover why thousands of discerning shoppers trust Luvora for their contemporary luxury and festive wardrobes.
        </p>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-gutter-lg">
<!-- Review 1 -->
<div class="bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center gap-1 text-amber-500 mb-space-sm">
<span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
</div>
<p class="font-body-md text-body-md text-on-surface leading-relaxed italic">
              “The Handloom Linen Wrap Dress exceeded my expectations. The weight of the fabric is heavenly for Colombo’s tropical climate, and I received it within 24 hours via express courier!”
            </p>
</div>
<div class="flex items-center gap-space-md pt-space-md mt-space-md border-t-0">
<img class="w-12 h-12 rounded-full object-cover shadow-sm" data-alt="Portrait of stylish modern Sri Lankan woman smiling warmly, wearing delicate pearl jewelry against tropical greenery." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBmgpbho0FrliUMh5gjWnLgR4FFiTL3_z_5WBKUZkTv5Ch1NSrrQQ4xIzHgOMW297bjGlR0GYPUIWMaiO-TZ02lOjlUsbxM2f77SyfJVNwfrcmrr6XAn8rgetd9R_uE01rJEJ_UxHsvLYywKsIRceCthlQrP8IOdiKznHDW4EhuiVJcHmSUcNyF3EWqzbtlGPDnwgRHVU6bftmdSwxEXbDUX1Pj64SXx2YhKN7GWgI4hMsRYE_Q3_ws"/>
<div>
<div class="flex items-center gap-1.5">
<h3 class="font-headline-sm text-sm font-semibold text-on-surface">Ananya Senanayake</h3>
<span class="material-symbols-outlined text-tertiary text-sm" title="Verified Buyer">verified</span>
</div>
<p class="font-label-sm text-label-sm text-secondary">Colombo 07 • Verified Buyer</p>
</div>
</div>
</div>
<!-- Review 2 -->
<div class="bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center gap-1 text-amber-500 mb-space-sm">
<span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
</div>
<p class="font-body-md text-body-md text-on-surface leading-relaxed italic">
              “Luvora is hands down the finest curated platform on the island. Bought my husband two linen shirts and used Koko checkout. Seamless 3-split payments with zero fuss!”
            </p>
</div>
<div class="flex items-center gap-space-md pt-space-md mt-space-md border-t-0">
<img class="w-full h-full max-w-[48px] max-h-[48px] rounded-full object-cover shadow-sm" data-alt="Portrait of distinguished professional gentleman in an unstructured linen blazer against urban architectural backdrop." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBDuB03llY32H8W1BQ4O0TijzMqrMFIaWyB86co6l5NbPSAT2rXmFwg_zCiRxB_py0tb4did5KQpe_Uwvq1mihl1CzmKj3whPE5qJIYCTgLP0Nj84N6JCh0p8COleVj0pHHkr_s-aHIrZBu6c09CXrGhBGjNRCeRzIl8S6oQXzQ0LKz5shwB2dGJEQzIET8LMoV-qCw8ErQ-KFpYs_qP-wSvG3IbDjfSgoxnb61bKbtSXa3QUMOnBTz"/>
<div>
<div class="flex items-center gap-1.5">
<h3 class="font-headline-sm text-sm font-semibold text-on-surface">Dilan Wickramasinghe</h3>
<span class="material-symbols-outlined text-tertiary text-sm" title="Verified Buyer">verified</span>
</div>
<p class="font-label-sm text-label-sm text-secondary">Kandy • Verified Buyer</p>
</div>
</div>
</div>
<!-- Review 3 -->
<div class="bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center gap-1 text-amber-500 mb-space-sm">
<span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
</div>
<p class="font-body-md text-body-md text-on-surface leading-relaxed italic">
              “The Ceylon Sapphire pendant came with its national gemological certificate. The packaging was immaculate. Felt like unboxing jewelry in Paris or Milan.”
            </p>
</div>
<div class="flex items-center gap-space-md pt-space-md mt-space-md border-t-0">
<img class="w-12 h-12 rounded-full object-cover shadow-sm" data-alt="Portrait of elegant Sri Lankan woman smiling gently, wearing silk blouse in an art gallery environment." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDvH07yVzAwuPnwfOQSXEIV99GlSO3MIewzsDuEuaW7UWyv1AYBW6iYARCkCex_UGKcRG0qmKA1B6BeOq4PVQEMkCMFefj_FgYgo9EHJB6FWFESuh5pRAyJwfskF1kEmGx5p8-5JwRGpQanSri5Uq9NLPpIVaVj1EqKHLMWGy-68Za5ENz1nCxN5J_RFZ5xALdJWG74mDpazHjR7mDxVWJ1AZrWq0BeyCRKcxfDtDr0F4q0ya4Nxxvy"/>
<div>
<div class="flex items-center gap-1.5">
<h3 class="font-headline-sm text-sm font-semibold text-on-surface">Shalomi Perera</h3>
<span class="material-symbols-outlined text-tertiary text-sm" title="Verified Buyer">verified</span>
</div>
<p class="font-label-sm text-label-sm text-secondary">Galle • Verified Buyer</p>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION 8: VIP NEWSLETTER & STYLE CLUB SIGNUP -->
<section class="w-full py-space-xl bg-surface-container-low mb-space-md">
<div class="max-w-4xl mx-auto px-gutter lg:px-gutter-lg">
<div class="bg-surface-container-lowest rounded-3xl p-space-lg md:p-space-xl shadow-xl text-center relative overflow-hidden">
<!-- Decorative Ambient Rings -->
<div class="absolute -right-20 -bottom-20 w-64 h-64 bg-primary-fixed/40 rounded-full blur-2xl pointer-events-none"></div>
<div class="absolute -left-20 -top-20 w-64 h-64 bg-secondary-fixed/40 rounded-full blur-2xl pointer-events-none"></div>
<div class="relative z-10 max-w-xl mx-auto">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold bg-primary-fixed px-space-sm py-1 rounded-full">
            VIP Privileges
          </span>
<h2 class="font-headline-lg text-headline-lg text-on-surface mt-space-sm">
            Join the Luvora Style Club
          </h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-space-xs mb-space-lg">
            Receive an instant <strong class="text-on-surface font-semibold">15% off voucher</strong> for your first order, private runway preview invites, and priority artisan gem drops.
          </p>
<!-- Interactive Newsletter Form -->
<form class="flex flex-col sm:flex-row items-center gap-space-xs w-full" id="newsletter-form" onsubmit="event.preventDefault(); document.getElementById('newsletter-success').classList.remove('hidden'); this.classList.add('hidden');">
<input class="w-full bg-surface-container-low text-on-surface px-space-md py-space-md rounded-full font-body-md text-body-md outline-none focus:ring-2 focus:ring-primary shadow-inner" placeholder="Enter your VIP email address..." required="" type="email"/>
<button class="w-full sm:w-auto shrink-0 px-space-xl py-space-md bg-on-background text-surface-container-lowest hover:bg-primary font-label-lg text-label-lg uppercase tracking-wider rounded-full shadow-md transition-all duration-200" type="submit">
              Claim 15% Off
            </button>
</form>
<!-- Success State -->
<div class="hidden p-space-md bg-tertiary-fixed text-on-tertiary-fixed rounded-xl font-label-md text-label-md" id="newsletter-success">
<span class="material-symbols-outlined align-middle mr-1">check_circle</span>
            Welcome to the Society! Your 15% discount code is <strong>LUVORA15</strong>.
          </div>
<p class="font-label-sm text-[11px] text-secondary mt-space-md">
            By joining, you agree to Luvora's Terms &amp; Privacy Policy. Unsubscribe anytime with 1-click.
          </p>
</div>
</div>
</div>
</section>
<!-- Interactive JavaScript for Category Switching -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
      const tabBtns = document.querySelectorAll('#category-tabs .tab-btn');
      const tabItems = document.querySelectorAll('#tabbed-product-grid .tab-item');

      tabBtns.forEach(btn => {
        btn.addEventListener('click', () => {
          // Reset button styles
          tabBtns.forEach(b => {
            b.classList.remove('bg-on-background', 'text-surface-container-lowest', 'shadow-sm');
            b.classList.add('text-on-surface-variant');
          });

          // Highlight selected
          btn.classList.add('bg-on-background', 'text-surface-container-lowest', 'shadow-sm');
          btn.classList.remove('text-on-surface-variant');

          const targetCat = btn.getAttribute('data-cat');

          // Filter product cards
          tabItems.forEach(item => {
            if (targetCat === 'all' || item.getAttribute('data-cat') === targetCat) {
              item.style.display = 'flex';
            } else {
              item.style.display = 'none';
            }
          });
        });
      });
    });
  </script>
</div></main><footer class="w-full bg-surface-container-low mt-space-xl pt-space-xl pb-space-lg shadow-[0_1px_8px_rgba(0,0,0,0.02)]"><div class="max-w-7xl mx-auto px-gutter lg:px-gutter-lg"><div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-gutter-lg pb-space-xl"><div class="lg:col-span-2 pr-space-lg"><div class="flex items-center gap-space-sm mb-space-md"></div><p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md leading-relaxed">The premier high-fashion sanctuary of Ceylon. Curating world-class island artisanal craftsmanship, ethical gems, and international contemporary collections for refined global wardrobes.</p><div class="space-y-space-xs"><p class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">Join the Luvora Society</p><div class="flex items-center gap-space-xs max-w-sm"><input class="w-full bg-surface-container-lowest border border-outline-variant rounded-full px-space-md py-space-xs font-body-sm text-body-sm text-on-surface focus:outline-none focus:border-primary" placeholder="Enter your email..." type="email"/><a href="{{ route('newsletter') }}" class="bg-on-background text-surface-container-lowest font-label-md text-label-md uppercase px-space-md py-space-xs rounded-full hover:bg-primary transition-colors shrink-0">Join</a></div></div></div><div><h3 class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface mb-space-md">Shop</h3><ul class="space-y-space-xs"><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="women" href="{{ route('shop.category', 'women') }}">Women's Couture</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="men" href="{{ route('shop.category', 'men') }}">Men's Tailoring</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="jewelry" href="{{ route('shop.category', 'jewelry') }}">Bespoke Fine Jewelry</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="shoes" href="{{ route('shop.category', 'shoes') }}">Artisanal Footwear</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="essentials" href="{{ route('shop.category', 'essentials') }}">Island Resort Essentials</a></li></ul></div><div><h3 class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface mb-space-md">Customer Care</h3><ul class="space-y-space-xs"><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="contact-concierge" href="{{ route('customer-care.contact') }}">Client Concierge</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="shipping-deliveries" href="{{ route('customer-care.shipping') }}">Island-wide Shipping</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="returns-exchanges" href="{{ route('customer-care.returns') }}">Returns &amp; Exchanges</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="colombo-same-day" href="{{ route('customer-care.colombo-express') }}">Colombo Express Hub</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="size-guide" href="{{ route('customer-care.size-guide') }}">Bespoke Size Guide</a></li></ul></div><div><h3 class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface mb-space-md">About &amp; Legal</h3><ul class="space-y-space-xs"><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="about-luvora" href="{{ route('about.heritage') }}">Our Heritage</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="sri-lankan-artisans" href="{{ route('about.artisans') }}">Artisan Guild</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="privacy-policy" href="{{ route('legal.privacy') }}">Privacy Policy</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="terms-of-service" href="{{ route('legal.terms') }}">Terms of Luxury</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="authenticity" href="{{ route('authenticity') }}">Certificate of Authenticity</a></li></ul></div></div>@include('partials.footer-bottom')</div></footer><script>
(function(){
 const key='luvora-wishlist';
 const read=()=>{try{return JSON.parse(localStorage.getItem(key)||'[]')}catch{return[]}};
 const write=(items)=>{localStorage.setItem(key,JSON.stringify(items)); document.querySelectorAll('[data-wishlist-count]').forEach(el=>el.textContent=items.length)};
 document.addEventListener('click',event=>{
  const button=event.target.closest('[data-wishlist-toggle]'); if(!button)return;
  const card=button.closest('[data-product-id]'); if(!card)return;
  const item={id:card.dataset.productId,name:card.dataset.productName,price:Number(card.dataset.productPrice||0),image:card.dataset.productImage||'',url:card.dataset.productUrl||'/shop'};
  const items=read(); const index=items.findIndex(saved=>String(saved.id)===String(item.id));
  if(index>=0) items.splice(index,1); else items.unshift(item);
  write(items); button.setAttribute('aria-pressed',index<0?'true':'false');
 });
 document.querySelectorAll('[data-wishlist-count]').forEach(el=>el.textContent=read().length);
})();
</script></body></html>