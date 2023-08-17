<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PragmaRX\Google2FAQRCode\Google2FA;

class google2faController extends Controller
{
    public function index(Request $request)
    {
        $mensagemErro = session('mensagem.erro');

        return view('auth.2fa', [
            'email' => session('email'),
            'password' => session("password"),
            'remember' => session('remember'),
            'mensagemErro' => $mensagemErro
        ]);
    }

    public function validateCode(string $authKey, string $code)
    {
        $google2fa = new Google2FA();
        return $google2fa->verifyKey($authKey, $code);
    }
}
