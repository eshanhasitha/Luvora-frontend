<div class="bg-[#191c1e] px-4 py-2 text-center text-[10px] font-semibold uppercase tracking-widest text-white">Island-wide Sri Lanka express delivery | Free shipping over LKR 15,000 | Colombo same-day available</div>
<header class="border-b border-slate-200 bg-white">
    <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-5 py-4 lg:px-8">
        <a href="{{ route('home') }}" class="flex shrink-0 items-center gap-3" aria-label="Luvora home"><img src="{{ asset('images/logo.png') }}" alt="Luvora" class="h-10 w-auto"></a>
        <form action="{{ route('search') }}" method="GET" class="hidden min-w-40 max-w-md flex-1 md:block"><label class="sr-only" for="site-search">Search the shop</label><div class="flex items-center rounded-full border border-slate-200 bg-slate-50 px-4"><span class="material-symbols-outlined text-slate-400">search</span><input id="site-search" name="q" value="{{ request('q') }}" placeholder="Search products" class="w-full border-0 bg-transparent px-3 py-2.5 text-sm outline-none focus:ring-0"></div></form>
        <nav aria-label="Shop and account" class="flex shrink-0 items-center gap-3 text-xs font-medium text-slate-600 sm:gap-5 sm:text-sm">
            @include('partials.profile-link')
            <a href="{{ route('wishlist.index') }}" aria-label="Wishlist" class="hover:text-blue-700"><span class="material-symbols-outlined align-middle">favorite</span></a>
            <a href="{{ route('compare') }}" aria-label="Compare products" class="hidden hover:text-blue-700 sm:inline"><span class="material-symbols-outlined align-middle">compare_arrows</span></a>
            <a href="{{ route('cart.index') }}" aria-label="Shopping bag" class="hover:text-blue-700"><span class="material-symbols-outlined align-middle">shopping_bag</span></a>
        </nav>
    </div>
    <nav aria-label="Main navigation" class="mx-auto flex max-w-7xl gap-6 overflow-x-auto px-5 pb-3 text-[11px] font-semibold uppercase tracking-wider lg:px-8">
        @foreach([['shop.index','Shop'],['collections.index','Collections'],['gift-guide','Gift guide'],['journal.index','Journal'],['stores.index','Stores'],['customer-care.contact','Customer care']] as [$name,$label])
            <a href="{{ route($name) }}" class="whitespace-nowrap {{ request()->routeIs($name) ? 'text-blue-700' : 'text-slate-500 hover:text-blue-700' }}">{{ $label }}</a>
        @endforeach
    </nav>
    <form action="{{ route('search') }}" method="GET" class="px-5 pb-3 md:hidden"><label class="sr-only" for="site-search-mobile">Search the shop</label><input id="site-search-mobile" name="q" value="{{ request('q') }}" placeholder="Search products" class="w-full rounded-full border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm"></form>
</header>
