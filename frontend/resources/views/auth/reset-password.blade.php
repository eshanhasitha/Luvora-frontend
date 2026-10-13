@extends('auth.layout')

@section('title', 'Reset password | Luvora')
@section('brand-heading', 'A fresh start for your Luvora account.')
@section('brand-copy', 'Choose a new password to return to your account and your saved selections.')

@section('content')
    <span class="inline-flex items-center gap-2 rounded-full bg-blue-50 px-3 py-1.5 text-[10px] font-semibold uppercase tracking-wider text-blue-800"><span class="material-symbols-outlined text-sm">key</span> Reset passkey</span>
    <h1 class="mt-5 font-display text-4xl sm:text-5xl">Set a new password</h1>
    <p class="mt-3 text-sm leading-6 text-slate-500">Enter the email address for your account and choose a new password.</p>
    @if ($errors->any())<div role="alert" class="mt-6 rounded-xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-800">{{ $errors->first() }}</div>@endif
    <form method="POST" action="{{ route('password.update', ['token' => $token]) }}" class="mt-7 space-y-5">@csrf
        <label class="block"><span class="mb-2 block text-xs font-semibold text-slate-700">Email address</span><input type="email" name="email" value="{{ old('email', request('email')) }}" autocomplete="email" required class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm outline-none focus:border-primary focus:bg-white focus:ring-2 focus:ring-blue-100" placeholder="you@example.com"></label>
        <label class="block"><span class="mb-2 block text-xs font-semibold text-slate-700">New password</span><span class="relative block"><input id="reset-password" type="password" name="password" autocomplete="new-password" minlength="8" required class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 pr-14 text-sm outline-none focus:border-primary focus:bg-white focus:ring-2 focus:ring-blue-100" placeholder="At least 8 characters"><button type="button" data-toggle-password class="absolute right-3 top-2.5 text-slate-500" aria-label="Show password"><span class="material-symbols-outlined">visibility</span></button></span>@error('password')<span class="mt-1 block text-xs text-rose-700">{{ $message }}</span>@enderror</label>
        <label class="block"><span class="mb-2 block text-xs font-semibold text-slate-700">Confirm new password</span><input type="password" name="password_confirmation" autocomplete="new-password" required class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm outline-none focus:border-primary focus:bg-white focus:ring-2 focus:ring-blue-100" placeholder="Enter password again"></label>
        <button class="w-full rounded-full bg-ink px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-primary">Update password</button>
    </form>
    <p class="mt-6 text-center text-sm"><a href="{{ route('login.show') }}" class="font-semibold text-primary hover:underline">Back to sign in</a></p>
    <script>document.querySelector('[data-toggle-password]').addEventListener('click',e=>{const i=document.getElementById('reset-password');i.type=i.type==='password'?'text':'password'});</script>
@endsection
