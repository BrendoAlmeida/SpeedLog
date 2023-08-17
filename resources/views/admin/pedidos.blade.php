<x-mainLayout>

    <div class="admin-back-arrow"  style="margin-left: -10%">
        <a href="{{ route('admin.index') }}"><i class="fa-solid fa-arrow-left"></i></a>
    </div>

{{--  TODO Separar pelo status da entrega  --}}

    <div class="d-flex justify-content-center col-12 card p-3 mt-3">
        @if(sizeof($pedidos) > 0)
            <div class="d-flex flex-wrap p-4 col-11 justify-content-center">

                <div class="d-flex justify-content-between col-9 mt-3" onclick="dropdownList('esperandoColeta')">
                    <h2>Esperando coleta</h2>
                    <i class="fa-solid fa-angle-down" style="font-size: 40px;"></i>
                </div>

                <div class="flex-wrap col-12 justify-content-center" style="display: flex" id="esperandoColeta">
                    @php($totalPedidos = 0)
                    @foreach($pedidos as $pedido)
                        @if($pedido->viagem->status == "Esperando coleta")
                            @php($totalPedidos++)
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
                        @endif
                    @endforeach

                    @if($totalPedidos == 0)
                        <h3>Nenhum pedido encontrado!</h3>
                    @endif
                </div>

                <div class="d-flex justify-content-between col-9 mt-3" onclick="dropdownList('viagemAceita')">
                    <h2>Viagem aceita</h2>
                    <i class="fa-solid fa-angle-down" style="font-size: 40px;"></i>
                </div>

                <div class="flex-wrap col-12 justify-content-center" style="display: flex" id="viagemAceita">
                    @php($totalPedidos = 0)
                    @foreach($pedidos as $pedido)
                        @if($pedido->viagem->status == "Viagem aceita")
                            @php($totalPedidos++)
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
                        @endif
                    @endforeach
                    @if($totalPedidos == 0)
                        <h3>Nenhum pedido encontrado!</h3>
                    @endif
                </div>

                <div class="d-flex justify-content-between col-9 mt-3" onclick="dropdownList('entregue')">
                    <h2>Entregue</h2>
                    <i class="fa-solid fa-angle-down" style="font-size: 40px;"></i>
                </div>

                <div class="flex-wrap col-12 justify-content-center" style="display: flex" id="entregue">
                    @php($totalPedidos = 0)
                    @foreach($pedidos as $pedido)
                        @if($pedido->viagem->status == "Entregue")
                            @php($totalPedidos++)
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
                        @endif
                    @endforeach
                    @if($totalPedidos == 0)
                        <h3>Nenhum pedido encontrado!</h3>
                    @endif
                </div>
            </div>
        @else
            <h3 class="m-4 text-center">Nunhum pedido realizado!</h3>
        @endif
    </div>

    <script>
        $('#esperandoColeta').hide();
        $('#viagemAceita').hide();
        $('#entregue').hide();

        function dropdownCard(dropdown) {
            if (dropdown.style.overflow === "hidden") {
                dropdown.style.overflow = "visible";
                dropdown.style.height = "auto";
            } else {
                dropdown.style.overflow = "hidden";
                dropdown.style.height = "89px";
            }
        }

        function dropdownList(id){
            if($('#' + id + ':visible').length)
                $('#' + id).hide();
            else
                $('#' + id).show();
        }
    </script>

</x-mainLayout>
