<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\google2faController;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('main.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $user = User::where("email", '=', $request->email)->first();

        if(Auth::validate(['email' => $request->email, 'password' => $request->password])) {
            if ($user->google2fa_secret != null && $request->google2fa == null) {
                session()->put('email', $request->email);
                session()->put('password', $request->password);
                session()->put('remember', $request->remember);
                return to_route('auth.2fa');
            }

            if ($request->google2fa != null) {
                if (!(new google2faController)->validateCode($user->google2fa_secret, $request->google2fa)) {
                    return to_route('auth.2fa')
                        ->with('mensagem.erro', 'Codigo inválido ou expirado!');
                }
            }
        }

        $request->authenticate();

        $request->session()->regenerate();

        $admin = $request->user()->administrador()->first();
        if (isset($admin)) {
            $request->user()->assignRole('Administrador');
        } else {
            $motorista = $request->user()->motorista()->first();

            if (isset($motorista)) {
                $request->user()->assignRole('Motorista');
            }
        }

        return to_route('main.index');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
