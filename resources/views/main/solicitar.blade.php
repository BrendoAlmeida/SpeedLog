<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SpeedLog</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
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
                    <form action="{{ route('viagem.store') }}" method="post" enctype="multipart/form-data"
                          style="background-color: rgb(247, 247, 247); padding: 15px 40px 50px 40px;  border-radius: 10px; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;  ">
                        @csrf
                    <span class="login100-form-title p-b-43">
                      Cadastro de Corridas
                    </span>
                        <div class="wrap-input100 validate-input colfull" data-validate="Digite um peso valido">
                            <input class="input100"
                                   type="text"
                                   name="peso"
                                   id="peso"
                                   data-mask="#0.000"
                                   value="{{ $data['peso'] ?? "" }}">
                            <span class="focus-input100"></span>
                            <span class="label-input100">Peso da Mercadoria</span>
                        </div>
                        <br>

                        <div style=" width: 49%; display: inline-block; ">
                            <h4>Informações de Retirada</h4>
                            <div class="wrap-input100 validate-input colfull" data-validate="CEP Valido Requerido">
                                <input class="input100"
                                       type="text"
                                       name="cepOrigem"
                                       id="cepOrigem"
                                       data-mask="00000-000"
                                       value="{{ $data['cepOrigem'] ?? "" }}"
                                       onblur="carregarCepOrigem(this.value)">
                                <span class="focus-input100"></span>
                                <span class="label-input100">CEP DE RETIRADA</span>
                            </div>

                            <div class="wrap-input100 validate-input colfull" data-validate="Cidade Valido Requerido">
                                <input class="input100" type="text" name="cidadeOrigem" id="cidadeOrigem">
                                <span class="focus-input100"></span>
                                <span class="label-input100">Cidade</span>
                            </div>

                            <div class="wrap-input100 validate-input colfull"
                                 data-validate="Logradouro Valido Requerido">
                                <input class="input100" type="text" name="ruaOrigem" id="ruaOrigem">
                                <span class="focus-input100"></span>
                                <span class="label-input100">Logradouro</span>
                            </div>

                            <div class="wrap-input100 validate-input colfull" data-validate="Nome Valido Requerido">
                                <input class="input100" type="text" name="bairroOrigem" id="bairroOrigem">
                                <span class="focus-input100"></span>
                                <span class="label-input100">Bairro</span>
                            </div>
                            <div class="wrap-input100 validate-input colfull" data-validate="Nome Valido Requerido">
                                <input class="input100" type="text" name="numeroOrigem" id="numeroOrigem">
                                <span class="focus-input100"></span>
                                <span class="label-input100">Número</span>
                            </div>

                            <div class="wrap-input100 validate-input colfull">
                                <input class="input100" type="text" name="complementoOrigem">
                                <span class="focus-input100"></span>
                                <span class="label-input100">Complemento</span>
                            </div>

                            <div class="container-login100-form-btn">
                            </div>
                        </div>
                        <div style=" float: right; width: 49%; ">
                            <h4>Informações de Entrega</h4>
                            <div class="wrap-input100 validate-input colfull" data-validate="CEP Valido Requerido">
                                <input class="input100"
                                       type="text"
                                       name="cepDestino"
                                       id="cepDestino"
                                       data-mask="00000-000"
                                       value="{{ $data['cepDestino'] ?? "" }}"
                                       onblur="carregarCepDestino(this.value)">
                                <span class="focus-input100"></span>
                                <span class="label-input100">CEP DE ENTREGA</span>
                            </div>
                            <div class="wrap-input100 validate-input colfull" data-validate="Cidade Valido Requerido">
                                <input class="input100" type="text" name="cidadeDestino" id="cidadeDestino">
                                <span class="focus-input100"></span>
                                <span class="label-input100">Cidade</span>
                            </div>

                            <div class="wrap-input100 validate-input colfull"
                                 data-validate="Logradouro Valido Requerido">
                                <input class="input100" type="text" name="ruaDestino" id="ruaDestino">
                                <span class="focus-input100"></span>
                                <span class="label-input100">Logradouro</span>
                            </div>

                            <div class="wrap-input100 validate-input colfull" data-validate="Bairro Valido Requerido">
                                <input class="input100" type="text" name="bairroDestino" id="bairroDestino">
                                <span class="focus-input100"></span>
                                <span class="label-input100">Bairro</span>
                            </div>

                            <div class="wrap-input100 validate-input colfull" data-validate="Número Valido Requerido">
                                <input class="input100" type="text" name="numeroDestino" id="numeroDestino">
                                <span class="focus-input100"></span>
                                <span class="label-input100">Número</span>
                            </div>

                            <div class="wrap-input100 validate-input colfull"
                                 data-validate="Complemento Valido Requerido">
                                <input class="input100" type="text" name="complementoDestino" id="complementoDestino">
                                <span class="focus-input100"></span>
                                <span class="label-input100">Complemento</span>
                            </div>

                        </div>

                        <div class="field mb-2">
                            <div class="d-flex justify-content-end col-12 flex-wrap flex-row-reverse">
                                <label for="imagem">Foto do produto</label>
                                <input class=" form-control" type="file" name="imagemProduto" id="imagemProduto"
                                       accept="image/*" required/>
                            </div>
                        </div>

                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn">
                                Solicitar Corrida
                            </button>
                        </div>

                    </form>


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
    $(document).ready(function () {
        @isset($data['cepDestino'])
        carregarCepOrigem($('#cepOrigem').val());
        carregarCepDestino($('#cepDestino').val());

        $('#peso').addClass('has-val');
        @endisset
    });

    function carregarCepOrigem(Cep) {
        $.post('{{ route('api.consultarEndereco') }}', {
            cep: Cep,
            _token: '{{ csrf_token() }}'
        }, function (data) {
            $('#cepOrigem').addClass('has-val');
            $('#ruaOrigem').val(data['logradouro']);
            $('#ruaOrigem').addClass('has-val');
            $('#bairroOrigem').val(data['bairro']);
            $('#bairroOrigem').addClass('has-val');
        });
    }

    function carregarCepDestino(Cep) {
        $.post('{{ route('api.consultarEndereco') }}', {
            cep: Cep,
            _token: '{{ csrf_token() }}'
        }, function (data) {
            $('#cepDestino').addClass('has-val');
            $('#ruaDestino').val(data['logradouro']);
            $('#ruaDestino').addClass('has-val');
            $('#bairroDestino').val(data['bairro']);
            $('#bairroDestino').addClass('has-val');
        });
    }
</script>

</body>

</html>
