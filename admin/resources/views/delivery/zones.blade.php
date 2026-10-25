@extends('delivery.layout')
@section('crumb', 'Delivery zones')
@section('heading', 'Delivery Zones')
@section('description', 'Zone configuration requires a DeliveryService API contract.')
@section('page_content')
<section class="rounded-2xl border border-amber-200 bg-amber-50 p-6"><p class="text-xs font-semibold uppercase tracking-wide text-amber-900">API support pending</p><h2 class="mt-2 text-lg font-semibold text-amber-950">Delivery zones are not available</h2><p class="mt-2 max-w-3xl text-sm leading-6 text-amber-900">The current DeliveryService API does not expose delivery-zone configuration or geographic coverage data. No sample zones or fake save controls are shown.</p><ul class="mt-4 list-inside list-disc text-sm text-amber-900"><li>Add zone DTOs with validated coverage and provider constraints.</li><li>Provide authorized list/create/update operations and audit events.</li></ul></section>
@endsection
