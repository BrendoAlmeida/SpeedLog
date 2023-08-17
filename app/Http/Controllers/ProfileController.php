<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use PragmaRX\Google2FAQRCode\Google2FA;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        if($request->user()->google2fa_secret === null) {
            $google2fa = new Google2FA();

            $key = $google2fa->generateSecretKey();

            $qrCodeUrl = $google2fa->getQRCodeInline(
                "SpeedLog",
                $request->user()->email,
                $key
            );

            return view('profile.edit', [
                'user' => $request->user(),
                'qrCode' => $qrCodeUrl,
                'key' => $key,
            ]);
        }
        return view('profile.edit', [
            'user' => $request->user(),
        ]);

        // TODO alterar 2fa
    }

    public function add2af(Request $request)
    {
        $google2fa = new Google2FA();

        if($google2fa->verifyKey($request->key, $request->google2fa_secret)){
            $request->user()->google2fa_secret = $request->key;

            $request->user()->save();

            return to_route('profile.edit');
        };
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
