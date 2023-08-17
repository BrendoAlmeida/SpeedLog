<x-mainLayout>

    <div class="d-flex justify-content-center col-12">
        <div class="d-flex flex-wrap p-4 col-11 justify-content-center">
            @if(sizeof($viagens) > 0)
                @foreach($viagens as $viagem)
                    <div class="card col-11 col-lg-8 p-3 dropdown_card m-2" id="dropdown_card_{{ $viagem->id }}" style="overflow: hidden; height: 89px">
                        <div class="d-flex">
                            <div class="col-11">
                                <h5>Pedido #00{{ $viagem->id }} Status: {{ $viagem->status }}</h5>
                                <p class="m-0">Data do pedido: {{ date_format($viagem->produto->created_at, "d/m/Y H:i:s") }}</p>
                            </div>

                            <div class="col-1 d-flex justify-content-end align-items-center p-2" onclick="dropdownCard(document.getElementById('dropdown_card_{{ $viagem->id }}'))">
                                <i class="fa-solid fa-angle-down" style="font-size: 40px;"></i>
                            </div>
                        </div>

                        <hr>
                        <div class="d-flex flex-wrap">
                            <div class="d-flex flex-wrap col-12">
                                <div class="col-5">
                                    <p class="m-0 ms-2">Peso: R$ {{ $viagem->produto->valor_peso }}</p>
                                    <p class="m-0 ms-2">Distância: R$ {{ $viagem->produto->valor_distancia }}</p>
                                    <p class="m-0 ms-2">Deslocamento: R$ {{ $viagem->produto->valor_tempo_entrega }}</p>
                                    <p class="m-0 ms-2 mb-5">Total: R$ {{ $viagem->produto->total }}</p>

                                    @if($viagem->status == "Viagem aceita")
                                        <a class="btn btn-primary" href="{{ route('entregador.conformaEntrega', $viagem->id) }}">Confirmar entrega</a>
                                    @endif
                                </div>
                                <div class="col-7">
                                    <h2 style="font-size: 17px; font-weight: bold;">Endereço de entrega:</h2>
                                    <p>
                                        {{ $viagem->produto->endereco_Entrega->CEP }},
                                        {{ $viagem->produto->endereco_Entrega->rua }},
                                        {{ $viagem->produto->endereco_Entrega->numero_casa }},
                                        {{ $viagem->produto->endereco_Entrega->bairro }}
                                        @isset($viagem->produto->endereco_Entrega->complemento)
                                            , {{ $viagem->produto->endereco_Entrega->complemento }}
                                        @endisset
                                    </p>

                                    <h2 style="font-size: 17px; font-weight: bold;">Endereço de coleta:</h2>
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
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h3 class="m-2 text-center">Nunhuma viagem realizada!</h3>
            @endif
        </div>
    </div>

    <script>
        function dropdownCard(dropdown) {
            if (dropdown.style.overflow === "hidden") {
                dropdown.style.overflow = "visible";
                dropdown.style.height = "auto";
            } else {
                dropdown.style.overflow = "hidden";
                dropdown.style.height = "89px";
            }
        }
    </script>

</x-mainLayout>
