@extends('finance.layout')
@section('crumb', 'Payment details')
@section('heading', 'Payment Details')
@section('description', 'Review a transaction using the authorized PaymentService response.')
@section('page_content')
@include('partials.api-state')
@php
$transaction=$apiData['transaction']??null;
$transaction=data_get($transaction,'data.transaction')??data_get($transaction,'transaction')??data_get($transaction,'data')??$transaction;
@endphp
@if(is_array($transaction)&&count($transaction))
<section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm" aria-labelledby="payment-detail-heading">
    <div class="border-b border-slate-100 px-5 py-4"><h2 id="payment-detail-heading" class="font-semibold">Transaction details</h2><p class="mt-1 font-mono text-xs text-slate-500">{{ data_get($transaction,'transactionId',data_get($transaction,'id','Reference unavailable')) }}</p></div>
    <dl class="grid gap-4 p-5 sm:grid-cols-2 lg:grid-cols-3">
        @foreach(['orderId'=>'Order reference','amount'=>'Amount','currency'=>'Currency','provider'=>'Provider','paymentMethod'=>'Payment method','status'=>'Status','createdAt'=>'Created','updatedAt'=>'Last updated'] as $field=>$label)
        @php($value=data_get($transaction,$field))
        <div class="rounded-xl bg-slate-50 p-4"><dt class="text-xs font-semibold uppercase tracking-wide text-slate-500">{{ $label }}</dt><dd class="mt-2 break-words text-sm font-medium text-slate-900">{{ $value===null||$value===''?'Not provided':(str_ends_with($field,'At')?\Illuminate\Support\Carbon::parse($value)->timezone(config('app.timezone'))->format('Y-m-d H:i T'):$value) }}</dd></div>
        @endforeach
    </dl>
</section>
@elseif(!empty($apiErrors['transaction']))
<section role="alert" class="rounded-2xl border border-amber-200 bg-amber-50 p-6 text-sm text-amber-950"><h2 class="font-semibold">Transaction details are unavailable</h2><p class="mt-1">{{ $apiErrors['transaction'] }}</p><a class="mt-4 inline-flex rounded-lg border border-amber-300 bg-white px-4 py-2 font-semibold" href="{{ request()->fullUrl() }}">Retry</a></section>
@else
<section class="rounded-2xl border border-slate-200 bg-white p-10 text-center"><h2 class="font-semibold text-slate-900">Select a transaction to inspect</h2><p class="mt-1 text-sm text-slate-600">Open a transaction reference from the Payments table to load its details.</p><a href="{{ route('payments.index') }}" class="mt-4 inline-flex rounded-lg bg-[#202321] px-4 py-2.5 text-sm font-semibold text-white">View payments</a></section>
@endif
@endsection
