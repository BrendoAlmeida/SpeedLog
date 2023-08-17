<x-mainLayout>

    <div class="d-flex justify-content-center col-12">
        <div class="d-flex flex-wrap p-4 col-11 justify-content-center">
            @if(sizeof($pedidos) > 0)
                @foreach($pedidos as $pedido)
                    <div class="card col-11 col-lg-8 p-3 dropdown_card m-2" id="dropdown_card" style="overflow: hidden; height: 89px" onclick="dropdownCard(this)">
                        <div class="d-flex">
                            <div class="col-11">
                                <h5>Pedido #00{{ $pedido->id }} Status: {{ $pedido->viagem->status }}</h5>
                                <p class="m-0">Data do pedido: {{ date_format($pedido->created_at, "d/m/Y H:i:s") }}</p>
                            </div>

                            <div class="col-1 d-flex justify-content-end align-items-center p-2">
                                <i class="fa-solid fa-angle-down" style="font-size: 40px;"></i>
                            </div>
                        </div>

                        <hr>
                        <div class="d-flex flex-wrap">
                            <div class="d-flex flex-wrap col-12">
                                <img src="
                                    @isset($pedido->viagem->motorista->cliente->imagem)
                                        {{ asset("clientes/{$pedido->viagem->motorista->cliente->id}/img/{$pedido->viagem->motorista->cliente->imagem}") }}
                                    @else
                                        {{ asset('icons/User.png') }}
                                    @endisset
                                " alt="" style="width: 20%">
                                <div class="col-7">
                                    <h5 class="ms-2">{{ $pedido->viagem->motorista->cliente->nome ?? "Esperando coleta" }}</h5>
                                    <p class="m-0 ms-2">Peso R$ {{ $pedido->valor_peso }}</p>
                                    <p class="m-0 ms-2">Distância R$ {{ $pedido->valor_distancia }}</p>
                                    <p class="m-0 ms-2">Deslocamento R$ {{ $pedido->valor_tempo_entrega }}</p>
                                </div>
                                <div class="col-2">
                                    <p>R$ {{ $pedido->total }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h3 class="m-2 text-center">Nunhum pedido realizado!</h3>
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
