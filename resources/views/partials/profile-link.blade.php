@php
    $profilePhoto = data_get(session('user'), 'profileImageUrl')
        ?? data_get(session('user'), 'profilePicture')
        ?? data_get(session('user'), 'avatarUrl')
        ?? data_get(session('user'), 'imageUrl');
@endphp
<a class="inline-flex h-9 w-9 items-center justify-center overflow-hidden rounded-full text-slate-600 transition hover:bg-slate-100 hover:text-blue-700" data-path="profile" href="{{ session('access_token') ? route('account.dashboard') : route('login.show') }}" aria-label="{{ session('access_token') ? 'Your account' : 'Sign in' }}" title="{{ session('access_token') ? 'Your account' : 'Sign in' }}">
    @if ($profilePhoto)
        <img src="{{ $profilePhoto }}" alt="Profile" class="h-full w-full rounded-full object-cover" onerror="this.hidden=true; this.nextElementSibling.hidden=false">
    @endif
    <span class="material-symbols-outlined text-[27px]" @if ($profilePhoto) hidden @endif>account_circle</span>
</a>