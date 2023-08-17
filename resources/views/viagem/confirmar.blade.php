<x-mainLayout>

    <div class="card p-3 mt-3">
        <form action="{{ route('viagem.confirmar', $viagem) }}" method="post" class="col-12" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- TODO Pensar em um texto melhor --}}
            <label class="mb-2" for="imagem_entrega">Imagem da entrega:</label>
            <input type="file" class="form-control" id="imagem_entrega" name="imagem_entrega" accept="image/*" required>

            <button type="submit" class="mt-3 col-12 btn btn-success">Confirmar</button>
        </form>
    </div>

</x-mainLayout>
