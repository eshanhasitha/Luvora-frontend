@php
    $products = $products ?? [];
@endphp
<!DOCTYPE html>

<html lang="en"><head><meta charset="utf-8"/><meta content="width=device-width, initial-scale=1.0" name="viewport"/><link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&amp;family=Inter:wght@400;500;600;700&amp;family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&amp;display=swap" rel="stylesheet"/><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/><style>@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config={darkMode:"class",theme:{extend:{"colors":{"tertiary-fixed":"#6ffbbe","surface":"#f7f9fb","secondary-fixed":"#dae2fd","surface-container-high":"#e6e8ea","on-background":"#191c1e","secondary-container":"#dae2fd","tertiary":"#006947","inverse-on-surface":"#eff1f3","surface-container-low":"#f2f4f6","on-tertiary-container":"#f5fff6","surface-tint":"#005eb3","surface-container-lowest":"#ffffff","outline":"#717785","on-tertiary":"#ffffff","on-tertiary-fixed":"#002113","on-secondary-fixed":"#131b2e","surface-bright":"#f7f9fb","surface-dim":"#d8dadc","primary":"#005baf","outline-variant":"#c0c6d6","primary-fixed":"#d5e3ff","primary-fixed-dim":"#a8c8ff","error-container":"#ffdad6","on-primary-fixed":"#001b3c","on-error":"#ffffff","secondary":"#565e74","primary-container":"#0074db","on-error-container":"#93000a","on-primary-container":"#fefcff","on-surface-variant":"#404754","surface-container-highest":"#e0e3e5","on-surface":"#191c1e","tertiary-container":"#00855b","on-tertiary-fixed-variant":"#005236","secondary-fixed-dim":"#bec6e0","surface-container":"#eceef0","on-secondary-fixed-variant":"#3f465c","error":"#ba1a1a","on-secondary-container":"#5c647a","inverse-surface":"#2d3133","surface-variant":"#e0e3e5","background":"#f7f9fb","on-primary":"#ffffff","tertiary-fixed-dim":"#4edea3","on-secondary":"#ffffff","on-primary-fixed-variant":"#004689","inverse-primary":"#a8c8ff"},"borderRadius":{"DEFAULT":"0.25rem","lg":"0.5rem","xl":"0.75rem","full":"9999px"},"spacing":{"space-lg":"1.5rem","gutter":"1.5rem","space-sm":"0.5rem","margin-lg":"4rem","space-xs":"0.25rem","gutter-sm":"1rem","margin":"1.5rem","space-xl":"2.5rem","gutter-lg":"2rem","space-md":"1rem","margin-sm":"1rem"},"fontFamily":{"label-sm":["Inter"],"display-hero":["Bodoni Moda"],"body-sm":["Plus Jakarta Sans"],"headline-sm":["Plus Jakarta Sans"],"body-lg":["Plus Jakarta Sans"],"headline-lg":["Bodoni Moda"],"label-lg":["Inter"],"body-md":["Plus Jakarta Sans"],"headline-md":["Bodoni Moda"],"label-md":["Inter"],"display-hero-mobile":["Bodoni Moda"],"headline-lg-mobile":["Bodoni Moda"]},"fontSize":{"label-sm":["11px",{"lineHeight":"14px","letterSpacing":"0.06em","fontWeight":"600"}],"display-hero":["56px",{"lineHeight":"64px","letterSpacing":"-0.02em","fontWeight":"600"}],"body-sm":["13px",{"lineHeight":"18px","fontWeight":"400"}],"headline-sm":["20px",{"lineHeight":"28px","fontWeight":"600"}],"body-lg":["18px",{"lineHeight":"28px","fontWeight":"400"}],"headline-lg":["40px",{"lineHeight":"48px","letterSpacing":"-0.01em","fontWeight":"500"}],"label-lg":["14px",{"lineHeight":"20px","letterSpacing":"0.02em","fontWeight":"600"}],"body-md":["15px",{"lineHeight":"22px","fontWeight":"400"}],"headline-md":["28px",{"lineHeight":"34px","fontWeight":"500"}],"label-md":["12px",{"lineHeight":"16px","letterSpacing":"0.04em","fontWeight":"500"}],"display-hero-mobile":["38px",{"lineHeight":"44px","letterSpacing":"-0.01em","fontWeight":"600"}],"headline-lg-mobile":["30px",{"lineHeight":"36px","letterSpacing":"0em","fontWeight":"500"}]}}}}</script></head><body class="bg-surface font-body-md text-on-surface antialiased"><header class="bg-surface-container-lowest shadow-[0_1px_8px_rgba(0,0,0,0.04)]"><div class="bg-on-background text-surface-container-lowest py-space-xs px-gutter-sm text-center"><div class="max-w-7xl mx-auto flex items-center justify-center gap-space-sm"><span class="material-symbols-outlined text-primary-fixed-dim text-sm">local_shipping</span><p class="font-label-sm text-label-sm tracking-wider uppercase">Island-wide Sri Lanka Express Delivery | Free shipping over LKR 15,000 | Colombo Same-Day Available</p></div></div><div class="h-28 max-w-7xl mx-auto px-gutter lg:px-gutter-lg flex flex-col justify-between pt-space-sm pb-space-xs"><div class="flex items-center justify-between gap-space-lg"><div class="flex items-center gap-space-md"><a class="flex items-center gap-space-sm" data-path="home" href="{{ route('home') }}"><img alt="Luvora Brand Logo" class="h-10 w-auto object-contain" src="{{ asset('images/logo.png') }}"/></a></div><div class="hidden md:flex flex-1 max-w-xl mx-space-lg"><div class="relative w-full flex items-center bg-surface-container-low rounded-full px-space-md py-space-xs focus-within:ring-2 focus-within:ring-primary focus-within:bg-surface-container-lowest transition-all"><span class="material-symbols-outlined text-secondary mr-space-sm text-lg">search</span><input class="w-full bg-transparent border-none outline-none font-body-sm text-body-sm text-on-surface placeholder:text-secondary" placeholder="Search Ceylon sapphire jewelry, handloom silks, bespoke couture..." type="text"/><span class="font-label-sm text-label-sm text-secondary bg-surface-container-high px-space-xs py-0.5 rounded uppercase">Auto</span></div></div><div class="flex items-center gap-space-md"><a class="relative p-space-xs text-on-surface-variant hover:text-primary transition-colors" data-path="wishlist" href="{{ route('wishlist.index') }}"><span class="material-symbols-outlined">favorite</span><span class="absolute -top-0.5 -right-0.5 bg-primary text-on-primary font-label-sm text-label-sm w-4 h-4 rounded-full flex items-center justify-center text-[10px]" data-wishlist-count>0</span></a><a class="relative p-space-xs text-on-surface-variant hover:text-primary transition-colors" data-path="cart" href="{{ route('cart.index') }}"><span class="material-symbols-outlined">shopping_bag</span><span class="absolute -top-0.5 -right-0.5 bg-primary text-on-primary font-label-sm text-label-sm w-4 h-4 rounded-full flex items-center justify-center text-[10px]">2</span></a><div class="flex items-center gap-space-xs pl-space-xs">@include('partials.profile-link')</div></div></div>@include('partials.category-nav')</div></header><main class="w-full bg-surface min-h-screen"><div class="flex flex-col w-full">
<!-- Editorial Canvas Hero -->
<section class="relative w-full overflow-hidden bg-surface-container-lowest">
<div class="max-w-7xl mx-auto px-gutter lg:px-gutter-lg pt-space-lg pb-space-xl">
<!-- Breadcrumb Navigation -->
<nav class="flex items-center gap-space-xs text-secondary font-label-sm text-label-sm mb-space-md tracking-wider uppercase">
<a class="hover:text-primary transition-colors" href="{{ route('home') }}">Home</a>
<span class="material-symbols-outlined text-xs">chevron_right</span>
<span class="text-on-surface font-medium">Categories</span>
<span class="material-symbols-outlined text-xs">chevron_right</span>
<span class="text-on-surface font-semibold" aria-current="page">{{ $catalogTitle }}</span>
</nav>
<!-- Main Editorial Header Banner -->
<div class="relative rounded-2xl overflow-hidden bg-surface-container-high">
<div class="grid grid-cols-1 lg:grid-cols-12 min-h-[380px] lg:min-h-[440px]">
<!-- Visual Image Stage -->
<div class="lg:col-span-7 relative order-2 lg:order-1 overflow-hidden min-h-[260px] lg:min-h-full">
<img class="w-full h-full object-cover object-center transform hover:scale-105 transition-transform duration-700 ease-out" data-alt="Editorial Sri Lankan high-fashion model wearing an ethereal handloom raw silk saree with geometric Dumbara patterns, basking in golden tropical equatorial afternoon light inside a minimalist Geoffrey Bawa inspired architectural courtyard, editorial luxury aesthetic in cream, indigo, and terracotta tones." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDWGAK4UI60m3j5Yw8KWdM2V3E6OMI_n4B_K0OJUb1zg94R8JtQybubg4dOHi23ujMvs1c3k6zLy2Ck1iLsN-K_VhVys-geu-6rNUYV0jg-pqz7r2rurOIewcUvVfzFmRSXxkPiiDFfnt7SL1gZbmwF9aE9wrRUbY_XmSWT_0c6tdutBJPoHTxsuDDmXlQGs1vd6Q6BKlyRpGm1i73KbuPW44p0TS6LZoOVVdm7r0zAOs4dHoMVxZEr"/>
<div class="absolute inset-0 bg-gradient-to-t from-surface-container-high/90 via-transparent to-transparent lg:bg-gradient-to-r lg:from-transparent lg:to-surface-container-high"></div>
<div class="absolute bottom-space-md left-space-md bg-surface-container-lowest/85 backdrop-blur-md px-space-md py-space-xs rounded-full flex items-center gap-space-xs shadow-sm">
<span class="w-2 h-2 rounded-full bg-tertiary"></span>
<span class="font-label-sm text-label-sm text-on-surface uppercase tracking-widest">Heritage Series 2025</span>
</div>
</div>
<!-- Editorial Copy Block -->
<div class="lg:col-span-5 flex flex-col justify-between p-space-lg lg:p-space-xl order-1 lg:order-2 bg-surface-container-high">
<div>
<div class="inline-flex items-center gap-space-xs px-space-sm py-0.5 rounded-full bg-surface-container-lowest text-primary font-label-sm text-label-sm uppercase tracking-wider mb-space-sm shadow-sm">
<span class="material-symbols-outlined text-xs">auto_awesome</span>
<span>{{ $catalogEyebrow ?? $catalogTitle }}</span>
</div>
<h1 class="font-display-hero text-headline-lg lg:text-display-hero text-on-surface tracking-tight leading-none mb-space-md">
                {{ $catalogTitle }}
              </h1>
<p class="font-body-md text-body-md text-on-surface-variant max-w-md leading-relaxed mb-space-lg">
                {{ $catalogDescription ?? 'Explore our curated ' . $catalogTitle . ' collection, selected for quality, craft, and everyday style.' }}
              </p>
</div>
<!-- Trust Badges Strip -->
<div class="grid grid-cols-3 gap-space-sm pt-space-md border-t-0">
<div class="flex items-start gap-space-xs">
<span class="material-symbols-outlined text-primary text-base">bolt</span>
<div>
<p class="font-label-sm text-label-sm font-semibold text-on-surface leading-tight">24–48h Island</p>
<p class="font-label-sm text-label-sm text-secondary leading-tight">Express Colombo</p>
</div>
</div>
<div class="flex items-start gap-space-xs">
<span class="material-symbols-outlined text-tertiary text-base">verified</span>
<div>
<p class="font-label-sm text-label-sm font-semibold text-on-surface leading-tight">Handloom Guild</p>
<p class="font-label-sm text-label-sm text-secondary leading-tight">Certified Origin</p>
</div>
</div>
<div class="flex items-start gap-space-xs">
<span class="material-symbols-outlined text-on-surface text-base">cut</span>
<div>
<p class="font-label-sm text-label-sm font-semibold text-on-surface leading-tight">Atelier Fittings</p>
<p class="font-label-sm text-label-sm text-secondary leading-tight">Doorstep Hemming</p>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Subcategory Horizontal Carousel Pills -->
<div class="mt-space-lg flex items-center gap-space-sm overflow-x-auto pb-space-xs">
<button class="px-space-md py-space-xs rounded-full bg-primary text-on-primary font-label-md text-label-md uppercase tracking-wider whitespace-nowrap shadow-sm hover:opacity-95 transition-all">
          All Couture <span class="ml-1 opacity-80 font-normal">(124)</span>
</button>
<button class="px-space-md py-space-xs rounded-full bg-surface-container-low text-on-surface font-label-md text-label-md uppercase tracking-wider whitespace-nowrap hover:bg-surface-container-high transition-colors">
          Handloom Sarees <span class="ml-1 text-secondary font-normal">(38)</span>
</button>
<button class="px-space-md py-space-xs rounded-full bg-surface-container-low text-on-surface font-label-md text-label-md uppercase tracking-wider whitespace-nowrap hover:bg-surface-container-high transition-colors">
          Linen Wrap Dresses <span class="ml-1 text-secondary font-normal">(24)</span>
</button>
<button class="px-space-md py-space-xs rounded-full bg-surface-container-low text-on-surface font-label-md text-label-md uppercase tracking-wider whitespace-nowrap hover:bg-surface-container-high transition-colors">
          Pleated Raw Silks <span class="ml-1 text-secondary font-normal">(19)</span>
</button>
<button class="px-space-md py-space-xs rounded-full bg-surface-container-low text-on-surface font-label-md text-label-md uppercase tracking-wider whitespace-nowrap hover:bg-surface-container-high transition-colors">
          Resort Kaftans <span class="ml-1 text-secondary font-normal">(18)</span>
</button>
<button class="px-space-md py-space-xs rounded-full bg-surface-container-low text-on-surface font-label-md text-label-md uppercase tracking-wider whitespace-nowrap hover:bg-surface-container-high transition-colors">
          Atelier Eveningwear <span class="ml-1 text-secondary font-normal">(15)</span>
</button>
<button class="px-space-md py-space-xs rounded-full bg-surface-container-low text-on-surface font-label-md text-label-md uppercase tracking-wider whitespace-nowrap hover:bg-surface-container-high transition-colors">
          Hand-Embroidered Blouses <span class="ml-1 text-secondary font-normal">(10)</span>
</button>
</div>
</div>
</section>
<!-- Main Catalog Shell & Filters -->
<section class="max-w-7xl mx-auto px-gutter lg:px-gutter-lg w-full pt-space-lg pb-space-xl">
<!-- Controls & Active Filter Bar -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm mb-space-lg flex flex-col md:flex-row md:items-center justify-between gap-space-md">
<!-- Status & Active Filters -->
<div class="flex flex-wrap items-center gap-space-xs">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary mr-space-xs">{{ count($products) }} Creations</span>
<div class="h-4 w-px bg-surface-container-high hidden md:block"></div>
<span class="inline-flex items-center gap-1 bg-surface-container-low text-on-surface font-label-sm text-label-sm px-space-sm py-1 rounded-full">
          Handloom Sarees
          <button class="material-symbols-outlined text-xs hover:text-error">close</button>
</span>
<span class="inline-flex items-center gap-1 bg-surface-container-low text-on-surface font-label-sm text-label-sm px-space-sm py-1 rounded-full">
          Pure Raw Silk
          <button class="material-symbols-outlined text-xs hover:text-error">close</button>
</span>
<span class="inline-flex items-center gap-1 bg-surface-container-low text-on-surface font-label-sm text-label-sm px-space-sm py-1 rounded-full">
          In Stock Only
          <button class="material-symbols-outlined text-xs hover:text-error">close</button>
</span>
<button class="font-label-sm text-label-sm text-primary hover:underline ml-space-xs uppercase tracking-wider">
          Reset All
        </button>
</div>
<!-- Sorting & Density Switcher -->
<div class="flex items-center gap-space-md justify-between md:justify-end">
<div class="flex items-center gap-space-xs">
<label class="font-label-sm text-label-sm text-secondary uppercase tracking-wider hidden sm:inline" for="catalog-sort">Sort:</label>
<div class="relative">
<select class="bg-surface-container-low text-on-surface font-label-md text-label-md rounded-lg py-space-xs pl-space-sm pr-space-lg focus:outline-none appearance-none cursor-pointer" id="catalog-sort">
<option>Featured Curations</option>
<option>Artisan Provenance Rank</option>
<option>Price: Low to High</option>
<option>Price: High to Low</option>
<option>Newest Arrivals</option>
</select>
<span class="material-symbols-outlined absolute right-2 top-2 text-sm pointer-events-none text-secondary">expand_more</span>
</div>
</div>
<div class="hidden sm:flex items-center gap-1 bg-surface-container-low p-1 rounded-lg">
<button class="p-1 rounded bg-surface-container-lowest text-primary shadow-xs" id="view-3-col">
<span class="material-symbols-outlined text-base">view_column</span>
</button>
<button class="p-1 rounded text-secondary hover:text-on-surface" id="view-4-col">
<span class="material-symbols-outlined text-base">grid_view</span>
</button>
</div>
</div>
</div>
<!-- Dual Column Responsive Layout -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter-lg">
<!-- Faceted Desktop Sidebar Filters -->
<aside class="hidden lg:block lg:col-span-3 space-y-space-lg">
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm space-y-space-lg">
<!-- Filter Header -->
<div class="flex items-center justify-between pb-space-xs">
<h2 class="font-headline-sm text-headline-sm text-on-surface">Refine Silhouettes</h2>
<button class="font-label-sm text-label-sm uppercase tracking-wider text-secondary hover:text-error transition-colors">Clear</button>
</div>
<!-- Artisan Guilds & Weavers -->
<div>
<h3 class="font-label-sm text-label-sm uppercase tracking-wider text-secondary mb-space-sm">Artisan Provenance</h3>
<div class="space-y-space-xs">
<label class="flex items-center justify-between text-body-sm text-on-surface hover:text-primary cursor-pointer">
<span class="flex items-center gap-2">
<input checked="" class="w-4 h-4 rounded text-primary accent-primary" type="checkbox"/>
                  Dumbara Guild Heritage
                </span>
<span class="font-label-sm text-secondary">42</span>
</label>
<label class="flex items-center justify-between text-body-sm text-on-surface hover:text-primary cursor-pointer">
<span class="flex items-center gap-2">
<input class="w-4 h-4 rounded text-primary accent-primary" type="checkbox"/>
                  Galle Botanical Dye Studio
                </span>
<span class="font-label-sm text-secondary">28</span>
</label>
<label class="flex items-center justify-between text-body-sm text-on-surface hover:text-primary cursor-pointer">
<span class="flex items-center gap-2">
<input checked="" class="w-4 h-4 rounded text-primary accent-primary" type="checkbox"/>
                  Matale Handloom Reserve
                </span>
<span class="font-label-sm text-secondary">31</span>
</label>
<label class="flex items-center justify-between text-body-sm text-on-surface hover:text-primary cursor-pointer">
<span class="flex items-center gap-2">
<input class="w-4 h-4 rounded text-primary accent-primary" type="checkbox"/>
                  Kandy Master Silk Weavers
                </span>
<span class="font-label-sm text-secondary">23</span>
</label>
</div>
</div>
<!-- Fabric & Raw Materials -->
<div class="pt-space-sm">
<h3 class="font-label-sm text-label-sm uppercase tracking-wider text-secondary mb-space-sm">Fiber &amp; Texture</h3>
<div class="space-y-space-xs">
<label class="flex items-center justify-between text-body-sm text-on-surface hover:text-primary cursor-pointer">
<span class="flex items-center gap-2">
<input checked="" class="w-4 h-4 rounded text-primary accent-primary" type="checkbox"/>
                  Pure Raw Mulberry Silk
                </span>
<span class="font-label-sm text-secondary">54</span>
</label>
<label class="flex items-center justify-between text-body-sm text-on-surface hover:text-primary cursor-pointer">
<span class="flex items-center gap-2">
<input class="w-4 h-4 rounded text-primary accent-primary" type="checkbox"/>
                  Organic Lotus Stem Fibre
                </span>
<span class="font-label-sm text-secondary">16</span>
</label>
<label class="flex items-center justify-between text-body-sm text-on-surface hover:text-primary cursor-pointer">
<span class="flex items-center gap-2">
<input class="w-4 h-4 rounded text-primary accent-primary" type="checkbox"/>
                  Equatorial Ceylon Linen
                </span>
<span class="font-label-sm text-secondary">38</span>
</label>
<label class="flex items-center justify-between text-body-sm text-on-surface hover:text-primary cursor-pointer">
<span class="flex items-center gap-2">
<input class="w-4 h-4 rounded text-primary accent-primary" type="checkbox"/>
                  Cruelty-Free Ahimsa Silk
                </span>
<span class="font-label-sm text-secondary">16</span>
</label>
</div>
</div>
<!-- Price Brackets (LKR) -->
<div class="pt-space-sm">
<h3 class="font-label-sm text-label-sm uppercase tracking-wider text-secondary mb-space-sm">Price Range (LKR)</h3>
<div class="space-y-space-xs">
<label class="flex items-center justify-between text-body-sm text-on-surface hover:text-primary cursor-pointer">
<span class="flex items-center gap-2">
<input class="w-4 h-4 text-primary accent-primary" name="price-bracket" type="radio"/>
                  Under LKR 15,000
                </span>
<span class="font-label-sm text-secondary">18</span>
</label>
<label class="flex items-center justify-between text-body-sm text-on-surface hover:text-primary cursor-pointer">
<span class="flex items-center gap-2">
<input checked="" class="w-4 h-4 text-primary accent-primary" name="price-bracket" type="radio"/>
                  LKR 15,000 – 30,000
                </span>
<span class="font-label-sm text-secondary">64</span>
</label>
<label class="flex items-center justify-between text-body-sm text-on-surface hover:text-primary cursor-pointer">
<span class="flex items-center gap-2">
<input class="w-4 h-4 text-primary accent-primary" name="price-bracket" type="radio"/>
                  LKR 30,000 – 60,000
                </span>
<span class="font-label-sm text-secondary">32</span>
</label>
<label class="flex items-center justify-between text-body-sm text-on-surface hover:text-primary cursor-pointer">
<span class="flex items-center gap-2">
<input class="w-4 h-4 text-primary accent-primary" name="price-bracket" type="radio"/>
                  LKR 60,000 &amp; Above
                </span>
<span class="font-label-sm text-secondary">10</span>
</label>
</div>
</div>
<!-- Size Selector -->
<div class="pt-space-sm">
<div class="flex items-center justify-between mb-space-sm">
<h3 class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">Atelier Sizing</h3>
<a class="font-label-sm text-label-sm text-primary hover:underline" href="{{ route('customer-care.size-guide') }}">Size Chart</a>
</div>
<div class="grid grid-cols-4 gap-space-xs">
<button class="py-2 text-center rounded-lg bg-surface-container-low font-label-md text-label-md text-on-surface hover:bg-surface-container-high transition-colors">XS</button>
<button class="py-2 text-center rounded-lg bg-primary text-on-primary font-label-md text-label-md shadow-sm">S</button>
<button class="py-2 text-center rounded-lg bg-surface-container-low font-label-md text-label-md text-on-surface hover:bg-surface-container-high transition-colors">M</button>
<button class="py-2 text-center rounded-lg bg-surface-container-low font-label-md text-label-md text-on-surface hover:bg-surface-container-high transition-colors">L</button>
<button class="py-2 text-center rounded-lg bg-surface-container-low font-label-md text-label-md text-on-surface hover:bg-surface-container-high transition-colors">XL</button>
<button class="col-span-3 py-2 text-center rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface uppercase tracking-wider hover:bg-surface-container-high transition-colors">Custom Bespoke</button>
</div>
</div>
<!-- Color Palette Palette Swatches -->
<div class="pt-space-sm">
<h3 class="font-label-sm text-label-sm uppercase tracking-wider text-secondary mb-space-sm">Island Palette</h3>
<div class="flex flex-wrap gap-space-xs">
<button class="w-7 h-7 rounded-full bg-primary-container ring-2 ring-primary ring-offset-2" title="Indigo Blue"></button>
<button class="w-7 h-7 rounded-full bg-surface-container-lowest shadow-sm" title="Ivory Ecru"></button>
<button class="w-7 h-7 rounded-full bg-amber-200" title="Natural Lotus Ochre"></button>
<button class="w-7 h-7 rounded-full bg-amber-800" title="Cinnamon Bark Tan"></button>
<button class="w-7 h-7 rounded-full bg-tertiary" title="Sinharaja Emerald"></button>
<button class="w-7 h-7 rounded-full bg-on-primary-fixed" title="Ceylon Sapphire Navy"></button>
</div>
</div>
<!-- Sustainability Credentials -->
<div class="pt-space-sm">
<h3 class="font-label-sm text-label-sm uppercase tracking-wider text-secondary mb-space-sm">Conscious Luxury</h3>
<div class="space-y-space-xs">
<label class="flex items-center gap-2 text-body-sm text-on-surface cursor-pointer">
<input checked="" class="w-4 h-4 rounded text-primary accent-primary" type="checkbox"/>
                Naturally Hand-Dyed
              </label>
<label class="flex items-center gap-2 text-body-sm text-on-surface cursor-pointer">
<input class="w-4 h-4 rounded text-primary accent-primary" type="checkbox"/>
                Zero Chemical Discharge
              </label>
<label class="flex items-center gap-2 text-body-sm text-on-surface cursor-pointer">
<input checked="" class="w-4 h-4 rounded text-primary accent-primary" type="checkbox"/>
                Fair-Wage Artisan Guild
              </label>
<label class="flex items-center gap-2 text-body-sm text-on-surface cursor-pointer">
<input class="w-4 h-4 rounded text-primary accent-primary" type="checkbox"/>
                Single-Origin Weave
              </label>
</div>
</div>
</div>
<!-- Artisan Guild Spotlight Teaser -->
<div class="bg-surface-container-low rounded-xl p-space-lg">
<div class="flex items-center gap-space-xs text-tertiary mb-space-xs">
<span class="material-symbols-outlined text-sm">eco</span>
<span class="font-label-sm text-label-sm uppercase tracking-widest font-semibold">Slow Fashion Pledge</span>
</div>
<p class="font-headline-sm text-headline-sm text-on-surface mb-space-xs leading-snug">
            Each handloom saree sustains 3 days of traditional artisan livelihood in Kandy &amp; Matale.
          </p>
<a class="inline-flex items-center gap-1 font-label-md text-label-md text-primary font-semibold hover:underline mt-space-xs" href="{{ route('shop.index') }}">
            Explore Weavers Guild <span class="material-symbols-outlined text-sm">arrow_forward</span>
</a>
</div>
</aside>
<!-- Main Product Grid Stream -->
<div class="lg:col-span-9">
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-space-lg" id="product-grid">@if (!empty($productsUnavailable))
<div class="col-span-full rounded-xl bg-error-container p-space-lg text-on-error-container">This collection is temporarily unavailable. Please try again shortly.</div>
@elseif (empty($products))
<div class="col-span-full rounded-xl bg-surface-container-lowest p-space-xl text-center">No products found in this collection yet.</div>
@else
@foreach ($products as $product)
@php
    $productId = data_get($product, 'id');
    $productName = data_get($product, 'name', 'Product');
    $productPrice = (float) data_get($product, 'price', 0);
    $productImage = data_get($product, 'imageUrl') ?? data_get($product, 'image') ?? data_get($product, 'images.0.url');
@endphp
<article class="product-card group bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all flex flex-col justify-between" data-name="{{ strtolower($productName) }}" data-price="{{ $productPrice }}" data-product-id="{{ $productId }}" data-product-name="{{ $productName }}" data-product-price="{{ $productPrice }}" data-product-image="{{ $productImage ?? $image ?? '' }}" data-product-url="{{ $productId ? route('products.show', $productId) : route('shop.index') }}">
<div class="relative overflow-hidden aspect-[3/4] bg-surface-container-low">
<a class="block h-full" href="{{ $productId ? route('products.show', $productId) : route('shop.index') }}">
@if ($productImage)<img class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500 ease-out" src="{{ $productImage }}" alt="{{ $productName }}">@else<div class="w-full h-full flex items-center justify-center text-secondary"><span class="material-symbols-outlined text-5xl">image</span></div>@endif
</a>
<button data-wishlist-toggle aria-label="Add to wishlist" class="absolute top-space-sm right-space-sm w-9 h-9 rounded-full bg-surface-container-lowest/80 backdrop-blur-md flex items-center justify-center text-on-surface hover:text-error shadow-sm" type="button"><span class="material-symbols-outlined text-lg">favorite</span></button>
</div>
<div class="p-space-md flex flex-col flex-1 justify-between">
<div><span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">{{ data_get($product, 'brand', $catalogTitle) }}</span><h3 class="font-headline-sm text-headline-sm text-on-surface font-normal group-hover:text-primary transition-colors line-clamp-2"><a href="{{ $productId ? route('products.show', $productId) : route('shop.index') }}">{{ $productName }}</a></h3><p class="font-body-sm text-body-sm text-secondary line-clamp-2">{{ data_get($product, 'description', '') }}</p></div>
<div class="pt-space-md"><span class="font-headline-sm text-headline-sm font-bold text-on-surface">LKR {{ number_format($productPrice, 2) }}</span></div>
</div>
</article>
@endforeach
@endif<!-- Editorial Feature Card Embedded in Grid -->
<div class="sm:col-span-2 lg:col-span-1 rounded-xl bg-on-background text-surface-container-lowest p-space-lg flex flex-col justify-between relative overflow-hidden shadow-md">
<!-- Decorative Subtle Watermark SVG -->
<div class="absolute -right-8 -bottom-8 opacity-10 pointer-events-none">
<svg fill="currentColor" height="240" viewbox="0 0 100 100" width="240">
<circle cx="50" cy="50" fill="none" r="45" stroke="currentColor" stroke-width="2"></circle>
<path d="M50 15 L50 85 M15 50 L85 50" stroke="currentColor" stroke-width="2"></path>
<polygon fill="currentColor" points="50,20 60,40 50,35 40,40"></polygon>
</svg>
</div>
<div>
<span class="material-symbols-outlined text-primary-fixed-dim text-3xl mb-space-sm">airport_shuttle</span>
<span class="block font-label-sm text-label-sm text-primary-fixed-dim uppercase tracking-widest mb-space-xs font-semibold">Colombo 01–15 VIP Service</span>
<h3 class="font-headline-md text-headline-md text-surface-container-lowest leading-tight mb-space-sm">
                Doorstep Fitting &amp; Atelier Tailoring
              </h3>
<p class="font-body-sm text-body-sm text-surface-dim leading-relaxed">
                Order any high-fashion piece or handloom saree. Our electric fitting van arrives with a master seamstress for exact measurements and same-day hemming.
              </p>
</div>
<div class="pt-space-lg">
<button class="w-full bg-primary text-on-primary font-label-md text-label-md uppercase tracking-wider py-space-xs rounded-full hover:opacity-95 transition-opacity font-semibold">
                Schedule Fitting Van
              </button>
</div>
</div>
</div>
<!-- Bespoke Doorstep Banner Callout -->
<div class="mt-space-xl rounded-2xl bg-surface-container p-space-lg lg:p-space-xl relative overflow-hidden">
<div class="grid grid-cols-1 md:grid-cols-12 gap-space-lg items-center">
<div class="md:col-span-8">
<div class="flex items-center gap-space-xs text-primary font-label-sm text-label-sm uppercase tracking-wider font-semibold mb-space-xs">
<span class="material-symbols-outlined text-base">verified_user</span>
<span>The Luvora Authenticity Seal</span>
</div>
<h2 class="font-headline-md text-headline-md text-on-surface mb-space-xs">
                Direct Guild Origin &amp; NFC Authenticated
              </h2>
<p class="font-body-md text-body-md text-on-surface-variant max-w-2xl">
                Every Sri Lankan handloom saree and artisanal garment in our collection contains an embedded micro-NFC weave certifying the artisan's signature, handloom coordinates, and date of completion.
              </p>
</div>
<div class="md:col-span-4 flex justify-start md:justify-end">
<a class="inline-flex items-center gap-2 bg-on-background text-surface-container-lowest px-space-lg py-space-xs rounded-full font-label-md text-label-md uppercase tracking-wider hover:bg-primary transition-colors font-semibold shadow-sm" href="{{ route('shop.index') }}">
<span>Provenance Guide</span>
<span class="material-symbols-outlined text-base">arrow_forward</span>
</a>
</div>
</div>
</div>
<!-- Luxury Editorial Pagination -->
<div class="mt-space-xl flex flex-col sm:flex-row items-center justify-between gap-space-md pt-space-lg">
<p class="font-body-sm text-body-sm text-secondary">
            Displaying <span class="font-semibold text-on-surface">{{ min(12, count($products)) }}</span> of <span class="font-semibold text-on-surface">{{ count($products) }}</span> creations
          </p>
<div class="flex items-center gap-1">
<button class="p-2 rounded-lg text-secondary hover:text-on-surface hover:bg-surface-container-low transition-colors disabled:opacity-30" disabled="">
<span class="material-symbols-outlined text-base">chevron_left</span>
</button>
<button class="w-9 h-9 rounded-lg bg-primary text-on-primary font-label-md text-label-md font-semibold shadow-xs">
              1
            </button>
<button class="w-9 h-9 rounded-lg text-on-surface hover:bg-surface-container-low font-label-md text-label-md transition-colors">
              2
            </button>
<button class="w-9 h-9 rounded-lg text-on-surface hover:bg-surface-container-low font-label-md text-label-md transition-colors">
              3
            </button>
<span class="px-2 text-secondary font-label-sm">...</span>
<button class="w-9 h-9 rounded-lg text-on-surface hover:bg-surface-container-low font-label-md text-label-md transition-colors">
              11
            </button>
<button class="p-2 rounded-lg text-on-surface hover:bg-surface-container-low transition-colors">
<span class="material-symbols-outlined text-base">chevron_right</span>
</button>
</div>
</div>
</div>
</div>
</section>
<!-- Inline Interaction Behavior -->
<script>
    // Simple Column Density Toggle
    const btn3Col = document.getElementById('view-3-col');
    const btn4Col = document.getElementById('view-4-col');
    const productGrid = document.getElementById('product-grid');

    if (btn3Col && btn4Col && productGrid) {
      btn4Col.addEventListener('click', () => {
        productGrid.className = 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-space-md';
        btn4Col.classList.add('bg-surface-container-lowest', 'text-primary', 'shadow-xs');
        btn4Col.classList.remove('text-secondary');
        btn3Col.classList.remove('bg-surface-container-lowest', 'text-primary', 'shadow-xs');
        btn3Col.classList.add('text-secondary');
      });

      btn3Col.addEventListener('click', () => {
        productGrid.className = 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-space-lg';
        btn3Col.classList.add('bg-surface-container-lowest', 'text-primary', 'shadow-xs');
        btn3Col.classList.remove('text-secondary');
        btn4Col.classList.remove('bg-surface-container-lowest', 'text-primary', 'shadow-xs');
        btn4Col.classList.add('text-secondary');
      });
    }
  </script>
</div></main><footer class="w-full bg-surface-container-low mt-space-xl pt-space-xl pb-space-lg shadow-[0_1px_8px_rgba(0,0,0,0.02)]"><div class="max-w-7xl mx-auto px-gutter lg:px-gutter-lg"><div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-gutter-lg pb-space-xl"><div class="lg:col-span-2 pr-space-lg"><div class="flex items-center gap-space-sm mb-space-md"><span class="font-headline-md text-headline-md tracking-tight text-on-surface">Luvora</span></div><p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md leading-relaxed">The premier high-fashion sanctuary of Ceylon. Curating world-class island artisanal craftsmanship, ethical gems, and international contemporary collections for refined global wardrobes.</p><div class="space-y-space-xs"><p class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">Join the Luvora Society</p><div class="flex items-center gap-space-xs max-w-sm"><input class="w-full bg-surface-container-lowest border border-outline-variant rounded-full px-space-md py-space-xs font-body-sm text-body-sm text-on-surface focus:outline-none focus:border-primary" placeholder="Enter your email..." type="email"/><a href="{{ route('newsletter') }}" class="bg-on-background text-surface-container-lowest font-label-md text-label-md uppercase px-space-md py-space-xs rounded-full hover:bg-primary transition-colors shrink-0">Join</a></div></div></div><div><h3 class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface mb-space-md">Shop</h3><ul class="space-y-space-xs"><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="women" href="{{ route('shop.category', 'women') }}">Women's Couture</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="men" href="{{ route('shop.category', 'men') }}">Men's Tailoring</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="jewelry" href="{{ route('shop.category', 'jewelry') }}">Bespoke Fine Jewelry</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="shoes" href="{{ route('shop.category', 'shoes') }}">Artisanal Footwear</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="essentials" href="{{ route('shop.category', 'essentials') }}">Island Resort Essentials</a></li></ul></div><div><h3 class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface mb-space-md">Customer Care</h3><ul class="space-y-space-xs"><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="contact-concierge" href="{{ route('customer-care.contact') }}">Client Concierge</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="shipping-deliveries" href="{{ route('customer-care.shipping') }}">Island-wide Shipping</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="returns-exchanges" href="{{ route('customer-care.returns') }}">Returns &amp; Exchanges</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="colombo-same-day" href="{{ route('customer-care.colombo-express') }}">Colombo Express Hub</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="size-guide" href="{{ route('customer-care.size-guide') }}">Bespoke Size Guide</a></li></ul></div><div><h3 class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface mb-space-md">About &amp; Legal</h3><ul class="space-y-space-xs"><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="about-luvora" href="{{ route('about.heritage') }}">Our Heritage</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="sri-lankan-artisans" href="{{ route('about.artisans') }}">Artisan Guild</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="privacy-policy" href="{{ route('legal.privacy') }}">Privacy Policy</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="terms-of-service" href="{{ route('legal.terms') }}">Terms of Luxury</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="authenticity" href="{{ route('authenticity') }}">Certificate of Authenticity</a></li></ul></div></div>@include('partials.footer-bottom')</div></footer><script>
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