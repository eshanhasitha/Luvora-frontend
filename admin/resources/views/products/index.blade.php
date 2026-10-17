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
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/><style>.catalog-toast{position:fixed;right:22px;bottom:22px;z-index:100;background:#191c1e;color:white;padding:11px 15px;border-radius:8px;font:12px Inter,sans-serif;opacity:0;transform:translateY(8px);transition:.2s;pointer-events:none}.catalog-toast.visible{opacity:1;transform:none}#product-dialog{width:min(700px,calc(100vw - 28px));max-height:88vh;border:0;border-radius:14px;padding:0;box-shadow:0 20px 70px #0004}#product-dialog::backdrop{background:#191c1e77}.product-form{display:grid;grid-template-columns:1fr 1fr;gap:12px;font:11px Inter,sans-serif}.product-form label{display:block}.product-form input,.product-form select,.product-form textarea{display:block;width:100%;padding:9px;border:1px solid #e0e3e5;border-radius:6px;margin-top:5px}.product-form textarea{min-height:60px}.product-form .wide{grid-column:1/-1}.gallery-upload{display:inline-flex;padding:7px 10px;border-radius:18px;background:#f2f4f6;font:11px Inter,sans-serif}.gallery-upload input{width:170px}@media(max-width:600px){.product-form{grid-template-columns:1fr}.product-form .wide{grid-column:auto}}</style></head><body class="bg-surface text-on-surface">@include('partials.sidebar')<div class="md:pl-64"><header class="fixed top-0 left-0 right-0 md:left-64 h-20 bg-surface/80 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)] z-40 px-gutter-lg flex items-center justify-between"><button type="button" class="mr-3 inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-white text-slate-700 shadow-sm md:hidden" aria-label="Toggle admin navigation" aria-controls="admin-sidebar" aria-expanded="false" onclick="const nav=document.getElementById('admin-sidebar');const open=nav.classList.toggle('-translate-x-full');this.setAttribute('aria-expanded',String(!open))"><span class="material-symbols-outlined">menu</span></button><div class="flex min-w-0 items-center gap-space-md flex-1 max-w-2xl"><div class="flex items-center gap-space-xs bg-surface-container-low px-space-sm py-2 rounded-full"><span class="material-symbols-outlined text-base text-primary">storefront</span><span class="font-label-sm text-label-sm text-on-surface font-semibold">Colombo 07 Flagship</span><span class="material-symbols-outlined text-sm text-outline">expand_more</span></div><div class="relative flex-1"><span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-lg">search</span><input class="w-full bg-surface-container-lowest pl-10 pr-4 py-2 rounded-full font-body-sm text-body-sm text-on-surface placeholder:text-outline focus:outline-none shadow-[0_1px_3px_0_rgba(15,23,42,0.04)]" placeholder="Search SKUs, high jewelry orders, sovereign patrons..." type="text"/></div></div><div class="flex items-center gap-space-md"><div class="flex items-center gap-space-xs bg-tertiary-fixed/30 px-space-sm py-1.5 rounded-full"><span class="h-2 w-2 rounded-full bg-tertiary"></span><span class="font-label-sm text-label-sm text-on-tertiary-fixed-variant font-medium">CBSL Escrow Synchronized</span></div><button class="relative p-2 rounded-full bg-surface-container-lowest text-on-surface-variant hover:text-on-surface shadow-[0_1px_3px_0_rgba(15,23,42,0.04)]"><span class="material-symbols-outlined text-xl">notifications</span><span class="absolute top-1 right-1 h-2 w-2 rounded-full bg-error"></span></button><div class="flex items-center gap-space-sm pl-space-xs"><a href="{{ route('admin.profile') }}" aria-label="Open admin profile" title="Admin profile">@include('partials.profile-avatar', ['avatarSize' => 'h-8 w-8'])</a><div class="hidden xl:flex flex-col text-right"><span class="font-label-md text-label-md text-on-surface font-medium">{{ data_get(session('admin_user'), 'name') ?? data_get(session('admin_user'), 'Name') ?? 'Admin user' }}</span><span class="font-label-sm text-label-sm text-secondary">{{ data_get(session('admin_user'), 'role') ?? data_get(session('admin_user'), 'Role') ?? 'Administrator' }}</span></div></div></div></header><main class="w-full pt-20 px-gutter-lg bg-surface min-h-screen">@include('partials.api-state')<div class="flex flex-col w-full">
<!-- Dynamic Breadcrumb & Context Header Bar -->
<div class="flex flex-col md:flex-row md:items-center justify-between gap-space-sm pb-space-md">
<div class="flex items-center gap-space-xs font-label-md text-label-md text-secondary">
<span class="hover:text-primary transition-colors cursor-pointer">Executive Portal</span>
<span class="material-symbols-outlined text-sm text-outline">chevron_right</span>
<span class="hover:text-primary transition-colors cursor-pointer">Catalog &amp; Products</span>
<span class="material-symbols-outlined text-sm text-outline">chevron_right</span>
<span class="text-on-surface font-semibold">All Products</span>
</div>
<div class="flex items-center gap-space-sm self-start md:self-auto">
<div class="flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-container-lowest shadow-sm text-on-surface">
<span class="h-2 w-2 rounded-full bg-tertiary-container animate-pulse"></span>
<span class="font-label-sm text-label-sm font-semibold tracking-wide uppercase">Colombo 07 Vault &amp; Global Feed</span>
</div>
<span class="font-label-sm text-label-sm text-secondary">SLST 15:42</span>
</div>
</div>
<!-- Page Title & Primary Actions Area -->
<div class="flex flex-col xl:flex-row xl:items-end justify-between gap-space-lg pb-space-lg">
<div class="space-y-space-xs max-w-3xl">
<div class="flex items-center gap-space-xs">
<span class="material-symbols-outlined text-primary text-base">verified_user</span>
<span class="font-label-sm text-label-sm text-primary uppercase tracking-widest font-semibold">
          Catalog Inventory &amp; Artisan Specifications • Colombo 07 Vault
        </span>
</div>
<h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight leading-none">
        Product Management &amp; Catalog Master
      </h1>
<p class="font-body-md text-body-md text-secondary">
        Curate, audit, and manage high-fashion handlooms, unheated Ceylon gemstones, and bespoke resort silhouettes across islandwide artisan guilds.
      </p>
</div>
<!-- Quick Action Toolbar -->
<div class="flex flex-wrap items-center gap-space-sm">
<button class="inline-flex items-center gap-space-xs px-space-md py-2.5 rounded-full bg-surface-container-lowest text-on-surface hover:bg-surface-container font-label-md text-label-md font-semibold transition-all shadow-sm">
<span class="material-symbols-outlined text-lg">download</span>
<span>Export Spec Dossier</span>
</button>
<button class="inline-flex items-center gap-space-xs px-space-md py-2.5 rounded-full bg-surface-container-lowest text-on-surface hover:bg-surface-container font-label-md text-label-md font-semibold transition-all shadow-sm">
<span class="material-symbols-outlined text-lg">fact_check</span>
<span>Bulk Stock Audit</span>
</button>
<button class="inline-flex items-center gap-space-xs px-space-md py-2.5 rounded-full bg-surface-container-lowest text-on-surface hover:bg-surface-container font-label-md text-label-md font-semibold transition-all shadow-sm">
<span class="material-symbols-outlined text-lg">barcode_scanner</span>
<span>Barcode Mode</span>
</button>
<button class="inline-flex items-center gap-space-xs px-space-lg py-2.5 rounded-full bg-primary text-on-primary hover:bg-primary-container font-label-md text-label-md font-semibold transition-all shadow-md active:scale-95">
<span class="material-symbols-outlined text-lg">add_circle</span>
<span>+ Add New Product</span>
</button>
</div>
</div>
<!-- Key Metrics Strip (4 mini KPI bento blocks) -->
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-space-md pb-space-lg">
<!-- Metric 1 -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between relative overflow-hidden group">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">Total Active SKUs</span>
<span class="p-2 rounded-lg bg-surface-container text-primary">
<span class="material-symbols-outlined text-lg">inventory</span>
</span>
</div>
<div class="pt-space-sm">
<div class="flex items-baseline gap-space-xs">
<span id="catalog-total-count" class="font-headline-md text-headline-md font-semibold text-on-surface">0</span>
<span class="font-label-sm text-label-sm text-tertiary font-semibold flex items-center">
<span class="material-symbols-outlined text-xs">arrow_upward</span>+18 this month
          </span>
</div>
<p class="font-body-sm text-body-sm text-secondary pt-1">
          34 Handlooms • 112 Gems • 340 RTW
        </p>
</div>
<div class="absolute -right-6 -bottom-6 w-20 h-20 bg-primary/5 rounded-full blur-xl group-hover:scale-125 transition-transform"></div>
</div>
<!-- Metric 2 -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between relative overflow-hidden group">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">Low Stock Telemetry</span>
<span class="p-2 rounded-lg bg-error-container/40 text-error">
<span class="material-symbols-outlined text-lg">warning</span>
</span>
</div>
<div class="pt-space-sm">
<div class="flex items-baseline gap-space-xs">
<span class="font-headline-md text-headline-md font-semibold text-error">08</span>
<span class="font-label-sm text-label-sm text-error font-semibold">Critical (&lt; 3 units)</span>
</div>
<p class="font-body-sm text-body-sm text-secondary pt-1">
          6 Dumbara Handlooms, 2 Solitaires
        </p>
</div>
<div class="absolute -right-6 -bottom-6 w-20 h-20 bg-error/5 rounded-full blur-xl group-hover:scale-125 transition-transform"></div>
</div>
<!-- Metric 3 -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between relative overflow-hidden group">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">In-Vault Escrow Reserve</span>
<span class="p-2 rounded-lg bg-secondary-container/50 text-primary">
<span class="material-symbols-outlined text-lg">shield_with_heart</span>
</span>
</div>
<div class="pt-space-sm">
<div class="flex items-baseline gap-space-xs">
<span class="font-headline-md text-headline-md font-semibold text-on-surface">LKR 64.85M</span>
</div>
<p class="font-body-sm text-body-sm text-tertiary pt-1 flex items-center gap-1 font-medium">
<span class="material-symbols-outlined text-xs">verified</span> CBSL Escrow Ledger Compliant
        </p>
</div>
<div class="absolute -right-6 -bottom-6 w-20 h-20 bg-tertiary/5 rounded-full blur-xl group-hover:scale-125 transition-transform"></div>
</div>
<!-- Metric 4 -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between relative overflow-hidden group">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">Artisan Guild Network</span>
<span class="p-2 rounded-lg bg-surface-container text-secondary">
<span class="material-symbols-outlined text-lg">handshake</span>
</span>
</div>
<div class="pt-space-sm">
<div class="flex items-baseline gap-space-xs">
<span class="font-headline-md text-headline-md font-semibold text-on-surface">14 Guilds</span>
<span class="font-label-sm text-label-sm text-secondary font-medium">100% Provenance</span>
</div>
<p class="font-body-sm text-body-sm text-secondary pt-1 truncate">
          Dumbara • Ratnapura • Galle • Jaffna
        </p>
</div>
<div class="absolute -right-6 -bottom-6 w-20 h-20 bg-primary/5 rounded-full blur-xl group-hover:scale-125 transition-transform"></div>
</div>
</div>
<!-- Non-intrusive Vault Policy Notice -->
<div class="p-space-md rounded-xl bg-surface-container-low shadow-sm mb-space-lg flex flex-col md:flex-row items-start md:items-center justify-between gap-space-sm">
<div class="flex items-center gap-space-sm">
<span class="p-2 rounded-full bg-secondary-container text-on-secondary-fixed">
<span class="material-symbols-outlined text-base">lock</span>
</span>
<p class="font-body-sm text-body-sm text-on-surface">
<span class="font-semibold text-primary">Deactivation &amp; Vault Policy:</span>
        Items backed by CBSL escrow deposits or linked to scheduled tailor fittings cannot be permanently removed. They transition to the <em>Vault Provenance Archive</em> to protect the sovereign collector ledger.
      </p>
</div>
<a class="font-label-sm text-label-sm text-primary font-semibold hover:underline shrink-0 flex items-center gap-1" href="#">
      Read Charter <span class="material-symbols-outlined text-xs">arrow_forward</span>
</a>
</div>
<!-- Search, Filter Suite, & View Matrix -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm mb-space-md space-y-space-md">
<!-- Row 1: Search & Dynamic Segment Tabs -->
<div class="flex flex-col lg:flex-row lg:items-center justify-between gap-space-md">
<!-- Search Input -->
<div class="relative flex-1 max-w-xl">
<span class="material-symbols-outlined absolute left-3.5 top-1/2 -translate-y-1/2 text-outline text-lg">search</span>
<input id="catalog-search" class="w-full pl-11 pr-4 py-2.5 rounded-lg bg-surface-container-low text-on-surface font-body-sm text-body-sm placeholder:text-outline focus:outline-none focus:bg-surface-container transition-all" placeholder="Search by product name, SKU, artisan guild, gemstone cert # (e.g. RAT-4921, Somapala)..." type="text"/>
</div>
<!-- Quick Segment Tabs -->
<div class="flex items-center gap-1 bg-surface-container-low p-1 rounded-lg overflow-x-auto">
<button data-segment="all" class="segment-tab px-3 py-1.5 rounded font-label-sm text-label-sm font-semibold bg-surface-container-lowest text-on-surface shadow-xs">
          All (0)
        </button>
<button data-segment="active" class="segment-tab px-3 py-1.5 rounded font-label-sm text-label-sm text-secondary hover:text-on-surface transition-colors">
          Active (0)
        </button>
<button data-segment="low" class="segment-tab px-3 py-1.5 rounded font-label-sm text-label-sm text-error hover:bg-error-container/20 transition-colors flex items-center gap-1">
          Low Stock <span class="px-1.5 py-0.5 rounded-full bg-error text-on-error text-[10px]">8</span>
</button>
<button data-segment="archived" class="segment-tab px-3 py-1.5 rounded font-label-sm text-label-sm text-secondary hover:text-on-surface transition-colors">
          Archived (24)
        </button>
<button data-segment="drafts" class="segment-tab px-3 py-1.5 rounded font-label-sm text-label-sm text-secondary hover:text-on-surface transition-colors">
          Drafts (12)
        </button>
</div>
<!-- Layout View Toggle -->
<div class="flex items-center gap-1 bg-surface-container-low p-1 rounded-lg self-end lg:self-auto">
<button class="p-1.5 rounded bg-surface-container-lowest text-primary shadow-xs" title="Table View">
<span class="material-symbols-outlined text-lg">table_rows</span>
</button>
<button class="p-1.5 rounded text-secondary hover:text-on-surface" title="Grid View">
<span class="material-symbols-outlined text-lg">grid_view</span>
</button>
</div>
</div>
<!-- Row 2: Comprehensive Dropdown Filter Row -->
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-space-sm pt-space-xs">
<!-- Category Filter -->
<div class="flex flex-col space-y-1">
<label class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Category</label>
<div class="relative">
<select class="w-full appearance-none bg-surface-container-low text-on-surface font-body-sm text-body-sm px-3 py-2 rounded-lg pr-8 focus:outline-none focus:bg-surface-container">
<option>All Categories</option>
<option>Handloom Sarees &amp; Silks</option>
<option>Haute Couture Kaftans</option>
<option>Bespoke Menswear</option>
<option>Fine Jewelry &amp; Sapphires</option>
<option>Palm &amp; Beeralu Accessories</option>
</select>
<span class="material-symbols-outlined absolute right-2.5 top-1/2 -translate-y-1/2 text-outline text-base pointer-events-none">expand_more</span>
</div>
</div>
<!-- Stock Status Filter -->
<div class="flex flex-col space-y-1">
<label class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Stock Status</label>
<div class="relative">
<select class="w-full appearance-none bg-surface-container-low text-on-surface font-body-sm text-body-sm px-3 py-2 rounded-lg pr-8 focus:outline-none focus:bg-surface-container">
<option>All Statuses</option>
<option>In Vault Stock</option>
<option>Critical Stock (&lt;3)</option>
<option>Made-to-Order</option>
<option>Out of Stock / Restock</option>
<option>Vault Sealed</option>
</select>
<span class="material-symbols-outlined absolute right-2.5 top-1/2 -translate-y-1/2 text-outline text-base pointer-events-none">expand_more</span>
</div>
</div>
<!-- Artisan Guild Origin -->
<div class="flex flex-col space-y-1">
<label class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Guild / Provenance</label>
<div class="relative">
<select class="w-full appearance-none bg-surface-container-low text-on-surface font-body-sm text-body-sm px-3 py-2 rounded-lg pr-8 focus:outline-none focus:bg-surface-container">
<option>All Guilds (14)</option>
<option>Dumbara Valley Weavers</option>
<option>Ratnapura Alluvial Basin</option>
<option>Galle Fort Beeralu &amp; Tailors</option>
<option>Jaffna Peninsula Collective</option>
<option>Elahera Gem Artisans</option>
</select>
<span class="material-symbols-outlined absolute right-2.5 top-1/2 -translate-y-1/2 text-outline text-base pointer-events-none">expand_more</span>
</div>
</div>
<!-- Price Tier -->
<div class="flex flex-col space-y-1">
<label class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Price Tier (LKR)</label>
<div class="relative">
<select class="w-full appearance-none bg-surface-container-low text-on-surface font-body-sm text-body-sm px-3 py-2 rounded-lg pr-8 focus:outline-none focus:bg-surface-container">
<option>All Price Tiers</option>
<option>Under LKR 25,000</option>
<option>LKR 25,000 - 75,000</option>
<option>LKR 75,000 - 200,000</option>
<option>High Jewelry &gt; LKR 200,000</option>
</select>
<span class="material-symbols-outlined absolute right-2.5 top-1/2 -translate-y-1/2 text-outline text-base pointer-events-none">expand_more</span>
</div>
</div>
<!-- Provenance / Verification Badges -->
<div class="flex flex-col space-y-1">
<label class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Heritage Assay</label>
<div class="relative">
<select class="w-full appearance-none bg-surface-container-low text-on-surface font-body-sm text-body-sm px-3 py-2 rounded-lg pr-8 focus:outline-none focus:bg-surface-container">
<option>All Heritage Certs</option>
<option>UNESCO Pit-Loom Certified</option>
<option>NGJA Gemological Certified</option>
<option>Certified Natural Organic Dye</option>
<option>SLIDA Registered Guild</option>
</select>
<span class="material-symbols-outlined absolute right-2.5 top-1/2 -translate-y-1/2 text-outline text-base pointer-events-none">expand_more</span>
</div>
</div>
</div>
</div>
<!-- Bulk Batch Toolbar (Rendered when selection is active) -->
<div class="bg-primary/5 px-space-md py-2.5 rounded-lg mb-space-sm flex flex-wrap items-center justify-between gap-space-sm">
<div class="flex items-center gap-space-sm">
<input class="w-4 h-4 rounded text-primary focus:ring-0 cursor-pointer" id="bulk-select-all" type="checkbox"/>
<span class="font-label-sm text-label-sm font-semibold text-on-surface"><span id="selected-label">Selected 0 of 7 items</span></span>
<span class="font-label-sm text-label-sm text-secondary">|</span>
<div class="flex items-center gap-1.5">
<button class="px-2.5 py-1 rounded bg-surface-container-lowest hover:bg-surface-container font-label-sm text-label-sm text-on-surface font-medium transition-colors shadow-xs">
          Adjust Stock Levels
        </button>
<button class="px-2.5 py-1 rounded bg-surface-container-lowest hover:bg-surface-container font-label-sm text-label-sm text-on-surface font-medium transition-colors shadow-xs">
          Update Guild Escrow Split
        </button>
<button class="px-2.5 py-1 rounded bg-surface-container-lowest hover:bg-error-container/40 text-error font-label-sm text-label-sm font-medium transition-colors shadow-xs">
          Archive Selected
        </button>
</div>
</div>
<div class="flex items-center gap-space-xs font-label-sm text-label-sm text-secondary">
<span class="material-symbols-outlined text-base">sync</span>
<span>Auto-sync with Colombo 07 RFID scanner enabled</span>
</div>
</div>
<!-- Comprehensive Master Product Table Container -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm overflow-hidden mb-space-lg">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<!-- Table Header -->
<thead>
<tr class="bg-surface-container-low text-secondary font-label-sm text-label-sm uppercase tracking-wider">
<th class="py-3.5 pl-space-md pr-2 w-12 text-center">
<span class="sr-only">Select</span>
</th>
<th class="py-3.5 px-space-sm min-w-[280px]">Product &amp; SKU Identifier</th>
<th class="py-3.5 px-space-sm min-w-[190px]">Artisan / Guild Provenance</th>
<th class="py-3.5 px-space-sm min-w-[170px]">Retail &amp; Escrow Allocation</th>
<th class="py-3.5 px-space-sm min-w-[160px]">Inventory &amp; Vault Telemetry</th>
<th class="py-3.5 px-space-sm min-w-[180px]">Assay &amp; Certification</th>
<th class="py-3.5 pr-space-md pl-space-sm text-right min-w-[140px]">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container text-on-surface font-body-sm text-body-sm">
<!-- Row 1: Emerald Handloom Saree -->
<tr data-product-row data-name="Handloom Emerald Raw Silk Saree" data-sku="LUV-HL-8821" data-status="published" data-stock="2" data-category="handloom" data-guild="Dumbara Valley Guild" data-cert="UNESCO Pit-Loom" class="hover:bg-surface-container-low/50 transition-colors group">
<td class="py-4 pl-space-md pr-2 text-center">
<input class="row-check w-4 h-4 rounded text-primary focus:ring-0 cursor-pointer" type="checkbox"/>
</td>
<td class="py-4 px-space-sm">
<div class="flex items-center gap-space-sm">
<div class="relative w-14 h-18 shrink-0 rounded-lg overflow-hidden bg-surface-container">
<img class="w-full h-full object-cover" data-alt="Editorial close-up of a luxurious emerald green Sri Lankan handloom raw silk saree draped with gold zari thread patterns, illuminated with soft ambient studio lighting against a clean parchment background." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCKxMQpAN5Q-JZYzgIRGCHUiVWdGTz5i-7VTlLH-r-npDbmgG59haXZxRmsTjg3CFLSbNdZUVnSec4aiWbrlU5J5cfbcat174NQCzDcOJmp9oyaVAKjnVXE5T0KMq-Q4Dr58jDJuPLp1OPCzakAH5EhusJ-sztO5jafIY7ECdk7z31uzVQwAcW5cqEdXgXgRZeLLnSGXYgEG7yATg46vYmkNdKkmhXZhcrmEJ9Q17V07otmM7Kz-pNs"/>
<span class="absolute bottom-1 right-1 px-1 py-0.2 rounded bg-surface-container-lowest/90 font-label-sm text-[9px] font-bold text-on-surface uppercase">Silk</span>
</div>
<div class="space-y-1 min-w-0">
<div class="font-headline-sm text-[15px] font-semibold text-on-surface truncate group-hover:text-primary transition-colors product-title cursor-pointer product-title cursor-pointer">
                    Handloom Emerald Raw Silk Saree
                  </div>
<div class="flex items-center gap-2">
<span class="font-label-sm text-label-sm font-mono text-outline">#LUV-HL-8821</span>
<span class="px-2 py-0.5 rounded-full bg-surface-container font-label-sm text-[11px] text-secondary">Women's Couture</span>
</div>
</div>
</div>
</td>
<td class="py-4 px-space-sm">
<div class="space-y-1">
<div class="font-semibold text-on-surface flex items-center gap-1">
<span>Master Somapala</span>
<span class="material-symbols-outlined text-xs text-primary" title="Master Craftsman Verified">verified</span>
</div>
<div class="font-label-sm text-label-sm text-secondary truncate">Dumbara Valley Guild</div>
<span class="inline-flex items-center gap-1 text-[11px] font-label-sm text-tertiary-container bg-tertiary-fixed/30 px-2 py-0.5 rounded-full font-medium">
                  Central Highlands
                </span>
</div>
</td>
<td class="py-4 px-space-sm">
<div class="space-y-0.5">
<div class="font-headline-sm text-[15px] font-bold text-on-surface">LKR 50,220</div>
<div class="text-[12px] font-label-sm text-tertiary font-semibold flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">account_balance_wallet</span>
<span>64% Escrow: LKR 32,140</span>
</div>
</div>
</td>
<td class="py-4 px-space-sm">
<div class="space-y-1">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-error-container/60 text-error text-[11px] font-label-sm font-semibold">
<span class="h-1.5 w-1.5 rounded-full bg-error animate-ping"></span>
                  2 in vault (Critical Low)
                </span>
<div class="text-[11px] font-label-sm text-secondary flex items-center gap-1">
<span class="material-symbols-outlined text-xs text-outline">shelves</span>
                  Vault Rack A-12
                </div>
</div>
</td>
<td class="py-4 px-space-sm">
<div class="space-y-1">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-surface-container font-label-sm text-[11px] text-on-surface font-medium">
<span class="material-symbols-outlined text-xs text-primary">workspace_premium</span>
                  UNESCO Pit-Loom
                </span>
<div class="text-[11px] font-label-sm text-secondary">Cert: #LK-DUM-2023</div>
</div>
</td>
<td class="py-4 pr-space-md pl-space-sm text-right">
<div class="flex items-center justify-end gap-1">
<button class="p-1.5 rounded-lg text-secondary hover:text-primary hover:bg-surface-container transition-colors" title="Edit Specifications">
<span class="material-symbols-outlined text-base">edit</span>
</button>
<button class="p-1.5 rounded-lg text-secondary hover:text-primary hover:bg-surface-container transition-colors" title="Manage Vault Stock">
<span class="material-symbols-outlined text-base">warehouse</span>
</button>
<button class="p-1.5 rounded-lg text-secondary hover:text-error hover:bg-error-container/40 transition-colors" title="Deactivate SKU">
<span class="material-symbols-outlined text-base">archive</span>
</button>
<button class="p-1.5 rounded-lg text-secondary hover:text-on-surface hover:bg-surface-container transition-colors" title="More Operations">
<span class="material-symbols-outlined text-base">more_vert</span>
</button>
</div>
</td>
</tr>
<!-- Row 2: Ratnapura Unheated Royal Blue Sapphire -->
<tr data-product-row data-name="Ratnapura Royal Blue Sapphire" data-sku="LUV-GEM-4921" data-status="published" data-stock="1" data-category="jewelry" data-guild="Ratnapura Alluvial Basin" data-cert="NGJA Cert RAT-4921" class="hover:bg-surface-container-low/50 transition-colors group">
<td class="py-4 pl-space-md pr-2 text-center">
<input class="row-check w-4 h-4 rounded text-primary focus:ring-0 cursor-pointer" type="checkbox"/>
</td>
<td class="py-4 px-space-sm">
<div class="flex items-center gap-space-sm">
<div class="relative w-14 h-18 shrink-0 rounded-lg overflow-hidden bg-surface-container">
<img class="w-full h-full object-cover" data-alt="Macro photography of a vivid natural Ceylon royal blue sapphire gemstone resting on a soft velvet pad, crisp reflections, sparkling facets, luxury lighting, pristine presentation." src="https://lh3.googleusercontent.com/aida-public/AB6AXuD-JZ2eVbjCqGEcIxK39J_9WCfR2zfh-9ywq_1lkSfld5EomdER3ngxRj1xDrfVMrg1rQiMFHP3DPkpTpodqmmLXMP7R-Tb0SSB27fmBJkyhXmBRNGp_fLU-2-B5mSNWZ1rpHlRMOTBK5NcaQIhHj-Oi8lZg7a2QStPl_kPheo_Gw9AW9d17j9J5v1MldDOKGB_O9hGPyXifpt8LwYwrxeNpLOjaSCQ0SB9d-MJBC-t6HNyEr3WHe-w"/>
<span class="absolute bottom-1 right-1 px-1 py-0.2 rounded bg-surface-container-lowest/90 font-label-sm text-[9px] font-bold text-on-surface uppercase">4.2ct</span>
</div>
<div class="space-y-1 min-w-0">
<div class="font-headline-sm text-[15px] font-semibold text-on-surface truncate group-hover:text-primary transition-colors product-title cursor-pointer product-title cursor-pointer">
                    Ratnapura Royal Blue Sapphire
                  </div>
<div class="flex items-center gap-2">
<span class="font-label-sm text-label-sm font-mono text-outline">#LUV-GEM-4921</span>
<span class="px-2 py-0.5 rounded-full bg-secondary-container/60 font-label-sm text-[11px] text-on-secondary-fixed">Fine High Jewelry</span>
</div>
</div>
</div>
</td>
<td class="py-4 px-space-sm">
<div class="space-y-1">
<div class="font-semibold text-on-surface">Dr. Wickramaratne</div>
<div class="font-label-sm text-label-sm text-secondary truncate">Ratnapura Alluvial Basin</div>
<span class="inline-flex items-center gap-1 text-[11px] font-label-sm text-primary bg-primary-fixed/40 px-2 py-0.5 rounded-full font-medium">
                  Pit 04 Certified
                </span>
</div>
</td>
<td class="py-4 px-space-sm">
<div class="space-y-0.5">
<div class="font-headline-sm text-[15px] font-bold text-on-surface">LKR 185,000</div>
<div class="text-[12px] font-label-sm text-tertiary font-semibold flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">account_balance_wallet</span>
<span>72% Escrow: LKR 133,200</span>
</div>
</div>
</td>
<td class="py-4 px-space-sm">
<div class="space-y-1">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-surface-container font-label-sm text-[11px] text-on-surface font-semibold">
<span class="material-symbols-outlined text-xs text-primary">encrypted</span>
                  1 in Armored Safe
                </span>
<div class="text-[11px] font-label-sm text-secondary flex items-center gap-1">
<span class="material-symbols-outlined text-xs text-outline">lock</span>
                  Safe #03 (Biometric)
                </div>
</div>
</td>
<td class="py-4 px-space-sm">
<div class="space-y-1">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-tertiary-fixed/40 font-label-sm text-[11px] text-on-tertiary-fixed-variant font-medium">
<span class="material-symbols-outlined text-xs text-tertiary">diamond</span>
                  NGJA Cert #RAT-4921
                </span>
<div class="text-[11px] font-label-sm text-secondary">Unheated &amp; Untreated</div>
</div>
</td>
<td class="py-4 pr-space-md pl-space-sm text-right">
<div class="flex items-center justify-end gap-1">
<button class="p-1.5 rounded-lg text-secondary hover:text-primary hover:bg-surface-container transition-colors" title="Edit Specifications">
<span class="material-symbols-outlined text-base">edit</span>
</button>
<button class="p-1.5 rounded-lg text-secondary hover:text-primary hover:bg-surface-container transition-colors" title="Manage Vault Stock">
<span class="material-symbols-outlined text-base">warehouse</span>
</button>
<button class="p-1.5 rounded-lg text-secondary hover:text-error hover:bg-error-container/40 transition-colors" title="Deactivate SKU">
<span class="material-symbols-outlined text-base">archive</span>
</button>
<button class="p-1.5 rounded-lg text-secondary hover:text-on-surface hover:bg-surface-container transition-colors" title="More Operations">
<span class="material-symbols-outlined text-base">more_vert</span>
</button>
</div>
</td>
</tr>
<!-- Row 3: Ceylon Linen Safari Jacket -->
<tr data-product-row data-name="Bespoke Ceylon Linen Safari Jacket" data-sku="LUV-MW-3104" data-status="published" data-stock="0" data-category="menswear" data-guild="Galle Fort Tailors" data-cert="Organic Island Linen" class="hover:bg-surface-container-low/50 transition-colors group">
<td class="py-4 pl-space-md pr-2 text-center">
<input class="row-check w-4 h-4 rounded text-primary focus:ring-0 cursor-pointer" type="checkbox"/>
</td>
<td class="py-4 px-space-sm">
<div class="flex items-center gap-space-sm">
<div class="relative w-14 h-18 shrink-0 rounded-lg overflow-hidden bg-surface-container">
<img class="w-full h-full object-cover" data-alt="Editorial men's high fashion shot of a sand-hued handspun Ceylon linen safari jacket with horn buttons, clean tailored lines, tropical architectural background." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAyMkJc9gOCtA7fYMl8GRV5x5CKt1bADFl0q-vUOlENxbSqtjPiCNWu2lr5QkUepaP4Nc6_VBDRdFQVlpfgZOCXIBn4u9wPfkmwjzDc0di1pcbgKLFUHpWQqPTTWLidFu2uYSZnxgydgTdarqvLJaVX3b0YfqK-rEQSQ_UiLXoy_FXcUSX76zHVtqi3jBSnvGIC9jbk0vTJpAECcNEWesF8kW9gYxATW77JGAj475ZYiEAFWPOCCxZM"/>
<span class="absolute bottom-1 right-1 px-1 py-0.2 rounded bg-surface-container-lowest/90 font-label-sm text-[9px] font-bold text-on-surface uppercase">Linen</span>
</div>
<div class="space-y-1 min-w-0">
<div class="font-headline-sm text-[15px] font-semibold text-on-surface truncate group-hover:text-primary transition-colors product-title cursor-pointer product-title cursor-pointer">
                    Bespoke Ceylon Linen Safari Jacket
                  </div>
<div class="flex items-center gap-2">
<span class="font-label-sm text-label-sm font-mono text-outline">#LUV-MW-3104</span>
<span class="px-2 py-0.5 rounded-full bg-surface-container font-label-sm text-[11px] text-secondary">Bespoke Menswear</span>
</div>
</div>
</div>
</td>
<td class="py-4 px-space-sm">
<div class="space-y-1">
<div class="font-semibold text-on-surface">Galle Fort Tailors</div>
<div class="font-label-sm text-label-sm text-secondary truncate">Master Cutters Collective</div>
<span class="inline-flex items-center gap-1 text-[11px] font-label-sm text-secondary bg-surface-container px-2 py-0.5 rounded-full font-medium">
                  Southern Province
                </span>
</div>
</td>
<td class="py-4 px-space-sm">
<div class="space-y-0.5">
<div class="font-headline-sm text-[15px] font-bold text-on-surface">LKR 42,800</div>
<div class="text-[12px] font-label-sm text-tertiary font-semibold flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">account_balance_wallet</span>
<span>58% Escrow: LKR 24,824</span>
</div>
</div>
</td>
<td class="py-4 px-space-sm">
<div class="space-y-1">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-secondary-container text-on-secondary-fixed text-[11px] font-label-sm font-semibold">
<span class="material-symbols-outlined text-xs">straighten</span>
                  Made-to-Order (Avg 4 Days)
                </span>
<div class="text-[11px] font-label-sm text-secondary flex items-center gap-1">
<span class="material-symbols-outlined text-xs text-outline">checkroom</span>
                  Atelier Fitting Rack 01
                </div>
</div>
</td>
<td class="py-4 px-space-sm">
<div class="space-y-1">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-surface-container font-label-sm text-[11px] text-on-surface font-medium">
<span class="material-symbols-outlined text-xs text-tertiary">eco</span>
                  100% Organic Island Linen
                </span>
<div class="text-[11px] font-label-sm text-secondary">Zero-Plastic Haberdashery</div>
</div>
</td>
<td class="py-4 pr-space-md pl-space-sm text-right">
<div class="flex items-center justify-end gap-1">
<button class="p-1.5 rounded-lg text-secondary hover:text-primary hover:bg-surface-container transition-colors" title="Edit Specifications">
<span class="material-symbols-outlined text-base">edit</span>
</button>
<button class="p-1.5 rounded-lg text-secondary hover:text-primary hover:bg-surface-container transition-colors" title="Manage Vault Stock">
<span class="material-symbols-outlined text-base">warehouse</span>
</button>
<button class="p-1.5 rounded-lg text-secondary hover:text-error hover:bg-error-container/40 transition-colors" title="Deactivate SKU">
<span class="material-symbols-outlined text-base">archive</span>
</button>
<button class="p-1.5 rounded-lg text-secondary hover:text-on-surface hover:bg-surface-container transition-colors" title="More Operations">
<span class="material-symbols-outlined text-base">more_vert</span>
</button>
</div>
</td>
</tr>
<!-- Row 4: Jaffna Hand-Woven Palmyrah Minaudière -->
<tr data-product-row data-name="Hand-Woven Palmyrah Minaudiere" data-sku="LUV-ACC-1109" data-status="published" data-stock="14" data-category="accessories" data-guild="Jaffna Women's Collective" data-cert="Eco-Certified Fiber" class="hover:bg-surface-container-low/50 transition-colors group">
<td class="py-4 pl-space-md pr-2 text-center">
<input class="row-check w-4 h-4 rounded text-primary focus:ring-0 cursor-pointer" type="checkbox"/>
</td>
<td class="py-4 px-space-sm">
<div class="flex items-center gap-space-sm">
<div class="relative w-14 h-18 shrink-0 rounded-lg overflow-hidden bg-surface-container">
<img class="w-full h-full object-cover" data-alt="Editorial product shot of an artisanal structured handbag clutch crafted from tightly hand-woven palmyrah leaf fiber with 24k gold-plated brass lock mechanism on minimalist beige stone pedestal." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBVrV9wgckqS-QlUvyeJpS_P6UFV4aATqmsYuLPQYCaiknCme51CNzmwjnLHry087iE0f001QBLtsRBDUNufv4oxhne_iIsANgUS3jdg7XvaHmlr-05CitoqAW7yLQZVRD_Ba42SXdLh0FBQS3HpiO2QkeB8TvXKsW43B6LSjaJfdM0iNL5kFM9nAQmR0V6qokgi-kfIiHdpZNoyiaHSOsCQ6uKM-reIHIf4fUgC1UuS-UhaK4x7yBz"/>
<span class="absolute bottom-1 right-1 px-1 py-0.2 rounded bg-surface-container-lowest/90 font-label-sm text-[9px] font-bold text-on-surface uppercase">Craft</span>
</div>
<div class="space-y-1 min-w-0">
<div class="font-headline-sm text-[15px] font-semibold text-on-surface truncate group-hover:text-primary transition-colors product-title cursor-pointer product-title cursor-pointer">
                    Hand-Woven Palmyrah Minaudière
                  </div>
<div class="flex items-center gap-2">
<span class="font-label-sm text-label-sm font-mono text-outline">#LUV-ACC-1109</span>
<span class="px-2 py-0.5 rounded-full bg-surface-container font-label-sm text-[11px] text-secondary">Artisanal Bags</span>
</div>
</div>
</div>
</td>
<td class="py-4 px-space-sm">
<div class="space-y-1">
<div class="font-semibold text-on-surface">Jaffna Women's Collective</div>
<div class="font-label-sm text-label-sm text-secondary truncate">Palmyrah Artisan Circle</div>
<span class="inline-flex items-center gap-1 text-[11px] font-label-sm text-tertiary-container bg-tertiary-fixed/30 px-2 py-0.5 rounded-full font-medium">
                  Northern Province
                </span>
</div>
</td>
<td class="py-4 px-space-sm">
<div class="space-y-0.5">
<div class="font-headline-sm text-[15px] font-bold text-on-surface">LKR 36,900</div>
<div class="text-[12px] font-label-sm text-tertiary font-semibold flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">account_balance_wallet</span>
<span>68% Escrow: LKR 25,092</span>
</div>
</div>
</td>
<td class="py-4 px-space-sm">
<div class="space-y-1">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-tertiary-fixed/40 text-on-tertiary-fixed-variant text-[11px] font-label-sm font-semibold">
<span class="h-1.5 w-1.5 rounded-full bg-tertiary"></span>
                  14 Available
                </span>
<div class="text-[11px] font-label-sm text-secondary flex items-center gap-1">
<span class="material-symbols-outlined text-xs text-outline">shelves</span>
                  Vault Shelf C-02
                </div>
</div>
</td>
<td class="py-4 px-space-sm">
<div class="space-y-1">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-surface-container font-label-sm text-[11px] text-on-surface font-medium">
<span class="material-symbols-outlined text-xs text-tertiary">spa</span>
                  Eco-Certified Fiber
                </span>
<div class="text-[11px] font-label-sm text-secondary">Fair-Trade Cooperative</div>
</div>
</td>
<td class="py-4 pr-space-md pl-space-sm text-right">
<div class="flex items-center justify-end gap-1">
<button class="p-1.5 rounded-lg text-secondary hover:text-primary hover:bg-surface-container transition-colors" title="Edit Specifications">
<span class="material-symbols-outlined text-base">edit</span>
</button>
<button class="p-1.5 rounded-lg text-secondary hover:text-primary hover:bg-surface-container transition-colors" title="Manage Vault Stock">
<span class="material-symbols-outlined text-base">warehouse</span>
</button>
<button class="p-1.5 rounded-lg text-secondary hover:text-error hover:bg-error-container/40 transition-colors" title="Deactivate SKU">
<span class="material-symbols-outlined text-base">archive</span>
</button>
<button class="p-1.5 rounded-lg text-secondary hover:text-on-surface hover:bg-surface-container transition-colors" title="More Operations">
<span class="material-symbols-outlined text-base">more_vert</span>
</button>
</div>
</td>
</tr>
<!-- Row 5: Botanical Pit-Loom Wrap Skirt -->
<tr data-product-row data-name="Botanical Pit-Loom Wrap Skirt" data-sku="LUV-HL-7734" data-status="published" data-stock="8" data-category="handloom" data-guild="Kandy Highlands Weavers" data-cert="Jackwood Natural Dye" class="hover:bg-surface-container-low/50 transition-colors group">
<td class="py-4 pl-space-md pr-2 text-center">
<input class="row-check w-4 h-4 rounded text-primary focus:ring-0 cursor-pointer" type="checkbox"/>
</td>
<td class="py-4 px-space-sm">
<div class="flex items-center gap-space-sm">
<div class="relative w-14 h-18 shrink-0 rounded-lg overflow-hidden bg-surface-container">
<img class="w-full h-full object-cover" data-alt="Editorial resort fashion imagery of a warm ochre and terracotta patterned wrap skirt crafted from hand-loomed natural raw cotton dyed with jackwood tree extracts, minimalist gallery backdrop." src="https://lh3.googleusercontent.com/aida-public/AB6AXuA776Z7VNlcGFPjlD8i4AtGqVdDyT-7CbfXp2-8DfiPkuXYZfnZxhJxq903dd-OSl41CR48tDEfyefz9WQ9I3ZPKVHOqP446HayyDQorG6QztaQeWAGY3YXKBetWVRbJB8mQP9P-B8D8GJnvqGdLEyYAP5VBvGsxQe1n4AQDSMkdYjTXHwSuTI7AS_DmUhskzySVM2POZ9IPdem32XQdPAG65gsr3n77Wp0739-DI32ihvHVRctHa5j"/>
<span class="absolute bottom-1 right-1 px-1 py-0.2 rounded bg-surface-container-lowest/90 font-label-sm text-[9px] font-bold text-on-surface uppercase">Cotton</span>
</div>
<div class="space-y-1 min-w-0">
<div class="font-headline-sm text-[15px] font-semibold text-on-surface truncate group-hover:text-primary transition-colors product-title cursor-pointer product-title cursor-pointer">
                    Botanical Pit-Loom Wrap Skirt
                  </div>
<div class="flex items-center gap-2">
<span class="font-label-sm text-label-sm font-mono text-outline">#LUV-HL-7734</span>
<span class="px-2 py-0.5 rounded-full bg-surface-container font-label-sm text-[11px] text-secondary">Women's Resort</span>
</div>
</div>
</div>
</td>
<td class="py-4 px-space-sm">
<div class="space-y-1">
<div class="font-semibold text-on-surface">Kandy Highlands Weavers</div>
<div class="font-label-sm text-label-sm text-secondary truncate">Aluvihare Village Circle</div>
<span class="inline-flex items-center gap-1 text-[11px] font-label-sm text-secondary bg-surface-container px-2 py-0.5 rounded-full font-medium">
                  Heritage Pit-Loom
                </span>
</div>
</td>
<td class="py-4 px-space-sm">
<div class="space-y-0.5">
<div class="font-headline-sm text-[15px] font-bold text-on-surface">LKR 28,400</div>
<div class="text-[12px] font-label-sm text-tertiary font-semibold flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">account_balance_wallet</span>
<span>62% Escrow: LKR 17,608</span>
</div>
</div>
</td>
<td class="py-4 px-space-sm">
<div class="space-y-1">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-tertiary-fixed/40 text-on-tertiary-fixed-variant text-[11px] font-label-sm font-semibold">
<span class="h-1.5 w-1.5 rounded-full bg-tertiary"></span>
                  8 Available
                </span>
<div class="text-[11px] font-label-sm text-secondary flex items-center gap-1">
<span class="material-symbols-outlined text-xs text-outline">shelves</span>
                  Vault Rack B-09
                </div>
</div>
</td>
<td class="py-4 px-space-sm">
<div class="space-y-1">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-surface-container font-label-sm text-[11px] text-on-surface font-medium">
<span class="material-symbols-outlined text-xs text-tertiary">psychiatry</span>
                  Jackwood Natural Dye
                </span>
<div class="text-[11px] font-label-sm text-secondary">Chemical-Free Mordant</div>
</div>
</td>
<td class="py-4 pr-space-md pl-space-sm text-right">
<div class="flex items-center justify-end gap-1">
<button class="p-1.5 rounded-lg text-secondary hover:text-primary hover:bg-surface-container transition-colors" title="Edit Specifications">
<span class="material-symbols-outlined text-base">edit</span>
</button>
<button class="p-1.5 rounded-lg text-secondary hover:text-primary hover:bg-surface-container transition-colors" title="Manage Vault Stock">
<span class="material-symbols-outlined text-base">warehouse</span>
</button>
<button class="p-1.5 rounded-lg text-secondary hover:text-error hover:bg-error-container/40 transition-colors" title="Deactivate SKU">
<span class="material-symbols-outlined text-base">archive</span>
</button>
<button class="p-1.5 rounded-lg text-secondary hover:text-on-surface hover:bg-surface-container transition-colors" title="More Operations">
<span class="material-symbols-outlined text-base">more_vert</span>
</button>
</div>
</td>
</tr>
<!-- Row 6: Beeralu Lace Trim Evening Kaftan -->
<tr data-product-row data-name="Beeralu Lace Trim Kaftan" data-sku="LUV-CT-5022" data-status="published" data-stock="3" data-category="couture" data-guild="Southern Lace Guild" data-cert="Beeralu Heritage Guild" class="hover:bg-surface-container-low/50 transition-colors group">
<td class="py-4 pl-space-md pr-2 text-center">
<input class="row-check w-4 h-4 rounded text-primary focus:ring-0 cursor-pointer" type="checkbox"/>
</td>
<td class="py-4 px-space-sm">
<div class="flex items-center gap-space-sm">
<div class="relative w-14 h-18 shrink-0 rounded-lg overflow-hidden bg-surface-container">
<img class="w-full h-full object-cover" data-alt="Fashion editorial portrait of an ivory silk chiffon evening kaftan adorned with intricate handmade Galle bobbin lace (Beeralu) along the neck and cuff trims, elegant evening light." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDOb-sa0cTM5G5MILX2MNFtCHYcZfghCA6fVRuGof0CIKqgf3Ig2crJbskXJjVDANEAvJ9hMVVeznJvkT9UD80fyUtv4u7UaiFFNjfPRF0BFfTVo2dgmxxE81mM5W6rvSbzFW_8kj-Yq0dWcYeuMmxYDdlzPRtSt-8xPpyUmKx7Ab9Wo5gFj3EHZZCDXqE7t0L5RRYGrnJFfduKTBAkIcaeepJo5vqjLqvshO7mNBhvGSHrJdE4OC7M"/>
<span class="absolute bottom-1 right-1 px-1 py-0.2 rounded bg-surface-container-lowest/90 font-label-sm text-[9px] font-bold text-on-surface uppercase">Lace</span>
</div>
<div class="space-y-1 min-w-0">
<div class="font-headline-sm text-[15px] font-semibold text-on-surface truncate group-hover:text-primary transition-colors product-title cursor-pointer product-title cursor-pointer">
                    Beeralu Lace Trim Kaftan
                  </div>
<div class="flex items-center gap-2">
<span class="font-label-sm text-label-sm font-mono text-outline">#LUV-CT-5022</span>
<span class="px-2 py-0.5 rounded-full bg-surface-container font-label-sm text-[11px] text-secondary">Haute Couture</span>
</div>
</div>
</div>
</td>
<td class="py-4 px-space-sm">
<div class="space-y-1">
<div class="font-semibold text-on-surface">Southern Lace Guild</div>
<div class="font-label-sm text-label-sm text-secondary truncate">Magalle Bobbin Weavers</div>
<span class="inline-flex items-center gap-1 text-[11px] font-label-sm text-secondary bg-surface-container px-2 py-0.5 rounded-full font-medium">
                  Southern Coast
                </span>
</div>
</td>
<td class="py-4 px-space-sm">
<div class="space-y-0.5">
<div class="font-headline-sm text-[15px] font-bold text-on-surface">LKR 68,500</div>
<div class="text-[12px] font-label-sm text-tertiary font-semibold flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">account_balance_wallet</span>
<span>60% Escrow: LKR 41,100</span>
</div>
</div>
</td>
<td class="py-4 px-space-sm">
<div class="space-y-1">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-error-container/40 text-error text-[11px] font-label-sm font-semibold">
<span class="h-1.5 w-1.5 rounded-full bg-error"></span>
                  3 Available (Low Stock)
                </span>
<div class="text-[11px] font-label-sm text-secondary flex items-center gap-1">
<span class="material-symbols-outlined text-xs text-outline">shelves</span>
                  Vault Rack B-01
                </div>
</div>
</td>
<td class="py-4 px-space-sm">
<div class="space-y-1">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-surface-container font-label-sm text-[11px] text-on-surface font-medium">
<span class="material-symbols-outlined text-xs text-primary">auto_awesome</span>
                  Beeralu Heritage Guild
                </span>
<div class="text-[11px] font-label-sm text-secondary">SLIDA Master Certified</div>
</div>
</td>
<td class="py-4 pr-space-md pl-space-sm text-right">
<div class="flex items-center justify-end gap-1">
<button class="p-1.5 rounded-lg text-secondary hover:text-primary hover:bg-surface-container transition-colors" title="Edit Specifications">
<span class="material-symbols-outlined text-base">edit</span>
</button>
<button class="p-1.5 rounded-lg text-secondary hover:text-primary hover:bg-surface-container transition-colors" title="Manage Vault Stock">
<span class="material-symbols-outlined text-base">warehouse</span>
</button>
<button class="p-1.5 rounded-lg text-secondary hover:text-error hover:bg-error-container/40 transition-colors" title="Deactivate SKU">
<span class="material-symbols-outlined text-base">archive</span>
</button>
<button class="p-1.5 rounded-lg text-secondary hover:text-on-surface hover:bg-surface-container transition-colors" title="More Operations">
<span class="material-symbols-outlined text-base">more_vert</span>
</button>
</div>
</td>
</tr>
<!-- Row 7: Ceylon Padparadscha Sapphire Gold Ring (Deactivated / Restock) -->
<tr data-product-row data-name="Ceylon Padparadscha Ring" data-sku="LUV-GEM-2041" data-status="archived" data-stock="0" data-category="jewelry" data-guild="Elahera Artisans" data-cert="GIA Provenance Deed" class="hover:bg-surface-container-low/50 transition-colors group opacity-85">
<td class="py-4 pl-space-md pr-2 text-center">
<input class="row-check w-4 h-4 rounded text-primary focus:ring-0 cursor-pointer" type="checkbox"/>
</td>
<td class="py-4 px-space-sm">
<div class="flex items-center gap-space-sm">
<div class="relative w-14 h-18 shrink-0 rounded-lg overflow-hidden bg-surface-container">
<img class="w-full h-full object-cover" data-alt="Editorial high jewelry macro shot of a luminous pink-orange Padparadscha sapphire mounted on an 18k yellow gold sculptural band, clean reflections on black reflective stone." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCJ4ne4b-T8BaIodK-0ROTStolGcSWenSTOxqZ-5hTwd_kst4D4bh20ls-brMtxbXEFQZvWPWpoND1884l07xVKPaz2tP97cFHM5e77cvxOQnZP77dPU3DsKsCvfXw3j25SjTMo3Es2Cg-pfpOQy7skgPCNhcIjiPlgLrdspdsiqu_N1TLnEN5vRiVyNGNJxnoxgJ-_r1fMJvzLzggadSq25wEFhtz6CIB7_YjNeqQ4yPNuD66iiRln"/>
<span class="absolute bottom-1 right-1 px-1 py-0.2 rounded bg-surface-container-lowest/90 font-label-sm text-[9px] font-bold text-on-surface uppercase">18K</span>
</div>
<div class="space-y-1 min-w-0">
<div class="font-headline-sm text-[15px] font-semibold text-on-surface truncate group-hover:text-primary transition-colors product-title cursor-pointer product-title cursor-pointer">
                    Ceylon Padparadscha Ring
                  </div>
<div class="flex items-center gap-2">
<span class="font-label-sm text-label-sm font-mono text-outline">#LUV-GEM-2041</span>
<span class="px-2 py-0.5 rounded-full bg-surface-container font-label-sm text-[11px] text-secondary">High Solitaire</span>
</div>
</div>
</div>
</td>
<td class="py-4 px-space-sm">
<div class="space-y-1">
<div class="font-semibold text-on-surface">Elahera Artisans</div>
<div class="font-label-sm text-label-sm text-secondary truncate">Polonnaruwa River Guild</div>
<span class="inline-flex items-center gap-1 text-[11px] font-label-sm text-secondary bg-surface-container px-2 py-0.5 rounded-full font-medium">
                  Central Basin
                </span>
</div>
</td>
<td class="py-4 px-space-sm">
<div class="space-y-0.5">
<div class="font-headline-sm text-[15px] font-bold text-on-surface">LKR 320,000</div>
<div class="text-[12px] font-label-sm text-tertiary font-semibold flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">account_balance_wallet</span>
<span>75% Escrow: LKR 240,000</span>
</div>
</div>
</td>
<td class="py-4 px-space-sm">
<div class="space-y-1">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-surface-container font-label-sm text-[11px] text-secondary font-semibold">
<span class="material-symbols-outlined text-xs">block</span>
                  0 (Sold Out / Restock)
                </span>
<div class="text-[11px] font-label-sm text-secondary flex items-center gap-1">
<span class="material-symbols-outlined text-xs text-outline">lock_clock</span>
                  Safe #01 (Replenishing)
                </div>
</div>
</td>
<td class="py-4 px-space-sm">
<div class="space-y-1">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-error-container/30 font-label-sm text-[11px] text-error font-medium">
<span class="material-symbols-outlined text-xs">inventory_2</span>
                  Deactivated • Seasonal Restock
                </span>
<div class="text-[11px] font-label-sm text-secondary">GIA Provenance Deed Vaulted</div>
</div>
</td>
<td class="py-4 pr-space-md pl-space-sm text-right">
<div class="flex items-center justify-end gap-1">
<button class="p-1.5 rounded-lg text-secondary hover:text-primary hover:bg-surface-container transition-colors" title="Edit Specifications">
<span class="material-symbols-outlined text-base">edit</span>
</button>
<button class="p-1.5 rounded-lg text-tertiary hover:bg-tertiary-fixed/30 transition-colors" title="Reactivate SKU">
<span class="material-symbols-outlined text-base">unarchive</span>
</button>
<button class="p-1.5 rounded-lg text-secondary hover:text-on-surface hover:bg-surface-container transition-colors" title="More Operations">
<span class="material-symbols-outlined text-base">more_vert</span>
</button>
</div>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Table Pagination & Ledger Bar -->
<div class="bg-surface-container-low px-space-md py-space-sm flex flex-col md:flex-row items-center justify-between gap-space-md">
<!-- Showing Results Status -->
<div class="flex items-center gap-space-md">
<span class="font-body-sm text-body-sm text-secondary">
          Showing <span class="font-semibold text-on-surface" id="products-range">0–0</span> of <span class="font-semibold text-on-surface" id="products-total">0</span> master products
        </span>
<div class="flex items-center gap-2">
<span class="font-label-sm text-label-sm text-outline">Per page:</span>
<select id="products-page-size" aria-label="Products per page" class="bg-surface-container-lowest text-on-surface font-label-sm text-label-sm px-2 py-1 rounded shadow-xs focus:outline-none">
<option>10</option>
<option>25</option>
<option>50</option>
<option>100</option>
</select>
</div>
</div>
<!-- Pagination Buttons -->
<div class="flex items-center gap-1">
<button type="button" data-products-page="previous" aria-label="Previous page" class="p-1.5 rounded bg-surface-container-lowest text-outline hover:text-on-surface shadow-xs transition-colors disabled:opacity-40" disabled>
<span class="material-symbols-outlined text-base">chevron_left</span>
</button>
<div id="products-page-buttons" class="flex items-center gap-1" aria-label="Products pages"></div>
<button type="button" data-products-page="next" aria-label="Next page" class="p-1.5 rounded bg-surface-container-lowest text-secondary hover:text-on-surface shadow-xs transition-colors" disabled>
<span class="material-symbols-outlined text-base">chevron_right</span>
</button>
</div>
</div>
</div>
<!-- Bottom System Ledger Audit Status Line -->
<div class="flex flex-col sm:flex-row items-center justify-between gap-space-sm pb-space-lg text-secondary font-label-sm text-label-sm">
<div class="flex items-center gap-2">
<span class="h-2 w-2 rounded-full bg-tertiary"></span>
<span>Central Bank of Sri Lanka (CBSL) Escrow Ledger Node #LK-COL-7 Synchronized</span>
</div>
<div class="flex items-center gap-space-sm">
<span>Colombo 07 Safe Assayed: Today at 15:42 SLST</span>
<span>•</span>
<span class="text-primary font-semibold hover:underline cursor-pointer">Re-index Provenance Hashes</span>
</div>
</div>
</div>
</main></div><dialog id="product-dialog"><form method="dialog"><header style="padding:16px 20px;border-bottom:1px solid #e0e3e5;display:flex;justify-content:space-between;align-items:center"><div><div style="font:600 10px Inter,sans-serif;color:#005baf;text-transform:uppercase">Catalog workspace</div><h2 id="product-dialog-title" style="font:500 24px Bodoni Moda,serif;margin:4px 0 0">Product</h2></div><button value="close" aria-label="Close">×</button></header><div id="product-dialog-content" style="padding:18px 20px;max-height:65vh;overflow:auto"></div><footer style="display:flex;justify-content:flex-end;gap:8px;padding:12px 20px;border-top:1px solid #e0e3e5"><button value="close" class="px-3 py-2 rounded bg-surface-container">Close</button><button id="save-product-preview" type="button" class="px-3 py-2 rounded bg-primary text-on-primary">Save preview</button></footer></form></dialog><div class="catalog-toast" id="catalog-toast" role="status" aria-live="polite"></div><script>
const catalogRows = [...document.querySelectorAll('[data-product-row]')];
const catalogSearch = document.getElementById('catalog-search');
let activeSegment = 'all';
let currentProductsPage = 1;
const productsPageSize = document.getElementById('products-page-size');
const productsRange = document.getElementById('products-range');
const productsTotal = document.getElementById('products-total');
const productsPageButtons = document.getElementById('products-page-buttons');

function renderProductsPagination(matchingRows) {
    const pageSize = Number(productsPageSize.value) || 10;
    const pageCount = Math.max(1, Math.ceil(matchingRows.length / pageSize));
    currentProductsPage = Math.min(currentProductsPage, pageCount);
    const start = matchingRows.length ? (currentProductsPage - 1) * pageSize : 0;
    const end = Math.min(start + pageSize, matchingRows.length);

    catalogRows.forEach((row) => { row.hidden = true; });
    matchingRows.slice(start, end).forEach((row) => { row.hidden = false; });
    productsRange.textContent = matchingRows.length ? `${start + 1}–${end}` : '0–0';
    productsTotal.textContent = String(matchingRows.length);

    productsPageButtons.replaceChildren();
    const pages = pageCount <= 5
        ? Array.from({ length: pageCount }, (_, index) => index + 1)
        : [...new Set([1, currentProductsPage - 1, currentProductsPage, currentProductsPage + 1, pageCount].filter((page) => page >= 1 && page <= pageCount))];
    let previousPage = 0;
    pages.forEach((page) => {
        if (previousPage && page - previousPage > 1) {
            const ellipsis = document.createElement('span');
            ellipsis.className = 'px-1 text-outline font-label-sm text-label-sm';
            ellipsis.textContent = '…';
            productsPageButtons.append(ellipsis);
        }
        const button = document.createElement('button');
        button.type = 'button';
        button.textContent = String(page);
        button.setAttribute('aria-label', `Page ${page}`);
        button.setAttribute('aria-current', page === currentProductsPage ? 'page' : 'false');
        button.className = page === currentProductsPage
            ? 'w-8 h-8 rounded bg-primary text-on-primary font-label-sm text-label-sm font-semibold flex items-center justify-center shadow-xs'
            : 'w-8 h-8 rounded bg-surface-container-lowest text-secondary hover:text-on-surface font-label-sm text-label-sm font-medium flex items-center justify-center shadow-xs transition-colors';
        button.addEventListener('click', () => { currentProductsPage = page; refreshCatalog(); });
        productsPageButtons.append(button);
        previousPage = page;
    });

    document.querySelector('[data-products-page="previous"]').disabled = currentProductsPage <= 1;
    document.querySelector('[data-products-page="next"]').disabled = currentProductsPage >= pageCount;
}

function refreshCatalog() {
    const query = catalogSearch.value.trim().toLowerCase();
    const matchingRows = catalogRows.filter((row) => {
        const stock = Number(row.dataset.stock || 0);
        const status = row.dataset.status || 'published';
        const haystack = `${row.dataset.name} ${row.dataset.sku} ${row.dataset.guild} ${row.dataset.cert}`.toLowerCase();
        const matchesSegment = activeSegment === 'all'
            || (activeSegment === 'active' && status === 'published')
            || (activeSegment === 'low' && stock > 0 && stock <= 3)
            || (activeSegment === 'archived' && status === 'archived')
            || (activeSegment === 'drafts' && status === 'draft');

        return haystack.includes(query) && matchesSegment;
    });
    renderProductsPagination(matchingRows);
    document.getElementById('catalog-total-count').textContent = String(catalogRows.length);
    document.querySelectorAll('.segment-tab').forEach((tab) => {
        const segment = tab.dataset.segment;
        const count = catalogRows.filter((row) => {
            const stock = Number(row.dataset.stock || 0);
            const status = row.dataset.status || 'published';
            return segment === 'all'
                || (segment === 'active' && status === 'published')
                || (segment === 'low' && stock > 0 && stock <= 3)
                || (segment === 'archived' && status === 'archived')
                || (segment === 'drafts' && status === 'draft');
        }).length;
        const label = tab.textContent.trim().replace(/\s*\(\d+\)$/, '');
        tab.textContent = `${label} (${count})`;
    });
}

catalogSearch.addEventListener('input', () => { currentProductsPage = 1; refreshCatalog(); });
productsPageSize.addEventListener('change', () => { currentProductsPage = 1; refreshCatalog(); });
document.querySelector('[data-products-page="previous"]').addEventListener('click', () => { currentProductsPage--; refreshCatalog(); });
document.querySelector('[data-products-page="next"]').addEventListener('click', () => { currentProductsPage++; refreshCatalog(); });
document.querySelectorAll('.segment-tab').forEach((tab) => tab.addEventListener('click', () => {
    currentProductsPage = 1;
    activeSegment = tab.dataset.segment;
    document.querySelectorAll('.segment-tab').forEach((item) => {
        item.classList.toggle('bg-surface-container-lowest', item === tab);
        item.classList.toggle('font-semibold', item === tab);
    });
    refreshCatalog();
}));

const masterCheckbox = document.getElementById('bulk-select-all');
function updateSelectedCount() {
    const selected = document.querySelectorAll('.row-check:checked').length;
    document.getElementById('selected-label').textContent = `Selected ${selected} of ${catalogRows.filter((row) => !row.hidden).length} items`;
}
masterCheckbox.addEventListener('change', (event) => {
    catalogRows.filter((row) => !row.hidden).forEach((row) => {
        row.querySelector('.row-check').checked = event.target.checked;
    });
    updateSelectedCount();
});
document.querySelectorAll('.row-check').forEach((checkbox) => checkbox.addEventListener('change', updateSelectedCount));
refreshCatalog();

const message = document.getElementById('catalog-toast');
let messageTimer;
function notify(text) {
    message.textContent = text;
    message.classList.add('visible');
    clearTimeout(messageTimer);
    messageTimer = setTimeout(() => message.classList.remove('visible'), 2300);
}

const dialog = document.getElementById('product-dialog');
const dialogTitle = document.getElementById('product-dialog-title');
const dialogContent = document.getElementById('product-dialog-content');
const saveButton = document.getElementById('save-product-preview');
let editingRow = null;

function openProductDialog(row, mode) {
    editingRow = row;
    const name = row?.dataset.name || '';
    const sku = row?.dataset.sku || '';
    const image = row?.querySelector('img')?.src || '';
    dialogTitle.textContent = mode === 'add' ? 'Add new product' : name;
    saveButton.hidden = mode === 'details';

    if (mode === 'details') {
        dialogContent.innerHTML = `<div style="display:grid;grid-template-columns:150px 1fr;gap:16px"><img src="${image}" alt="${name}" style="width:150px;height:190px;object-fit:cover;border-radius:8px"><div><h3>${name}</h3><p>SKU: ${sku}<br>Artisan guild: ${row.dataset.guild}<br>Certification: ${row.dataset.cert}</p><p>Variants: ${row.dataset.variants || 'Material, size, finish and variant-specific SKUs.'}</p><label class="gallery-upload">Add gallery images<input type="file" accept="image/*" multiple></label><div class="gallery-preview" style="display:flex;gap:6px;margin-top:9px"></div></div></div>`;
    } else {
        dialogContent.innerHTML = `<div class="product-form"><label>Product name<input id="product-name-field" value="${name}" required></label><label>SKU<input id="product-sku-field" value="${sku}" required></label><label>Category<input id="product-category-field" value="${row?.dataset.category || ''}"></label><label>Publication state<select id="product-state-field"><option value="published">Published</option><option value="draft">Unpublished · Draft</option><option value="archived">Archived</option></select></label><label class="wide">Variants and variant SKUs<textarea placeholder="Option · SKU · stock"></textarea></label><label class="wide">Product details<textarea placeholder="Materials, sizing, artisan details, provenance"></textarea></label><label class="wide">Product images and gallery<input type="file" accept="image/*" multiple><div class="gallery-preview" style="display:flex;gap:6px;margin-top:8px"></div></label></div>`;
        if (row) document.getElementById('product-state-field').value = row.dataset.status || 'published';
    }

    dialogContent.querySelectorAll('input[type="file"]').forEach((input) => input.addEventListener('change', () => {
        const preview = dialogContent.querySelector('.gallery-preview');
        if (!preview) return;
        [...input.files].forEach((file) => {
            const imagePreview = document.createElement('img');
            imagePreview.src = URL.createObjectURL(file);
            imagePreview.alt = `Selected image: ${file.name}`;
            imagePreview.style.cssText = 'width:48px;height:58px;object-fit:cover;border-radius:5px';
            preview.append(imagePreview);
        });
    }));

    dialog.showModal();
}

document.querySelectorAll('.product-title').forEach((title) => title.addEventListener('click', () => openProductDialog(title.closest('tr'), 'details')));
document.querySelectorAll('[title="Edit Specifications"]').forEach((button) => button.addEventListener('click', () => openProductDialog(button.closest('tr'), 'edit')));
document.querySelectorAll('[title="Manage Vault Stock"]').forEach((button) => button.addEventListener('click', () => notify('Stock adjustment selected.')));
document.querySelectorAll('[title="Deactivate SKU"], [title="Reactivate SKU"]').forEach((button) => button.addEventListener('click', () => {
    const row = button.closest('tr');
    row.dataset.status = row.dataset.status === 'archived' ? 'published' : 'archived';
    button.title = row.dataset.status === 'archived' ? 'Reactivate SKU' : 'Deactivate SKU';
    row.classList.toggle('opacity-85');
    const statusBadge = row.querySelector('[data-publication-state]');
    if (statusBadge) statusBadge.textContent = row.dataset.status === 'archived' ? 'Archived' : 'Published';
    notify(`SKU ${row.dataset.status} in this preview.`);
    refreshCatalog();
}));

document.querySelectorAll('button').forEach((button) => {
    const label = button.innerText.trim();
    if (/Add New Product/.test(label)) button.addEventListener('click', () => openProductDialog(null, 'add'));
    if (/Export Spec Dossier|Bulk Stock Audit|Barcode Mode|Adjust Stock Levels|Update Guild Escrow Split|Archive Selected/.test(label)) {
        button.addEventListener('click', () => notify(`${label} selected.`));
    }
});

saveButton.addEventListener('click', () => {
    const name = document.getElementById('product-name-field')?.value.trim();
    const sku = document.getElementById('product-sku-field')?.value.trim();
    const variants = dialogContent.querySelector('textarea')?.value.trim() || '';
    const imageFile = dialogContent.querySelector('input[type="file"]')?.files?.[0];
    if (!name || !sku) return notify('Product name and SKU are required.');
    if (editingRow) {
        editingRow.dataset.name = name;
        editingRow.dataset.sku = sku;
        editingRow.dataset.status = document.getElementById('product-state-field').value;
        editingRow.dataset.variants = variants;
        editingRow.querySelector('.product-title').textContent = name;
        if (imageFile && editingRow.querySelector('img')) editingRow.querySelector('img').src = URL.createObjectURL(imageFile);
        const skuLabel = [...editingRow.querySelectorAll('span')].find((node) => node.textContent.includes('LUV-'));
        if (skuLabel) skuLabel.textContent = `#${sku}`;
        const statusBadge = editingRow.querySelector('[data-publication-state]');
        const visibleStatus = statusBadge || document.createElement('span');
        visibleStatus.textContent = editingRow.dataset.status === 'draft' ? 'Unpublished · Draft' : editingRow.dataset.status;
        if (!statusBadge) {
            visibleStatus.dataset.publicationState = '';
            visibleStatus.className = 'text-[10px] text-secondary';
            editingRow.querySelector('.product-title').parentElement.append(visibleStatus);
        }
    } else {
        const category = document.getElementById('product-category-field').value.trim() || 'uncategorized';
        const status = document.getElementById('product-state-field').value;
        const imageFile = dialogContent.querySelector('input[type="file"]')?.files?.[0];
        const imageMarkup = imageFile ? `<img src="${URL.createObjectURL(imageFile)}" alt="${name}" class="w-14 h-18 shrink-0 rounded-lg object-cover">` : '<div class="w-14 h-18 shrink-0 rounded-lg overflow-hidden bg-surface-container"></div>';
        const row = document.createElement('tr');
        row.dataset.productRow = '';
        row.dataset.name = name;
        row.dataset.sku = sku;
        row.dataset.status = status;
        row.dataset.stock = '0';
        row.dataset.category = category;
        row.dataset.guild = 'Luvora catalog';
        row.dataset.cert = 'Pending';
        row.dataset.variants = variants;
        row.className = 'hover:bg-surface-container-low/50 transition-colors group';
        row.innerHTML = `<td class="py-4 pl-space-md pr-2 text-center"><input class="row-check w-4 h-4 rounded text-primary" type="checkbox" aria-label="Select ${name}"></td><td class="py-4 px-space-sm"><div class="flex items-center gap-space-sm">${imageMarkup}<div><div class="product-title font-headline-sm text-[15px] font-semibold text-on-surface cursor-pointer">${name}</div><div class="flex items-center gap-2"><span class="font-label-sm text-label-sm font-mono text-outline">#${sku}</span><span class="px-2 py-0.5 rounded-full bg-surface-container font-label-sm text-[11px] text-secondary">${category}</span></div><span data-publication-state class="text-[10px] text-secondary">${status === 'draft' ? 'Unpublished · Draft' : status}</span></div></div></td><td class="py-4 px-space-sm"><div class="font-semibold">Luvora catalog</div><div class="text-[11px] text-secondary">Provenance pending</div></td><td class="py-4 px-space-sm"><div class="font-headline-sm text-[15px] font-bold">Price pending</div><div class="text-[11px] text-secondary">Escrow not assigned</div></td><td class="py-4 px-space-sm"><span class="inline-flex px-2 py-0.5 rounded-full bg-surface-container text-[11px]">0 available</span></td><td class="py-4 px-space-sm"><span class="inline-flex px-2.5 py-0.5 rounded-full bg-surface-container text-[11px]">Certification pending</span></td><td class="py-4 pr-space-md pl-space-sm text-right"><div class="flex items-center justify-end gap-1"><button class="p-1.5 rounded-lg" title="Edit Specifications"><span class="material-symbols-outlined text-base">edit</span></button><button class="p-1.5 rounded-lg" title="Deactivate SKU"><span class="material-symbols-outlined text-base">archive</span></button></div></td>`;
        document.querySelector('tbody').prepend(row);
        catalogRows.unshift(row);
        row.querySelector('.product-title').addEventListener('click', () => openProductDialog(row, 'details'));
        row.querySelector('[title="Edit Specifications"]').addEventListener('click', () => openProductDialog(row, 'edit'));
        row.querySelector('[title="Deactivate SKU"]').addEventListener('click', () => {
            row.dataset.status = row.dataset.status === 'archived' ? 'published' : 'archived';
            notify(`Product ${row.dataset.status} in this preview.`);
            refreshCatalog();
        });
        row.querySelector('.row-check').addEventListener('change', updateSelectedCount);
        currentProductsPage = 1;
    }
    dialog.close();
    notify(editingRow ? 'Product updated in this page preview.' : 'Product added to this page preview.');
    refreshCatalog();
});

document.querySelectorAll('[data-view="table"], [data-view="grid"]').forEach((button) => button.addEventListener('click', () => notify(`${button.dataset.view} view selected.`)));

</script></body></html>








