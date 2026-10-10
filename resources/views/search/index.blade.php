@php
    $query = $query ?? request('q', '');
@endphp
<!DOCTYPE html>

<html lang="en"><head><meta charset="utf-8"/><meta content="width=device-width, initial-scale=1.0" name="viewport"/><link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&amp;family=Inter:wght@400;500;600;700&amp;family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&amp;display=swap" rel="stylesheet"/><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/><style>@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config={darkMode:"class",theme:{extend:{"colors":{"tertiary-fixed":"#6ffbbe","surface":"#f7f9fb","secondary-fixed":"#dae2fd","surface-container-high":"#e6e8ea","on-background":"#191c1e","secondary-container":"#dae2fd","tertiary":"#006947","inverse-on-surface":"#eff1f3","surface-container-low":"#f2f4f6","on-tertiary-container":"#f5fff6","surface-tint":"#005eb3","surface-container-lowest":"#ffffff","outline":"#717785","on-tertiary":"#ffffff","on-tertiary-fixed":"#002113","on-secondary-fixed":"#131b2e","surface-bright":"#f7f9fb","surface-dim":"#d8dadc","primary":"#005baf","outline-variant":"#c0c6d6","primary-fixed":"#d5e3ff","primary-fixed-dim":"#a8c8ff","error-container":"#ffdad6","on-primary-fixed":"#001b3c","on-error":"#ffffff","secondary":"#565e74","primary-container":"#0074db","on-error-container":"#93000a","on-primary-container":"#fefcff","on-surface-variant":"#404754","surface-container-highest":"#e0e3e5","on-surface":"#191c1e","tertiary-container":"#00855b","on-tertiary-fixed-variant":"#005236","secondary-fixed-dim":"#bec6e0","surface-container":"#eceef0","on-secondary-fixed-variant":"#3f465c","error":"#ba1a1a","on-secondary-container":"#5c647a","inverse-surface":"#2d3133","surface-variant":"#e0e3e5","background":"#f7f9fb","on-primary":"#ffffff","tertiary-fixed-dim":"#4edea3","on-secondary":"#ffffff","on-primary-fixed-variant":"#004689","inverse-primary":"#a8c8ff"},"borderRadius":{"DEFAULT":"0.25rem","lg":"0.5rem","xl":"0.75rem","full":"9999px"},"spacing":{"space-lg":"1.5rem","gutter":"1.5rem","space-sm":"0.5rem","margin-lg":"4rem","space-xs":"0.25rem","gutter-sm":"1rem","margin":"1.5rem","space-xl":"2.5rem","gutter-lg":"2rem","space-md":"1rem","margin-sm":"1rem"},"fontFamily":{"label-sm":["Inter"],"display-hero":["Bodoni Moda"],"body-sm":["Plus Jakarta Sans"],"headline-sm":["Plus Jakarta Sans"],"body-lg":["Plus Jakarta Sans"],"headline-lg":["Bodoni Moda"],"label-lg":["Inter"],"body-md":["Plus Jakarta Sans"],"headline-md":["Bodoni Moda"],"label-md":["Inter"],"display-hero-mobile":["Bodoni Moda"],"headline-lg-mobile":["Bodoni Moda"]},"fontSize":{"label-sm":["11px",{"lineHeight":"14px","letterSpacing":"0.06em","fontWeight":"600"}],"display-hero":["56px",{"lineHeight":"64px","letterSpacing":"-0.02em","fontWeight":"600"}],"body-sm":["13px",{"lineHeight":"18px","fontWeight":"400"}],"headline-sm":["20px",{"lineHeight":"28px","fontWeight":"600"}],"body-lg":["18px",{"lineHeight":"28px","fontWeight":"400"}],"headline-lg":["40px",{"lineHeight":"48px","letterSpacing":"-0.01em","fontWeight":"500"}],"label-lg":["14px",{"lineHeight":"20px","letterSpacing":"0.02em","fontWeight":"600"}],"body-md":["15px",{"lineHeight":"22px","fontWeight":"400"}],"headline-md":["28px",{"lineHeight":"34px","fontWeight":"500"}],"label-md":["12px",{"lineHeight":"16px","letterSpacing":"0.04em","fontWeight":"500"}],"display-hero-mobile":["38px",{"lineHeight":"44px","letterSpacing":"-0.01em","fontWeight":"600"}],"headline-lg-mobile":["30px",{"lineHeight":"36px","letterSpacing":"0em","fontWeight":"500"}]}}}}</script></head><body class="bg-surface font-body-md text-on-surface antialiased"><header class="bg-surface-container-lowest shadow-[0_1px_8px_rgba(0,0,0,0.04)]"><div class="bg-on-background text-surface-container-lowest py-space-xs px-gutter-sm text-center"><div class="max-w-7xl mx-auto flex items-center justify-center gap-space-sm"><span class="material-symbols-outlined text-primary-fixed-dim text-sm">local_shipping</span><p class="font-label-sm text-label-sm tracking-wider uppercase">Island-wide Sri Lanka Express Delivery | Free shipping over LKR 15,000 | Colombo Same-Day Available</p></div></div><div class="h-28 max-w-7xl mx-auto px-gutter lg:px-gutter-lg flex flex-col justify-between pt-space-sm pb-space-xs"><div class="flex items-center justify-between gap-space-lg"><div class="flex items-center gap-space-md"><a class="flex items-center gap-space-sm" data-path="home" href="{{ route('home') }}"><img alt="Luvora Brand Logo" class="h-10 w-auto object-contain" src="{{ asset('images/logo.png') }}"/></a></div><div class="hidden md:flex flex-1 max-w-xl mx-space-lg"><div class="relative w-full flex items-center bg-surface-container-low rounded-full px-space-md py-space-xs focus-within:ring-2 focus-within:ring-primary focus-within:bg-surface-container-lowest transition-all"><span class="material-symbols-outlined text-secondary mr-space-sm text-lg">search</span><input class="w-full bg-transparent border-none outline-none font-body-sm text-body-sm text-on-surface placeholder:text-secondary" placeholder="Search Ceylon sapphire jewelry, handloom silks, bespoke couture..." type="text"/><span class="font-label-sm text-label-sm text-secondary bg-surface-container-high px-space-xs py-0.5 rounded uppercase">Auto</span></div></div><div class="flex items-center gap-space-md"><a class="relative p-space-xs text-on-surface-variant hover:text-primary transition-colors" data-path="wishlist" href="{{ route('wishlist.index') }}"><span class="material-symbols-outlined">favorite</span><span class="absolute -top-0.5 -right-0.5 bg-primary text-on-primary font-label-sm text-label-sm w-4 h-4 rounded-full flex items-center justify-center text-[10px]" data-wishlist-count>0</span></a><a class="relative p-space-xs text-on-surface-variant hover:text-primary transition-colors" data-path="cart" href="{{ route('cart.index') }}"><span class="material-symbols-outlined">shopping_bag</span><span class="absolute -top-0.5 -right-0.5 bg-primary text-on-primary font-label-sm text-label-sm w-4 h-4 rounded-full flex items-center justify-center text-[10px]">2</span></a><div class="flex items-center gap-space-xs pl-space-xs">@include('partials.profile-link')</div></div></div>@include('partials.category-nav')</div></header><main class="w-full bg-surface min-h-screen"><div class="flex flex-col w-full">
<!-- Query Bar & Breadcrumb Banner -->
<section class="w-full bg-surface-container-lowest shadow-sm">
<div class="max-w-7xl mx-auto px-gutter lg:px-gutter-lg pt-space-md pb-space-lg">
<!-- Breadcrumbs & Search Metadata Overline -->
<div class="flex items-center gap-space-xs font-label-sm text-label-sm uppercase tracking-wider text-secondary mb-space-xs">
<a class="hover:text-primary transition-colors" href="{{ route('shop.index') }}">Atelier Index</a>
<span>/</span>
<a class="hover:text-primary transition-colors" href="{{ route('shop.index') }}">Textiles &amp; Silks</a>
<span>/</span>
<span class="text-on-surface">Curated Search Results</span>
</div>
<!-- Main Headline + Search Query Input Box -->
<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-space-md pt-space-xs">
<div>
<div class="flex items-baseline gap-space-sm flex-wrap">
<h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">Search results for</h1>
<span class="font-headline-lg text-headline-lg text-primary italic font-normal">�{{ $query }}�</span>
</div>
<p class="font-body-sm text-body-sm text-secondary mt-1">Showing {{ count($products) }} matching products</p>
</div>
<!-- Editable Active Search Pill Container -->
<form method="GET" action="{{ route('search') }}" class="flex items-center gap-space-xs bg-surface-container-low p-1.5 rounded-full w-full max-w-md shadow-inner">
<div class="flex items-center pl-space-sm text-primary">
<span class="material-symbols-outlined text-lg">search</span>
</div>
<input name="q" class="w-full bg-transparent border-none outline-none font-body-sm text-body-sm text-on-surface px-space-xs font-medium" id="activeSearchField" placeholder="Refine search terms..." type="text" value="{{ $query }}"/>
<button aria-label="Clear active query" class="p-1 rounded-full text-secondary hover:text-on-surface hover:bg-surface-container-high transition-colors flex items-center justify-center" onclick="document.getElementById('activeSearchField').value='';" type="button">
<span class="material-symbols-outlined text-sm">close</span>
</button>
<button class="bg-primary text-on-primary font-label-sm text-label-sm uppercase tracking-wider px-space-md py-1.5 rounded-full hover:bg-primary-container transition-colors shrink-0 shadow-sm" type="submit">
            Search
          </button>
</form>
</div>
<!-- Active Refinement Filter Pills Row -->
<div class="flex items-center gap-space-xs flex-wrap mt-space-md pt-space-xs">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary mr-space-xs">Applied Filters:</span>
<div class="inline-flex items-center gap-1.5 bg-primary-fixed text-on-primary-fixed font-label-sm text-label-sm px-space-sm py-1 rounded-full">
<span>Fabric: Raw Silk</span>
<button aria-label="Remove filter" class="hover:text-error transition-colors flex items-center" type="button"><span class="material-symbols-outlined text-xs">close</span></button>
</div>
<div class="inline-flex items-center gap-1.5 bg-primary-fixed text-on-primary-fixed font-label-sm text-label-sm px-space-sm py-1 rounded-full">
<span>Origin: Dumbara &amp; Matale</span>
<button aria-label="Remove filter" class="hover:text-error transition-colors flex items-center" type="button"><span class="material-symbols-outlined text-xs">close</span></button>
</div>
<div class="inline-flex items-center gap-1.5 bg-primary-fixed text-on-primary-fixed font-label-sm text-label-sm px-space-sm py-1 rounded-full">
<span>Price: Under LKR 50,000</span>
<button aria-label="Remove filter" class="hover:text-error transition-colors flex items-center" type="button"><span class="material-symbols-outlined text-xs">close</span></button>
</div>
<button class="font-label-sm text-label-sm text-secondary hover:text-error transition-colors uppercase tracking-wider underline underline-offset-4 ml-space-xs" type="button">
          Clear All
        </button>
</div>
<!-- Curated Suggestions Pill Carousel -->
<div class="flex items-center gap-space-xs overflow-x-auto pt-space-sm scrollbar-none">
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-wider shrink-0 mr-space-xs flex items-center gap-1">
<span class="material-symbols-outlined text-sm text-primary">trending_up</span> Trending:
        </span>
<a class="bg-surface-container-high hover:bg-surface-container-highest text-on-surface-variant hover:text-on-surface font-label-sm text-label-sm px-space-sm py-1 rounded-full whitespace-nowrap transition-colors" href="{{ route('shop.index') }}">Pure Ahimsa Silk</a>
<a class="bg-surface-container-high hover:bg-surface-container-highest text-on-surface-variant hover:text-on-surface font-label-sm text-label-sm px-space-sm py-1 rounded-full whitespace-nowrap transition-colors" href="{{ route('shop.index') }}">Lotus Fibre Shawl</a>
<a class="bg-surface-container-high hover:bg-surface-container-highest text-on-surface-variant hover:text-on-surface font-label-sm text-label-sm px-space-sm py-1 rounded-full whitespace-nowrap transition-colors" href="{{ route('shop.index') }}">Cinnamon Linen Kaftan</a>
<a class="bg-surface-container-high hover:bg-surface-container-highest text-on-surface-variant hover:text-on-surface font-label-sm text-label-sm px-space-sm py-1 rounded-full whitespace-nowrap transition-colors" href="{{ route('shop.index') }}">Ratnapura Sapphire Pendant</a>
<a class="bg-surface-container-high hover:bg-surface-container-highest text-on-surface-variant hover:text-on-surface font-label-sm text-label-sm px-space-sm py-1 rounded-full whitespace-nowrap transition-colors" href="{{ route('shop.index') }}">Bespoke Fitting</a>
</div>
</div>
</section>
<!-- Main Body: Filter Sidebar + Products Stream -->
<div class="max-w-7xl mx-auto px-gutter lg:px-gutter-lg py-space-lg w-full">
<!-- View Density & Sort Toolbar -->
<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-space-sm pb-space-md mb-space-md">
<div class="flex items-center gap-space-sm text-on-surface">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">Catalog Order:</span>
<div class="relative inline-block">
<select class="appearance-none bg-surface-container-lowest text-on-surface font-body-sm text-body-sm rounded-full pl-space-md pr-space-xl py-1.5 focus:outline-none shadow-sm cursor-pointer">
<option selected="">Curated Relevance</option>
<option>Price: Low to High</option>
<option>Price: High to Low</option>
<option>Newest Arrivals</option>
<option>Highest Artisan Rating</option>
</select>
<span class="material-symbols-outlined text-sm text-secondary absolute right-3 top-2.5 pointer-events-none">expand_more</span>
</div>
</div>
<div class="flex items-center gap-space-md w-full sm:w-auto justify-between sm:justify-end">
<!-- Zero Results Preview Toggle -->
<button class="font-label-sm text-label-sm text-primary hover:text-primary-container transition-colors flex items-center gap-1" onclick="document.getElementById('emptyStateModal').classList.toggle('hidden');" type="button">
<span class="material-symbols-outlined text-sm">visibility</span>
<span>Inspect Empty Match View</span>
</button>
<!-- View Density Toggle -->
<div class="flex items-center bg-surface-container-lowest p-1 rounded-full shadow-sm">
<button class="p-1.5 rounded-full text-secondary hover:text-on-surface transition-colors" id="gridDenseBtn" title="4-Column Density" type="button">
<span class="material-symbols-outlined text-base">grid_view</span>
</button>
<button class="p-1.5 rounded-full bg-primary text-on-primary transition-colors" id="gridComfortBtn" title="3-Column Gallery" type="button">
<span class="material-symbols-outlined text-base">view_module</span>
</button>
</div>
</div>
</div>
<!-- Layout Grid: 12 Columns -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter-lg items-start">
<!-- LEFT FILTER SIDEBAR (Desktop 3 cols) -->
<aside class="hidden lg:flex flex-col lg:col-span-3 space-y-space-md bg-surface-container-lowest p-space-md rounded-xl shadow-sm">
<div class="flex items-center justify-between pb-space-xs">
<span class="font-label-md text-label-md uppercase tracking-wider text-on-surface">Filter Selection</span>
<button class="font-label-sm text-label-sm text-secondary hover:text-primary uppercase tracking-wider" type="button">Reset</button>
</div>
<!-- Filter Block 1: Departments -->
<div class="space-y-space-xs pt-space-xs">
<div class="flex items-center justify-between">
<h2 class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface">Department</h2>
<span class="material-symbols-outlined text-xs text-secondary">remove</span>
</div>
<div class="space-y-1.5 pt-1">
<label class="flex items-center justify-between group cursor-pointer">
<div class="flex items-center gap-2">
<input checked="" class="w-4 h-4 rounded text-primary accent-primary cursor-pointer" type="checkbox"/>
<span class="font-body-sm text-body-sm text-on-surface group-hover:text-primary transition-colors">Women's Couture</span>
</div>
<span class="font-label-sm text-label-sm text-secondary">34</span>
</label>
<label class="flex items-center justify-between group cursor-pointer">
<div class="flex items-center gap-2">
<input class="w-4 h-4 rounded text-primary accent-primary cursor-pointer" type="checkbox"/>
<span class="font-body-sm text-body-sm text-on-surface group-hover:text-primary transition-colors">Jewelry &amp; Gems</span>
</div>
<span class="font-label-sm text-label-sm text-secondary">8</span>
</label>
<label class="flex items-center justify-between group cursor-pointer">
<div class="flex items-center gap-2">
<input class="w-4 h-4 rounded text-primary accent-primary cursor-pointer" type="checkbox"/>
<span class="font-body-sm text-body-sm text-on-surface group-hover:text-primary transition-colors">Resort Accessories</span>
</div>
<span class="font-label-sm text-label-sm text-secondary">4</span>
</label>
<label class="flex items-center justify-between group cursor-pointer">
<div class="flex items-center gap-2">
<input class="w-4 h-4 rounded text-primary accent-primary cursor-pointer" type="checkbox"/>
<span class="font-body-sm text-body-sm text-on-surface group-hover:text-primary transition-colors">Bespoke Tailoring</span>
</div>
<span class="font-label-sm text-label-sm text-secondary">2</span>
</label>
</div>
</div>
<!-- Filter Block 2: Provenance & Artisan Guild -->
<div class="space-y-space-xs pt-space-xs">
<div class="flex items-center justify-between">
<h2 class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface">Artisan Provenance</h2>
<span class="material-symbols-outlined text-xs text-secondary">remove</span>
</div>
<div class="space-y-1.5 pt-1">
<label class="flex items-center justify-between group cursor-pointer">
<div class="flex items-center gap-2">
<input checked="" class="w-4 h-4 rounded text-primary accent-primary cursor-pointer" type="checkbox"/>
<span class="font-body-sm text-body-sm text-on-surface group-hover:text-primary transition-colors">Dumbara Heritage Guild</span>
</div>
<span class="font-label-sm text-label-sm text-secondary">18</span>
</label>
<label class="flex items-center justify-between group cursor-pointer">
<div class="flex items-center gap-2">
<input checked="" class="w-4 h-4 rounded text-primary accent-primary cursor-pointer" type="checkbox"/>
<span class="font-body-sm text-body-sm text-on-surface group-hover:text-primary transition-colors">Matale Handloom Loom</span>
</div>
<span class="font-label-sm text-label-sm text-secondary">4</span>
</label>
<label class="flex items-center justify-between group cursor-pointer">
<div class="flex items-center gap-2">
<input class="w-4 h-4 rounded text-primary accent-primary cursor-pointer" type="checkbox"/>
<span class="font-body-sm text-body-sm text-on-surface group-hover:text-primary transition-colors">Kandy Master Weavers</span>
</div>
<span class="font-label-sm text-label-sm text-secondary">14</span>
</label>
<label class="flex items-center justify-between group cursor-pointer">
<div class="flex items-center gap-2">
<input class="w-4 h-4 rounded text-primary accent-primary cursor-pointer" type="checkbox"/>
<span class="font-body-sm text-body-sm text-on-surface group-hover:text-primary transition-colors">Galle Dye Works</span>
</div>
<span class="font-label-sm text-label-sm text-secondary">12</span>
</label>
</div>
</div>
<!-- Filter Block 3: Material & Weave -->
<div class="space-y-space-xs pt-space-xs">
<div class="flex items-center justify-between">
<h2 class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface">Material &amp; Weave</h2>
<span class="material-symbols-outlined text-xs text-secondary">remove</span>
</div>
<div class="space-y-1.5 pt-1">
<label class="flex items-center gap-2 cursor-pointer">
<input checked="" class="w-4 h-4 rounded text-primary accent-primary" type="checkbox"/>
<span class="font-body-sm text-body-sm text-on-surface">100% Pure Raw Silk</span>
</label>
<label class="flex items-center gap-2 cursor-pointer">
<input class="w-4 h-4 rounded text-primary accent-primary" type="checkbox"/>
<span class="font-body-sm text-body-sm text-on-surface">Ahimsa Peace Silk</span>
</label>
<label class="flex items-center gap-2 cursor-pointer">
<input class="w-4 h-4 rounded text-primary accent-primary" type="checkbox"/>
<span class="font-body-sm text-body-sm text-on-surface">Organic Lotus Fibre Blend</span>
</label>
<label class="flex items-center gap-2 cursor-pointer">
<input class="w-4 h-4 rounded text-primary accent-primary" type="checkbox"/>
<span class="font-body-sm text-body-sm text-on-surface">Handloom Fine Cotton</span>
</label>
</div>
</div>
<!-- Filter Block 4: Price Range -->
<div class="space-y-space-xs pt-space-xs">
<div class="flex items-center justify-between">
<h2 class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface">Price (LKR)</h2>
<span class="material-symbols-outlined text-xs text-secondary">remove</span>
</div>
<div class="space-y-1.5 pt-1">
<label class="flex items-center gap-2 cursor-pointer">
<input class="w-4 h-4 text-primary accent-primary" name="price_range" type="radio"/>
<span class="font-body-sm text-body-sm text-on-surface">Under LKR 15,000</span>
</label>
<label class="flex items-center gap-2 cursor-pointer">
<input class="w-4 h-4 text-primary accent-primary" name="price_range" type="radio"/>
<span class="font-body-sm text-body-sm text-on-surface">LKR 15,000 – 30,000</span>
</label>
<label class="flex items-center gap-2 cursor-pointer">
<input checked="" class="w-4 h-4 text-primary accent-primary" name="price_range" type="radio"/>
<span class="font-body-sm text-body-sm text-on-surface">LKR 30,000 – 60,000</span>
</label>
<label class="flex items-center gap-2 cursor-pointer">
<input class="w-4 h-4 text-primary accent-primary" name="price_range" type="radio"/>
<span class="font-body-sm text-body-sm text-on-surface">LKR 60,000+</span>
</label>
</div>
</div>
<!-- Filter Block 5: Island Color Palette Swatches -->
<div class="space-y-space-xs pt-space-xs">
<h2 class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface">Color Nuance</h2>
<div class="flex items-center gap-2.5 pt-1 flex-wrap">
<button class="w-7 h-7 rounded-full bg-primary ring-2 ring-primary ring-offset-2 focus:outline-none" title="Sapphire Blue" type="button"></button>
<button class="w-7 h-7 rounded-full bg-amber-400 hover:scale-105 transition-transform" title="Lotus Gold" type="button"></button>
<button class="w-7 h-7 rounded-full bg-[#FAF7F0] shadow-sm hover:scale-105 transition-transform" title="Ivory Raw Silk" type="button"></button>
<button class="w-7 h-7 rounded-full bg-[#8B4513] hover:scale-105 transition-transform" title="Cinnamon Bark" type="button"></button>
<button class="w-7 h-7 rounded-full bg-[#006947] hover:scale-105 transition-transform" title="Ceylon Emerald" type="button"></button>
</div>
</div>
<!-- Filter Block 6: Island Logistics & Ethical Standard -->
<div class="space-y-space-xs pt-space-xs pb-space-xs">
<h2 class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface">Heritage &amp; Courier</h2>
<div class="space-y-1.5 pt-1">
<label class="flex items-center gap-2 cursor-pointer">
<input checked="" class="w-4 h-4 rounded text-primary accent-primary" type="checkbox"/>
<span class="font-body-sm text-body-sm text-on-surface">Colombo Same-Day Hub</span>
</label>
<label class="flex items-center gap-2 cursor-pointer">
<input class="w-4 h-4 rounded text-primary accent-primary" type="checkbox"/>
<span class="font-body-sm text-body-sm text-on-surface">Made-to-Order Custom Fit</span>
</label>
<label class="flex items-center gap-2 cursor-pointer">
<input class="w-4 h-4 rounded text-primary accent-primary" type="checkbox"/>
<span class="font-body-sm text-body-sm text-on-surface">Zero Chemical Dye</span>
</label>
</div>
</div>
<!-- Sustainable Guild Seal Box -->
<div class="p-space-sm bg-surface-container-low rounded-lg space-y-1">
<div class="flex items-center gap-1.5 text-tertiary">
<span class="material-symbols-outlined text-sm">verified_user</span>
<span class="font-label-sm text-label-sm uppercase tracking-wider font-semibold">Master Guild Certified</span>
</div>
<p class="font-body-sm text-body-sm text-secondary">Every piece carries a registered QR verification token from the Crafts Council of Sri Lanka.</p>
</div>
</aside>
<!-- RIGHT PRODUCT GRID & BENTO TILES (Desktop 9 cols) -->
<div class="lg:col-span-9 flex flex-col gap-space-lg">
<!-- Product Grid (Dynamic 3 col gallery) -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-gutter" id="productGrid">@if (!empty($productsUnavailable))
<div class="col-span-full rounded-xl bg-error-container p-space-lg text-on-error-container">Search is temporarily unavailable. Please try again shortly.</div>
@elseif (empty($products))
<div class="col-span-full rounded-xl bg-surface-container-lowest p-space-xl text-center">No products matched �{{ $query }}�. Try another search.</div>
@else
@foreach ($products as $product)
@php
    $productId = data_get($product, 'id');
    $name = data_get($product, 'name', 'Product');
    $price = (float) data_get($product, 'price', 0);
    $image = data_get($product, 'imageUrl') ?? data_get($product, 'image') ?? data_get($product, 'images.0.url');
@endphp
<article class="group bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all flex flex-col justify-between" data-product-id="{{ $productId }}" data-product-name="{{ $name }}" data-product-price="{{ $price }}" data-product-image="{{ $image ?? '' }}" data-product-url="{{ $productId ? route('products.show', $productId) : route('shop.index') }}">
<div class="relative bg-surface-container-low aspect-[3/4] overflow-hidden"><a href="{{ $productId ? route('products.show', $productId) : route('shop.index') }}" class="block h-full">@if ($image)<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ $image }}" alt="{{ $name }}">@else<div class="h-full flex items-center justify-center text-secondary"><span class="material-symbols-outlined text-5xl">image</span></div>@endif</a><button data-wishlist-toggle aria-label="Save to wishlist" class="absolute top-3 right-3 w-8 h-8 rounded-full bg-surface-container-lowest/80 flex items-center justify-center text-on-surface hover:text-primary" type="button"><span class="material-symbols-outlined text-base">favorite</span></button></div>
<div class="p-space-md flex flex-col flex-1 justify-between"><div><span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">{{ data_get($product, 'brand', data_get($product, 'category.name', 'Luvora')) }}</span><h2 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors leading-snug"><a href="{{ $productId ? route('products.show', $productId) : route('shop.index') }}">{{ $name }}</a></h2><p class="font-body-sm text-body-sm text-secondary mt-1">{{ data_get($product, 'description', '') }}</p></div><div class="pt-space-md"><span class="font-headline-sm text-headline-sm font-bold text-on-surface">LKR {{ number_format($price, 2) }}</span></div></div>
</article>
@endforeach
@endif<!-- Pagination Controls -->
<div class="flex flex-col sm:flex-row items-center justify-between gap-space-md pt-space-lg bg-surface-container-lowest p-space-md rounded-xl shadow-sm">
<span class="font-body-sm text-body-sm text-secondary">
            Displaying <strong class="text-on-surface font-semibold">1 – 6</strong> of 48 handcrafted sarees
          </span>
<div class="flex items-center gap-1">
<button class="w-9 h-9 rounded-full flex items-center justify-center text-outline-variant cursor-not-allowed" disabled="" type="button">
<span class="material-symbols-outlined text-sm">arrow_back</span>
</button>
<button class="w-9 h-9 rounded-full bg-primary text-on-primary font-label-sm text-label-sm flex items-center justify-center font-bold" type="button">1</button>
<button class="w-9 h-9 rounded-full hover:bg-surface-container-high text-on-surface font-label-sm text-label-sm flex items-center justify-center transition-colors" type="button">2</button>
<button class="w-9 h-9 rounded-full hover:bg-surface-container-high text-on-surface font-label-sm text-label-sm flex items-center justify-center transition-colors" type="button">3</button>
<span class="w-8 text-center text-secondary font-body-sm text-body-sm">...</span>
<button class="w-9 h-9 rounded-full hover:bg-surface-container-high text-on-surface font-label-sm text-label-sm flex items-center justify-center transition-colors" type="button">8</button>
<button class="w-9 h-9 rounded-full hover:bg-surface-container-high text-on-surface flex items-center justify-center transition-colors" type="button">
<span class="material-symbols-outlined text-sm">arrow_forward</span>
</button>
</div>
</div>
</div>
</div>
</div>
<!-- Island Luxury Trust Banner -->
<section class="w-full bg-surface-container-low py-space-lg mt-space-lg">
<div class="max-w-7xl mx-auto px-gutter lg:px-gutter-lg">
<div class="grid grid-cols-1 md:grid-cols-3 gap-gutter-lg">
<div class="flex items-start gap-space-sm">
<div class="w-10 h-10 rounded-full bg-primary-fixed flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined text-xl">local_shipping</span>
</div>
<div>
<h4 class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface">Complimentary Island Courier</h4>
<p class="font-body-sm text-body-sm text-secondary mt-1">Delivered across all 9 provinces with zero shipping charge on orders over LKR 15,000.</p>
</div>
</div>
<div class="flex items-start gap-space-sm">
<div class="w-10 h-10 rounded-full bg-primary-fixed flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined text-xl">bolt</span>
</div>
<div>
<h4 class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface">Colombo Express 01–15</h4>
<p class="font-body-sm text-body-sm text-secondary mt-1">Order before 2:00 PM for curated same-day door delivery within the Colombo municipality.</p>
</div>
</div>
<div class="flex items-start gap-space-sm">
<div class="w-10 h-10 rounded-full bg-primary-fixed flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined text-xl">workspace_premium</span>
</div>
<div>
<h4 class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface">Ceylon Authenticity Token</h4>
<p class="font-body-sm text-body-sm text-secondary mt-1">Every handloom saree includes an artisan-signed certificate of fiber purity and ethical origin.</p>
</div>
</div>
</div>
</div>
</section>
<!-- SOPHISTICATED NO MATCHES / ZERO STATE PREVIEW (Interactive Modal) -->
<div class="hidden fixed inset-0 z-50 flex items-center justify-center bg-on-background/50 backdrop-blur-sm p-space-md" id="emptyStateModal">
<div class="bg-surface-container-lowest max-w-2xl w-full rounded-2xl p-space-xl shadow-2xl relative overflow-hidden">
<!-- Close Button -->
<button aria-label="Close dialog" class="absolute top-4 right-4 text-secondary hover:text-on-surface p-1 rounded-full transition-colors" onclick="document.getElementById('emptyStateModal').classList.add('hidden');" type="button">
<span class="material-symbols-outlined text-xl">close</span>
</button>
<div class="flex flex-col items-center text-center space-y-space-md">
<!-- Botanical Vector Minimal Illustration -->
<div class="w-20 h-20 rounded-full bg-surface-container flex items-center justify-center text-primary">
<svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24">
<path d="M12 21a9 9 0 100-18 9 9 0 000 18z" stroke-linecap="round" stroke-linejoin="round"></path>
<path d="M12 3v18" stroke-linecap="round" stroke-linejoin="round"></path>
<path d="M12 12c-4 0-7-2-7-5s3-5 7-5 7 2 7 5-3 5-7 5z" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
</div>
<div class="space-y-space-xs max-w-lg">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-primary">No Exact Matches Found</span>
<h3 class="font-headline-md text-headline-md text-on-surface">No sanctuary silhouettes match this search</h3>
<p class="font-body-sm text-body-sm text-secondary leading-relaxed">
            Luvora curates only pure natural island fibers, Dumbara handlooms, and ethical Ceylon sapphires. We do not stock synthetic mass-market textiles or nylon outerwear.
          </p>
</div>
<!-- Curated Discovery Path -->
<div class="w-full bg-surface-container-low p-space-md rounded-xl text-left space-y-2">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">Alternative artisanal collections to explore:</span>
<div class="flex flex-wrap gap-2 pt-1">
<a class="bg-surface-container-lowest text-on-surface hover:text-primary font-body-sm text-body-sm px-space-sm py-1 rounded-full shadow-sm transition-colors" href="{{ route('shop.index') }}">Handloom Cotton Kimono</a>
<a class="bg-surface-container-lowest text-on-surface hover:text-primary font-body-sm text-body-sm px-space-sm py-1 rounded-full shadow-sm transition-colors" href="{{ route('shop.index') }}">Dumbara Pure Linen Kaftan</a>
<a class="bg-surface-container-lowest text-on-surface hover:text-primary font-body-sm text-body-sm px-space-sm py-1 rounded-full shadow-sm transition-colors" href="{{ route('shop.index') }}">Ratnapura Sapphire Solitaire</a>
</div>
</div>
<!-- Dual Action Buttons -->
<div class="flex flex-col sm:flex-row items-center gap-space-sm w-full pt-space-xs">
<a class="w-full sm:w-1/2 bg-primary text-on-primary font-label-sm text-label-sm uppercase tracking-wider py-3 rounded-full hover:bg-primary-container text-center transition-colors shadow-sm" href="{{ route('shop.index') }}">
            Explore All Handlooms &amp; Silks
          </a>
<button class="w-full sm:w-1/2 bg-surface-container-high text-on-surface font-label-sm text-label-sm uppercase tracking-wider py-3 rounded-full hover:bg-surface-container-highest transition-colors" onclick="document.getElementById('emptyStateModal').classList.add('hidden');" type="button">
            Speak with VIP Concierge
          </button>
</div>
</div>
</div>
</div>
<!-- Interactive Grid View Switching Script -->
<script>
    const gridDenseBtn = document.getElementById('gridDenseBtn');
    const gridComfortBtn = document.getElementById('gridComfortBtn');
    const productGrid = document.getElementById('productGrid');

    if (gridDenseBtn && gridComfortBtn && productGrid) {
      gridDenseBtn.addEventListener('click', () => {
        productGrid.className = 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-gutter';
        gridDenseBtn.className = 'p-1.5 rounded-full bg-primary text-on-primary transition-colors';
        gridComfortBtn.className = 'p-1.5 rounded-full text-secondary hover:text-on-surface transition-colors';
      });

      gridComfortBtn.addEventListener('click', () => {
        productGrid.className = 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-gutter';
        gridComfortBtn.className = 'p-1.5 rounded-full bg-primary text-on-primary transition-colors';
        gridDenseBtn.className = 'p-1.5 rounded-full text-secondary hover:text-on-surface transition-colors';
      });
    }
  </script>
</div></main><footer class="w-full bg-surface-container-low mt-space-xl pt-space-xl pb-space-lg shadow-[0_1px_8px_rgba(0,0,0,0.02)]"><div class="max-w-7xl mx-auto px-gutter lg:px-gutter-lg"><div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-gutter-lg pb-space-xl"><div class="lg:col-span-2 pr-space-lg"><div class="flex items-center gap-space-sm mb-space-md"><span class="font-headline-md text-headline-md tracking-tight text-on-surface">Luvora</span></div><p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md leading-relaxed">The premier high-fashion sanctuary of Ceylon. Curating world-class island artisanal craftsmanship, ethical gems, and international contemporary collections for refined global wardrobes.</p><div class="space-y-space-xs"><p class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">Join the Luvora Society</p><div class="flex items-center gap-space-xs max-w-sm"><input class="w-full bg-surface-container-lowest border border-outline-variant rounded-full px-space-md py-space-xs font-body-sm text-body-sm text-on-surface focus:outline-none focus:border-primary" placeholder="Enter your email..." type="email"/><a href="{{ route('newsletter') }}" class="bg-on-background text-surface-container-lowest font-label-md text-label-md uppercase px-space-md py-space-xs rounded-full hover:bg-primary transition-colors shrink-0">Join</a></div></div></div><div><h3 class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface mb-space-md">Shop</h3><ul class="space-y-space-xs"><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="women" href="{{ route('shop.index') }}">Women's Couture</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="men" href="{{ route('shop.index') }}">Men's Tailoring</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="jewelry" href="{{ route('shop.index') }}">Bespoke Fine Jewelry</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="shoes" href="{{ route('shop.index') }}">Artisanal Footwear</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="essentials" href="{{ route('shop.index') }}">Island Resort Essentials</a></li></ul></div><div><h3 class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface mb-space-md">Customer Care</h3><ul class="space-y-space-xs"><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="contact-concierge" href="{{ route('customer-care.contact') }}">Client Concierge</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="shipping-deliveries" href="{{ route('customer-care.shipping') }}">Island-wide Shipping</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="returns-exchanges" href="{{ route('customer-care.returns') }}">Returns &amp; Exchanges</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="colombo-same-day" href="{{ route('customer-care.colombo-express') }}">Colombo Express Hub</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="size-guide" href="{{ route('customer-care.size-guide') }}">Bespoke Size Guide</a></li></ul></div><div><h3 class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface mb-space-md">About &amp; Legal</h3><ul class="space-y-space-xs"><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="about-luvora" href="{{ route('about.heritage') }}">Our Heritage</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="sri-lankan-artisans" href="{{ route('about.artisans') }}">Artisan Guild</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="privacy-policy" href="{{ route('legal.privacy') }}">Privacy Policy</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="terms-of-service" href="{{ route('legal.terms') }}">Terms of Luxury</a></li><li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a data-path="authenticity" href="{{ route('authenticity') }}">Certificate of Authenticity</a></li></ul></div></div>@include('partials.footer-bottom')</div></footer><script>
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