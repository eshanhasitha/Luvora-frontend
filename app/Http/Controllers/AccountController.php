<?php

namespace App\Http\Controllers;

use App\Services\LuvoraApiClient;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    public function dashboard()
    {
        $context = $this->accountContext();

        return $context instanceof RedirectResponse
            ? $context
            : view('account.dashboard', $context);
    }

    public function profile()
    {
        $context = $this->accountContext();

        return $context instanceof RedirectResponse
            ? $context
            : view('account.profile', $context);
    }

    public function editProfile()
    {
        $context = $this->accountContext();

        return $context instanceof RedirectResponse
            ? $context
            : view('account.profile-edit', $context);
    }

    public function updateProfile(Request $request, LuvoraApiClient $api)
    {
        $context = $this->accountContext();

        if ($context instanceof RedirectResponse) {
            return $context;
        }

        $profile = $request->validate([
            'first_name' => ['required', 'string', 'max:80'],
            'last_name' => ['required', 'string', 'max:80'],
            'display_name' => ['nullable', 'string', 'max:120'],
            'date_of_birth' => ['nullable', 'date', 'before:today'],
            'wardrobe_category' => ['nullable', 'in:women,men,unisex'],
            'standard_size' => ['nullable', 'string', 'max:30'],
            'alteration_preference' => ['nullable', 'string', 'max:500'],
            'preferred_fabrics' => ['nullable', 'array'],
            'preferred_fabrics.*' => ['string', 'max:60'],
            'phone' => ['nullable', 'string', 'max:40'],
            'secondary_phone' => ['nullable', 'string', 'max:40'],
            'preferred_channel' => ['nullable', 'in:email,phone,whatsapp'],
        ]);

        try {
            $response = $api->putWithToken(session('access_token'), '/api/account/profile', [
                'firstName' => $profile['first_name'],
                'lastName' => $profile['last_name'],
                'phoneNumber' => $profile['phone'] ?? null,
            ]);
        } catch (ConnectionException) {
            return back()->withInput()->withErrors(['profile' => 'The account service is unavailable. Your profile was not saved.']);
        }

        if ($response->failed()) {
            return back()->withInput()->withErrors(['profile' => 'The account service could not save your profile. Please review your details and try again.']);
        }

        // The account API currently persists the core identity fields only.
        $extended = array_intersect_key($profile, array_flip([
            'display_name', 'date_of_birth', 'wardrobe_category', 'standard_size',
            'alteration_preference', 'preferred_fabrics', 'secondary_phone', 'preferred_channel',
        ]));
        session()->put('account.profile', $extended);
        session()->put('user', array_merge((array) session('user', []), (array) $response->json()));

        return redirect()->route('account.profile')->with('status', 'Your profile has been updated.');
    }

    public function password()
    {
        return $this->accountView('account.password');
    }

    public function updatePassword(Request $request, LuvoraApiClient $api)
    {
        $context = $this->accountContext();

        if ($context instanceof RedirectResponse) {
            return $context;
        }

        $data = $request->validate([
            'current_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        try {
            $response = $api->postWithToken(session('access_token'), '/api/auth/change-password', [
                'currentPassword' => $data['current_password'],
                'newPassword' => $data['new_password'],
            ]);
        } catch (ConnectionException) {
            return back()->withErrors(['current_password' => 'The account service is unavailable. Please try again shortly.']);
        }

        if ($response->failed()) {
            return back()->withErrors(['current_password' => 'Password could not be changed. Check your current password or try again later.']);
        }

        return back()->with('status', 'Your password has been changed.');
    }

    public function addresses(LuvoraApiClient $api)
    {
        $context = $this->accountContext();

        if ($context instanceof RedirectResponse) return $context;

        [$addresses, $unavailable] = $this->fetchAddresses($api);

        return view('account.addresses.index', $context + ['addresses' => $addresses, 'addressesUnavailable' => $unavailable]);
    }

    public function createAddress(LuvoraApiClient $api)
    {
        return $this->addressForm(null, $api);
    }

    public function storeAddress(Request $request, LuvoraApiClient $api)
    {
        $context = $this->accountContext();

        if ($context instanceof RedirectResponse) {
            return $context;
        }

        $data = $this->validateAddress($request);
        try {
            $response = $api->postWithToken(session('access_token'), '/api/account/addresses', $this->addressPayload($data, $request));
        } catch (ConnectionException) {
            return back()->withInput()->withErrors(['address' => 'The account service is unavailable. Your address was not saved.']);
        }
        if ($response->failed()) return back()->withInput()->withErrors(['address' => 'The account service could not save this address. Check the phone number and address details.']);
        $this->saveAddressExtras($response->json(), $data);

        return redirect()->route('account.addresses.index')->with('status', 'Address saved to your account.');
    }

    public function editAddress(string $id, LuvoraApiClient $api)
    {
        return $this->addressForm($id, $api);
    }

    public function updateAddress(Request $request, string $id, LuvoraApiClient $api)
    {
        $context = $this->accountContext();

        if ($context instanceof RedirectResponse) {
            return $context;
        }

        $data = $this->validateAddress($request);
        try {
            $response = $api->putWithToken(session('access_token'), '/api/account/addresses/' . rawurlencode($id), $this->addressPayload($data, $request));
        } catch (ConnectionException) {
            return back()->withInput()->withErrors(['address' => 'The account service is unavailable. Your address was not updated.']);
        }
        if ($response->notFound()) abort(404, 'Address not found.');
        if ($response->failed()) return back()->withInput()->withErrors(['address' => 'The account service could not update this address. Check the phone number and address details.']);
        $this->saveAddressExtras($response->json(), $data);

        return redirect()->route('account.addresses.index')->with('status', 'Address updated.');
    }

    public function deleteAddress(string $id, LuvoraApiClient $api)
    {
        $context = $this->accountContext();

        if ($context instanceof RedirectResponse) {
            return $context;
        }

        try {
            $response = $api->deleteWithToken(session('access_token'), '/api/account/addresses/' . rawurlencode($id));
        } catch (ConnectionException) {
            return back()->withErrors(['address' => 'The account service is unavailable. The address was not removed.']);
        }
        if ($response->notFound()) abort(404, 'Address not found.');
        if ($response->failed()) return back()->withErrors(['address' => 'The account service could not remove this address.']);
        $extras = session('account.address_extras', []);
        unset($extras[$id]);
        session()->put('account.address_extras', $extras);

        return redirect()->route('account.addresses.index')->with('status', 'Address removed from your account.');
    }

    public function settings(LuvoraApiClient $api)
    {
        $context = $this->accountContext();
        if ($context instanceof RedirectResponse) return $context;
        [$preferences, $unavailable] = $this->fetchPreferences($api);
        return view('account.settings', $context + ['settings' => $preferences, 'preferencesUnavailable' => $unavailable]);
    }

    public function updateSettings(Request $request, LuvoraApiClient $api)
    {
        $context = $this->accountContext();

        if ($context instanceof RedirectResponse) {
            return $context;
        }

        $settings = $request->validate([
            'language' => ['required', 'in:en,si,ta'],
            'currency' => ['required', 'in:LKR,USD'],
            'theme' => ['required', 'in:system,light,dark'],
        ]);

        $current = $this->fetchPreferences($api)[0];
        try {
            $response = $api->putWithToken(session('access_token'), '/api/account/preferences', [
                'language' => $settings['language'], 'currency' => $settings['currency'], 'theme' => $settings['theme'],
                'emailNotifications' => $current['email_notifications'], 'smsNotifications' => $current['sms_notifications'], 'marketingEmails' => $current['marketing_emails'],
            ]);
        } catch (ConnectionException) {
            return back()->withInput()->withErrors(['preferences' => 'The account service is unavailable. Your settings were not saved.']);
        }
        if ($response->failed()) return back()->withInput()->withErrors(['preferences' => 'The account service could not save your settings.']);

        return back()->with('status', 'Account settings updated.');
    }

    public function notifications(LuvoraApiClient $api)
    {
        $context = $this->accountContext();
        if ($context instanceof RedirectResponse) return $context;
        [$apiPreferences, $preferencesUnavailable] = $this->fetchPreferences($api);
        $notifications = [];
        $notificationsUnavailable = false;
        $userId = data_get($context['user'], 'id') ?? data_get($context['user'], 'Id');
        $unreadCount = 0;
        try {
            $response = $api->getWithToken(session('access_token'), '/api/notifications/user/' . rawurlencode((string) $userId));
            if ($response->successful()) {
                $body = $response->json();
                $notifications = data_get($body, 'data.notifications') ?? data_get($body, 'notifications') ?? data_get($body, 'data') ?? $body ?? [];
                if (! is_array($notifications)) $notifications = [];
            } else $notificationsUnavailable = true;
            $countResponse = $api->getWithToken(session('access_token'), '/api/notifications/user/' . rawurlencode((string) $userId) . '/unread-count');
            if ($countResponse->successful()) $unreadCount = (int) (data_get($countResponse->json(), 'unreadCount') ?? 0);
        } catch (ConnectionException) { $notificationsUnavailable = true; }
        return view('account.notifications', $context + [
            'preferences' => ['order_updates' => $apiPreferences['email_notifications'], 'delivery_updates' => $apiPreferences['sms_notifications'], 'new_collections' => $apiPreferences['marketing_emails']],
            'preferencesUnavailable' => $preferencesUnavailable, 'notifications' => $notifications, 'notificationsUnavailable' => $notificationsUnavailable,
            'unreadCount' => $unreadCount,
        ]);
    }

    public function updateNotifications(Request $request, LuvoraApiClient $api)
    {
        $context = $this->accountContext();

        if ($context instanceof RedirectResponse) {
            return $context;
        }

        $current = $this->fetchPreferences($api)[0];
        try {
            $response = $api->putWithToken(session('access_token'), '/api/account/preferences', [
                'language' => $current['language'], 'currency' => $current['currency'], 'theme' => $current['theme'],
                'emailNotifications' => $request->boolean('order_updates'), 'smsNotifications' => $request->boolean('delivery_updates'), 'marketingEmails' => $request->boolean('new_collections'),
            ]);
        } catch (ConnectionException) {
            return back()->withErrors(['preferences' => 'The account service is unavailable. Your notification preferences were not saved.']);
        }
        if ($response->failed()) return back()->withErrors(['preferences' => 'The account service could not save your notification preferences.']);

        return back()->with('status', 'Notification preferences updated.');
    }

    public function markNotificationRead(string $notificationId, LuvoraApiClient $api)
    {
        $context = $this->accountContext();
        if ($context instanceof RedirectResponse) return $context;
        abort_unless((bool) preg_match('/^[0-9a-f-]{36}$/i', $notificationId), 404);
        try {
            $userId = data_get($context['user'], 'id') ?? data_get($context['user'], 'Id');
            $list = $api->getWithToken(session('access_token'), '/api/notifications/user/' . rawurlencode((string) $userId));
            if ($list->failed()) return back()->withErrors(['notifications' => 'Your notifications could not be verified.']);
            $body = $list->json();
            $notifications = data_get($body, 'data.notifications') ?? data_get($body, 'notifications') ?? data_get($body, 'data') ?? $body ?? [];
            $owned = is_array($notifications) && collect($notifications)->contains(fn ($notification) => (string) (data_get($notification, 'id') ?? data_get($notification, 'Id')) === $notificationId);
            if (! $owned) abort(404, 'Notification not found.');
            $response = $api->putWithToken(session('access_token'), '/api/notifications/' . rawurlencode($notificationId) . '/read');
        } catch (ConnectionException) {
            return back()->withErrors(['notifications' => 'The notification service is unavailable.']);
        }
        if ($response->failed()) return back()->withErrors(['notifications' => 'This notification could not be marked as read.']);
        return back()->with('status', 'Notification marked as read.');
    }

    public function deleteAccount()
    {
        return $this->accountView('account.delete');
    }

    public function submitDeleteAccount(Request $request, LuvoraApiClient $api)
    {
        $context = $this->accountContext();
        if ($context instanceof RedirectResponse) return $context;
        $data = $request->validate(['password' => ['required', 'string'], 'confirm' => ['accepted']]);
        try {
            $response = $api->deleteWithToken(session('access_token'), '/api/account', ['password' => $data['password'], 'confirm' => true]);
        } catch (ConnectionException) {
            return back()->withErrors(['password' => 'The account service is unavailable. Your account was not deleted.']);
        }
        if ($response->failed()) return back()->withErrors(['password' => 'The account could not be deleted. Check your password and try again.']);
        session()->flush();
        return redirect()->route('home')->with('status', 'Your account has been deactivated.');
    }

    public function verification()
    {
        return $this->accountView('account.verify-email');
    }

    public function resendVerification(LuvoraApiClient $api)
    {
        $context = $this->accountContext();

        if ($context instanceof RedirectResponse) {
            return $context;
        }

        try {
            $response = $api->postWithToken(session('access_token'), '/api/auth/resend-verification');
        } catch (ConnectionException) {
            return back()->withErrors(['email' => 'The account service is unavailable. Please try again shortly.']);
        }

        if ($response->failed()) {
            return back()->withErrors(['email' => 'We could not send a verification message. The email verification endpoint may not be enabled yet.']);
        }

        return back()->with('status', data_get($response->json(), 'message') ?? 'If verification is available, a message will be sent to your email address.');
    }

    private function accountView(string $view)
    {
        $context = $this->accountContext();

        return $context instanceof RedirectResponse ? $context : view($view, $context);
    }

    private function addressForm(?string $id, LuvoraApiClient $api)
    {
        $context = $this->accountContext();

        if ($context instanceof RedirectResponse) {
            return $context;
        }

        [$addresses, $addressesUnavailable] = $this->fetchAddresses($api);
        $address = null;

        if ($id !== null) {
            $address = collect($addresses)->first(fn ($item) => (string) data_get($item, 'id') === $id);
            abort_if($address === null, 404, 'Address not found.');
        }

        return view('account.addresses.form', $context + [
            'address' => $address,
            'addressId' => $id,
            'addressesUnavailable' => $addressesUnavailable,
        ]);
    }

    private function validateAddress(Request $request): array
    {
        return $request->validate([
            'label' => ['required', 'string', 'max:80'],
            'recipient' => ['required', 'string', 'max:120'],
            'phone' => ['required', 'string', 'max:40'],
            'address_line_1' => ['required', 'string', 'max:200'],
            'address_line_2' => ['nullable', 'string', 'max:200'],
            'city' => ['required', 'string', 'max:100'],
            'district' => ['nullable', 'string', 'max:100'],
            'postal_code' => ['nullable', 'string', 'max:20'],
            'delivery_instructions' => ['nullable', 'string', 'max:500'],
        ]);
    }

    private function addressIndex(array $addresses, string $id): ?int
    {
        foreach ($addresses as $index => $address) {
            if ((string) ($address['id'] ?? '') === $id) {
                return $index;
            }
        }

        return null;
    }

    private function accountContext(): array|RedirectResponse
    {
        if (! session('access_token')) {
            return redirect()->route('login.show');
        }

        $user = session('user', []);

        if (! data_get($user, 'id') && ! data_get($user, 'Id')) {
            session()->flush();

            return redirect()->route('login.show');
        }

        $profile = session('account.profile', []);
        try {
            $response = app(LuvoraApiClient::class)->getWithToken(session('access_token'), '/api/account/profile');
            if ($response->successful() && is_array($response->json())) {
                $user = array_merge((array) $user, $response->json());
                session()->put('user', $user);
            }
        } catch (ConnectionException) {
            // Keep the user record returned by login available if profile service is offline.
        }

        return [
            'user' => is_array($user) ? array_merge($user, $profile) : $user,
        ];
    }

    private function fetchAddresses(LuvoraApiClient $api): array
    {
        try {
            $response = $api->getWithToken(session('access_token'), '/api/account/addresses');
            if ($response->failed()) return [[], true];
            $body = $response->json();
            $addresses = data_get($body, 'data.addresses') ?? data_get($body, 'addresses') ?? data_get($body, 'data') ?? $body ?? [];
            if (! is_array($addresses)) $addresses = [];
            $extras = session('account.address_extras', []);
            $addresses = array_map(function ($address) use ($extras) {
                $id = (string) (data_get($address, 'id') ?? '');
                return array_merge((array) $address, [
                    'address_line_1' => data_get($address, 'addressLine1', data_get($address, 'address_line_1', '')),
                    'address_line_2' => data_get($address, 'addressLine2', data_get($address, 'address_line_2', '')),
                    'postal_code' => data_get($address, 'postalCode', data_get($address, 'postal_code', '')),
                    'recipient' => data_get($address, 'recipientName', data_get($address, 'recipient', '')),
                    'phone' => data_get($address, 'phoneNumber', data_get($address, 'phone', '')),
                    'district' => data_get($address, 'region', data_get($address, 'district', '')),
                    'is_default' => data_get($address, 'isDefault', data_get($address, 'is_default', false)),
                    'delivery_instructions' => data_get($extras, $id . '.delivery_instructions', ''),
                ]);
            }, $addresses);
            return [$addresses, false];
        } catch (ConnectionException) { return [[], true]; }
    }

    private function addressPayload(array $data, Request $request): array
    {
        return [
            'label' => $data['label'], 'recipientName' => $data['recipient'], 'phoneNumber' => $data['phone'],
            'addressLine1' => $data['address_line_1'], 'addressLine2' => $data['address_line_2'] ?? null,
            'city' => $data['city'], 'region' => $data['district'] ?? null, 'postalCode' => $data['postal_code'] ?? null,
            'country' => 'Sri Lanka', 'isDefault' => $request->boolean('is_default'),
        ];
    }

    private function saveAddressExtras(array $response, array $data): void
    {
        $id = (string) (data_get($response, 'id') ?? data_get($response, 'Id') ?? '');
        if ($id === '') return;
        $extras = session('account.address_extras', []);
        $extras[$id] = ['delivery_instructions' => $data['delivery_instructions'] ?? ''];
        session()->put('account.address_extras', $extras);
    }

    private function fetchPreferences(LuvoraApiClient $api): array
    {
        $defaults = ['language' => 'en', 'currency' => 'LKR', 'theme' => 'system', 'email_notifications' => true, 'sms_notifications' => true, 'marketing_emails' => false];
        try {
            $response = $api->getWithToken(session('access_token'), '/api/account/preferences');
            if ($response->failed() || ! is_array($response->json())) return [$defaults, true];
            $body = $response->json();
            $prefs = data_get($body, 'data.preferences') ?? data_get($body, 'preferences') ?? data_get($body, 'data') ?? $body;
            return [[
                'language' => data_get($prefs, 'language', 'en'), 'currency' => data_get($prefs, 'currency', 'LKR'), 'theme' => data_get($prefs, 'theme', 'system'),
                'email_notifications' => (bool) data_get($prefs, 'emailNotifications', false), 'sms_notifications' => (bool) data_get($prefs, 'smsNotifications', false), 'marketing_emails' => (bool) data_get($prefs, 'marketingEmails', false),
            ], false];
        } catch (ConnectionException) { return [$defaults, true]; }
    }
}
