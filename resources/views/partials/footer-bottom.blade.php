<div class="mt-space-lg border-t border-outline-variant/30 pt-space-lg">
    <div class="flex flex-wrap items-center justify-start gap-x-2 gap-y-2 text-on-surface-variant">
        <span class="mr-1 font-label-sm text-label-sm uppercase tracking-wider text-secondary">Secure Island Gateways:</span>
        <span class="inline-flex h-9 items-center rounded bg-white px-2.5 py-1"><img src="{{ asset('images/partners/visa.svg') }}" alt="Visa" class="h-5 w-10 object-contain"></span>
        <span class="inline-flex h-9 items-center gap-1 rounded bg-white px-2.5 py-1"><img src="{{ asset('images/partners/mastercard.svg') }}" alt="" class="h-5 w-5 object-contain"><span class="font-label-sm text-[10px] font-semibold text-slate-700">Mastercard</span></span>
        <span class="inline-flex h-9 items-center rounded bg-white px-2 py-1"><img src="{{ asset('images/partners/dialog-pay-logo.png') }}" alt="Dialog Pay" class="h-6 w-20 object-contain"></span>
        <span class="inline-flex h-9 items-center rounded bg-white px-2.5 py-1"><img src="{{ asset('images/partners/koko-logo.png') }}" alt="Koko" class="h-6 w-14 object-contain"></span>
        <span class="inline-flex h-9 items-center rounded bg-slate-800 px-2.5 py-1"><img src="{{ asset('images/partners/mintpay-logo.webp') }}" alt="Mintpay" class="h-6 w-20 object-contain"></span>
        <span class="inline-flex h-9 items-center gap-1.5 rounded bg-white px-2.5 py-1"><span class="material-symbols-outlined text-base text-secondary" aria-hidden="true">local_shipping</span><span class="font-label-sm text-label-sm font-semibold text-secondary">Cash on Delivery</span></span>
    </div>
    <div class="mt-space-md grid grid-cols-1 items-center gap-3 text-center md:grid-cols-[1fr_auto] md:text-left">
        <nav aria-label="Discover Luvora" class="flex flex-wrap items-center justify-center gap-x-5 gap-y-2 text-[11px] font-semibold text-slate-500 md:justify-start">
            <a href="{{ route('stores.index') }}" class="whitespace-nowrap hover:text-blue-700">Store locations</a>
            <a href="{{ route('gift-guide') }}" class="whitespace-nowrap hover:text-blue-700">Gift guide</a>
            <a href="{{ route('journal.index') }}" class="whitespace-nowrap hover:text-blue-700">Journal</a>
            <a href="{{ route('sitemap') }}" class="whitespace-nowrap hover:text-blue-700">Sitemap</a>
        </nav>
        <p class="max-w-2xl font-body-sm text-body-sm leading-5 text-secondary md:text-right">&copy; {{ date('Y') }} Luvora Luxury Marketplace Pvt Ltd. Colombo, Sri Lanka. All rights reserved.</p>
    </div>
</div>
