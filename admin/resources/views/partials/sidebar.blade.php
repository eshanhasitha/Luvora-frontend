@php
    $adminNavigation = [
        ['Overview', [['dashboard', 'dashboard', 'space_dashboard']]],
        ['Catalog', [['products.index', 'Products', 'inventory_2'], ['categories.index', 'Categories', 'category'], ['inventory.index', 'Inventory', 'warehouse']]],
        ['Sales', [['orders.index', 'Orders', 'receipt_long'], ['payments.index', 'Payments', 'payments'], ['delivery.index', 'Delivery', 'local_shipping']]],
        ['Customers', [['customers.index', 'Customers', 'group'], ['reviews.index', 'Reviews', 'reviews'], ['support.tickets', 'Support tickets', 'support_agent'], ['support.complaints', 'Complaints', 'report']]],
        ['Marketing', [['marketing.promotions', 'Promotions', 'campaign'], ['marketing.coupons', 'Coupons', 'sell'], ['marketing.campaigns', 'Campaigns', 'event'], ['marketing.banners', 'Banners', 'view_carousel']]],
        ['Insights', [['reports.index', 'Reports', 'analytics']]],
        ['Administration', [['admin.staff', 'Staff accounts', 'manage_accounts'], ['admin.roles', 'Roles', 'admin_panel_settings'], ['admin.notifications', 'Notifications', 'notifications'], ['admin.audit-logs', 'Audit logs', 'receipt_long'], ['admin.security-activity', 'Security activity', 'security'], ['settings.index', 'Settings', 'settings'], ['admin.profile', 'My profile', 'account_circle']]],
    ];
@endphp
<style>
    @import url('https://fonts.googleapis.com/css2?family=Bodoni+Moda:opsz,wght@6..96,400;6..96,500;6..96,600&family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');
    :root{--admin-ink:#191c1e;--admin-muted:#64748b;--admin-line:#e2e8f0;--admin-paper:#fff;--admin-wash:#f7f9fb;--admin-blue:#005baf}
    html{scroll-behavior:smooth}body{background:var(--admin-wash)!important;color:var(--admin-ink);font-family:'Plus Jakarta Sans',Inter,ui-sans-serif,system-ui,sans-serif;-webkit-font-smoothing:antialiased}
    #admin-sidebar{width:16rem!important;background:rgba(255,255,255,.96)!important;border-color:var(--admin-line)!important;box-shadow:0 8px 32px rgba(15,23,42,.06)!important;backdrop-filter:blur(18px)}
    #admin-sidebar>a:first-child{height:5rem!important;border-color:#edf1f5!important}#admin-sidebar nav{padding:1.25rem .8rem!important}#admin-sidebar nav section+section{margin-top:1.1rem}#admin-sidebar nav a{min-height:2.55rem;border-radius:.8rem!important;font-size:.83rem!important}#admin-sidebar nav a[aria-current=page]{background:#eaf3ff!important;color:#064f91!important;box-shadow:inset 3px 0 #005baf}#admin-sidebar nav a:hover{background:#f4f7fb!important;color:#0f172a!important}#admin-sidebar nav a[aria-current=page]:hover{background:#eaf3ff!important;color:#064f91!important}
    body>div>header,body>div>div>header{background:rgba(255,255,255,.9)!important;border-bottom:1px solid var(--admin-line);box-shadow:0 4px 18px rgba(15,23,42,.035)!important;backdrop-filter:blur(16px)}
    main{padding:6.5rem clamp(1rem,3vw,3rem) 3rem!important;max-width:100%!important}
    main>div.flex.flex-col{gap:1.25rem!important}main>div.flex.flex-col>*{margin-block-start:0!important}
    main h1{font-family:'Bodoni Moda',Georgia,serif!important;font-size:clamp(1.9rem,3.1vw,2.75rem)!important;font-weight:500!important;line-height:1.12!important;letter-spacing:-.025em!important;color:#191c1e!important}main h2{font-family:'Plus Jakarta Sans',Inter,sans-serif;letter-spacing:-.02em}
    main h1.dashboard-title .dashboard-title-initial{display:inline-block;color:var(--admin-blue);font-family:'Bodoni Moda',Georgia,serif;font-size:1.3em;font-weight:600;line-height:.8;transform:translateY(.035em);margin-right:.015em}
    main p{line-height:1.6}
    main section[class*="bg-white"],main article[class*="bg-white"],main section[class*="bg-surface-container-lowest"],main article[class*="bg-surface-container-lowest"]{border:1px solid #e8edf2!important;border-radius:1rem!important;box-shadow:0 5px 20px rgba(15,23,42,.035)!important}
    main [class*="rounded-xl"][class*="bg-white"],main [class*="rounded-2xl"][class*="bg-white"],main [class*="rounded-xl"][class*="bg-surface-container-lowest"],main [class*="rounded-2xl"][class*="bg-surface-container-lowest"]{border-color:#e8edf2!important;box-shadow:0 5px 20px rgba(15,23,42,.035)}
    main table{width:100%;border-collapse:separate;border-spacing:0;overflow:hidden;border:1px solid var(--admin-line);border-radius:.85rem;background:#fff}main thead{background:#f6f8fa!important}main th{font-family:Inter,sans-serif;font-size:.68rem!important;font-weight:600!important;letter-spacing:.08em;color:#64748b!important}main td,main th{border-color:#edf1f5!important}main tbody tr{transition:background-color .15s ease}main tbody tr:hover{background:#f8fbff}
    main input:not([type=checkbox]):not([type=radio]):not([type=file]),main select,main textarea{min-height:2.65rem;border:1px solid #dbe2ea!important;border-radius:.7rem!important;background:#fff!important;color:var(--admin-ink)!important;box-shadow:none!important}main textarea{min-height:auto}main input:focus,main select:focus,main textarea:focus{outline:none!important;border-color:#6ba6df!important;box-shadow:0 0 0 3px rgba(0,91,175,.1)!important}
    main button{font-family:'Plus Jakarta Sans',Inter,sans-serif;transition:background-color .16s ease,color .16s ease,border-color .16s ease,box-shadow .16s ease,transform .16s ease}main button:hover{box-shadow:0 4px 12px rgba(15,23,42,.08)}main button:active{transform:translateY(1px)}
    main a{transition:color .15s ease,border-color .15s ease,background-color .15s ease}
    @media(min-width:768px){main{min-height:100vh}body>div>header{padding-inline:clamp(1.25rem,3vw,3rem)!important}}
    @media(max-width:767px){main{padding-top:6rem!important;padding-inline:1rem!important}#admin-sidebar{width:min(18rem,88vw)!important}body>div>header,body>div>div>header{left:0!important;padding-inline:1rem!important}}
</style>
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
    <form method="POST" action="{{ route('logout') }}" class="border-t border-slate-100 p-3">@csrf<button class="flex w-full items-center gap-3 rounded-lg px-3 py-2 text-sm text-slate-600 hover:bg-red-50 hover:text-red-700"><span class="material-symbols-outlined text-lg">logout</span>Sign out</button></form>
</aside>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const pageApiConfigured = @json($apiConfigured ?? null);
    if (pageApiConfigured !== true) {
        const main = document.querySelector('main');
        if (main) {
            const notice = document.createElement('section');
            notice.setAttribute('role', 'status');
            notice.className = 'mb-5 rounded-xl border border-slate-200 bg-white px-4 py-4 text-sm text-slate-700 shadow-sm';
            notice.innerHTML = '<p class="font-semibold">Live data is not connected for this page.</p><p class="mt-1 text-slate-500">This page API route or response fields are not available yet, so example records are hidden.</p>';
            main.prepend(notice);
            main.querySelectorAll('section, article, table').forEach(sample => {
                if (sample !== notice) sample.hidden = true;
            });
        }
    }

    const sidebar = document.getElementById('admin-sidebar');
    const menuButton = document.querySelector('[aria-controls="admin-sidebar"]');
    if (sidebar && menuButton) {
        const backdrop = document.createElement('button');
        backdrop.type = 'button';
        backdrop.className = 'fixed inset-0 z-40 hidden bg-slate-950/30 backdrop-blur-[1px] md:hidden';
        backdrop.setAttribute('aria-label', 'Close navigation');
        document.body.append(backdrop);
        const syncMenu = () => {
            const open = !sidebar.classList.contains('-translate-x-full');
            backdrop.classList.toggle('hidden', !open);
            menuButton.setAttribute('aria-expanded', String(open));
            document.body.classList.toggle('overflow-hidden', open);
        };
        menuButton.addEventListener('click', () => requestAnimationFrame(syncMenu));
        backdrop.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            syncMenu();
        });
        sidebar.querySelectorAll('nav a').forEach(link => link.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            syncMenu();
        }));
        document.addEventListener('keydown', event => {
            if (event.key === 'Escape' && !backdrop.classList.contains('hidden')) {
                sidebar.classList.add('-translate-x-full');
                syncMenu();
            }
        });
    }

    document.querySelectorAll('header button').forEach(button => {
        if (button.querySelector('.material-symbols-outlined')?.textContent.trim() !== 'notifications') return;
        const link = document.createElement('a');
        link.href = @json(route('admin.notifications'));
        link.className = button.className;
        link.setAttribute('aria-label', 'View security notifications');
        link.title = 'View notifications';
        link.innerHTML = button.innerHTML;
        button.replaceWith(link);
    });

    const globalSearch = [...document.querySelectorAll('header input[type="search"], header input[type="text"]')]
        .find(input => (input.placeholder || '').toLowerCase().includes('search skus'));
    if (globalSearch) {
        globalSearch.setAttribute('aria-label', 'Search this admin page');
        const rows = [...document.querySelectorAll('main table tbody tr')];
        const cards = [...document.querySelectorAll('main [data-admin-searchable]')];
        const deliverySearch = document.getElementById('delivery-search');
        globalSearch.addEventListener('input', () => {
            const query = globalSearch.value.trim().toLocaleLowerCase();
            rows.forEach(row => {
                row.hidden = query !== '' && !row.innerText.toLocaleLowerCase().includes(query);
            });
            cards.forEach(card => {
                card.hidden = query !== '' && !card.innerText.toLocaleLowerCase().includes(query);
            });
            if (deliverySearch) {
                deliverySearch.value = globalSearch.value;
                deliverySearch.dispatchEvent(new Event('input', { bubbles: true }));
            }
        });
        globalSearch.addEventListener('keydown', event => {
            if (event.key === 'Escape') {
                globalSearch.value = '';
                globalSearch.dispatchEvent(new Event('input', { bubbles: true }));
            }
        });
    }

    // Keep page-level search inputs useful on the many table pages that share
    // the same markup but do not have a dedicated page script.
    document.querySelectorAll('main input[type="search"]').forEach(input => {
        if (input === globalSearch || input.dataset.adminSearchReady) return;
        const scope = input.closest('section, article, main') || document;
        const table = scope.querySelector('table');
        const rows = table ? [...table.querySelectorAll('tbody tr')] : [];
        if (!rows.length) return;
        input.dataset.adminSearchReady = 'true';
        input.addEventListener('input', () => {
            const query = input.value.trim().toLocaleLowerCase();
            rows.forEach(row => {
                row.hidden = query !== '' && !row.innerText.toLocaleLowerCase().includes(query);
            });
        });
    });

    // Buttons can open existing dialogs/drawers with a data-target selector.
    document.addEventListener('click', event => {
        const trigger = event.target.closest('[data-modal-target], [data-dialog-target]');
        if (!trigger) return;
        const target = document.querySelector(trigger.dataset.modalTarget || trigger.dataset.dialogTarget);
        if (!target) return;
        if (target instanceof HTMLDialogElement) target.showModal();
        else { target.classList.remove('hidden'); target.classList.add('flex'); }
    });

    document.querySelectorAll('main table thead th').forEach((heading, columnIndex) => {
        if (heading.querySelector('button, input, a') || heading.textContent.trim() === '') return;
        const table = heading.closest('table');
        const body = table?.tBodies[0];
        if (!body || body.rows.length < 2) return;
        heading.tabIndex = 0;
        heading.setAttribute('role', 'button');
        heading.setAttribute('aria-label', `Sort by ${heading.innerText.trim()}`);
        const sort = () => {
            const direction = heading.dataset.sortDirection === 'asc' ? 'desc' : 'asc';
            [...body.rows].sort((a, b) => {
                const left = a.cells[columnIndex]?.innerText.trim().toLocaleLowerCase() || '';
                const right = b.cells[columnIndex]?.innerText.trim().toLocaleLowerCase() || '';
                return left.localeCompare(right, undefined, { numeric: true }) * (direction === 'asc' ? 1 : -1);
            }).forEach(row => body.append(row));
            table.querySelectorAll('thead th').forEach(cell => delete cell.dataset.sortDirection);
            heading.dataset.sortDirection = direction;
        };
        heading.addEventListener('click', sort);
        heading.addEventListener('keydown', event => {
            if (event.key === 'Enter' || event.key === ' ') { event.preventDefault(); sort(); }
        });
    });

    document.addEventListener('click', event => {
        const button = event.target.closest('main button');
        if (!button || button.dataset.export) return;
        const label = `${button.innerText} ${button.title || ''} ${button.getAttribute('aria-label') || ''}`.trim().toLowerCase();
        if (/\b(refresh|reload)\b/.test(label)) {
            window.location.reload();
            return;
        }
        if (!/\b(export|download|csv)\b/.test(label)) return;

        const section = button.closest('section, article') || document.querySelector('main');
        const table = section?.querySelector('table') || document.querySelector('main table');
        if (!table) {
            window.print();
            return;
        }
        const quote = value => `"${String(value).replaceAll('"', '""')}"`;
        const csv = [...table.querySelectorAll('tr')]
            .filter(row => !row.hidden)
            .map(row => [...row.querySelectorAll('th,td')].map(cell => quote(cell.innerText.trim())).join(','))
            .join('\r\n');
        const url = URL.createObjectURL(new Blob([csv], { type: 'text/csv;charset=utf-8' }));
        const link = document.createElement('a');
        link.href = url;
        link.download = `${location.pathname.split('/').filter(Boolean).join('-') || 'admin'}-export.csv`;
        link.click();
        URL.revokeObjectURL(url);
    });
});
</script>
