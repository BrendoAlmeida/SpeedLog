<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Info_Entrega;
use App\Models\Info_peso;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdministradorController extends Controller
{
    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'chave_admin' => 'required'
        ]);

        $admin = Administrador::where('cliente_id', '=', $request->user()->id)->first();

        if (Hash::check($request->chave_admin, $admin->chave_admin ?? "")) {
            session()->put('adminLogado', true);
            return to_route('admin.index');
        }

        session()->forget('adminLogado');
        return to_route('main.index');
    }

    public function index(): View|RedirectResponse
    {
        return view('admin.index');
    }

    public function pedidos(): View|RedirectResponse
    {
        $pedidos = Produto::with(['viagem', 'viagem.motorista', 'viagem.motorista.cliente'])->orderByDesc('created_at')->get();

        return view('admin.pedidos')->with('pedidos', $pedidos);
    }

    public function valor()
    {
        return view('admin.valor')
            ->with('infoEntregas', Info_Entrega::first())
            ->with('infoPesos', Info_peso::all());
    }

    public function editarValorPeso(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => 'required|numeric',
            'min_peso' => 'required|numeric',
            'max_peso' => 'required|numeric',
        ]);

        $info = Info_peso::find($request->id);

        if ($info == null) return to_route('admin.valor');

        $info->min_peso = $request->min_peso;
        $info->max_peso = $request->max_peso;
        $info->preco = $request->preco;
        $info->save();

        return to_route('admin.valor');
    }

    public function editarPrecoKM(Request $request): RedirectResponse
    {
        $request->validate([
            'valor_distancia' => 'required|numeric',
        ]);

        $info = Info_Entrega::first();

        if ($info == null) return to_route('admin.valor');

        $info->valor_distancia = $request->valor_distancia;
        $info->save();

        return to_route('admin.valor');
    }

    public function editarPrecoTempo(Request $request): RedirectResponse
    {
        $request->validate([
            'valor_tempo_dislocamento' => 'required|numeric',
        ]);

        $info = Info_Entrega::first();

        if ($info == null) return to_route('admin.valor');

        $info->valor_tempo_dislocamento = $request->valor_tempo_dislocamento;
        $info->save();

        return to_route('admin.valor');
    }

    public function gerenciarAdmin(Request $request): View
    {
        $admins = Administrador::with('Cliente')->whereHas('Cliente', function ($query) use($request) {
            $query->where('name', 'like', "%{$request->s}%")
                ->orWhere('cpf', 'like', "%{$request->s}%")
                ->orWhere('email', 'like', "%{$request->s}%");
        })->get();

        return view('admin.gerenciarAdmin')
            ->with('admins', $admins)
            ->with('s', $request->s);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'cpf' => 'required|formato_cpf',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'chave_admin' => ['required', 'confirmed', Rules\Password::defaults()],
            'imagem' => 'mimes:jpeg,jpg,png|required|max:10000',
        ]);

        DB::transaction(function () use($request) {
            $nomeImagem = uniqid('upload_') . ".jpg";

            $cliente = User::create([
                'name' => $request->name,
                'cpf' => $request->cpf,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'imagem' => $nomeImagem,
            ]);

            Administrador::create([
                'cliente_id' => $cliente->id,
                'chave_admin' => Hash::make($request->chave_admin),
            ]);

            $request->imagem->move(public_path("clientes/{$cliente->id}/img"), $nomeImagem);
        });

        return to_route('admin.gerenciarAdmin');
    }
}
