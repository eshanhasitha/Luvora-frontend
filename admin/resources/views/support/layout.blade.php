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
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/></head><body class="bg-surface text-on-surface"><aside class="fixed left-0 top-0 h-full w-72 bg-surface-container-lowest z-50 flex flex-col shadow-[0_1px_8px_rgba(0,0,0,0.04)]"><div class="h-20 px-space-md flex items-center justify-between bg-surface-container-lowest"><div class="flex items-center gap-space-sm"><img alt="Brand logo. - Primary color: #0088ff
- Font: bodoniModa
- Mode: light
- Roundness: rounded-md
" class="h-8 w-auto object-contain" src="https://lh3.googleusercontent.com/aida/AEtjO1W34tid3ShkuS9nNFPU9jvlqzpxl1NJD_wF7ZNkn3yExkUTkBFJ3ypCIui4c6lG1RUcbFOCsyY5_tbLFD_tJP51TjqHne263g9Nbi7ZIkZYJu2-5uK5Ass7lGl5Z1Um2SbV7etW_eu_1lD93w2ZnsWCgVsj3ups1XmIIDFec2pV6RKjXdA3QAJn2CdrTLOQJbPVBq-2nWv7rURXGhRBOt4qnwfjvFiXSYTwwtKiW7-4b3CHRdUEuqlfMzA"/><div class="flex flex-col"><span class="font-headline-md text-headline-md leading-none text-on-surface tracking-tight">LUVORA</span><span class="font-label-sm text-label-sm text-secondary uppercase tracking-widest mt-1">Executive Portal</span></div></div><div class="h-2 w-2 rounded-full bg-primary animate-pulse"></div></div><div class="flex-1 overflow-y-auto px-space-sm py-space-sm space-y-space-md"><nav class="space-y-space-xs" data-active-classes="bg-primary-container text-on-primary-container font-semibold rounded-lg"><p class="px-space-sm text-[10px] font-label-sm uppercase tracking-wider text-outline">Dashboard</p><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="overview" href="{{ route('dashboard') }}"><span class="material-symbols-outlined text-lg">dashboard</span>Overview</a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="analytics" href="#"><span class="material-symbols-outlined text-lg">monitoring</span>Analytics</a></nav><nav class="space-y-space-xs" data-active-classes="bg-primary-container text-on-primary-container font-semibold rounded-lg"><p class="px-space-sm text-[10px] font-label-sm uppercase tracking-wider text-outline">Catalog &amp; Products</p><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="all-products" href="{{ route('products.index') }}"><span class="material-symbols-outlined text-lg">apparel</span>All Products</a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="add-product" href="#"><span class="material-symbols-outlined text-lg">add_circle</span>Add Product</a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="categories" href="#"><span class="material-symbols-outlined text-lg">category</span>Categories</a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="inventory-stock-alerts" href="{{ route('inventory.index') }}"><span class="material-symbols-outlined text-lg">inventory_2</span>Inventory &amp; Stock Alerts</a></nav><nav class="space-y-space-xs" data-active-classes="bg-primary-container text-on-primary-container font-semibold rounded-lg"><p class="px-space-sm text-[10px] font-label-sm uppercase tracking-wider text-outline">Orders &amp; Escrow</p><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="all-orders" href="{{ route('orders.index') }}"><span class="material-symbols-outlined text-lg">receipt_long</span>All Orders</a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="live-dispatches" href="#"><span class="material-symbols-outlined text-lg">local_shipping</span>Live Dispatches</a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="tailor-fittings" href="#"><span class="material-symbols-outlined text-lg">straighten</span>Tailor Fittings</a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="gem-escrow-vault" href="{{ route('payments.index') }}"><span class="material-symbols-outlined text-lg">diamond</span>Gem Escrow Vault</a></nav><nav class="space-y-space-xs" data-active-classes="bg-primary-container text-on-primary-container font-semibold rounded-lg"><p class="px-space-sm text-[10px] font-label-sm uppercase tracking-wider text-outline">Customers &amp; VIP Patrons</p><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="all-customers" href="{{ route('customers.index') }}"><span class="material-symbols-outlined text-lg">group</span>All Customers</a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="sovereign-circle" href="#"><span class="material-symbols-outlined text-lg">workspace_premium</span>Sovereign Circle</a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="reviews-feedback" href="#"><span class="material-symbols-outlined text-lg">star</span>Reviews &amp; Feedback</a></nav><nav class="space-y-space-xs" data-active-classes="bg-primary-container text-on-primary-container font-semibold rounded-lg"><p class="px-space-sm text-[10px] font-label-sm uppercase tracking-wider text-outline">Artisans &amp; Logistics</p><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="dumbara-weavers" href="#"><span class="material-symbols-outlined text-lg">palette</span>Dumbara Weavers</a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="ratnapura-cutters" href="#"><span class="material-symbols-outlined text-lg">save_as</span>Ratnapura Cutters</a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="logistics-chauffeurs" href="#"><span class="material-symbols-outlined text-lg">directions_car</span>Logistics &amp; Chauffeurs</a><a class="flex items-center gap-space-sm px-space-sm py-2 rounded-lg text-on-surface-variant font-label-md text-label-md hover:bg-surface-container hover:text-on-surface transition-all" data-path="system-settings" href="#"><span class="material-symbols-outlined text-lg">tune</span>System &amp; Settings</a></nav></div><div class="p-space-sm bg-surface-container-low"><div class="flex items-center gap-space-sm bg-surface-container-lowest p-space-sm rounded-lg shadow-[0_1px_8px_rgba(0,0,0,0.04)]"><img alt="Profile" class="w-8 h-8 rounded-full object-cover" src="https://lh3.googleusercontent.com/aida/AEtjO1VFWU_GemsQx8cSzOYAsoVP_9cEdrpUqslJQQL6HcvH6tnQQUZH9spBXLTcEkOtQVB6L35GDLTOrFyNmi6JukLXq2V3LnG2KzqeFII76YPM_uCQ7T7vZGDR3Z3RjVrfg2Mxi-ZxSUxOE3nJbwalj6Y0AH5yKf9B2cGUhF76M8UgwPBgkMgmt-mt3MhLrfKCw8zvMCuPM6gq6npc6wvKAso3TFAhDDH3g7QHdk0CTiDCQh_OGzL32MBplaQ"/><div class="flex flex-col min-w-0"><span class="font-label-md text-label-md text-on-surface font-semibold truncate">Madame Ananya</span><span class="font-label-sm text-label-sm text-primary truncate">Executive Director</span></div></div></div></aside><div class="pl-72"><header class="fixed top-0 left-72 right-0 h-20 bg-surface/80 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)] z-40 px-gutter-lg flex items-center justify-between"><div class="flex items-center gap-space-md flex-1 max-w-2xl"><div class="flex items-center gap-space-xs bg-surface-container-low px-space-sm py-2 rounded-full"><span class="material-symbols-outlined text-base text-primary">storefront</span><span class="font-label-sm text-label-sm text-on-surface font-semibold">Colombo 07 Flagship</span><span class="material-symbols-outlined text-sm text-outline">expand_more</span></div><div class="relative flex-1"><span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-lg">search</span><input class="w-full bg-surface-container-lowest pl-10 pr-4 py-2 rounded-full font-body-sm text-body-sm text-on-surface placeholder:text-outline focus:outline-none shadow-[0_1px_3px_0_rgba(15,23,42,0.04)]" placeholder="Search SKUs, high jewelry orders, sovereign patrons..." type="text"/></div></div><div class="flex items-center gap-space-md"><div class="flex items-center gap-space-xs bg-tertiary-fixed/30 px-space-sm py-1.5 rounded-full"><span class="h-2 w-2 rounded-full bg-tertiary"></span><span class="font-label-sm text-label-sm text-on-tertiary-fixed-variant font-medium">CBSL Escrow Synchronized</span></div><button class="relative p-2 rounded-full bg-surface-container-lowest text-on-surface-variant hover:text-on-surface shadow-[0_1px_3px_0_rgba(15,23,42,0.04)]"><span class="material-symbols-outlined text-xl">notifications</span><span class="absolute top-1 right-1 h-2 w-2 rounded-full bg-error"></span></button><div class="flex items-center gap-space-sm pl-space-xs"><img alt="Profile" class="w-8 h-8 rounded-full object-cover" src="https://lh3.googleusercontent.com/aida/AEtjO1VFWU_GemsQx8cSzOYAsoVP_9cEdrpUqslJQQL6HcvH6tnQQUZH9spBXLTcEkOtQVB6L35GDLTOrFyNmi6JukLXq2V3LnG2KzqeFII76YPM_uCQ7T7vZGDR3Z3RjVrfg2Mxi-ZxSUxOE3nJbwalj6Y0AH5yKf9B2cGUhF76M8UgwPBgkMgmt-mt3MhLrfKCw8zvMCuPM6gq6npc6wvKAso3TFAhDDH3g7QHdk0CTiDCQh_OGzL32MBplaQ"/><div class="hidden xl:flex flex-col text-right"><span class="font-label-md text-label-md text-on-surface font-medium">Madame Ananya</span><span class="font-label-sm text-label-sm text-secondary">Executive Director</span></div></div></div></header><main class="w-full pt-20 px-gutter-lg bg-surface min-h-screen"><div class="flex flex-col w-full pb-space-xl">
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
<div class="flex flex-col md:flex-row md:items-center justify-between gap-space-md py-space-sm"><div><div class="flex items-center gap-2 text-label-sm font-label-sm text-secondary tracking-wider uppercase"><span>Executive Portal</span><span class="text-outline-variant">/</span><a class="hover:text-primary" href="{{ route('payments.index') }}">Reviews &amp; Support</a><span class="text-outline-variant">/</span><span class="text-primary font-semibold">@yield('crumb')</span></div><h1 class="mt-2 font-headline-lg text-headline-lg text-on-surface tracking-tight">@yield('heading')</h1><p class="mt-1 font-body-sm text-body-sm text-secondary">@yield('description')</p></div></div>
<nav class="flex flex-wrap gap-2 rounded-xl bg-surface-container-lowest p-2 shadow-sm mb-space-md" aria-label="Reviews and support"><a class="rounded-full px-4 py-2 text-xs hover:bg-surface-container" href="{{ route('reviews.index') }}">Review moderation</a><a class="rounded-full px-4 py-2 text-xs hover:bg-surface-container" href="{{ route('reviews.reported') }}">Reported reviews</a><a class="rounded-full px-4 py-2 text-xs hover:bg-surface-container" href="{{ route('support.tickets') }}">Support tickets</a><a class="rounded-full px-4 py-2 text-xs hover:bg-surface-container" href="{{ route('support.ticket-details') }}">Ticket details</a><a class="rounded-full px-4 py-2 text-xs hover:bg-surface-container" href="{{ route('support.complaints') }}">Customer complaints</a></nav>
@yield('page_content')
<section class="mt-space-md p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-space-sm"><div><strong class="font-label-md text-label-md">Support data preview</strong><p class="font-body-sm text-body-sm text-secondary mt-1">Values shown are illustrative and are not connected to live support records.</p></div><span class="inline-flex items-center gap-2 rounded-full bg-tertiary-fixed/30 px-3 py-1.5 text-xs font-semibold text-on-tertiary-fixed-variant"><span class="h-2 w-2 rounded-full bg-tertiary"></span>Admin support workspace</span></section>
</div></main></div></body></html>

