@extends('discovery.layout')
@section('title','Journal | Luvora')
@section('content')
<p class="text-xs font-semibold uppercase tracking-[.2em] text-blue-700">Stories &amp; perspectives</p>
<h1 class="mt-2 font-['Bodoni_Moda'] text-4xl sm:text-5xl">The Luvora Journal</h1>
<p class="mt-3 max-w-2xl text-sm leading-6 text-slate-600">Stories on Sri Lankan craft, considered style, makers, materials, and the ideas behind our collections.</p>
@if(count($articles))
    <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">@foreach($articles as $article)<a href="{{ route('journal.show',$article['slug']) }}" class="rounded-xl border border-slate-200 bg-white p-6"><p class="text-xs uppercase tracking-wider text-blue-700">{{ $article['category'] }}</p><h2 class="mt-3 font-['Bodoni_Moda'] text-2xl">{{ $article['title'] }}</h2><p class="mt-2 text-sm leading-6 text-slate-500">{{ $article['summary'] }}</p></a>@endforeach</div>
@else
    <x-empty-state class="mt-8" icon="auto_stories" eyebrow="Stories & perspectives" title="The next story is being prepared" message="Journal articles aren’t published in this storefront yet. Check back for stories from Luvora’s makers and collections." :action-url="route('shop.index')" action-label="Explore the collections" />
@endif
@endsection
