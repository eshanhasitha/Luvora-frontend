@extends('discovery.layout')
@section('title','Gift Guide | Luvora')
@section('content')
<p class="text-xs font-semibold uppercase tracking-[.2em] text-blue-700">Thoughtful giving</p>
<h1 class="mt-2 font-['Bodoni_Moda'] text-4xl sm:text-5xl">Gift Guide</h1>
<p class="mt-3 max-w-2xl text-sm leading-6 text-slate-600">Explore pieces from the Luvora shop for a special occasion. Product suggestions below come from the live catalog and are not ranked by recipient or occasion.</p>
@if($productsUnavailable)
    <div class="mt-7 rounded-xl border border-amber-200 bg-amber-50 p-4 text-sm text-amber-900">Gift ideas are temporarily unavailable because the product catalog could not be reached.</div>
@elseif(count($products))
    <div class="mt-8 grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-4">
    @foreach($products as $product)
        @php($slug=data_get($product,'slug')??data_get($product,'id')??data_get($product,'Id'))
        @php($name=data_get($product,'name')??data_get($product,'Name')??'Luvora creation')
        @php($image=data_get($product,'imageUrl')??data_get($product,'ImageUrl')??data_get($product,'image')??data_get($product,'images.0.url'))
        <article class="overflow-hidden rounded-xl border border-slate-200 bg-white"><a href="{{ route('products.show',$slug) }}" class="block">@if($image)<img src="{{ $image }}" alt="{{ $name }}" class="aspect-[4/5] w-full object-cover">@else<div class="flex aspect-[4/5] items-center justify-center bg-slate-100 text-slate-400"><span class="material-symbols-outlined text-4xl">redeem</span></div>@endif<div class="p-4"><h2 class="font-['Bodoni_Moda'] text-lg">{{ $name }}</h2><p class="mt-2 text-sm font-semibold">@if(data_get($product,'price')!==null){{ data_get($product,'currency')??'LKR' }} {{ number_format((float)data_get($product,'price'),2) }}@else Price not listed @endif</p></div></a></article>
    @endforeach
    </div>
@else
    <x-empty-state class="mt-8" icon="redeem" eyebrow="Thoughtful giving" title="No gift ideas to show yet" message="Browse the shop or check back when products are available." :action-url="route('shop.index')" action-label="Explore the shop" />
@endif
@endsection
