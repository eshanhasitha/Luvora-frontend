@php
    $adminNavigation = [
        ['Overview', [['dashboard', 'Dashboard', 'space_dashboard']]],
        ['Catalog', [['products.index', 'Products', 'inventory_2'], ['categories.index', 'Categories', 'category'], ['inventory.index', 'Inventory', 'warehouse']]],
        ['Sales', [['orders.index', 'Orders', 'receipt_long'], ['payments.index', 'Payments', 'payments'], ['delivery.index', 'Delivery', 'local_shipping']]],
        ['Customers', [['customers.index', 'Customers', 'group'], ['reviews.index', 'Reviews', 'reviews'], ['support.tickets', 'Support tickets', 'support_agent'], ['support.complaints', 'Complaints', 'report']]],
        ['Marketing', [['marketing.promotions', 'Promotions', 'campaign'], ['marketing.coupons', 'Coupons', 'sell'], ['marketing.campaigns', 'Campaigns', 'event'], ['marketing.banners', 'Banners', 'view_carousel']]],
        ['Insights', [['reports.index', 'Reports', 'analytics']]],
        ['Administration', [['admin.staff', 'Staff accounts', 'manage_accounts'], ['admin.roles', 'Roles', 'admin_panel_settings'], ['admin.notifications', 'Notifications', 'notifications'], ['admin.audit-logs', 'Audit logs', 'receipt_long'], ['admin.security-activity', 'Security activity', 'security'], ['settings.index', 'Settings', 'settings'], ['admin.profile', 'My profile', 'account_circle']]],
    ];
@endphp
<style>
    :root{--admin-ink:#191c1e;--admin-muted:#64748b;--admin-line:#e2e8f0;--admin-paper:#fff;--admin-wash:#f7f9fb;--admin-blue:#005baf}
    html{scroll-behavior:smooth}body{background:var(--admin-wash)!important;color:var(--admin-ink);font-family:Arial,Helvetica,ui-sans-serif,system-ui,sans-serif!important;-webkit-font-smoothing:antialiased}
    .font-headline-lg,.font-headline-md,.font-headline-sm,.font-body-lg,.font-body-md,.font-body-sm,.font-label-lg,.font-label-md,.font-label-sm,.font-serif,main h1,main h2,main h3,main h4,main button,main th{font-family:Arial,Helvetica,ui-sans-serif,system-ui,sans-serif!important}
    #admin-sidebar{width:16rem!important;background:rgba(255,255,255,.96)!important;border-color:var(--admin-line)!important;box-shadow:0 8px 32px rgba(15,23,42,.06)!important;backdrop-filter:blur(18px)}
    #admin-sidebar>a:first-child{height:5rem!important;border-color:#edf1f5!important}#admin-sidebar nav{padding:1.25rem .8rem!important}#admin-sidebar nav section+section{margin-top:1.1rem}#admin-sidebar nav a{min-height:2.55rem;border-radius:.8rem!important;font-size:.83rem!important}#admin-sidebar nav a[aria-current=page]{background:#eaf3ff!important;color:#064f91!important;box-shadow:inset 3px 0 #005baf}#admin-sidebar nav a:hover{background:#f4f7fb!important;color:#0f172a!important}#admin-sidebar nav a[aria-current=page]:hover{background:#eaf3ff!important;color:#064f91!important}
    body>div>header,body>div>div>header{background:rgba(255,255,255,.9)!important;border-bottom:1px solid var(--admin-line);box-shadow:0 4px 18px rgba(15,23,42,.035)!important;backdrop-filter:blur(16px)}
    main{padding:6.5rem clamp(1rem,3vw,3rem) 3rem!important;max-width:100%!important}
    main>div.flex.flex-col{gap:1.25rem!important}main>div.flex.flex-col>*{margin-block-start:0!important}
    main h1{font-size:clamp(1.6rem,2.5vw,2rem)!important;font-weight:600!important;line-height:1.25!important;letter-spacing:-.02em!important;color:#191c1e!important}main h2{letter-spacing:-.01em}
    main h1.dashboard-title .dashboard-title-initial{display:inline;color:inherit;font-family:inherit;font-size:inherit;font-weight:inherit;line-height:inherit;transform:none;margin-right:0}
    main p{line-height:1.6}
    main section[class*="bg-white"],main article[class*="bg-white"],main section[class*="bg-surface-container-lowest"],main article[class*="bg-surface-container-lowest"]{border:1px solid #e8edf2!important;border-radius:1rem!important;box-shadow:0 5px 20px rgba(15,23,42,.035)!important}
    main [class*="rounded-xl"][class*="bg-white"],main [class*="rounded-2xl"][class*="bg-white"],main [class*="rounded-xl"][class*="bg-surface-container-lowest"],main [class*="rounded-2xl"][class*="bg-surface-container-lowest"]{border-color:#e8edf2!important;box-shadow:0 5px 20px rgba(15,23,42,.035)}
    main table{width:100%;border-collapse:separate;border-spacing:0;overflow:hidden;border:1px solid var(--admin-line);border-radius:.85rem;background:#fff}main thead{background:#f6f8fa!important}main th{font-size:.68rem!important;font-weight:600!important;letter-spacing:.04em;color:#64748b!important}main td,main th{border-color:#edf1f5!important}main tbody tr{transition:background-color .15s ease}main tbody tr:hover{background:#f8fbff}
    main input:not([type=checkbox]):not([type=radio]):not([type=file]),main select,main textarea{min-height:2.65rem;border:1px solid #dbe2ea!important;border-radius:.7rem!important;background:#fff!important;color:var(--admin-ink)!important;box-shadow:none!important}main textarea{min-height:auto}main input:focus,main select:focus,main textarea:focus{outline:none!important;border-color:#6ba6df!important;box-shadow:0 0 0 3px rgba(0,91,175,.1)!important}
    main button{transition:background-color .16s ease,color .16s ease,border-color .16s ease,box-shadow .16s ease,transform .16s ease}main button:hover{box-shadow:0 4px 12px rgba(15,23,42,.08)}main button:active{transform:translateY(1px)}
    main a{transition:color .15s ease,border-color .15s ease,background-color .15s ease}
    .admin-breadcrumb{font:600 .72rem/1.5 Arial,Helvetica,sans-serif!important;letter-spacing:.12em;text-transform:uppercase;color:#475569;min-width:0}.admin-breadcrumb a,.admin-breadcrumb span{font:inherit!important;letter-spacing:inherit;text-transform:inherit}.admin-breadcrumb a{color:#475569;text-decoration:none}.admin-breadcrumb a:hover{color:#005baf}.admin-breadcrumb [aria-current=page]{color:#005baf}.admin-breadcrumb .admin-breadcrumb-separator{color:#b7c4d3;padding-inline:.2rem}
    main nav[aria-label=Breadcrumb],main>div>nav[aria-label=Breadcrumb],main [class*=breadcrumb]{display:flex;align-items:center;flex-wrap:wrap;column-gap:.5rem;row-gap:.25rem;min-width:0;line-height:1.5}main nav[aria-label=Breadcrumb] a,main>div>nav[aria-label=Breadcrumb] a{display:inline-flex;align-items:center;min-height:1.5rem}main nav[aria-label=Breadcrumb] .material-symbols-outlined,main>div>nav[aria-label=Breadcrumb] .material-symbols-outlined{font-size:1rem;line-height:1;color:#94a3b8}
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
    const breadcrumbLinks = new Map([
        ['Executive Portal', '/dashboard'], ['Catalog & Products', '/products'], ['Categories & Collections', '/categories'],
        ['Customers & VIP Patrons', '/customers'], ['Orders & Escrow', '/orders'], ['Payments & Settlements', '/payments'],
        ['Reviews & Support', '/reviews'], ['Analytics & Audits', '/reports'], ['System Administration', '/settings'],
        ['Artisans & Logistics', '/delivery'], ['Marketing', '/marketing/promotions'], ['Security', '/admin/staff']
    ]);
    document.querySelectorAll('a, span').forEach(portal => {
        if (portal.textContent.trim().replace(/\s+/g, ' ') !== 'Executive Portal') return;
        const breadcrumb = portal.parentElement;
        if (!breadcrumb || breadcrumb.closest('#admin-sidebar')) return;
        breadcrumb.classList.add('admin-breadcrumb');
        breadcrumb.setAttribute('aria-label', 'Breadcrumb');
        breadcrumb.setAttribute('role', 'navigation');
        [...breadcrumb.children].forEach(item => {
            if (item.matches('.material-symbols-outlined') || ['/', '›', 'chevron_right'].includes(item.textContent.trim())) {
                item.textContent = '/';
                item.classList.remove('material-symbols-outlined');
                item.classList.add('admin-breadcrumb-separator');
                item.setAttribute('aria-hidden', 'true');
                return;
            }
            const label = item.textContent.trim().replace(/\s*\(Page\s+\d+\)/i, '').replace(/\s+/g, ' ');
            if (!label) return;
            item.textContent = label;
            if (breadcrumbLinks.has(label) && item.tagName !== 'A') {
                const link = document.createElement('a');
                link.href = breadcrumbLinks.get(label);
                link.textContent = label;
                item.replaceWith(link);
            }
        });
        const last = [...breadcrumb.children].filter(item => !item.classList.contains('admin-breadcrumb-separator')).at(-1);
        if (last) {
            last.setAttribute('aria-current', 'page');
            if (last.tagName === 'A') {
                const current = document.createElement('span');
                current.textContent = last.textContent;
                last.replaceWith(current);
                current.setAttribute('aria-current', 'page');
            }
        }
    });
    const sidebar = document.getElementById('admin-sidebar');
    const unsupportedStatusPattern = /Colombo 07 Vault & Global Feed|Catalog Inventory & Artisan Specifications|Colombo 07 Vault|CBSL Escrow Sync Active|CBSL Escrow Synchronized|NTC & CBSL Escrow Active|CBSL RTGS Node|CBSL LankaPay RTGS Synchronized|Audit Integrity Assured|View Cryptographic Audit Trail|End-of-day batch settlement verified/i;
    document.querySelectorAll('main, header').forEach(region => {
        [...region.querySelectorAll('span, p, button, a')].forEach(node => {
            if (!unsupportedStatusPattern.test(node.textContent.trim())) return;
            const wrapper = node.closest('.rounded-full, .rounded-xl');
            if (wrapper && wrapper !== region && wrapper.textContent.trim() === node.textContent.trim()) wrapper.remove();
            else node.remove();
        });
    });
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

    const adminLists = [
        { rows: '#categoryTableBody tr', search: '#catSearchInput', filters: '.filter-pill', label: 'categories' },
        { rows: '#brand-table-body tr', label: 'brands' },
        { rows: '#dashboard-orders-body tr', label: 'recent orders' },
        { rows: '#customers-table-body tr', search: '#customer-search', summary: '#customer-list-count', label: 'patrons' },
        { rows: '#orders-table-body tr', search: '#order-search', filters: '#order-status-filter', summary: '#order-list-count', label: 'orders' },
        { rows: '#order-delivery-rows tr', label: 'delivery assignments' },
        { rows: '#payments-table-body tr', search: '#payment-search', summary: '#payment-list-count', label: 'payments' },
        { rows: 'main table:first-of-type tbody tr', search: '#delivery-search', filters: '[data-delivery-filter], [data-delivery-status]', summary: '#delivery-list-count', label: 'deliveries' },
        { rows: '#inventory-table-body tr', search: '#inventorySearch', summary: '#inventory-list-count', label: 'inventory items' },
        { rows: '#movement-history tr', label: 'stock movements' },
        { rows: 'main table:first-of-type tbody tr', summary: '#report-dossier-count', label: 'reports' },
        { rows: '.mt-space-sm.space-y-space-md > *', search: '#review-search', filters: '.mt-space-lg.bg-surface-container-lowest > div:first-child button', summary: '#reviews-list-count', label: 'reviews', cards: true },
        { rows: '#ticket-rows tr', search: '#ticket-search', label: 'tickets' },
        { rows: '#complaint-rows tr', search: '#complaint-search', label: 'complaints' },
        { rows: '#audit-rows tr', search: '#audit-search', label: 'audit events' },
        { rows: '#reported-rows tr', search: '#reported-search', label: 'reports' },
        { rows: '#failure-rows tr', search: '#failure-search', label: 'failed deliveries' },
        { rows: '#failed-rows tr', search: '#failed-search', label: 'failed deliveries' },
        { rows: '#refund-rows tr', search: '#refund-search', label: 'refunds' },
        { rows: '#finance-rows tr', search: '#finance-search', label: 'transactions' },
        { rows: '#finance-failed-rows tr', label: 'failed transactions' },
        { rows: '#finance-report-rows tr', label: 'finance report rows' },
        { rows: '#featured-rows tr', label: 'featured products' },
        { rows: '#campaign-list-rows tr', label: 'campaigns' },
        { rows: '#coupon-list-rows tr', label: 'coupons' },
        { rows: '#notification-list-rows tr', label: 'notifications' },
        { rows: '#assignment-rows tr', search: '#assignment-search', label: 'assignments' },
        { rows: '#personnel-rows tr', search: '#personnel-search', label: 'staff' },
        { rows: '#zone-rows tr', search: '#zone-search', label: 'zones' },
        { rows: '#staff-rows tr', search: '#staff-search', label: 'staff accounts' },
        { rows: '#role-list-rows tr', label: 'roles' },
        { rows: '#security-event-rows tr', label: 'security events' },
    ];

    adminLists.forEach(config => {
        const anchor = config.summary || config.search || config.rows.match(/^#[\w-]+/)?.[0];
        if (anchor && !document.querySelector(anchor)) return;
        const elements = [...document.querySelectorAll(config.rows)].filter(row => !row.querySelector('th') && row.cells?.length !== 1 && !row.dataset.emptyState);
        if (!elements.length) return;

        const summary = config.summary ? document.querySelector(config.summary) : null;
        const list = config.cards ? elements[0].parentElement : elements[0].closest('tbody');
        const table = list?.closest('table');
        if (!list) return;

        let matching = elements;
        let page = 1;
        const toolbar = document.createElement('div');
        toolbar.className = 'mt-3 flex flex-wrap items-center justify-between gap-3 rounded-lg bg-slate-50 px-3 py-2 text-sm text-slate-600';
        const count = document.createElement('span');
        count.className = 'admin-list-range';
        if (!summary) toolbar.append(count);
        const controls = document.createElement('div');
        controls.className = 'flex flex-wrap items-center gap-2';
        const perPageLabel = document.createElement('label');
        perPageLabel.textContent = 'Per page:';
        const perPage = document.createElement('select');
        perPage.setAttribute('aria-label', `${config.label} per page`);
        perPage.className = 'rounded-md border border-slate-300 bg-white px-2 py-1.5 text-sm';
        [10, 25, 50, 100].forEach(size => perPage.add(new Option(String(size), String(size))));
        perPage.value = '10';
        const previous = document.createElement('button');
        previous.type = 'button';
        previous.textContent = 'Prev';
        previous.setAttribute('aria-label', `Previous ${config.label} page`);
        previous.className = 'rounded-md border border-slate-300 bg-white px-3 py-1.5 disabled:opacity-40';
        const pageButtons = document.createElement('span');
        pageButtons.className = 'flex items-center gap-1';
        const next = document.createElement('button');
        next.type = 'button';
        next.textContent = 'Next';
        next.setAttribute('aria-label', `Next ${config.label} page`);
        next.className = 'rounded-md border border-slate-300 bg-white px-3 py-1.5 disabled:opacity-40';
        controls.append(perPageLabel, perPage, previous, pageButtons, next);
        toolbar.append(controls);
        (table?.parentElement || list).after(toolbar);

        const render = () => {
            const size = Number(perPage.value) || 10;
            const pageCount = Math.max(1, Math.ceil(matching.length / size));
            page = Math.min(Math.max(page, 1), pageCount);
            elements.forEach(row => { row.hidden = true; });
            matching.slice((page - 1) * size, page * size).forEach(row => { row.hidden = false; });
            const from = matching.length ? (page - 1) * size + 1 : 0;
            const to = Math.min(page * size, matching.length);
            const text = matching.length ? `Showing ${from} to ${to} of ${matching.length} ${config.label} | Page ${page} of ${pageCount}` : `Showing 0 ${config.label} | Page 1 of 1`;
            count.textContent = text;
            if (summary) setTimeout(() => { summary.textContent = text; }, 0);
            pageButtons.replaceChildren();
            const visiblePages = pageCount <= 5
                ? Array.from({ length: pageCount }, (_, index) => index + 1)
                : [...new Set([1, page - 1, page, page + 1, pageCount].filter(number => number >= 1 && number <= pageCount))];
            let previousNumber = 0;
            visiblePages.forEach(number => {
                if (previousNumber && number - previousNumber > 1) {
                    const ellipsis = document.createElement('span');
                    ellipsis.textContent = '...';
                    ellipsis.className = 'px-1 text-slate-400';
                    pageButtons.append(ellipsis);
                }
                const button = document.createElement('button');
                button.type = 'button';
                button.textContent = String(number);
                button.setAttribute('aria-current', String(number === page));
                button.className = `min-w-8 rounded-md px-2 py-1.5 ${number === page ? 'bg-blue-700 text-white' : 'bg-white text-slate-700 hover:bg-slate-100'}`;
                button.addEventListener('click', () => { page = number; render(); });
                pageButtons.append(button);
                previousNumber = number;
            });
            previous.disabled = page <= 1;
            next.disabled = page >= pageCount;
        };
        const refreshMatches = () => {
            const globalQuery = globalSearch?.value.trim().toLocaleLowerCase() || '';
            matching = elements.filter(row => row.style.display !== 'none' && (!globalQuery || row.innerText.toLocaleLowerCase().includes(globalQuery)));
            page = 1;
            render();
        };
        perPage.addEventListener('change', () => { page = 1; render(); });
        previous.addEventListener('click', () => { page--; render(); });
        next.addEventListener('click', () => { page++; render(); });
        (config.search ? document.querySelector(config.search) : null)?.addEventListener('input', () => setTimeout(refreshMatches, 0));
        globalSearch?.addEventListener('input', () => setTimeout(refreshMatches, 0));
        if (config.filters) {
            document.querySelectorAll(config.filters).forEach(control => {
                control.addEventListener('change', () => setTimeout(refreshMatches, 0));
                control.addEventListener('click', () => setTimeout(refreshMatches, 0));
            });
        }
        render();
    });
});
</script>
