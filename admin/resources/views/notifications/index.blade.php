@extends('security.layout')
@section('crumb', 'Notifications')
@section('heading', 'Notifications')
@section('description', 'Review admin alerts and mark them as read.')
@section('page_content')
@include('partials.api-state')
<section class="rounded-xl bg-surface-container-lowest p-space-md shadow-sm">
    <div class="mb-4 flex flex-wrap items-center justify-between gap-3">
        <div>
            <h2 class="font-headline-sm text-headline-sm font-semibold">Notification inbox</h2>
            <p class="text-sm text-secondary">Unread: {{ data_get($apiData['unreadCount'] ?? [], 'unreadCount', data_get($apiData['unreadCount'] ?? [], 'count', '—')) }}</p>
        </div>
        <form method="POST" action="{{ route('admin.api-mutate') }}">
            @csrf
            <input type="hidden" name="_api_method" value="POST">
            <input type="hidden" name="_api_endpoint" value="/api/admin/notifications/read-all">
            <button class="rounded-full bg-primary px-4 py-2 text-sm font-semibold text-on-primary">Mark all as read</button>
        </form>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full text-left text-sm">
            <thead><tr><th class="p-3">Notification</th><th class="p-3">Details</th><th class="p-3">Status</th><th class="p-3">Action</th></tr></thead>
            <tbody class="divide-y divide-surface-container">
                @forelse($apiRecords['notifications'] ?? [] as $notification)
                    @php($notificationId = data_get($notification, 'notificationId', data_get($notification, 'id')))
                    @php($isRead = (bool) data_get($notification, 'isRead', data_get($notification, 'read', false)))
                    <tr>
                        <td class="p-3 font-medium">{{ data_get($notification, 'title', data_get($notification, 'type', 'Notification')) }}</td>
                        <td class="p-3">{{ data_get($notification, 'message', data_get($notification, 'body', '')) }}</td>
                        <td class="p-3">{{ $isRead ? 'Read' : 'Unread' }}</td>
                        <td class="p-3">
                            @if($notificationId && !$isRead)
                                <form method="POST" action="{{ route('admin.api-mutate') }}">
                                    @csrf
                                    <input type="hidden" name="_api_method" value="PATCH">
                                    <input type="hidden" name="_api_endpoint" value="/api/admin/notifications/{{ rawurlencode((string) $notificationId) }}/read">
                                    <button class="rounded-full bg-surface-container px-3 py-1.5 text-xs font-semibold">Mark read</button>
                                </form>
                            @else
                                <span class="text-xs text-secondary">—</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="p-5 text-center text-sm text-secondary">No notification records were returned by the API.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection
