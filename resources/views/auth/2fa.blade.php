<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login SpeedLog</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>SpeedLog</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('icons/favicon.png') }}"/>

    <link
        rel="stylesheet"
        type="text/css"
        href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pagamento.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
    <!--===============================================================================================-->
</head>
<body style="background-color: #666666">
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="post" action="{{ route('login') }}">
                @csrf
                <input type="hidden" name="email" value="{{ $email }}">
                <input type="hidden" name="password" value="{{ $password }}">
                <input type="hidden" name="remember" value="{{ $remember }}">
                <span class="login100-form-title p-b-43 mt-5"> Login </span>

                @isset($mensagemErro)
                    <div class="alert alert-danger m-0 mb-3 col-12">
                        {{ $mensagemErro }}
                    </div>
                @endisset

                <div
                    class="wrap-input101 validate-input"
                    data-validate="Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="google2fa" />
                    <span class="focus-input100"></span>
                    <span class="label-input100">Codigo de verificação</span>
                </div>
                <x-input-error :messages="$errors->get('google2fa')" class="mt-2"/>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">Login</button>
                </div>

                <div class="text-center p-t-46 p-b-20">
                    <span class="txt2"> Contatos </span>
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

            <div
                class="login100-more"
                style="background-image: url('{{ asset('icons/bg-login.jpg') }}')"></div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
        integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/input_animate.js') }}"></script>
</body>
</html>
