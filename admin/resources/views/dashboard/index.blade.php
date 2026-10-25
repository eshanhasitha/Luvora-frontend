<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Overview | Luvora Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { extend: {
                colors: { ink: '#202321', muted: '#707873', line: '#e8ebe8', canvas: '#f7f8f6', accent: '#365c4a', soft: '#edf3ee' },
                fontFamily: { sans: ['Inter', 'ui-sans-serif', 'system-ui'], serif: ['Bodoni Moda', 'Georgia', 'serif'] },
                boxShadow: { card: '0 8px 28px rgba(25,35,29,.045)' }
            }}
        };
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:wght@500;600&family=Inter:wght@400;500;600;700&family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap" rel="stylesheet">
    <style>
        [x-cloak]{display:none!important}.material-symbols-outlined{font-variation-settings:'FILL' 0,'wght' 400,'GRAD' 0,'opsz' 20}
        body{font-family:Inter,ui-sans-serif,system-ui,sans-serif;-webkit-font-smoothing:antialiased}
        :focus-visible{outline:3px solid rgba(54,92,74,.45);outline-offset:2px}
        @keyframes shimmer{100%{transform:translateX(100%)}}
        .skeleton{position:relative;overflow:hidden;background:#edf0ed}.skeleton:after{position:absolute;inset:0;transform:translateX(-100%);background:linear-gradient(90deg,transparent,rgba(255,255,255,.65),transparent);content:'';animation:shimmer 1.6s infinite}
        .chart-grid{stroke:#e8ebe8;stroke-dasharray:3 5}.chart-label{fill:#8b928d;font:11px Inter,sans-serif}
    </style>
</head>
<body class="min-h-screen bg-canvas text-ink">
@php
    $summaryPayload = $apiData['summary'] ?? [];
    $summaryRows = $apiRecords['summary'] ?? [];
    $summary = is_array($summaryPayload) && ! array_is_list($summaryPayload) ? $summaryPayload : [];
    if ($summary === [] && isset($summaryRows[0]) && is_array($summaryRows[0])) $summary = $summaryRows[0];
    if (count($summary) === 1 && is_array($summary[0] ?? null)) $summary = $summary[0];
    if ($summary === [] && is_array(data_get($summaryPayload, 'data'))) {
        $nestedSummary = data_get($summaryPayload, 'data');
        $summary = array_is_list($nestedSummary) ? (is_array($nestedSummary[0] ?? null) ? $nestedSummary[0] : []) : $nestedSummary;
    }
    if ($summary === [] && is_array(data_get($summaryPayload, 'summary'))) $summary = data_get($summaryPayload, 'summary');
    $revenueRowsPayload = $apiData['revenueSummary'] ?? [];
    $revenueSummaryRows = $apiRecords['revenueSummary'] ?? [];
    $revenueSummary = is_array($revenueRowsPayload) && ! array_is_list($revenueRowsPayload) ? $revenueRowsPayload : [];
    if ($revenueSummary === [] && isset($revenueSummaryRows[0]) && is_array($revenueSummaryRows[0])) $revenueSummary = $revenueSummaryRows[0];
    if (count($revenueSummary) === 1 && is_array($revenueSummary[0] ?? null)) $revenueSummary = $revenueSummary[0];
    $ordersPayload = $apiData['ordersChart'] ?? [];
    $salesPayload = $apiData['salesChart'] ?? [];
    $statusSource = data_get($ordersPayload, 'byStatus') ?? data_get($ordersPayload, 'statuses') ?? data_get($ordersPayload, 'statusBreakdown') ?? data_get($ordersPayload, 'data.byStatus') ?? data_get($ordersPayload, 'data.statuses') ?? data_get($summary, 'ordersByStatus') ?? data_get($summary, 'orderStatusBreakdown') ?? [];
    $statusChartRows = $apiRecords['ordersChart'] ?? [];
    if (! is_array($statusSource) && count($statusChartRows) && is_array($statusChartRows[0])) $statusSource = $statusChartRows[0];
    if (is_array($statusSource) && count($statusSource) === 1 && is_array($statusSource[0] ?? null)) $statusSource = $statusSource[0];
    $allOrders = $apiRecords['orders'] ?? [];
    if (! is_array($statusSource) || $statusSource === []) {
        $statusSource = [];
        foreach ($allOrders as $order) {
            $statusName = (string) (data_get($order, 'status') ?? data_get($order, 'orderStatus') ?? 'Unknown');
            $statusSource[$statusName] = ($statusSource[$statusName] ?? 0) + 1;
        }
    }
    if (! is_array($statusSource)) $statusSource = [];
    $statusRows = [];
    foreach ($statusSource as $status => $statusValue) {
        $label = is_array($statusValue) ? (data_get($statusValue, 'status') ?? data_get($statusValue, 'label') ?? (is_string($status) ? $status : 'Other')) : (is_string($status) ? $status : 'Other');
        $count = is_array($statusValue) ? (data_get($statusValue, 'count') ?? data_get($statusValue, 'total') ?? data_get($statusValue, 'value') ?? data_get($statusValue, 'Order Count') ?? 0) : $statusValue;
        if (is_numeric($count)) $statusRows[] = ['label' => (string) $label, 'value' => (float) $count];
    }
    $salesChartPayload = $apiData['salesChart'] ?? [];
    $chartDays = data_get($salesChartPayload, 'days') ?? data_get($salesChartPayload, 'data.days') ?? data_get($salesChartPayload, 'data') ?? [];
    $summaryDays = data_get($summary, 'days') ?? data_get($summary, 'Days') ?? [];
    $chartDays = is_array($chartDays) && $chartDays !== [] ? $chartDays : $summaryDays;
    $revenueRows = $apiRecords['salesChart'] ?? [];
    if (count($revenueRows) === 1 && data_get($revenueRows[0] ?? [], 'days') !== null) $revenueRows = data_get($revenueRows[0], 'days');
    if (! count($revenueRows) && is_array($chartDays)) {
        foreach ($chartDays as $day) {
            if (is_array($day) && (data_get($day, 'grossOrderValue') !== null || data_get($day, 'orderCount') !== null || data_get($day, 'Gross Order Value') !== null || data_get($day, 'Order Count') !== null)) $revenueRows[] = $day;
        }
    }
    $revenueRows = array_values(array_filter($revenueRows, fn ($row) => is_numeric($row) || data_get($row, 'value') !== null || data_get($row, 'revenue') !== null || data_get($row, 'sales') !== null || data_get($row, 'grossOrderValue') !== null || data_get($row, 'Gross Order Value') !== null || data_get($row, 'total') !== null));
    $revenueValues = array_map(fn ($row) => (float) (is_numeric($row) ? $row : (data_get($row, 'value') ?? data_get($row, 'revenue') ?? data_get($row, 'sales') ?? data_get($row, 'grossOrderValue') ?? data_get($row, 'Gross Order Value') ?? data_get($row, 'total') ?? 0)), $revenueRows);
    $revenueMax = max($revenueValues ?: [0]);
    $revenueMax = $revenueMax > 0 ? $revenueMax : 1;
    $orderRows = $apiRecords['recentOrders'] ?? [];
    $topProducts = $apiRecords['topProducts'] ?? [];
    $lowStock = array_values(array_filter(is_array($apiRecords['stock'] ?? null) ? $apiRecords['stock'] : [], function ($stockRow) {
        $quantity = data_get($stockRow, 'availableQuantity') ?? data_get($stockRow, 'quantity') ?? data_get($stockRow, 'stock');
        $threshold = data_get($stockRow, 'reorderLevel') ?? data_get($stockRow, 'reorderPoint') ?? data_get($stockRow, 'lowStockThreshold');
        return is_numeric($quantity) && is_numeric($threshold) && (float) $quantity <= (float) $threshold;
    }));
    $revenueNumber = data_get($summary, 'grossOrderValue') ?? data_get($summary, 'Gross Order Value') ?? data_get($summary, 'grossRevenue') ?? data_get($summary, 'totalRevenue') ?? data_get($revenueSummary, 'grossOrderValue') ?? data_get($revenueSummary, 'Gross Order Value');
    if (! is_numeric($revenueNumber) && is_array($chartDays)) $revenueNumber = array_sum(array_map(fn ($day) => (float) (data_get($day, 'grossOrderValue') ?? data_get($day, 'Gross Order Value') ?? 0), $chartDays));
    $revenueValue = data_get($summary, 'grossOrderValueFormatted') ?? data_get($summary, 'grossRevenueFormatted') ?? data_get($summary, 'totalRevenueFormatted') ?? data_get($revenueSummary, 'grossOrderValueFormatted') ?? data_get($revenueSummary, 'revenueFormatted') ?? (is_numeric($revenueNumber) ? 'LKR '.number_format((float) $revenueNumber, 2) : null);
    $ordersValue = data_get($summary, 'orderCount') ?? data_get($summary, 'totalOrders') ?? data_get($summary, 'ordersCount') ?? data_get($summary, 'Order Count');
    $aovValue = data_get($summary, 'averageOrderValueFormatted') ?? data_get($summary, 'averageOrderValue') ?? data_get($summary, 'averageOrderAmount');
    if (! is_numeric($aovValue) && is_numeric($revenueNumber) && is_numeric($ordersValue) && (float) $ordersValue > 0) $aovValue = (float) $revenueNumber / (float) $ordersValue;
    $customersValue = data_get($summary, 'customerCount') ?? data_get($summary, 'totalCustomers') ?? data_get($summary, 'customersCount');
    $conversionValue = data_get($summary, 'conversionRate') ?? data_get($summary, 'conversionRatePercent');
    $pendingValue = data_get($summary, 'pendingOrders') ?? data_get($summary, 'pendingOrderCount') ?? data_get($summary, 'ordersPending');
    $pendingValue = $pendingValue ?? data_get($ordersPayload, 'pendingOrderCount') ?? data_get($ordersPayload, 'pendingOrders');
    if ($pendingValue === null && count($allOrders)) {
        $statusesArePresent = count(array_filter($allOrders, fn ($order) => data_get($order, 'status') !== null || data_get($order, 'orderStatus') !== null)) === count($allOrders);
        if ($statusesArePresent) {
            $pendingValue = count(array_filter($allOrders, fn ($order) => in_array(strtolower((string) (data_get($order, 'status') ?? data_get($order, 'orderStatus'))), ['pending', 'awaiting payment', 'processing'], true)));
        }
    }
    $startDate = request()->query('startDate', now()->subDays(29)->toDateString());
    $endDate = request()->query('endDate', now()->toDateString());
    $loading = request()->boolean('loading');
@endphp

@include('partials.sidebar')
<div class="min-h-screen md:pl-64">
    <header class="fixed inset-x-0 top-0 z-30 flex h-[76px] items-center justify-between border-b border-line bg-white/90 px-4 backdrop-blur-xl md:left-64 md:px-8">
        <div class="flex min-w-0 items-center gap-3">
            <button type="button" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-line text-ink md:hidden" aria-label="Open navigation" aria-controls="admin-sidebar" aria-expanded="false" onclick="const nav=document.getElementById('admin-sidebar');nav.classList.toggle('-translate-x-full');this.setAttribute('aria-expanded',String(!nav.classList.contains('-translate-x-full')))"><span class="material-symbols-outlined">menu</span></button>
            <form method="GET" action="{{ route('dashboard') }}" class="hidden w-full max-w-lg items-center gap-2 rounded-xl border border-line bg-canvas px-3 py-2 sm:flex">
                <span class="material-symbols-outlined text-muted">search</span>
                <input type="search" name="search" value="{{ request('search') }}" aria-label="Search admin" placeholder="Search orders, products, customers" class="min-w-0 flex-1 border-0 bg-transparent text-sm outline-none placeholder:text-muted">
                <input type="hidden" name="startDate" value="{{ $startDate }}"><input type="hidden" name="endDate" value="{{ $endDate }}">
            </form>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.notifications') }}" class="relative inline-flex h-10 w-10 items-center justify-center rounded-full border border-line bg-white text-muted" aria-label="Notifications"><span class="material-symbols-outlined">notifications</span></a>
            <a href="{{ route('admin.profile') }}" class="flex items-center gap-3 rounded-full py-1 pl-1 pr-2 hover:bg-canvas" aria-label="Admin profile">
                @include('partials.profile-avatar', ['avatarSize' => 'h-9 w-9'])
                <span class="hidden text-left sm:block"><span class="block text-sm font-semibold">{{ data_get(session('admin_user'), 'name') ?? data_get(session('admin_user'), 'Name') ?? 'Admin' }}</span><span class="block text-xs text-muted">{{ data_get(session('admin_user'), 'role') ?? data_get(session('admin_user'), 'Role') ?? 'Administrator' }}</span></span>
            </a>
        </div>
    </header>
    <main class="mx-auto max-w-[1600px] px-4 pb-12 pt-24 sm:px-6 lg:px-9">
        <nav aria-label="Breadcrumb" class="mb-5 flex items-center gap-2 text-xs text-muted"><a href="{{ route('dashboard') }}" class="hover:text-accent">Admin</a><span aria-hidden="true">/</span><span aria-current="page" class="font-semibold text-ink">Overview</span></nav>
        @include('partials.api-state')
        <div class="mb-7 flex flex-col justify-between gap-5 lg:flex-row lg:items-end">
            <div><p class="mb-2 text-[11px] font-semibold uppercase tracking-[.18em] text-accent">Luvora administration</p><h1 class="font-serif text-4xl font-medium tracking-tight text-ink sm:text-5xl">Overview</h1><p class="mt-2 max-w-xl text-sm leading-6 text-muted">A clear view of store performance, orders, and stock.</p></div>
            <form method="GET" action="{{ route('dashboard') }}" class="flex flex-wrap items-end gap-2 rounded-2xl border border-line bg-white p-3 shadow-card" aria-label="Filter overview date range">
                <label class="grid gap-1 text-[11px] font-semibold uppercase tracking-wide text-muted">From<input type="date" name="startDate" value="{{ $startDate }}" max="{{ $endDate }}" class="rounded-lg border border-line bg-white px-3 py-2 text-sm font-normal text-ink"></label>
                <label class="grid gap-1 text-[11px] font-semibold uppercase tracking-wide text-muted">To<input type="date" name="endDate" value="{{ $endDate }}" min="{{ $startDate }}" max="{{ now()->toDateString() }}" class="rounded-lg border border-line bg-white px-3 py-2 text-sm font-normal text-ink"></label>
                <button type="submit" class="inline-flex items-center gap-2 rounded-lg bg-ink px-4 py-2.5 text-sm font-semibold text-white hover:bg-accent"><span class="material-symbols-outlined text-base">filter_alt</span>Apply</button>
            </form>
        </div>

        @php($kpis = [
            ['Revenue', $revenueValue, 'payments', $apiErrors['summary'] ?? $apiErrors['revenueSummary'] ?? null],
            ['Total orders', $ordersValue, 'shopping_bag', $apiErrors['summary'] ?? null],
            ['Average order value', is_numeric($aovValue) ? 'LKR '.number_format((float) $aovValue, 2) : $aovValue, 'receipt', $apiErrors['summary'] ?? null],
            ['Total customers', $customersValue, 'group', $apiErrors['summary'] ?? null],
            ['Conversion rate', $conversionValue !== null ? rtrim(rtrim(number_format((float) $conversionValue, 2), '0'), '.').'%' : null, 'conversion_path', $apiErrors['summary'] ?? null],
            ['Pending orders', $pendingValue, 'pending_actions', $apiErrors['summary'] ?? null],
        ])
        @if($summary !== [] && (data_get($summary, 'metric') !== null || data_get($summary, 'grossOrderValue') !== null))
            <p class="mb-3 text-xs text-muted">Gross order value excludes cancelled orders.</p>
        @endif
        <section aria-label="Store performance" class="mb-6 grid grid-cols-1 gap-3 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-6">
            @foreach($kpis as [$label, $value, $icon, $error])
                <article class="min-h-36 rounded-2xl border border-line bg-white p-5 shadow-card">
                    <div class="flex items-start justify-between"><p class="text-xs font-medium text-muted">{{ $label }}</p><span class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-soft text-accent"><span class="material-symbols-outlined">{{ $icon }}</span></span></div>
                    @if($loading)<div class="skeleton mt-5 h-8 w-2/3 rounded-lg" aria-label="Loading {{ $label }}"></div>@elseif($error)<p class="mt-5 text-sm font-medium text-rose-700">Couldn’t load</p>@elseif($value !== null)<p class="mt-4 truncate text-2xl font-semibold tracking-tight text-ink">{{ is_numeric($value) && ! str_contains((string) $value, 'LKR') ? number_format((float) $value) : $value }}</p>@else<p class="mt-5 text-sm text-muted">{{ $label === 'Conversion rate' ? 'Not available from the API' : 'No data returned' }}</p>@endif
                </article>
            @endforeach
        </section>

        <section class="mb-6 grid grid-cols-1 gap-4 xl:grid-cols-5">
            <article class="rounded-2xl border border-line bg-white p-5 shadow-card xl:col-span-3">
                <div class="mb-5 flex items-start justify-between gap-4"><div><h2 class="text-base font-semibold">Revenue over time</h2><p class="mt-1 text-xs text-muted">{{ $startDate }} – {{ $endDate }}</p></div><span class="rounded-full bg-canvas px-3 py-1 text-xs text-muted">LKR</span></div>
                @if($loading)<div class="skeleton h-56 rounded-xl" aria-label="Loading revenue chart"></div>@elseif(isset($apiErrors['salesChart']))<div class="grid h-56 place-items-center rounded-xl bg-canvas text-center"><p class="text-sm text-muted">Revenue chart is unavailable.<br><a class="mt-1 inline-block font-semibold text-accent underline" href="{{ url()->full() }}">Retry</a></p></div>
                @elseif(count($revenueRows))
                    <div class="h-56 w-full overflow-hidden" role="img" aria-label="Revenue by date from the admin API"><svg viewBox="0 0 720 230" preserveAspectRatio="none" class="h-full w-full">
                        @foreach([35,80,125,170,210] as $gridY)<line x1="0" y1="{{ $gridY }}" x2="720" y2="{{ $gridY }}" class="chart-grid"/>@endforeach
                        @foreach($revenueRows as $index => $row)
                            @php($chartValue = $revenueValues[$index] ?? (float) (data_get($row, 'grossOrderValue') ?? data_get($row, 'Gross Order Value') ?? data_get($row, 'orderCount') ?? data_get($row, 'Order Count') ?? 0))
                            @php($barH = max(3, (int) round(($chartValue / $revenueMax) * 175)))
                            @php($barW = min(38, max(8, 560 / max(1, count($revenueRows)))))
                            @php($barX = 32 + ($index * (656 / max(1, count($revenueRows)))) )
                            <rect x="{{ $barX }}" y="{{ 210 - $barH }}" width="{{ $barW }}" height="{{ $barH }}" rx="5" fill="#456b57"><title>{{ data_get($row, 'label') ?? data_get($row, 'date') ?? data_get($row, 'period') ?? 'Period '.($index + 1) }}: {{ number_format($chartValue, 2) }}</title></rect>
                            @if($index % max(1, (int) ceil(count($revenueRows) / 7)) === 0)<text x="{{ $barX }}" y="228" class="chart-label">{{ data_get($row, 'label') ?? data_get($row, 'date') ?? data_get($row, 'period') ?? ($index + 1) }}</text>@endif
                        @endforeach
                    </svg></div>
                @else<div class="grid h-56 place-items-center rounded-xl bg-canvas px-5 text-center"><div><span class="material-symbols-outlined text-3xl text-muted">monitoring</span><p class="mt-2 text-sm font-medium">No revenue data for this period</p><p class="mt-1 text-xs text-muted">The sales chart endpoint returned no usable points.</p></div></div>@endif
            </article>
            <article class="rounded-2xl border border-line bg-white p-5 shadow-card xl:col-span-2">
                <div class="mb-5"><h2 class="text-base font-semibold">Order status</h2><p class="mt-1 text-xs text-muted">Current distribution from order chart data</p></div>
                @if($loading)<div class="skeleton h-56 rounded-xl" aria-label="Loading order status chart"></div>@elseif(isset($apiErrors['ordersChart']))<div class="grid h-56 place-items-center rounded-xl bg-canvas text-sm text-muted">Order status chart unavailable</div>
                @elseif(count($statusRows))
                    @php($statusTotal = max(1, array_sum(array_column($statusRows, 'value'))))
                    <div class="space-y-4" role="img" aria-label="Order status distribution from the admin API">
                        <div class="flex h-4 overflow-hidden rounded-full bg-canvas">@foreach($statusRows as $index => $status)<span title="{{ $status['label'] }}: {{ $status['value'] }}" style="width:{{ ($status['value'] / $statusTotal) * 100 }}%;background:{{ ['#456b57','#d4a85f','#b8756d','#718096','#9ba69f'][$index % 5] }}"></span>@endforeach</div>
                        @foreach($statusRows as $index => $status)<div class="flex items-center justify-between gap-4"><div class="flex min-w-0 items-center gap-2"><span class="h-2.5 w-2.5 shrink-0 rounded-full" style="background:{{ ['#456b57','#d4a85f','#b8756d','#718096','#9ba69f'][$index % 5] }}"></span><span class="truncate text-sm text-muted">{{ Illuminate\Support\Str::headline($status['label']) }}</span></div><span class="text-sm font-semibold">{{ number_format($status['value']) }} <span class="font-normal text-muted">({{ number_format(($status['value'] / $statusTotal) * 100, 1) }}%)</span></span></div>@endforeach
                    </div>
                @else<div class="grid h-56 place-items-center rounded-xl bg-canvas px-5 text-center"><div><span class="material-symbols-outlined text-3xl text-muted">donut_small</span><p class="mt-2 text-sm font-medium">Status breakdown unavailable</p><p class="mt-1 text-xs leading-5 text-muted">The current order chart response does not contain a recognized byStatus, statuses, or statusBreakdown field.</p></div></div>@endif
            </article>
        </section>

        <section class="mb-6 grid grid-cols-1 gap-4 xl:grid-cols-3">
            <article class="overflow-hidden rounded-2xl border border-line bg-white shadow-card xl:col-span-2">
                <div class="flex items-center justify-between gap-4 border-b border-line px-5 py-4"><div><h2 class="text-base font-semibold">Recent orders</h2><p class="mt-1 text-xs text-muted">Latest orders from the API</p></div><a href="{{ route('orders.index') }}" class="text-xs font-semibold text-accent hover:underline">All orders <span aria-hidden="true">→</span></a></div>
                @if($loading)<div class="space-y-3 p-5" aria-label="Loading recent orders"><div class="skeleton h-8 rounded-lg"></div><div class="skeleton h-8 rounded-lg"></div><div class="skeleton h-8 rounded-lg"></div></div>@elseif(isset($apiErrors['recentOrders']))<div class="p-8 text-center text-sm text-muted">Recent orders could not be loaded. <a class="font-semibold text-accent underline" href="{{ url()->full() }}">Retry</a></div>
                @elseif(count($orderRows))<div class="overflow-x-auto"><table class="min-w-full text-left text-sm"><thead class="bg-canvas text-[11px] uppercase tracking-wide text-muted"><tr><th class="px-5 py-3 font-semibold">Order</th><th class="px-5 py-3 font-semibold">Customer</th><th class="px-5 py-3 font-semibold">Date</th><th class="px-5 py-3 font-semibold">Total</th><th class="px-5 py-3 font-semibold">Status</th></tr></thead><tbody class="divide-y divide-line">
                    @foreach($orderRows as $order)<tr class="hover:bg-canvas/70"><td class="whitespace-nowrap px-5 py-3.5 font-semibold">{{ data_get($order, 'orderNumber') ?? data_get($order, 'orderId') ?? data_get($order, 'id') ?? '—' }}</td><td class="max-w-48 truncate px-5 py-3.5">{{ data_get($order, 'customer.name') ?? data_get($order, 'customerName') ?? data_get($order, 'customer') ?? '—' }}</td><td class="whitespace-nowrap px-5 py-3.5 text-muted">{{ data_get($order, 'createdAt') ?? data_get($order, 'created_at') ?? data_get($order, 'date') ?? '—' }}</td><td class="whitespace-nowrap px-5 py-3.5 font-medium">{{ data_get($order, 'totalFormatted') ?? data_get($order, 'amountFormatted') ?? (is_numeric(data_get($order, 'total') ?? data_get($order, 'amount')) ? 'LKR '.number_format((float) (data_get($order, 'total') ?? data_get($order, 'amount')), 2) : data_get($order, 'total') ?? data_get($order, 'amount') ?? '—') }}</td><td class="whitespace-nowrap px-5 py-3.5"><span class="rounded-full bg-soft px-2.5 py-1 text-xs font-medium text-accent">{{ Illuminate\Support\Str::headline((string) (data_get($order, 'status') ?? 'Unknown')) }}</span></td></tr>@endforeach
                </tbody></table></div>
                @else<div class="grid min-h-56 place-items-center px-5 text-center"><div><span class="material-symbols-outlined text-3xl text-muted">receipt_long</span><p class="mt-2 text-sm font-medium">No recent orders</p><p class="mt-1 text-xs text-muted">Orders will appear here when the API returns them.</p></div></div>@endif
            </article>
            <article class="rounded-2xl border border-line bg-white shadow-card">
                <div class="border-b border-line px-5 py-4"><h2 class="text-base font-semibold">Top-selling products</h2><p class="mt-1 text-xs text-muted">Best sellers returned by the API</p></div>
                @if($loading)<div class="space-y-4 p-5" aria-label="Loading top products"><div class="skeleton h-10 rounded-lg"></div><div class="skeleton h-10 rounded-lg"></div><div class="skeleton h-10 rounded-lg"></div></div>@elseif(isset($apiErrors['topProducts']))<p class="p-6 text-sm text-muted">Top products could not be loaded.</p>@elseif(count($topProducts))<ol class="divide-y divide-line">@foreach(array_slice($topProducts, 0, 5) as $index => $product)<li class="flex items-center gap-3 px-5 py-4"><span class="grid h-8 w-8 shrink-0 place-items-center rounded-full bg-canvas text-xs font-semibold text-muted">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span><div class="min-w-0 flex-1"><p class="truncate text-sm font-medium">{{ data_get($product, 'name') ?? data_get($product, 'productName') ?? data_get($product, 'title') ?? 'Product' }}</p><p class="mt-1 text-xs text-muted">{{ data_get($product, 'unitsSold') ?? data_get($product, 'quantitySold') ?? data_get($product, 'salesCount') ?? '—' }} sold</p></div><span class="text-xs font-semibold">{{ data_get($product, 'revenueFormatted') ?? data_get($product, 'totalFormatted') ?? '' }}</span></li>@endforeach</ol>@else<div class="grid min-h-56 place-items-center px-5 text-center"><div><span class="material-symbols-outlined text-3xl text-muted">star</span><p class="mt-2 text-sm font-medium">No product data yet</p><p class="mt-1 text-xs text-muted">Top sellers are unavailable for this period.</p></div></div>@endif
            </article>
        </section>

        <section class="rounded-2xl border border-line bg-white shadow-card">
            <div class="flex items-center justify-between border-b border-line px-5 py-4"><div><h2 class="text-base font-semibold">Low-stock alerts</h2><p class="mt-1 text-xs text-muted">Inventory items flagged by the dashboard API</p></div><a href="{{ route('inventory.index') }}" class="text-xs font-semibold text-accent hover:underline">Inventory <span aria-hidden="true">→</span></a></div>
            @if($loading)<div class="space-y-3 p-5" aria-label="Loading inventory"><div class="skeleton h-10 rounded-lg"></div><div class="skeleton h-10 rounded-lg"></div></div>@elseif(isset($apiErrors['stock']))<div class="p-7 text-center text-sm text-muted">Inventory stock could not be loaded. <a class="font-semibold text-accent underline" href="{{ url()->full() }}">Retry</a></div>
            @elseif(count($lowStock))<div class="grid grid-cols-1 divide-y divide-line sm:grid-cols-2 xl:grid-cols-3 xl:divide-x xl:divide-y-0">@foreach($lowStock as $item)<article class="flex items-start gap-3 p-5"><span class="material-symbols-outlined mt-0.5 text-amber-700">warning</span><div class="min-w-0"><p class="truncate text-sm font-semibold">{{ data_get($item, 'productName') ?? data_get($item, 'name') ?? data_get($item, 'sku') ?? 'Inventory item' }}</p><p class="mt-1 text-xs text-muted">{{ data_get($item, 'quantity') ?? data_get($item, 'stock') ?? '—' }} remaining @if(data_get($item, 'reorderLevel') !== null) · Reorder at {{ data_get($item, 'reorderLevel') }}@endif</p></div></article>@endforeach</div>
            @else<div class="grid min-h-32 place-items-center px-5 text-center"><div><span class="material-symbols-outlined text-2xl text-accent">inventory</span><p class="mt-2 text-sm font-medium">No low-stock alerts</p><p class="mt-1 text-xs text-muted">No items were flagged by the API.</p></div></div>@endif
        </section>
    </main>
</div>
</body>
</html>
