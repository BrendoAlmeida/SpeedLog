<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>SpeedLog</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('icons/favicon.png') }}"/>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"/>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styleform.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ asset('css/cadEntrega.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
          integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8d38f37e6f.js" crossorigin="anonymous"></script>
</head>
<body>

<x-navbar />

<section class="py-5 mb-4">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @if(sizeof($pedidos) > 0)
                @foreach($pedidos as $pedido)
                    <div class="card h-100 me-2">
                        <div class="d-flex justify-content-center mt-2">
                            <img class="" src="{{ asset("produtos/{$pedido->produto->id}/img/{$pedido->produto->imagem}") }}" alt="" style="height: 150px">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $pedido->produto->endereco_Produto->bairro }}, {{ $pedido->produto->endereco_Produto->rua }}</h5>
                            <ul class="p-1">
                                <li class="text-left">Peso: {{ $pedido->produto->peso }}</li>
                                <li class="text-left">Tempo até o destino: {{ $pedido->produto->minutos_tempo_entrega }}min</li>
                                <li class="text-left">Distancia: {{ $pedido->produto->distancia }}km</li>
                            </ul>
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="m-0">R$ {{ number_format($pedido->produto->total, 2, ',', '.') }}</h6>
                                <a href="{{ route('viagem.detalhes', $pedido->id) }}" class="btn btn-primary">Detalhes</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h3 class="mt-3 text-center mb-5">Nenhum pedido encontrado!</h3>
            @endif
        </div>
    </div>
</section>

<x-footer/>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
</html>
