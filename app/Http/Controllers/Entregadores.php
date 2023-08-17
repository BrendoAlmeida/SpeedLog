<?php

namespace App\Http\Controllers;

use App\Models\Motorista;
use App\Models\User;
use App\Models\Viagem;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Validation\Rules;

class Entregadores extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'cpf' => 'required|formato_cpf',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'imagem' => 'mimes:jpeg,jpg,png|required|max:10000',
            'frenteRG' => 'mimes:jpeg,jpg,png|required|max:10000',
            'atrasRG' => 'mimes:jpeg,jpg,png|required|max:10000',
            'segurandoRG' => 'mimes:jpeg,jpg,png|required|max:10000',
        ]);

        $cliente = DB::transaction(function () use($request) {

            $nomeImagem = uniqid('upload_') . ".jpg";

            $cliente = User::create([
                'name' => $request->name,
                'cpf' => $request->cpf,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'imagem' => $nomeImagem,
            ]);

            $frenteRG = uniqid('upload_') . ".jpg";
            $atrasRG = uniqid('upload_') . ".jpg";
            $segurandoRG = uniqid('upload_') . ".jpg";

            $motorista = Motorista::create([
                'cliente_id' => $cliente->id,
                'frenteRG' => $frenteRG,
                'atrasRG' => $atrasRG,
                'segurandoRG' => $segurandoRG,
                'placaMoto' => $request->placaMoto,
            ]);

            $request->imagem->move(public_path("clientes/{$cliente->id}/img"), $nomeImagem);

            $request->frenteRG->move(public_path("motoristas/{$motorista->id}/validacao"), $frenteRG);
            $request->atrasRG->move(public_path("motoristas/{$motorista->id}/validacao"), $atrasRG);
            $request->segurandoRG->move(public_path("motoristas/{$motorista->id}/validacao"), $segurandoRG);

            return $cliente;
        });

        event(new Registered($cliente));

        Auth::login($cliente);

        $request->user()->assignRole('Motorista');

        return to_route('main.index');
    }

    public function aceitarEntrega(Viagem $viagem, Request $request): RedirectResponse
    {
        if($viagem->motorista_id != null){
            return to_route('main.index')->with('mensagem.erro', 'A viagem já foi selecionado por outro entregador!');
        }

        $viagem->motorista_id = $request->user()->motorista()->first()->id;
        $viagem->status = "Viagem aceita";
        $viagem->save();

        return to_route('main.index');
    }

    public function entregas(Request $request): View|RedirectResponse
    {
        $viagens = Viagem::with(['produto', 'produto.endereco_Produto', 'produto.endereco_Entrega'])
            ->where('motorista_id', '=', $request->user()->motorista()->first()->id)->orderByDesc('created_at')
            ->get();

        return view('motorista.entregas')->with('viagens', $viagens);
    }

    public function confirmarEntrega(int $idViagem, Request $request): View|RedirectResponse
    {
        $viagem = Viagem::find($idViagem);

        if($request->user()->motorista()->first()->id == $viagem->motorista_id && $viagem->status == "Viagem aceita") {
            return view('viagem.confirmar')->with('viagem', $idViagem);
        }

        return to_route('main.index')->with('mensagem.erro', "Acesso não autorizado!");
    }
}
