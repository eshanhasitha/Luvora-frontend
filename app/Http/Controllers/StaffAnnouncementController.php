<?php

namespace App\Http\Controllers;

use App\Services\SiteAnnouncement;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StaffAnnouncementController extends Controller
{
    public function edit(Request $request, SiteAnnouncement $announcements): View|RedirectResponse
    {
        if (! $this->isStaff($request)) {
            abort($request->session()->has('access_token') ? 403 : 401);
        }

        return view('staff.announcement', ['announcement' => $announcements->current()]);
    }

    public function publish(Request $request, SiteAnnouncement $announcements): RedirectResponse
    {
        if (! $this->isStaff($request)) {
            abort($request->session()->has('access_token') ? 403 : 401);
        }

        $data = $request->validate([
            'message' => ['required', 'string', 'max:240'],
        ]);
        $user = (array) $request->session()->get('user', []);
        $staffName = trim(implode(' ', array_filter([
            data_get($user, 'firstName') ?? data_get($user, 'first_name'),
            data_get($user, 'lastName') ?? data_get($user, 'last_name'),
        ]))) ?: (string) (data_get($user, 'email') ?? 'Staff');

        $announcements->publish($data['message'], $staffName);

        return back()->with('status', 'The announcement is now visible on the storefront.');
    }

    public function clear(Request $request, SiteAnnouncement $announcements): RedirectResponse
    {
        if (! $this->isStaff($request)) {
            abort($request->session()->has('access_token') ? 403 : 401);
        }

        $announcements->clear();

        return back()->with('status', 'The storefront announcement has been removed.');
    }

    private function isStaff(Request $request): bool
    {
        $role = strtolower((string) (data_get($request->session()->get('user', []), 'role')
            ?? data_get($request->session()->get('user', []), 'Role')
            ?? ''));

        return in_array($role, ['staff', 'admin'], true);
    }
}
