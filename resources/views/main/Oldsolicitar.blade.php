<x-mainLayout>
    <div class="card p-3 mt-4 mb-4">
        <form action="{{ route('viagem.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h3>Endereço de origem</h3>

            <div class="d-flex justify-content-between">
                <div class="col-3">
                    <label for="cepOrigem" class="mt-2">CEP</label>
                    <input type="text"
                           id="cepOrigem"
                           name="cepOrigem"
                           class="form-control"
                           placeholder="00000-000"
                           value="{{ $data['cepOrigem'] ?? "" }}"
                           onblur="carregarCepOrigem(this.value)"
                           required>
                </div>

                <div class="col-4">
                    <label for="ruaOrigem" class="mt-2">Logradouro</label>
                    <input type="text" id="ruaOrigem" name="ruaOrigem" class="form-control" required>
                </div>

                <div class="col-4">
                    <label for="bairroOrigem" class="mt-2">Bairro</label>
                    <input type="text" id="bairroOrigem" name="bairroOrigem" class="form-control" required>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <div class="col-2">
                    <label for="numeroOrigem" class="mt-2">Número do local</label>
                    <input type="text" id="numeroOrigem" name="numeroOrigem" class="form-control" required>
                </div>

                <div class="col-9">
                    <label for="complementoOrigem" class="mt-2">Complemento</label>
                    <input type="text" id="complementoOrigem" name="complementoOrigem" class="form-control">
                </div>
            </div>

            <hr class="mt-4">

            <h3>Endereço de destino</h3>

            <div class="d-flex justify-content-between">
                <div class="col-3">
                    <label for="cepDestino" class="mt-2">CEP</label>
                    <input type="text"
                           id="cepDestino"
                           name="cepDestino"
                           class="form-control"
                           placeholder="00000-000"
                           value="{{ $data['cepDestino'] ?? "" }}"
                           onblur="carregarCepDestino(this.value)"
                           required>
                </div>

                <div class="col-4">
                    <label for="ruaDestino" class="mt-2">Logradouro</label>
                    <input type="text" id="ruaDestino" name="ruaDestino" class="form-control" required>
                </div>

                <div class="col-4">
                    <label for="bairroDestino" class="mt-2">Bairro</label>
                    <input type="text" id="bairroDestino" name="bairroDestino" class="form-control" required>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <div class="col-2">
                    <label for="numeroDestino" class="mt-2">Número do local</label>
                    <input type="text" id="numeroDestino" name="numeroDestino" class="form-control" required>
                </div>

                <div class="col-9">
                    <label for="complementoDestino" class="mt-2">Complemento</label>
                    <input type="text" id="complementoDestino" name="complementoDestino" class="form-control">
                </div>
            </div>

            <hr class="mt-4">

            <h3>Informações do produto</h3>

            <label for="peso" class="mt-2">Peso do produto</label>
            <input type="number"
                   id="peso"
                   name="peso"
                   class="form-control"
                   value="{{ $data['peso'] ?? "" }}"
                   required>

            <label for="imagemProduto" class="mt-2">Imagem do produto</label>
            <input type="file" id="imagemProduto" name="imagemProduto" accept="image/*" class="form-control" required>

            <button class="btn btn-success col-12 mt-3">Solicitar!</button>
        </form>
    </div>

    <script>
        $(document).ready(function(){
            $('#cepOrigem').mask('00000-000');
            $('#cepDestino').mask('00000-000');

            @isset($data['cepOrigem'])

            carregarCepOrigem($('#cepOrigem').val());
            carregarCepDestino($('#cepDestino').val());

            @endisset
        });

        function carregarCepOrigem(Cep){
            $.post('{{ route('api.consultarEndereco') }}', {
                cep : Cep,
                _token : '{{ csrf_token() }}'
            }, function (data){
                $('#ruaOrigem').val(data['logradouro']);
                $('#bairroOrigem').val(data['bairro']);
            });
        }

        function carregarCepDestino(Cep){
            $.post('{{ route('api.consultarEndereco') }}', {
                cep : Cep,
                _token : '{{ csrf_token() }}'
            }, function (data){
                $('#ruaDestino').val(data['logradouro']);
                $('#bairroDestino').val(data['bairro']);
            });
        }
    </script>
</x-mainLayout>
