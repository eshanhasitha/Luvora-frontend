<div class="mt-space-lg border-t border-outline-variant/30 pt-space-lg">
    <div class="flex flex-wrap items-center justify-start gap-x-2 gap-y-2 text-on-surface-variant">
        <span class="mr-1 font-label-sm text-label-sm uppercase tracking-wider text-secondary">Secure Island Gateways:</span>
        @foreach (['Visa', 'Mastercard', 'Koko Pay', 'Genie', 'Mintpay', 'Cash on Delivery'] as $gateway)
            <span class="whitespace-nowrap rounded bg-surface-container-lowest px-space-sm py-1 font-label-sm text-label-sm font-semibold text-secondary">{{ $gateway }}</span>
        @endforeach
    </div>
    <div class="mt-space-md grid grid-cols-1 items-center gap-3 text-center md:grid-cols-[1fr_auto] md:text-left">
        <nav aria-label="Discover Luvora" class="flex flex-wrap items-center justify-center gap-x-5 gap-y-2 text-[11px] font-semibold text-slate-500 md:justify-start">
            <a href="{{ route('stores.index') }}" class="whitespace-nowrap hover:text-blue-700">Store locations</a>
            <a href="{{ route('gift-guide') }}" class="whitespace-nowrap hover:text-blue-700">Gift guide</a>
            <a href="{{ route('journal.index') }}" class="whitespace-nowrap hover:text-blue-700">Journal</a>
            <a href="{{ route('sitemap') }}" class="whitespace-nowrap hover:text-blue-700">Sitemap</a>
        </nav>
        <p class="max-w-2xl font-body-sm text-body-sm leading-5 text-secondary md:text-right">© {{ date('Y') }} Luvora Luxury Marketplace Pvt Ltd. Colombo, Sri Lanka. All rights reserved.</p>
    </div>
</div>