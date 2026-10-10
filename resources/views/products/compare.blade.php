<!DOCTYPE html>
<html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Compare Products | Luvora</title><link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:opsz,wght@6..96,400;6..96,500&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet"><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"><script src="https://cdn.tailwindcss.com"></script></head>
<body class="min-h-screen bg-[#f7f9fb] font-['Plus_Jakarta_Sans'] text-[#191c1e]">@include('partials.site-header')
<main class="mx-auto max-w-7xl px-5 py-10">
    @php
        $rows = [
            ['Price', fn ($product) => (data_get($product, 'currency') ?? data_get($product, 'Currency') ?? 'LKR') . ' ' . number_format((float) (data_get($product, 'price') ?? data_get($product, 'Price') ?? 0), 2)],
            ['Category', fn ($product) => data_get($product, 'category.name') ?? data_get($product, 'categoryName') ?? data_get($product, 'category') ?? 'Not provided'],
            ['Availability', fn ($product) => (data_get($product, 'stock') ?? data_get($product, 'stockQuantity') ?? data_get($product, 'Stock')) !== null ? ((int) (data_get($product, 'stock') ?? data_get($product, 'stockQuantity') ?? data_get($product, 'Stock')) > 0 ? 'Available' : 'Out of stock') : 'Not provided'],
            ['Description', fn ($product) => data_get($product, 'description') ?? data_get($product, 'Description') ?? 'Not provided'],
        ];
    @endphp
    <p class="text-xs font-semibold uppercase tracking-[.2em] text-blue-700">Make a considered choice</p><h1 class="mt-2 font-['Bodoni_Moda'] text-4xl sm:text-5xl">Compare Products</h1><p class="mt-2 text-sm text-slate-500">Compare product details supplied by the catalog.</p>
    @if(session('status'))<p class="mt-5 rounded-lg bg-emerald-50 p-3 text-sm text-emerald-800">{{ session('status') }}</p>@endif
    @if($errors->has('compare'))<p class="mt-5 rounded-lg bg-rose-50 p-3 text-sm text-rose-800">{{ $errors->first('compare') }}</p>@endif
    @if($compareUnavailable)<p class="mt-5 rounded-lg border border-amber-200 bg-amber-50 p-3 text-sm text-amber-900">Some product details could not be loaded from the catalog.</p>@endif
    @if(count($products))
        <div class="mt-7 overflow-x-auto rounded-xl border border-slate-200 bg-white"><table class="w-full min-w-[680px] text-left"><thead><tr class="border-b border-slate-200"><th class="w-40 px-5 py-4 text-xs uppercase tracking-wider text-slate-500">Product detail</th>
            @foreach($products as $product)
                @php($slug=data_get($product,'_compare_slug')??data_get($product,'slug')??data_get($product,'id')??data_get($product,'Id'))
                <th class="min-w-48 px-5 py-4 align-top"><a href="{{ route('products.show',$slug) }}" class="block font-['Bodoni_Moda'] text-xl hover:text-blue-700">{{ data_get($product,'name')??data_get($product,'Name')??'Luvora creation' }}</a><form method="POST" action="{{ route('compare.remove') }}" class="mt-2">@csrf @method('DELETE')<input type="hidden" name="slug" value="{{ $slug }}"><button class="text-xs text-slate-500 hover:text-rose-700">Remove</button></form></th>
            @endforeach
        </tr></thead><tbody class="divide-y divide-slate-100">
            @foreach($rows as [$label,$value])<tr><th class="px-5 py-4 text-xs font-semibold text-slate-600">{{ $label }}</th>@foreach($products as $product)<td class="px-5 py-4 text-sm leading-6 text-slate-700">{{ $value($product) }}</td>@endforeach</tr>@endforeach
        </tbody></table></div>
    @else
        <div class="mt-7 rounded-2xl border border-slate-200 bg-white px-6 py-16 text-center"><span class="material-symbols-outlined text-4xl text-slate-400">compare_arrows</span><h2 class="mt-3 font-['Bodoni_Moda'] text-2xl">Nothing to compare yet</h2><p class="mx-auto mt-2 max-w-md text-sm text-slate-500">Add products from their detail pages and compare their available price, category, and stock information here.</p><a href="{{ route('shop.index') }}" class="mt-6 inline-flex rounded-full bg-[#005baf] px-6 py-3 text-sm font-semibold text-white">Explore the shop</a></div>
    @endif
</main>@include('partials.site-footer')</body></html>
