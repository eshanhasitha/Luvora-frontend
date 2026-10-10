@extends('auth.layout')

@section('title', 'Forgot password | Luvora')
@section('brand-heading', 'Your account is yours to return to.')
@section('brand-copy', 'We’ll help you securely regain access to your Luvora account.')

@section('content')
    <span class="inline-flex items-center gap-2 rounded-full bg-blue-50 px-3 py-1.5 text-[10px] font-semibold uppercase tracking-wider text-blue-800"><span class="material-symbols-outlined text-sm">verified_user</span> Account recovery</span>
    <h1 class="mt-5 font-display text-4xl sm:text-5xl">Forgot your password?</h1>
    <p class="mt-3 text-sm leading-6 text-slate-500">Enter the email address connected to your account. If it’s registered, we’ll send instructions to reset your password.</p>
    @if (session('status'))<div role="status" class="mt-6 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm leading-6 text-emerald-900">{{ session('status') }}</div>@endif
    @if ($errors->any())<div role="alert" class="mt-6 rounded-xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-800">{{ $errors->first() }}</div>@endif
    <form method="POST" action="{{ route('password.email') }}" class="mt-7 space-y-5">@csrf
        <label class="block"><span class="mb-2 block text-xs font-semibold text-slate-700">Email address</span><span class="relative block"><span class="material-symbols-outlined absolute left-3 top-3 text-lg text-slate-400">mail</span><input type="email" name="email" value="{{ old('email') }}" autocomplete="email" required autofocus class="w-full rounded-xl border border-slate-300 bg-slate-50 py-3 pl-11 pr-4 text-sm outline-none focus:border-primary focus:bg-white focus:ring-2 focus:ring-blue-100" placeholder="you@example.com"></span>@error('email')<span class="mt-1 block text-xs text-rose-700">{{ $message }}</span>@enderror</label>
        <button class="w-full rounded-full bg-ink px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-primary">Send reset instructions</button>
    </form>
    <div class="mt-7 rounded-xl bg-slate-50 p-4 text-xs leading-5 text-slate-600"><p class="flex items-center gap-2 font-semibold text-slate-800"><span class="material-symbols-outlined text-base text-emerald-700">lock</span>Secure account recovery</p><p class="mt-2">Reset links expire for your protection. If you don’t see the email, check your spam folder or request another link.</p></div>
    <div class="mt-6 flex justify-between text-sm"><a href="{{ route('login.show') }}" class="font-semibold text-primary hover:underline">← Back to sign in</a><a href="{{ route('register.show') }}" class="text-slate-600 hover:text-primary">Create account</a></div>
@endsection
