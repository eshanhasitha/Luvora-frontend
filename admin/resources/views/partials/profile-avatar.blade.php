@php
    $avatarProfile = (array) session('admin_user', []);
    $avatarUrl = data_get($avatarProfile, 'profileImageUrl')
        ?? data_get($avatarProfile, 'profile_image_url')
        ?? data_get($avatarProfile, 'profilePhotoUrl')
        ?? data_get($avatarProfile, 'profile_photo_url')
        ?? data_get($avatarProfile, 'profilePicture')
        ?? data_get($avatarProfile, 'avatarUrl')
        ?? data_get($avatarProfile, 'avatar_url')
        ?? data_get($avatarProfile, 'imageUrl')
        ?? data_get($avatarProfile, 'image_url')
        ?? data_get($avatarProfile, 'photoUrl');
    $avatarName = data_get($avatarProfile, 'name') ?? data_get($avatarProfile, 'Name') ?? trim(implode(' ', array_filter([
        data_get($avatarProfile, 'firstName') ?? data_get($avatarProfile, 'FirstName'),
        data_get($avatarProfile, 'lastName') ?? data_get($avatarProfile, 'LastName'),
    ]))) ?: 'Admin user';
    $avatarSize = $avatarSize ?? 'h-9 w-9';
@endphp
<span class="{{ $avatarSize }} relative inline-flex shrink-0 items-center justify-center overflow-hidden rounded-full bg-slate-100 text-xs font-semibold text-slate-600">
    <span class="material-symbols-outlined text-[27px]">account_circle</span>
    @if($avatarUrl)<img src="{{ $avatarUrl }}" alt="{{ $avatarName }}" class="absolute inset-0 h-full w-full object-cover" onerror="this.remove()">@endif
</span>
