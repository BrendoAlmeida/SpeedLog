<x-layout>

    <form method="post" enctype="multipart/form-data">
        <div class="d-flex justify-content-center align-items-center flex-column" style="min-height: 100vh">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @csrf
            <div class="card p-3 col-5" id="cad">
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

                <button type="button" class="btn btn-success col-12 mt-2" onclick="continuar()">Continuar</button>
            </div>

            <div class="card p-3 col-5" id="verifCad">
                <label for="frenteRG" class="mt-3 mb-1">Foto frontal do RG:</label>
                <input type="file" id="frenteRG" name="frenteRG" class="form-control" accept="image/*">

                <label for="atrasRG" class="mt-3 mb-1">Foto atras do RG:</label>
                <input type="file" id="atrasRG" name="atrasRG" class="form-control" accept="image/*">

                <label for="segurandoRG" class="mt-3 mb-1">Foto segurando o RG ao lado do rosto:</label>
                <input type="file" id="segurandoRG" name="segurandoRG" class="form-control" accept="image/*">

                <label for="placaMoto" class="mt-3 mb-1">Placa da moto:</label>
                <input type="text" name="placaMoto" id="placa" class="form-control">

                <button type="submit" class="btn btn-success col-12 mt-2">Continuar</button>
            </div>
        </div>
    </form>

    <script>
        $('#verifCad').hide();

        function continuar() {
            $('#cad').hide();
            $('#verifCad').show()
        }
        $(document).ready(function(){
            $('#cpf').mask('999.999.999-99', {reverse: true});

            $('#placa').mask('SSS-0000', {
                translation: {
                    'S': {
                        pattern: /[A-Za-z]/,
                        optional: false
                    }
                },
                onKeyPress: function(value, event) {
                    event.currentTarget.value = value.toUpperCase();
                },
                onChange: function(value) {
                    if (value.length > 7) {
                        $('#placa').mask('SSS0S00');
                    }
                }
            });
        });
    </script>
</x-layout>
