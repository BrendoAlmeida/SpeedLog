<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <title>SpeedLog</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('icons/favicon.png') }}"/>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8d38f37e6f.js" crossorigin="anonymous"></script>

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/cadEntrega.css')}}" rel="stylesheet">

    <style>
        .colfull {
            width: 100% !important;
        }

        element.style {
            width: 22% !important;
            margin-left: auto;
            margin-right: auto;
        }

        h4 {
            color: #7b7a85;
        }

        .wrap-input100 {
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            flex-wrap: wrap;
            align-items: flex-end;
            width: 60%;
            height: 80px;
            position: relative;
            border: 1px solid #858282;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .bg-hero {
            background: url({{ asset('icons/bg-primary.png') }});
            background-size: contain;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>

</head>
<body>

<x-navbar/>

<!-- Hero Start -->
<header style=" height: 950px; ">
    <div class="container-fluid bg-primary  bg-hero" style="height: 100%;">
        <div class="container ">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start"
                     style="width: 100%; margin-left: auto ;margin-right: auto;">

                    <br>
                    <div
                        style="background-color: rgb(247, 247, 247); padding: 15px 40px 50px 40px;  border-radius: 10px; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; height: 700px; ">
                    <span class="login100-form-title p-b-43">
                      Entregas Anteriores
                    </span>
                        <div class="col-12 d-flex justify-content-center flex-wrap">
                            @if(sizeof($viagens) > 0)
                                @foreach($viagens as $viagem)
                                    <div class="card col-11 col-lg-8 p-3 dropdown_card m-2" id="dropdown_card_{{ $viagem->id }}" style="overflow: hidden; height: 89px">
                                        <div class="d-flex">
                                            <div class="col-11">
                                                <h5>Pedido #00{{ $viagem->id }} Status: {{ $viagem->status }}</h5>
                                                <p class="m-0">Data do pedido: {{ date_format($viagem->produto->created_at, "d/m/Y H:i:s") }}</p>
                                            </div>

                                            <div class="col-1 d-flex justify-content-end align-items-center p-2" onclick="dropdownCard(document.getElementById('dropdown_card_{{ $viagem->id }}'))">
                                                <i class="fa-solid fa-angle-down" style="font-size: 40px;"></i>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="d-flex flex-wrap">
                                            <div class="d-flex flex-wrap col-12">
                                                <div class="col-md-5 col-12">
                                                    <p class="m-0 ms-2">Peso: R$ {{ $viagem->produto->valor_peso }}</p>
                                                    <p class="m-0 ms-2">Distância: R$ {{ $viagem->produto->valor_distancia }}</p>
                                                    <p class="m-0 ms-2">Deslocamento: R$ {{ $viagem->produto->valor_tempo_entrega }}</p>
                                                    <p class="m-0 ms-2 mb-md-5 mb-sm-1">Total: R$ {{ $viagem->produto->total }}</p>

                                                    @if($viagem->status == "Viagem aceita")
                                                        <a class="btn btn-primary" href="{{ route('entregador.conformaEntrega', $viagem->id) }}">Confirmar entrega</a>
                                                    @endif
                                                </div>
                                                <div class="col-md-7 col-12 mt-sm-3 mt-md-0">
                                                    <h2 style="font-size: 17px; font-weight: bold;">Endereço de entrega:</h2>
                                                    <p>
                                                        {{ $viagem->produto->endereco_Entrega->CEP }},
                                                        {{ $viagem->produto->endereco_Entrega->rua }},
                                                        {{ $viagem->produto->endereco_Entrega->numero_casa }},
                                                        {{ $viagem->produto->endereco_Entrega->bairro }}
                                                        @isset($viagem->produto->endereco_Entrega->complemento)
                                                            , {{ $viagem->produto->endereco_Entrega->complemento }}
                                                        @endisset
                                                    </p>

                                                    <h2 style="font-size: 17px; font-weight: bold;">Endereço de coleta:</h2>
                                                    <p>
                                                        {{ $viagem->produto->endereco_Produto->CEP }},
                                                        {{ $viagem->produto->endereco_Produto->rua }},
                                                        {{ $viagem->produto->endereco_Produto->numero_casa }},
                                                        {{ $viagem->produto->endereco_Produto->bairro }}
                                                        @isset($viagem->produto->endereco_Produto->complemento)
                                                            , {{ $viagem->produto->endereco_Produto->complemento }}
                                                        @endisset
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h3 class="m-2 text-center">Nunhuma viagem realizada!</h3>
                            @endif
                        </div>

                    </div>


                </div>

                <p class="fs-4 text-dark mb-4"></p>
                <div class="pt-2">
                    <!-- <a href="" class="btn btn-secondary rounded-pill py-md-3 px-md-5 mx-2">Get A Quote</a> -->

                </div>
            </div>
        </div>
    </div>
</header>
<!-- Hero End -->

<x-footer/>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Template Javascript -->
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script>

    (function ($) {
        "use strict";


        /*==================================================================
        [ Focus Contact2 ]*/
        $('.input100').each(function () {
            $(this).on('blur', function () {
                if ($(this).val().trim() != "") {
                    $(this).addClass('has-val');
                } else {
                    $(this).removeClass('has-val');
                }
            })
        })


        /*==================================================================
        [ Validate ]*/
        var input = $('.validate-input .input100');

        $('.validate-form').on('submit', function () {
            var check = true;

            for (var i = 0; i < input.length; i++) {
                if (validate(input[i]) == false) {
                    showValidate(input[i]);
                    check = false;
                }
            }

            return check;
        });


        $('.validate-form .input100').each(function () {
            $(this).focus(function () {
                hideValidate(this);
            });
        });

        function validate(input) {
            if ($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
                if ($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                    return false;
                }
            } else {
                if ($(input).val().trim() == '') {
                    return false;
                }
            }
        }

        function showValidate(input) {
            var thisAlert = $(input).parent();

            $(thisAlert).addClass('alert-validate');
        }

        function hideValidate(input) {
            var thisAlert = $(input).parent();

            $(thisAlert).removeClass('alert-validate');
        }


    })(jQuery);


</script>

<!-- Mask -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script>
    function dropdownCard(dropdown) {
        if (dropdown.style.overflow === "hidden") {
            dropdown.style.overflow = "visible";
            dropdown.style.height = "auto";
        } else {
            dropdown.style.overflow = "hidden";
            dropdown.style.height = "89px";
        }
    }
</script>

</body>

</html>
