<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SpeedLog</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('icons/favicon.png') }}"/>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link
        rel="stylesheet"
        type="text/css"
        href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pagamento.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
</head>
<body style="background-color: #666666;">

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="post" enctype="multipart/form-data">
                @csrf
                <span class="login100-form-title p-b-43 mt-5">Cadastrar Cliente</span>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="m-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="wrap-input100 validate-input colfull" data-validate = "Requer nome">
                    <input class="input100" type="text" name="name">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Nome</span>
                </div>

                <div class="wrap-input100 validate-input colfull" data-validate = "Requer email valido: ex@abc.xyz">
                    <input class="input100" type="text" name="email">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Email</span>
                </div>

                <div class="wrap-input100 validate-input colfull" data-validate="Requer senha">
                    <input class="input100" type="password" name="password">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Senha</span>
                </div>

                <div class="wrap-input100 validate-input colfull" data-validate="Requer confirmação da senha">
                    <input class="input100" type="password" name="password_confirmation">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Confirme sua senha</span>
                </div>

                <div class="wrap-input100 validate-input colfull" data-validate="Requer CPF valido 000.000.000-00">
                    <input class="input100" type="text" name="cpf" id="cpf">
                    <span class="focus-input100"></span>
                    <span class="label-input100">CPF</span>
                </div>

                <div class="field">
                    <div class="d-flex justify-content-end col-12">
                        <label class="col-6" for="imagem">Sua foto</label>
                        <input class="col-6" type="file" name="imagem" id="imagem" accept="image/*" />
                    </div>
                </div>

                <div class="flex-sb-m w-full p-t-3 p-b-32"></div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Cadastrar
                    </button>
                </div>

                <div class="text-center p-t-46 p-b-20">
                    <span class="txt2">
                        Contatos
                    </span>
                </div>

                <div class="login100-form-social flex-c-m">
                    <a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
                        <i class="fa fa-facebook-f" aria-hidden="true"></i>
                    </a>

                    <a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                </div>
            </form>

            <div class="login100-more" style="background-image: url('{{ asset("icons/bg-cadCliente.jpg") }}');">
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
<script>
    $(document).ready(function(){
        $('#cpf').mask('000.000.000-00');
    });
</script>
</body>
</html>
