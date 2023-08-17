<x-mainLayout>

    @isset($mensagemSucesso)
        <div class="alert alert-success m-0 mb-3 mt-3">
            {{ $mensagemSucesso }}
        </div>
    @endisset

    @isset($mensagemErro)
        <div class="alert alert-danger m-0 mb-3 mt-3">
            {{ $mensagemErro }}
        </div>
    @endisset

    <div class="container">
        <div class="row mt-3">
            @if(sizeof($pedidos) > 0)
                @foreach($pedidos as $pedido)
                    <div class="card mb-3 me-2" style="width: calc(33.3333333% - 0.5rem)">
                        <div class="d-flex justify-content-center mt-2">
                            <img class="" src="{{ asset("produtos/{$pedido->produto->id}/img/{$pedido->produto->imagem}") }}" alt="" style="height: 150px">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $pedido->produto->endereco_Produto->bairro }}, {{ $pedido->produto->endereco_Produto->rua }}</h5>
                            <ul>
                                <li>Peso: {{ $pedido->produto->peso }}</li>
                                <li>Tempo até o destino: {{ $pedido->produto->minutos_tempo_entrega }}min</li>
                                <li>Distancia: {{ $pedido->produto->distancia }}km</li>
                            </ul>
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="m-0">R$ {{ number_format($pedido->produto->total, 2, ',', '.') }}</h6>
                                <a href="{{ route('viagem.detalhes', $pedido->id) }}" class="btn btn-primary">Detalhes</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h3 class="mt-3 text-center">Nenhum pedido encontrado!</h3>
            @endif
        </div>
    </div>
</x-mainLayout>
