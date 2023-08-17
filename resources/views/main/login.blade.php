<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login SpeedLog</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
                <span class="login100-form-title p-b-43 mt-5"> Login </span>

                <div
                    class="wrap-input101 validate-input"
                    data-validate="Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" />
                    <span class="focus-input100"></span>
                    <span class="label-input100">Email</span>
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>

                <div
                    class="wrap-input101 validate-input"
                    data-validate="Password is required">
                    <input class="input100" type="password" name="password" />
                    <span class="focus-input100"></span>
                    <span class="label-input100">Password</span>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2"/>

                <input id="remember_me" type="checkbox"
                       class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                       name="remember">
                <span class="ml-2" style="color: #727272;">{{ __('Remember me') }}</span>

                <div class="flex-sb-m w-full p-t-3 p-b-32">
                    <div>
                        <a href="{{ route("main.cadCliente") }}" class="txt1">
                            Cadastrar Usúario
                        </a>
                        <br />
                        <a href="{{ route("main.cadEntregador") }}" class="txt1">
                            Cadastrar Motoboy
                        </a>
                    </div>
                </div>

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
