<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin sign in · Luvora</title>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:opsz,wght@6..96,400;6..96,500&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body{font-family:'Plus Jakarta Sans',Inter,sans-serif;-webkit-font-smoothing:antialiased}
        main>section:first-child{background:radial-gradient(ellipse at 18% 18%,rgba(59,130,246,.32),transparent 42%),linear-gradient(145deg,#0b1930,#12345b 72%,#005baf)}
        main>section:last-child>div{border:1px solid #e8edf2;border-radius:1.25rem;box-shadow:0 20px 60px rgba(15,23,42,.10)}
        input:not([type=checkbox]){border-radius:.75rem!important}input:focus{box-shadow:0 0 0 3px rgba(0,91,175,.1)}
        button{transition:background-color .16s ease,transform .16s ease,box-shadow .16s ease}button:hover{box-shadow:0 8px 20px rgba(0,91,175,.18)}button:active{transform:translateY(1px)}
    </style>
</head>
<body class="min-h-screen bg-[#f7f9fb] text-[#191c1e]">
<main class="grid min-h-screen lg:grid-cols-2">
    <section class="hidden flex-col justify-between bg-[#101b2e] p-12 text-white lg:flex">
        <a href="{{ route('login') }}" class="font-serif text-3xl font-medium tracking-tight text-white" style="font-family:'Bodoni Moda',Georgia,serif" aria-label="Luvora admin sign in">Luvora</a>
        <div class="max-w-lg"><p class="text-xs uppercase tracking-[.3em] text-blue-200">Executive portal</p><h1 class="mt-5 text-5xl font-semibold leading-tight">A considered view of the house.</h1><p class="mt-5 text-lg text-slate-300">Secure access for the Luvora owner and authorized administrators.</p></div>
        <p class="text-sm text-slate-400">Private administration workspace</p>
    </section>
    <section class="flex items-center justify-center p-6 sm:p-12">
        <div class="w-full max-w-md rounded-2xl bg-white p-8 shadow-xl">
            <div class="mb-8 lg:hidden"><span class="font-serif text-3xl font-medium tracking-tight" style="font-family:'Bodoni Moda',Georgia,serif">Luvora</span><p class="mt-1 text-xs uppercase tracking-widest text-slate-500">Admin portal</p></div>
            <p class="text-xs font-semibold uppercase tracking-[.2em] text-blue-700">Administrator access</p><h2 class="mt-2 text-3xl font-semibold">Sign in</h2><p class="mt-2 text-sm text-slate-500">Use your authorized admin account.</p>
            @if ($errors->any())<div class="mt-5 rounded-lg bg-red-50 p-3 text-sm text-red-700">{{ $errors->first() }}</div>@endif
            <form method="POST" action="{{ route('login.store') }}" class="mt-7 space-y-5">@csrf
                <label class="block text-sm font-medium">Email address<input name="email" type="email" autocomplete="username" required value="{{ old('email') }}" class="mt-2 w-full rounded-lg border border-slate-200 px-4 py-3 outline-none focus:border-blue-600" placeholder="admin@luvora.lk"></label>
                <label class="block text-sm font-medium">Password<input name="password" type="password" autocomplete="current-password" required class="mt-2 w-full rounded-lg border border-slate-200 px-4 py-3 outline-none focus:border-blue-600" placeholder="Your password"></label>
                <label class="flex items-center gap-2 text-sm text-slate-600"><input name="remember" type="checkbox" value="1" class="rounded">Remember this device</label>
                <button class="w-full rounded-full bg-[#005baf] px-5 py-3 font-semibold text-white hover:bg-blue-700">Sign in to admin</button>
            </form>
            <p class="mt-6 text-center text-xs text-slate-500">Access is restricted to authorized administrators.</p>
        </div>
    </section>
</main>
</body>
</html>
