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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pagamento.css') }}">
    <!--===============================================================================================-->
</head>
<body style="background-color: #666666">
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="container">
                <div class="form-outer">
                    <span class="login100-form-title p-b-43" style="padding: 20px 10px;">Cadastrar Cartão</span>

                    <form action="#" class="login100-form validate-form">
                        <div class="page slide-page">
                            <div class="card">
                                <div class="card-content">
                                    <svg id="logo-visa" height="70px"
                                         viewBox="0 0 50 50" width="70px" xml:space="preserve"
                                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g>
                                            <g>
                                                <polygon clip-rule="evenodd" fill="#f4f5f9" fill-rule="evenodd"
                                                         points="17.197,32.598 19.711,17.592 23.733,17.592     21.214,32.598   "></polygon>
                                                <path clip-rule="evenodd"
                                                      d="M35.768,17.967c-0.797-0.287-2.053-0.621-3.596-0.621    c-3.977,0-6.752,2.029-6.776,4.945c-0.023,2.154,1.987,3.358,3.507,4.08c1.568,0.738,2.096,1.201,2.076,1.861    c0,1.018-1.238,1.471-2.395,1.471c-1.604,0-2.455-0.232-3.773-0.787l-0.53-0.248l-0.547,3.348    c0.929,0.441,2.659,0.789,4.462,0.811c4.217,0,6.943-2.012,6.979-5.135c0.025-1.692-1.053-2.999-3.369-4.071    c-1.393-0.685-2.246-1.134-2.246-1.844c0-0.645,0.723-1.306,2.295-1.306c1.314-0.024,2.268,0.271,3.002,0.58l0.365,0.167    L35.768,17.967z"
                                                      fill="#f4f5f9" fill-rule="evenodd"></path>
                                                <path clip-rule="evenodd"
                                                      d="M46.055,17.616h-3.102c-0.955,0-1.688,0.272-2.117,1.24    l-5.941,13.767h4.201c0,0,0.688-1.869,0.852-2.262c0.469,0,4.547,0,5.133,0c0.123,0.518,0.49,2.262,0.49,2.262h3.711    L46.055,17.616 M41.1,27.277c0.328-0.842,1.609-4.175,1.609-4.175c-0.041,0.043,0.328-0.871,0.529-1.43l0.256,1.281    c0,0,0.773,3.582,0.938,4.324H41.1z"
                                                      fill="#f4f5f9" fill-rule="evenodd"></path>
                                                <path clip-rule="evenodd"
                                                      d="M13.843,17.616L9.905,27.842l-0.404-2.076    c-0.948-2.467-2.836-4.634-5.53-6.163l3.564,12.995h4.243l6.312-14.982H13.843z"
                                                      fill="#f4f5f9" fill-rule="evenodd"></path>
                                                <path clip-rule="evenodd"
                                                      d="M7.232,17.174H0.755l-0.037,0.333    c5.014,1.242,8.358,4.237,9.742,7.841l-1.42-6.884C8.798,17.507,8.105,17.223,7.232,17.174L7.232,17.174z"
                                                      fill="#f4f5f9" fill-rule="evenodd"></path>
                                            </g>
                                        </g>
                                    </svg>
                                    <h5>Número do cartão</h5>
                                    <h6 id="label-cardnumber">0000 0000 0000 0000</h6>
                                    <h5>Validade<span>CVC</span></h5>
                                    <h6 id="label-cardexpiration">00 / 00<span>000</span></h6>
                                </div>
                                <div class="wave"></div>
                            </div>

                            <div
                                class="wrap-input100 validate-input"
                                data-validate="Número do cartão Valido Requerido">
                                <input class="input100" type="text" name="numero_cartao" id="numero_cartao" />
                                <span class="focus-input100"></span>
                                <span class="label-input100">Número do cartão</span>
                            </div>

                            <div
                                class="wrap-input100 validate-input"
                                data-validate="Validade Valida Requerida">
                                <input class="input100" type="text" name="data_vencimento" id="data_vencimento" />
                                <span class="focus-input100"></span>
                                <span class="label-input100">Validade</span>
                            </div>

                            <div
                                class="wrap-input100 validate-input"
                                data-validate="CVC Valido Requerido">
                                <input class="input100" type="text" name="CVV" id="CVV" />
                                <span class="focus-input100"></span>
                                <span class="label-input100">Código de Segurança(CVC)</span>
                            </div>

                            <div style="width: 60%">
                                <button type="button" class="firstNext next btn-red">Próximo</button>
                            </div>
                        </div>

                        <div class="page">
                            <div
                                class="wrap-input100 validate-input"
                                data-validate="Nome Valido Requerido">
                                <input class="input100" type="text" name="nome_cliente" id="nome_cliente" />
                                <span class="focus-input100"></span>
                                <span class="label-input100">Nome do Titular</span>
                            </div>
                            <div
                                class="wrap-input100 validate-input"
                                data-validate="CPF Valido Requerido">
                                <input class="input100" type="text" name="CPF" id="CPF" />
                                <span class="focus-input100"></span>
                                <span class="label-input100">CPF do Titular</span>
                            </div>
                            <div class="field btns">
                                <button type="button" class="prev-1 prev btn-red">Anterior</button>
                                <button type="submit" class="btn-red" style="font-size: 17px;">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div
                class="login100-more"
                style="background-image: url('{{ asset('icons/bg-pagamento.jpg') }}');"></div>
        </div>
    </div>
</div>

<script src="{{ asset('js/page-scroll.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
        integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/input_animate.js') }}"></script>
<script>
    $(document).ready(function(){
        $('#CPF').mask('000.000.000-00');
        $('#numero_cartao').mask('0000 0000 0000 0000');
        $('#data_vencimento').mask('00/00');
        $('#CVV').mask('000');
    });
</script>
</body>
</html>
