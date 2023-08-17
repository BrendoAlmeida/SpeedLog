<x-mainLayout>
    <div class="admin-back-arrow" style="margin-left: -10%">
        <a href="{{ route('admin.index') }}"><i class="fa-solid fa-arrow-left"></i></a>
    </div>

    <div class="col-12 d-flex mt-3 card p-3">
        <div class="col-12">
            <div class="col-12 d-flex justify-content-center">
                <form method="get" class="col-6 d-flex">
                    <input class="form-control me-2" type="search" name="s" placeholder="Procurar" aria-label="Search" value="{{ $s }}">
                    <button class="btn btn-outline-success" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col" class="d-flex justify-content-between align-items-end">
                        Email
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#cadAdmin">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($admins as $admin)
                    <tr>
                        <td class="col-2">
                            <img src="{{ asset("clientes/{$admin->Cliente->id}/img/{$admin->Cliente->imagem}") }}"
                                 alt="" height="110px">
                        </td>
                        <td>{{ $admin->Cliente->name }}</td>
                        <td>{{ $admin->Cliente->cpf }}</td>
                        <td>{{ $admin->Cliente->email }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="cadAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro Administrador</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.cadAdmin') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <label for="name">Nome:</label>
                        <input type="text" id="name" name="name" class="form-control">

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control">

                        <label for="password">Senha:</label>
                        <input type="password" id="password" name="password" class="form-control">

                        <label for="password_confirmation">Confirme sua senha:</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                               class="form-control">

                        <label for="chave_admin">Chave de acesso:</label>
                        <input type="password" id="chave_admin" name="chave_admin" class="form-control">

                        <label for="chave_admin_confirmation">Confirme sua chave de acesso:</label>
                        <input type="password" id="chave_admin_confirmation" name="chave_admin_confirmation"
                               class="form-control">

                        <label for="cpf">CPF:</label>
                        <input type="text" id="cpf" name="cpf" class="form-control">

                        <label for="imagem">Sua Foto:</label>
                        <input type="file" id="imagem" name="imagem" class="form-control" accept="image/*">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#cpf').mask('000.000.000-00');
        });
    </script>
</x-mainLayout>
