<!DOCTYPE html>

<html lang="en"><head><meta charset="utf-8"/><meta content="width=device-width, initial-scale=1.0" name="viewport"/><meta content="web_dashboard" name="shell-type"/><style>@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config = {
  darkMode: "class",
  theme: {
    extend: {
      "colors": {
        "surface-bright": "#f7f9fb",
        "surface-variant": "#e0e3e5",
        "tertiary-fixed": "#6ffbbe",
        "primary-fixed-dim": "#a8c8ff",
        "on-background": "#191c1e",
        "surface-container": "#eceef0",
        "inverse-on-surface": "#eff1f3",
        "on-tertiary-container": "#f5fff6",
        "secondary-fixed": "#dae2fd",
        "inverse-primary": "#a8c8ff",
        "on-tertiary-fixed-variant": "#005236",
        "inverse-surface": "#2d3133",
        "on-primary-fixed-variant": "#004689",
        "on-secondary-fixed": "#131b2e",
        "surface": "#f7f9fb",
        "on-tertiary-fixed": "#002113",
        "outline": "#717785",
        "surface-container-low": "#f2f4f6",
        "surface-container-highest": "#e0e3e5",
        "primary-container": "#0074db",
        "surface-container-high": "#e6e8ea",
        "primary": "#005baf",
        "surface-tint": "#005eb3",
        "surface-dim": "#d8dadc",
        "outline-variant": "#c0c6d6",
        "tertiary-container": "#00855b",
        "on-error-container": "#93000a",
        "on-secondary-fixed-variant": "#3f465c",
        "tertiary": "#006947",
        "on-tertiary": "#ffffff",
        "background": "#f7f9fb",
        "secondary": "#565e74",
        "on-error": "#ffffff",
        "primary-fixed": "#d5e3ff",
        "on-secondary-container": "#5c647a",
        "tertiary-fixed-dim": "#4edea3",
        "on-surface": "#191c1e",
        "surface-container-lowest": "#ffffff",
        "on-surface-variant": "#404754",
        "error": "#ba1a1a",
        "on-primary": "#ffffff",
        "on-primary-fixed": "#001b3c",
        "on-primary-container": "#fefcff",
        "error-container": "#ffdad6",
        "secondary-container": "#dae2fd",
        "on-secondary": "#ffffff",
        "secondary-fixed-dim": "#bec6e0"
      },
      "borderRadius": {
        "DEFAULT": "0.25rem",
        "lg": "0.5rem",
        "xl": "0.75rem",
        "full": "9999px"
      },
      "spacing": {
        "gutter-sm": "1rem",
        "margin": "1.5rem",
        "gutter-lg": "2rem",
        "space-lg": "1.5rem",
        "space-xs": "0.25rem",
        "margin-lg": "4rem",
        "space-sm": "0.5rem",
        "margin-sm": "1rem",
        "gutter": "1.5rem",
        "space-md": "1rem",
        "space-xl": "2.5rem"
      },
      "fontFamily": {
        "headline-lg": [
          "Bodoni Moda"
        ],
        "label-sm": [
          "Inter"
        ],
        "body-lg": [
          "Plus Jakarta Sans"
        ],
        "label-md": [
          "Inter"
        ],
        "body-md": [
          "Plus Jakarta Sans"
        ],
        "headline-lg-mobile": [
          "Bodoni Moda"
        ],
        "display-hero": [
          "Bodoni Moda"
        ],
        "headline-md": [
          "Bodoni Moda"
        ],
        "headline-sm": [
          "Plus Jakarta Sans"
        ],
        "label-lg": [
          "Inter"
        ],
        "display-hero-mobile": [
          "Bodoni Moda"
        ],
        "body-sm": [
          "Plus Jakarta Sans"
        ]
      },
      "fontSize": {
        "headline-lg": [
          "40px",
          {
            "lineHeight": "48px",
            "letterSpacing": "-0.01em",
            "fontWeight": "500"
          }
        ],
        "label-sm": [
          "11px",
          {
            "lineHeight": "14px",
            "letterSpacing": "0.06em",
            "fontWeight": "600"
          }
        ],
        "body-lg": [
          "18px",
          {
            "lineHeight": "28px",
            "fontWeight": "400"
          }
        ],
        "label-md": [
          "12px",
          {
            "lineHeight": "16px",
            "letterSpacing": "0.04em",
            "fontWeight": "500"
          }
        ],
        "body-md": [
          "15px",
          {
            "lineHeight": "22px",
            "fontWeight": "400"
          }
        ],
        "headline-lg-mobile": [
          "30px",
          {
            "lineHeight": "36px",
            "letterSpacing": "0em",
            "fontWeight": "500"
          }
        ],
        "display-hero": [
          "56px",
          {
            "lineHeight": "64px",
            "letterSpacing": "-0.02em",
            "fontWeight": "600"
          }
        ],
        "headline-md": [
          "28px",
          {
            "lineHeight": "34px",
            "fontWeight": "500"
          }
        ],
        "headline-sm": [
          "20px",
          {
            "lineHeight": "28px",
            "fontWeight": "600"
          }
        ],
        "label-lg": [
          "14px",
          {
            "lineHeight": "20px",
            "letterSpacing": "0.02em",
            "fontWeight": "600"
          }
        ],
        "display-hero-mobile": [
          "38px",
          {
            "lineHeight": "44px",
            "letterSpacing": "-0.01em",
            "fontWeight": "600"
          }
        ],
        "body-sm": [
          "13px",
          {
            "lineHeight": "18px",
            "fontWeight": "400"
          }
        ]
      }
    }
  }
}</script><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/></head><body class="bg-surface text-on-surface"><aside class="fixed left-0 top-0 h-full w-72 bg-surface-container-lowest z-50 flex flex-col shadow-[0_1px_8px_rgba(0,0,0,0.04)]"><div class="h-20 px-space-md flex items-center justify-between bg-surface-container-lowest"><div class="flex items-center gap-space-sm"><img alt="Brand logo. - Primary color: #0088ff
- Font: bodoniModa
- Mode: light
- Roundness: rounded-md
" class="h-8 w-auto object-contain" src="https://lh3.googleusercontent.com/aida/AEtjO1W34tid3ShkuS9nNFPU9jvlqzpxl1NJD_wF7ZNkn3yExkUTkBFJ3ypCIui4c6lG1RUcbFOCsyY5_tbLFD_tJP51TjqHne263g9Nbi7ZIkZYJu2-5uK5Ass7lGl5Z1Um2SbV7etW_eu_1lD93w2ZnsWCgVsj3ups1XmIIDFec2pV6RKjXdA3QAJn2CdrTLOQJbPVBq-2nWv7rURXGhRBOt4qnwfjvFiXSYTwwtKiW7-4b3CHRdUEuqlfMzA"/><div class="flex flex-col"><span class="font-headline-md text-headline-md leading-none text-on-surface tracking-tight">LUVORA</span><span class="font-label-sm text-label-sm text-secondary uppercase tracking-widest mt-1">Executive Portal</span></div></div><div class="h-2 w-2 rounded-full bg-primary animate-pulse"></div></div><div class="flex-1 overflow-y-auto px-space-sm py-space-sm space-y-space-md"><nav class="space-y-space-xs" data-active-classes="bg-primary-container text-on-primary-container font-semibold rounded-lg"><p class="px-space-sm text-[10px] font-label-sm uppercase tracking-wider text-outline">Dashboard</p><a aria-current="page" class="flex items-center gap-space-sm px-space-sm py-2 transition-all bg-primary-container text-on-primary-container font-semibold rounded-lg" data-path="overview" href="{{ route('dashboard') }}"><span class="material-symbols-outlined text-lg">dashboard</span>Overview</a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="analytics" href="{{ route('dashboard') }}#analytics"><span class="material-symbols-outlined text-lg">monitoring</span>Analytics</a></nav><nav class="space-y-space-xs" data-active-classes="bg-primary-container text-on-primary-container font-semibold rounded-lg"><p class="px-space-sm text-[10px] font-label-sm uppercase tracking-wider text-outline">Catalog &amp; Products</p><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="all-products" href="{{ route('products.index') }}"><span class="material-symbols-outlined text-lg">apparel</span>All Products</a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="add-product" href="{{ route('products.index') }}#add-product"><span class="material-symbols-outlined text-lg">add_circle</span>Add Product</a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="categories" href="#"><span class="material-symbols-outlined text-lg">category</span>Categories</a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="inventory-stock-alerts" href="{{ route('inventory.index') }}"><span class="material-symbols-outlined text-lg">inventory_2</span>Inventory &amp; Stock Alerts</a></nav><nav class="space-y-space-xs" data-active-classes="bg-primary-container text-on-primary-container font-semibold rounded-lg"><p class="px-space-sm text-[10px] font-label-sm uppercase tracking-wider text-outline">Orders &amp; Escrow</p><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="all-orders" href="{{ route('orders.index') }}"><span class="material-symbols-outlined text-lg">receipt_long</span>All Orders</a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="live-dispatches" href="#"><span class="material-symbols-outlined text-lg">local_shipping</span>Live Dispatches</a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="tailor-fittings" href="#"><span class="material-symbols-outlined text-lg">straighten</span>Tailor Fittings</a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="gem-escrow-vault" href="#"><span class="material-symbols-outlined text-lg">diamond</span>Gem Escrow Vault</a></nav><nav class="space-y-space-xs" data-active-classes="bg-primary-container text-on-primary-container font-semibold rounded-lg"><p class="px-space-sm text-[10px] font-label-sm uppercase tracking-wider text-outline">Customers &amp; VIP Patrons</p><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="all-customers" href="#"><span class="material-symbols-outlined text-lg">group</span>All Customers</a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="sovereign-circle" href="#"><span class="material-symbols-outlined text-lg">workspace_premium</span>Sovereign Circle</a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="reviews-feedback" href="#"><span class="material-symbols-outlined text-lg">star</span>Reviews &amp; Feedback</a></nav><nav class="space-y-space-xs" data-active-classes="bg-primary-container text-on-primary-container font-semibold rounded-lg"><p class="px-space-sm text-[10px] font-label-sm uppercase tracking-wider text-outline">Artisans &amp; Logistics</p><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="dumbara-weavers" href="#"><span class="material-symbols-outlined text-lg">palette</span>Dumbara Weavers</a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="ratnapura-cutters" href="#"><span class="material-symbols-outlined text-lg">save_as</span>Ratnapura Cutters</a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="logistics-chauffeurs" href="#"><span class="material-symbols-outlined text-lg">directions_car</span>Logistics &amp; Chauffeurs</a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="system-settings" href="#"><span class="material-symbols-outlined text-lg">tune</span>System &amp; Settings</a></nav></div><div class="p-space-sm bg-surface-container-low"><div class="flex items-center gap-space-sm bg-surface-container-lowest p-space-sm rounded-lg shadow-[0_1px_8px_rgba(0,0,0,0.04)]"><img alt="Profile" class="w-8 h-8 rounded-full object-cover" src="https://lh3.googleusercontent.com/aida/AEtjO1VFWU_GemsQx8cSzOYAsoVP_9cEdrpUqslJQQL6HcvH6tnQQUZH9spBXLTcEkOtQVB6L35GDLTOrFyNmi6JukLXq2V3LnG2KzqeFII76YPM_uCQ7T7vZGDR3Z3RjVrfg2Mxi-ZxSUxOE3nJbwalj6Y0AH5yKf9B2cGUhF76M8UgwPBgkMgmt-mt3MhLrfKCw8zvMCuPM6gq6npc6wvKAso3TFAhDDH3g7QHdk0CTiDCQh_OGzL32MBplaQ"/><div class="flex flex-col min-w-0"><span class="font-label-md text-label-md text-on-surface font-semibold truncate">Madame Ananya</span><span class="font-label-sm text-label-sm text-primary truncate">Executive Director</span></div></div></div></aside><div class="pl-72"><header class="fixed top-0 left-72 right-0 h-20 bg-surface/80 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)] z-40 px-gutter-lg flex items-center justify-between"><div class="flex items-center gap-space-md flex-1 max-w-2xl"><div class="flex items-center gap-space-xs bg-surface-container-low px-space-sm py-2 rounded-full"><span class="material-symbols-outlined text-base text-primary">storefront</span><span class="font-label-sm text-label-sm text-on-surface font-semibold">Colombo 07 Flagship</span><span class="material-symbols-outlined text-sm text-outline">expand_more</span></div><div class="relative flex-1"><span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-lg">search</span><input class="w-full bg-surface-container-lowest pl-10 pr-4 py-2 rounded-full font-body-sm text-body-sm text-on-surface placeholder:text-outline focus:outline-none shadow-[0_1px_3px_0_rgba(15,23,42,0.04)]" placeholder="Search SKUs, high jewelry orders, sovereign patrons..." type="text"/></div></div><div class="flex items-center gap-space-md"><div class="flex items-center gap-space-xs bg-tertiary-fixed/30 px-space-sm py-1.5 rounded-full"><span class="h-2 w-2 rounded-full bg-tertiary"></span><span class="font-label-sm text-label-sm text-on-tertiary-fixed-variant font-medium">CBSL Escrow Synchronized</span></div><button class="relative p-2 rounded-full bg-surface-container-lowest text-on-surface-variant hover:text-on-surface shadow-[0_1px_3px_0_rgba(15,23,42,0.04)]"><span class="material-symbols-outlined text-xl">notifications</span><span class="absolute top-1 right-1 h-2 w-2 rounded-full bg-error"></span></button><div class="flex items-center gap-space-sm pl-space-xs"><img alt="Profile" class="w-8 h-8 rounded-full object-cover" src="https://lh3.googleusercontent.com/aida/AEtjO1VFWU_GemsQx8cSzOYAsoVP_9cEdrpUqslJQQL6HcvH6tnQQUZH9spBXLTcEkOtQVB6L35GDLTOrFyNmi6JukLXq2V3LnG2KzqeFII76YPM_uCQ7T7vZGDR3Z3RjVrfg2Mxi-ZxSUxOE3nJbwalj6Y0AH5yKf9B2cGUhF76M8UgwPBgkMgmt-mt3MhLrfKCw8zvMCuPM6gq6npc6wvKAso3TFAhDDH3g7QHdk0CTiDCQh_OGzL32MBplaQ"/><div class="hidden xl:flex flex-col text-right"><span class="font-label-md text-label-md text-on-surface font-medium">Madame Ananya</span><span class="font-label-sm text-label-sm text-secondary">Executive Director</span></div></div></div></header><main class="w-full pt-20 px-gutter-lg bg-surface min-h-screen"><div class="flex flex-col w-full">
<!-- Top Operational Context & Actions -->
<div class="flex flex-col xl:flex-row xl:items-end justify-between gap-space-md pt-4 pb-space-lg">
<div class="flex flex-col max-w-3xl">
<div class="flex items-center gap-2 mb-2">
<span class="inline-block w-2 h-2 rounded-full bg-primary-container"></span>
<span class="font-label-sm text-label-sm text-outline tracking-widest uppercase">
          Executive Overview &amp; Atelier Telemetry
        </span>
</div>
<h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight leading-none mb-2">
        Executive Dashboard &amp; Atelier Intelligence
      </h1>
<p class="font-body-md text-body-md text-on-surface-variant max-w-2xl">
        Real-time financial telemetry, artisan consignment velocity, sapphire escrow settlement, and islandwide white-glove dispatch telemetry.
      </p>
</div>
<div class="flex flex-wrap items-center gap-space-sm">
<!-- Date Range Filter -->
<div class="flex items-center gap-space-xs bg-surface-container-lowest px-space-md py-2 rounded-full shadow-sm">
<span class="material-symbols-outlined text-outline text-lg">calendar_today</span>
<span class="font-label-md text-label-md text-on-surface font-medium">Last 30 Days</span>
<span class="material-symbols-outlined text-outline text-sm">arrow_drop_down</span>
</div>
<!-- Store Selector -->
<div class="flex items-center gap-space-xs bg-surface-container-lowest px-space-md py-2 rounded-full shadow-sm">
<span class="material-symbols-outlined text-primary text-lg">apartment</span>
<span class="font-label-md text-label-md text-on-surface font-medium">Colombo 07 Flagship &amp; Global E-Store</span>
<span class="material-symbols-outlined text-outline text-sm">expand_more</span>
</div>
<!-- Export CTA -->
<button class="flex items-center gap-space-xs bg-on-surface text-surface-container-lowest px-space-md py-2 rounded-full font-label-md text-label-md font-semibold hover:bg-on-surface-variant transition-all shadow-sm">
<span class="material-symbols-outlined text-lg">download</span>
        Export Dossier (CSV/PDF)
      </button>
</div>
</div>
<!-- Primary Executive KPI Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-space-md mb-space-lg">
<!-- KPI 1: Gross Revenue -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm relative overflow-hidden flex flex-col justify-between group hover:shadow-md transition-all">
<div class="flex items-start justify-between mb-space-sm">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary font-medium">Gross Revenue</span>
<h3 class="font-display-hero-mobile text-display-hero-mobile text-on-surface mt-1">LKR 48,290,400</h3>
</div>
<div class="w-10 h-10 rounded-full bg-primary-fixed/40 flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-xl">payments</span>
</div>
</div>
<!-- Sparkline & Delta -->
<div class="flex items-center justify-between mt-2 pt-2 bg-surface-container-low/50 px-space-sm py-1.5 rounded-lg">
<div class="flex items-center gap-1 text-tertiary">
<span class="material-symbols-outlined text-base">trending_up</span>
<span class="font-label-md text-label-md font-semibold">+18.4%</span>
<span class="font-label-sm text-label-sm text-outline ml-1">(+LKR 7.5M)</span>
</div>
<svg class="w-20 h-6 text-primary overflow-visible" fill="none" viewbox="0 0 80 24">
<path d="M0 18 L15 14 L30 19 L45 8 L60 11 L75 3 L80 5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
</svg>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-2 truncate">
        Includes LKR 14.2M unheated Ceylon Sapphire escrow
      </p>
</div>
<!-- KPI 2: Total Orders -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm relative overflow-hidden flex flex-col justify-between group hover:shadow-md transition-all">
<div class="flex items-start justify-between mb-space-sm">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary font-medium">Total Orders</span>
<h3 class="font-display-hero-mobile text-display-hero-mobile text-on-surface mt-1">1,428 Orders</h3>
</div>
<div class="w-10 h-10 rounded-full bg-secondary-fixed/50 flex items-center justify-center text-on-secondary-fixed">
<span class="material-symbols-outlined text-xl">shopping_bag</span>
</div>
</div>
<div class="flex items-center justify-between mt-2 pt-2 bg-surface-container-low/50 px-space-sm py-1.5 rounded-lg">
<div class="flex items-center gap-1 text-tertiary">
<span class="material-symbols-outlined text-base">trending_up</span>
<span class="font-label-md text-label-md font-semibold">+12.6%</span>
<span class="font-label-sm text-label-sm text-outline ml-1">MoM</span>
</div>
<span class="font-label-sm text-label-sm text-outline">AOV: LKR 33,816</span>
</div>
<div class="flex items-center gap-1.5 mt-2">
<span class="w-2 h-2 rounded-full bg-tertiary"></span>
<p class="font-body-sm text-body-sm text-on-surface-variant truncate">
          98.4% On-time white-glove delivery
        </p>
</div>
</div>
<!-- KPI 3: Active Patrons -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm relative overflow-hidden flex flex-col justify-between group hover:shadow-md transition-all">
<div class="flex items-start justify-between mb-space-sm">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary font-medium">Active Patrons</span>
<h3 class="font-display-hero-mobile text-display-hero-mobile text-on-surface mt-1">3,892 Patrons</h3>
</div>
<div class="w-10 h-10 rounded-full bg-tertiary-fixed/40 flex items-center justify-center text-tertiary">
<span class="material-symbols-outlined text-xl">shield_person</span>
</div>
</div>
<div class="flex items-center justify-between mt-2 pt-2 bg-surface-container-low/50 px-space-sm py-1.5 rounded-lg">
<div class="flex items-center gap-1 text-primary">
<span class="material-symbols-outlined text-base">group_add</span>
<span class="font-label-md text-label-md font-semibold">+314</span>
<span class="font-label-sm text-label-sm text-outline ml-1">this month</span>
</div>
<span class="font-label-sm text-label-sm text-tertiary font-medium">642 Sovereign Circle</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-2 truncate">
        76.8% Repeat patronage &amp; fitting rate
      </p>
</div>
<!-- KPI 4: Catalog & Active Products -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm relative overflow-hidden flex flex-col justify-between group hover:shadow-md transition-all">
<div class="flex items-start justify-between mb-space-sm">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary font-medium">Curations &amp; Ateliers</span>
<h3 class="font-display-hero-mobile text-display-hero-mobile text-on-surface mt-1">486 Curations</h3>
</div>
<div class="w-10 h-10 rounded-full bg-primary-fixed/40 flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-xl">dry_cleaning</span>
</div>
</div>
<div class="flex items-center justify-between mt-2 pt-2 bg-surface-container-low/50 px-space-sm py-1.5 rounded-lg">
<div class="flex items-center gap-2">
<span class="font-label-sm text-label-sm text-outline">34 Handlooms</span>
<span class="text-outline/40">•</span>
<span class="font-label-sm text-label-sm text-outline">112 Gems</span>
</div>
<span class="font-label-sm text-label-sm text-tertiary font-semibold">94.2% In-Stock</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-2 truncate">
        340 RTW Couture items in circulation
      </p>
</div>
</div>
<!-- Main Telemetry Grid: Chart & Highlights -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-md mb-space-lg">
<!-- Revenue Telemetry Interactive Chart -->
<div class="lg:col-span-8 bg-surface-container-lowest p-space-md rounded-xl shadow-sm flex flex-col justify-between">
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm pb-space-md">
<div>
<div class="flex items-center gap-2">
<h2 class="font-headline-md text-headline-md text-on-surface">Revenue Trends &amp; Escrow Intake</h2>
<span class="px-2 py-0.5 rounded-full bg-tertiary-fixed/30 text-on-tertiary-fixed-variant font-label-sm text-label-sm">Audited</span>
</div>
<p class="font-body-sm text-body-sm text-outline">Weekly sales performance across Luvora categories</p>
</div>
<!-- Metric Tabs -->
<div class="flex items-center bg-surface-container p-1 rounded-full text-label-sm font-label-sm">
<button class="px-3 py-1 bg-surface-container-lowest text-on-surface font-semibold rounded-full shadow-sm">
            Revenue (LKR)
          </button>
<button class="px-3 py-1 text-outline hover:text-on-surface transition-colors">
            Order Volume
          </button>
<button class="px-3 py-1 text-outline hover:text-on-surface transition-colors">
            Artisan Escrow
          </button>
</div>
</div>
<!-- Interactive SVG Multi-Bar & Area Visual -->
<div class="relative w-full h-72 flex flex-col justify-end pt-6">
<!-- SVG Grid & Bars -->
<svg class="w-full h-full" fill="none" preserveaspectratio="none" viewbox="0 0 700 240">
<defs>
<lineargradient id="sapphireGrad" x1="0" x2="0" y1="0" y2="1">
<stop offset="0%" stop-color="#0074db" stop-opacity="0.25"></stop>
<stop offset="100%" stop-color="#0074db" stop-opacity="0.0"></stop>
</lineargradient>
<lineargradient id="barGlow" x1="0" x2="0" y1="0" y2="1">
<stop offset="0%" stop-color="#005baf"></stop>
<stop offset="100%" stop-color="#0074db"></stop>
</lineargradient>
</defs>
<!-- Horizontal Reference Lines -->
<line stroke="#eceef0" stroke-dasharray="4 4" stroke-width="1" x1="0" x2="700" y1="30" y2="30"></line>
<line stroke="#eceef0" stroke-dasharray="4 4" stroke-width="1" x1="0" x2="700" y1="80" y2="80"></line>
<line stroke="#eceef0" stroke-dasharray="4 4" stroke-width="1" x1="0" x2="700" y1="130" y2="130"></line>
<line stroke="#eceef0" stroke-dasharray="4 4" stroke-width="1" x1="0" x2="700" y1="180" y2="180"></line>
<line stroke="#c0c6d6" stroke-width="1" x1="0" x2="700" y1="220" y2="220"></line>
<!-- Background Area Fill for Sapphire Escrow Volume -->
<path d="M 50 170 Q 180 130 280 90 T 500 60 T 650 40 L 650 220 L 50 220 Z" fill="url(#sapphireGrad)"></path>
<path d="M 50 170 Q 180 130 280 90 T 500 60 T 650 40" fill="none" stroke="#0074db" stroke-linecap="round" stroke-width="2.5"></path>
<!-- Week 1 Group -->
<rect fill="#005baf" height="110" rx="4" width="22" x="70" y="110"></rect>
<rect fill="#6ffbbe" height="80" opacity="0.85" rx="4" width="22" x="96" y="140"></rect>
<rect fill="#dae2fd" height="60" rx="4" width="22" x="122" y="160"></rect>
<!-- Week 2 Group -->
<rect fill="#005baf" height="135" rx="4" width="22" x="220" y="85"></rect>
<rect fill="#6ffbbe" height="95" opacity="0.85" rx="4" width="22" x="246" y="125"></rect>
<rect fill="#dae2fd" height="70" rx="4" width="22" x="272" y="150"></rect>
<!-- Week 3 Group -->
<rect fill="#005baf" height="160" rx="4" width="22" x="370" y="60"></rect>
<rect fill="#6ffbbe" height="115" opacity="0.85" rx="4" width="22" x="396" y="105"></rect>
<rect fill="#dae2fd" height="85" rx="4" width="22" x="422" y="135"></rect>
<!-- Week 4 Group (Peak) -->
<rect fill="url(#barGlow)" height="180" rx="4" width="22" x="520" y="40"></rect>
<rect fill="#6ffbbe" height="140" opacity="0.85" rx="4" width="22" x="546" y="80"></rect>
<rect fill="#dae2fd" height="105" rx="4" width="22" x="572" y="115"></rect>
<!-- Active Marker Dot on Peak -->
<circle cx="650" cy="40" fill="#005baf" r="5" stroke="#ffffff" stroke-width="2"></circle>
</svg>
<!-- X-Axis Labels -->
<div class="flex justify-between px-10 pt-3 text-label-sm font-label-sm text-outline">
<div class="text-center">Week 1 (Oct 1-7)<br/><span class="text-on-surface font-semibold">LKR 9.8M</span></div>
<div class="text-center">Week 2 (Oct 8-14)<br/><span class="text-on-surface font-semibold">LKR 11.2M</span></div>
<div class="text-center">Week 3 (Oct 15-21)<br/><span class="text-on-surface font-semibold">LKR 12.6M</span></div>
<div class="text-center">Week 4 (Oct 22-31)<br/><span class="text-primary font-semibold">LKR 14.6M</span></div>
</div>
</div>
<!-- Legend -->
<div class="flex flex-wrap items-center justify-between pt-4 mt-2 bg-surface-container-low/40 px-space-md py-2 rounded-lg">
<div class="flex items-center gap-space-md">
<div class="flex items-center gap-2">
<span class="w-3 h-3 rounded-full bg-primary"></span>
<span class="font-label-sm text-label-sm text-on-surface">Ceylon Sapphires &amp; Gems</span>
</div>
<div class="flex items-center gap-2">
<span class="w-3 h-3 rounded-full bg-tertiary-fixed"></span>
<span class="font-label-sm text-label-sm text-on-surface">Dumbara Handlooms &amp; Sarees</span>
</div>
<div class="flex items-center gap-2">
<span class="w-3 h-3 rounded-full bg-secondary-fixed"></span>
<span class="font-label-sm text-label-sm text-on-surface">Bespoke Ceylon Tailoring</span>
</div>
</div>
<span class="font-label-sm text-label-sm text-outline">Telemetry latency: &lt;140ms</span>
</div>
</div>
<!-- Highlight Stats & Atelier Operations -->
<div class="lg:col-span-4 flex flex-col gap-space-md">
<!-- Highlight 1: Top Grossing Category -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between mb-2">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary font-medium">Top Grossing Segment</span>
<span class="px-2 py-0.5 rounded-full bg-primary-fixed text-on-primary-fixed font-label-sm text-label-sm">44.3% Share</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface">Ceylon Sapphires &amp; High Jewelry</h4>
<p class="font-display-hero-mobile text-display-hero-mobile text-primary font-bold mt-1 mb-2">LKR 21.4M</p>
<div class="w-full bg-surface-container rounded-full h-1.5 overflow-hidden">
<div class="bg-primary h-1.5 rounded-full" style="width: 44.3%"></div>
</div>
<div class="flex items-center justify-between text-label-sm font-label-sm text-outline mt-2">
<span>Avg. Gem Ticket: LKR 191,000</span>
<span>NGJA Audited</span>
</div>
</div>
<!-- Highlights Grid 2x2 in Side Panel -->
<div class="grid grid-cols-2 gap-space-sm flex-1">
<!-- Average Basket -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm flex flex-col justify-center">
<span class="material-symbols-outlined text-primary text-2xl mb-1">shopping_basket</span>
<span class="font-label-sm text-label-sm text-outline">Average Basket</span>
<p class="font-headline-sm text-headline-sm text-on-surface font-semibold mt-1">LKR 124,500</p>
<span class="font-label-sm text-label-sm text-tertiary mt-1">+8.2% vs target</span>
</div>
<!-- Doorstep Fittings -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm flex flex-col justify-center">
<span class="material-symbols-outlined text-secondary text-2xl mb-1">local_taxi</span>
<span class="font-label-sm text-label-sm text-outline">Chauffeur Fittings</span>
<p class="font-headline-sm text-headline-sm text-on-surface font-semibold mt-1">184 Rides</p>
<span class="font-label-sm text-label-sm text-primary mt-1">100% VIP conversion</span>
</div>
<!-- Escrow Velocity -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm flex flex-col justify-center col-span-2">
<div class="flex items-center justify-between">
<div>
<span class="font-label-sm text-label-sm text-outline">Escrow Settlement Velocity</span>
<p class="font-headline-sm text-headline-sm text-on-surface font-semibold mt-1">99.1% Released &lt; 24h</p>
</div>
<div class="w-12 h-12 rounded-full bg-tertiary-fixed/30 flex items-center justify-center text-tertiary">
<span class="material-symbols-outlined text-2xl">verified_user</span>
</div>
</div>
<p class="font-body-sm text-body-sm text-outline mt-2">
            CBSL multi-signature escrow triggers automatic payout to Ratnapura &amp; Dumbara artisan co-operatives immediately upon gemologist sign-off.
          </p>
</div>
</div>
</div>
</div>
<!-- Critical Operational Feed & Real-time Inventory Alerts -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm mb-space-lg">
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm mb-space-md">
<div class="flex items-center gap-space-sm">
<div class="w-3 h-3 rounded-full bg-error animate-ping"></div>
<div>
<h3 class="font-headline-md text-headline-md text-on-surface">Urgent Stock Telemetry &amp; Artisan Requisitions</h3>
<p class="font-body-sm text-body-sm text-outline">4 priority conditions requiring atelier or vault director intervention</p>
</div>
</div>
<button class="flex items-center gap-1 font-label-md text-label-md text-primary font-semibold hover:underline">
        View All 18 Alerts <span class="material-symbols-outlined text-sm">arrow_forward</span>
</button>
</div>
<!-- Operational and pending order alert cards -->
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 gap-space-sm">
<!-- Alert 1 -->
<div class="bg-surface-container-low/60 p-space-md rounded-lg flex flex-col justify-between hover:bg-surface-container-low transition-colors">
<div class="flex items-start justify-between mb-2">
<span class="px-2 py-0.5 rounded-full bg-error-container text-on-error-container font-label-sm text-label-sm font-semibold uppercase">
            Critical Low Stock
          </span>
<span class="material-symbols-outlined text-error text-xl">inventory_2</span>
</div>
<div>
<h4 class="font-label-lg text-label-lg text-on-surface font-semibold">Handloom Emerald Raw Silk Saree</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Dumbara Valley Guild — Only 2 pieces remaining in Colombo 07 vault.</p>
</div>
<button class="mt-4 w-full py-1.5 px-3 rounded-full bg-on-surface text-surface-container-lowest font-label-sm text-label-sm font-semibold hover:bg-on-surface-variant transition-all">
          Reorder from Master Somapala
        </button>
</div>
<!-- Alert 2 -->
<div class="bg-surface-container-low/60 p-space-md rounded-lg flex flex-col justify-between hover:bg-surface-container-low transition-colors">
<div class="flex items-start justify-between mb-2">
<span class="px-2 py-0.5 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-label-sm font-semibold uppercase">
            Gem Clearance
          </span>
<span class="material-symbols-outlined text-primary text-xl">diamond</span>
</div>
<div>
<h4 class="font-label-lg text-label-lg text-on-surface font-semibold">Ratnapura Royal Blue Sapphire (4.2ct)</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Pending NGJA Assaying Certificate verification node #RAT-5012.</p>
</div>
<button class="mt-4 w-full py-1.5 px-3 rounded-full bg-primary text-on-primary font-label-sm text-label-sm font-semibold hover:bg-primary-container transition-all">
          Review Vault Deed
        </button>
</div>
<!-- Alert 3 -->
<div class="bg-surface-container-low/60 p-space-md rounded-lg flex flex-col justify-between hover:bg-surface-container-low transition-colors">
<div class="flex items-start justify-between mb-2">
<span class="px-2 py-0.5 rounded-full bg-surface-container-highest text-on-surface font-label-sm text-label-sm font-semibold uppercase">
            Material Requisition
          </span>
<span class="material-symbols-outlined text-secondary text-xl">colorize</span>
</div>
<div>
<h4 class="font-label-lg text-label-lg text-on-surface font-semibold">Natural Jackwood Botanical Dye</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Kandy Highlands Guild — 4 days supply remaining at pit-loom workshop.</p>
</div>
<button class="mt-4 w-full py-1.5 px-3 rounded-full bg-surface-container-highest text-on-surface font-label-sm text-label-sm font-semibold hover:bg-surface-variant transition-all">
          Dispatch Replenishment
        </button>
</div>
<!-- Alert 4 -->
<div class="bg-surface-container-low/60 p-space-md rounded-lg flex flex-col justify-between hover:bg-surface-container-low transition-colors">
<div class="flex items-start justify-between mb-2">
<span class="px-2 py-0.5 rounded-full bg-tertiary-fixed/60 text-on-tertiary-fixed font-label-sm text-label-sm font-semibold uppercase">
            Pre-Order Ceiling
          </span>
<span class="material-symbols-outlined text-tertiary text-xl">lock_clock</span>
</div>
<div>
<h4 class="font-label-lg text-label-lg text-on-surface font-semibold">Jaffna Palmyrah Minaudière</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">48 VIP backorders waiting. Capacity limit at Northern weaver circle.</p>
</div>
<button class="mt-4 w-full py-1.5 px-3 rounded-full bg-tertiary text-on-tertiary font-label-sm text-label-sm font-semibold hover:bg-tertiary-container transition-all">
          Expand Allocation
        </button>
</div><!-- Pending orders alert -->
<div class="bg-surface-container-low/60 p-space-md rounded-lg flex flex-col justify-between hover:bg-surface-container-low transition-colors">
<div class="flex items-start justify-between mb-2">
<span class="px-2 py-0.5 rounded-full bg-error-container text-on-error-container font-label-sm text-label-sm font-semibold uppercase">Pending Orders</span>
<span class="material-symbols-outlined text-error text-xl">pending_actions</span>
</div>
<div>
<h4 class="font-label-lg text-label-lg text-on-surface font-semibold">12 orders awaiting fulfillment</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Review payment and dispatch status for orders that need attention.</p>
</div>
<a href="#recent-orders" class="mt-4 w-full py-1.5 px-3 rounded-full bg-on-surface text-surface-container-lowest font-label-sm text-label-sm font-semibold text-center hover:bg-on-surface-variant transition-all">Review Orders</a>
</div>
</div>
</div>
<!-- Recent Orders Master Table -->
<div id="recent-orders" class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm mb-space-lg overflow-hidden">
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm pb-space-md">
<div>
<h3 class="font-headline-md text-headline-md text-on-surface">Recent Curations &amp; Live Dispatches</h3>
<p class="font-body-sm text-body-sm text-outline">White-glove escort tracking, jeweler escrow, and bespoke fittings</p>
</div>
<div class="flex items-center gap-space-sm">
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-base">search</span>
<input class="bg-surface-container-low pl-9 pr-3 py-1.5 rounded-full font-body-sm text-body-sm text-on-surface placeholder:text-outline focus:outline-none" placeholder="Filter orders..." type="text"/>
</div>
<button class="p-1.5 rounded-full bg-surface-container-low hover:bg-surface-container text-on-surface transition-colors">
<span class="material-symbols-outlined text-lg">tune</span>
</button>
</div>
</div>
<!-- Data Table Container -->
<div class="overflow-x-auto">
<table class="w-full text-left">
<thead>
<tr class="bg-surface-container-low/40">
<th class="py-3 px-4 font-label-sm text-label-sm text-outline uppercase tracking-wider">Order ID &amp; Date</th>
<th class="py-3 px-4 font-label-sm text-label-sm text-outline uppercase tracking-wider">Patron / VIP Status</th>
<th class="py-3 px-4 font-label-sm text-label-sm text-outline uppercase tracking-wider">Curated Items</th>
<th class="py-3 px-4 font-label-sm text-label-sm text-outline uppercase tracking-wider">Escrow / Amount</th>
<th class="py-3 px-4 font-label-sm text-label-sm text-outline uppercase tracking-wider">Fulfillment Channel</th>
<th class="py-3 px-4 font-label-sm text-label-sm text-outline uppercase tracking-wider">Telemetry Status</th>
<th class="py-3 px-4 font-label-sm text-label-sm text-outline uppercase tracking-wider text-right">Actions</th>
</tr>
</thead>
<tbody class="font-body-sm text-body-sm">
<!-- Row 1 -->
<tr class="hover:bg-surface-container-low/30 transition-colors">
<td class="py-4 px-4">
<span class="font-label-md text-label-md font-semibold text-on-surface">#LV-89241-COL</span>
<p class="text-outline text-xs mt-0.5">Today, 14:28 PM</p>
</td>
<td class="py-4 px-4">
<div class="flex items-center gap-2">
<span class="w-7 h-7 rounded-full bg-secondary-container flex items-center justify-center font-label-sm text-label-sm font-semibold text-on-secondary-container">AS</span>
<div>
<span class="font-label-md text-label-md font-semibold text-on-surface">Madame Ananya Senanayake</span>
<div class="flex items-center gap-1 mt-0.5">
<span class="material-symbols-outlined text-xs text-primary">workspace_premium</span>
<span class="font-label-sm text-label-sm text-primary font-medium">Sovereign Circle</span>
</div>
</div>
</div>
</td>
<td class="py-4 px-4">
<span class="text-on-surface font-medium">Handloom Emerald Saree + Raw Silk Blouse</span>
<p class="text-outline text-xs">2 pieces • Dumbara Atelier</p>
</td>
<td class="py-4 px-4">
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">LKR 50,220</span>
<p class="text-tertiary text-xs">CBSL 256-Bit Escrow</p>
</td>
<td class="py-4 px-4">
<div class="flex items-center gap-1.5 text-on-surface">
<span class="material-symbols-outlined text-base text-primary">directions_car</span>
<span>Mercedes EQV Chauffeur #09</span>
</div>
<p class="text-outline text-xs">Colombo 07 Signature Route</p>
</td>
<td class="py-4 px-4">
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-tertiary-fixed/30 text-on-tertiary-fixed-variant font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-tertiary animate-pulse"></span>
                En Route (Arriving in 12m)
              </span>
</td>
<td class="py-4 px-4 text-right">
<div class="inline-flex items-center gap-1">
<button class="px-2.5 py-1 rounded-full bg-primary-fixed text-on-primary-fixed font-label-sm text-label-sm font-semibold hover:bg-primary-container hover:text-on-primary transition-all">
                  Track Van
                </button>
<button class="p-1 text-outline hover:text-on-surface">
<span class="material-symbols-outlined text-lg">visibility</span>
</button>
</div>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-surface-container-low/30 transition-colors">
<td class="py-4 px-4">
<span class="font-label-md text-label-md font-semibold text-on-surface">#LV-89240-KAN</span>
<p class="text-outline text-xs mt-0.5">Today, 11:15 AM</p>
</td>
<td class="py-4 px-4">
<div class="flex items-center gap-2">
<span class="w-7 h-7 rounded-full bg-primary-fixed flex items-center justify-center font-label-sm text-label-sm font-semibold text-on-primary-fixed">KJ</span>
<div>
<span class="font-label-md text-label-md font-semibold text-on-surface">Dr. Keshini Jayasuriya</span>
<p class="text-outline text-xs">Kandy Heritage Patron</p>
</div>
</div>
</td>
<td class="py-4 px-4">
<span class="text-on-surface font-medium">Unheated Royal Blue Sapphire Teardrop</span>
<p class="text-outline text-xs">1 item • Certificate #RAT-4980</p>
</td>
<td class="py-4 px-4">
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">LKR 185,000</span>
<p class="text-outline text-xs">Koko 3-Split 0% Verified</p>
</td>
<td class="py-4 px-4">
<div class="flex items-center gap-1.5 text-on-surface">
<span class="material-symbols-outlined text-base text-secondary">security</span>
<span>Armored Courier (Security Escort)</span>
</div>
<p class="text-outline text-xs">Direct to Vault-Kandy</p>
</td>
<td class="py-4 px-4">
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-primary-fixed text-on-primary-fixed font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                Vault Sealed (NGJA Cleared)
              </span>
</td>
<td class="py-4 px-4 text-right">
<div class="inline-flex items-center gap-1">
<button class="px-2.5 py-1 rounded-full bg-on-surface text-surface-container-lowest font-label-sm text-label-sm font-semibold hover:bg-on-surface-variant transition-all">
                  Dispatch
                </button>
<button class="p-1 text-outline hover:text-on-surface">
<span class="material-symbols-outlined text-lg">contract</span>
</button>
</div>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-surface-container-low/30 transition-colors">
<td class="py-4 px-4">
<span class="font-label-md text-label-md font-semibold text-on-surface">#LV-89239-GAL</span>
<p class="text-outline text-xs mt-0.5">Today, 09:40 AM</p>
</td>
<td class="py-4 px-4">
<div class="flex items-center gap-2">
<span class="w-7 h-7 rounded-full bg-surface-container-high flex items-center justify-center font-label-sm text-label-sm font-semibold text-on-surface">MS</span>
<div>
<span class="font-label-md text-label-md font-semibold text-on-surface">Hon. Malik Samarawickrama</span>
<div class="flex items-center gap-1 mt-0.5">
<span class="material-symbols-outlined text-xs text-primary">verified</span>
<span class="font-label-sm text-label-sm text-secondary font-medium">Diplomatic List</span>
</div>
</div>
</div>
</td>
<td class="py-4 px-4">
<span class="text-on-surface font-medium">Bespoke Ceylon Linen Safari Jacket</span>
<p class="text-outline text-xs">1 item • Custom Cut Measurements</p>
</td>
<td class="py-4 px-4">
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">LKR 42,800</span>
<p class="text-outline text-xs">Mastercard Sovereign</p>
</td>
<td class="py-4 px-4">
<div class="flex items-center gap-1.5 text-on-surface">
<span class="material-symbols-outlined text-base text-outline">straighten</span>
<span>Bespoke Pinning Session</span>
</div>
<p class="text-outline text-xs">Galle Fort Master Suite</p>
</td>
<td class="py-4 px-4">
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
                Tailor Assigned
              </span>
</td>
<td class="py-4 px-4 text-right">
<div class="inline-flex items-center gap-1">
<button class="px-2.5 py-1 rounded-full bg-surface-container-low text-on-surface font-label-sm text-label-sm font-semibold hover:bg-surface-container transition-all">
                  Spec Sheet
                </button>
<button class="p-1 text-outline hover:text-on-surface">
<span class="material-symbols-outlined text-lg">more_vert</span>
</button>
</div>
</td>
</tr>
<!-- Row 4 -->
<tr class="hover:bg-surface-container-low/30 transition-colors">
<td class="py-4 px-4">
<span class="font-label-md text-label-md font-semibold text-on-surface">#LV-89238-CMB</span>
<p class="text-outline text-xs mt-0.5">Yesterday, 18:22 PM</p>
</td>
<td class="py-4 px-4">
<div class="flex items-center gap-2">
<span class="w-7 h-7 rounded-full bg-surface-container-high flex items-center justify-center font-label-sm text-label-sm font-semibold text-on-surface">AD</span>
<div>
<span class="font-label-md text-label-md font-semibold text-on-surface">Ayesha De Silva</span>
<p class="text-outline text-xs">Colombo Direct</p>
</div>
</div>
</td>
<td class="py-4 px-4">
<span class="text-on-surface font-medium">Dumbara Pit-Loom Wrap Skirt &amp; Ahimsa Silk Top</span>
<p class="text-outline text-xs">2 items • Eco-Loom Collection</p>
</td>
<td class="py-4 px-4">
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">LKR 28,400</span>
<p class="text-outline text-xs">Mintpay Pay-Later</p>
</td>
<td class="py-4 px-4">
<div class="flex items-center gap-1.5 text-on-surface">
<span class="material-symbols-outlined text-base text-outline">local_shipping</span>
<span>Express Same-Day Colombo</span>
</div>
<p class="text-outline text-xs">Atelier Warehouse 02</p>
</td>
<td class="py-4 px-4">
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-container-high text-on-surface-variant font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-outline"></span>
                Preparing Dispatch
              </span>
</td>
<td class="py-4 px-4 text-right">
<div class="inline-flex items-center gap-1">
<button class="px-2.5 py-1 rounded-full bg-surface-container-low text-on-surface font-label-sm text-label-sm font-semibold hover:bg-surface-container transition-all">
                  Print Waybill
                </button>
<button class="p-1 text-outline hover:text-on-surface">
<span class="material-symbols-outlined text-lg">more_vert</span>
</button>
</div>
</td>
</tr>
<!-- Row 5 -->
<tr class="hover:bg-surface-container-low/30 transition-colors">
<td class="py-4 px-4">
<span class="font-label-md text-label-md font-semibold text-on-surface">#LV-89237-JAF</span>
<p class="text-outline text-xs mt-0.5">Yesterday, 15:04 PM</p>
</td>
<td class="py-4 px-4">
<div class="flex items-center gap-2">
<span class="w-7 h-7 rounded-full bg-primary-fixed flex items-center justify-center font-label-sm text-label-sm font-semibold text-on-primary-fixed">TS</span>
<div>
<span class="font-label-md text-label-md font-semibold text-on-surface">T. Sivagurunathan</span>
<p class="text-outline text-xs">Jaffna Peninsula Patron</p>
</div>
</div>
</td>
<td class="py-4 px-4">
<span class="text-on-surface font-medium">Jaffna Hand-Woven Palmyrah Briefcase</span>
<p class="text-outline text-xs">1 item • Northern Artisan Collective</p>
</td>
<td class="py-4 px-4">
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">LKR 36,900</span>
<p class="text-outline text-xs">Visa International Direct</p>
</td>
<td class="py-4 px-4">
<div class="flex items-center gap-1.5 text-on-surface">
<span class="material-symbols-outlined text-base text-primary">flight_takeoff</span>
<span>Islandwide Air Transit</span>
</div>
<p class="text-outline text-xs">Palali - Ratmalana Airlink</p>
</td>
<td class="py-4 px-4">
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-tertiary-fixed/30 text-on-tertiary-fixed-variant font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span>
                In Transit (A5 Corridor)
              </span>
</td>
<td class="py-4 px-4 text-right">
<div class="inline-flex items-center gap-1">
<button class="px-2.5 py-1 rounded-full bg-primary-fixed text-on-primary-fixed font-label-sm text-label-sm font-semibold hover:bg-primary transition-all">
                  View Airway
                </button>
<button class="p-1 text-outline hover:text-on-surface">
<span class="material-symbols-outlined text-lg">more_vert</span>
</button>
</div>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- Bottom Operational Telemetry & Fast Actions Bar -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm mb-space-lg flex flex-col lg:flex-row items-center justify-between gap-space-md">
<!-- Fast Action Triggers -->
<div class="flex flex-wrap items-center gap-space-xs w-full lg:w-auto">
<button class="flex items-center gap-1.5 px-space-md py-2 rounded-full bg-primary text-on-primary font-label-sm text-label-sm font-semibold hover:bg-primary-container transition-all shadow-sm">
<span class="material-symbols-outlined text-base">add</span>
        Add New Curation
      </button>
<button class="flex items-center gap-1.5 px-space-md py-2 rounded-full bg-surface-container-low text-on-surface font-label-sm text-label-sm font-medium hover:bg-surface-container transition-all">
<span class="material-symbols-outlined text-base text-secondary">alt_route</span>
        Fleet Re-route
      </button>
<button class="flex items-center gap-1.5 px-space-md py-2 rounded-full bg-surface-container-low text-on-surface font-label-sm text-label-sm font-medium hover:bg-surface-container transition-all">
<span class="material-symbols-outlined text-base text-primary">sync</span>
        Sync Gem Deeds
      </button>
<button class="flex items-center gap-1.5 px-space-md py-2 rounded-full bg-surface-container-low text-on-surface font-label-sm text-label-sm font-medium hover:bg-surface-container transition-all">
<span class="material-symbols-outlined text-base text-tertiary">receipt</span>
        Daily CBSL Reconciliation
      </button>
</div>
<!-- Live System Telemetry Status -->
<div class="flex flex-wrap items-center gap-space-md w-full lg:w-auto text-label-sm font-label-sm text-outline border-t lg:border-t-0 pt-2 lg:pt-0">
<div class="flex items-center gap-1.5">
<span class="w-2 h-2 rounded-full bg-tertiary"></span>
<span>CBSL Gateway: <strong class="text-on-surface">99.98%</strong></span>
</div>
<div class="flex items-center gap-1.5">
<span class="w-2 h-2 rounded-full bg-primary"></span>
<span>Escrow Node: <strong class="text-on-surface">#812,941</strong></span>
</div>
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-sm text-secondary">thermostat</span>
<span>Colombo Vault: <strong class="text-on-surface">21.8°C / 45% Hum</strong></span>
</div>
</div>
</div>
</div></main></div></body></html>




