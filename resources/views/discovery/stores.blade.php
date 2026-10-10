@extends('discovery.layout')
@section('title','Store Locations | Luvora')
@section('content')
<p class="text-xs font-semibold uppercase tracking-[.2em] text-blue-700">Visit Luvora</p>
<h1 class="mt-2 font-['Bodoni_Moda'] text-4xl sm:text-5xl">Store Locations</h1>
<p class="mt-3 max-w-2xl text-sm leading-6 text-slate-600">Find a Luvora location and plan your visit. Store details will be listed here when the location directory is available.</p>
@if($storesUnavailable)
    <div class="mt-7 rounded-xl border border-amber-200 bg-amber-50 p-4 text-sm text-amber-900">The store directory could not be loaded. Please try again later.</div>
@elseif(empty($stores))
    <x-empty-state class="mt-8" icon="storefront" eyebrow="Visit Luvora" title="Location details are coming soon" message="The storefront does not have a verified store directory connected yet. We’ll list addresses and opening hours here once they are published." :action-url="route('customer-care.contact')" action-label="Contact customer care" />
@else
    <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">@foreach($stores as $store)<a href="{{ route('stores.show',$store['slug']) }}" class="rounded-xl border border-slate-200 bg-white p-6 hover:border-blue-300"><h2 class="font-['Bodoni_Moda'] text-2xl">{{ $store['name'] }}</h2><p class="mt-2 text-sm text-slate-500">{{ $store['city'] }}</p></a>@endforeach</div>
@endif
@endsection
