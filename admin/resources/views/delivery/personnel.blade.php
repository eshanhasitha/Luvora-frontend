@extends('delivery.layout')
@section('crumb', 'Personnel')
@section('heading', 'Delivery Personnel')
@section('description', 'Personnel management requires a DeliveryService staff directory API.')
@section('page_content')
<section class="rounded-2xl border border-amber-200 bg-amber-50 p-6"><p class="text-xs font-semibold uppercase tracking-wide text-amber-900">API support pending</p><h2 class="mt-2 text-lg font-semibold text-amber-950">No personnel data source is available</h2><p class="mt-2 max-w-3xl text-sm leading-6 text-amber-900">The current DeliveryService contract has shipment listing, summary, details, and status updates. It does not expose driver profiles, vehicles, availability, ratings, or assignment capacity. This page contains no sample personnel or pretend assignment controls.</p><ul class="mt-4 list-inside list-disc text-sm text-amber-900"><li>Add authorized personnel and vehicle read APIs.</li><li>Add shipment assignment and reassignment commands with operator audit details.</li></ul></section>
@endsection
