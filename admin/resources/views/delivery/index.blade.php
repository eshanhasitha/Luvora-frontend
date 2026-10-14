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
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/><title>Delivery Overview | Luvora Admin</title></head><body class="bg-surface text-on-surface"><aside class="fixed left-0 top-0 h-full w-72 bg-surface-container-lowest z-50 flex flex-col shadow-[0_1px_8px_rgba(0,0,0,0.04)]"><div class="h-20 px-space-md flex items-center justify-between bg-surface-container-lowest"><div class="flex items-center gap-space-sm"><img alt="Luvora Crest" class="h-8 w-auto object-contain" src="https://lh3.googleusercontent.com/aida/AEtjO1W34tid3ShkuS9nNFPU9jvlqzpxl1NJD_wF7ZNkn3yExkUTkBFJ3ypCIui4c6lG1RUcbFOCsyY5_tbLFD_tJP51TjqHne263g9Nbi7ZIkZYJu2-5uK5Ass7lGl5Z1Um2SbV7etW_eu_1lD93w2ZnsWCgVsj3ups1XmIIDFec2pV6RKjXdA3QAJn2CdrTLOQJbPVBq-2nWv7rURXGhRBOt4qnwfjvFiXSYTwwtKiW7-4b3CHRdUEuqlfMzA"/><div class="flex flex-col"><span class="font-headline-md text-headline-md leading-none text-on-surface tracking-tight">LUVORA</span><span class="font-label-sm text-label-sm text-secondary uppercase tracking-widest mt-1">Executive Portal</span></div></div><div class="h-2 w-2 rounded-full bg-primary animate-pulse"></div></div><div class="flex-1 overflow-y-auto px-space-sm py-space-sm space-y-space-md"><nav class="space-y-space-xs" data-active-classes="bg-primary-container text-on-primary-container font-semibold rounded-lg"><p class="px-space-sm text-[10px] font-label-sm uppercase tracking-wider text-outline">Dashboard</p><a class="flex items-center px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="overview" href="{{ route('dashboard') }}">Overview</a><a class="flex items-center px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="analytics" href="#">Analytics</a></nav><nav class="space-y-space-xs" data-active-classes="bg-primary-container text-on-primary-container font-semibold rounded-lg"><p class="px-space-sm text-[10px] font-label-sm uppercase tracking-wider text-outline">Catalog &amp; Products</p><a class="flex items-center px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="all-products" href="{{ route('products.index') }}">All Products</a><a class="flex items-center px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="add-product" href="#">Add Product</a><a class="flex items-center px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="categories" href="#">Categories</a><a class="flex items-center px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="inventory-stock-alerts" href="{{ route('inventory.index') }}">Inventory &amp; Stock Alerts</a></nav><nav class="space-y-space-xs" data-active-classes="bg-primary-container text-on-primary-container font-semibold rounded-lg"><p class="px-space-sm text-[10px] font-label-sm uppercase tracking-wider text-outline">Orders &amp; Escrow</p><a class="flex items-center px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="all-orders" href="{{ route('orders.index') }}">All Orders</a><a class="flex items-center px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="live-dispatches" href="{{ route('delivery.index') }}">Live Dispatches</a><a class="flex items-center px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="tailor-fittings" href="#">Tailor Fittings</a><a class="flex items-center px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="gem-escrow-vault" href="#">Gem Escrow Vault</a></nav><nav class="space-y-space-xs" data-active-classes="bg-primary-container text-on-primary-container font-semibold rounded-lg"><div class="flex items-center justify-between px-space-sm"><p class="text-[10px] font-label-sm uppercase tracking-wider text-primary font-semibold">CUSTOMERS &amp; VIP PATRONS</p><span class="h-1.5 w-1.5 rounded-full bg-primary"></span></div><div class="space-y-space-xs pt-1"><a class="flex items-center px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="all-customers" href="{{ route('customers.index') }}">All Customers</a><a class="flex items-center px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="sovereign-circle" href="#">Sovereign Circle</a><a class="flex items-center px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="customer-profile-fitting-dossier" href="#">Customer Profile &amp; Fitting Dossier</a><a class="flex items-center px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="reviews-feedback" href="#">Reviews &amp; Feedback</a></div></nav><nav class="space-y-space-xs" data-active-classes="bg-primary-container text-on-primary-container font-semibold rounded-lg"><p class="px-space-sm text-[10px] font-label-sm uppercase tracking-wider text-outline">Artisans &amp; Logistics</p><a class="flex items-center px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="dumbara-weavers" href="#">Dumbara Weavers</a><a class="flex items-center px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="ratnapura-cutters" href="#">Ratnapura Cutters</a><a class="flex items-center px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="logistics-chauffeurs" href="{{ route('delivery.index') }}">Logistics &amp; Chauffeurs</a><a class="flex items-center px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="system-settings" href="#">System &amp; Settings</a></nav></div><div class="p-space-sm bg-surface-container-low"><div class="flex items-center gap-space-sm bg-surface-container-lowest p-space-sm rounded-lg shadow-[0_1px_8px_rgba(0,0,0,0.04)]"><img alt="Madame Ananya Senanayake" class="w-9 h-9 rounded-full object-cover" src="https://lh3.googleusercontent.com/aida/AEtjO1VFWU_GemsQx8cSzOYAsoVP_9cEdrpUqslJQQL6HcvH6tnQQUZH9spBXLTcEkOtQVB6L35GDLTOrFyNmi6JukLXq2V3LnG2KzqeFII76YPM_uCQ7T7vZGDR3Z3RjVrfg2Mxi-ZxSUxOE3nJbwalj6Y0AH5yKf9B2cGUhF76M8UgwPBgkMgmt-mt3MhLrfKCw8zvMCuPM6gq6npc6wvKAso3TFAhDDH3g7QHdk0CTiDCQh_OGzL32MBplaQ"/><div class="flex flex-col min-w-0"><span class="font-label-md text-label-md text-on-surface font-semibold truncate">Madame Ananya Senanayake</span><span class="font-label-sm text-label-sm text-primary truncate">Executive Director</span></div></div></div></aside><div class="pl-72"><header class="fixed top-0 left-72 right-0 h-20 bg-surface/80 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)] z-40 px-gutter-lg flex items-center justify-between"><div class="flex items-center gap-space-md flex-1 max-w-2xl"><div class="flex items-center gap-space-xs bg-surface-container-low px-space-sm py-2 rounded-full cursor-pointer hover:bg-surface-container transition-all"><span class="material-symbols-outlined text-base text-primary">storefront</span><span class="font-label-sm text-label-sm text-on-surface font-semibold">Colombo 07 Flagship</span><span class="material-symbols-outlined text-sm text-outline">expand_more</span></div><div class="relative flex-1"><span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-lg">search</span><input class="w-full bg-surface-container-lowest pl-10 pr-4 py-2 rounded-full font-body-sm text-body-sm text-on-surface placeholder:text-outline focus:outline-none shadow-[0_1px_3px_0_rgba(15,23,42,0.04)]" placeholder="Search SKUs, high jewelry orders, sovereign patrons..." type="text"/></div></div><div class="flex items-center gap-space-md"><div class="flex items-center gap-space-xs bg-tertiary-fixed/30 px-space-sm py-1.5 rounded-full"><span class="h-2 w-2 rounded-full bg-tertiary animate-pulse"></span><span class="font-label-sm text-label-sm text-on-tertiary-fixed-variant font-medium">CBSL Escrow Synchronized</span></div><button class="relative p-2 rounded-full bg-surface-container-lowest text-on-surface-variant hover:text-on-surface shadow-[0_1px_3px_0_rgba(15,23,42,0.04)] transition-all"><span class="material-symbols-outlined text-xl">notifications</span><span class="absolute top-1 right-1 h-2 w-2 rounded-full bg-error"></span></button><div class="flex items-center gap-space-sm pl-space-xs"><img alt="Madame Ananya Senanayake" class="w-9 h-9 rounded-full object-cover" src="https://lh3.googleusercontent.com/aida/AEtjO1VFWU_GemsQx8cSzOYAsoVP_9cEdrpUqslJQQL6HcvH6tnQQUZH9spBXLTcEkOtQVB6L35GDLTOrFyNmi6JukLXq2V3LnG2KzqeFII76YPM_uCQ7T7vZGDR3Z3RjVrfg2Mxi-ZxSUxOE3nJbwalj6Y0AH5yKf9B2cGUhF76M8UgwPBgkMgmt-mt3MhLrfKCw8zvMCuPM6gq6npc6wvKAso3TFAhDDH3g7QHdk0CTiDCQh_OGzL32MBplaQ"/><div class="hidden xl:flex flex-col text-right min-w-0"><span class="font-label-md text-label-md text-on-surface font-medium truncate">Madame Ananya Senanayake</span><span class="font-label-sm text-label-sm text-secondary truncate">Executive Director</span></div></div></div></header><main class="w-full pt-20 px-gutter-lg bg-surface min-h-screen"><div class="flex flex-col w-full pb-space-xl">
<!-- Top Breadcrumb & Live Node Bar -->
<div class="flex flex-wrap items-center justify-between gap-space-sm mb-space-md">
<div class="flex items-center gap-space-xs text-secondary font-label-md text-label-md">
<span>Executive Portal</span>
<span class="material-symbols-outlined text-xs">chevron_right</span>
<span>Artisans &amp; Logistics</span>
<span class="material-symbols-outlined text-xs">chevron_right</span>
<span class="text-on-surface font-semibold">Deliveries &amp; Fleet Telemetry</span>
</div>
<div class="flex items-center gap-space-md">
<div class="flex items-center gap-space-xs bg-surface-container-lowest px-space-sm py-1 rounded-full shadow-sm">
<span class="h-2 w-2 rounded-full bg-tertiary animate-pulse"></span>
<span class="font-label-sm text-label-sm text-on-surface-variant font-medium">5G Fleet Telematics Live (14 Mercedes EQVs)</span>
</div>
<div class="flex items-center gap-space-xs bg-surface-container-lowest px-space-sm py-1 rounded-full shadow-sm">
<span class="material-symbols-outlined text-sm text-primary">verified_user</span>
<span class="font-label-sm text-label-sm text-on-surface-variant font-medium">NTC &amp; CBSL Escrow Active</span>
</div>
</div>
</div>
<!-- Executive Header & Quick Actions -->
<div class="flex flex-col lg:flex-row lg:items-end justify-between gap-space-md mb-space-lg">
<div class="max-w-3xl">
<div class="flex items-center gap-space-xs mb-1">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-semibold">Colombo 07 Flagship Hub</span>
<span class="text-outline">/</span>
<span class="font-label-sm text-label-sm text-secondary font-medium">Mobile Salon Telematics Node</span>
</div>
<h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight leading-none">Deliveries &amp; White-Glove Fleet Operations</h1>
<p class="font-body-md text-body-md text-on-surface-variant mt-2">Live orchestration of Colombo 07 Mercedes EQV mobile salon vans, chauffeur assignments, security gate clearances, and doorstep fitting telemetry.</p>
</div>
<div class="flex items-center gap-space-sm flex-wrap">
<button class="flex items-center gap-space-xs px-space-md py-2.5 rounded-full bg-surface-container-lowest hover:bg-surface-container-high text-on-surface font-label-md text-label-md shadow-sm transition-all" onclick="document.getElementById('reassign-modal').classList.remove('hidden')">
<span class="material-symbols-outlined text-base">swap_horiz</span>
<span>Reassignment Pool</span>
</button>
<button class="flex items-center gap-space-xs px-space-md py-2.5 rounded-full bg-surface-container-lowest hover:bg-surface-container-high text-on-surface font-label-md text-label-md shadow-sm transition-all">
<span class="material-symbols-outlined text-base">assignment</span>
<span>Manifest &amp; Roster</span>
</button>
<button class="flex items-center gap-space-xs px-space-md py-2.5 rounded-full bg-primary hover:bg-primary-container text-on-primary font-label-md text-label-md shadow-sm transition-all">
<span class="material-symbols-outlined text-base">electric_car</span>
<span>+ Dispatch On-Demand Van</span>
</button>
</div>
</div>
<!-- Telemetry KPI Strip (4 Live Logistics Metric Cards) -->
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-space-md mb-space-lg">
<!-- KPI 1 -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm relative overflow-hidden flex flex-col justify-between">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-outline">Active Dispatches</span>
<div class="h-8 w-8 rounded-full bg-primary-fixed flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-base">directions_car</span>
</div>
</div>
<div class="mt-space-sm">
<div class="flex items-baseline gap-2">
<span class="font-headline-md text-headline-md text-on-surface">14 EQV Vans</span>
<span class="font-label-sm text-label-sm text-tertiary font-semibold flex items-center">
<span class="material-symbols-outlined text-xs">arrow_upward</span>Live
          </span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">8 In-Transit • 4 At Sanctuary • 2 Returning</p>
</div>
<div class="mt-space-sm pt-space-xs bg-surface-container-low rounded-lg p-2 flex items-center justify-between text-on-surface-variant font-label-sm text-label-sm">
<span>Battery Fleet Avg: <strong class="text-on-surface">86%</strong></span>
<span class="text-primary font-medium">9.4 kWh/100km</span>
</div>
</div>
<!-- KPI 2 -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm relative overflow-hidden flex flex-col justify-between">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-outline">Chauffeur &amp; Agent Fleet</span>
<div class="h-8 w-8 rounded-full bg-secondary-container flex items-center justify-center text-secondary">
<span class="material-symbols-outlined text-base">badge</span>
</div>
</div>
<div class="mt-space-sm">
<div class="flex items-baseline gap-2">
<span class="font-headline-md text-headline-md text-on-surface">18 Chauffeurs</span>
<span class="font-label-sm text-label-sm text-primary font-semibold">100% Vetted</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">14 Deployed • 4 Standby at Ward Place Hub</p>
</div>
<div class="mt-space-sm pt-space-xs bg-surface-container-low rounded-lg p-2 flex items-center justify-between text-on-surface-variant font-label-sm text-label-sm">
<span>Security Cleared: <strong class="text-tertiary">All 18</strong></span>
<span class="text-secondary font-medium">Dual-Key Protocol</span>
</div>
</div>
<!-- KPI 3 -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm relative overflow-hidden flex flex-col justify-between">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-outline">On-Time Arrival SLA</span>
<div class="h-8 w-8 rounded-full bg-tertiary-fixed flex items-center justify-center text-tertiary">
<span class="material-symbols-outlined text-base">timer</span>
</div>
</div>
<div class="mt-space-sm">
<div class="flex items-baseline gap-2">
<span class="font-headline-md text-headline-md text-on-surface">99.4%</span>
<span class="font-label-sm text-label-sm text-tertiary font-semibold flex items-center">
<span class="material-symbols-outlined text-xs">trending_up</span>+0.3%
          </span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Avg 26 mins Colombo 07 &amp; Diplomatic Zone</p>
</div>
<div class="mt-space-sm pt-space-xs bg-surface-container-low rounded-lg p-2 flex items-center justify-between text-on-surface-variant font-label-sm text-label-sm">
<span>Peak Traffic Delay: <strong class="text-on-surface">1.2m</strong></span>
<span class="text-tertiary font-medium">Dynamic Routing</span>
</div>
</div>
<!-- KPI 4 -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm relative overflow-hidden flex flex-col justify-between">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-outline">Patron Delivery Rating</span>
<div class="h-8 w-8 rounded-full bg-surface-container-high flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-base">hotel_class</span>
</div>
</div>
<div class="mt-space-sm">
<div class="flex items-baseline gap-2">
<span class="font-headline-md text-headline-md text-on-surface">4.98 / 5.0</span>
<span class="font-label-sm text-label-sm text-primary font-semibold">840 Reviews</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Doorstep Fitting &amp; Discreet Gate Verification</p>
</div>
<div class="mt-space-sm pt-space-xs bg-surface-container-low rounded-lg p-2 flex items-center justify-between text-on-surface-variant font-label-sm text-label-sm">
<span>Interior Cleanliness: <strong class="text-on-surface">100%</strong></span>
<span class="text-primary font-medium">Chilled Salons</span>
</div>
</div>
</div>
<!-- Search & Operational Filter Toolbar -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm mb-space-md flex flex-col gap-space-md">
<div class="flex flex-col lg:flex-row items-center justify-between gap-space-sm">
<div class="relative w-full lg:w-96">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-base">search</span>
<input class="w-full bg-surface-container-low pl-9 pr-4 py-2 rounded-lg font-body-sm text-body-sm text-on-surface placeholder:text-outline focus:outline-none" placeholder="Search by Order ID, Chauffeur Agent, Patron, Sanctuary, License..." type="text"/>
</div>
<div class="flex items-center gap-space-xs flex-wrap w-full lg:w-auto justify-start lg:justify-end">
<div class="flex items-center gap-1 bg-surface-container-low px-3 py-1.5 rounded-lg text-on-surface-variant font-label-sm text-label-sm">
<span>Agent:</span>
<select class="bg-transparent font-semibold text-on-surface focus:outline-none">
<option>All Chauffeur Agents</option>
<option>Agent Sunil Bandara</option>
<option>Agent Kanishka Perera</option>
<option>Agent Gamini Ratnayake</option>
</select>
</div>
<div class="flex items-center gap-1 bg-surface-container-low px-3 py-1.5 rounded-lg text-on-surface-variant font-label-sm text-label-sm">
<span>Fleet:</span>
<select class="bg-transparent font-semibold text-on-surface focus:outline-none">
<option>All Vehicles (EQV / Armored / Aero)</option>
<option>Mercedes EQV Electric</option>
<option>Armored Vault Transport</option>
<option>FitsAir Aero Courier</option>
</select>
</div>
<div class="flex items-center gap-1 bg-surface-container-low px-3 py-1.5 rounded-lg text-on-surface-variant font-label-sm text-label-sm">
<span>Sanctuary Zone:</span>
<select class="bg-transparent font-semibold text-on-surface focus:outline-none">
<option>All Zones (Colombo 07 / Galle Face / Outstation)</option>
<option>Cinnamon Gardens (07)</option>
<option>Kollupitiya (03)</option>
<option>Jaffna Northern Transit</option>
</select>
</div>
</div>
</div>
<!-- Status Tabs -->
<div class="flex items-center gap-space-xs overflow-x-auto pb-1 text-label-sm font-label-sm">
<button class="px-3 py-1.5 rounded-full bg-primary text-on-primary font-semibold flex items-center gap-1.5 whitespace-nowrap">
<span>All Deliveries</span>
<span class="bg-primary-container text-on-primary text-[10px] px-1.5 py-0.5 rounded-full font-bold">38</span>
</button>
<button class="px-3 py-1.5 rounded-full bg-surface-container-low hover:bg-surface-container text-on-surface-variant flex items-center gap-1.5 whitespace-nowrap">
<span>En Route</span>
<span class="bg-secondary-fixed text-on-secondary-fixed text-[10px] px-1.5 py-0.5 rounded-full font-bold">14</span>
</button>
<button class="px-3 py-1.5 rounded-full bg-surface-container-low hover:bg-surface-container text-on-surface-variant flex items-center gap-1.5 whitespace-nowrap">
<span>At Patron Sanctuary</span>
<span class="bg-tertiary-fixed text-on-tertiary-fixed text-[10px] px-1.5 py-0.5 rounded-full font-bold">8</span>
</button>
<button class="px-3 py-1.5 rounded-full bg-surface-container-low hover:bg-surface-container text-on-surface-variant flex items-center gap-1.5 whitespace-nowrap">
<span>Awaiting Gate Clearance</span>
<span class="bg-secondary-container text-on-secondary-container text-[10px] px-1.5 py-0.5 rounded-full font-bold">4</span>
</button>
<button class="px-3 py-1.5 rounded-full bg-surface-container-low hover:bg-surface-container text-on-surface-variant flex items-center gap-1.5 whitespace-nowrap">
<span>Completed Today</span>
<span class="bg-surface-container-high text-on-surface text-[10px] px-1.5 py-0.5 rounded-full font-bold">82</span>
</button>
<button class="px-3 py-1.5 rounded-full bg-error-container text-on-error-container flex items-center gap-1.5 whitespace-nowrap font-semibold">
<span class="material-symbols-outlined text-xs">warning</span>
<span>Delayed / Alert</span>
<span class="bg-error text-on-error text-[10px] px-1.5 py-0.5 rounded-full font-bold">1</span>
</button>
</div>
</div>
<!-- Deliveries Master Roster & Dispatch Table -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm overflow-hidden mb-space-lg">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low text-on-surface-variant font-label-sm text-label-sm uppercase tracking-wider">
<th class="py-3 px-space-md">Delivery &amp; Order Ref</th>
<th class="py-3 px-space-md">Patron &amp; Sanctuary</th>
<th class="py-3 px-space-md">Assigned Chauffeur &amp; Van</th>
<th class="py-3 px-space-md">Live Telemetry &amp; ETA</th>
<th class="py-3 px-space-md">Package &amp; Security Protocol</th>
<th class="py-3 px-space-md">Review</th>
<th class="py-3 px-space-md text-right">Actions &amp; Reassign</th>
</tr>
</thead>
<tbody class="divide-y-0 text-body-sm font-body-sm">
<!-- Row 1 -->
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="py-4 px-space-md align-top">
<div class="flex flex-col">
<span class="font-semibold text-primary">#DEL-8821</span>
<span class="text-secondary font-mono text-[11px]">#LUV-OR-9912</span>
<span class="inline-flex items-center gap-1 mt-1 text-[10px] text-tertiary font-semibold uppercase">
<span class="h-1.5 w-1.5 rounded-full bg-tertiary"></span> VIP Doorstep
                </span>
</div>
</td>
<td class="py-4 px-space-md align-top">
<div class="flex flex-col">
<span class="font-semibold text-on-surface">Lady Sharanya Wickramasinghe</span>
<span class="text-on-surface-variant text-xs mt-0.5">Horton Place Residence, Cinnamon Gardens, Colombo 07</span>
<span class="text-[11px] text-outline mt-1 flex items-center gap-1">
<span class="material-symbols-outlined text-xs text-primary">verified</span> Sovereign Circle Patrone
                </span>
</div>
</td>
<td class="py-4 px-space-md align-top">
<div class="flex items-start gap-space-xs">
<div class="h-7 w-7 rounded-full bg-surface-container flex items-center justify-center text-primary font-semibold text-xs shrink-0">SB</div>
<div class="flex flex-col min-w-0">
<span class="font-semibold text-on-surface truncate">Agent Sunil Bandara</span>
<span class="text-[11px] text-secondary">Mercedes EQV #09 (WP-CAR-8819)</span>
<span class="text-[10px] text-tertiary font-medium mt-0.5">Senior Master • 840 Runs (5.0★)</span>
</div>
</div>
</td>
<td class="py-4 px-space-md align-top">
<div class="flex flex-col">
<div class="inline-flex items-center gap-1.5 bg-secondary-fixed/50 text-on-secondary-fixed px-2 py-0.5 rounded-full text-xs font-semibold w-fit">
<span class="h-2 w-2 rounded-full bg-primary animate-pulse"></span>
                  En Route • 11m
                </div>
<span class="text-[11px] text-on-surface-variant mt-1.5">Speed: 34 km/h • Albert Crescent</span>
<div class="flex items-center gap-1.5 text-[10px] text-outline mt-0.5">
<span class="material-symbols-outlined text-xs text-tertiary">battery_charging_full</span>
<span>88% Battery • AC 21°C</span>
</div>
</div>
</td>
<td class="py-4 px-space-md align-top">
<div class="flex flex-col">
<span class="text-on-surface font-medium">Emerald Raw Silk Saree</span>
<span class="text-xs text-on-surface-variant">+ Bespoke Scented Sachet</span>
<div class="inline-flex items-center gap-1 text-[11px] text-tertiary mt-1">
<span class="material-symbols-outlined text-xs">lock_open</span>
<span>Gate 2 Pre-Cleared (Off. Dharmasena)</span>
</div>
</div>
</td>
<td class="py-4 px-space-md align-top">
<div class="flex flex-col">
<div class="flex items-center text-primary text-xs font-semibold">
<span class="material-symbols-outlined text-xs" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="ml-1">5.0</span>
</div>
<span class="text-[11px] text-outline italic line-clamp-2 mt-0.5">"Discreet gate ping and salon temp"</span>
</div>
</td>
<td class="py-4 px-space-md align-top text-right">
<div class="flex items-center justify-end gap-1">
<button class="p-1.5 rounded-lg hover:bg-surface-container text-on-surface-variant hover:text-primary transition-all" title="Radio Chauffeur">
<span class="material-symbols-outlined text-base">radio</span>
</button>
<button class="p-1.5 rounded-lg hover:bg-surface-container text-on-surface-variant hover:text-primary transition-all" onclick="document.getElementById('reassign-modal').classList.remove('hidden')" title="Reassign Agent">
<span class="material-symbols-outlined text-base">swap_horiz</span>
</button>
<button class="p-1.5 rounded-lg hover:bg-surface-container text-on-surface-variant hover:text-primary transition-all" title="View Dossier">
<span class="material-symbols-outlined text-base">visibility</span>
</button>
</div>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="py-4 px-space-md align-top">
<div class="flex flex-col">
<span class="font-semibold text-primary">#DEL-8819</span>
<span class="text-secondary font-mono text-[11px]">#LUV-OR-9884</span>
<span class="inline-flex items-center gap-1 mt-1 text-[10px] text-primary font-semibold uppercase">
<span class="h-1.5 w-1.5 rounded-full bg-primary"></span> Tailor On-Board
                </span>
</div>
</td>
<td class="py-4 px-space-md align-top">
<div class="flex flex-col">
<span class="font-semibold text-on-surface">Hon. Priyantha Fonseka</span>
<span class="text-on-surface-variant text-xs mt-0.5">Cinnamon Gardens Sanctuary, Colombo 07</span>
<span class="text-[11px] text-outline mt-1 flex items-center gap-1">
<span class="material-symbols-outlined text-xs text-secondary">business_center</span> Diplomatic Protocol
                </span>
</div>
</td>
<td class="py-4 px-space-md align-top">
<div class="flex items-start gap-space-xs">
<div class="h-7 w-7 rounded-full bg-surface-container flex items-center justify-center text-primary font-semibold text-xs shrink-0">KP</div>
<div class="flex flex-col min-w-0">
<span class="font-semibold text-on-surface truncate">Agent Kanishka Perera</span>
<span class="text-[11px] text-secondary">Mercedes EQV #04 (WP-CAR-7741)</span>
<span class="text-[10px] text-secondary font-medium mt-0.5">VIP Concierge Escort • 4.95★</span>
</div>
</div>
</td>
<td class="py-4 px-space-md align-top">
<div class="flex flex-col">
<div class="inline-flex items-center gap-1.5 bg-tertiary-fixed text-on-tertiary-fixed px-2 py-0.5 rounded-full text-xs font-semibold w-fit">
<span class="h-2 w-2 rounded-full bg-tertiary"></span>
                  At Sanctuary • Fitting
                </div>
<span class="text-[11px] text-on-surface-variant mt-1.5">Private Driveway • 24m remaining</span>
<div class="flex items-center gap-1.5 text-[10px] text-outline mt-0.5">
<span class="material-symbols-outlined text-xs text-primary">straighten</span>
<span>Master Tailor Sunil Appu active</span>
</div>
</div>
</td>
<td class="py-4 px-space-md align-top">
<div class="flex flex-col">
<span class="text-on-surface font-medium">Ceylon Linen Safari Jacket</span>
<span class="text-xs text-on-surface-variant">+ Hand-spun Silk Sarong</span>
<div class="inline-flex items-center gap-1 text-[11px] text-outline mt-1">
<span class="material-symbols-outlined text-xs">pin_drop</span>
<span>Pinning in Mobile Dressing Room</span>
</div>
</div>
</td>
<td class="py-4 px-space-md align-top">
<div class="flex flex-col">
<div class="flex items-center text-primary text-xs font-semibold">
<span class="material-symbols-outlined text-xs" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="ml-1">4.9</span>
</div>
<span class="text-[11px] text-outline italic line-clamp-2 mt-0.5">"Tailor had exact measurements"</span>
</div>
</td>
<td class="py-4 px-space-md align-top text-right">
<div class="flex items-center justify-end gap-1">
<button class="p-1.5 rounded-lg hover:bg-surface-container text-on-surface-variant hover:text-primary transition-all" title="Extend Fitting Session">
<span class="material-symbols-outlined text-base">more_time</span>
</button>
<button class="p-1.5 rounded-lg hover:bg-surface-container text-on-surface-variant hover:text-primary transition-all" onclick="document.getElementById('reassign-modal').classList.remove('hidden')" title="Reassign Agent">
<span class="material-symbols-outlined text-base">swap_horiz</span>
</button>
<button class="p-1.5 rounded-lg hover:bg-surface-container text-on-surface-variant hover:text-primary transition-all" title="Fitting Telemetry Log">
<span class="material-symbols-outlined text-base">receipt_long</span>
</button>
</div>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="py-4 px-space-md align-top">
<div class="flex flex-col">
<span class="font-semibold text-primary">#DEL-8815</span>
<span class="text-secondary font-mono text-[11px]">#LUV-OR-9875</span>
<span class="inline-flex items-center gap-1 mt-1 text-[10px] text-error font-semibold uppercase">
<span class="h-1.5 w-1.5 rounded-full bg-error animate-pulse"></span> CBSL Vault Escrow
                </span>
</div>
</td>
<td class="py-4 px-space-md align-top">
<div class="flex flex-col">
<span class="font-semibold text-on-surface">Dr. Radhika Senanayake</span>
<span class="text-on-surface-variant text-xs mt-0.5">Ward Place Residence, Colombo 07</span>
<span class="text-[11px] text-outline mt-1 flex items-center gap-1">
<span class="material-symbols-outlined text-xs text-tertiary">diamond</span> High Jewelry Custody
                </span>
</div>
</td>
<td class="py-4 px-space-md align-top">
<div class="flex items-start gap-space-xs">
<div class="h-7 w-7 rounded-full bg-surface-container flex items-center justify-center text-primary font-semibold text-xs shrink-0">GR</div>
<div class="flex flex-col min-w-0">
<span class="font-semibold text-on-surface truncate">Agent Gamini Ratnayake</span>
<span class="text-[11px] text-secondary">Armored Secure Unit #01</span>
<span class="text-[10px] text-error font-medium mt-0.5">Armed Security Lead • 5.0★</span>
</div>
</div>
</td>
<td class="py-4 px-space-md align-top">
<div class="flex flex-col">
<div class="inline-flex items-center gap-1.5 bg-error-container text-on-error-container px-2 py-0.5 rounded-full text-xs font-semibold w-fit">
<span class="h-2 w-2 rounded-full bg-error"></span>
                  Vault Sealed Transit
                </div>
<span class="text-[11px] text-on-surface-variant mt-1.5">Dual-Custody Key Protocol</span>
<div class="flex items-center gap-1.5 text-[10px] text-outline mt-0.5">
<span class="material-symbols-outlined text-xs text-secondary">security</span>
<span>CBSL Escrow Locked</span>
</div>
</div>
</td>
<td class="py-4 px-space-md align-top">
<div class="flex flex-col">
<span class="text-on-surface font-medium">Ratnapura Royal Sapphire (4.2ct)</span>
<span class="text-xs text-on-surface-variant">Unheated + Provenance Deed</span>
<div class="inline-flex items-center gap-1 text-[11px] text-error mt-1">
<span class="material-symbols-outlined text-xs">fingerprint</span>
<span>Biometric Escrow Handover</span>
</div>
</div>
</td>
<td class="py-4 px-space-md align-top">
<div class="flex flex-col">
<div class="flex items-center text-primary text-xs font-semibold">
<span class="material-symbols-outlined text-xs" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="ml-1">5.0</span>
</div>
<span class="text-[11px] text-outline italic line-clamp-2 mt-0.5">"High security respectful handover"</span>
</div>
</td>
<td class="py-4 px-space-md align-top text-right">
<div class="flex items-center justify-end gap-1">
<button class="p-1.5 rounded-lg hover:bg-surface-container text-on-surface-variant hover:text-primary transition-all" title="Audit Keypair Hash">
<span class="material-symbols-outlined text-base">vpn_key</span>
</button>
<button class="p-1.5 rounded-lg hover:bg-surface-container text-on-surface-variant hover:text-error transition-all" title="Emergency Telemetry">
<span class="material-symbols-outlined text-base">fmd_bad</span>
</button>
<button class="p-1.5 rounded-lg hover:bg-surface-container text-on-surface-variant hover:text-primary transition-all" title="Secure Vault Dossier">
<span class="material-symbols-outlined text-base">verified</span>
</button>
</div>
</td>
</tr>
<!-- Row 4 -->
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="py-4 px-space-md align-top">
<div class="flex flex-col">
<span class="font-semibold text-primary">#DEL-8808</span>
<span class="text-secondary font-mono text-[11px]">#LUV-OR-9860</span>
<span class="inline-flex items-center gap-1 mt-1 text-[10px] text-secondary font-semibold uppercase">
<span class="h-1.5 w-1.5 rounded-full bg-secondary"></span> Standard Courier
                </span>
</div>
</td>
<td class="py-4 px-space-md align-top">
<div class="flex flex-col">
<span class="font-semibold text-on-surface">Ayesha De Silva</span>
<span class="text-on-surface-variant text-xs mt-0.5">Marine Drive Penthouse, Kollupitiya, Colombo 03</span>
<span class="text-[11px] text-outline mt-1 flex items-center gap-1">
<span class="material-symbols-outlined text-xs text-primary">apartment</span> Residential Gatehouse
                </span>
</div>
</td>
<td class="py-4 px-space-md align-top">
<div class="flex items-start gap-space-xs">
<div class="h-7 w-7 rounded-full bg-surface-container flex items-center justify-center text-primary font-semibold text-xs shrink-0">RM</div>
<div class="flex flex-col min-w-0">
<span class="font-semibold text-on-surface truncate">Agent Roshan Mendis</span>
<span class="text-[11px] text-secondary">Electric Dispatch Sprinter #02</span>
<span class="text-[10px] text-secondary font-medium mt-0.5">Courier Specialist • 4.9★</span>
</div>
</div>
</td>
<td class="py-4 px-space-md align-top">
<div class="flex flex-col">
<div class="inline-flex items-center gap-1.5 bg-secondary-container text-on-secondary-container px-2 py-0.5 rounded-full text-xs font-semibold w-fit">
<span class="h-2 w-2 rounded-full bg-secondary"></span>
                  Gate Clearance
                </div>
<span class="text-[11px] text-on-surface-variant mt-1.5">Intercom Verification in Progress</span>
<div class="flex items-center gap-1.5 text-[10px] text-outline mt-0.5">
<span class="material-symbols-outlined text-xs text-outline">call</span>
<span>Gatehouse Ringing (3m delay)</span>
</div>
</div>
</td>
<td class="py-4 px-space-md align-top">
<div class="flex flex-col">
<span class="text-on-surface font-medium">Hand-carved Minaudière</span>
<span class="text-xs text-on-surface-variant">Palmyrah Artisan Eco-Box</span>
<div class="inline-flex items-center gap-1 text-[11px] text-secondary mt-1">
<span class="material-symbols-outlined text-xs">shield</span>
<span>Standard White-Glove Seal</span>
</div>
</div>
</td>
<td class="py-4 px-space-md align-top">
<div class="flex flex-col">
<div class="flex items-center text-primary text-xs font-semibold">
<span class="material-symbols-outlined text-xs" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="ml-1">4.9</span>
</div>
<span class="text-[11px] text-outline italic line-clamp-2 mt-0.5">"Delicate artisan packaging pristine"</span>
</div>
</td>
<td class="py-4 px-space-md align-top text-right">
<div class="flex items-center justify-end gap-1">
<button class="p-1.5 rounded-lg hover:bg-surface-container text-on-surface-variant hover:text-primary transition-all" title="Call Gatehouse">
<span class="material-symbols-outlined text-base">phone_in_talk</span>
</button>
<button class="p-1.5 rounded-lg hover:bg-surface-container text-on-surface-variant hover:text-primary transition-all" onclick="document.getElementById('reassign-modal').classList.remove('hidden')" title="Reassign Chauffeur">
<span class="material-symbols-outlined text-base">swap_horiz</span>
</button>
<button class="p-1.5 rounded-lg hover:bg-surface-container text-on-surface-variant hover:text-primary transition-all" title="Bypass Gate Note">
<span class="material-symbols-outlined text-base">security_update_good</span>
</button>
</div>
</td>
</tr>
<!-- Row 5 -->
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="py-4 px-space-md align-top">
<div class="flex flex-col">
<span class="font-semibold text-primary">#DEL-8802</span>
<span class="text-secondary font-mono text-[11px]">#LUV-OR-9852</span>
<span class="inline-flex items-center gap-1 mt-1 text-[10px] text-tertiary font-semibold uppercase">
<span class="h-1.5 w-1.5 rounded-full bg-tertiary"></span> Northern Air-Link
                </span>
</div>
</td>
<td class="py-4 px-space-md align-top">
<div class="flex flex-col">
<span class="font-semibold text-on-surface">T. Sivagurunathan</span>
<span class="text-on-surface-variant text-xs mt-0.5">Nallur Heritage Quarter, Jaffna</span>
<span class="text-[11px] text-outline mt-1 flex items-center gap-1">
<span class="material-symbols-outlined text-xs text-primary">flight_takeoff</span> Palali Airport Transfer
                </span>
</div>
</td>
<td class="py-4 px-space-md align-top">
<div class="flex items-start gap-space-xs">
<div class="h-7 w-7 rounded-full bg-surface-container flex items-center justify-center text-primary font-semibold text-xs shrink-0">NW</div>
<div class="flex flex-col min-w-0">
<span class="font-semibold text-on-surface truncate">Capt. N. Weerakkody</span>
<span class="text-[11px] text-secondary">FitsAir Flight #8Q112 + S. Kumar</span>
<span class="text-[10px] text-primary font-medium mt-0.5">Aero-Charter Logistics • 5.0★</span>
</div>
</div>
</td>
<td class="py-4 px-space-md align-top">
<div class="flex flex-col">
<div class="inline-flex items-center gap-1.5 bg-primary-fixed text-on-primary-fixed px-2 py-0.5 rounded-full text-xs font-semibold w-fit">
<span class="h-2 w-2 rounded-full bg-primary animate-pulse"></span>
                  In Air • ETA 15:40
                </div>
<span class="text-[11px] text-on-surface-variant mt-1.5">Departed Ratmalana 14:15</span>
<div class="flex items-center gap-1.5 text-[10px] text-outline mt-0.5">
<span class="material-symbols-outlined text-xs text-tertiary">flight</span>
<span>Palali Ground Team Standing By</span>
</div>
</div>
</td>
<td class="py-4 px-space-md align-top">
<div class="flex flex-col">
<span class="text-on-surface font-medium">Beeralu Bobbin Lace Kaftan</span>
<span class="text-xs text-on-surface-variant">Archival Museum Box</span>
<div class="inline-flex items-center gap-1 text-[11px] text-tertiary mt-1">
<span class="material-symbols-outlined text-xs">flight_land</span>
<span>Jaffna Chauffeur Assigned</span>
</div>
</div>
</td>
<td class="py-4 px-space-md align-top">
<div class="flex flex-col">
<div class="flex items-center text-primary text-xs font-semibold">
<span class="material-symbols-outlined text-xs" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="ml-1">5.0</span>
</div>
<span class="text-[11px] text-outline italic line-clamp-2 mt-0.5">"Flawless islandwide express dispatch"</span>
</div>
</td>
<td class="py-4 px-space-md align-top text-right">
<div class="flex items-center justify-end gap-1">
<button class="p-1.5 rounded-lg hover:bg-surface-container text-on-surface-variant hover:text-primary transition-all" title="Track Airway Bill">
<span class="material-symbols-outlined text-base">flight</span>
</button>
<button class="p-1.5 rounded-lg hover:bg-surface-container text-on-surface-variant hover:text-primary transition-all" title="Regional Handover">
<span class="material-symbols-outlined text-base">how_to_reg</span>
</button>
<button class="p-1.5 rounded-lg hover:bg-surface-container text-on-surface-variant hover:text-primary transition-all" title="Air Manifest">
<span class="material-symbols-outlined text-base">description</span>
</button>
</div>
</td>
</tr>
<!-- Row 6 -->
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="py-4 px-space-md align-top">
<div class="flex flex-col">
<span class="font-semibold text-primary">#DEL-8796</span>
<span class="text-secondary font-mono text-[11px]">#LUV-OR-9844</span>
<span class="inline-flex items-center gap-1 mt-1 text-[10px] text-tertiary font-semibold uppercase">
<span class="h-1.5 w-1.5 rounded-full bg-tertiary"></span> Biometric Signed
                </span>
</div>
</td>
<td class="py-4 px-space-md align-top">
<div class="flex flex-col">
<span class="font-semibold text-on-surface">Deshabandu Rohan De Mel</span>
<span class="text-on-surface-variant text-xs mt-0.5">Galle Face Court Penthouse, Colombo 03</span>
<span class="text-[11px] text-outline mt-1 flex items-center gap-1">
<span class="material-symbols-outlined text-xs text-tertiary">verified</span> Sovereign Patron
                </span>
</div>
</td>
<td class="py-4 px-space-md align-top">
<div class="flex items-start gap-space-xs">
<div class="h-7 w-7 rounded-full bg-surface-container flex items-center justify-center text-primary font-semibold text-xs shrink-0">AJ</div>
<div class="flex flex-col min-w-0">
<span class="font-semibold text-on-surface truncate">Agent Asitha Jayawardena</span>
<span class="text-[11px] text-secondary">Mercedes EQV #06</span>
<span class="text-[10px] text-tertiary font-medium mt-0.5">Master Chauffeur • 5.0★</span>
</div>
</div>
</td>
<td class="py-4 px-space-md align-top">
<div class="flex flex-col">
<div class="inline-flex items-center gap-1.5 bg-tertiary-fixed/40 text-on-tertiary-fixed-variant px-2 py-0.5 rounded-full text-xs font-semibold w-fit">
<span class="material-symbols-outlined text-xs text-tertiary">check_circle</span>
                  Completed • 13:42
                </div>
<span class="text-[11px] text-on-surface-variant mt-1.5">CBSL RTGS Escrow Released</span>
<div class="flex items-center gap-1.5 text-[10px] text-outline mt-0.5">
<span class="material-symbols-outlined text-xs text-tertiary">lock</span>
<span>Ledger Hash: 0x9f4a...e12b</span>
</div>
</div>
</td>
<td class="py-4 px-space-md align-top">
<div class="flex flex-col">
<span class="text-on-surface font-medium">Pit-Loom Wrap Skirt &amp; Stole</span>
<span class="text-xs text-on-surface-variant">Signature Cinnamon Packaging</span>
<div class="inline-flex items-center gap-1 text-[11px] text-tertiary mt-1">
<span class="material-symbols-outlined text-xs">done_all</span>
<span>Fitted &amp; Retained</span>
</div>
</div>
</td>
<td class="py-4 px-space-md align-top">
<div class="flex flex-col">
<div class="flex items-center text-primary text-xs font-semibold">
<span class="material-symbols-outlined text-xs" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="ml-1">5.0</span>
</div>
<span class="text-[11px] text-outline italic line-clamp-2 mt-0.5">"Drape pinning in EQV salon effortless"</span>
</div>
</td>
<td class="py-4 px-space-md align-top text-right">
<div class="flex items-center justify-end gap-1">
<button class="p-1.5 rounded-lg hover:bg-surface-container text-on-surface-variant hover:text-primary transition-all" title="View Signed Ledger">
<span class="material-symbols-outlined text-base">receipt</span>
</button>
<button class="p-1.5 rounded-lg hover:bg-surface-container text-on-surface-variant hover:text-primary transition-all" title="Archive Run">
<span class="material-symbols-outlined text-base">archive</span>
</button>
</div>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Table Pagination & Footer Status -->
<div class="bg-surface-container-low px-space-md py-3 flex flex-col sm:flex-row items-center justify-between gap-space-sm font-label-sm text-label-sm text-on-surface-variant">
<div class="flex items-center gap-space-sm">
<span>Showing <strong class="text-on-surface">6 of 38</strong> active deliveries</span>
<span class="text-outline">•</span>
<span class="text-tertiary font-semibold flex items-center gap-1">
<span class="h-2 w-2 rounded-full bg-tertiary"></span> All 14 vans reporting GPS heartbeat
        </span>
</div>
<div class="flex items-center gap-1">
<button class="px-2.5 py-1 rounded-md bg-surface-container-lowest text-outline hover:text-on-surface shadow-sm transition-all" disabled="">Prev</button>
<button class="px-2.5 py-1 rounded-md bg-primary text-on-primary font-semibold shadow-sm">1</button>
<button class="px-2.5 py-1 rounded-md bg-surface-container-lowest text-on-surface hover:bg-surface-container shadow-sm transition-all">2</button>
<button class="px-2.5 py-1 rounded-md bg-surface-container-lowest text-on-surface hover:bg-surface-container shadow-sm transition-all">3</button>
<button class="px-2.5 py-1 rounded-md bg-surface-container-lowest text-on-surface hover:bg-surface-container shadow-sm transition-all">Next</button>
</div>
</div>
</div>
<!-- Bottom Split Grid: Chauffeur Pool Matrix & Live Reviews Strip -->
<div class="grid grid-cols-1 xl:grid-cols-3 gap-space-md">
<!-- Active Chauffeur Pool & Reassignment Matrix (1 Col) -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-space-sm">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-lg">supervised_user_circle</span>
<h2 class="font-headline-sm text-headline-sm text-on-surface leading-tight">Standby Chauffeur Pool</h2>
</div>
<span class="px-2 py-0.5 rounded-full bg-tertiary-fixed text-on-tertiary-fixed text-[11px] font-semibold">4 Ready</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md">Available agents stationed at Colombo 07 Flagship Hub for instant dispatch or route handover.</p>
<div class="space-y-space-sm">
<!-- Agent 1 -->
<div class="bg-surface-container-low rounded-lg p-2.5 flex items-center justify-between">
<div class="flex items-center gap-2.5">
<div class="h-8 w-8 rounded-full bg-surface-container-lowest flex items-center justify-center text-primary font-semibold text-xs shadow-sm">RF</div>
<div>
<div class="font-label-md text-label-md font-semibold text-on-surface">Ruwan Fernando</div>
<div class="text-[11px] text-tertiary flex items-center gap-1">
<span class="h-1.5 w-1.5 rounded-full bg-tertiary"></span> Ready at Ward Place • EQV #11
                </div>
</div>
</div>
<button class="px-2 py-1 rounded-full bg-surface-container-lowest hover:bg-primary hover:text-on-primary text-primary font-label-sm text-label-sm font-semibold shadow-sm transition-all" onclick="document.getElementById('reassign-modal').classList.remove('hidden')">
              Assign
            </button>
</div>
<!-- Agent 2 -->
<div class="bg-surface-container-low rounded-lg p-2.5 flex items-center justify-between">
<div class="flex items-center gap-2.5">
<div class="h-8 w-8 rounded-full bg-surface-container-lowest flex items-center justify-center text-secondary font-semibold text-xs shadow-sm">DS</div>
<div>
<div class="font-label-md text-label-md font-semibold text-on-surface">Dinesh Samarawickrama</div>
<div class="text-[11px] text-secondary flex items-center gap-1">
<span class="h-1.5 w-1.5 rounded-full bg-secondary"></span> Returning to Hub (ETA 8m)
                </div>
</div>
</div>
<button class="px-2 py-1 rounded-full bg-surface-container-lowest hover:bg-primary hover:text-on-primary text-secondary font-label-sm text-label-sm font-semibold shadow-sm transition-all" onclick="document.getElementById('reassign-modal').classList.remove('hidden')">
              Reserve
            </button>
</div>
<!-- Agent 3 -->
<div class="bg-surface-container-low rounded-lg p-2.5 flex items-center justify-between">
<div class="flex items-center gap-2.5">
<div class="h-8 w-8 rounded-full bg-surface-container-lowest flex items-center justify-center text-primary font-semibold text-xs shadow-sm">DA</div>
<div>
<div class="font-label-md text-label-md font-semibold text-on-surface">Dilshan Alwis</div>
<div class="text-[11px] text-tertiary flex items-center gap-1">
<span class="h-1.5 w-1.5 rounded-full bg-tertiary"></span> Ready • Armed Escort Certified
                </div>
</div>
</div>
<button class="px-2 py-1 rounded-full bg-surface-container-lowest hover:bg-primary hover:text-on-primary text-primary font-label-sm text-label-sm font-semibold shadow-sm transition-all" onclick="document.getElementById('reassign-modal').classList.remove('hidden')">
              Assign
            </button>
</div>
</div>
</div>
<div class="mt-space-md pt-space-xs bg-surface-container-high/40 rounded-lg p-space-sm flex items-center justify-between font-label-sm text-label-sm">
<span class="text-on-surface-variant">Shift Lead: <strong>Chauffeur Commander M. Jayasuriya</strong></span>
<span class="text-primary font-semibold cursor-pointer hover:underline">Duty Log</span>
</div>
</div>
<!-- Patron Delivery Reviews & Service Feedback Strip (2 Cols) -->
<div class="xl:col-span-2 bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-space-sm">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-lg">reviews</span>
<h2 class="font-headline-sm text-headline-sm text-on-surface leading-tight">Patron White-Glove Reviews &amp; Post-Fitting Feedback</h2>
</div>
<div class="flex items-center gap-2">
<span class="font-headline-md text-headline-md text-primary font-semibold">4.98</span>
<span class="text-outline text-xs">/ 5.0 (840 runs)</span>
</div>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md">Real-time telemetry and post-arrival ratings submitted via the Luvora Sovereign Concierge app.</p>
<!-- Metric badges row -->
<div class="grid grid-cols-3 gap-space-sm mb-space-md">
<div class="bg-surface-container-low rounded-lg p-2.5 text-center">
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-wider block">Punctuality</span>
<span class="font-headline-md text-headline-md text-on-surface font-semibold">100%</span>
<span class="text-[11px] text-tertiary font-medium">On-time gate ping</span>
</div>
<div class="bg-surface-container-low rounded-lg p-2.5 text-center">
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-wider block">Van Salon Ambience</span>
<span class="font-headline-md text-headline-md text-on-surface font-semibold">100%</span>
<span class="text-[11px] text-primary font-medium">Chilled &amp; scented</span>
</div>
<div class="bg-surface-container-low rounded-lg p-2.5 text-center">
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-wider block">Discretion &amp; Decorum</span>
<span class="font-headline-md text-headline-md text-on-surface font-semibold">99.8%</span>
<span class="text-[11px] text-tertiary font-medium">Sovereign standard</span>
</div>
</div>
<!-- Recent Patron Quotes Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-space-sm">
<div class="bg-surface-container-low rounded-lg p-3 flex flex-col justify-between">
<p class="font-body-sm text-body-sm text-on-surface italic">"The mobile salon van parked discreetly in our private courtyard. Agent Sunil waited respectfully and the drape pinning on the raw silk saree was executed with master precision."</p>
<div class="flex items-center justify-between mt-2 pt-2 text-[11px] text-on-surface-variant">
<span class="font-semibold text-on-surface">Lady Sharanya W. • Horton Place</span>
<span class="text-primary font-semibold">5.0 ★</span>
</div>
</div>
<div class="bg-surface-container-low rounded-lg p-3 flex flex-col justify-between">
<p class="font-body-sm text-body-sm text-on-surface italic">"Armored escort unit arrived with dual-custody security keys. Handover of our Ceylon sapphire provenance was handled with complete institutional discretion."</p>
<div class="flex items-center justify-between mt-2 pt-2 text-[11px] text-on-surface-variant">
<span class="font-semibold text-on-surface">Dr. Radhika S. • Ward Place</span>
<span class="text-primary font-semibold">5.0 ★</span>
</div>
</div>
</div>
</div>
<div class="mt-space-md pt-space-xs flex items-center justify-between text-on-surface-variant font-label-sm text-label-sm">
<span>Verified Patron Feedback Cycle • 100% Cryptographically Signed</span>
<button class="text-primary font-semibold hover:underline flex items-center gap-1">
<span>View All 840 Delivery Dossiers</span>
<span class="material-symbols-outlined text-sm">arrow_forward</span>
</button>
</div>
</div>
</div>
<!-- Telemetry & Fleet Compliance Status Footer -->
<div class="mt-space-lg bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col md:flex-row items-center justify-between gap-space-md">
<div class="flex items-center gap-space-md">
<div class="h-10 w-10 rounded-full bg-primary-fixed flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined text-xl">satellite_alt</span>
</div>
<div>
<div class="font-label-md text-label-md font-semibold text-on-surface">Sri Lanka National Transport Commission (NTC) &amp; CBSL Escrow Verified</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Continuous GPS beacon sync • Encrypted tamper-evident parcel seal telemetry active across all 14 vehicles.</div>
</div>
</div>
<div class="flex items-center gap-space-sm shrink-0">
<div class="flex items-center gap-1 bg-surface-container-low px-3 py-1.5 rounded-full font-label-sm text-label-sm text-on-surface-variant">
<span class="h-2 w-2 rounded-full bg-tertiary"></span>
<span>Gateway Ping: <strong>14ms</strong></span>
</div>
<button class="px-4 py-2 rounded-full bg-surface-container-high hover:bg-surface-container text-on-surface font-label-md text-label-md font-semibold transition-all">
        Download Telematics Audit Log
      </button>
</div>
</div>
<!-- Sleek Reassignment Modal Component (Hidden by default, toggleable via JS) -->
<div class="fixed inset-0 z-50 flex items-center justify-center bg-inverse-surface/40 backdrop-blur-sm hidden p-4" id="reassign-modal">
<div class="bg-surface-container-lowest rounded-2xl shadow-2xl max-w-lg w-full p-space-lg relative overflow-hidden">
<div class="flex items-center justify-between mb-space-md">
<div class="flex items-center gap-2">
<div class="h-8 w-8 rounded-full bg-primary-fixed flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-base">swap_horiz</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Reassign Delivery Agent</h3>
</div>
<button class="p-1 rounded-full text-outline hover:text-on-surface hover:bg-surface-container transition-all" onclick="document.getElementById('reassign-modal').classList.add('hidden')">
<span class="material-symbols-outlined text-lg">close</span>
</button>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md">Select an active standby chauffeur or mobile salon unit for emergency route transfer or expedited VIP arrival.</p>
<div class="space-y-space-sm mb-space-lg">
<label class="block">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-outline mb-1 block">Active Dispatch Reference</span>
<select class="w-full bg-surface-container-low px-3 py-2 rounded-lg font-body-sm text-body-sm text-on-surface focus:outline-none">
<option>#DEL-8821 — Lady Sharanya Wickramasinghe (Albert Crescent)</option>
<option>#DEL-8819 — Hon. Priyantha Fonseka (Cinnamon Gardens)</option>
<option>#DEL-8808 — Ayesha De Silva (Kollupitiya)</option>
</select>
</label>
<label class="block">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-outline mb-1 block">Replacement Chauffeur Agent</span>
<select class="w-full bg-surface-container-low px-3 py-2 rounded-lg font-body-sm text-body-sm text-on-surface focus:outline-none">
<option>Agent Ruwan Fernando (Standby Colombo 07 Hub • EQV #11)</option>
<option>Agent Dinesh Samarawickrama (Returning in 8m • EQV #08)</option>
<option>Agent Dilshan Alwis (Standby Armed Escort • Vault Unit #02)</option>
</select>
</label>
<label class="block">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-outline mb-1 block">Reason for Reassignment</span>
<select class="w-full bg-surface-container-low px-3 py-2 rounded-lg font-body-sm text-body-sm text-on-surface focus:outline-none">
<option>Dynamic Traffic Optimization (Save &gt;10 mins)</option>
<option>Patron Schedule Change / Early Fitting Request</option>
<option>Specialized Tailor / Master Draper Transfer</option>
<option>High-Security Armed Unit Upgrade</option>
</select>
</label>
</div>
<div class="flex items-center justify-end gap-space-sm">
<button class="px-4 py-2 rounded-full bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md transition-all" onclick="document.getElementById('reassign-modal').classList.add('hidden')">
          Cancel
        </button>
<button class="px-5 py-2 rounded-full bg-primary hover:bg-primary-container text-on-primary font-label-md text-label-md font-semibold shadow-sm transition-all" onclick="document.getElementById('reassign-modal').classList.add('hidden')">
          Confirm Telemetry Reassignment
        </button>
</div>
</div>
</div>
</div></main></div></body></html>


