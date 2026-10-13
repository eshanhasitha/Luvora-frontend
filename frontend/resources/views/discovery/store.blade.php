@extends('discovery.layout')
@section('title',($store['name'] ?? 'Store not found').' | Luvora')
@section('content')
@if($store)
    <p class="text-xs font-semibold uppercase tracking-[.2em] text-blue-700">Luvora store</p><h1 class="mt-2 font-['Bodoni_Moda'] text-4xl">{{ $store['name'] }}</h1><p class="mt-4 text-sm text-slate-600">{{ $store['address'] }}</p>
@else
    <div class="mx-auto max-w-2xl rounded-2xl border border-slate-200 bg-white px-6 py-16 text-center"><span class="material-symbols-outlined text-4xl text-slate-400">location_off</span><p class="mt-4 text-xs font-semibold uppercase tracking-[.2em] text-blue-700">Store directory</p><h1 class="mt-2 font-['Bodoni_Moda'] text-4xl">Store details aren’t available</h1><p class="mt-3 text-sm leading-6 text-slate-500">We don’t have a verified location matching “{{ str($storeSlug)->replace('-', ' ') }}”. The store directory has not been connected yet.</p><a href="{{ route('stores.index') }}" class="mt-6 inline-flex rounded-full bg-[#005baf] px-6 py-3 text-sm font-semibold text-white">View store locations</a></div>
@endif
@endsection
