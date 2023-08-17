<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\Produto;
use App\Models\Viagem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ViagemController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'imagemProduto' => 'mimes:jpg,png',
            'cepOrigem' => 'required|formato_cep',
            'ruaOrigem' => 'required|min:3',
            'bairroOrigem' => 'required|min:3',
            'numeroOrigem' => 'required',
            'cepDestino' => 'required|formato_cep',
            'ruaDestino' => 'required|min:3',
            'bairroDestino' => 'required|min:3',
            'numeroDestino' => 'required',
        ]);

        DB::transaction(function () use($request) {

            $enderecoOrigem = Endereco::create([
                'CEP' => $request->cepOrigem,
                'rua' => $request->ruaOrigem,
                'numero_casa' => $request->numeroOrigem,
                'bairro' => $request->bairroOrigem,
                'complemento' => $request->complementoOrigem
            ]);

            $enderecoDestino = Endereco::create([
                'CEP' => $request->cepDestino,
                'rua' => $request->ruaDestino,
                'numero_casa' => $request->numeroDestino,
                'bairro' => $request->bairroDestino,
                'complemento' => $request->complementoDestino
            ]);

            $dadosEntrega = (new Api)->consultarValor($request);

            $nomeImagem = uniqid('upload_') . ".jpg";

            $produto = Produto::create([
                'endereco_produto' => $enderecoOrigem->id,
                'endereco_entrega' => $enderecoDestino->id,
                'cliente_id' => $request->user()->id,
                'imagem' => $nomeImagem,

                'peso' => $request->peso,
                'valor_peso' => $dadosEntrega['valorPeso'],

                'distancia' => $dadosEntrega['distancia']['valor'],
                'valor_distancia' => $dadosEntrega['distancia']['preco'],

                'minutos_tempo_entrega' => $dadosEntrega['duracao']['tempo'],
                'valor_tempo_entrega' => $dadosEntrega['duracao']['valor'],

                'total' => $dadosEntrega['total'],
            ]);

            $produtoId = $produto->id;

            Viagem::create([
                'produto_id' => $produtoId,
            ]);

            $request->imagemProduto->move(public_path("produtos/$produtoId/img"), $nomeImagem);
        });

        return to_route('main.index')->with('mensagem.sucesso', 'Agendado com sucesso!');
    }

    public function detalhesViagem(int $idViagem): View|RedirectResponse
    {
        $viagem = Viagem::with(['produto', 'produto.endereco_Produto', 'produto.endereco_Entrega'])->find($idViagem);

        if($viagem->motorista_id != null){
            return to_route('main.index');
        }

        return View('viagem.detalhes')->with('viagem', $viagem);
    }

    public function confirmarEntrega(Viagem $viagem, Request $request)
    {
        $request->validate([
            'imagem_entrega' => 'mimes:jpeg,jpg,png|required|max:10000'
        ]);

        if($request->user()->motorista()->first()->id == $viagem->motorista_id && $viagem->status == "Viagem aceita") {
            DB::transaction(function () use ($request, $viagem) {
                $nomeImagem = uniqid('upload_') . ".jpg";

                $viagem->imagem_entrega = $nomeImagem;
                $viagem->status = "Entregue";

                $viagem->save();

                $request->imagem_entrega->move(public_path("viagens/{$viagem->id}/img"), $nomeImagem);
            });

            return to_route('main.index')->with('mensagem.sucesso', "Entrega concluida com sucesso");
        }

        return to_route('main.index')->with('mensagem.erro', "Acesso não autorizado!");
    }
}
