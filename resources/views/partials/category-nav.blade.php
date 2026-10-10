<nav aria-label="Shop categories" class="flex w-full items-center justify-start gap-x-4 overflow-x-auto scroll-smooth snap-x snap-mandatory py-space-xs whitespace-nowrap sm:gap-x-5" data-active-classes="text-primary border-b-2 border-primary font-label-lg">
    @foreach ([
        'women' => 'Women',
        'men' => 'Men',
        'kids' => 'Kids',
        'shoes' => 'Shoes',
        'bags' => 'Bags',
        'accessories' => 'Accessories',
        'jewelry' => 'Jewelry',
        'essentials' => 'Essentials',
        'new-arrivals' => 'New Arrivals',
        'best-sellers' => 'Best Sellers',
        'featured' => 'Featured Products',
        'sale' => 'Sale / Offers',
    ] as $slug => $label)
        <a class="shrink-0 snap-start font-label-md text-label-md uppercase tracking-wider text-on-surface-variant transition-colors hover:text-primary {{ request()->route('category') === $slug ? 'border-b-2 border-primary font-semibold text-primary' : '' }}" data-path="{{ $slug }}" href="{{ route('shop.category', $slug) }}">{{ $label }}</a>
    @endforeach
</nav>
