<x-mainLayout>
    <div class="row mt-3">
        <div class="col-5 p-3 card me-3">
            <h1>Pedidos</h1>
            <a href="{{ route("admin.pedidos") }}" class="btn btn-primary">Pedidos</a>
        </div>

        <div class="col-5 p-3 card me-3">
            <h1>Gerenciar valores</h1>
            <a class="btn btn-primary" href="{{ route("admin.valor") }}">Gerenciar valores</a>
        </div>

        <div class="col-5 p-3 card me-3 mt-2">
            <h1>Gerenciar administrador</h1>
            <a class="btn btn-primary" href="{{ route("admin.gerenciarAdmin") }}">Gerenciar valores</a>
        </div>
    </div>
</x-mainLayout>
