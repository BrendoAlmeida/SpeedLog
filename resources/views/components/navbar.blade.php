<nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm px-5 py-3 py-lg-0">
    <a href="{{ route('main.index') }}" class="navbar-brand p-0">
        <h1 class="m-0 text-uppercase text-primary">
            <img src="{{ asset('icons/logo.png') }}" alt="" style="height: 109px; padding: 3px;">
        </h1>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0 pe-4 border-end border-5 border-warning">
            <a href="{{ route('main.index') }}" class="nav-item nav-link active">Home</a>
            <a href="{{ route('main.solicitarEntrega') }}" class="nav-item nav-link active">Solicitar entrega</a>
        </div>
        <div class="d-none d-lg-flex align-items-center ps-4">

            <div>
                @if (Auth::user()->id ?? 0 > 0)
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle"
                           style="color: var(--primary)!important;" data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <div class="dropdown-menu m-0" style="left: -45px!important;">
                            <a href="{{ route('profile.edit') }}" class="dropdown-item">Meu perfil</a>
                            @if (Auth::user()->hasRole('Administrador'))
                                @if (session('adminLogado') ?? false)
                                    <a class="dropdown-item" href="{{ route('admin.index') }}">Gerenciamento</a>
                                @else
                                    <a type="button" class="dropdown-item" data-bs-toggle="modal"
                                       data-bs-target="#gerenciamento">Gerenciamento</a>
                                @endif
                            @endif
                            @if(Auth::user()->hasRole('Motorista'))
                                <a class="dropdown-item" href="{{ route('main.entregas') }}">Entregas</a>
                            @else
                                <a class="dropdown-item" href="{{ route('main.pedidos') }}">Pedidos</a>
                            @endisset
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit" class="btn dropdown-item">Sair</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}"><img src="{{ asset('icons/login.png') }}" alt="" style="height: 40px;"></a>
                @endif
            </div>
        </div>
    </div>
</nav>


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
                            <p style="font-size: 17px" class="mb-2">Chave de acesso</p>
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
