<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Inventory | Luvora Admin</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>body{font-family:Inter,ui-sans-serif,system-ui,sans-serif;-webkit-font-smoothing:antialiased}dialog::backdrop{background:rgba(15,23,42,.38);backdrop-filter:blur(2px)}:focus-visible{outline:3px solid rgba(54,92,74,.45);outline-offset:2px}</style>
</head>
<body class="min-h-screen bg-[#f7f8f6] text-[#202321]">
@php
    $inventorySummary = $apiData['summary'] ?? [];
    $stockRows = $apiRecords['stock'] ?? [];
    $movementRows = $apiRecords['movements'] ?? [];
    $productRows = $apiRecords['products'] ?? [];
    $productsById = [];
    foreach ($productRows as $product) {
        $id = data_get($product, 'id') ?? data_get($product, 'productId');
        if ($id) $productsById[strtolower((string) $id)] = $product;
    }
    $totalSkus = data_get($inventorySummary, 'productCount');
    $totalSkus = is_numeric($totalSkus) ? (int) $totalSkus : count($stockRows);
    $lowIncludingOut = data_get($inventorySummary, 'lowStockCount');
    $lowIncludingOut = is_numeric($lowIncludingOut) ? (int) $lowIncludingOut : count(array_filter($stockRows, fn ($row) => (int) data_get($row, 'availableQuantity', 0) <= (int) data_get($row, 'reorderLevel', 0)));
    $outOfStock = data_get($inventorySummary, 'outOfStockCount');
    $outOfStock = is_numeric($outOfStock) ? (int) $outOfStock : count(array_filter($stockRows, fn ($row) => (int) data_get($row, 'availableQuantity', 0) === 0));
    $lowStock = max(0, $lowIncludingOut - $outOfStock);
    $inStock = max(0, $totalSkus - $lowIncludingOut);
@endphp
@include('partials.sidebar')
<div class="min-h-screen md:pl-64">
  <main class="mx-auto max-w-[1600px] px-4 pb-12 pt-24 sm:px-6 lg:px-9">
    @include('partials.api-state')
    @if(session('status'))<div role="status" class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-900">{{ session('status') }}</div>@endif
    @if($errors->has('api'))<div role="alert" class="mb-5 rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-900">{{ $errors->first('api') }}</div>@endif
    <nav aria-label="Breadcrumb" class="mb-5 flex items-center gap-2 text-xs text-slate-500"><a href="{{ route('dashboard') }}" class="hover:text-[#365c4a]">Admin</a><span aria-hidden="true">/</span><span aria-current="page" class="font-semibold text-slate-800">Inventory</span></nav>
    <div class="mb-7 flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
      <div><p class="mb-2 text-[11px] font-bold uppercase tracking-[.2em] text-[#365c4a]">Stock control</p><h1 class="text-3xl font-semibold tracking-tight text-[#202321] sm:text-4xl">Inventory</h1><p class="mt-2 max-w-2xl text-sm leading-6 text-slate-600">Monitor available stock and review every adjustment in the inventory ledger.</p></div>
      <p class="flex items-center gap-2 self-start rounded-full border border-slate-200 bg-white px-3 py-2 text-xs text-slate-600 sm:self-auto"><span class="h-2 w-2 rounded-full bg-[#365c4a]"></span>Live InventoryService data</p>
    </div>

    <section class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4" aria-label="Inventory summary">
      @foreach([
        ['label' => 'Total SKUs', 'value' => $totalSkus, 'icon' => 'inventory_2', 'tone' => 'bg-[#edf3ee] text-[#365c4a]'],
        ['label' => 'In stock', 'value' => $inStock, 'icon' => 'check_circle', 'tone' => 'bg-emerald-50 text-emerald-700'],
        ['label' => 'Low stock', 'value' => $lowStock, 'icon' => 'warning', 'tone' => 'bg-amber-50 text-amber-700'],
        ['label' => 'Out of stock', 'value' => $outOfStock, 'icon' => 'remove_shopping_cart', 'tone' => 'bg-rose-50 text-rose-700'],
      ] as $stat)
      <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-[0_5px_20px_rgba(15,23,42,.035)]"><div class="flex items-center justify-between"><p class="text-sm text-slate-500">{{ $stat['label'] }}</p><span class="grid h-10 w-10 place-items-center rounded-xl {{ $stat['tone'] }}"><span class="material-symbols-outlined">{{ $stat['icon'] }}</span></span></div><p class="mt-3 text-3xl font-semibold tracking-tight text-slate-900">{{ number_format((int) $stat['value']) }}</p></article>
      @endforeach
    </section>

    <section class="mb-6 rounded-2xl border border-slate-200 bg-white p-4 text-sm text-slate-600 shadow-[0_5px_20px_rgba(15,23,42,.025)] sm:px-5"><strong class="font-semibold text-slate-800">Inventory fields:</strong> quantity, reserved units, reorder threshold, and movement audit come from InventoryService. Product name and SKU are matched from ProductService. Variant quantities and operator names are not provided by the current APIs; movement actor IDs are shown when available.</section>

    <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-[0_5px_20px_rgba(15,23,42,.035)]">
      <div class="flex flex-col gap-4 border-b border-slate-100 p-4 sm:p-5 lg:flex-row lg:items-center lg:justify-between">
        <div><h2 class="text-lg font-semibold text-slate-900">Stock control</h2><p class="mt-1 text-xs text-slate-500">Adjustments are saved through the auditable InventoryService operation.</p></div>
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
          <label class="relative block sm:w-72"><span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-lg text-slate-400">search</span><input id="inventory-search" type="search" autocomplete="off" placeholder="Search product or SKU" aria-label="Search inventory" class="w-full rounded-lg border border-slate-200 bg-white py-2.5 pl-10 pr-3 text-sm outline-none focus:border-[#365c4a] focus:ring-2 focus:ring-[#365c4a]/15"></label>
          <label class="sr-only" for="inventory-status-filter">Filter by stock status</label><select id="inventory-status-filter" class="rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-sm text-slate-700"><option value="all">All statuses</option><option value="in">In stock</option><option value="low">Low stock</option><option value="out">Out of stock</option></select>
        </div>
      </div>
      <div class="flex items-center gap-5 border-b border-slate-100 px-4 sm:px-5" role="tablist" aria-label="Inventory data views">
        <button id="inventory-stock-tab" type="button" role="tab" aria-selected="true" aria-controls="inventory-stock-panel" class="border-b-2 border-[#365c4a] py-3 text-sm font-semibold text-[#365c4a]">Stock overview</button>
        <button id="inventory-movements-tab" type="button" role="tab" aria-selected="false" aria-controls="inventory-movements-panel" class="border-b-2 border-transparent py-3 text-sm font-semibold text-slate-500 hover:text-slate-800">Movement history</button>
      </div>
      <div id="inventory-stock-panel" class="overflow-x-auto" role="tabpanel" aria-labelledby="inventory-stock-tab">
        <table class="min-w-[1000px] w-full text-left text-sm">
          <thead class="bg-slate-50 text-[11px] uppercase tracking-[.07em] text-slate-500"><tr><th scope="col" class="px-5 py-3.5">SKU</th><th scope="col" class="px-4 py-3.5">Product</th><th scope="col" class="px-4 py-3.5">Variant</th><th scope="col" class="px-4 py-3.5 text-right">Available</th><th scope="col" class="px-4 py-3.5 text-right">Reserved</th><th scope="col" class="px-4 py-3.5 text-right">Reorder threshold</th><th scope="col" class="px-4 py-3.5">Status</th><th scope="col" class="px-5 py-3.5 text-right">Action</th></tr></thead>
          <tbody id="inventory-stock-rows" class="divide-y divide-slate-100">
            @forelse($stockRows as $stockRow)
              @php
                $productId = data_get($stockRow, 'productId');
                $product = $productsById[strtolower((string) $productId)] ?? [];
                $sku = data_get($product, 'sku') ?? data_get($product, 'SKU') ?? 'Not provided';
                $name = data_get($product, 'name') ?? data_get($product, 'productName') ?? 'Product details unavailable';
                $available = (int) data_get($stockRow, 'availableQuantity', 0);
                $reserved = (int) data_get($stockRow, 'reservedQuantity', 0);
                $threshold = (int) data_get($stockRow, 'reorderLevel', 0);
                $status = $available === 0 ? 'out' : ($available <= $threshold ? 'low' : 'in');
                $statusLabel = ['out' => 'Out of stock', 'low' => 'Low stock', 'in' => 'In stock'][$status];
                $statusClass = ['out' => 'bg-rose-50 text-rose-700', 'low' => 'bg-amber-50 text-amber-800', 'in' => 'bg-emerald-50 text-emerald-700'][$status];
              @endphp
              <tr data-inventory-row data-status="{{ $status }}" data-search="{{ $sku }} {{ $name }} {{ $productId }}">
                <td class="whitespace-nowrap px-5 py-4 font-mono text-xs text-slate-600">{{ $sku }}</td><td class="min-w-56 px-4 py-4 font-medium text-slate-900">{{ $name }}</td><td class="px-4 py-4 text-slate-400">Not supported</td><td class="px-4 py-4 text-right font-semibold tabular-nums text-slate-900">{{ number_format($available) }}</td><td class="px-4 py-4 text-right tabular-nums text-slate-700">{{ number_format($reserved) }}</td><td class="px-4 py-4 text-right tabular-nums text-slate-700">{{ number_format($threshold) }}</td><td class="px-4 py-4"><span class="rounded-full px-2.5 py-1 text-xs font-medium {{ $statusClass }}">{{ $statusLabel }}</span></td><td class="px-5 py-4 text-right"><button type="button" data-open-adjustment data-product-id="{{ $productId }}" data-product-name="{{ $name }}" data-product-sku="{{ $sku }}" data-available="{{ $available }}" class="rounded-lg border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-700 transition hover:border-[#365c4a] hover:text-[#365c4a]">Adjust stock</button></td>
              </tr>
            @empty
              <tr><td colspan="8" class="px-5 py-14 text-center"><span class="mx-auto grid h-11 w-11 place-items-center rounded-full bg-slate-100 text-slate-500"><span class="material-symbols-outlined">inventory_2</span></span><p class="mt-3 font-semibold text-slate-800">{{ !empty($apiErrors['stock'] ?? null) ? 'Stock could not be loaded' : 'No inventory records yet' }}</p><p class="mt-1 text-sm text-slate-500">{{ !empty($apiErrors['stock'] ?? null) ? 'Retry the InventoryService request above.' : 'InventoryService returned no stock records.' }}</p></td></tr>
            @endforelse
            <tr id="inventory-filter-empty" hidden><td colspan="8" class="px-5 py-10 text-center text-sm text-slate-500">No inventory items match these filters.</td></tr>
          </tbody>
        </table>
      </div>
      <div id="inventory-movements-panel" class="hidden overflow-x-auto" role="tabpanel" aria-labelledby="inventory-movements-tab">
        <table class="min-w-[1050px] w-full text-left text-sm"><thead class="bg-slate-50 text-[11px] uppercase tracking-[.07em] text-slate-500"><tr><th scope="col" class="px-5 py-3.5">Timestamp</th><th scope="col" class="px-4 py-3.5">SKU / product</th><th scope="col" class="px-4 py-3.5 text-right">Change</th><th scope="col" class="px-4 py-3.5 text-right">Before</th><th scope="col" class="px-4 py-3.5 text-right">After</th><th scope="col" class="px-4 py-3.5">Reason</th><th scope="col" class="px-4 py-3.5">Operator ID</th><th scope="col" class="px-5 py-3.5">Reference</th></tr></thead>
          <tbody class="divide-y divide-slate-100">
            @forelse($movementRows as $movement)
              @php($movementProductId=data_get($movement,'productId'))
              @php($movementProduct=$productsById[strtolower((string)$movementProductId)]??[])
              @php($movementTime=data_get($movement,'createdAt'))
              @php($actorId=data_get($movement,'actorUserId'))
              <tr><td class="whitespace-nowrap px-5 py-4 text-xs text-slate-600">{{ $movementTime ? \Illuminate\Support\Carbon::parse($movementTime)->timezone(config('app.timezone'))->format('Y-m-d H:i:s') : 'Not recorded' }}</td><td class="px-4 py-4"><span class="block font-mono text-[11px] text-slate-500">{{ data_get($movementProduct,'sku')??data_get($movementProduct,'SKU')??'SKU unavailable' }}</span><span class="mt-1 block font-medium text-slate-900">{{ data_get($movementProduct,'name')??data_get($movementProduct,'productName')??'Product details unavailable' }}</span></td><td class="px-4 py-4 text-right font-semibold tabular-nums {{ (int)data_get($movement,'quantityDelta',0) >= 0 ? 'text-emerald-700' : 'text-rose-700' }}">{{ (int)data_get($movement,'quantityDelta',0) > 0 ? '+' : '' }}{{ (int)data_get($movement,'quantityDelta',0) }}</td><td class="px-4 py-4 text-right tabular-nums">{{ data_get($movement,'quantityBefore','Not recorded') }}</td><td class="px-4 py-4 text-right tabular-nums">{{ data_get($movement,'quantityAfter','Not recorded') }}</td><td class="max-w-xs px-4 py-4 text-slate-700">{{ data_get($movement,'reason','Not provided') }}</td><td class="max-w-48 break-all px-4 py-4 font-mono text-[11px] text-slate-600">{{ $actorId ?: 'Not recorded' }}</td><td class="px-5 py-4 text-xs text-slate-600">{{ data_get($movement,'reference') ?: 'None' }}</td></tr>
            @empty
              <tr><td colspan="8" class="px-5 py-12 text-center text-sm text-slate-500">{{ !empty($apiErrors['movements'] ?? null) ? 'Movement history could not be loaded.' : 'No stock movements have been recorded.' }}</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <div class="flex flex-col gap-3 border-t border-slate-100 bg-slate-50/70 px-5 py-3 text-xs text-slate-500 sm:flex-row sm:items-center sm:justify-between"><span>{{ number_format($totalSkus) }} inventory records total (summary from InventoryService)</span><span>Displayed list: up to {{ count($stockRows) }} records per API page</span></div>
    </section>
    @if(isset($apiPagination['stock']) && ($apiPagination['stock']['pages'] ?? 1) > 1)
      @php($stockPaging = $apiPagination['stock'])
      <nav class="mt-4 flex items-center justify-between rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm" aria-label="Inventory pages"><span class="text-slate-500">Inventory page {{ $stockPaging['page'] }} of {{ $stockPaging['pages'] }}</span><div class="flex gap-2"><a href="{{ request()->fullUrlWithQuery(['page' => max(1, $stockPaging['page'] - 1), 'pageSize' => $stockPaging['pageSize']]) }}" @if($stockPaging['page'] <= 1) aria-disabled="true" tabindex="-1" @endif class="rounded-lg border border-slate-200 px-3 py-1.5 {{ $stockPaging['page'] <= 1 ? 'pointer-events-none opacity-40' : 'hover:bg-slate-50' }}">Previous</a><a href="{{ request()->fullUrlWithQuery(['page' => min($stockPaging['pages'], $stockPaging['page'] + 1), 'pageSize' => $stockPaging['pageSize']]) }}" @if(!$stockPaging['hasNext']) aria-disabled="true" tabindex="-1" @endif class="rounded-lg border border-slate-200 px-3 py-1.5 {{ !$stockPaging['hasNext'] ? 'pointer-events-none opacity-40' : 'hover:bg-slate-50' }}">Next</a></div></nav>
    @endif

    <dialog id="stock-adjustment-dialog" class="w-[min(520px,calc(100%-2rem))] rounded-2xl border border-slate-200 bg-white p-0 text-slate-900 shadow-2xl">
      <form id="stock-adjustment-form" method="POST" action="{{ route('admin.api-mutate') }}" class="p-5 sm:p-6">
        @csrf<input type="hidden" name="_api_method" value="POST"><input type="hidden" name="_api_endpoint" value="/api/admin/inventory/adjustments"><input type="hidden" name="ProductId" id="adjustment-product-id" value="{{ old('ProductId') }}">
        <div class="flex items-start justify-between gap-4"><div><p class="text-[11px] font-bold uppercase tracking-[.16em] text-[#365c4a]">Auditable stock change</p><h2 class="mt-1 text-xl font-semibold">Adjust available stock</h2><p id="adjustment-product-label" class="mt-1 text-sm text-slate-600"></p></div><button type="button" data-close-adjustment class="grid h-9 w-9 shrink-0 place-items-center rounded-lg text-slate-500 hover:bg-slate-100" aria-label="Close stock adjustment"><span class="material-symbols-outlined">close</span></button></div>
        <label class="mt-5 block text-sm font-medium text-slate-700">Quantity change <span class="font-normal text-slate-500">(positive to add, negative to remove)</span><input id="adjustment-quantity" name="QuantityDelta" type="number" step="1" min="-1000000" max="1000000" required value="{{ old('QuantityDelta') }}" class="mt-1.5 w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm focus:border-[#365c4a] focus:outline-none"></label>
        <label class="mt-4 block text-sm font-medium text-slate-700">Reason <textarea id="adjustment-reason" name="Reason" required maxlength="500" rows="3" placeholder="Cycle count correction, damaged stock, restock receipt..." class="mt-1.5 w-full resize-y rounded-lg border border-slate-200 px-3 py-2.5 text-sm focus:border-[#365c4a] focus:outline-none">{{ old('Reason') }}</textarea></label>
        <label class="mt-4 block text-sm font-medium text-slate-700">Reference <span class="font-normal text-slate-500">(optional)</span><input name="Reference" maxlength="200" value="{{ old('Reference') }}" class="mt-1.5 w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm focus:border-[#365c4a] focus:outline-none" placeholder="Receipt, count sheet, or incident reference"></label>
        <p class="mt-4 rounded-xl border border-amber-200 bg-amber-50 p-3 text-xs leading-5 text-amber-900">This submits an adjustment to InventoryService. The service validates available quantity and writes the before/after values, reason, reference, timestamp, and operator ID to its movement ledger. Reserved stock is not changed.</p>
        <div class="mt-5 flex justify-end gap-2"><button type="button" data-close-adjustment class="rounded-lg border border-slate-200 px-4 py-2.5 text-sm font-semibold text-slate-700">Cancel</button><button type="submit" class="rounded-lg bg-[#202321] px-4 py-2.5 text-sm font-semibold text-white hover:bg-[#365c4a]">Review adjustment</button></div>
      </form>
    </dialog>
    <dialog id="stock-adjustment-confirmation" class="w-[min(420px,calc(100%-2rem))] rounded-2xl border border-slate-200 bg-white p-0 text-slate-900 shadow-2xl"><div class="p-5 sm:p-6"><span class="grid h-11 w-11 place-items-center rounded-full bg-amber-50 text-amber-700"><span class="material-symbols-outlined">fact_check</span></span><h2 class="mt-4 text-lg font-semibold">Confirm stock adjustment</h2><p id="adjustment-confirmation-copy" class="mt-2 text-sm leading-6 text-slate-600"></p><p class="mt-3 text-xs text-slate-500">This action writes to the InventoryService audit ledger and cannot be undone from this page.</p><div class="mt-5 flex justify-end gap-2"><button id="return-to-adjustment" type="button" class="rounded-lg border border-slate-200 px-4 py-2.5 text-sm font-semibold text-slate-700">Go back</button><button id="confirm-adjustment-submit" type="button" class="rounded-lg bg-[#365c4a] px-4 py-2.5 text-sm font-semibold text-white">Confirm and save</button></div></div></dialog>
  </main>
</div>
<script>
(() => {
 const search=document.getElementById('inventory-search');
 const status=document.getElementById('inventory-status-filter');
 const rows=[...document.querySelectorAll('[data-inventory-row]')];
 const noMatches=document.getElementById('inventory-filter-empty');
 function filterRows(){const term=search.value.trim().toLocaleLowerCase();let shown=0;rows.forEach(row=>{const matchesText=row.dataset.search.toLocaleLowerCase().includes(term);const matchesStatus=status.value==='all'||row.dataset.status===status.value;row.hidden=!(matchesText&&matchesStatus);if(!row.hidden)shown++});if(noMatches)noMatches.hidden=shown>0||rows.length===0}
 search.addEventListener('input',filterRows);status.addEventListener('change',filterRows);
 const stockTab=document.getElementById('inventory-stock-tab'),movementTab=document.getElementById('inventory-movements-tab');
 function showPanel(name){const isStock=name==='stock';document.getElementById('inventory-stock-panel').classList.toggle('hidden',!isStock);document.getElementById('inventory-movements-panel').classList.toggle('hidden',isStock);stockTab.setAttribute('aria-selected',String(isStock));movementTab.setAttribute('aria-selected',String(!isStock));stockTab.classList.toggle('border-[#365c4a]',isStock);stockTab.classList.toggle('text-[#365c4a]',isStock);movementTab.classList.toggle('border-[#365c4a]',!isStock);movementTab.classList.toggle('text-[#365c4a]',!isStock)}
 stockTab.addEventListener('click',()=>showPanel('stock'));movementTab.addEventListener('click',()=>showPanel('movements'));
 const adjustDialog=document.getElementById('stock-adjustment-dialog'),confirmDialog=document.getElementById('stock-adjustment-confirmation'),adjustForm=document.getElementById('stock-adjustment-form');let confirmed=false;
 document.querySelectorAll('[data-open-adjustment]').forEach(button=>button.addEventListener('click',()=>{document.getElementById('adjustment-product-id').value=button.dataset.productId;document.getElementById('adjustment-product-label').textContent=`${button.dataset.productName} (${button.dataset.productSku}) · available ${button.dataset.available}`;adjustForm.reset();document.getElementById('adjustment-product-id').value=button.dataset.productId;adjustDialog.showModal()}));
 document.querySelectorAll('[data-close-adjustment]').forEach(button=>button.addEventListener('click',()=>adjustDialog.close()));
 adjustForm.addEventListener('submit',event=>{if(confirmed){confirmed=false;return}event.preventDefault();if(!adjustForm.reportValidity())return;const delta=Number(document.getElementById('adjustment-quantity').value);if(!Number.isInteger(delta)||delta===0){document.getElementById('adjustment-quantity').setCustomValidity('Enter a non-zero whole number.');document.getElementById('adjustment-quantity').reportValidity();return}document.getElementById('adjustment-quantity').setCustomValidity('');const available=Number(document.querySelector(`[data-open-adjustment][data-product-id="${CSS.escape(document.getElementById('adjustment-product-id').value)}"]`)?.dataset.available||0);const after=available+delta;if(after<0){document.getElementById('adjustment-quantity').setCustomValidity('This change would make available stock negative.');document.getElementById('adjustment-quantity').reportValidity();return}document.getElementById('adjustment-confirmation-copy').textContent=`${delta>0?'+':''}${delta} units for ${document.getElementById('adjustment-product-label').textContent}. Available quantity will be ${available} -> ${after}. Reason: ${document.getElementById('adjustment-reason').value.trim()}`;adjustDialog.close();confirmDialog.showModal()});
 document.getElementById('return-to-adjustment').addEventListener('click',()=>{confirmDialog.close();adjustDialog.showModal()});
 document.getElementById('confirm-adjustment-submit').addEventListener('click',()=>{confirmed=true;adjustForm.requestSubmit()});
 @if(old('ProductId'))document.getElementById('adjustment-product-label').textContent='Product ID: '+@json(old('ProductId'));adjustDialog.showModal();@endif
})();
</script>
</body>
</html>
