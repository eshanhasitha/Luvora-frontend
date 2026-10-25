@if(session('status'))
    <div role="status" class="mb-5 flex items-start gap-3 rounded-xl border border-emerald-100 bg-emerald-50 px-4 py-3 text-sm text-emerald-800"><span class="material-symbols-outlined text-lg">check_circle</span><p>{{ session('status') }}</p></div>
@endif
@if($errors->has('api') || $errors->has('profile'))
    <div role="alert" class="mb-5 flex items-start gap-3 rounded-xl border border-rose-100 bg-rose-50 px-4 py-3 text-sm text-rose-800"><span class="material-symbols-outlined text-lg">error</span><p>{{ $errors->first('api') ?: $errors->first('profile') }}</p></div>
@endif

@if(!empty($apiErrors ?? []))
    @php($hasUnauthorizedApiError = collect($apiErrors)->contains(fn ($message) => str_contains(strtolower((string) $message), 'unauthorized') || str_contains(strtolower((string) $message), '401')))
    <section role="status" class="mb-5 flex flex-col gap-3 rounded-2xl border border-amber-200/80 bg-amber-50/80 p-4 text-sm text-amber-950 shadow-sm sm:flex-row sm:items-center sm:justify-between sm:px-5">
        <div class="flex min-w-0 items-start gap-3"><span class="material-symbols-outlined mt-0.5 text-xl text-amber-700">cloud_off</span><div><p class="font-semibold">{{ $apiPageTitle ?? 'Page' }} data is temporarily unavailable</p><p class="mt-0.5 text-xs leading-5 text-amber-900/80">{{ $hasUnauthorizedApiError ? 'The API rejected this admin session (401). Sign out and sign in again. If the error continues, the API administrator needs to check admin token validation.' : 'The page is available, but some information could not be loaded. Try again in a moment.' }}</p>
            <details class="mt-2 text-xs"><summary class="w-fit cursor-pointer font-semibold text-amber-900 underline decoration-amber-400 underline-offset-2">{{ count($apiErrors) }} data {{ count($apiErrors) === 1 ? 'section' : 'sections' }} affected</summary><ul class="mt-2 flex flex-wrap gap-x-4 gap-y-1 text-amber-900/80">@foreach($apiErrors as $key => $message)<li>{{ $apiLabels[$key] ?? Str::headline($key) }}</li>@endforeach</ul></details>
        </div></div>
        <a href="{{ url()->full() }}" class="inline-flex shrink-0 items-center justify-center gap-2 self-start rounded-full border border-amber-300 bg-white px-4 py-2 text-xs font-semibold text-amber-950 transition hover:bg-amber-100 sm:self-center"><span class="material-symbols-outlined text-base">refresh</span>Retry</a>
    </section>
@endif

@php($pageableSources = ['notifications', 'staff', 'roles', 'logs', 'events', 'tickets', 'complaints', 'promotions', 'coupons', 'campaigns', 'banners', 'products', 'stock', 'orders', 'orderTransactions', 'customers', 'categories', 'payments', 'transactions', 'shipments', 'reviews', 'reports', 'recentOrders', 'topProducts', 'lowStock', 'pendingTasks'])
@if(($apiPage ?? '') === 'dashboard')
    <style>#admin-live-api-results { display: none !important; }</style>
@endif
@if(in_array(($apiPage ?? ''), ['products', 'categories', 'inventory', 'customers', 'orders', 'payments', 'reports', 'staff', 'roles', 'settings', 'system-health', 'audit-logs', 'support-tickets', 'support-ticket-detail', 'support-complaints', 'reported-reviews', 'coupons', 'campaigns', 'banners', 'finance-reports', 'finance-refunds', 'finance-failed', 'delivery-failed', 'delivery-assignments'], true))
    <style>#admin-live-api-results { display: none !important; }</style>
@endif<div id="admin-live-api-results">
@foreach(($apiRecords ?? []) as $source => $records)
    @if(isset($apiPagination[$source]) && in_array($source, $pageableSources, true))
        @php($paging = $apiPagination[$source])
        @php($label = $apiLabels[$source] ?? Str::headline($source))
        @php($pages = $paging['pages'])

        @php($visiblePages = match (true) { ! $pages => [], $paging['page'] <= 3 => range(1, min(3, $pages)), $paging['page'] >= $pages - 2 => range(max(1, $pages - 2), $pages), default => [1, $paging['page'] - 1, $paging['page'], $paging['page'] + 1, $pages] })

        <section class="mb-5 overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm" aria-label="{{ Str::ucfirst($label) }} API results">
            <div class="flex flex-col gap-3 px-4 py-3 sm:flex-row sm:items-center sm:justify-between">
                <p class="text-sm text-slate-600">
                    @if($paging['to'] === 0)
                        Showing 0 {{ $label }}
                    @else
                        Showing <strong class="font-semibold text-slate-900">{{ number_format($paging['from']) }}&ndash;{{ number_format($paging['to']) }}</strong>
                        @if($paging['total'] !== null) of <strong class="font-semibold text-slate-900">{{ number_format($paging['total']) }}</strong> @endif
                        {{ $label }}
                    @endif
                </p>
                <div class="flex flex-wrap items-center justify-between gap-3 sm:justify-end">
                    <form method="GET" action="{{ url()->current() }}" class="flex items-center gap-2 text-xs text-slate-500">
                        @foreach(request()->except(['page', 'pageSize']) as $name => $value)<input type="hidden" name="{{ $name }}" value="{{ $value }}">@endforeach
                        <label for="page-size-{{ $source }}">Per page:</label>
                        <select id="page-size-{{ $source }}" name="pageSize" onchange="this.form.submit()" class="rounded-lg border border-slate-200 bg-white px-2 py-1.5 text-sm text-slate-700">
                            @foreach([10, 25, 50, 100] as $size)<option value="{{ $size }}" @selected($paging['pageSize'] === $size)>{{ $size }}</option>@endforeach
                        </select>
                    </form>
                    <nav class="flex items-center gap-1" aria-label="{{ Str::ucfirst($label) }} pages">
                        @php($previousPage = max(1, $paging['page'] - 1))
                        @php($nextPage = $pages ? min($pages, $paging['page'] + 1) : $paging['page'] + 1)
                        <a href="{{ request()->fullUrlWithQuery(['page' => $previousPage, 'pageSize' => $paging['pageSize']]) }}" @if($paging['page'] <= 1) aria-disabled="true" tabindex="-1" @endif class="rounded-lg border border-slate-200 px-2.5 py-1.5 text-sm {{ $paging['page'] <= 1 ? 'pointer-events-none opacity-40' : 'hover:bg-slate-50' }}" aria-label="Previous page">&lsaquo;</a>
                        @if($pages)
                            @foreach($visiblePages as $index => $pageNumber)
                                @if($index > 0 && $pageNumber - $visiblePages[$index - 1] > 1)<span class="px-1 text-slate-400" aria-hidden="true">...</span>@endif
                                <a href="{{ request()->fullUrlWithQuery(['page' => $pageNumber, 'pageSize' => $paging['pageSize']]) }}" @if($pageNumber === $paging['page']) aria-current="page" @endif class="min-w-9 rounded-lg border px-2.5 py-1.5 text-center text-sm {{ $pageNumber === $paging['page'] ? 'border-blue-700 bg-blue-700 font-semibold text-white' : 'border-slate-200 text-slate-700 hover:bg-slate-50' }}">{{ $pageNumber }}</a>
                            @endforeach
                        @else
                            <span class="px-2 text-xs text-slate-600">Page {{ $paging['page'] }}</span>
                        @endif
                        <a href="{{ request()->fullUrlWithQuery(['page' => $nextPage, 'pageSize' => $paging['pageSize']]) }}" @if(!$paging['hasNext']) aria-disabled="true" tabindex="-1" @endif class="rounded-lg border border-slate-200 px-2.5 py-1.5 text-sm {{ !$paging['hasNext'] ? 'pointer-events-none opacity-40' : 'hover:bg-slate-50' }}" aria-label="Next page">&rsaquo;</a>
                    </nav>
                </div>
            </div>
            @if(count($records))
                @php($columns = array_keys((array) $records[0]))
                <div class="overflow-x-auto border-t border-slate-100">
                    <table class="min-w-full text-left text-xs">
                        <thead class="bg-slate-50 text-slate-500"><tr>@foreach($columns as $column)<th scope="col" class="whitespace-nowrap px-3 py-2 font-semibold">{{ Str::headline((string) $column) }}</th>@endforeach</tr></thead>
                        <tbody class="divide-y divide-slate-100 text-slate-700">
                            @foreach($records as $record)
                                <tr>@foreach($columns as $column)@php($value = data_get($record, $column))<td class="max-w-xs px-3 py-2">{{ is_scalar($value) || $value === null ? (string) $value : json_encode($value, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) }}</td>@endforeach</tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @elseif(empty($apiErrors[$source] ?? null))
                <p class="border-t border-slate-100 px-4 py-5 text-center text-sm text-slate-500">No {{ $label }} were returned by the API.</p>
            @endif
        </section>
    @endif
@endforeach
@php($detailSources = ['settings', 'summary', 'salesChart', 'ordersChart', 'revenueSummary', 'product', 'stockDetail', 'customer', 'order', 'transaction', 'review', 'shipment', 'notification', 'ticket', 'complaint', 'category', 'staffDetail', 'promotionDetail', 'couponDetail', 'campaignDetail', 'bannerDetail', 'report'])
@foreach(($apiRecords ?? []) as $source => $records)
    @if(in_array($source, $detailSources, true))
        @php($label = $apiLabels[$source] ?? Str::headline($source))
        <section class="mb-5 overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm" aria-label="{{ Str::ucfirst($label) }} live data">
            <h2 class="border-b border-slate-100 px-4 py-3 text-sm font-semibold text-slate-800">{{ Str::ucfirst($label) }} from the API</h2>
            @if(count($records))
                @php($columns = array_keys((array) $records[0]))
                <div class="overflow-x-auto"><table class="min-w-full text-left text-xs"><thead class="bg-slate-50 text-slate-500"><tr>@foreach($columns as $column)<th scope="col" class="whitespace-nowrap px-3 py-2 font-semibold">{{ Str::headline((string) $column) }}</th>@endforeach</tr></thead><tbody class="divide-y divide-slate-100 text-slate-700">@foreach($records as $record)<tr>@foreach($columns as $column)@php($value = data_get($record, $column))<td class="max-w-xs px-3 py-2">{{ is_scalar($value) || $value === null ? (string) $value : json_encode($value, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) }}</td>@endforeach</tr>@endforeach</tbody></table></div>
            @elseif(empty($apiErrors[$source] ?? null))
                <p class="px-4 py-5 text-sm text-slate-500">The API returned no {{ Str::lower($label) }}.</p>
            @endif
        </section>
    @endif
@endforeach
</div>
