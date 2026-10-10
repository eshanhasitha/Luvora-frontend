@props([
    'icon' => 'inventory_2',
    'eyebrow' => 'Nothing here yet',
    'title' => 'No results to show',
    'message' => 'Please check back later.',
    'actionUrl' => null,
    'actionLabel' => null,
])
<section {{ $attributes->merge(['class' => 'rounded-2xl border border-slate-200 bg-white px-6 py-14 text-center']) }}>
    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-blue-50 text-blue-700"><span class="material-symbols-outlined text-3xl">{{ $icon }}</span></div>
    <p class="mt-4 text-xs font-semibold uppercase tracking-[.18em] text-blue-700">{{ $eyebrow }}</p>
    <h2 class="mt-2 font-['Bodoni_Moda'] text-2xl">{{ $title }}</h2>
    <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-500">{{ $message }}</p>
    @if($actionUrl && $actionLabel)<a href="{{ $actionUrl }}" class="mt-6 inline-flex rounded-full bg-[#005baf] px-6 py-3 text-sm font-semibold text-white hover:bg-blue-800">{{ $actionLabel }}</a>@endif
</section>
