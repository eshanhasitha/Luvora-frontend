@php
    $adminProfile = (array) (session('admin_user', $adminUser ?? []));
    $adminName = data_get($adminProfile, 'name') ?? data_get($adminProfile, 'Name') ?? trim(implode(' ', array_filter([
        data_get($adminProfile, 'firstName') ?? data_get($adminProfile, 'FirstName'),
        data_get($adminProfile, 'lastName') ?? data_get($adminProfile, 'LastName'),
    ]))) ?: 'Admin user';
    $adminRole = data_get($adminProfile, 'role') ?? data_get($adminProfile, 'Role') ?? data_get($adminProfile, 'title') ?? data_get($adminProfile, 'Title') ?? 'Administrator';
    $adminNavigation = [
        ['Overview', [['dashboard', 'dashboard', 'space_dashboard']]],
        ['Catalog', [['products.index', 'Products', 'inventory_2'], ['categories.index', 'Categories', 'category'], ['inventory.index', 'Inventory', 'warehouse']]],
        ['Sales', [['orders.index', 'Orders', 'receipt_long'], ['payments.index', 'Payments', 'payments'], ['delivery.index', 'Delivery', 'local_shipping']]],
        ['Customers', [['customers.index', 'Customers', 'group'], ['reviews.index', 'Reviews', 'reviews'], ['support.tickets', 'Support tickets', 'support_agent'], ['support.complaints', 'Complaints', 'report']]],
        ['Marketing', [['marketing.promotions', 'Promotions', 'campaign'], ['marketing.coupons', 'Coupons', 'sell'], ['marketing.campaigns', 'Campaigns', 'event'], ['marketing.banners', 'Banners', 'view_carousel']]],
        ['Insights', [['reports.index', 'Reports', 'analytics']]],
        ['Administration', [['admin.staff', 'Staff accounts', 'manage_accounts'], ['admin.roles', 'Roles', 'admin_panel_settings'], ['admin.audit-logs', 'Audit logs', 'receipt_long'], ['admin.security-activity', 'Security activity', 'security'], ['settings.index', 'Settings', 'settings'], ['admin.profile', 'My profile', 'account_circle']]],
    ];
@endphp
<aside id="admin-sidebar" class="fixed inset-y-0 left-0 z-50 flex w-64 -translate-x-full flex-col border-r border-slate-200 bg-white shadow-sm transition-transform md:translate-x-0">
    <a href="{{ route('dashboard') }}" class="flex h-20 shrink-0 items-center gap-3 border-b border-slate-100 px-6" aria-label="Luvora admin home">
        <span class="font-serif text-3xl font-medium tracking-tight text-[#191c1e]" style="font-family:'Bodoni Moda',Georgia,serif">Luvora</span>
        <span class="border-l border-slate-200 pl-3 text-[10px] font-semibold uppercase tracking-[.16em] text-slate-500">Admin</span>
    </a>
    <nav class="flex-1 space-y-5 overflow-y-auto px-3 py-5" aria-label="Admin navigation">
        @foreach($adminNavigation as [$group, $links])
            <section>
                <h2 class="px-3 pb-2 text-[10px] font-semibold uppercase tracking-[.16em] text-slate-400">{{ $group }}</h2>
                <div class="space-y-1">
                    @foreach($links as [$routeName, $label, $icon])
                        @php($active = request()->routeIs($routeName) || ($routeName === 'settings.index' && request()->is('settings*')))
                        <a href="{{ route($routeName) }}" @if($active) aria-current="page" @endif class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm transition {{ $active ? 'bg-blue-50 font-semibold text-blue-800' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                            <span class="material-symbols-outlined text-[19px]">{{ $icon }}</span><span>{{ $label }}</span>
                        </a>
                    @endforeach
                </div>
            </section>
        @endforeach
    </nav>
    <a href="{{ route('admin.profile') }}" class="flex shrink-0 items-center gap-3 border-t border-slate-100 p-4 hover:bg-slate-50">
        @include('partials.profile-avatar', ['avatarSize' => 'h-10 w-10'])
        <span class="min-w-0 flex-1"><span class="block truncate text-sm font-semibold text-slate-900">{{ $adminName }}</span><span class="block truncate text-xs text-slate-500">{{ $adminRole }}</span></span>
        <span class="material-symbols-outlined text-lg text-slate-400">account_circle</span>
    </a>
    <form method="POST" action="{{ route('logout') }}" class="border-t border-slate-100 p-3">@csrf<button class="flex w-full items-center gap-3 rounded-lg px-3 py-2 text-sm text-slate-600 hover:bg-red-50 hover:text-red-700"><span class="material-symbols-outlined text-lg">logout</span>Sign out</button></form>
</aside>
