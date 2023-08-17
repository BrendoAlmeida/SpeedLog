<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SpeedLog</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <link rel="icon" type="image/x-icon" href="{{ asset('icons/favicon.png') }}"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
          integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8d38f37e6f.js" crossorigin="anonymous"></script>

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styleform.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
</head>


<style>
    .container-card header {
        font-size: 35px;
        font-weight: 600;
        margin: 0 0 30px 0;
    }

    .container-card .form-outer {
        width: 100%;
        overflow: hidden;
    }

    .container-card .form-outer form {
        display: flex;
        width: 400%;
    }

    .form-outer form .page {
        width: 25%;
        transition: margin-left 0.3s ease-in-out;
    }

    .form-outer form .page .title {

        text-align: left;
        font-size: 25px;
        font-weight: 500;
    }


    form .page .field button {
        width: 88%;

        border: none;
        background: #cc0000;
        margin-top: -20px;
        border-radius: 5px;
        color: #fff;
        cursor: pointer;
        font-size: 18px;
        font-weight: 500;

    }


    form .page .btns button {
        margin-top: -20px !important;
    }

    form .page .btns button.prev {
        margin-right: 3px;
        font-size: 17px;
    }

    form .page .btns button.next {
        margin-left: 3px;
    }

    .container-card .progress-bar {
        display: flex;
        margin: 40px 0;
        user-select: none;
    }

    .container-card .progress-bar .step {
        text-align: center;
        width: 100%;
        position: relative;
    }

    .container-card .progress-bar .step p {
        font-weight: 500;
        font-size: 18px;
        color: #000;
        margin-bottom: 8px;
    }

    .progress-bar .step .bullet {
        height: 25px;
        width: 25px;
        border: 2px solid #000;
        display: inline-block;
        border-radius: 50%;
        position: relative;
        transition: 0.2s;
        font-weight: 500;
        font-size: 17px;
        line-height: 25px;
    }

    .progress-bar .step .bullet.active {

        background: #cc0000;
    }

    .progress-bar .step .bullet span {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
    }

    .progress-bar .step .bullet.active span {
        display: none;
    }

    .progress-bar .step .bullet:before,
    .progress-bar .step .bullet:after {
        position: absolute;
        content: '';
        bottom: 11px;
        right: -51px;
        height: 3px;
        width: 44px;
        background: #262626;
    }

    .progress-bar .step .bullet.active:after {

        transform: scaleX(0);
        transform-origin: left;
        animation: animate 0.3s linear forwards;
    }

    @keyframes animate {
        100% {
            transform: scaleX(1);
        }
    }

    .progress-bar .step:last-child .bullet:before,
    .progress-bar .step:last-child .bullet:after {
        display: none;
    }

    .progress-bar .step p.active {

        transition: 0.2s linear;
    }

    .progress-bar .step .check {
        position: absolute;
        left: 50%;
        top: 70%;
        font-size: 15px;
        transform: translate(-50%, -50%);
        display: none;
    }

    .progress-bar .step .check.active {
        display: block;
        color: #fff;
    }

    .bg-hero {
        background: url({{ asset('icons/bg-index.png') }});
        background-size: contain;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<body>

<x-navbar/>


<!-- Hero Start -->
<!-- <div style="width: 100%; display: flex; justify-content: flex-start;"> -->
<header style=" height: 680px; ">
    <div class="container-fluid bg-primary py-5 bg-hero" style="height: 100%; left: 70px;"><p>
        <div class="container-card">

            <div class="progress-barr">
                <div style="text-align: center;"><h2>Cadastro</h2></div>
            </div>
            <div class="form-outer">
                <form method="post" id="info" action="{{ route('main.solicitarEntrega') }}">
                    @csrf
                    <div class="page slide-page">
                        <div class="wrap-input100 validate-input colfull" data-validate="Email Valido Requerido">
                            <input class="input100" type="text" name="cepDestino" id="cepDestino">
                            <span class="focus-input100"></span>
                            <span class="label-input100">CEP de entrega</span>
                        </div>

                        <div class="wrap-input100 validate-input colfull" data-validate="Email Valido Requerido">
                            <input class="input100" type="text" name="peso" id="peso">
                            <span class="focus-input100"></span>
                            <span class="label-input100">Peso</span>
                        </div>

                        <div class="d-flex">
                            <div class="wrap-input100 validate-input colfull" data-validate="Email Valido Requerido">
                                <input class="input100" type="text" name="cepOrigem" id="cepOrigem">
                                <span class="focus-input100"></span>
                                <span class="label-input100">CEP de origem</span>
                            </div>

                            <button type="button" class="btn col-2" onclick="getLocalizacao()" style="font-size: 20px"
                                    title="Usar localização atual"><i
                                    class="fa-solid fa-location-dot"></i></button>
                        </div>

                        <div class="field col-12 p-0">
                            <button type="button" class="btn btn-primary" style="width: 100%!important;"
                                    onclick="calcularValor()">
                                Enviar
                            </button>
                        </div>
                        <p class="text-center mt-2 mb-0" id="erro" style="color: red">Peso ou cep inválido</p>


                        <!-- Modal -->
                        <div class="modal fade" id="simulado" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Simulado</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Valor pelo peso: R$ <span id="valorPeso">0.00</span></p>
                                        <p>Valor pelo distância: R$ <span id="valorDistancia">0.00</span></p>
                                        <p>Valor pelo tempo de dislocamento: R$ <span id="valorDislocamento">0.00</span>
                                        </p>
                                        <p>Valor total: R$ <span id="valorTotal">0.00</span></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar
                                        </button>
                                        <button type="button" class="btn btn-primary" onclick="solicitar()">Solicitar
                                            entrega
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="erroModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Erro</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p id="strErro">Preencha os compos de destino e peso!</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>

<x-footer/>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
        integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script>
    var options = {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0
    };

    function success(pos) {
        var crd = pos.coords;

        if ($('#cepDestino').val() === "") {
            $('#strErro').html("Preencha os compos de destino e peso!");
            $('#erroModal').modal('show');
            return;
        }

        calcularValor(crd.latitude + "," + crd.longitude);
    }

    function error(err) {
        console.warn('ERROR(' + err.code + '): ' + err.message);
        return null;
    }

    function getLocalizacao() {
        navigator.geolocation.getCurrentPosition(success, error, options);
    }

    $(document).ready(function () {
        $('#cepOrigem').mask('00000-000');
        $('#cepDestino').mask('00000-000');
        $('#erro').hide()
    });

    function calcularValor(origem = $('#cepOrigem').val()) {
        if (origem === "" || $('#peso').val() === "" || $('#cepDestino').val() === "") {
            $('#strErro').html("Preencha todos os campos");
            $('#erroModal').modal('show');
            return;
        }

        $.post('{{ route('api.consultarValor') }}', {
            cepOrigem: origem,
            cepDestino: $('#cepDestino').val(),
            peso: $('#peso').val(),
            _token: '{{ csrf_token() }}'
        }, function (data) {
            if (typeof data !== 'object') {
                $('#erro').show();
                return;
            }

            $('#erro').hide();
            $('#valorPeso').html(data['valorPeso']);
            $('#valorDistancia').html(data['distancia']['preco']);
            $('#valorDislocamento').html(data['duracao']['valor']);
            $('#valorTotal').html(data['total']);

            $('#simulado').modal('show');
        });
    }

    function solicitar() {
        $('#info').submit();
    }
</script>
<script src="{{ asset('js/input_animate.js') }}"></script>
</body>

</html>
