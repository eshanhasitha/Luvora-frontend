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

    public function updateProfile(Request $request)
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

        session()->put('account.profile', $profile);

        return redirect()->route('account.profile')->with(
            'status',
            'Profile changes are saved for this browser session. They have not been synced to the account service.'
        );
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
                'confirmPassword' => $request->input('new_password_confirmation'),
            ]);
        } catch (ConnectionException) {
            return back()->withErrors(['current_password' => 'The account service is unavailable. Please try again shortly.']);
        }

        if ($response->failed()) {
            return back()->withErrors(['current_password' => 'Password could not be changed. Check your current password or try again later.']);
        }

        return back()->with('status', 'Your password has been changed.');
    }

    public function addresses()
    {
        $context = $this->accountContext();

        return $context instanceof RedirectResponse
            ? $context
            : view('account.addresses.index', $context + ['addresses' => session('account.addresses', [])]);
    }

    public function createAddress()
    {
        return $this->addressForm(null);
    }

    public function storeAddress(Request $request)
    {
        $context = $this->accountContext();

        if ($context instanceof RedirectResponse) {
            return $context;
        }

        $data = $this->validateAddress($request);
        $addresses = session('account.addresses', []);
        $data['id'] = (string) Str::uuid();
        $data['is_default'] = $request->boolean('is_default') || empty($addresses);

        if ($data['is_default']) {
            $addresses = array_map(fn ($address) => array_merge($address, ['is_default' => false]), $addresses);
        }

        $addresses[] = $data;
        session()->put('account.addresses', $addresses);

        return redirect()->route('account.addresses.index')->with('status', 'Address saved in this browser session.');
    }

    public function editAddress(string $id)
    {
        return $this->addressForm($id);
    }

    public function updateAddress(Request $request, string $id)
    {
        $context = $this->accountContext();

        if ($context instanceof RedirectResponse) {
            return $context;
        }

        $addresses = session('account.addresses', []);
        $index = $this->addressIndex($addresses, $id);

        abort_if($index === null, 404, 'Address not found.');

        $data = $this->validateAddress($request);
        $data['id'] = $id;
        $data['is_default'] = $request->boolean('is_default');

        if ($data['is_default']) {
            $addresses = array_map(fn ($address) => array_merge($address, ['is_default' => false]), $addresses);
        }

        $addresses[$index] = $data;
        session()->put('account.addresses', array_values($addresses));

        return redirect()->route('account.addresses.index')->with('status', 'Address updated in this browser session.');
    }

    public function deleteAddress(string $id)
    {
        $context = $this->accountContext();

        if ($context instanceof RedirectResponse) {
            return $context;
        }

        $addresses = session('account.addresses', []);
        $index = $this->addressIndex($addresses, $id);

        abort_if($index === null, 404, 'Address not found.');

        array_splice($addresses, $index, 1);
        session()->put('account.addresses', array_values($addresses));

        return redirect()->route('account.addresses.index')->with('status', 'Address removed from this browser session.');
    }

    public function settings()
    {
        return $this->accountView('account.settings');
    }

    public function updateSettings(Request $request)
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

        session()->put('account.settings', $settings);

        return back()->with('status', 'Settings saved for this browser session.');
    }

    public function notifications()
    {
        $context = $this->accountContext();

        return $context instanceof RedirectResponse
            ? $context
            : view('account.notifications', $context + [
                'preferences' => session('account.notifications', [
                    'order_updates' => true,
                    'delivery_updates' => true,
                    'new_collections' => false,
                ]),
            ]);
    }

    public function updateNotifications(Request $request)
    {
        $context = $this->accountContext();

        if ($context instanceof RedirectResponse) {
            return $context;
        }

        session()->put('account.notifications', [
            'order_updates' => $request->boolean('order_updates'),
            'delivery_updates' => $request->boolean('delivery_updates'),
            'new_collections' => $request->boolean('new_collections'),
        ]);

        return back()->with('status', 'Notification preferences saved for this browser session.');
    }

    public function deleteAccount()
    {
        return $this->accountView('account.delete');
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
            $response = $api->postWithToken(session('access_token'), '/api/auth/resend-verification', [
                'email' => data_get($context['user'], 'email') ?? data_get($context['user'], 'Email'),
            ]);
        } catch (ConnectionException) {
            return back()->withErrors(['email' => 'The account service is unavailable. Please try again shortly.']);
        }

        if ($response->failed()) {
            return back()->withErrors(['email' => 'We could not send a verification message. The email verification endpoint may not be enabled yet.']);
        }

        return back()->with('status', 'If verification is available, a new message has been sent to your email address.');
    }

    private function accountView(string $view)
    {
        $context = $this->accountContext();

        return $context instanceof RedirectResponse ? $context : view($view, $context);
    }

    private function addressForm(?string $id)
    {
        $context = $this->accountContext();

        if ($context instanceof RedirectResponse) {
            return $context;
        }

        $addresses = session('account.addresses', []);
        $address = null;

        if ($id !== null) {
            $index = $this->addressIndex($addresses, $id);
            abort_if($index === null, 404, 'Address not found.');
            $address = $addresses[$index];
        }

        return view('account.addresses.form', $context + [
            'address' => $address,
            'addressId' => $id,
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

        return [
            'user' => is_array($user) ? array_merge($user, $profile) : $user,
        ];
    }
}
