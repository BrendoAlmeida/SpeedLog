<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>SpeedLog</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('icons/favicon.png') }}"/>
    <link
        rel="stylesheet"
        type="text/css"
        href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main-cadMotoboy.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util-cadMotoboy.css') }}">
</head>
<body style="background-color: #666666">
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="container">
                <div class="form-outer mt-5">
                    <span class="login100-form-title p-b-43 ">Cadastrar Motoboy</span>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="m-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="" method="post" class="login100-form validate-form" enctype="multipart/form-data">
                        @csrf
                        <div class="page slide-page">
                            <div
                                class="wrap-input100 validate-input"
                                data-validate="Nome Valido Requerido">
                                <input class="input100" type="text" name="name"/>
                                <span class="focus-input100"></span>
                                <span class="label-input100">Nome</span>
                            </div>

                            <div
                                class="wrap-input100 validate-input"
                                data-validate="Email Valido Requerido">
                                <input class="input100" type="email" name="email"/>
                                <span class="focus-input100"></span>
                                <span class="label-input100">Email</span>
                            </div>

                            <div
                                class="wrap-input100 validate-input"
                                data-validate="Senha Valida Requerida">
                                <input class="input100" type="password" name="password"/>
                                <span class="focus-input100"></span>
                                <span class="label-input100">Senha</span>
                            </div>

                            <div
                                class="wrap-input100 validate-input"
                                data-validate="Senha Valida Requerida">
                                <input class="input100" type="password" name="password_confirmation"/>
                                <span class="focus-input100"></span>
                                <span class="label-input100">Confirme sua senha</span>
                            </div>

                            <div
                                class="wrap-input100 validate-input"
                                data-validate="CPF Valido Requerido">
                                <input class="input100" type="text" name="cpf" id="cpf"/>
                                <span class="focus-input100"></span>
                                <span class="label-input100">CPF</span>
                            </div>

                            <div class="field">
                                <div class="">
                                    <label class="" for="imagem">Sua foto</label>
                                    <input class="" type="file" name="imagem" id="imagem" accept="image/*" />
                                </div>
                            </div>

                            <div style="width: 60%">
                                <button type="button" class="firstNext next btn-red">Próximo</button>
                            </div>
                        </div>

                        <div class="page">
                            <div class="title">Fotos:</div>
                            <div class="field">
                                <div>
                                    <div class="label">Frente RG</div>
                                    <label for="frenteRG">Frente RG</label>
                                    <input type="file" name="frenteRG" id="frenteRG" accept="image/*" />
                                </div>
                            </div>

                            <div class="field">
                                <div>
                                    <div class="label">Verso RG</div>
                                    <label for="atrasRG">Verso RG</label>
                                    <input type="file" name="atrasRG" id="atrasRG" accept="image/*" />
                                </div>
                            </div>

                            <div class="field">
                                <div>
                                    <div class="label">Segurando RG</div>
                                    <label for="segurandoRG">Segurando RG</label>
                                    <input type="file" name="segurandoRG" id="segurandoRG" accept="image/*" />
                                </div>
                            </div>

                            <div
                                class="wrap-input100 validate-input"
                                data-validate="Placa Valida Requerida">
                                <input class="input100" type="text" name="placaMoto" id="placa" />
                                <span class="focus-input100"></span>
                                <span class="label-input100">Placa da Moto</span>
                            </div>

                            <div class="field btns" style="width: 157px">
                                <button type="button" class="prev-1 prev btn-red">Anterior</button>
                                <button type="submit" class="next-1 next btn-red">Cadastrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div
                class="login100-more"
                style="background-image: url('{{ asset('icons/bd-cadEntregador.png') }}');">
                <a class="voltar_btn" href="{{ route('login') }}">Voltar</a>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
        integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/input_animate.js') }}"></script>
<script src="{{ asset('js/page-scroll.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#cpf').mask('000.000.000-00');
    });

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
</script>
</body>
</html>
