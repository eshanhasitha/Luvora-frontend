@php
    $products = $products ?? [];
    $filters = $filters ?? [];
@endphp
<!DOCTYPE html>

<html lang="en"><head><meta charset="utf-8"/><meta content="width=device-width, initial-scale=1.0" name="viewport"/><link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&amp;family=Inter:wght@400;500;600;700&amp;family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&amp;display=swap" rel="stylesheet"/><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>@vite('resources/css/app.css')<style>@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config={darkMode:"class",theme:{extend:{"colors":{"tertiary-fixed":"#6ffbbe","surface":"#f7f9fb","secondary-fixed":"#dae2fd","surface-container-high":"#e6e8ea","on-background":"#191c1e","secondary-container":"#dae2fd","tertiary":"#006947","inverse-on-surface":"#eff1f3","surface-container-low":"#f2f4f6","on-tertiary-container":"#f5fff6","surface-tint":"#005eb3","surface-container-lowest":"#ffffff","outline":"#717785","on-tertiary":"#ffffff","on-tertiary-fixed":"#002113","on-secondary-fixed":"#131b2e","surface-bright":"#f7f9fb","surface-dim":"#d8dadc","primary":"#005baf","outline-variant":"#c0c6d6","primary-fixed":"#d5e3ff","primary-fixed-dim":"#a8c8ff","error-container":"#ffdad6","on-primary-fixed":"#001b3c","on-error":"#ffffff","secondary":"#565e74","primary-container":"#0074db","on-error-container":"#93000a","on-primary-container":"#fefcff","on-surface-variant":"#404754","surface-container-highest":"#e0e3e5","on-surface":"#191c1e","tertiary-container":"#00855b","on-tertiary-fixed-variant":"#005236","secondary-fixed-dim":"#bec6e0","surface-container":"#eceef0","on-secondary-fixed-variant":"#3f465c","error":"#ba1a1a","on-secondary-container":"#5c647a","inverse-surface":"#2d3133","surface-variant":"#e0e3e5","background":"#f7f9fb","on-primary":"#ffffff","tertiary-fixed-dim":"#4edea3","on-secondary":"#ffffff","on-primary-fixed-variant":"#004689","inverse-primary":"#a8c8ff"},"borderRadius":{"DEFAULT":"0.25rem","lg":"0.5rem","xl":"0.75rem","full":"9999px"},"spacing":{"space-lg":"1.5rem","gutter":"1.5rem","space-sm":"0.5rem","margin-lg":"4rem","space-xs":"0.25rem","gutter-sm":"1rem","margin":"1.5rem","space-xl":"2.5rem","gutter-lg":"2rem","space-md":"1rem","margin-sm":"1rem"},"fontFamily":{"label-sm":["Inter"],"display-hero":["Bodoni Moda"],"body-sm":["Plus Jakarta Sans"],"headline-sm":["Plus Jakarta Sans"],"body-lg":["Plus Jakarta Sans"],"headline-lg":["Bodoni Moda"],"label-lg":["Inter"],"body-md":["Plus Jakarta Sans"],"headline-md":["Bodoni Moda"],"label-md":["Inter"],"display-hero-mobile":["Bodoni Moda"],"headline-lg-mobile":["Bodoni Moda"]},"fontSize":{"label-sm":["11px",{"lineHeight":"14px","letterSpacing":"0.06em","fontWeight":"600"}],"display-hero":["56px",{"lineHeight":"64px","letterSpacing":"-0.02em","fontWeight":"600"}],"body-sm":["13px",{"lineHeight":"18px","fontWeight":"400"}],"headline-sm":["20px",{"lineHeight":"28px","fontWeight":"600"}],"body-lg":["18px",{"lineHeight":"28px","fontWeight":"400"}],"headline-lg":["40px",{"lineHeight":"48px","letterSpacing":"-0.01em","fontWeight":"500"}],"label-lg":["14px",{"lineHeight":"20px","letterSpacing":"0.02em","fontWeight":"600"}],"body-md":["15px",{"lineHeight":"22px","fontWeight":"400"}],"headline-md":["28px",{"lineHeight":"34px","fontWeight":"500"}],"label-md":["12px",{"lineHeight":"16px","letterSpacing":"0.04em","fontWeight":"500"}],"display-hero-mobile":["38px",{"lineHeight":"44px","letterSpacing":"-0.01em","fontWeight":"600"}],"headline-lg-mobile":["30px",{"lineHeight":"36px","letterSpacing":"0em","fontWeight":"500"}]}}}}</script></head><body class="bg-surface font-body-md text-on-surface antialiased"><header class="bg-surface-container-lowest shadow-[0_1px_8px_rgba(0,0,0,0.04)]"><div class="bg-on-background text-surface-container-lowest py-space-xs px-gutter-sm text-center"><div class="max-w-7xl mx-auto flex items-center justify-center gap-space-sm"><span class="material-symbols-outlined text-primary-fixed-dim text-sm">local_shipping</span><p class="font-label-sm text-label-sm tracking-wider uppercase">Island-wide Sri Lanka Express Delivery | Free shipping over LKR 15,000 | Colombo Same-Day Available</p></div></div><div class="h-28 max-w-7xl mx-auto px-gutter lg:px-gutter-lg flex flex-col justify-between pt-space-sm pb-space-xs"><div class="flex items-center justify-between gap-space-lg"><div class="flex items-center gap-space-md"><a class="flex items-center gap-space-sm" data-path="home" href="{{ route('home') }}"><span class="font-serif text-3xl font-medium tracking-tight text-[#191c1e]" style="font-family: 'Bodoni Moda', Georgia, serif">Luvora</span></a></div><div class="hidden md:flex flex-1 max-w-xl mx-space-lg"><div class="relative w-full flex items-center bg-surface-container-low rounded-full px-space-md py-space-xs focus-within:ring-2 focus-within:ring-primary focus-within:bg-surface-container-lowest transition-all"><span class="material-symbols-outlined text-secondary mr-space-sm text-lg">search</span><input class="w-full bg-transparent border-none outline-none font-body-sm text-body-sm text-on-surface placeholder:text-secondary" placeholder="Search Ceylon sapphire jewelry, handloom silks, bespoke couture..." type="text"/><span class="font-label-sm text-label-sm text-secondary bg-surface-container-high px-space-xs py-0.5 rounded uppercase">Auto</span></div></div><div class="flex items-center gap-space-md"><a class="relative p-space-xs text-on-surface-variant hover:text-primary transition-colors" data-path="wishlist" href="{{ route('wishlist.index') }}"><span class="material-symbols-outlined">favorite</span><span class="absolute -top-0.5 -right-0.5 bg-primary text-on-primary font-label-sm text-label-sm w-4 h-4 rounded-full flex items-center justify-center text-[10px]" data-wishlist-count>0</span></a><a class="relative p-space-xs text-on-surface-variant hover:text-primary transition-colors" data-path="cart" href="{{ route('cart.index') }}"><span class="material-symbols-outlined">shopping_bag</span><span class="absolute -top-0.5 -right-0.5 bg-primary text-on-primary font-label-sm text-label-sm w-4 h-4 rounded-full flex items-center justify-center text-[10px]">{{ count(session("cart_items", [])) }}</span></a><div class="flex items-center gap-space-xs pl-space-xs">@include('partials.profile-link')</div></div></div>@include('partials.category-nav')</div></header><main class="w-full bg-surface min-h-screen"><div class="flex flex-col w-full">
<!-- Top Collection Header & Breadcrumbs -->
<section class="w-full bg-surface-container-lowest shadow-sm">
<div class="max-w-7xl mx-auto px-gutter lg:px-gutter-lg pt-space-md pb-space-lg">
<!-- Breadcrumbs -->
<nav aria-label="Breadcrumb" class="flex items-center gap-space-xs text-secondary font-label-sm text-label-sm mb-space-sm uppercase tracking-wider">
<a class="hover:text-primary transition-colors" data-path="home" href="{{ route('home') }}">Home</a>
<span class="material-symbols-outlined text-xs">chevron_right</span>
<span class="text-on-surface font-semibold" aria-current="page">Categories</span>
</nav>
<!-- Editorial Title & Context -->
<div class="flex flex-col lg:flex-row lg:items-end justify-between gap-space-md pb-space-md">
<div class="max-w-3xl space-y-space-xs">
<span class="font-label-sm text-label-sm tracking-widest text-primary uppercase font-bold">Live Product Catalog</span>
<h1 class="font-headline-lg text-headline-lg tracking-tight text-on-surface font-normal">{{ $catalogTitle ?? 'All Collections &amp; Catalog' }}</h1>
<p class="font-body-md text-body-md text-secondary">
            Curated island artisanal handlooms, Ceylon silks, tailored resort linen, bespoke jewelry, and handcrafted leather essentials.
          </p>
</div>
<!-- Live Quick Stats pill -->
<div class="flex items-center gap-space-sm self-start lg:self-end bg-surface-container-low px-space-md py-space-xs rounded-full">
<span class="w-2 h-2 rounded-full bg-tertiary animate-pulse"></span>
<span class="font-label-sm text-label-sm text-on-surface-variant font-medium">{{ $productsTotalCount ?? count($products) }} Artisan Pieces Available</span>
</div>
</div>
<!-- Sticky Utility Control Bar -->
<section class="relative w-full bg-surface-container-low shadow-[0_1px_4px_rgba(0,0,0,0.03)]">
<div class="max-w-7xl mx-auto px-gutter lg:px-gutter-lg py-space-xs flex flex-wrap items-center justify-between gap-space-md">
<!-- Item Counter -->
<div class="flex items-center gap-space-sm"><span class="font-body-sm text-body-sm text-secondary">Showing <span class="font-semibold text-on-surface">{{ count($products) ? (($productsCurrentPage - 1) * $productsPerPage + 1) . '–' . (($productsCurrentPage - 1) * $productsPerPage + count($products)) : 0 }}</span> of <span class="font-semibold text-on-surface">{{ $productsTotalCount ?? count($products) }}</span> products</span></div>
<!-- Controls: Grid Density & Sorting -->
<div class="flex items-center gap-space-md">
<!-- View Toggle (Desktop) -->
<div class="hidden sm:flex items-center bg-surface-container-lowest p-0.5 rounded-full shadow-sm">
<button class="p-1.5 rounded-full bg-primary text-on-primary transition-all flex items-center" id="viewGrid4Btn" title="4 Columns Grid" type="button">
<span class="material-symbols-outlined text-base">grid_view</span>
</button>
<button class="p-1.5 rounded-full text-secondary hover:text-on-surface transition-all flex items-center" id="viewGrid3Btn" title="3 Columns Spacious Grid" type="button">
<span class="material-symbols-outlined text-base">view_module</span>
</button>
</div>
<!-- Sort Select Container -->
<div class="relative flex items-center bg-surface-container-lowest rounded-full shadow-sm px-space-md py-1.5">
<label class="font-label-sm text-label-sm text-secondary uppercase mr-space-xs whitespace-nowrap" for="catalogSort">Sort:</label>
<form method="GET" class="contents">@foreach(request()->except('sort') as $key => $value)@if(is_array($value))@foreach($value as $item)<input type="hidden" name="{{ $key }}[]" value="{{ $item }}">@endforeach @else<input type="hidden" name="{{ $key }}" value="{{ $value }}">@endif @endforeach<select name="sort" onchange="this.form.submit()" class="bg-transparent font-label-md text-label-md text-on-surface font-semibold outline-none cursor-pointer pr-4 appearance-none" id="catalogSort">
<option value="" @selected(empty($filters['sort']))>Default</option>
<option value="featured" @selected(($filters['sort'] ?? '') === 'featured')>Featured Curations</option>
<option value="newest" @selected(($filters['sort'] ?? '') === 'newest')>Newest Arrivals</option>
<option value="price-asc" @selected(($filters['sort'] ?? '') === 'price-asc')>Price: Low to High</option>
<option value="price-desc" @selected(($filters['sort'] ?? '') === 'price-desc')>Price: High to Low</option>
<option value="rating" @selected(($filters['sort'] ?? '') === 'rating')>Customer Rating (Top)</option>
<option value="bestseller" @selected(($filters['sort'] ?? '') === 'bestseller')>Bestselling Classics</option>
</select>
<span class="material-symbols-outlined text-secondary text-sm pointer-events-none -ml-3">expand_more</span>
</form>
</div>
</div>
</div>
</section>
<!-- Main Body Content: Sticky Faceted Sidebar + Product Catalog -->
<section class="w-full max-w-7xl mx-auto px-gutter lg:px-gutter-lg py-space-lg mt-space-md">
<div class="flex flex-col lg:flex-row gap-gutter-lg items-start">
<!-- 2. Left Sidebar Faceted Filters (Desktop Sticky) -->
<aside class="w-full lg:w-72 shrink-0 lg:sticky lg:top-44 space-y-space-md"><form method="GET" class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm space-y-space-md">
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm space-y-space-md">
<!-- Filter Header -->
<div class="flex items-center justify-between pb-space-xs border-b border-surface-container">
<div class="flex items-center gap-space-xs">
<span class="material-symbols-outlined text-primary text-lg">tune</span>
<h2 class="font-label-lg text-label-lg uppercase tracking-wider text-on-surface font-bold">Filters</h2>
</div>
<span class="font-label-sm text-label-sm text-secondary">{{ collect($filters ?? [])->except(["page", "sort"])->filter(fn ($value) => is_array($value) ? count($value) > 0 : $value !== null && $value !== "" && $value !== false)->count() }} Active</span>
</div>
<!-- Category Accordion -->
<div class="space-y-space-xs">
<div class="flex items-center justify-between cursor-pointer py-1 text-on-surface">
<span class="font-label-md text-label-md uppercase tracking-wider font-semibold">Collections</span>
<span class="material-symbols-outlined text-sm">expand_less</span>
</div>
<div class="space-y-1.5 pl-space-xs text-body-sm text-body-sm">
<label class="flex items-center justify-between text-on-surface-variant hover:text-primary cursor-pointer py-0.5">
<span class="flex items-center gap-2">
<input name="categories[]" value="women" class="accent-primary w-4 h-4 rounded" type="checkbox" @checked(in_array('women', (array) ($filters['categories'] ?? [])))>
<span>Women's Couture</span>
</span>
<span class="font-label-sm text-label-sm text-secondary">{{ $filterCounts['categories']['women'] ?? 0 }}</span>
</label>
<label class="flex items-center justify-between text-on-surface-variant hover:text-primary cursor-pointer py-0.5">
<span class="flex items-center gap-2">
<input name="categories[]" value="men" class="accent-primary w-4 h-4 rounded" type="checkbox" @checked(in_array('men', (array) ($filters['categories'] ?? [])))>
<span>Men's Tailoring</span>
</span>
<span class="font-label-sm text-label-sm text-secondary">{{ $filterCounts['categories']['men'] ?? 0 }}</span>
</label>
<label class="flex items-center justify-between text-on-surface-variant hover:text-primary cursor-pointer py-0.5">
<span class="flex items-center gap-2">
<input name="categories[]" value="jewelry" class="accent-primary w-4 h-4 rounded" type="checkbox" @checked(in_array('jewelry', (array) ($filters['categories'] ?? [])))>
<span>Ceylon Fine Jewelry</span>
</span>
<span class="font-label-sm text-label-sm text-secondary">{{ $filterCounts['categories']['jewelry'] ?? 0 }}</span>
</label>
<label class="flex items-center justify-between text-on-surface-variant hover:text-primary cursor-pointer py-0.5">
<span class="flex items-center gap-2">
<input name="categories[]" value="bags" class="accent-primary w-4 h-4 rounded" type="checkbox" @checked(in_array('bags', (array) ($filters['categories'] ?? [])))>
<span>Artisan Leather &amp; Bags</span>
</span>
<span class="font-label-sm text-label-sm text-secondary">{{ $filterCounts['categories']['bags'] ?? 0 }}</span>
</label>
<label class="flex items-center justify-between text-on-surface-variant hover:text-primary cursor-pointer py-0.5">
<span class="flex items-center gap-2">
<input name="categories[]" value="kids" class="accent-primary w-4 h-4 rounded" type="checkbox" @checked(in_array('kids', (array) ($filters['categories'] ?? [])))>
<span>Kids &amp; Festive Wear</span>
</span>
<span class="font-label-sm text-label-sm text-secondary">{{ $filterCounts['categories']['kids'] ?? 0 }}</span>
</label>
<label class="flex items-center justify-between text-on-surface-variant hover:text-primary cursor-pointer py-0.5">
<span class="flex items-center gap-2">
<input name="categories[]" value="shoes" class="accent-primary w-4 h-4 rounded" type="checkbox" @checked(in_array('shoes', (array) ($filters['categories'] ?? [])))>
<span>Minimal Footwear</span>
</span>
<span class="font-label-sm text-label-sm text-secondary">{{ $filterCounts['categories']['shoes'] ?? 0 }}</span>
</label>
</div>
</div>
<!-- Price Range Slider & Brackets -->
<div class="space-y-space-xs pt-space-xs">
<div class="flex items-center justify-between text-on-surface">
<span class="font-label-md text-label-md uppercase tracking-wider font-semibold">Price (LKR)</span>
<span class="font-label-sm text-label-sm text-primary font-bold" data-price-range-label>LKR {{ number_format((float) ($filters['min_price'] ?? $priceBounds['min'] ?? 0)) }} - {{ number_format((float) ($filters['max_price'] ?? $priceBounds['max'] ?? 85000)) }}</span>
</div>
<!-- Dual Visual Range Bar -->
<div class="py-2 px-1">
<div class="relative h-6 flex items-center">
<div class="absolute inset-x-0 h-1.5 bg-surface-container rounded-full"></div>
<div class="absolute h-1.5 bg-primary rounded-full" data-price-range-fill></div>
<input aria-label="Minimum price" class="price-range-thumb absolute inset-x-0 w-full" type="range" min="{{ $priceBounds['min'] ?? 0 }}" max="{{ $priceBounds['max'] ?? 85000 }}" step="500" value="{{ $filters['min_price'] ?? $priceBounds['min'] ?? 0 }}" data-price-min>
<input aria-label="Maximum price" class="price-range-thumb absolute inset-x-0 w-full" type="range" min="{{ $priceBounds['min'] ?? 0 }}" max="{{ $priceBounds['max'] ?? 85000 }}" step="500" value="{{ $filters['max_price'] ?? $priceBounds['max'] ?? 85000 }}" data-price-max>
</div>
<input type="hidden" name="min_price" value="{{ $filters['min_price'] ?? '' }}" data-price-min-value>
<input type="hidden" name="max_price" value="{{ $filters['max_price'] ?? '' }}" data-price-max-value>
</div>
<!-- Price quick bracket selector -->
<div class="space-y-1 pt-1 text-body-sm text-body-sm">
<label class="flex items-center justify-between text-on-surface-variant hover:text-primary cursor-pointer">
<span class="flex items-center gap-2">
<input name="price_bracket" value="under-10000" class="accent-primary" type="radio" @checked(($filters['price_bracket'] ?? '') === 'under-10000')/>
<span>Under LKR 10,000</span>
</span>
<span class="font-label-sm text-label-sm text-secondary">{{ $filterCounts['price_brackets']['under-10000'] ?? 0 }}</span>
</label>
<label class="flex items-center justify-between text-on-surface-variant hover:text-primary cursor-pointer">
<span class="flex items-center gap-2">
<input name="price_bracket" value="10000-25000" class="accent-primary" type="radio" @checked(($filters['price_bracket'] ?? '') === '10000-25000')/>
<span>LKR 10,000 – 25,000</span>
</span>
<span class="font-label-sm text-label-sm text-secondary">{{ $filterCounts['price_brackets']['10000-25000'] ?? 0 }}</span>
</label>
<label class="flex items-center justify-between text-on-surface-variant hover:text-primary cursor-pointer">
<span class="flex items-center gap-2">
<input name="price_bracket" value="25000-50000" class="accent-primary" type="radio" @checked(($filters['price_bracket'] ?? '') === '25000-50000')/>
<span>LKR 25,000 – 50,000</span>
</span>
<span class="font-label-sm text-label-sm text-secondary">{{ $filterCounts['price_brackets']['25000-50000'] ?? 0 }}</span>
</label>
<label class="flex items-center justify-between text-on-surface-variant hover:text-primary cursor-pointer">
<span class="flex items-center gap-2">
<input name="price_bracket" value="over-50000" class="accent-primary" type="radio" @checked(($filters['price_bracket'] ?? '') === 'over-50000')/>
<span>Above LKR 50,000</span>
</span>
<span class="font-label-sm text-label-sm text-secondary">{{ $filterCounts['price_brackets']['over-50000'] ?? 0 }}</span>
</label>
</div>
</div>
<!-- Artisan Guild / Brands -->
<div class="space-y-space-xs pt-space-xs">
<span class="font-label-md text-label-md uppercase tracking-wider font-semibold text-on-surface block">Artisan Guild</span>
<div class="space-y-1.5 text-body-sm text-body-sm">
@foreach(array_unique(array_merge(['Luvora Signature', 'Galle Fort Artisans', 'Dumbara Weaves', 'Ceylon Gem Lab', 'Colombo Resort Co.'], array_keys($filterCounts['brands'] ?? []))) as $brand)
<label class="flex items-center justify-between text-on-surface-variant hover:text-primary cursor-pointer">
<span class="flex items-center gap-2">
<input name="brand[]" value="{{ $brand }}" class="accent-primary w-4 h-4 rounded" type="checkbox" @checked(in_array($brand, (array) ($filters['brand'] ?? [])))>
<span>{{ $brand }}</span>
</span>
<span class="font-label-sm text-label-sm text-secondary">{{ $filterCounts['brands'][$brand] ?? 0 }}</span>
</label>
@endforeach
</div>
</div>
<!-- Size Filter Pills -->
<div class="space-y-space-xs pt-space-xs">
<span class="font-label-md text-label-md uppercase tracking-wider font-semibold text-on-surface block">Size</span>
<div class="grid grid-cols-4 gap-1.5">
@foreach(array_unique(array_merge(['XS', 'S', 'M', 'L', 'XL', 'XXL', 'Free Size'], array_keys($filterCounts['sizes'] ?? []))) as $size)
<label class="py-1 text-center font-label-sm text-label-sm rounded bg-surface-container hover:bg-surface-container-high peer-checked:bg-primary peer-checked:text-on-primary transition-colors relative cursor-pointer" title="{{ $filterCounts['sizes'][$size] ?? 0 }} products"><input class="peer sr-only" type="checkbox" name="size[]" value="{{ $size }}" @checked(in_array($size, (array) ($filters['size'] ?? [])))><span>{{ $size }}</span></label>
@endforeach
</div>
</div>
<!-- Color Swatches -->
<div class="space-y-space-xs pt-space-xs">
<span class="font-label-md text-label-md uppercase tracking-wider font-semibold text-on-surface block">Island Color Palette</span>
<div class="flex flex-wrap gap-2 pt-1">
@php
    $catalogColorSwatches = ['Cinnamon Sand' => '#D9B99B', 'Deep Ocean Blue' => '#0A2540', 'Ceylon Sapphire' => '#0088FF', 'Palm Green' => '#2E6B4F', 'Off-White Ivory' => '#F9F8F5', 'Sunset Terracotta' => '#D86B4D', 'Raven Black' => '#111827'];
@endphp
@foreach(array_unique(array_merge(array_keys($catalogColorSwatches), array_keys($filterCounts['colors'] ?? []))) as $color)
<label class="relative cursor-pointer" title="{{ $color }} ({{ $filterCounts['colors'][$color] ?? 0 }})"><input class="peer sr-only" type="checkbox" name="color[]" value="{{ $color }}" @checked(in_array($color, (array) ($filters['color'] ?? [])))><span class="block w-6 h-6 rounded-full border border-outline-variant shadow-sm ring-offset-2 peer-checked:ring-2 peer-checked:ring-primary" style="background-color: {{ $catalogColorSwatches[$color] ?? '#e6e8ea' }}"></span><span class="sr-only">{{ $color }}</span></label>
@endforeach
</div>
</div>
<!-- Material & Craftsmanship -->
<div class="space-y-space-xs pt-space-xs">
<span class="font-label-md text-label-md uppercase tracking-wider font-semibold text-on-surface block">Material Craft</span>
<div class="space-y-1 text-body-sm text-body-sm">
@foreach(array_unique(array_merge(['Ceylon Handloom Cotton', 'Pure Mulberry Silk', 'Natural Organic Linen', 'Recycled 925 Silver', 'Vegetable-Tanned Leather'], array_keys($filterCounts['materials'] ?? []))) as $material)
<label class="flex items-center justify-between gap-2 text-on-surface-variant hover:text-primary cursor-pointer"><span class="flex items-center gap-2"><input name="material[]" value="{{ $material }}" class="accent-primary w-4 h-4 rounded" type="checkbox" @checked(in_array($material, (array) ($filters['material'] ?? [])))><span>{{ $material }}</span></span><span class="font-label-sm text-secondary">{{ $filterCounts['materials'][$material] ?? 0 }}</span></label>
@endforeach
</div>
</div>
<!-- Availability & Logistics -->
<div class="space-y-space-xs pt-space-xs">
<span class="font-label-md text-label-md uppercase tracking-wider font-semibold text-on-surface block">Delivery Speed</span>
<div class="space-y-1.5 text-body-sm text-body-sm">
<label class="flex items-center justify-between text-on-surface-variant hover:text-primary cursor-pointer">
<span class="flex items-center gap-2">
<input name="in_stock" value="1" class="accent-primary w-4 h-4 rounded" type="checkbox" @checked(!empty($filters['in_stock']))>
<span>In Stock Islandwide</span>
</span>
<span class="font-label-sm text-label-sm text-secondary">{{ $filterCounts['in_stock'] ?? 0 }}</span>
</label>
<label class="flex items-center justify-between text-on-surface-variant hover:text-primary cursor-pointer">
<span class="flex items-center gap-2">
<input name="same_day" value="1" class="accent-primary w-4 h-4 rounded" type="checkbox" @checked(!empty($filters['same_day']))>
<span>Colombo Same-Day</span>
</span>
<span class="font-label-sm text-label-sm text-tertiary font-bold">{{ $filterCounts['same_day'] ?? 0 }}</span>
</label>
<label class="flex items-center justify-between text-on-surface-variant hover:text-primary cursor-pointer">
<span class="flex items-center gap-2">
<input name="koko" value="1" class="accent-primary w-4 h-4 rounded" type="checkbox" @checked(!empty($filters['koko']))>
<span>Koko 3-Split Eligible</span>
</span>
<span class="font-label-sm text-label-sm text-secondary">{{ $filterCounts['koko'] ?? 0 }}</span>
</label>
</div>
</div>
<!-- Customer Ratings -->
<div class="space-y-space-xs pt-space-xs">
<span class="font-label-md text-label-md uppercase tracking-wider font-semibold text-on-surface block">Artisan Rating</span>
<div class="space-y-1 text-body-sm text-body-sm">
<label class="flex items-center justify-between text-on-surface-variant hover:text-primary cursor-pointer">
<span class="flex items-center gap-1.5">
<input name="min_rating" value="4.5" class="accent-primary w-4 h-4 rounded" type="radio" @checked((float) ($filters['min_rating'] ?? 0) === 4.5)>
<span class="text-amber-500 font-bold flex items-center">★★★★★</span>
<span class="text-xs">4.5 &amp; above</span>
</span>
<span class="font-label-sm text-label-sm text-secondary">{{ $filterCounts['rating_45'] ?? 0 }}</span>
</label>
<label class="flex items-center justify-between text-on-surface-variant hover:text-primary cursor-pointer">
<span class="flex items-center gap-1.5">
<input name="min_rating" value="4" class="accent-primary w-4 h-4 rounded" type="radio" @checked((float) ($filters['min_rating'] ?? 0) === 4.0)>
<span class="text-amber-500 font-bold flex items-center">★★★★☆</span>
<span class="text-xs">4.0 &amp; above</span>
</span>
<span class="font-label-sm text-label-sm text-secondary">{{ $filterCounts['rating_4'] ?? 0 }}</span>
</label>
</div>
</div>
</div>
<div class="flex gap-2 border-t border-surface-container pt-space-sm"><button class="flex-1 rounded-full bg-primary px-4 py-2 text-white" type="submit">Apply filters</button><a class="flex-1 rounded-full border border-outline-variant px-4 py-2 text-center" href="{{ $catalogCategory ? route('shop.category', $catalogCategory) : route('shop.index') }}">Clear</a></div></form></aside>
<!-- 3. Main Product Grid Section -->
<main class="flex-1 w-full min-w-0">
<!-- Products Grid (Dynamic grid column class toggled via JS) -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-gutter-sm lg:gap-gutter" id="productCatalogGrid">
<?php if (!empty($productsUnavailable)): ?>
<div class="col-span-full mb-space-md rounded-lg bg-error-container p-space-md text-on-error-container">The catalog is temporarily unavailable. Please try again shortly.</div>
<?php endif; ?>
<?php if (empty($products)): ?>
<div class="col-span-full rounded-lg bg-surface-container-lowest p-space-xl text-center">No products found.</div>
<?php else: ?>
<?php foreach ($products as $product): ?>
@php
    $productId = data_get($product, 'id');
    $productSlug = data_get($product, 'slug') ?? data_get($product, 'Slug') ?? data_get($product, 'productSlug') ?? data_get($product, 'ProductSlug') ?? $productId;
    $productName = data_get($product, 'name', 'Product');
    $image = data_get($product, 'imageUrl') ?? data_get($product, 'image') ?? data_get($product, 'images.0.url') ?? data_get($product, 'imageUrls.0') ?? data_get($product, 'ImageUrls.0');
    if (is_string($image) && str_starts_with($image, '/api/products/images/')) $image = rtrim(config('services.luvora.base_url'), '/') . $image;
    $price = (float) (data_get($product, 'discountPrice') ?? data_get($product, 'price') ?? 0);
    $filterText = fn ($value) => is_array($value) ? implode(' ', array_filter(array_map(fn ($item) => is_scalar($item) ? (string) $item : (string) (data_get($item, 'name') ?? ''), $value))) : (is_scalar($value) ? (string) $value : (string) (data_get($value, 'name') ?? ''));
@endphp
<article class="product-card group relative flex flex-col bg-surface-container-lowest rounded-lg p-space-sm shadow-sm hover:shadow-md transition-all duration-300" data-price="{{ $price }}" data-name="{{ strtolower($productName) }}" data-brand="{{ strtolower($filterText(data_get($product, 'brand') ?? data_get($product, 'artisan') ?? data_get($product, 'maker'))) }}" data-category="{{ strtolower($filterText(data_get($product, 'category') ?? data_get($product, 'categoryName'))) }}" data-size="{{ strtolower($filterText(data_get($product, 'size') ?? data_get($product, 'sizes') ?? data_get($product, 'variants'))) }}" data-color="{{ strtolower($filterText(data_get($product, 'color') ?? data_get($product, 'colors'))) }}" data-material="{{ strtolower($filterText(data_get($product, 'material') ?? data_get($product, 'materials'))) }}" data-sustainability="{{ strtolower($filterText(data_get($product, 'sustainability') ?? data_get($product, 'certifications') ?? data_get($product, 'tags'))) }}" data-stock="{{ (float) (data_get($product, 'stock') ?? data_get($product, 'stockQuantity') ?? data_get($product, 'quantity') ?? data_get($product, 'inventory') ?? data_get($product, 'Stock') ?? 0) }}" data-rating="{{ (float) (data_get($product, 'rating') ?? data_get($product, 'averageRating') ?? data_get($product, 'Rating') ?? 0) }}" data-same-day="{{ (data_get($product, 'sameDayDelivery') ?? data_get($product, 'same_day') ?? data_get($product, 'colomboSameDay')) ? '1' : '0' }}" data-koko="{{ (data_get($product, 'kokoEligible') ?? data_get($product, 'koko')) ? '1' : '0' }}" data-product-id="{{ $productId }}" data-product-name="{{ $productName }}" data-product-price="{{ $price }}" data-product-image="{{ $image ?? '' }}" data-product-url="{{ $productSlug ? route('products.show', $productSlug) : route('shop.index') }}">
<div class="relative aspect-[3/4] w-full overflow-hidden rounded-md bg-surface-container-low mb-space-sm">
<a class="block h-full w-full" href="{{ $productSlug ? route('products.show', $productSlug) : route('shop.index') }}">
@if ($image)
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ $image }}" alt="{{ $productName }}">
@else
<div class="flex h-full items-center justify-center text-secondary"><span class="material-symbols-outlined text-5xl">image</span></div>
@endif
</a>
<button data-wishlist-toggle aria-label="Add to wishlist" class="absolute top-2 right-2 w-8 h-8 rounded-full bg-surface-container-lowest/80 backdrop-blur-md flex items-center justify-center text-on-surface hover:text-error transition-colors shadow-sm" type="button"><span class="material-symbols-outlined text-base">favorite</span></button>
</div>
<div class="flex flex-col flex-1">
<h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold line-clamp-2 mb-1 group-hover:text-primary transition-colors"><a href="{{ $productSlug ? route('products.show', $productSlug) : route('shop.index') }}">{{ $productName }}</a></h3>
<p class="font-body-sm text-body-sm text-secondary line-clamp-2">{{ data_get($product, 'description', '') }}</p>
<div class="mt-auto pt-2"><span class="font-headline-sm text-headline-sm text-on-surface font-bold">LKR {{ number_format($price, 2) }}</span></div>
</div>
</article>
<?php endforeach; ?>
<?php endif; ?>
</div>
</main>
</div>
</section>
<!-- 6. Quick Trust & Island Logistics Ribbon -->
<section class="w-full bg-surface-container-lowest shadow-sm mt-space-lg">
<div class="max-w-7xl mx-auto px-gutter lg:px-gutter-lg py-space-lg">
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter">
<div class="flex items-center gap-space-sm p-space-xs">
<div class="w-12 h-12 rounded-full bg-primary-fixed/50 flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined">local_shipping</span>
</div>
<div>
<h4 class="font-label-md text-label-md uppercase tracking-wider text-on-surface font-bold">24-48H Island Dispatch</h4>
<p class="font-body-sm text-body-sm text-secondary">Free express shipping for orders over LKR 15,000</p>
</div>
</div>
<div class="flex items-center gap-space-sm p-space-xs">
<div class="w-12 h-12 rounded-full bg-primary-fixed/50 flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined">published_with_changes</span>
</div>
<div>
<h4 class="font-label-md text-label-md uppercase tracking-wider text-on-surface font-bold">14-Day Free Doorstep Trial</h4>
<p class="font-body-sm text-body-sm text-secondary">Complimentary rider-assisted size exchanges</p>
</div>
</div>
<div class="flex items-center gap-space-sm p-space-xs">
<div class="w-12 h-12 rounded-full bg-primary-fixed/50 flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined">verified</span>
</div>
<div>
<h4 class="font-label-md text-label-md uppercase tracking-wider text-on-surface font-bold">Guaranteed Authenticity</h4>
<p class="font-body-sm text-body-sm text-secondary">NGJA gemstone seals and artisan guild provenance</p>
</div>
</div>
<div class="flex items-center gap-space-sm p-space-xs">
<div class="w-12 h-12 rounded-full bg-primary-fixed/50 flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined">payments</span>
</div>
<div>
<h4 class="font-label-md text-label-md uppercase tracking-wider text-on-surface font-bold">Split in 3 with 0% Interest</h4>
<p class="font-body-sm text-body-sm text-secondary">Accepted seamlessly via Koko and Mintpay</p>
</div>
</div>
</div>
</div>
</section>
<!-- Interactive JavaScript for Grid Density & Micro-interactions -->
<script>
    (function() {
      const btn4 = document.getElementById('viewGrid4Btn');
      const btn3 = document.getElementById('viewGrid3Btn');
      const grid = document.getElementById('productCatalogGrid');

      if (btn4 && btn3 && grid) {
        btn4.addEventListener('click', () => {
          grid.classList.remove('lg:grid-cols-3');
          grid.classList.add('lg:grid-cols-4');
          btn4.classList.remove('text-secondary');
          btn4.classList.add('bg-primary', 'text-on-primary');
          btn3.classList.remove('bg-primary', 'text-on-primary');
          btn3.classList.add('text-secondary');
        });

        btn3.addEventListener('click', () => {
          grid.classList.remove('lg:grid-cols-4');
          grid.classList.add('lg:grid-cols-3');
          btn3.classList.remove('text-secondary');
          btn3.classList.add('bg-primary', 'text-on-primary');
          btn4.classList.remove('bg-primary', 'text-on-primary');
          btn4.classList.add('text-secondary');
        });
      }
    })();
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
</script>

@include('partials.scroll-reveal-script')</body></html>












