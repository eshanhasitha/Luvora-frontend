@extends('delivery.layout')
@section('crumb', 'Assignments')
@section('heading', 'Shipment Queue')
@section('description', 'Review current shipment records from DeliveryService. Staff assignment controls are pending backend support.')
@section('page_content')
@include('partials.api-state')
@php($rows=$apiRecords['shipments']??[])
<section class="mb-4 rounded-xl border border-amber-200 bg-amber-50 p-4 text-sm text-amber-950"><strong>Assignment management is not available.</strong> DeliveryService has no staff directory or assignment endpoint. The rows below are shipment status records only.</section>
<section class="overflow-hidden rounded-xl border border-slate-200 bg-white"><div class="border-b border-slate-100 p-4"><h2 class="font-semibold">Shipments</h2></div>@if(!empty($apiErrors['shipments']))<div role="alert" class="p-8 text-sm text-amber-900">Shipment data is unavailable. {{ $apiErrors['shipments'] }}</div>@elseif(count($rows))<div class="overflow-x-auto"><table class="min-w-[760px] w-full text-left text-sm"><thead class="bg-slate-50 text-xs uppercase text-slate-500"><tr><th class="p-3">Shipment</th><th class="p-3">Order</th><th class="p-3">Recipient</th><th class="p-3">Provider</th><th class="p-3">Tracking</th><th class="p-3">Status</th></tr></thead><tbody id="assignment-rows" class="divide-y divide-slate-100">@foreach($rows as $row)<tr><td class="p-3 font-mono text-xs">{{ data_get($row,'id') }}</td><td class="p-3 font-mono text-xs">{{ data_get($row,'orderId') }}</td><td class="p-3 font-mono text-xs">{{ data_get($row,'userId') }}</td><td class="p-3">{{ data_get($row,'provider')?:'Not provided' }}</td><td class="p-3">{{ data_get($row,'trackingNumber')?:'Not provided' }}</td><td class="p-3">{{ data_get($row,'status') }}</td></tr>@endforeach</tbody></table></div>@else<div class="p-10 text-center text-sm text-slate-500">No shipment records returned.</div>@endif</section>
@endsection
