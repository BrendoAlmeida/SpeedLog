<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Administrador</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
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

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/cadEntrega.css') }}" rel="stylesheet">
    <link href="{{ asset('css/util.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    <style>
        body{
            background-image: url({{ asset('icons/bg-primary.png') }});
        }

        .fundoa{
            background-color: white;
            height: 80%;
            width: 100%;
            margin-top: -3%;
            padding: 20px;
        }
    </style>



</head>
<body>
<!-- Topbar Start -->

<!-- Topbar End -->

<x-navbar/>


<!-- Hero Start -->
<header>
    <div class="container-fluid bg-primary py-5 bg-hero" style="height: 100%;" >
        <div class="container ">

            <div class="fundoa" >
                <section class="content-section" id="portfolio" style="display: flex; align-content: center; flex-wrap: wrap; flex-direction: column;">
                    <div class="content-section-heading text-center" style="margin-top: -3%;">
                        <h3 class=" mb-0" style="color: rgb(255, 0, 0);">Bem-vindo</h3>
                        <h2 class="mb-5" >Administrador</h2>
                    </div>

                    <div class="container1 px-4 px-lg-5"  >
                        <div class="row gx-0"  >
                            <div class="col-lg-6" >
                                <a class="portfolio-item" href="{{ route('admin.gerenciarAdmin') }}">
                                    <div class="caption">
                                        <div class="caption-content">
                                            <div class="h2" style="font-size: 30px; color: rgba(0, 0, 0, 0.932); margin-bottom: 2.0rem;">Cadastrar Administrador</div>
                                        </div>
                                    </div>
                                    <img
                                        style=" opacity : 0.6;"
                                        class="img-fluid"
                                        src="{{ asset('icons/admin-cadAdmin.jpg') }}"
                                        alt="..." />
                                </a>
                            </div>

                            <div class="col-lg-6">
                                <a class="portfolio-item" href="{{ route('admin.pedidos') }}">
                                    <div class="caption">
                                        <div class="caption-content" style="margin: auto;">
                                            <div class="h2" style="font-size:30px; margin-bottom: 3.0rem; color: black; ">Entregas</div>

                                        </div>
                                    </div>
                                    <img
                                        style=" opacity : 0.6;"
                                        class="img-fluid"
                                        src="{{ asset('icons/admin-entregas.jpg') }}"
                                        alt="..." />
                                </a>
                            </div>

                            <div class="col-lg-6" style=" float: right;">
                                <a class="portfolio-item" href="{{ route('admin.valor') }}">
                                    <div class="caption">
                                        <div class="caption-content" style="margin: auto;">
                                            <div class="h2" style="font-size:30px; margin-bottom: 3.0rem; color: black;">Frete</div>

                                        </div>
                                    </div>
                                    <img
                                        class="img-fluid"
                                        style=" opacity : 0.6; "
                                        src="{{ asset('icons/admin-frete.jpg') }}"
                                        alt="..." />
                                </a>
                            </div>

                        </div>
                    </div>
                </section>
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
<script src="{{ asset('js/main.js') }}"></script>

<!-- Mask -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

</body>

</html>
