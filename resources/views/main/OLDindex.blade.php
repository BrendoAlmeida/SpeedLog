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

    <div class="card p-3 mt-3">
        <form method="post" id="info" action="{{ route('main.solicitarEntrega') }}">
            <h3>Simule uma entrega</h3>
            @csrf

            <label for="cepOrigem" class="mt-2">CEP de origem</label>
            <div class="d-flex">
                <input type="text" id="cepOrigem" name="cepOrigem" class="form-control" required>
                <button type="button" class="btn" onclick="getLocalizacao()" style="font-size: 20px" title="Usar localização atual"><i
                        class="fa-solid fa-location-dot"></i></button>
            </div>
            <label for="cepDestino" class="mt-2">CEP de destino</label>
            <input type="text" id="cepDestino" name="cepDestino" class="form-control" required>

            <label for="peso" class="mt-2">Peso</label>
            <input type="number" id="peso" name="peso" class="form-control" required>
        </form>

        <button class="btn btn-success mt-3" onclick="calcularValor()">Simular!</button>

        <p class="text-center mt-2 mb-0" id="erro" style="color: red">Peso ou cep inválido</p>
    </div>

    <div class="modal fade" id="simulado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Simulado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Valor pelo peso: R$ <span id="valorPeso">0.00</span></p>
                    <p>Valor pelo distância: R$ <span id="valorDistancia">0.00</span></p>
                    <p>Valor pelo tempo de dislocamento: R$ <span id="valorDislocamento">0.00</span></p>
                    <p>Valor total: R$ <span id="valorTotal">0.00</span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" onclick="solicitar()">Solicitar entrega</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="erroModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Erro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="strErro">Preencha os compos de destino e peso!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var options = {
            enableHighAccuracy: true,
            timeout: 5000,
            maximumAge: 0
        };

        $('#erro').hide();

        function success(pos) {
            var crd = pos.coords;

            if ($('#cepDestino').val() === ""){
                $('#strErro').html("Preencha os compos de destino e peso!");
                $('#erroModal').modal('show');
                return;
            }

            calcularValor(crd.latitude + "," + crd.longitude);
        }

        function error(err) {
            console.warn('ERROR(' + err.code + '): ' + err.message);
            return null;
        }

        function getLocalizacao() {
            navigator.geolocation.getCurrentPosition(success, error, options);
        }

        $(document).ready(function () {
            $('#cepOrigem').mask('00000-000');
            $('#cepDestino').mask('00000-000');
            $('#erro').hide()
        });

        function calcularValor(origem = $('#cepOrigem').val()) {
            if(origem === "" || $('#peso').val() === "" || $('#cepDestino').val() === ""){
                $('#strErro').html("Preencha todos os campos");
                $('#erroModal').modal('show');
                return;
            }

            $.post('{{ route('api.consultarValor') }}', {
                cepOrigem: origem,
                cepDestino: $('#cepDestino').val(),
                peso: $('#peso').val(),
                _token: '{{ csrf_token() }}'
            }, function (data) {
                if (typeof data !== 'object') {
                    $('#erro').show();
                    return;
                }

                $('#erro').hide();
                $('#valorPeso').html(data['valorPeso']);
                $('#valorDistancia').html(data['distancia']['preco']);
                $('#valorDislocamento').html(data['duracao']['valor']);
                $('#valorTotal').html(data['total']);

                $('#simulado').modal('show');
            });
        }

        function solicitar() {
            $('#info').submit();
        }
    </script>
</x-mainLayout>
