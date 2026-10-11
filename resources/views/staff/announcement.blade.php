@extends('account.layout')
@section('title', 'Store Announcement | Luvora')
@section('content')
<div class="mx-auto max-w-3xl">
    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-blue-700">Storefront</p>
    <h1 class="mt-2 font-['Bodoni_Moda'] text-4xl sm:text-5xl">Delivery announcement</h1>
    <p class="mt-3 text-sm leading-6 text-slate-600">Post a short message in the storefront announcement bar. Only staff and admins can publish or remove it.</p>
    @if(session('status'))<div role="status" class="mt-5 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800">{{ session('status') }}</div>@endif
    @error('message')<div role="alert" class="mt-5 rounded-xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-800">{{ $message }}</div>@enderror
    <section class="mt-7 rounded-2xl bg-white p-6 shadow-sm sm:p-8">
        <h2 class="font-['Bodoni_Moda'] text-2xl">{{ $announcement ? 'Current announcement' : 'No announcement is published' }}</h2>
        @if($announcement)<p class="mt-3 rounded-lg bg-slate-50 p-4 text-sm font-semibold uppercase tracking-wide">{{ $announcement['message'] }}</p><p class="mt-2 text-xs text-slate-500">Posted by {{ $announcement['postedBy'] ?? 'Staff' }}@if(!empty($announcement['postedAt'])) · {{ \Illuminate\Support\Carbon::parse($announcement['postedAt'])->format('M j, Y g:i A') }}@endif</p>@endif
        <form method="POST" action="{{ route('staff.announcement.publish') }}" class="mt-6">@csrf<label for="message" class="block text-xs font-semibold text-slate-600">Announcement text</label><textarea id="message" name="message" rows="3" maxlength="240" required class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-3 text-sm focus:border-blue-700 focus:outline-none">{{ old('message', $announcement['message'] ?? '') }}</textarea><p class="mt-1 text-xs text-slate-500">Up to 240 characters. The storefront bar appears only while a message is published.</p><button class="mt-4 rounded-full bg-[#005baf] px-6 py-3 text-sm font-semibold text-white hover:bg-blue-800">Publish announcement</button></form>
        @if($announcement)<form method="POST" action="{{ route('staff.announcement.clear') }}" class="mt-3">@csrf @method('DELETE')<button class="rounded-full border border-rose-200 px-6 py-3 text-sm font-semibold text-rose-700 hover:bg-rose-50">Remove announcement</button></form>@endif
    </section>
</div>
@endsection
