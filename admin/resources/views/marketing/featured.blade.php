@extends('marketing.layout')
@section('heading', 'Featured products')
@section('description', 'Featured product management requires an API contract.')
@section('page_content')
<section class="rounded-2xl border border-amber-200 bg-amber-50 p-6"><p class="text-xs font-semibold uppercase tracking-wide text-amber-900">API support pending</p><h2 class="mt-2 text-lg font-semibold text-amber-950">Featured product controls are unavailable</h2><p class="mt-2 max-w-3xl text-sm leading-6 text-amber-900">ProductService and PromotionService do not expose a featured-product collection, ordering, or activation contract. This page does not show invented products or browser-only save actions.</p><ul class="mt-4 list-inside list-disc text-sm text-amber-900"><li>Add featured-item DTOs and an authorized management API.</li><li>Define ordering, schedule, and storefront behavior before exposing controls.</li></ul></section>
@endsection
