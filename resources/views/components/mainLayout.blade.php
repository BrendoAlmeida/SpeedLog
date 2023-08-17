<!doctype html>
{{-- TODO mudar lingua --}}
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--  TODO mudar title  --}}
    <title>SpeedLog</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('icons/favicon.png') }}"/>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
            integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
          integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8d38f37e6f.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/cadEntrega.css')}}" rel="stylesheet">
</head>
<body style="background-color: #FFE468">

<x-navbar/>

<div class="container mb-3">
    {{ $slot }}
</div>

<x-footer/>

@if (Auth::user()->id ?? 0 > 0)
    @if (Auth::user()->hasRole('Administrador') != null)
        <div class="modal fade" id="gerenciamento" tabindex="-1" aria-labelledby="Gerenciamento" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Gerenciamento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route("admin.login") }}" method="post">
                        <div class="modal-body">
                            @csrf
                            <label for="chave_admin" style="font-size: 17px" class="mb-2">Chave de acesso</label>
                            <input type="password" id="chave_admin" name="chave_admin" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Logar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endif

</body>
</html>
