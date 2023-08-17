<x-layout>

    <div class="d-flex justify-content-center align-items-center flex-column" style="min-height: 100vh">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="m-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
{{-- TODO carregar dados preenchidos antes do erro --}}

        <div class="card p-3 col-5">
            <form method="post" enctype="multipart/form-data">
                @csrf
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name" class="form-control">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control">

                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" class="form-control">

                <label for="password_confirmation">Confirme sua senha:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">

                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" class="form-control">

                <label for="imagem">Sua Foto:</label>
                <input type="file" id="imagem" name="imagem" class="form-control" accept="image/*">

                <button type="submit" class="btn btn-success col-12 mt-2">Continuar</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#cpf').mask('000.000.000-00');
        });
    </script>
</x-layout>

