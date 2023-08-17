<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <title>SpeedLog</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('icons/favicon.png') }}"/>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
</head>
<style>
    iframe{
        width: 1583px;
        padding: 20px;
        height: 650px;
    }

    .bg-hero {
        background: url({{ asset('icons/entregador-apontando.png') }}) top right no-repeat;
        background-size: contain;
        height: 440px;
    }
</style>

<body>



<x-navbar/>


<!-- Hero Start -->
<div class="container-fluid bg-primary py-5 bg-hero" style="margin-bottom: 90px;">
    <div class="container py-5">
        <div class="row justify-content-start">
            <div class="col-lg-8 text-center text-lg-start">
                <h1 class="display-1 text-dark" style="padding: 25px;">Speed<span style="color: rgb(141 141 0) ;">log</span></h1>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->


<!-- About Start -->
<div style="text-align: center;"><h1>Diferenciais</h1></div>
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row gx-0 mb-3 mb-lg-0">
            <div class="col-lg-6 my-lg-5 py-lg-5">
                <div class="about-start bg-primary p-5">
                    <h1 class="display-5 mb-4">Controle De Operações Especiais (Coe)</h1>
                    <p>Equipe monitorando entregas e coletas 24hs por dia.</p>

                </div>
            </div>
            <div class="col-lg-6" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100" src="{{ asset('icons/entregador-icon.jpg') }}" style="object-fit: cover;">
                </div>
            </div>
        </div>
        <br>
        <div class="row gx-0">
            <div class="col-lg-6" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100" src="{{ asset('icons/motoboy-icon.jpg') }}" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 my-lg-5 py-lg-5">
                <div class="about-end bg-primary p-5">
                    <h1 class="display-5 mb-4">Veículos</h1>
                    <p>Temos veículos para atender todos os perfis de carga.</p>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Quote End -->
<div style="text-align: center;"><h1>Contato</h1></div>
    <div class="col-md-12 d-flex justify-content-center">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1871405.6762817828!2d-49.06562805175779!3d-23.636975950433456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ccf8693e669473%3A0xcae92a93f8701598!2sSpeedlog%20Log%C3%ADstica%20Integrada!5e0!3m2!1spt-BR!2sbr!4v1679593556040!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
<br>

<x-footer/>

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-secondary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>

</html>
