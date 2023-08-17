<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Viagem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class Main extends Controller
{
    public function login(): view
    {
        $mensagemSucesso = session('mensagem.sucesso');
        $mensagemErro = session('mensagem.erro');

        return view('main.login')
            ->with('mensagemSucesso', $mensagemSucesso)
            ->with('mensagemErro', $mensagemErro);
    }

    public function cadEntregador(): view
    {
        return view('main.cadEntregador');
    }

    public function addPagamentos()
    {
        return view('main.pagamento');
    }

    public function index(Request $request): view
    {
        $mensagemSucesso = session('mensagem.sucesso');
        $mensagemErro = session('mensagem.erro');

        if($request->user() !== null){
            if($request->user()->hasRole('Motorista')) {
                $pedidos = Viagem::with(['produto', 'motorista', 'produto.endereco_Produto'])->where('status', '=', 'Esperando coleta')->get();

                return view('motorista.index')
                    ->with('mensagemSucesso', $mensagemSucesso)
                    ->with('mensagemErro', $mensagemErro)
                    ->with('pedidos', $pedidos);
            }

            return view('main.index')
                ->with('mensagemSucesso', $mensagemSucesso)
                ->with('mensagemErro', $mensagemErro);
        }

        return view('main.inicio')
            ->with('mensagemSucesso', $mensagemSucesso)
            ->with('mensagemErro', $mensagemErro);
    }

    public function solicitar(Request $request)
    {
        if($request->all() != []) $data = $request->all();

        return view('main.solicitar')->with('data', $data ?? null);
    }

    public function pedidos(Request $request): view|RedirectResponse
    {
        $pedidos = Produto::with(['viagem', 'viagem.motorista', 'viagem.motorista.cliente'])
            ->where('cliente_id', '=', $request->user()->id)->orderByDesc('created_at')
            ->get();

        return view('main.pedidos')->with('pedidos', $pedidos);
    }
}
