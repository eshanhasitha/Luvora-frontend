@extends('finance.layout')
@section('crumb', 'Refunds')
@section('heading', 'Refunds')
@section('description', 'Refund records and actions are not supported by the current payment API.')
@section('page_content')
@include('partials.api-state')
<section class="rounded-2xl border border-amber-200 bg-amber-50 p-6"><p class="text-xs font-semibold uppercase tracking-wide text-amber-900">API support pending</p><h2 class="mt-2 text-lg font-semibold text-amber-950">Refund management is unavailable</h2><p class="mt-2 max-w-3xl text-sm leading-6 text-amber-900">PaymentService exposes transaction reads but no refund records or refund mutation endpoint. This page does not display sample refund requests or provide fake approval actions.</p>@if(!empty($apiErrors['refunds']))<p class="mt-3 text-sm text-amber-900">{{ $apiErrors['refunds'] }}</p>@endif<ul class="mt-4 list-inside list-disc text-sm text-amber-900"><li>Add refund DTOs and authorized read endpoints in PaymentService.</li><li>Add an idempotent refund command with audit logging and the provider result.</li><li>Expose refund status and transaction linkage for history.</li></ul></section>
@endsection
