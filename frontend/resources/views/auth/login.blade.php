@extends('auth.layout')

@section('title', 'Sign in | Luvora')
@section('brand-heading', 'Welcome back to your island atelier.')
@section('brand-copy', 'Sign in to continue exploring your saved pieces, order updates, and Luvora selections.')

@section('content')
    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-primary">Your account</p>
    <h2 class="mt-2 font-display text-4xl sm:text-5xl">Sign in</h2>
    <p class="mt-3 text-sm leading-6 text-slate-500">Enter your account details to continue.</p>

    @if (session('status'))<div role="status" class="mt-5 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-900">{{ session('status') }}</div>@endif
    @if ($errors->any())<div role="alert" class="mt-5 rounded-xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-800">{{ $errors->first() }}</div>@endif

    <form method="POST" action="{{ route('login') }}" class="mt-7 space-y-5">@csrf
        <label class="block"><span class="mb-2 block text-xs font-semibold text-slate-700">Email address</span><span class="relative block"><span class="material-symbols-outlined absolute left-3 top-3 text-lg text-slate-400">mail</span><input type="email" name="email" value="{{ old('email') }}" autocomplete="email" required autofocus class="w-full rounded-xl border border-slate-300 bg-slate-50 py-3 pl-11 pr-4 text-sm outline-none transition focus:border-primary focus:bg-white focus:ring-2 focus:ring-blue-100" placeholder="you@example.com"></span>@error('email')<span class="mt-1 block text-xs text-rose-700">{{ $message }}</span>@enderror</label>
        <label class="block"><span class="mb-2 block text-xs font-semibold text-slate-700">Password</span><span class="relative block"><span class="material-symbols-outlined absolute left-3 top-3 text-lg text-slate-400">lock</span><input id="login-password" type="password" name="password" autocomplete="current-password" required class="w-full rounded-xl border border-slate-300 bg-slate-50 py-3 pl-11 pr-14 text-sm outline-none transition focus:border-primary focus:bg-white focus:ring-2 focus:ring-blue-100" placeholder="Your password"><button type="button" data-toggle-password="login-password" class="absolute right-3 top-2.5 text-slate-500 hover:text-primary" aria-label="Show password"><span class="material-symbols-outlined">visibility</span></button></span></label>
        <div class="flex flex-wrap items-center justify-between gap-3 text-xs"><label class="flex items-center gap-2 text-slate-600"><input type="checkbox" name="remember" value="1" class="rounded accent-primary">Keep me signed in</label><a href="{{ route('password.request') }}" class="font-semibold text-primary hover:underline">Forgot password?</a></div>
        <button class="w-full rounded-full bg-ink px-6 py-3.5 text-sm font-semibold text-white shadow-sm transition hover:bg-primary">Sign in to Luvora</button>
    </form>

    <div class="my-7 flex items-center gap-4 text-xs text-slate-400"><span class="h-px flex-1 bg-slate-200"></span><span>YOUR LUVORA ACCOUNT</span><span class="h-px flex-1 bg-slate-200"></span></div>
    <p class="text-center text-sm text-slate-600">New to Luvora? <a href="{{ route('register.show') }}" class="font-semibold text-primary hover:underline">Create an account</a></p>
    <p class="mt-7 flex items-center justify-center gap-2 text-center text-[11px] leading-5 text-slate-500"><span class="material-symbols-outlined text-base text-emerald-700">verified_user</span>Your password is sent securely to the Luvora account service.</p>
    <script>document.querySelectorAll('[data-toggle-password]').forEach(button=>button.addEventListener('click',()=>{const input=document.getElementById(button.dataset.togglePassword);input.type=input.type==='password'?'text':'password';button.setAttribute('aria-label',input.type==='password'?'Show password':'Hide password')}));</script>
@endsection
