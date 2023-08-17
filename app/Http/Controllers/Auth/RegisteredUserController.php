<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('main.cadCliente');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'imagem' => 'mimes:jpeg,jpg,png|required|max:10000',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'cpf' => 'required|formato_cpf',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $nomeImagem = uniqid('upload_') . ".jpg";

        $cliente = User::create([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'imagem' => $nomeImagem,
        ]);

        $request->imagem->move(public_path("clientes/{$cliente->id}/img"), $nomeImagem);

        event(new Registered($cliente));

        Auth::login($cliente);

//        return redirect(RouteServiceProvider::HOME);

        return to_route('main.index');
    }
}
