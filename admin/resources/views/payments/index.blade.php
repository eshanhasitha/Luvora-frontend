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
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/></head><body class="bg-surface text-on-surface">@include('partials.sidebar')<div class="md:pl-64"><header class="fixed top-0 left-0 right-0 md:left-64 h-20 bg-surface/80 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)] z-40 px-gutter-lg flex items-center justify-between"><button type="button" class="mr-3 inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-white text-slate-700 shadow-sm md:hidden" aria-label="Toggle admin navigation" aria-controls="admin-sidebar" aria-expanded="false" onclick="const nav=document.getElementById('admin-sidebar');const open=nav.classList.toggle('-translate-x-full');this.setAttribute('aria-expanded',String(!open))"><span class="material-symbols-outlined">menu</span></button><div class="flex min-w-0 items-center gap-space-md flex-1 max-w-2xl"><div class="flex items-center gap-space-xs bg-surface-container-low px-space-sm py-2 rounded-full"><span class="material-symbols-outlined text-base text-primary">storefront</span><span class="font-label-sm text-label-sm text-on-surface font-semibold">Colombo 07 Flagship</span><span class="material-symbols-outlined text-sm text-outline">expand_more</span></div><div class="relative flex-1"><span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-lg">search</span><input class="w-full bg-surface-container-lowest pl-10 pr-4 py-2 rounded-full font-body-sm text-body-sm text-on-surface placeholder:text-outline focus:outline-none shadow-[0_1px_3px_0_rgba(15,23,42,0.04)]" placeholder="Search SKUs, high jewelry orders, sovereign patrons..." type="text"/></div></div><div class="flex items-center gap-space-md"><div class="flex items-center gap-space-xs bg-tertiary-fixed/30 px-space-sm py-1.5 rounded-full"><span class="h-2 w-2 rounded-full bg-tertiary"></span><span class="font-label-sm text-label-sm text-on-tertiary-fixed-variant font-medium">CBSL Escrow Synchronized</span></div><button class="relative p-2 rounded-full bg-surface-container-lowest text-on-surface-variant hover:text-on-surface shadow-[0_1px_3px_0_rgba(15,23,42,0.04)]"><span class="material-symbols-outlined text-xl">notifications</span><span class="absolute top-1 right-1 h-2 w-2 rounded-full bg-error"></span></button><div class="flex items-center gap-space-sm pl-space-xs"><a href="{{ route('admin.profile') }}" aria-label="Open admin profile" title="Admin profile">@include('partials.profile-avatar', ['avatarSize' => 'h-8 w-8'])</a><div class="hidden xl:flex flex-col text-right"><span class="font-label-md text-label-md text-on-surface font-medium">{{ data_get(session('admin_user'), 'name') ?? data_get(session('admin_user'), 'Name') ?? 'Admin user' }}</span><span class="font-label-sm text-label-sm text-secondary">{{ data_get(session('admin_user'), 'role') ?? data_get(session('admin_user'), 'Role') ?? 'Administrator' }}</span></div></div></div></header><main class="w-full pt-20 px-gutter-lg bg-surface min-h-screen">@include('partials.api-state')<div class="flex flex-col w-full pb-space-xl">
<!-- Dynamic Sidebar Nav State Sync (Orders & Escrow > Gem Escrow Vault active highlight) -->
<script>
    (function() {
      const activePath = 'gem-escrow-vault';
      document.querySelectorAll('aside nav a').forEach(link => {
        if (link.getAttribute('data-path') === activePath) {
          link.className = 'flex items-center gap-space-sm px-space-sm py-2 rounded-lg bg-primary-container text-on-primary-container font-semibold transition-all shadow-sm';
        }
      });
    })();
  </script>
<!-- Top Breadcrumb & Executive Command Bar -->
<div class="flex flex-col md:flex-row md:items-center justify-between gap-space-md py-space-sm">
<div class="flex flex-col">
<div class="flex items-center gap-2 text-label-sm font-label-sm text-secondary tracking-wider uppercase">
<span>Executive Portal</span>
<span class="text-outline-variant">/</span>
<span>Orders &amp; Escrow</span>
<span class="text-outline-variant">/</span>
<span class="text-primary font-semibold">Payments &amp; Settlements (Page 40)</span>
</div>
<div class="flex items-center gap-3 mt-1">
<h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">Payments &amp; Escrow Settlements</h1>
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-label-sm font-label-sm bg-tertiary-fixed/40 text-on-tertiary-fixed-variant">
<span class="w-1.5 h-1.5 rounded-full bg-tertiary mr-1.5 animate-pulse"></span>
          CBSL RTGS Node #99-C
        </span>
</div>
</div>
<!-- Action Buttons -->
<div class="flex items-center flex-wrap gap-space-xs">
<button class="flex items-center gap-space-xs px-4 py-2 rounded-full bg-surface-container-lowest text-on-surface hover:bg-surface-container font-label-md text-label-md shadow-sm transition-all">
<span class="material-symbols-outlined text-lg text-secondary">tune</span>
<span>Automated Escrow Rules</span>
</button>
<button class="flex items-center gap-space-xs px-4 py-2 rounded-full bg-surface-container-lowest text-on-surface hover:bg-surface-container font-label-md text-label-md shadow-sm transition-all">
<span class="material-symbols-outlined text-lg text-secondary">download</span>
<span>Export Financial Ledger</span>
</button>
<button class="flex items-center gap-space-xs px-4 py-2 rounded-full bg-primary-container text-on-primary-container hover:bg-primary font-label-md text-label-md shadow-sm transition-all">
<span class="material-symbols-outlined text-lg">sync_alt</span>
<span>+ Manual RTGS Reconciliation</span>
</button>
</div>
</div>
<nav class="mb-space-md flex flex-wrap gap-2 rounded-xl bg-surface-container-lowest p-2 shadow-sm" aria-label="Finance pages"><a class="rounded-full bg-primary px-4 py-2 text-xs font-semibold text-on-primary" href="{{ route('payments.index') }}">Transactions</a><a class="rounded-full px-4 py-2 text-xs hover:bg-surface-container" href="{{ route('payments.details') }}">Payment details</a><a class="rounded-full px-4 py-2 text-xs hover:bg-surface-container" href="{{ route('payments.refunds') }}">Refund management</a><a class="rounded-full px-4 py-2 text-xs hover:bg-surface-container" href="{{ route('payments.failed') }}">Failed payments</a><a class="rounded-full px-4 py-2 text-xs hover:bg-surface-container" href="{{ route('payments.reports') }}">Financial reports</a></nav><!-- Metric Strip: 4 Live KPI Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-space-md mt-space-md">
<!-- Card 1: Total Settled Intake -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between relative overflow-hidden group hover:shadow-md transition-shadow">
<div class="flex items-start justify-between">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary">Total Settled Intake</span>
<div class="mt-1 font-headline-md text-headline-md text-on-surface font-semibold tracking-tight">LKR 48,290,400</div>
</div>
<div class="w-10 h-10 rounded-full bg-primary-fixed flex items-center justify-center text-on-primary-fixed">
<span class="material-symbols-outlined text-xl">payments</span>
</div>
</div>
<div class="mt-4 flex items-center justify-between pt-2">
<div class="flex items-center gap-1.5 text-label-sm font-label-sm text-tertiary">
<span class="material-symbols-outlined text-sm font-bold">arrow_upward</span>
<span>+18.4% MoM</span>
</div>
<span id="payment-cleared-count" class="font-label-sm text-label-sm text-secondary">0 Cleared TXNs</span>
</div>
<div class="absolute -right-6 -bottom-6 w-24 h-24 rounded-full bg-primary/5 pointer-events-none"></div>
</div>
<!-- Card 2: Escrow Vault Locked -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between relative overflow-hidden group hover:shadow-md transition-shadow">
<div class="flex items-start justify-between">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary">Escrow Vault Locked</span>
<div class="mt-1 font-headline-md text-headline-md text-on-surface font-semibold tracking-tight">LKR 4,620,000</div>
</div>
<div class="w-10 h-10 rounded-full bg-secondary-container flex items-center justify-center text-on-secondary-fixed">
<span class="material-symbols-outlined text-xl">lock_clock</span>
</div>
</div>
<div class="mt-4 flex items-center gap-1.5 pt-2">
<span class="inline-block w-2 h-2 rounded-full bg-error animate-ping"></span>
<span class="font-label-sm text-label-sm text-on-surface-variant truncate">Awaiting doorstep biometric fitting sign-off</span>
</div>
<div class="absolute -right-6 -bottom-6 w-24 h-24 rounded-full bg-secondary/5 pointer-events-none"></div>
</div>
<!-- Card 3: Gateway SLA & Success Rate -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between relative overflow-hidden group hover:shadow-md transition-shadow">
<div class="flex items-start justify-between">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary">Gateway SLA &amp; Speed</span>
<div class="mt-1 font-headline-md text-headline-md text-on-surface font-semibold tracking-tight">99.85%</div>
</div>
<div class="w-10 h-10 rounded-full bg-tertiary-fixed flex items-center justify-center text-on-tertiary-fixed">
<span class="material-symbols-outlined text-xl">speed</span>
</div>
</div>
<div class="mt-4 flex items-center justify-between pt-2">
<span class="font-label-sm text-label-sm text-tertiary font-medium">Avg latency: 1.2s</span>
<span class="font-label-sm text-label-sm text-secondary">CBSL &amp; LankaPay</span>
</div>
<div class="absolute -right-6 -bottom-6 w-24 h-24 rounded-full bg-tertiary/5 pointer-events-none"></div>
</div>
<!-- Card 4: Artisan Payout Pool -->
<div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between relative overflow-hidden group hover:shadow-md transition-shadow">
<div class="flex items-start justify-between">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary">Artisan Partition Pool</span>
<div class="mt-1 font-headline-md text-headline-md text-on-surface font-semibold tracking-tight">LKR 30,905,800</div>
</div>
<div class="w-10 h-10 rounded-full bg-primary-fixed-dim/40 flex items-center justify-center text-on-primary-fixed-variant">
<span class="material-symbols-outlined text-xl">diversity_3</span>
</div>
</div>
<div class="mt-4 flex items-center justify-between pt-2">
<span class="font-label-sm text-label-sm text-primary font-medium">64% Guild Cut Auto-Split</span>
<span class="font-label-sm text-label-sm text-secondary">Dumbara &amp; Ratnapura</span>
</div>
<div class="absolute -right-6 -bottom-6 w-24 h-24 rounded-full bg-primary-fixed/10 pointer-events-none"></div>
</div>
</div>
<!-- Filter & Segment Container -->
<div class="mt-space-lg rounded-xl bg-surface-container-lowest p-space-md shadow-sm space-y-space-md">
<!-- Filter Tabs with Counter Badges -->
<div class="flex items-center gap-space-xs overflow-x-auto pb-1">
<button class="px-4 py-2 rounded-full bg-on-surface text-surface font-label-md text-label-md flex items-center gap-2 whitespace-nowrap shadow-sm">
<span>All Payments</span>
<span id="payment-total-count" class="px-1.5 py-0.5 text-label-sm font-label-sm rounded-full bg-surface/20 text-surface">0</span>
</button>
<button class="px-4 py-2 rounded-full bg-surface-container-low text-on-surface-variant hover:bg-surface-container font-label-md text-label-md flex items-center gap-2 whitespace-nowrap transition-colors">
<span>Escrow Locked</span>
<span class="px-1.5 py-0.5 text-label-sm font-label-sm rounded-full bg-error-container text-on-error-container font-semibold">14</span>
</button>
<button class="px-4 py-2 rounded-full bg-surface-container-low text-on-surface-variant hover:bg-surface-container font-label-md text-label-md flex items-center gap-2 whitespace-nowrap transition-colors">
<span>Settled &amp; Disbursed</span>
<span class="px-1.5 py-0.5 text-label-sm font-label-sm rounded-full bg-tertiary-fixed text-on-tertiary-fixed-variant font-semibold">1,392</span>
</button>
<button class="px-4 py-2 rounded-full bg-surface-container-low text-on-surface-variant hover:bg-surface-container font-label-md text-label-md flex items-center gap-2 whitespace-nowrap transition-colors">
<span>Biometric Release Pending</span>
<span class="px-1.5 py-0.5 text-label-sm font-label-sm rounded-full bg-secondary-container text-on-secondary-fixed font-semibold">8</span>
</button>
<button class="px-4 py-2 rounded-full bg-surface-container-low text-on-surface-variant hover:bg-surface-container font-label-md text-label-md flex items-center gap-2 whitespace-nowrap transition-colors">
<span>Refunds &amp; Reversals</span>
<span class="px-1.5 py-0.5 text-label-sm font-label-sm rounded-full bg-surface-container-highest text-secondary font-semibold">14</span>
</button>
</div>
<!-- Search & Dropdown Filters Bar -->
<div class="grid grid-cols-1 md:grid-cols-12 gap-space-sm items-center">
<!-- Universal Search -->
<div class="md:col-span-4 relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-lg">search</span>
<input class="w-full bg-surface-container-low rounded-lg pl-10 pr-4 py-2.5 font-body-sm text-body-sm text-on-surface placeholder:text-outline focus:bg-surface-container-lowest focus:outline-none shadow-sm transition-all" id="payment-search" placeholder="Search by transaction, order, customer, cardholder, escrow..." type="search"/>
</div>
<!-- Dropdown: Payment Status -->
<div class="md:col-span-2 relative">
<select class="w-full appearance-none bg-surface-container-low rounded-lg px-3 py-2.5 font-label-md text-label-md text-on-surface focus:outline-none cursor-pointer">
<option>All Statuses</option>
<option>Settled (CBSL Assayed)</option>
<option>Escrow Locked</option>
<option>Pre-Authorized</option>
<option>Pending Biometric</option>
<option>Refunded / Voided</option>
</select>
<span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-outline text-base pointer-events-none">arrow_drop_down</span>
</div>
<!-- Dropdown: Payment Method -->
<div class="md:col-span-2 relative">
<select class="w-full appearance-none bg-surface-container-low rounded-lg px-3 py-2.5 font-label-md text-label-md text-on-surface focus:outline-none cursor-pointer">
<option>All Gateways</option>
<option>CBSL RTGS Direct</option>
<option>Visa Infinite Sovereign</option>
<option>NTB Centurion Amex</option>
<option>Koko 3-Split BNPL</option>
<option>Mintpay 0% PayLater</option>
<option>Sovereign Vault Wire</option>
</select>
<span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-outline text-base pointer-events-none">arrow_drop_down</span>
</div>
<!-- Dropdown: Delivery / Fulfillment Link -->
<div class="md:col-span-2 relative">
<select class="w-full appearance-none bg-surface-container-low rounded-lg px-3 py-2.5 font-label-md text-label-md text-on-surface focus:outline-none cursor-pointer">
<option>All Channels</option>
<option>Mercedes EQV Doorstep Van</option>
<option>Salon Private Suite Handover</option>
<option>Armored Courier Transit</option>
<option>FitsAir Aero Courier</option>
<option>Flagship Vault Retrieval</option>
</select>
<span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-outline text-base pointer-events-none">arrow_drop_down</span>
</div>
<!-- Date Range Picker Quick Selector -->
<div class="md:col-span-2 relative">
<div class="flex items-center justify-between bg-surface-container-low rounded-lg px-3 py-2.5 cursor-pointer">
<div class="flex items-center gap-1.5 text-on-surface">
<span class="material-symbols-outlined text-base text-secondary">calendar_today</span>
<span class="font-label-md text-label-md">Last 30 Days</span>
</div>
<span class="material-symbols-outlined text-outline text-base">expand_more</span>
</div>
</div>
</div>
</div>
<!-- Directory Table Master Container -->
<div class="mt-space-md rounded-xl bg-surface-container-lowest shadow-sm overflow-hidden">
<div class="overflow-x-auto">
<table class="w-full text-left font-body-sm text-body-sm text-on-surface">
<!-- Table Header -->
<thead class="bg-surface-container-low text-secondary font-label-sm text-label-sm uppercase tracking-wider">
<tr>
<th class="py-3.5 px-4 w-10">
<input class="rounded text-primary focus:ring-0 cursor-pointer" type="checkbox"/>
</th>
<th class="py-3.5 px-4">Transaction &amp; Cryptographic Hash</th>
<th class="py-3.5 px-4">Order Reference &amp; Item</th>
<th class="py-3.5 px-4">Patron &amp; Gateway Instrument</th>
<th class="py-3.5 px-4">Timestamp (SLST)</th>
<th class="py-3.5 px-4">Gross &amp; Artisan Partition</th>
<th class="py-3.5 px-4">Delivery Telemetry Link</th>
<th class="py-3.5 px-4">Escrow &amp; Audit Status</th>
<th class="py-3.5 px-4 text-right">Actions</th>
</tr>
</thead>
<tbody id="payments-table-body" class="divide-y divide-surface-container">
@forelse(($apiRecords['payments'] ?? []) as $record)
    <tr>@foreach($record as $field => $value)@if(!is_array($value) && !is_object($value))<td class="px-4 py-3">{{ $value ?? '�' }}</td>@endif @endforeach</tr>
@empty
    <tr data-empty-state><td colspan="8" class="px-4 py-8 text-center text-sm text-secondary">{{ !empty($apiErrors['payments'] ?? null) ? 'Unable to load payment data.' : 'No payment records found.' }}</td></tr>
@endforelse
</tbody>
</table>
</div>
<!-- Pagination & Batch Multi-Action Bar -->
<div class="py-space-sm px-4 bg-surface-container-low flex flex-col md:flex-row md:items-center justify-between gap-space-sm">
<div class="flex items-center gap-space-sm">
<span class="font-label-sm text-label-sm text-secondary"><span id="payment-list-count" data-list-count></span></span>
<div class="hidden sm:flex items-center gap-1">
<span class="font-label-sm text-label-sm text-outline">| Multi-Select:</span>
<button class="font-label-sm text-label-sm text-primary hover:underline font-semibold ml-1">Batch Settle RTGS</button>
<span class="text-outline-variant">•</span>
<button class="font-label-sm text-label-sm text-primary hover:underline font-semibold">Generate Ledger PDF</button>
</div>
</div>
<!-- Numbered Pagination -->

</div>
</div>
<!-- Compliance & Audit Telemetry Banner -->
<div class="mt-space-md p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-space-md">
<div class="flex items-center gap-space-sm">
<div class="w-10 h-10 rounded-full bg-tertiary-fixed/40 flex items-center justify-center text-tertiary">
<span class="material-symbols-outlined text-xl">account_balance</span>
</div>
<div class="flex flex-col">
<div class="flex items-center gap-2">
<span class="font-label-md text-label-md text-on-surface font-semibold">CBSL LankaPay RTGS Synchronized</span>
<span class="inline-flex items-center px-2 py-0.5 rounded-full text-label-sm font-label-sm bg-tertiary-fixed/30 text-on-tertiary-fixed-variant font-mono">Node: 0x48A...D19C</span>
</div>
<p class="font-body-sm text-body-sm text-secondary mt-0.5">
          End-of-day batch settlement verified with Commercial Bank &amp; Nations Trust Bank. Regulated under Sri Lanka Banking Act No. 30 &amp; PDPA compliance.
        </p>
</div>
</div>
<div class="flex items-center gap-space-xs self-start md:self-auto shrink-0">
<span class="font-label-sm text-label-sm text-tertiary font-medium flex items-center gap-1">
<span class="material-symbols-outlined text-base">verified_user</span>
        Audit Integrity Assured
      </span>
<button class="px-3 py-1.5 rounded-full bg-surface-container-low text-on-surface hover:bg-surface-container font-label-sm text-label-sm transition-colors">
        View Cryptographic Audit Trail
      </button>
</div>
</div>
<div id="payment-detail-modal" class="fixed inset-0 z-[60] hidden items-center justify-center bg-black/40 p-4"><section class="w-full max-w-xl rounded-2xl bg-surface-container-lowest p-space-lg shadow-2xl"><div class="flex items-center justify-between"><h2 class="font-headline-sm text-headline-sm font-semibold">Payment transaction details</h2><button id="close-payment-detail" type="button" class="rounded-full p-2 hover:bg-surface-container" aria-label="Close">×</button></div><div id="payment-detail-content" class="mt-space-md whitespace-pre-line font-body-sm text-body-sm text-secondary"></div></section></div></div></main></div><script>
(() => {
 const search=document.getElementById('payment-search');const rows=[...document.querySelectorAll('#payments-table-body tr')];
 search?.addEventListener('input',()=>{const q=search.value.toLowerCase().trim();rows.forEach(row=>row.hidden=!row.innerText.toLowerCase().includes(q));});
 const modal=document.getElementById('payment-detail-modal');document.querySelectorAll('#payments-table-body [title="View Details"],#payments-table-body [title="Transaction Details"],#payments-table-body [title="Receipt"]').forEach(button=>button.addEventListener('click',()=>{document.getElementById('payment-detail-content').textContent=button.closest('tr').innerText;modal.classList.remove('hidden');modal.classList.add('flex');}));
 document.getElementById('close-payment-detail')?.addEventListener('click',()=>{modal.classList.add('hidden');modal.classList.remove('flex');});
})();
</script><script>
(() => {
 const tbody=document.getElementById('payments-table-body');
 const summary=document.getElementById('payment-list-count');
 if(!tbody||!summary)return;
 const rows=[...tbody.querySelectorAll('tr')];
 const count=()=>{const visible=rows.filter(row=>!row.hidden&&row.style.display!=='none').length;const cleared=rows.filter(row=>row.innerText.toLowerCase().includes('cleared')).length;summary.textContent=visible ? ("Showing 1–"+visible+" of "+visible+" payments") : "Showing 0 payments";document.getElementById('payment-total-count').textContent=rows.length;document.getElementById('payment-cleared-count').textContent=cleared+' Cleared TXNs';};
 new MutationObserver(count).observe(tbody,{subtree:true,attributes:true,attributeFilter:['hidden','style']});
 document.getElementById('payment-search')?.addEventListener('input',count);

 count();
})();
</script></body></html>

