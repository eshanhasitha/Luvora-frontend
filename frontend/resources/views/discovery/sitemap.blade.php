@extends('discovery.layout')
@section('title','Sitemap | Luvora')
@section('content')
<p class="text-xs font-semibold uppercase tracking-[.2em] text-blue-700">Navigate Luvora</p><h1 class="mt-2 font-['Bodoni_Moda'] text-4xl sm:text-5xl">Sitemap</h1><p class="mt-3 text-sm text-slate-600">Browse the main areas of the Luvora storefront.</p>
<div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
    @foreach([
        ['Shop', [['All shop','shop.index'],['Gift guide','gift-guide'],['Wishlist','wishlist.index'],['Shopping bag','cart.index']]],
        ['Discover', [['Store locations','stores.index'],['Journal','journal.index'],['Collections','collections.index'],['Search','search']]],
        ['Your account', [['Account overview','account.dashboard'],['Profile','account.profile'],['Orders','account.orders.index'],['Notifications','account.notifications']]],
        ['Customer care', [['Contact','customer-care.contact'],['Help center','help'],['Frequently asked questions','faq'],['Delivery information','customer-care.delivery'],['Size guide','customer-care.size-guide']]],
        ['Policies', [['Privacy','legal.privacy'],['Terms','legal.terms'],['Cookies','legal.cookies'],['Returns','policies.returns'],['Shipping','policies.shipping']]],
    ] as [$group,$links])
        <section class="rounded-xl border border-slate-200 bg-white p-6"><h2 class="font-['Bodoni_Moda'] text-2xl">{{ $group }}</h2><ul class="mt-4 space-y-3">@foreach($links as [$label,$route])<li><a href="{{ route($route) }}" class="text-sm text-slate-600 hover:text-blue-700 hover:underline">{{ $label }}</a></li>@endforeach</ul></section>
    @endforeach
</div>
@endsection
