@extends('account.layout')
@section('title','Notifications & Atelier Advisories | Luvora')
@section('content')
<div class="mb-8 flex flex-col justify-between gap-4 md:flex-row md:items-end">
    <div><p class="text-xs font-semibold uppercase tracking-[0.2em] text-blue-700">Your Luvora account</p><h1 class="mt-2 font-['Bodoni_Moda'] text-4xl sm:text-5xl">Notifications &amp; Atelier Advisories</h1><p class="mt-3 max-w-2xl text-sm leading-6 text-slate-500">Order notes, delivery updates and selected news from the atelier will appear here.</p></div>
    <a href="#preferences" class="inline-flex items-center gap-2 self-start rounded-full border border-slate-300 bg-white px-5 py-3 text-xs font-semibold uppercase tracking-wider text-slate-700 hover:border-blue-700 hover:text-blue-700 md:self-auto"><span class="material-symbols-outlined text-base">tune</span>Notification settings</a>
</div>
<div class="grid gap-6 lg:grid-cols-12 lg:items-start">
    <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm lg:col-span-8" aria-labelledby="activity-title">
        <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-100 px-5 py-5 sm:px-7"><div><h2 id="activity-title" class="font-['Bodoni_Moda'] text-2xl">Your activity</h2><p class="mt-1 text-xs text-slate-500">Recent account and atelier updates</p></div><span class="rounded-full bg-slate-100 px-3 py-1 text-[10px] font-semibold uppercase tracking-wider text-slate-500">All caught up</span></div>
        <div aria-label="Notification categories" class="flex gap-2 overflow-x-auto border-b border-slate-100 px-5 py-3 text-[10px] font-semibold uppercase tracking-wider sm:px-7"><span class="rounded-full bg-blue-50 px-3 py-2 text-blue-700">All</span><span class="rounded-full bg-slate-50 px-3 py-2 text-slate-500">Orders</span><span class="rounded-full bg-slate-50 px-3 py-2 text-slate-500">Delivery</span><span class="rounded-full bg-slate-50 px-3 py-2 text-slate-500">Atelier</span></div>
        <div class="px-5 py-14 text-center sm:px-7 sm:py-20"><div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-blue-50 text-blue-700"><span class="material-symbols-outlined text-3xl">notifications_none</span></div><h3 class="mt-5 font-['Bodoni_Moda'] text-2xl">A quiet moment</h3><p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-500">There are no notifications to show yet. Updates will appear here once the notification service is connected.</p></div>
    </section>
    <aside id="preferences" class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7 lg:col-span-4">
        <div class="mb-5"><p class="text-[10px] font-semibold uppercase tracking-[0.18em] text-blue-700">Stay in the loop</p><h2 class="mt-2 font-['Bodoni_Moda'] text-2xl">Your preferences</h2><p class="mt-2 text-xs leading-5 text-slate-500">Choose the updates you would like the account to receive.</p></div>
        <div class="mb-5 rounded-lg border border-amber-200 bg-amber-50 p-3 text-[11px] leading-5 text-amber-900">These choices are saved for this browser session. They are not synced to the notification service yet.</div>
        <form method="POST" action="{{ route('account.notifications.update') }}">@csrf @method('PUT')
            <div class="space-y-4">
                @foreach([['order_updates','Order updates','Order confirmation and status changes.','package_2'],['delivery_updates','Delivery updates','Dispatch and delivery progress.','local_shipping'],['new_collections','Atelier & collection news','New collections and selected offers.','auto_awesome']] as [$field,$title,$description,$icon])
                    <label class="flex cursor-pointer items-start justify-between gap-4 border-b border-slate-100 pb-4 last:border-0 last:pb-0"><span class="flex gap-3"><span class="material-symbols-outlined text-lg text-slate-500">{{ $icon }}</span><span><strong class="block text-xs">{{ $title }}</strong><span class="mt-1 block text-[11px] leading-5 text-slate-500">{{ $description }}</span></span></span><input type="checkbox" name="{{ $field }}" value="1" @checked($preferences[$field] ?? false) class="mt-0.5 h-4 w-4 shrink-0 accent-blue-700"></label>
                @endforeach
            </div>
            <button class="mt-6 w-full rounded-full bg-[#005baf] px-5 py-3 text-xs font-semibold uppercase tracking-wider text-white hover:bg-blue-800">Save preferences</button>
        </form>
    </aside>
</div>
@endsection
