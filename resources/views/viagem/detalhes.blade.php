<x-mainLayout>

    <div class="d-flex col-12 mt-3 justify-content-between align-items-start flex-wrap">
        <div class="card p-3 col-md-7 col-12">
            <div class="d-flex justify-content-center col-12">
                <img style="height: 400px" src="{{ asset("produtos/{$viagem->produto->id}/img/{$viagem->produto->imagem}") }}" alt="">
            </div>
            <div>
                <hr class="mt-4">
                <h2 style="font-size: 23px; font-weight: bold;">Endereço de coleta:</h2>
                <p>
                    {{ $viagem->produto->endereco_Produto->CEP }},
                    {{ $viagem->produto->endereco_Produto->rua }},
                    {{ $viagem->produto->endereco_Produto->numero_casa }},
                    {{ $viagem->produto->endereco_Produto->bairro }}
                    @isset($viagem->produto->endereco_Produto->complemento)
                        , {{ $viagem->produto->endereco_Produto->complemento }}
                    @endisset
                </p>
            </div>
            <div>
                <hr>
                <h2 style="font-size: 23px; font-weight: bold;">Endereço de entrega:</h2>
                <p>
                    {{ $viagem->produto->endereco_Entrega->CEP }},
                    {{ $viagem->produto->endereco_Entrega->rua }},
                    {{ $viagem->produto->endereco_Entrega->numero_casa }},
                    {{ $viagem->produto->endereco_Entrega->bairro }}
                    @isset($viagem->produto->endereco_Entrega->complemento)
                        , {{ $viagem->produto->endereco_Entrega->complemento }}
                    @endisset
                </p>
            </div>
        </div>

        <div class="card p-3 col-md-4 col-12 mt-sm-2 mt-md-0">
            <a class="btn btn-outline-success" href="{{ route('main.aceitarEntrega', $viagem->id) }}">Aceitar entrega</a>
            <p class="text-center">Ao aceitar a entrega, você concorda com os <a href="#" class="text-decoration-none"> termos de provacidade</a> e <a href="#" class="text-decoration-none">condições de uso</a></p>
            <hr>
            <div class="p-2">
                <h2 style="font-size: 23px; font-weight: bold;">Resumo da entrega:</h2>
                <div class="d-flex justify-content-between">
                    <p>Peso: </p>
                    <p>
                        R$ {{ number_format($viagem->produto->valor_peso, 2, ',', '.') }}
                    </p>
                </div>

                <div class="d-flex justify-content-between">
                    <p>Distancia: </p>
                    <p>
                        R$ {{ number_format($viagem->produto->valor_distancia, 2, ',', '.') }}
                    </p>
                </div>

                <div class="d-flex justify-content-between">
                    <p>Distancia: </p>
                    <p>
                        R$ {{ number_format($viagem->produto->valor_distancia, 2, ',', '.') }}
                    </p>
                </div>

                <div class="d-flex justify-content-between">
                    <p class="m-0">Tempo: </p>
                    <p class="m-0">
                        R$ {{ number_format($viagem->produto->valor_tempo_entrega, 2, ',', '.') }}
                    </p>
                </div>

                <hr>
                <div class="d-flex justify-content-between">
                    <p class="m-0">Total com desconto: </p>
                    <p class="m-0">
                        R$ {{ number_format($viagem->produto->total * 0.70, 2, ',', '.') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

</x-mainLayout>
