<x-mainLayout>
    <div class="admin-back-arrow" style="margin-left: -10%" >
        <a href="{{ route('admin.index') }}"><i class="fa-solid fa-arrow-left"></i></a>
    </div>
    <div class="d-flex justify-content-center card p-3 mt-3 flex-row">

        <div class="row mt-5 col-10">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Peso min</th>
                    <th scope="col">Peso max</th>
                    <th scope="col">Preço</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($infoPesos as $infoPeso)
                    <tr>
                        <td>{{ number_format($infoPeso->min_peso, 2, ',', '.') }}</td>
                        <td>{{ number_format($infoPeso->max_peso, 2, ',', '.') }}</td>
                        <td>R$ {{ number_format($infoPeso->preco, 2, ',', '.') }}</td>
                        <td>
                            <button class="btn" data-bs-toggle="modal" data-bs-target="#editarPeso" onclick="selecionarPeso({{ $infoPeso->id }}, {{ $infoPeso->min_peso }}, {{ $infoPeso->max_peso }}, {{ $infoPeso->preco }})"><i class="fa-regular fa-pen-to-square"></i></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-between p-2">
                <div class="d-flex align-items-center">
                    <h6 class="m-0">Preço por km: R$ {{ number_format($infoEntregas->valor_distancia, 2, ',', '.') }}</h6>
                    <button class="btn ms-2" data-bs-toggle="modal" data-bs-target="#editarPrecoKM"><i class="fa-regular fa-pen-to-square"></i></button>
                </div>
                <div class="d-flex align-items-center">
                    <h6 class="m-0">Preço por minutos em transito: R$ {{ number_format($infoEntregas->valor_tempo_dislocamento, 2, ',', '.') }}</h6>
                    <button class="btn ms-2" data-bs-toggle="modal" data-bs-target="#editarPrecoTempoDislocamento"><i class="fa-regular fa-pen-to-square"></i></button>
                </div>
            </div>
        </div>
    </div>


    {{--  Modal Editar Peso  --}}
    <div class="modal fade" id="editarPeso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar peso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route("admin.editarPeso") }}" method="post">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="id_peso">
                        <label for="min_peso">Peso min:</label>
                        <input type="text" name="min_peso" id="min_peso" class="form-control" required>

                        <label for="max_peso">Peso max:</label>
                        <input type="text" name="max_peso" id="max_peso" class="form-control" required>

                        <label for="preco">Preço:</label>
                        <input type="text" name="preco" id="preco" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Alterar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--  Modal Editar Preco por KM  --}}
    <div class="modal fade" id="editarPrecoKM" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar preço por KM</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route("admin.editarPrecoKM") }}" method="post">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <label for="valor_distancia">Preço por KM:</label>
                        <input type="text" name="valor_distancia" id="valor_distancia" class="form-control" value="{{ $infoEntregas->valor_distancia }}" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Alterar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--  Modal Editar Peso  --}}
    <div class="modal fade" id="editarPrecoTempoDislocamento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar peso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route("admin.editarPrecoTempo") }}" method="post">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <label for="valor_tempo_dislocamento">Preço por min:</label>
                        <input type="text" name="valor_tempo_dislocamento" id="valor_tempo_dislocamento" class="form-control" value="{{ $infoEntregas->valor_tempo_dislocamento }}" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Alterar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function selecionarPeso(peso, minPeso, maxPeso, preco){
            $('#min_peso').val(minPeso);
            $('#max_peso').val(maxPeso);
            $('#preco').val(preco);
            $('#id_peso').val(peso);
        }
    </script>
</x-mainLayout>
