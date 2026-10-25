@extends('security.layout')
@section('crumb', 'Audit logs')
@section('heading', 'Audit Logs')
@section('description', 'Review administrative events recorded by AuditService. This page is read-only.')
@section('page_content')
@include('partials.api-state')
@php
    $auditRows = $apiRecords['logs'] ?? [];
    $paging = $apiPagination['logs'] ?? ['page'=>1,'pageSize'=>25,'total'=>null,'from'=>0,'to'=>0,'pages'=>null,'hasNext'=>false];
    $safeAuditText = static function ($value): string {
        $text = (string) ($value ?? '');
        $text = preg_replace('/\b(password|passwd|token|access[_-]?token|refresh[_-]?token|secret|api[_-]?key|authorization)\b\s*[:=]\s*[^\s,;]+/i', '$1=[REDACTED]', $text) ?? '';
        $text = preg_replace('/\bBearer\s+[^\s,;]+/i', 'Bearer [REDACTED]', $text) ?? '';
        $text = preg_replace('/\beyJ[a-zA-Z0-9_-]*\.[a-zA-Z0-9_-]*\.[a-zA-Z0-9_-]*\b/', '[TOKEN REDACTED]', $text) ?? '';
        $text = preg_replace('/\b(?:Host|Server|Data Source)\s*=\s*[^;\s]+(?:;[^;\r\n]+)*/i', '[CONNECTION STRING REDACTED]', $text) ?? '';
        return preg_replace('/\b(?:postgres(?:ql)?|amqp|mongodb|redis):\/\/[^\s]+/i', '[CONNECTION STRING REDACTED]', $text) ?? '';
    };
    $categoryOptions = collect(array_merge(['admin','security','export'], array_map(fn($row) => (string) data_get($row, 'category', ''), $auditRows)))
        ->filter()->unique()->sort()->values();
@endphp
<section class="mb-5 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm sm:p-5" aria-label="Audit filters">
    <form method="GET" action="{{ route('admin.audit-logs') }}" class="grid gap-3 sm:grid-cols-2 xl:grid-cols-[1.1fr_1.1fr_1fr_1fr_auto_auto] xl:items-end">
        <label class="text-xs font-semibold text-slate-600">Actor ID<input name="actorUserId" value="{{ request('actorUserId') }}" inputmode="text" autocomplete="off" placeholder="Admin user ID" class="mt-1.5 block w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm font-normal"></label>
        <label class="text-xs font-semibold text-slate-600">Category<select name="category" class="mt-1.5 block w-full rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-sm font-normal"><option value="">All categories</option>@foreach($categoryOptions as $category)<option value="{{ $category }}" @selected(request('category')===$category)>{{ ucfirst($category) }}</option>@endforeach</select></label>
        <label class="text-xs font-semibold text-slate-600">From<input type="date" name="from" value="{{ request('from') }}" class="mt-1.5 block w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm font-normal"></label>
        <label class="text-xs font-semibold text-slate-600">To<input type="date" name="to" value="{{ request('to') }}" class="mt-1.5 block w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm font-normal"></label>
        <button type="submit" class="rounded-lg bg-[#202321] px-5 py-2.5 text-sm font-semibold text-white hover:bg-[#365c4a]">Apply filters</button>
        <a href="{{ route('admin.audit-logs') }}" class="rounded-lg border border-slate-200 px-4 py-2.5 text-center text-sm font-semibold text-slate-700 hover:bg-slate-50">Reset</a>
    </form>
</section>
<section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm" aria-label="Administrative audit records">
    <div class="flex flex-col justify-between gap-2 border-b border-slate-100 px-5 py-4 sm:flex-row sm:items-center"><div><h2 class="font-semibold text-slate-900">Recorded administrative events</h2><p class="mt-1 text-xs text-slate-500">Actor identity is shown as its recorded user ID. Timestamps display in {{ config('app.timezone') }}.</p></div><p class="text-xs text-slate-500">@if($paging['to']===0)No recorded events on this page@else Showing {{ number_format($paging['from']) }}–{{ number_format($paging['to']) }}@if($paging['total']!==null) of {{ number_format($paging['total']) }}@endif events @endif</p></div>
    @if(!empty($apiErrors['logs']))
        <div class="px-5 py-12 text-center"><span class="material-symbols-outlined text-3xl text-amber-700" aria-hidden="true">cloud_off</span><p class="mt-2 font-semibold text-slate-800">Audit records are unavailable</p><p class="mt-1 text-sm text-slate-500">{{ $apiErrors['logs'] }}</p><a href="{{ url()->full() }}" class="mt-4 inline-flex rounded-lg border border-slate-200 px-4 py-2 text-sm font-semibold hover:bg-slate-50">Retry</a></div>
    @elseif(count($auditRows))
        <div class="overflow-x-auto"><table class="min-w-[920px] w-full text-left text-sm"><thead class="bg-slate-50 text-[11px] uppercase tracking-wide text-slate-500"><tr><th scope="col" class="px-4 py-3">Timestamp</th><th scope="col" class="px-4 py-3">Actor</th><th scope="col" class="px-4 py-3">Action</th><th scope="col" class="px-4 py-3">Target resource</th><th scope="col" class="px-4 py-3">Outcome</th><th scope="col" class="px-4 py-3">Safe metadata</th></tr></thead><tbody class="divide-y divide-slate-100">
        @foreach($auditRows as $record)
            @php
                $responseStatus = data_get($record, 'responseStatus');
                $outcome = is_numeric($responseStatus) ? ((int)$responseStatus < 400 ? 'Success · '.$responseStatus : 'Failure · '.$responseStatus) : 'Not recorded';
                $actorId = data_get($record, 'actorUserId');
                $actorRole = data_get($record, 'actorRole');
                $occurredAt = data_get($record, 'occurredAt');
            @endphp
            <tr class="align-top hover:bg-slate-50/70"><td class="whitespace-nowrap px-4 py-4 text-xs text-slate-600">{{ $occurredAt ? \Illuminate\Support\Carbon::parse($occurredAt)->timezone(config('app.timezone'))->format('Y-m-d H:i:s') : 'Timestamp unavailable' }}</td><td class="px-4 py-4"><span class="block font-mono text-xs text-slate-800">{{ $safeAuditText($actorId ?: 'Actor not recorded') }}</span><span class="mt-1 block text-xs text-slate-500">{{ $safeAuditText($actorRole ?: 'Role not recorded') }}</span></td><td class="max-w-xs px-4 py-4 font-medium text-slate-800">{{ $safeAuditText(data_get($record,'action') ?: 'Action not recorded') }}</td><td class="max-w-sm break-words px-4 py-4 text-slate-700">{{ $safeAuditText(data_get($record,'resource') ?: 'Resource not recorded') }}</td><td class="px-4 py-4"><span class="inline-flex rounded-full px-2.5 py-1 text-xs font-semibold {{ is_numeric($responseStatus) ? ((int)$responseStatus < 400 ? 'bg-emerald-50 text-emerald-800' : 'bg-rose-50 text-rose-800') : 'bg-slate-100 text-slate-700' }}">{{ $outcome }}</span></td><td class="max-w-xs px-4 py-4 text-xs leading-5 text-slate-600"><span class="block">Category: {{ $safeAuditText(data_get($record,'category') ?: 'Not recorded') }}</span><span class="block">Method: {{ $safeAuditText(data_get($record,'httpMethod') ?: 'Not recorded') }}</span><span class="block">Correlation: {{ $safeAuditText(data_get($record,'correlationId') ?: 'Not recorded') }}</span></td></tr>
        @endforeach
        </tbody></table></div>
        @php($pages=$paging['pages'])
        @if($pages && $pages>1)
            <nav class="flex items-center justify-between gap-3 border-t border-slate-100 px-4 py-3" aria-label="Audit log pages"><span class="text-xs text-slate-500">Page {{ $paging['page'] }} of {{ $pages }}</span><div class="flex gap-2">@if($paging['page']>1)<a href="{{ request()->fullUrlWithQuery(['page'=>$paging['page']-1,'pageSize'=>$paging['pageSize']]) }}" class="rounded-lg border border-slate-200 px-3 py-2 text-sm font-medium hover:bg-slate-50">Previous</a>@endif @if($paging['hasNext'])<a href="{{ request()->fullUrlWithQuery(['page'=>$paging['page']+1,'pageSize'=>$paging['pageSize']]) }}" class="rounded-lg border border-slate-200 px-3 py-2 text-sm font-medium hover:bg-slate-50">Next</a>@endif</div></nav>
        @endif
    @else
        <div class="px-5 py-14 text-center"><span class="material-symbols-outlined text-3xl text-slate-400" aria-hidden="true">receipt_long</span><p class="mt-2 font-semibold text-slate-800">No audit events found</p><p class="mt-1 text-sm text-slate-500">No matching records were returned by AuditService for these filters.</p></div>
    @endif
</section>
<p class="mt-4 text-xs leading-5 text-slate-500">This view is read-only. AuditService accepts new events through its ingestion contract and exposes no edit or delete controls here. Sensitive values in free-form event fields are redacted before display.</p>
@endsection
