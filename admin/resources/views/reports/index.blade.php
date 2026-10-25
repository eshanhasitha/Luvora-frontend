<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"><title>Reports | Luvora Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config={theme:{extend:{colors:{ink:'#202321',muted:'#707873',line:'#e8ebe8',canvas:'#f7f8f6',accent:'#365c4a',soft:'#edf3ee'},fontFamily:{sans:['Inter','ui-sans-serif','system-ui'],serif:['Bodoni Moda','Georgia','serif']},boxShadow:{card:'0 8px 28px rgba(25,35,29,.045)'}}}};</script>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:wght@500;600&family=Inter:wght@400;500;600;700&family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap" rel="stylesheet">
    <style>[x-cloak]{display:none!important}.material-symbols-outlined{font-variation-settings:'FILL' 0,'wght' 400,'GRAD' 0,'opsz' 20}body{font-family:Inter,ui-sans-serif,system-ui,sans-serif;-webkit-font-smoothing:antialiased}:focus-visible{outline:3px solid rgba(54,92,74,.45);outline-offset:2px}@keyframes shimmer{100%{transform:translateX(100%)}}.skeleton{position:relative;overflow:hidden;background:#edf0ed}.skeleton:after{position:absolute;inset:0;transform:translateX(-100%);background:linear-gradient(90deg,transparent,rgba(255,255,255,.65),transparent);content:'';animation:shimmer 1.6s infinite}</style>
</head>
<body class="min-h-screen bg-canvas text-ink">
@php
    $from = request('from', now('UTC')->subDays(29)->toDateString());
    $to = request('to', now('UTC')->toDateString());
    $payloads = $apiData ?? [];
    $getRows = static function ($payload, array $keys = []) {
        if (is_array($payload) && array_is_list($payload)) return $payload;
        foreach ($keys as $key) { $value = data_get($payload, $key); if (is_array($value) && array_is_list($value)) return $value; }
        return [];
    };
    $sales = $payloads['sales'] ?? [];
    $revenue = $payloads['revenue'] ?? [];
    $salesDays = $getRows($sales, ['days', 'data.days']);
    $orderRows = $getRows($payloads['orders'] ?? [], ['orders', 'data.orders', 'items', 'data']);
    $productRows = $getRows($payloads['products'] ?? [], ['products', 'data.products', 'items', 'data']);
    $stockRows = $getRows($payloads['inventory'] ?? [], ['stock', 'items', 'records', 'data.stock', 'data.items', 'data']);
    $paymentRows = $getRows($payloads['payments'] ?? [], ['transactions', 'data.transactions', 'payments', 'items', 'data']);
    $customerRows = $getRows($payloads['customers'] ?? [], ['customers', 'data.customers', 'items', 'data']);
    $paymentStatuses = [];
    foreach ($paymentRows as $payment) {
        $status = (string) (data_get($payment, 'status') ?? data_get($payment, 'paymentStatus') ?? 'Unknown');
        $paymentStatuses[$status] = ($paymentStatuses[$status] ?? 0) + 1;
    }
    $salesValues = array_map(static fn ($row) => (float) (data_get($row, 'grossOrderValue') ?? 0), $salesDays);
    $chartMax = max(1, ...($salesValues ?: [0]));
    $apiIssues = $apiErrors ?? [];
    $loading = request()->boolean('loading');
    $pick = static function ($row, array $fields) { $safe = []; foreach ($fields as $field) { $value = data_get($row, $field); if ($value !== null) $safe[$field] = $value; } return $safe; };
    $exportPayloads = [
        'sales' => ['metric' => data_get($sales, 'metric'), 'orderCount' => data_get($sales, 'orderCount'), 'grossOrderValue' => data_get($sales, 'grossOrderValue'), 'days' => array_map(fn ($row) => $pick($row, ['date','orderCount','grossOrderValue']), $salesDays)],
        'revenue' => $pick($revenue, ['metric','transactionCount','totalAmount']),
        'orders' => array_map(fn ($row) => $pick($row, ['id','orderId','orderNumber','createdAt','status','totalAmount','itemCount']), $orderRows),
        'products' => array_map(fn ($row) => $pick($row, ['productId','units','grossSales']), $productRows),
        'inventory' => array_map(fn ($row) => $pick($row, ['sku','productId','productName','availableQuantity','quantity','reorderLevel','reorderPoint','status']), $stockRows),
        'payments' => array_map(fn ($row) => $pick($row, ['status','paymentStatus']), $paymentRows),
        'customers' => array_map(fn ($row) => $pick($row, ['id','customerId','createdAt','registeredAt']), $customerRows),
    ];
@endphp
@include('partials.sidebar')
<div class="min-h-screen md:pl-64">
    <header class="fixed inset-x-0 top-0 z-30 flex h-[76px] items-center justify-between border-b border-line bg-white/90 px-4 backdrop-blur-xl md:left-64 md:px-8">
        <div class="flex min-w-0 items-center gap-3"><button type="button" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-line text-ink md:hidden" aria-label="Open navigation" aria-controls="admin-sidebar" aria-expanded="false" onclick="const nav=document.getElementById('admin-sidebar');nav.classList.toggle('-translate-x-full');this.setAttribute('aria-expanded',String(!nav.classList.contains('-translate-x-full')))" ><span class="material-symbols-outlined">menu</span></button><form method="GET" action="{{ route('dashboard') }}" class="hidden w-full max-w-lg items-center gap-2 rounded-xl border border-line bg-canvas px-3 py-2 sm:flex"><span class="material-symbols-outlined text-muted">search</span><input type="search" name="search" aria-label="Search admin" placeholder="Search orders, products, customers" class="min-w-0 flex-1 border-0 bg-transparent text-sm outline-none placeholder:text-muted"></form></div>
        <div class="flex items-center gap-3"><a href="{{ route('admin.notifications') }}" class="relative inline-flex h-10 w-10 items-center justify-center rounded-full border border-line bg-white text-muted" aria-label="Notifications"><span class="material-symbols-outlined">notifications</span></a><a href="{{ route('admin.profile') }}" class="flex items-center gap-3 rounded-full py-1 pl-1 pr-2 hover:bg-canvas" aria-label="Admin profile">@include('partials.profile-avatar', ['avatarSize' => 'h-9 w-9'])<span class="hidden text-left sm:block"><span class="block text-sm font-semibold">{{ data_get(session('admin_user'), 'name') ?? data_get(session('admin_user'), 'Name') ?? 'Admin' }}</span><span class="block text-xs text-muted">{{ data_get(session('admin_user'), 'role') ?? data_get(session('admin_user'), 'Role') ?? 'Administrator' }}</span></span></a></div>
    </header>
    <main class="mx-auto max-w-[1600px] px-4 pb-12 pt-24 sm:px-6 lg:px-9">
        <nav aria-label="Breadcrumb" class="mb-5 flex items-center gap-2 text-xs text-muted"><a href="{{ route('dashboard') }}" class="hover:text-accent">Admin</a><span aria-hidden="true">/</span><span aria-current="page" class="font-semibold text-ink">Reports &amp; analytics</span></nav>
        @include('partials.api-state')
        <div class="mb-7 flex flex-col justify-between gap-5 lg:flex-row lg:items-end">
            <div><p class="mb-2 text-[11px] font-semibold uppercase tracking-[.18em] text-accent">Luvora administration</p><h1 class="font-serif text-4xl font-medium tracking-tight text-ink sm:text-5xl">Reports &amp; analytics</h1><p class="mt-2 max-w-2xl text-sm leading-6 text-muted">Reporting data returned by the connected services. Values are shown with the source coverage and limitations.</p></div>
            <div class="flex flex-wrap items-end gap-2">
                <form method="GET" action="{{ route('reports.index') }}" class="flex flex-wrap items-end gap-2 rounded-2xl border border-line bg-white p-3 shadow-card" aria-label="Filter report date range">
                    <label class="grid gap-1 text-[11px] font-semibold uppercase tracking-wide text-muted">From<input type="date" name="from" value="{{ $from }}" max="{{ $to }}" class="rounded-lg border border-line bg-white px-3 py-2 text-sm font-normal text-ink"></label>
                    <label class="grid gap-1 text-[11px] font-semibold uppercase tracking-wide text-muted">To<input type="date" name="to" value="{{ $to }}" min="{{ $from }}" max="{{ now('UTC')->toDateString() }}" class="rounded-lg border border-line bg-white px-3 py-2 text-sm font-normal text-ink"></label>
                    <button type="submit" class="inline-flex items-center gap-2 rounded-lg bg-ink px-4 py-2.5 text-sm font-semibold text-white hover:bg-accent"><span class="material-symbols-outlined text-base">filter_alt</span>Apply</button>
                </form>
                <button type="button" id="export-reports" class="inline-flex items-center gap-2 rounded-lg border border-line bg-white px-4 py-3 text-sm font-semibold text-ink hover:bg-canvas" aria-label="Export currently loaded report data as CSV"><span class="material-symbols-outlined text-base">download</span>Export CSV</button>
            </div>
        </div>

        <aside class="mb-6 rounded-xl border border-slate-200 bg-white px-4 py-3 text-xs leading-5 text-muted shadow-card" aria-label="Report conventions">
            <span class="font-semibold text-ink">Report conventions</span><span class="mx-2 text-slate-300" aria-hidden="true">•</span>Dates and report boundaries use UTC. Aggregated amount fields do not include a currency code; values retain the source amount and are not converted or grouped by currency.<span class="mx-2 text-slate-300" aria-hidden="true">•</span>Sales, order volume, and product aggregates rely on upstream order pagination totals; without them the service can only collect the first page.<span class="mx-2 text-slate-300" aria-hidden="true">•</span>Comparison periods are not supported by ReportingService.
        </aside>

        <section class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4" aria-label="Report highlights">
            @foreach([
                ['Sales gross order value', data_get($sales, 'grossOrderValue'), 'Completed order count', data_get($sales, 'orderCount'), 'sales'],
                ['Completed payment value', data_get($revenue, 'totalAmount'), 'Completed transactions', data_get($revenue, 'transactionCount'), 'revenue'],
                ['Orders returned', count($orderRows), 'Source-reported total', data_get($payloads['orders'] ?? [], 'totalItems'), 'orders'],
                ['Payments returned', count($paymentRows), 'Status breakdown', count($paymentStatuses) ? count($paymentStatuses).' states' : 'Unavailable', 'payments'],
            ] as [$title, $value, $subLabel, $subValue, $key])
                <article class="rounded-2xl border border-line bg-white p-5 shadow-card">
                    <div class="flex items-start justify-between gap-3"><h2 class="text-sm font-medium text-muted">{{ $title }}</h2><span class="material-symbols-outlined rounded-xl bg-soft p-2 text-accent" aria-hidden="true">{{ ['sales'=>'monitoring','revenue'=>'payments','orders'=>'receipt_long','payments'=>'account_balance_wallet'][$key] }}</span></div>
                    @if($loading)<div class="skeleton mt-5 h-8 rounded-lg" aria-label="Loading {{ strtolower($title) }}"></div>@elseif(isset($apiIssues[$key]))<p class="mt-5 text-sm text-rose-700">Could not load</p>@elseif($value !== null)<p class="mt-5 break-words text-2xl font-semibold tracking-tight">{{ is_numeric($value) ? number_format((float) $value, 2) : $value }}</p>@else<p class="mt-5 text-sm text-muted">Not provided by API</p>@endif
                    <p class="mt-2 text-xs text-muted">{{ $subLabel }}: {{ is_numeric($subValue) ? number_format((float) $subValue) : ($subValue ?? 'Not provided') }}</p>
                </article>
            @endforeach
        </section>

        <div class="grid grid-cols-1 gap-5 xl:grid-cols-2">
            <section class="rounded-2xl border border-line bg-white p-5 shadow-card" aria-labelledby="sales-title">
                <div class="mb-4"><p class="text-[10px] font-semibold uppercase tracking-[.16em] text-accent">{{ $from }} — {{ $to }} UTC</p><h2 id="sales-title" class="mt-1 text-lg font-semibold">Sales</h2><p class="mt-1 text-xs leading-5 text-muted">Gross order value by order creation day; cancelled orders excluded by the service.</p></div>
                @if($loading)<div class="skeleton h-56 rounded-xl" aria-label="Loading sales chart"></div>@elseif(isset($apiIssues['sales']))<p role="alert" class="rounded-xl bg-rose-50 p-5 text-sm text-rose-800">Sales report unavailable. <a class="font-semibold underline" href="{{ url()->full() }}">Retry</a></p>@elseif(count($salesDays))
                    <div class="overflow-x-auto rounded-xl bg-canvas p-3"><svg viewBox="0 0 720 250" class="h-56 min-w-[560px] w-full" role="img" aria-labelledby="sales-chart-title sales-chart-desc"><title id="sales-chart-title">Gross order value by UTC day</title><desc id="sales-chart-desc">{{ count($salesDays) }} daily points from the sales API; cancelled orders are excluded. Exact values are listed in the adjacent accessible table.</desc><line x1="35" y1="210" x2="705" y2="210" stroke="#dfe5e1"/><line x1="35" y1="130" x2="705" y2="130" stroke="#e8ebe8" stroke-dasharray="3 5"/><line x1="35" y1="50" x2="705" y2="50" stroke="#e8ebe8" stroke-dasharray="3 5"/>
                        @php($step = count($salesDays) > 1 ? 650 / (count($salesDays) - 1) : 0)
                        @php($points = collect($salesDays)->map(fn($row,$i) => (35 + $i*$step).','. (210 - ((float)data_get($row,'grossOrderValue',0) / $chartMax * 170)))->implode(' '))
                        <polyline points="{{ $points }}" fill="none" stroke="#365c4a" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>@foreach($salesDays as $i => $row)@php($x=35+$i*$step)@php($y=210-((float)data_get($row,'grossOrderValue',0)/$chartMax*170))<circle cx="{{ $x }}" cy="{{ $y }}" r="4" fill="#365c4a"><title>{{ data_get($row,'date','Date unavailable') }}: {{ data_get($row,'grossOrderValue',0) }} source currency</title></circle>@endforeach
                    </svg></div>
                    <div class="mt-4 overflow-x-auto"><table class="min-w-full text-left text-xs"><caption class="sr-only">Daily sales values returned by ReportingService in UTC</caption><thead class="text-muted"><tr><th scope="col" class="px-3 py-2">UTC date</th><th scope="col" class="px-3 py-2">Orders excluding cancellations</th><th scope="col" class="px-3 py-2">Gross order value (source currency)</th></tr></thead><tbody class="divide-y divide-line">@foreach($salesDays as $day)<tr><td class="px-3 py-2">{{ data_get($day,'date','—') }}</td><td class="px-3 py-2">{{ data_get($day,'orderCount','—') }}</td><td class="px-3 py-2">{{ data_get($day,'grossOrderValue','—') }}</td></tr>@endforeach</tbody></table></div>
                @else<div class="grid min-h-48 place-items-center rounded-xl bg-canvas p-5 text-center"><div><span aria-hidden="true" class="material-symbols-outlined text-3xl text-muted">monitoring</span><p class="mt-2 text-sm font-medium">No sales points for this range</p></div></div>@endif
            </section>

            <section class="rounded-2xl border border-line bg-white p-5 shadow-card" aria-labelledby="orders-title"><div class="mb-4"><h2 id="orders-title" class="text-lg font-semibold">Order volume</h2><p class="mt-1 text-xs leading-5 text-muted">Daily non-cancelled order counts from the same sales series.</p></div>
                @if(isset($apiIssues['sales']))<p role="alert" class="rounded-xl bg-rose-50 p-5 text-sm text-rose-800">Order volume unavailable because the sales source failed.</p>@elseif(count($salesDays))<div class="space-y-3" role="img" aria-label="Order count by UTC day; cancelled orders are excluded.">@foreach($salesDays as $day)@php($count=(float)data_get($day,'orderCount',0))<div class="grid grid-cols-[5.5rem_1fr_3rem] items-center gap-3"><span class="truncate text-xs text-muted">{{ IlluminateSupportCarbon::parse(data_get($day,'date'))->format('M j') }}</span><div class="h-3 overflow-hidden rounded-full bg-canvas"><span class="block h-full rounded-full bg-accent" style="width:{{ max(1, $count / max(1, max(array_map(fn($r)=>(float)data_get($r,'orderCount',0),$salesDays))) * 100) }}%"></span></div><span class="text-right text-xs font-semibold">{{ number_format($count) }}</span></div>@endforeach</div>@else<div class="grid min-h-48 place-items-center rounded-xl bg-canvas p-5 text-center text-sm text-muted">No order-volume points returned.</div>@endif
            </section>

            <section class="rounded-2xl border border-line bg-white p-5 shadow-card" aria-labelledby="products-title"><div class="mb-4"><h2 id="products-title" class="text-lg font-semibold">Best-selling products</h2><p class="mt-1 text-xs leading-5 text-muted">Ranked by gross sales from non-cancelled order lines. The API currently returns product IDs only.</p></div>
                @if(isset($apiIssues['products']))<p role="alert" class="rounded-xl bg-rose-50 p-5 text-sm text-rose-800">Product report unavailable.</p>@elseif(count($productRows))<div class="space-y-3" role="list" aria-label="Products ordered by gross sales returned by the API">@foreach(array_slice($productRows,0,10) as $product)@php($gross=(float)data_get($product,'grossSales',0))<div role="listitem" class="grid grid-cols-[minmax(0,1fr)_minmax(5rem,2fr)_auto] items-center gap-3"><div class="min-w-0"><p class="truncate text-sm font-medium">{{ data_get($product,'productId','Product ID unavailable') }}</p><p class="text-xs text-muted">{{ data_get($product,'units','—') }} units</p></div><div class="h-2 overflow-hidden rounded-full bg-canvas"><span class="block h-full rounded-full bg-accent" style="width:{{ max(1,$gross/max(1,max(array_map(fn($r)=>(float)data_get($r,'grossSales',0),$productRows)))*100) }}%"></span></div><span class="text-xs font-semibold">{{ data_get($product,'grossSales','—') }}</span></div>@endforeach</div>@else<div class="grid min-h-32 place-items-center rounded-xl bg-canvas p-5 text-center text-sm text-muted">No product sales were returned for this date range.</div>@endif
            </section>

            <section class="rounded-2xl border border-line bg-white p-5 shadow-card" aria-labelledby="inventory-title"><div class="mb-4"><h2 id="inventory-title" class="text-lg font-semibold">Inventory health</h2><p class="mt-1 text-xs leading-5 text-muted">Current snapshot from InventoryService; not date-filtered. Counts and health ratios are not inferred from this capped response.</p></div>
                @if(isset($apiIssues['inventory']))<p role="alert" class="rounded-xl bg-rose-50 p-5 text-sm text-rose-800">Inventory snapshot unavailable.</p>@elseif(count($stockRows))<div class="overflow-x-auto"><table class="min-w-full text-left text-xs"><caption class="sr-only">Inventory snapshot fields returned by InventoryService</caption><thead class="text-muted"><tr><th scope="col" class="px-3 py-2">SKU / product</th><th scope="col" class="px-3 py-2">Available</th><th scope="col" class="px-3 py-2">Reorder level</th><th scope="col" class="px-3 py-2">Status</th></tr></thead><tbody class="divide-y divide-line">@foreach(array_slice($stockRows,0,12) as $stock)<tr><td class="max-w-48 truncate px-3 py-2">{{ data_get($stock,'sku') ?? data_get($stock,'productName') ?? data_get($stock,'productId','—') }}</td><td class="px-3 py-2">{{ data_get($stock,'availableQuantity') ?? data_get($stock,'quantity','—') }}</td><td class="px-3 py-2">{{ data_get($stock,'reorderLevel') ?? data_get($stock,'reorderPoint','—') }}</td><td class="px-3 py-2">{{ data_get($stock,'status','—') }}</td></tr>@endforeach</tbody></table></div>@else<div class="grid min-h-32 place-items-center rounded-xl bg-canvas p-5 text-center text-sm text-muted">No inventory records returned.</div>@endif
            </section>

            <section class="rounded-2xl border border-line bg-white p-5 shadow-card" aria-labelledby="payments-title"><div class="mb-4"><h2 id="payments-title" class="text-lg font-semibold">Payment outcomes</h2><p class="mt-1 text-xs leading-5 text-muted">Status counts among transactions returned for this period. The source may be incomplete if payment pagination metadata is absent.</p></div>
                @if(isset($apiIssues['payments']))<p role="alert" class="rounded-xl bg-rose-50 p-5 text-sm text-rose-800">Payment outcomes unavailable.</p>@elseif(count($paymentStatuses))<div class="space-y-3" role="list" aria-label="Counts by payment status in returned transaction records">@foreach($paymentStatuses as $status=>$count)<div role="listitem" class="flex items-center justify-between rounded-xl bg-canvas px-4 py-3"><span class="text-sm font-medium">{{ IlluminateSupportStr::headline($status) }}</span><span class="rounded-full bg-white px-3 py-1 text-xs font-semibold">{{ number_format($count) }}</span></div>@endforeach</div><p class="mt-3 text-xs text-muted">{{ count($paymentRows) }} transaction records returned.</p>@else<div class="grid min-h-32 place-items-center rounded-xl bg-canvas p-5 text-center text-sm text-muted">No transactions returned for this period.</div>@endif
            </section>

            <section class="rounded-2xl border border-line bg-white p-5 shadow-card" aria-labelledby="customers-title"><div class="mb-4"><h2 id="customers-title" class="text-lg font-semibold">Customer growth</h2><p class="mt-1 text-xs leading-5 text-muted">Growth cannot be calculated: this report currently returns at most the first 100 customer records and does not apply the requested date range.</p></div>
                @if(isset($apiIssues['customers']))<p role="alert" class="rounded-xl bg-rose-50 p-5 text-sm text-rose-800">Customer records unavailable.</p>@elseif(count($customerRows))<p class="mb-3 text-xs text-muted">Showing {{ min(100,count($customerRows)) }} returned customer records; no growth total or trend is inferred.</p><div class="overflow-x-auto"><table class="min-w-full text-left text-xs"><caption class="sr-only">Customer reference and registration time from the first 100 records</caption><thead class="text-muted"><tr><th scope="col" class="px-3 py-2">Customer reference</th><th scope="col" class="px-3 py-2">Registered (API timestamp)</th></tr></thead><tbody class="divide-y divide-line">@foreach(array_slice($customerRows,0,10) as $customer)<tr><td class="max-w-56 truncate px-3 py-2">{{ data_get($customer,'id') ?? data_get($customer,'customerId','—') }}</td><td class="px-3 py-2">{{ data_get($customer,'createdAt') ?? data_get($customer,'registeredAt','—') }}</td></tr>@endforeach</tbody></table></div>@else<div class="grid min-h-32 place-items-center rounded-xl bg-canvas p-5 text-center text-sm text-muted">No customer records returned.</div>@endif
            </section>
        </div>
        <p class="mt-5 text-xs leading-5 text-muted">Export includes only the report responses currently loaded for this authorized admin session. CSV columns are section, record index, field, and source value. Export does not include a comparison period.</p>
    </main>
</div>
<script>
    (function(){
        const payloads = @json($exportPayloads);
        const button = document.getElementById('export-reports');
        const csvCell = value => '"' + String(value ?? '').replaceAll('"','""') + '"';
        function extract(value, prefix, rows) {
            if (Array.isArray(value)) { value.forEach((item,index) => extract(item, prefix ? prefix + '.' + index : String(index), rows)); return; }
            if (value && typeof value === 'object') { Object.entries(value).forEach(([key,item]) => extract(item, prefix ? prefix + '.' + key : key, rows)); return; }
            rows.push([prefix, value ?? '']);
        }
        button?.addEventListener('click', function(){
            const rows = [['section','record index','field','source value']];
            Object.entries(payloads).forEach(([section,payload]) => {
                const list = Array.isArray(payload) ? payload : [payload];
                list.forEach((record,index) => { const fields=[]; extract(record,'',fields); fields.forEach(([field,value])=>rows.push([section,index+1,field,value])); });
            });
            if(rows.length===1){ window.alert('There is no report data to export.'); return; }
            const csv='\uFEFF'+rows.map(row=>row.map(csvCell).join(',')).join('\r\n');
            const url=URL.createObjectURL(new Blob([csv],{type:'text/csv;charset=utf-8'}));
            const link=document.createElement('a'); link.href=url; link.download='luvora-reports-{{ $from }}-{{ $to }}-utc.csv'; document.body.appendChild(link); link.click(); link.remove(); URL.revokeObjectURL(url);
        });
    })();
</script>
</body></html>
